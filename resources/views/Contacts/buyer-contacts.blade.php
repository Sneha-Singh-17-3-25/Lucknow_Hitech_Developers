@extends('layouts/contentNavbarLayout')

@section('title', 'Users Management')

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

    #usersTable {
        width: 100% !important;
        margin-bottom: 0;
    }

    #usersTable th,
    #usersTable td {
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
</style>
@endsection

@section('content')
<!-- Filter Section -->
<div class="container-fluid">
    <div class="card filter-card mb-4">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 col-lg-3 mb-3 mb-md-0">
                    {{-- <label for="filter-name" class="form-label">Name</label> --}}
                    <input type="text" id="filter-name" onchange="applyFilters()" class="form-control" placeholder="Filter by name">
                </div>
                <div class="col-12 col-md-6 col-lg-2 mb-3 mb-md-0">
                    {{-- <label for="filter-email" class="form-label">Email</label> --}}
                    <input type="text" id="filter-email" class="form-control" placeholder="Filter by email">
                </div>
                <div class="col-12 col-md-6 col-lg-2 mb-3 mb-lg-0">
                    {{-- <label for="filter-mobile" class="form-label">Mobile</label> --}}
                    <input type="text" id="filter-mobile" class="form-control" placeholder="Filter by mobile">
                </div>
                <div class="col-12 col-md-6 col-lg-5  d-flex align-items-end">
                    <div class="row w-100 g-2">
                        <div class="col-6">
                            <button type="button" id="apply-filters" class="btn btn-primary w-100">
                                <i class="fa-solid fa-filter me-2"></i>Apply Filters
                            </button>
                        </div>
                        <div class="col-6">
                            <button type="button" id="reset-filters" class="btn btn-outline-secondary w-100">
                                <i class="fa-solid fa-rotate me-2"></i>Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Users Management Card -->
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h5 class="card-title mb-0">Buyer Contacts</h5>
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
                {{-- <button type="button" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="fa-solid fa-plus me-2"></i>
                    <span>Add User</span>
                </button> --}}
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="usersTable" class="table table-hover table-striped align-middle dt-responsive nowrap w-100">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">#</th>
                            <th>Property Type</th>
                            <th>Property Id</th>
                            <th>Seller Id</th>
                            <th>Buyer Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th width="20%">Created At</th>
                            <th width="10%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sr =1;
                        @endphp
                        @foreach ($buyerContacts as $buyer )
                        <tr>
                            <td>{{ $sr++ }}</td>
                            <td>
                                {{$buyer->property_type}}
                            </td>
                            <td>{{$buyer->property_id}}</td>
                            <td>{{$buyer->seller_id}}</td>
                            <td>{{$buyer->buyer_name}}</td>
                            <td>{{$buyer->email}}</td>
                            <td>{{$buyer->mobile}}</td>
                            <td>{{$buyer->created_at}}</td>
                            <td class="text-center">
                                <div class="d-inline-flex">
                                    <button type="button"
                                        class="btn btn-sm btn-icon btn-outline-danger btn-delete-user"
                                        title="Delete Buyer" onclick="confirmBuyerDelete({{ $buyer->id }}, '{{ $buyer->buyer_name }}')">
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


<!-- Toast Container -->
<div id="toast-container" class="position-fixed top-0 end-0 p-3" style="z-index: 1080;"></div>

@endsection

@section('vendor-script')
<!-- SweetAlert2 JS -->
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('page-script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize DataTable with advanced options
        const usersTable = document.getElementById('usersTable');
        const usersDataTable = new DataTable(usersTable, {
            responsive: true,
            order: [
                [0, 'asc']
            ],
            language: {
                search: '',
                searchPlaceholder: 'Search users...',
                emptyTable: '<div class="text-center p-4"><i class="fa-solid fa-users fa-2x text-muted mb-3"></i><p>No users found</p></div>',
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
            buttons: [{
                    extend: 'csv',
                    text: 'CSV',
                    className: 'btn btn-sm btn-outline-primary',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    className: 'btn btn-sm btn-outline-primary',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    className: 'btn btn-sm btn-outline-primary',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    className: 'btn btn-sm btn-outline-primary',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                }
            ]
        });

        // Make the dataTable globally accessible
        window.usersDataTable = usersDataTable;

        // Move the length control to the header
        const lengthControl = document.querySelector('.dataTables_length');
        const lengthControlContainer = document.getElementById('length-control-container');
        if (lengthControl && lengthControlContainer) {
            lengthControlContainer.appendChild(lengthControl);
        }

        // Style length menu
        const lengthSelects = document.querySelectorAll('.dataTables_length select');
        lengthSelects.forEach(select => {
            select.classList.add('form-select', 'form-select-sm', 'rounded-3');
        });

        // Export buttons functionality
        document.getElementById('export-csv').addEventListener('click', function(e) {
            e.preventDefault();
            usersDataTable.button('.buttons-csv').trigger();
        });

        document.getElementById('export-excel').addEventListener('click', function(e) {
            e.preventDefault();
            usersDataTable.button('.buttons-excel').trigger();
        });

        document.getElementById('export-pdf').addEventListener('click', function(e) {
            e.preventDefault();
            usersDataTable.button('.buttons-pdf').trigger();
        });

        document.getElementById('export-print').addEventListener('click', function(e) {
            e.preventDefault();
            usersDataTable.button('.buttons-print').trigger();
        });

        // Filter functionality
        document.getElementById('apply-filters').addEventListener('click', function() {
            applyFilters();
        });

        document.getElementById('reset-filters').addEventListener('click', function() {
            document.getElementById('filter-name').value = '';
            document.getElementById('filter-email').value = '';
            document.getElementById('filter-mobile').value = '';
            usersDataTable.search('').columns().search('').draw();
        });

        function applyFilters() {
            const nameFilter = document.getElementById('filter-name').value;
            const emailFilter = document.getElementById('filter-email').value;
            const mobileFilter = document.getElementById('filter-mobile').value;

            // Apply column-specific filtering
            usersDataTable.column(1).search(nameFilter);
            usersDataTable.column(2).search(emailFilter);
            usersDataTable.column(3).search(mobileFilter);

            usersDataTable.draw();
        }

        // Add new user script
        const saveUserBtn = document.getElementById('saveUserBtn');
        if (saveUserBtn) {
            saveUserBtn.addEventListener('click', function() {
                const nameInput = document.getElementById('nameInput');
                const emailInput = document.getElementById('emailInput');
                const mobileInput = document.getElementById('mobileInput');
                const passwordInput = document.getElementById('passwordInput');

                const name = nameInput.value.trim();
                const email = emailInput.value.trim();
                const mobile = mobileInput.value.trim();
                const password = passwordInput.value.trim();

                // Validate input
                let valid = true;

                if (!name) {
                    nameInput.classList.add('is-invalid');
                    valid = false;
                } else {
                    nameInput.classList.remove('is-invalid');
                }

                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    emailInput.classList.add('is-invalid');
                    valid = false;
                } else {
                    emailInput.classList.remove('is-invalid');
                }

                if (!/^[6-9]\d{9}$/.test(mobile)) {
                    mobileInput.classList.add('is-invalid');
                    valid = false;
                } else {
                    mobileInput.classList.remove('is-invalid');
                }

                if (!password || password.length < 6) {
                    passwordInput.classList.add('is-invalid');
                    valid = false;
                } else {
                    passwordInput.classList.remove('is-invalid');
                }

                if (!valid) return;

                // Show loading state
                const originalText = this.innerHTML;
                this.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';
                this.disabled = true;

                // Add your user creation API call here
                // This is a placeholder for the user creation API call
                // Replace with your actual API endpoint
                fetch("", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": '{{ csrf_token() }}',
                            "Accept": "application/json"
                        },
                        body: JSON.stringify({
                            name: name,
                            email: email,
                            mobile: mobile,
                            password: password
                        })
                    })
                    .then(response => response.json())
                    .then(response => {
                        if (response.success) {
                            // Close modal and reset form
                            const modalElement = document.getElementById('addUserModal');
                            if (modalElement) {
                                const modalInstance = bootstrap.Modal.getOrCreateInstance(modalElement);
                                modalInstance.hide();
                            }

                            // Reset form fields
                            nameInput.value = '';
                            emailInput.value = '';
                            mobileInput.value = '';
                            passwordInput.value = '';

                            notyf.success('User added successfully.');

                            // Add the new user to the DataTable
                            const newRowData = createUserRowData(response.user);
                            addRowToDataTable(newRowData);
                        } else {
                            notyf.error('Failed to add user.');
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

        // Style pagination
        const paginationDivs = document.querySelectorAll('.dataTables_paginate');
        paginationDivs.forEach(div => {
            div.classList.add('mt-3');
        });
    });

    // Helper function to create user row data
    function createUserRowData(user) {
        // Get the current number of rows for serial number
        const rowCount = window.usersDataTable.rows().count() + 1;

        return {
            DT_RowId: `user-${user.id}`,
            0: rowCount,
            1: `<div class="d-flex align-items-center">
                <div class="avatar avatar-sm me-3">
                    <div class="avatar-initial rounded-circle bg-label-primary">${user.name.charAt(0)}</div>
                </div>
                <div>
                    <span class="fw-medium">${user.name}</span>
                </div>
            </div>`,
            2: user.email,
            3: user.mobile,
            4: user.created_at,
            5: `<div class="d-inline-flex">
                <button type="button" class="btn btn-sm btn-icon btn-outline-primary me-2"
                    data-bs-toggle="modal" data-bs-target="#EditUserModal"
                    data-id="${user.id}" data-name="${user.name}"
                    data-email="${user.email}" data-mobile="${user.mobile}"
                    onclick="openEditUserModal(this)" title="Edit User">
                    <i class="fa-solid fa-pen"></i>
                </button>
                <button type="button" class="btn btn-sm btn-icon btn-outline-danger btn-delete-user"
                    onclick="confirmUsersDelete('${user.id}', '${user.name}')" 
                    title="Delete User">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>`
        };
    }

    // Helper function to add a row to the DataTable
    function addRowToDataTable(rowData) {
        window.usersDataTable.row.add(Object.values(rowData)).draw();
    }

    // Open User Edit Modal
    function openEditUserModal(element) {
        const id = element.getAttribute('data-id');
        const name = element.getAttribute('data-name');
        const email = element.getAttribute('data-email');
        const mobile = element.getAttribute('data-mobile');

        document.getElementById('editUserId').value = id;
        document.getElementById('editUserName').value = name;
        document.getElementById('editUserEmail').value = email;
        document.getElementById('editUserMobile').value = mobile;

        const editModal = new bootstrap.Modal(document.getElementById('EditUserModal'));
        editModal.show();
    }

    // Function to update a row in the DataTable
    function updateDataTableRow(id, name, email, mobile, updatedAt) {
        // Find the row with the matching data-id
        const rows = window.usersDataTable.rows().nodes();
        for (let i = 0; i < rows.length; i++) {
            const editButton = rows[i].querySelector(`button[data-id="${id}"]`);
            if (editButton) {
                const rowData = window.usersDataTable.row(rows[i]).data();

                // Update the name cell
                rowData[1] = `<div class="d-flex align-items-center">
                <div class="avatar avatar-sm me-3">
                    <div class="avatar-initial rounded-circle bg-label-primary">${name.charAt(0)}</div>
                </div>
                <div>
                    <span class="fw-medium">${name}</span>
                </div>
            </div>`;

                // Update email and mobile cells
                rowData[2] = email;
                rowData[3] = mobile;

                // Update the actions cell to reflect the new data
                rowData[5] = `<div class="d-inline-flex">
                <button type="button" class="btn btn-sm btn-icon btn-outline-primary me-2"
                    data-bs-toggle="modal" data-bs-target="#EditUserModal"
                    data-id="${id}" data-name="${name}"
                    data-email="${email}" data-mobile="${mobile}"
                    onclick="openEditUserModal(this)" title="Edit User">
                    <i class="fa-solid fa-pen"></i>
                </button>
                <button type="button" class="btn btn-sm btn-icon btn-outline-danger btn-delete-user"
                    onclick="confirmUsersDelete('${id}', '${name}')" 
                    title="Delete User">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>`;

                // Redraw the row with the updated data
                window.usersDataTable.row(rows[i]).data(rowData).draw(false);
                break;
            }
        }
    }

    // Confirm delete user
    function confirmBuyerDelete(id, name) {
        Swal.fire({
            title: 'Are you sure?',
            text: `You are about to delete buyer: "${name}"`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteBuyer(id);
            }
        });
    }

    // Delete user
    function deleteBuyer(id) {
        fetch("{{ url('buyer-contacts/delete') }}/" + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(response => {
                if (response.success) {
                    notyf.success('Buyer contact deleted successfully.');
                    // Optionally remove row manually if not using DataTables
                    location.reload(); // Or removeRowFromDataTable(id);
                } else {
                    notyf.error('Failed to delete buyer contact.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                notyf.error('Something went wrong. Please try again.');
            });
    }

    // Function to remove a row from the DataTable
    function removeRowFromDataTable(id) {
        // Find the row with the delete button that has the matching onclick attribute
        const rows = window.usersDataTable.rows().nodes();
        for (let i = 0; i < rows.length; i++) {
            const deleteButton = rows[i].querySelector(`button[onclick*="confirmUsersDelete('${id}"]`);
            if (deleteButton) {
                // Remove the row
                window.usersDataTable.row(rows[i]).remove().draw();

                // Update serial numbers
                updateSerialNumbers();
                break;
            }
        }
    }

    // Function to update serial numbers after deletion
    function updateSerialNumbers() {
        const rows = window.usersDataTable.rows();
        rows.every(function(index) {
            const data = this.data();
            data[0] = index + 1;
            this.data(data);
        });
        window.usersDataTable.draw(false);
    }
</script>
@endsection