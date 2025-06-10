@extends('layouts/contentNavbarLayout')

@section('title', 'Permissions Management')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
<style>
.card {
    border-radius: 0.25rem !important;
    box-shadow: 0 0.125rem 0.25rem rgba(105, 108, 255, 0.1) !important;
    margin: 0;
}

.card-header {
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    padding: 1.25rem 1.5rem;
}

.filter-card {
    margin-bottom: 1rem;
    border-radius: 0.75rem;
    transition: all 0.2s ease-in-out;
}

.filter-card .card-body {
    padding: 1rem 1.5rem;
}

.table-responsive {
    overflow-x: auto;
}

#permissionsTable {
    width: 100% !important;
    margin-bottom: 0;
}

#permissionsTable th, #permissionsTable td {
    padding: 1rem 1rem;
    vertical-align: middle;
}

.btn-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    padding: 0;
}

.status-badge {
    padding: 0.35em 0.65em;
    font-size: 0.75em;
    font-weight: 500;
    border-radius: 50rem;
}

.search-input-wrapper {
    position: relative;
    max-width: 300px;
}

.search-input-wrapper i {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: #697a8d;
}

.search-input {
    padding-left: 35px;
    border-radius: 0.375rem;
}

.filter-dropdown {
    min-width: 200px;
}

.swal-toast-zindex {
    z-index: 9999 !important;
}

.header-actions {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.dataTables_filter {
    display: none !important;
}

.permission-badge {
    display: inline-flex;
    align-items: center;
    font-weight: 500;
    padding: 0.35em 0.65em;
    font-size: 0.85em;
    border-radius: 0.25rem;
    background-color: rgba(105, 108, 255, 0.16);
    color: #696cff;
}

.permission-badge i {
    margin-right: 0.35rem;
    font-size: 0.85em;
}
</style>
@endsection

@section('content')
<!-- Filter Section -->
<div class="container-fluid">
    <div class="card filter-card mb-4">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 col-lg-4 mb-3 mb-md-0">
                    <input type="text" id="filter-name" class="form-control" placeholder="Filter by permission name" oninput="applyFilters()">
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-3 mb-lg-0">
                    <input type="text" id="filter-date" class="form-control" placeholder="Filter by date" oninput="applyFilters()">
                </div>
                <div class="col-12 col-md-12 col-lg-4 d-flex align-items-center justify-content-end">
                    <button type="button" id="reset-filters" class="btn btn-outline-secondary">
                        <i class="fa-solid fa-rotate me-2"></i>Reset Filters
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Permissions Management Card -->
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h5 class="card-title mb-0">Permissions Management</h5>
            <div class="header-actions">
                <div id="length-control-container"></div>
                <div class="dropdown">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-download me-2"></i>Export
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                        <li><a class="dropdown-item" href="#" id="export-csv"><i class="fa-solid fa-file-csv me-2"></i>CSV</a></li>
                        <li><a class="dropdown-item" href="#" id="export-excel"><i class="fa-solid fa-file-excel me-2"></i>Excel</a></li>
                        <li><a class="dropdown-item" href="#" id="export-pdf"><i class="fa-solid fa-file-pdf me-2"></i>PDF</a></li>
                        <li><a class="dropdown-item" href="#" id="export-print"><i class="fa-solid fa-print me-2"></i>Print</a></li>
                    </ul>
                </div>
                <button type="button" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addPermissionModal">
                    <i class="fa-solid fa-plus me-2"></i>
                    <span>Add Permission</span>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="permissionsTable" class="table table-hover table-striped align-middle dt-responsive nowrap w-100">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">#</th>
                            <th>Permission Name</th>
                            <th width="20%">Created At</th>
                            <th width="20%">Updated At</th>
                            <th width="10%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm me-3">
                                        <div class="avatar-initial rounded-circle bg-label-primary">
                                            <i class="fa-solid fa-lock"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="fw-medium">{{ $permission->name }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $permission->created_at }}</td>
                            <td>{{ $permission->updated_at }}</td>
                            <td class="text-center">
                                <div class="d-inline-flex">
                                    <button type="button" class="btn btn-sm btn-icon btn-outline-primary me-2"
                                        data-bs-toggle="modal" data-bs-target="#EditPermissionModal"
                                        data-id="{{ $permission->id }}" data-name="{{ $permission->name }}"
                                        onclick="openEditModal(this)" title="Edit Permission">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-icon btn-outline-danger"
                                        onclick="confirmDelete('{{ $permission->id }}', '{{ $permission->name }}')" title="Delete Permission">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Permission Modal -->
<div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addPermissionForm">
                    <div class="mb-3">
                        <label for="permissionInput" class="form-label">Permission Name</label>
                        <input type="text" id="permissionInput" class="form-control"
                            placeholder="Enter permission name">
                        <div class="invalid-feedback">Please enter a valid permission name.</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="savePermissionBtn">
                    <i class="fa-solid fa-save me-1"></i> Save
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Permission Modal -->
<div class="modal fade" id="EditPermissionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPermissionForm">
                    <input type="hidden" id="editPermissionId">
                    <div class="mb-3">
                        <label for="editPermissionName" class="form-label">Permission Name</label>
                        <input type="text" id="editPermissionName" class="form-control"
                            placeholder="Enter permission name">
                        <div class="invalid-feedback">Please enter a valid permission name.</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updatePermission()">
                    <i class="fa-solid fa-save me-1"></i> Update
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('vendor-script')
<!-- SweetAlert2 JS -->
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('page-script')
<script>
// Global variable to track filter debounce timer
let filterTimer;
let permissionsDataTable;

document.addEventListener('DOMContentLoaded', function() {
    // Initialize DataTable with advanced options
    const permissionsTable = document.getElementById('permissionsTable');
    permissionsDataTable = new DataTable(permissionsTable, {
        responsive: true,
        order: [
            [0, 'asc']
        ],
        language: {
            search: '',
            searchPlaceholder: 'Search permissions...',
            emptyTable: '<div class="text-center p-4"><i class="fa-solid fa-lock fa-2x text-muted mb-3"></i><p>No permissions found</p></div>',
            paginate: {
                first: '<i class="fa-solid fa-angles-left"></i>',
                previous: '<i class="fa-solid fa-angle-left"></i>',
                next: '<i class="fa-solid fa-angle-right"></i>',
                last: '<i class="fa-solid fa-angles-right"></i>'
            },
            lengthMenu: 'Show _MENU_'
        },
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, 'All']
        ],
        dom: '<"d-none"f><"#top-controls"l>rt<"row align-items-center"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        buttons: [
            {
                extend: 'csv',
                text: 'CSV',
                className: 'btn btn-sm btn-outline-primary',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                extend: 'excel',
                text: 'Excel',
                className: 'btn btn-sm btn-outline-primary',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                extend: 'pdf',
                text: 'PDF',
                className: 'btn btn-sm btn-outline-primary',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                extend: 'print',
                text: 'Print',
                className: 'btn btn-sm btn-outline-primary',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            }
        ]
    });

    // Make the dataTable globally accessible
    window.permissionsDataTable = permissionsDataTable;

    // Move the length control to the header
    const lengthControl = document.querySelector('.dataTables_length');
    const lengthControlContainer = document.getElementById('length-control-container');
    if (lengthControl && lengthControlContainer) {
        lengthControlContainer.appendChild(lengthControl);
    }

    // Export buttons functionality
    document.getElementById('export-csv').addEventListener('click', function(e) {
        e.preventDefault();
        permissionsDataTable.button('.buttons-csv').trigger();
    });

    document.getElementById('export-excel').addEventListener('click', function(e) {
        e.preventDefault();
        permissionsDataTable.button('.buttons-excel').trigger();
    });

    document.getElementById('export-pdf').addEventListener('click', function(e) {
        e.preventDefault();
        permissionsDataTable.button('.buttons-pdf').trigger();
    });

    document.getElementById('export-print').addEventListener('click', function(e) {
        e.preventDefault();
        permissionsDataTable.button('.buttons-print').trigger();
    });

    // Reset filters button
    document.getElementById('reset-filters').addEventListener('click', function() {
        document.getElementById('filter-name').value = '';
        document.getElementById('filter-date').value = '';
        permissionsDataTable.search('').columns().search('').draw();
    });

    // Style pagination
    const paginationDivs = document.querySelectorAll('.dataTables_paginate');
    paginationDivs.forEach(div => {
        div.classList.add('mt-3');
    });

    // Save permission button click handler
    const savePermissionBtn = document.getElementById('savePermissionBtn');
    if (savePermissionBtn) {
        savePermissionBtn.addEventListener('click', function() {
            const permissionInput = document.getElementById('permissionInput');
            const permissionName = permissionInput.value.trim();

            // Validate input
            if (!permissionName) {
                permissionInput.classList.add('is-invalid');
                return;
            } else {
                permissionInput.classList.remove('is-invalid');
            }

            // Show loading state
            const originalText = this.innerHTML;
            this.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';
            this.disabled = true;

            // Send fetch request
            fetch("{{ route('permissions_store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": '{{ csrf_token() }}',
                    "Accept": "application/json"
                },
                body: JSON.stringify({
                    name: permissionName
                })
            })
            .then(response => response.json())
            .then(response => {
                if (response.success) {
                    // Close modal and reset form
                    const addPermissionModal = document.getElementById('addPermissionModal');
                    const modalInstance = bootstrap.Modal.getInstance(addPermissionModal);
                    modalInstance.hide();
                    permissionInput.value = '';

                    notyf.success('Permission added successfully.');
                    
                    // Add the new permission to the DataTable
                    const newRowData = createPermissionRowData(response.permission);
                    addRowToDataTable(newRowData);
                } else {
                    notyf.error('Failed to add permission.');
                }
            })
            .catch(error => {
                notyf.error('Something went wrong. Please try again.');
                console.error('Error:', error);
            })
            .finally(() => {
                // Reset button state
                this.innerHTML = originalText;
                this.disabled = false;
            });
        });
    }
});

// Debounced filter function that applies filters as user types
function applyFilters() {
    clearTimeout(filterTimer);
    
    filterTimer = setTimeout(() => {
        const nameFilter = document.getElementById('filter-name').value;
        const dateFilter = document.getElementById('filter-date').value;

        // Apply column-specific filtering
        permissionsDataTable.column(1).search(nameFilter);
        
        // Apply date filtering across both date columns
        if (dateFilter) {
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    const createdDate = data[2] || '';
                    const updatedDate = data[3] || '';
                    return createdDate.includes(dateFilter) || updatedDate.includes(dateFilter);
                }
            );
        } else {
            // Clear any existing custom search function
            $.fn.dataTable.ext.search.pop();
        }
        
        permissionsDataTable.draw();
    }, 300); // 300ms debounce time
}

// Helper function to create permission row data
function createPermissionRowData(permission) {
    // Get the current number of rows for serial number
    const rowCount = permissionsDataTable.rows().count() + 1;
    
    return {
        DT_RowId: `permission-${permission.id}`,
        0: rowCount,
        1: `<div class="d-flex align-items-center">
                <div class="avatar avatar-sm me-3">
                    <div class="avatar-initial rounded-circle bg-label-primary">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                </div>
                <div>
                    <span class="fw-medium">${permission.name}</span>
                </div>
            </div>`,
        2: permission.created_at,
        3: permission.updated_at,
        4: `<div class="d-inline-flex">
                <button type="button" class="btn btn-sm btn-icon btn-outline-primary me-2"
                    data-bs-toggle="modal" data-bs-target="#EditPermissionModal"
                    data-id="${permission.id}" data-name="${permission.name}"
                    onclick="openEditModal(this)" title="Edit Permission">
                    <i class="fa-solid fa-pen"></i>
                </button>
                <button type="button" class="btn btn-sm btn-icon btn-outline-danger"
                    onclick="confirmDelete('${permission.id}', '${permission.name}')" title="Delete Permission">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>`
    };
}

// Helper function to add a row to the DataTable
function addRowToDataTable(rowData) {
    permissionsDataTable.row.add(Object.values(rowData)).draw();
}

// Open Edit Modal with permission data
function openEditModal(element) {
    const id = element.getAttribute('data-id');
    const name = element.getAttribute('data-name');
    document.getElementById('editPermissionId').value = id;
    document.getElementById('editPermissionName').value = name;
}

// Update permission
function updatePermission() {
    const idInput = document.getElementById('editPermissionId');
    const nameInput = document.getElementById('editPermissionName');
    const id = idInput.value;
    const name = nameInput.value.trim();

    if (!name) {
        nameInput.classList.add('is-invalid');
        return;
    } else {
        nameInput.classList.remove('is-invalid');
    }

    // Show loading state
    const btn = document.querySelector('#EditPermissionModal .btn-primary');
    const originalText = btn.innerHTML;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...';
    btn.disabled = true;

    fetch("{{ route('permissionEditUpdate') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            id: id,
            name: name
        })
    })
    .then(response => response.json())
    .then(response => {
        if (response.success) {
            // Close modal
            const editModal = document.getElementById('EditPermissionModal');
            const modalInstance = bootstrap.Modal.getInstance(editModal);
            modalInstance.hide();

            notyf.success('Permission updated successfully.');
            
            // Update the row in the DataTable
            updateDataTableRow(id, name, response.permission.updated_at);
        } else {
            notyf.error('Failed to update permission.');
        }
    })
    .catch(error => {
        notyf.error('Something went wrong. Please try again.');
        console.error('Error:', error);
    })
    .finally(() => {
        // Reset button state
        btn.innerHTML = originalText;
        btn.disabled = false;
    });
}

// Function to update a row in the DataTable
function updateDataTableRow(id, name, updatedAt) {
    // Find the row with the matching data-id
    const rows = permissionsDataTable.rows().nodes();
    for (let i = 0; i < rows.length; i++) {
        const editButton = rows[i].querySelector(`button[data-id="${id}"]`);
        if (editButton) {
            const rowData = permissionsDataTable.row(rows[i]).data();
            
            // Update the name cell
            rowData[1] = `<div class="d-flex align-items-center">
                <div class="avatar avatar-sm me-3">
                    <div class="avatar-initial rounded-circle bg-label-primary">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                </div>
                <div>
                    <span class="fw-medium">${name}</span>
                </div>
            </div>`;
            
            // Update the updated_at cell
            rowData[3] = updatedAt;
            
            // Update the actions cell to reflect the new name
            rowData[4] = `<div class="d-inline-flex">
                <button type="button" class="btn btn-sm btn-icon btn-outline-primary me-2"
                    data-bs-toggle="modal" data-bs-target="#EditPermissionModal"
                    data-id="${id}" data-name="${name}"
                    onclick="openEditModal(this)" title="Edit Permission">
                    <i class="fa-solid fa-pen"></i>
                </button>
                <button type="button" class="btn btn-sm btn-icon btn-outline-danger"
                    onclick="confirmDelete('${id}', '${name}')" title="Delete Permission">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>`;
            
            // Redraw the row with the updated data
            permissionsDataTable.row(rows[i]).data(rowData).draw(false);
            break;
        }
    }
}

// Confirm delete permission
function confirmDelete(id, name) {
    Swal.fire({
        title: 'Are you sure?',
        text: `You are about to delete permission: "${name}"`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            deletePermission(id, name);
        }
    });
}

// Delete permission
function deletePermission(id, name) {
    fetch("{{ url('permissions/delete') }}/" + id, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(response => {
        if (response.success) {
            notyf.success('Permission deleted successfully.');
            
            // Remove the row from the DataTable
            removeRowFromDataTable(id);
        } else {
            notyf.error('Failed to delete permission.');
        }
    })
    .catch(error => {
        notyf.error('Something went wrong. Please try again.');
        console.error('Error:', error);
    });
}

// Function to remove a row from the DataTable
function removeRowFromDataTable(id) {
    // Find the row with the delete button that has the matching onclick attribute
    const rows = permissionsDataTable.rows().nodes();
    for (let i = 0; i < rows.length; i++) {
        const deleteButton = rows[i].querySelector(`button[onclick*="confirmDelete('${id}"]`);
        if (deleteButton) {
            // Remove the row
            permissionsDataTable.row(rows[i]).remove().draw();
            
            // Update serial numbers
            updateSerialNumbers();
            break;
        }
    }
}

// Function to update serial numbers after deletion
function updateSerialNumbers() {
    const rows = permissionsDataTable.rows();
    rows.every(function(index) {
        const data = this.data();
        data[0] = index + 1;
        this.data(data);
    });
    permissionsDataTable.draw(false);
}
</script>
@endsection