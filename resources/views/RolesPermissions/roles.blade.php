@extends('layouts/contentNavbarLayout')

@section('title', 'Permissions Management')

@section('vendor-style')
<style>
    /* Add vertical padding to the row */
    #permissionsTable_length,
    #permissionsTable_filter {
        padding-top: 10px;
        padding-bottom: 10px;
    }

    /* Align search input to the end of the column */
    #permissionsTable_filter {
        display: flex;
        justify-content: flex-end;
    }

    .swal-toast-zindex {
        z-index: 9999 !important;
    }
</style>

@endsection

@section('content')
<!-- Permissions Management Card -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="card-title mb-0">Roles Management</h5>
                    <button type="button" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                        data-bs-target="#addRolesModal">
                        <i class="fa-solid fa-plus me-2"></i>
                        <span>Add Role</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="rolesTable"
                            class="table table-hover table-striped align-middle dt-responsive nowrap w-100">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Role Name</th>
                                    <th width="20%">Created At</th>
                                    <th width="20%">Updated At</th>
                                    <th width="10%" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $sr = 1;
                                @endphp
                                @foreach($roles as $role)
                                <tr>
                                    <td>{{ $sr++ }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->created_at }}</td>
                                    <td>{{ $role->updated_at }}</td>
                                    <td class="text-center">
                                        <div class="d-inline-flex">
                                            <button type="button" class="btn btn-sm btn-icon btn-outline-primary me-2"
                                                data-bs-toggle="modal" data-bs-target="#EditRoleModal"
                                                data-id="{{ $role->id }}" data-name="{{ $role->name }}"
                                                onclick="openEditRoleModal(this)">
                                                <i class="fa-solid fa-pen"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-icon btn-outline-danger"
                                                onclick="confirmRoleDelete('{{ $role->id }}', '{{ $role->name }}')">
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
    </div>
</div>


<!-- Add Roles Modal -->
<div class="modal fade" id="addRolesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addRoleForm">
                    <div class="mb-3">
                        <label for="roleInput" class="form-label">Role Name</label>
                        <input type="text" id="roleInput" class="form-control" placeholder="Enter role name">
                        <div class="invalid-feedback">Please enter a valid role name.</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveRoleBtn">
                    <i class="fa-solid fa-save me-1"></i> Save
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Edit Permission Modal -->
<div class="modal fade" id="EditRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editRoleForm">
                    <input type="hidden" id="editRoleId">
                    <div class="mb-3">
                        <label for="editRoleName" class="form-label">Role Name</label>
                        <input type="text" id="editRoleName" class="form-control" placeholder="Enter role name">
                        <div class="invalid-feedback">Please enter a valid role name.</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updateRole()">
                    <i class="fa-solid fa-save me-1"></i> Update
                </button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('vendor-script')
<!-- SweetAlert2 JS -->

@endsection

@section('page-script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize DataTable with advanced options
        const permissionsTable = document.getElementById('rolesTable');
        const dataTable = new DataTable(permissionsTable, {
            responsive: true,
            order: [
                [0, 'asc']
            ],
            language: {
                search: '<i class="fa-solid fa-search"></i>',
                searchPlaceholder: 'Search roles...',
                emptyTable: '<div class="text-center p-4"><i class="fa-solid fa-database fa-2x text-muted mb-3"></i><p>No roles found</p></div>',
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

        });

        // We'll create buttons later when appending to container

        // Add the export buttons to the proper container
        // const buttonsContainer = document.querySelector('#permissionsTable_wrapper .col-md-6:nth-child(1)');

        // Create buttons and get their container node
        // const buttons = new DataTable.Buttons(dataTable, {
        //     buttons: [{
        //         extend: 'collection',
        //         text: '<i class="fa-solid fa-download me-1"></i> Export',
        //         className: 'btn btn-sm btn-outline-primary ms-2',
        //         buttons: [
        //             'csv', 'excel', 'pdf', 'print'
        //         ]
        //     }]
        // });

        // The .container() method returns a jQuery object in DataTables, so we need to 
        // access its DOM node in vanilla JS
        // const buttonNode = buttons.container();

        // Check if we have a valid node to append
        // if (buttonsContainer && buttonNode && buttonNode.nodeType === Node.ELEMENT_NODE) {
        //     buttonsContainer.appendChild(buttonNode);
        // } else if (buttonsContainer && buttonNode && buttonNode[0]) {
        //     // If buttonNode is a jQuery object or array-like object
        //     buttonsContainer.appendChild(buttonNode[0]);
        // }


        // add new roles script-----------------------------------------------------------------------------
        const saveRoleBtn = document.getElementById('saveRoleBtn');
        if (saveRoleBtn) {
            saveRoleBtn.addEventListener('click', function() {
                const roleInput = document.getElementById('roleInput');
                const roleName = roleInput.value.trim();

                // Validate input
                if (!roleName) {
                    roleInput.classList.add('is-invalid');
                    return;
                } else {
                    roleInput.classList.remove('is-invalid');
                }

                // Show loading state
                const originalText = this.innerHTML;
                this.innerHTML =
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';
                this.disabled = true;

                // Send fetch request
                fetch("{{ route('roles_store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": '{{ csrf_token() }}',
                            "Accept": "application/json"
                        },
                        body: JSON.stringify({
                            name: roleName
                        })
                    })
                    .then(response => response.json())
                    .then(response => {
                        if (response.success) {
                            // Close modal and reset form
                            const modalElement = document.getElementById('addRolesModal');
                            if (modalElement) {
                                const modalInstance = bootstrap.Modal.getOrCreateInstance(modalElement);
                                modalInstance.hide();
                            }
                            roleInput.value = '';

                            // Add new row to DataTable
                            const newRow = [
                                dataTable.rows().count() + 1,
                                response.role.name,
                                response.role.created_at,
                                response.role.updated_at,
                                `<div class="d-inline-flex">
                            <button type="button" class="btn btn-sm btn-icon btn-outline-primary me-2"
                                data-bs-toggle="modal" data-bs-target="#EditPermissionModal"
                                data-id="${response.role.id}" data-name="${response.role.name}"
                                onclick="openEditModal(this)">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-icon btn-outline-danger" 
                                onclick="confirmDelete(${response.role.id}, '${response.role.name}')">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>`
                            ];

                            dataTable.row.add(newRow).draw(false);
                            showToast('Success', 'Role added successfully.', 'bx bx-check',
                                'bg-success');
                        } else {
                            showToast('Error', 'Failed to add role.', 'bx bx-error', 'bg-danger');
                        }
                    })
                    .catch(error => {
                        showToast('Error', 'Something went wrong. Please try again.', 'bx bx-error',
                            'bg-danger');
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




    // Open Role Edit Modal
    function openEditRoleModal(element) {
        const id = element.getAttribute('data-id');
        const name = element.getAttribute('data-name');
        document.getElementById('editRoleId').value = id;
        document.getElementById('editRoleName').value = name;
    }

    // Update Role
    function updateRole() {
        const idInput = document.getElementById('editRoleId');
        const nameInput = document.getElementById('editRoleName');
        const id = idInput.value;
        const name = nameInput.value.trim();

        if (!name) {
            nameInput.classList.add('is-invalid');
            return;
        } else {
            nameInput.classList.remove('is-invalid');
        }

        // Show loading state
        const btn = document.querySelector('#EditRoleModal .btn-primary');
        const originalText = btn.innerHTML;
        btn.innerHTML =
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...';
        btn.disabled = true;

        fetch("{{ route('roles_update') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    id,
                    name
                })
            })
            .then(response => response.json())
            .then(response => {
                if (response.success) {
                    // Close modal
                    const editModal = document.getElementById('EditRoleModal');
                    // const modalInstance = bootstrap.Modal.getInstance(editModal);
                    // modalInstance.hide();
                    if (editModal) {
                        const modalInstance = bootstrap.Modal.getOrCreateInstance(editModal);
                        modalInstance.hide();
                    }

                    // Update the DataTable row
                    const rowButton = document.querySelector(`#rolesTable button[data-id="${id}"]`);
                    if (rowButton) {
                        const tr = rowButton.closest('tr');
                        const dataTable = $('#rolesTable').DataTable();

                        const rowIndex = dataTable.row(tr).index();
                        const rowData = dataTable.row(tr).data();

                        rowData[1] = name; // Column 1: Role name
                        rowData[3] = response.role.updated_at || new Date().toLocaleString(); // Column 3: Updated At

                        dataTable.row(rowIndex).data(rowData).draw(false);
                    }

                    showToast('Success', 'Role updated successfully.', 'bx bx-check', 'bg-success');
                } else {
                    showToast('Error', 'Failed to update role.', 'bx bx-error', 'bg-danger');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Error', 'Something went wrong. Please try again.', 'bx bx-error', 'bg-danger');
            })
            .finally(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
            });
    }



    // Confirm delete role
    function confirmRoleDelete(id, name) {
        Swal.fire({
            title: 'Are you sure?',
            text: `You are about to delete role: "${name}"`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteRole(id, name);
            }
        });
    }

    // Delete role
    function deleteRole(id, name) {
        fetch("{{ url('roles/delete') }}/" + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(response => {
                if (response.success) {
                    const dataTable = $('#rolesTable').DataTable();
                    const deleteButton = document.querySelector(
                        `button[onclick="confirmRoleDelete('${response.role.id}', '${response.role.name}')"]`
                    );

                    if (deleteButton) {
                        const row = deleteButton.closest('tr');
                        dataTable.row(row).remove().draw();
                    }

                    showToast('Success', 'Role deleted successfully.', 'bx bx-check', 'bg-success');
                } else {
                    showToast('Error', 'Failed to delete role.', 'bx bx-error', 'bg-danger');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Error', 'Something went wrong. Please try again.', 'bx bx-error', 'bg-danger');
            });
    }


    // function toshow the toast-----------------------------------------
    function showToast(title, message, iconClass, bgColor) {
        const toastHTML = `
        <div class="bs-toast toast fade show ${bgColor} text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header ${bgColor} text-white">
                <i class='${iconClass} me-2'></i>
                <strong class="me-auto">${title}</strong>
           .     <small>Just now</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                ${message}
            </div>
        </div>
    `;

        document.getElementById('toast-container').insertAdjacentHTML('beforeend', toastHTML);

        const toastEl = document.querySelector('#toast-container .toast:last-child');
        const bsToast = new bootstrap.Toast(toastEl, {
            delay: 3000
        });
        bsToast.show();
    }




    // Custom styling for DataTables
    window.addEventListener('load', function() {
        // Style search box
        const searchInputs = document.querySelectorAll('.dataTables_filter input');
        searchInputs.forEach(input => {
            input.classList.add('form-control-sm', 'rounded-pill', 'px-3');
            input.setAttribute('placeholder', 'Search permissions...');
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
    });
</script>
@endsection