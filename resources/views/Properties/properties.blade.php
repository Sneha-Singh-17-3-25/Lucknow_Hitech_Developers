@extends('layouts/contentNavbarLayout')

@section('title', 'Properties Management')

@section('vendor-style')
    <style>
        /* DataTable styling */
        #propertiesTable_length,
        #propertiesTable_filter {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        #propertiesTable_filter {
            display: none;
        }

        .swal-toast-zindex {
            z-index: 9999 !important;
        }

        /* Property card styles */
        .property-card {
            transition: all 0.3s ease;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .property-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Status badges */
        .status-badge {
            font-size: 0.8rem;
            padding: 0.35rem 0.65rem;
            border-radius: 50rem;
            font-weight: 500;
        }

        .status-badge-pending {
            background-color: #ffab00;
            color: #fff;
        }

        .status-badge-approved {
            background-color: #71dd37;
            color: #fff;
        }

        .status-badge-rejected {
            background-color: #ff3e1d;
            color: #fff;
        }

        /* Action buttons */
        .action-btn {
            width: 2.5rem;
            height: 2.5rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.2s;
            border: none;
            margin: 0 2px;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        .approved-btn {
            background-color: rgba(113, 221, 55, 0.2);
            color: #71dd37;
        }

        .approved-btn:hover {
            background-color: #71dd37;
            color: #fff;
        }

        .rejected-btn {
            background-color: rgba(255, 62, 29, 0.2);
            color: #ff3e1d;
        }

        .rejected-btn:hover {
            background-color: #ff3e1d;
            color: #fff;
        }

        .preview-btn {
            background-color: rgba(105, 108, 255, 0.2);
            color: #696cff;
        }

        .preview-btn:hover {
            background-color: #696cff;
            color: #fff;
        }

        /* Filter section */
        .filter-section {
            background-color: #f8f8f8;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .filter-badge {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 50rem;
            padding: 0.5rem 1rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            display: inline-flex;
            align-items: center;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }

        .filter-badge:hover,
        .filter-badge.active {
            background-color: #696cff;
            color: #fff;
            border-color: #696cff;
        }

        .filter-badge i {
            margin-right: 0.5rem;
        }

        /* Property preview modal */
        .property-preview-header {
            background-color: #f8f8f8;
            border-bottom: 1px solid #eee;
        }

        .property-detail {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #eee;
        }

        .property-detail:last-child {
            border-bottom: none;
        }

        .property-detail-label {
            font-weight: 600;
            color: #566a7f;
            margin-bottom: 0.25rem;
        }

        .property-gallery {
            height: 200px;
            background-color: #f8f8f8;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            border-radius: 0.5rem;
        }

        /* Custom table styles */
        .table-responsive {
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            font-weight: 600;
            color: #566a7f;
        }

        .table tbody tr:hover {
            background-color: rgba(105, 108, 255, 0.05);
        }
    </style>
@endsection

@section('content')
    <!-- Properties Management Card -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                        <h5 class="card-title mb-0">Properties Management</h5>
                        <button type="button" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#addPropertyModal">
                            <i class="fa-solid fa-plus me-2"></i>
                            <span>Add Property</span>
                        </button>
                    </div>

                    <!-- Filter Section -->
                    <div class="card-body pb-0">
                        <div class="filter-section">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-search"></i></span>
                                        <input type="text" id="propertySearchInput" class="form-control"
                                            placeholder="Search properties...">
                                    </div>
                                </div>
                            </div>

                            <div class="filter-tags mb-2">
                                <span class="filter-badge active" data-filter="all">
                                    <i class="fa-solid fa-list"></i> All
                                </span>
                                <span class="filter-badge" data-filter="pending">
                                    <i class="fa-solid fa-clock"></i> Pending
                                </span>
                                <span class="filter-badge" data-filter="approved">
                                    <i class="fa-solid fa-check"></i> Approved
                                </span>
                                <span class="filter-badge" data-filter="rejected">
                                    <i class="fa-solid fa-xmark"></i> Rejected
                                </span>
                                <span class="filter-badge" data-filter="residential">
                                    <i class="fa-solid fa-home"></i> Residential
                                </span>
                                <span class="filter-badge" data-filter="commercial">
                                    <i class="fa-solid fa-building"></i> Commercial
                                </span>
                                <span class="filter-badge" data-filter="sale">
                                    <i class="fa-solid fa-dollar-sign"></i> For Sale
                                </span>
                                <span class="filter-badge" data-filter="rent">
                                    <i class="fa-solid fa-key"></i> For Rent
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="propertiesTable"
                                class="table table-hover table-striped align-middle dt-responsive nowrap w-100">
                                <thead class="table-light">
                                    <tr>
                                        <th width="5%">#</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Property Type</th>
                                        <th>Want For</th>
                                        <th>Status</th>
                                        <th>Plot Area</th>
                                        <th>Furnished</th>
                                        <th>Price</th>
                                        <th>Approval Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sr = 1;
                                    @endphp
                                    @forelse ($allProperties as $property)
                                        @php
                                            $status = $property->approved_status ?? 'pending';
                                            $locationId = $property->location_id ?? ($property->id ?? '');
                                            $propertyType = $property->property_type ?? 'Unknown';
                                        @endphp
                                        <tr data-status="{{ $status }}" data-type="{{ strtolower($propertyType) }}"
                                            data-want="{{ strtolower($property->want_for ?? '') }}">
                                            <td>{{ $sr++ }}</td>
                                            <td>{{ $property->name ?? 'N/A' }}</td>
                                            <td>{{ $property->email ?? 'N/A' }}</td>
                                            <td>{{ $property->phone ?? 'N/A' }}</td>
                                            <td>{{ $propertyType }}</td>
                                            <td>{{ $property->want_for ?? 'N/A' }}</td>
                                            <td>{{ $property->poss_status ?? 'N/A' }}</td>
                                            <td>{{ $property->plot_area ?? 'N/A' }}</td>
                                            <td>{{ $property->furnished ?? 'N/A' }}</td>
                                            <td>{{ $property->price ?? 'N/A' }}</td>
                                            <td>
                                                @switch($status)
                                                    @case('approved')
                                                        <span class="badge status-badge status-badge-approved">Approved</span>
                                                    @break

                                                    @case('rejected')
                                                        <span class="badge status-badge status-badge-rejected">Rejected</span>
                                                    @break

                                                    @default
                                                        <span class="badge status-badge status-badge-pending">Pending</span>
                                                @endswitch
                                            </td>
                                            <td class="text-center">
                                                <div class="d-inline-flex align-items-center">
                                                    @if ($status !== 'approved')
                                                        <button type="button" class="btn action-btn approved-btn"
                                                            id="approve-btn-{{ $locationId }}-{{ strtolower($propertyType) }}"
                                                            onclick="updatePropertyStatus('{{ $locationId }}', 'approved', '{{ $propertyType }}')"
                                                            title="Mark as Approved">
                                                            <i class="fa-solid fa-check"></i>
                                                        </button>
                                                    @endif

                                                    @if ($status !== 'rejected')
                                                        <button type="button" class="btn action-btn rejected-btn"
                                                            id="reject-btn-{{ $locationId }}-{{ strtolower($propertyType) }}"
                                                            onclick="updatePropertyStatus('{{ $locationId }}', 'rejected', '{{ $propertyType }}')"
                                                            title="Mark as Rejected">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </button>
                                                    @endif

                                                    <button type="button" class="btn action-btn preview-btn"
                                                        data-bs-toggle="modal" data-bs-target="#propertyPreviewModal"
                                                        onclick="openPropertyPreview(this)" title="Preview Property"
                                                        data-property-id="{{ $locationId }}"
                                                        data-property-name="{{ $property->name ?? '' }}"
                                                        data-property-email="{{ $property->email ?? '' }}"
                                                        data-property-phone="{{ $property->phone ?? '' }}"
                                                        data-property-type="{{ $propertyType }}"
                                                        data-property-want="{{ $property->want_for ?? '' }}"
                                                        data-property-status="{{ $property->poss_status ?? '' }}"
                                                        data-property-area="{{ $property->plot_area ?? '' }}"
                                                        data-property-furnished="{{ $property->furnished ?? '' }}"
                                                        data-property-price="{{ $property->price ?? '' }}"
                                                        data-approval-status="{{ $status }}">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="12" class="text-center py-4">
                                                    <div class="d-flex flex-column align-items-center">
                                                        <i class="fa-solid fa-database fa-3x text-muted mb-3"></i>
                                                        <h6 class="text-muted">No properties found</h6>
                                                        <p class="text-muted mb-0">There are no properties to display at the
                                                            moment.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Property Preview Modal -->
        <div class="modal fade" id="propertyPreviewModal" tabindex="-1" aria-labelledby="propertyPreviewModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header property-preview-header">
                        <h5 class="modal-title" id="propertyPreviewModalLabel">Property Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="property-gallery mb-3">
                            <i class="fa-solid fa-image fa-3x text-muted"></i>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="property-detail">
                                    <div class="property-detail-label">Owner Name</div>
                                    <div id="preview-name">-</div>
                                </div>
                                <div class="property-detail">
                                    <div class="property-detail-label">Email</div>
                                    <div id="preview-email">-</div>
                                </div>
                                <div class="property-detail">
                                    <div class="property-detail-label">Phone</div>
                                    <div id="preview-phone">-</div>
                                </div>
                                <div class="property-detail">
                                    <div class="property-detail-label">Property Type</div>
                                    <div id="preview-type">-</div>
                                </div>
                                <div class="property-detail">
                                    <div class="property-detail-label">Purpose</div>
                                    <div id="preview-want">-</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="property-detail">
                                    <div class="property-detail-label">Status</div>
                                    <div id="preview-status">-</div>
                                </div>
                                <div class="property-detail">
                                    <div class="property-detail-label">Plot Area</div>
                                    <div id="preview-area">-</div>
                                </div>
                                <div class="property-detail">
                                    <div class="property-detail-label">Furnished</div>
                                    <div id="preview-furnished">-</div>
                                </div>
                                <div class="property-detail">
                                    <div class="property-detail-label">Price</div>
                                    <div id="preview-price">-</div>
                                </div>
                                <div class="property-detail">
                                    <div class="property-detail-label">Approval Status</div>
                                    <div id="preview-approval-status">-</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="preview-approved-btn" class="btn btn-success">
                            <i class="fa-solid fa-check me-1"></i> Approved
                        </button>
                        <button type="button" id="preview-rejected-btn" class="btn btn-danger">
                            <i class="fa-solid fa-xmark me-1"></i> Rejected
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Toast Container -->
        <div id="toast-container" class="position-fixed top-0 end-0 p-3" style="z-index: 1080;"></div>

    @endsection

    @section('vendor-script')
        <!-- SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Notyf JS -->
        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    @endsection

    @section('page-script')
        <script>
            // Global variables
            let propertiesDataTable;
            let currentPropertyId = null;
            let currentPropertyType = null;

            document.addEventListener('DOMContentLoaded', function() {
                initializeDataTable();
                initializeFilterBadges();
                initializeSearchInput();
            });

            function initializeDataTable() {
                const propertiesTable = document.getElementById('propertiesTable');
                if (!propertiesTable) return;

                propertiesDataTable = new DataTable(propertiesTable, {
                    responsive: true,
                    scrollX: true,
                    order: [
                        [0, 'asc']
                    ],
                    language: {
                        search: '<i class="fa-solid fa-search"></i>',
                        searchPlaceholder: 'Search properties...',
                        emptyTable: '<div class="text-center p-4"><i class="fa-solid fa-database fa-2x text-muted mb-3"></i><p>No properties found</p></div>',
                        paginate: {
                            first: '<i class="fa-solid fa-angles-left"></i>',
                            previous: '<i class="fa-solid fa-angle-left"></i>',
                            next: '<i class="fa-solid fa-angle-right"></i>',
                            last: '<i class="fa-solid fa-angles-right"></i>'
                        }
                    },
                    lengthMenu: [
                        [5, 10, 25, 50, -1],
                        [5, 10, 25, 50, 'All']
                    ],
                    dom: '<"row align-items-center"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rtip',
                    drawCallback: function() {
                        // Re-apply custom styling after table redraw
                        applyCustomStyling();
                    }
                });
            }

            function initializeSearchInput() {
                const searchInput = document.getElementById('propertySearchInput');
                if (searchInput && propertiesDataTable) {
                    searchInput.addEventListener('keyup', function() {
                        propertiesDataTable.search(this.value).draw();
                    });
                }
            }

            function initializeFilterBadges() {
                document.querySelectorAll('.filter-badge').forEach(badge => {
                    badge.addEventListener('click', function() {
                        // Remove active class from all badges
                        document.querySelectorAll('.filter-badge').forEach(b => b.classList.remove('active'));

                        // Add active class to clicked badge
                        this.classList.add('active');

                        // Apply filter
                        const filterType = this.dataset.filter;
                        applyFilter(filterType);
                    });
                });
            }

            function applyFilter(filterType) {
                if (!propertiesDataTable) return;

                switch (filterType) {
                    case 'all':
                        propertiesDataTable.search('').draw();
                        break;
                    case 'pending':
                        propertiesDataTable.search('Pending').draw();
                        break;
                    case 'approved':
                        propertiesDataTable.search('Approved').draw();
                        break;
                    case 'rejected':
                        propertiesDataTable.search('Rejected').draw();
                        break;
                    case 'residential':
                        propertiesDataTable.search('Residential').draw();
                        break;
                    case 'commercial':
                        propertiesDataTable.search('Commercial').draw();
                        break;
                    case 'sale':
                        propertiesDataTable.search('Sale').draw();
                        break;
                    case 'rent':
                        propertiesDataTable.search('Rent').draw();
                        break;
                    default:
                        propertiesDataTable.search('').draw();
                }
            }

            function updatePropertyStatus(locationId, status, propertyType) {
                if (!locationId) {
                    showNotification('error', 'Invalid property ID');
                    return;
                }

                const title = status === 'approved' ? 'Mark this property as approved?' : 'Mark this property as rejected?';
                const text = status === 'approved' ? 'This property will be visible to users.' :
                    'This property will be hidden from users.';
                const confirmButtonText = status === 'approved' ? 'Yes, mark as approved!' : 'Yes, mark as rejected!';
                const confirmButtonColor = status === 'approved' ? '#71dd37' : '#ff3e1d';

                Swal.fire({
                    title: title,
                    text: text,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: confirmButtonColor,
                    cancelButtonColor: '#8592a3',
                    confirmButtonText: confirmButtonText,
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        performStatusUpdate(locationId, status, propertyType);
                    }
                });
            }

            function performStatusUpdate(locationId, status, propertyType) {
                // Show loading state
                Swal.fire({
                    title: 'Processing...',
                    text: 'Updating property status',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                fetch(`/update-property-status/${locationId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ||
                                '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            locationId: locationId,
                            status: status,
                            property_type: propertyType
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Status update response:', data);
                        Swal.close();

                        if (data.success) {
                            // updateUIAfterStatusChange(locationId, status);
                            showNotification('success', `Property marked as ${status} successfully`);
                            window.location.reload();

                            // Refresh the table if using AJAX
                            // if (propertiesDataTable && propertiesDataTable.ajax) {
                            //     propertiesDataTable.ajax.reload(null, false);
                            // }
                        } else {
                            showNotification('error', data.message || 'Failed to update property status');
                        }
                    })
                    .catch(error => {
                        Swal.close();
                        console.error('Error updating status:', error);
                        showNotification('error', 'Something went wrong. Please try again.');
                    });
            }

            function updateUIAfterStatusChange(locationId, status) {
                // Find the row with the property
                const rows = document.querySelectorAll('#propertiesTable tbody tr');
                // console.log(rows);
                rows.forEach(row => {
                    // console.log(row);

                    const approvedBtn = row.querySelector(
                        `button[onclick*="'15'"][onclick*="'rejected'"][onclick*="'flat/apartment'"]`);
                    // alert('Approved button: ' + (approvedBtn ? 'found' : 'not found'));
                    // console.log('Approved button:', approvedBtn);
                    // return;
                    const rejectedBtn = row.querySelector(`button[onclick*="${locationId}"][onclick*="rejected"]`);
                    alert('Rejected button: ' + (rejectedBtn ? 'found' : 'not found'));


                    console.log('approve:', approvedBtn);
                    console.log('reject:', rejectedBtn);

                    if (approvedBtn || rejectedBtn) {
                        // Update status badge
                        const statusCell = row.querySelector('td:nth-child(11)');
                        if (statusCell) {
                            let badgeHtml = '';
                            switch (status) {
                                case 'approved':
                                    badgeHtml =
                                    '<span class="badge status-badge status-badge-approved">Approved</span>';
                                    break;
                                case 'rejected':
                                    badgeHtml =
                                    '<span class="badge status-badge status-badge-rejected">Rejected</span>';
                                    break;
                                default:
                                    badgeHtml = '<span class="badge status-badge status-badge-pending">Pending</span>';
                            }
                            statusCell.innerHTML = badgeHtml;
                        }

                        // Update action buttons visibility
                        const actionsCell = row.querySelector('td:last-child .d-inline-flex');
                        if (actionsCell) {
                            updateActionButtons(actionsCell, locationId, status, row.querySelector(
                                    `button[onclick*="${locationId}"]`).onclick.toString().match(/'([^']+)'/g)[2]
                                .replace(/'/g, ''));
                        }
                    }
                });
            }

            function updateActionButtons(container, locationId, status, propertyType) {
                // Clear existing buttons
                container.innerHTML = '';

                // Add appropriate buttons based on status
                if (status !== 'approved') {
                    const approvedBtn = document.createElement('button');
                    approvedBtn.type = 'button';
                    approvedBtn.className = 'btn action-btn approved-btn';
                    approvedBtn.title = 'Mark as Approved';
                    approvedBtn.onclick = () => updatePropertyStatus(locationId, 'approved', propertyType);
                    approvedBtn.innerHTML = '<i class="fa-solid fa-check"></i>';
                    container.appendChild(approvedBtn);
                }

                if (status !== 'rejected') {
                    const rejectedBtn = document.createElement('button');
                    rejectedBtn.type = 'button';
                    rejectedBtn.className = 'btn action-btn rejected-btn';
                    rejectedBtn.title = 'Mark as Rejected';
                    rejectedBtn.onclick = () => updatePropertyStatus(locationId, 'rejected', propertyType);
                    rejectedBtn.innerHTML = '<i class="fa-solid fa-xmark"></i>';
                    container.appendChild(rejectedBtn);
                }

                // Always add preview button
                const previewBtn = document.createElement('button');
                previewBtn.type = 'button';
                previewBtn.className = 'btn action-btn preview-btn';
                previewBtn.title = 'Preview Property';
                previewBtn.setAttribute('data-bs-toggle', 'modal');
                previewBtn.setAttribute('data-bs-target', '#propertyPreviewModal');
                previewBtn.onclick = () => openPropertyPreview(previewBtn);
                previewBtn.innerHTML = '<i class="fa-solid fa-eye"></i>';
                container.appendChild(previewBtn);
            }

            function openPropertyPreview(button) {
                if (!button) return;

                try {
                    // Get property data from button attributes
                    const propertyData = {
                        id: button.dataset.propertyId || '',
                        name: button.dataset.propertyName || 'N/A',
                        email: button.dataset.propertyEmail || 'N/A',
                        phone: button.dataset.propertyPhone || 'N/A',
                        type: button.dataset.propertyType || 'N/A',
                        want: button.dataset.propertyWant || 'N/A',
                        status: button.dataset.propertyStatus || 'N/A',
                        area: button.dataset.propertyArea || 'N/A',
                        furnished: button.dataset.propertyFurnished || 'N/A',
                        price: button.dataset.propertyPrice || 'N/A',
                        approvalStatus: button.dataset.approvalStatus || 'pending'
                    };

                    // Set current property info for modal actions
                    currentPropertyId = propertyData.id;
                    currentPropertyType = propertyData.type;

                    // Populate modal content
                    document.getElementById('preview-name').textContent = propertyData.name;
                    document.getElementById('preview-email').textContent = propertyData.email;
                    document.getElementById('preview-phone').textContent = propertyData.phone;
                    document.getElementById('preview-type').textContent = propertyData.type;
                    document.getElementById('preview-want').textContent = propertyData.want;
                    document.getElementById('preview-status').textContent = propertyData.status;
                    document.getElementById('preview-area').textContent = propertyData.area;
                    document.getElementById('preview-furnished').textContent = propertyData.furnished;
                    document.getElementById('preview-price').textContent = propertyData.price;

                    // Set approval status with proper badge
                    const approvalStatusEl = document.getElementById('preview-approval-status');
                    let statusBadge = '';
                    switch (propertyData.approvalStatus) {
                        case 'approved':
                            statusBadge = '<span class="badge status-badge status-badge-approved">Approved</span>';
                            break;
                        case 'rejected':
                            statusBadge = '<span class="badge status-badge status-badge-rejected">Rejected</span>';
                            break;
                        default:
                            statusBadge = '<span class="badge status-badge status-badge-pending">Pending</span>';
                    }
                    approvalStatusEl.innerHTML = statusBadge;

                    // Setup modal action buttons
                    setupModalActionButtons(propertyData.approvalStatus);

                } catch (error) {
                    console.error('Error opening property preview:', error);
                    showNotification('error', 'Failed to load property details');
                }
            }

            function setupModalActionButtons(approvalStatus) {
                const approveBtn = document.getElementById('preview-approve-btn');
                const rejectBtn = document.getElementById('preview-reject-btn');

                // Show/hide buttons based on current status
                if (approvalStatus === 'approved') {
                    approveBtn.style.display = 'none';
                    rejectBtn.style.display = 'inline-block';
                } else if (approvalStatus === 'rejected') {
                    approveBtn.style.display = 'inline-block';
                    rejectBtn.style.display = 'none';
                } else {
                    approveBtn.style.display = 'inline-block';
                    rejectBtn.style.display = 'inline-block';
                }

                // Set up click handlers
                approveBtn.onclick = function() {
                    const modal = bootstrap.Modal.getInstance(document.getElementById('propertyPreviewModal'));
                    if (modal) modal.hide();
                    updatePropertyStatus(currentPropertyId, 'approve', currentPropertyType);
                };

                rejectBtn.onclick = function() {
                    const modal = bootstrap.Modal.getInstance(document.getElementById('propertyPreviewModal'));
                    if (modal) modal.hide();
                    updatePropertyStatus(currentPropertyId, 'reject', currentPropertyType);
                };
            }

            function showNotification(type, message) {
                if (typeof Notyf !== 'undefined') {
                    const notyf = new Notyf({
                        duration: 3000,
                        position: {
                            x: 'right',
                            y: 'top',
                        },
                        types: [{
                            type: 'success',
                            background: '#71dd37',
                            icon: {
                                className: 'fa-solid fa-check',
                                tagName: 'i',
                                color: '#fff'
                            }
                        }, {
                            type: 'error',
                            background: '#ff3e1d',
                            icon: {
                                className: 'fa-solid fa-xmark',
                                tagName: 'i',
                                color: '#fff'
                            }
                        }]
                    });

                    if (type === 'success') {
                        notyf.success(message);
                    } else {
                        notyf.error(message);
                    }
                } else {
                    // Fallback to alert if Notyf is not available
                    alert(message);
                }
            }

            function applyCustomStyling() {
                // Style search box
                const searchInputs = document.querySelectorAll('.dataTables_filter input');
                searchInputs.forEach(input => {
                    input.classList.add('form-control-sm', 'rounded-pill', 'px-3');
                    input.setAttribute('placeholder', 'Search properties...');
                });

                const searchLabels = document.querySelectorAll('.dataTables_filter label');
                searchLabels.forEach(label => {
                    label.classList.add('d-flex', 'align-items-center', 'gap-2');
                });

                // Style length menu
                const lengthSelects = document.querySelectorAll('.dataTables_length select');
                lengthSelects.forEach(select => {
                    select.classList.add('form-select', 'form-select-sm', 'rounded-pill', 'ms-2');
                });

                const lengthLabels = document.querySelectorAll('.dataTables_length label');
                lengthLabels.forEach(label => {
                    label.classList.add('d-flex', 'align-items-center');
                });

                // Style pagination
                const paginationDivs = document.querySelectorAll('.dataTables_paginate');
                paginationDivs.forEach(div => {
                    div.classList.add('mt-3');
                });

                const paginateButtons = document.querySelectorAll('.paginate_button');
                paginateButtons.forEach(button => {
                    button.classList.add('px-3', 'py-1', 'rounded-2');
                });
            }

            // Apply custom styling when page loads
            window.addEventListener('load', function() {
                setTimeout(applyCustomStyling, 100);
            });

            // Handle modal cleanup
            document.getElementById('propertyPreviewModal')?.addEventListener('hidden.bs.modal', function() {
                currentPropertyId = null;
                currentPropertyType = null;
            });

            // Error handling for missing elements
            function safeElementOperation(elementId, operation) {
                const element = document.getElementById(elementId);
                if (element && typeof operation === 'function') {
                    try {
                        operation(element);
                    } catch (error) {
                        console.error(`Error operating on element ${elementId}:`, error);
                    }
                }
            }

            // Utility function to safely get element text content
            function safeGetTextContent(element, fallback = 'N/A') {
                return element && element.textContent ? element.textContent.trim() : fallback;
            }

            // Utility function to safely set element content
            function safeSetContent(elementId, content, isHTML = false) {
                const element = document.getElementById(elementId);
                if (element) {
                    if (isHTML) {
                        element.innerHTML = content || '';
                    } else {
                        element.textContent = content || 'N/A';
                    }
                }
            }
        </script>
    @endsection
