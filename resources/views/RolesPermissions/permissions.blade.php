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
            <div class="card shadow-sm  mb-4">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="card-title mb-0">Permissions Management</h5>
                    <button type="button" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                        data-bs-target="#addPermissionModal">
                        <i class="fa-solid fa-plus me-2"></i>
                        <span>Add Permission</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="permissionsTable"
                            class="table table-hover table-striped align-middle dt-responsive nowrap w-100">
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
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->created_at }}</td>
                                    <td>{{ $permission->updated_at }}</td>
                                    <td class="text-center">
                                        <div class="d-inline-flex">
                                            <button type="button" class="btn btn-sm btn-icon btn-outline-primary me-2"
                                                data-bs-toggle="modal" data-bs-target="#EditPermissionModal"
                                                data-id="{{ $permission->id }}" data-name="{{ $permission->name }}"
                                                onclick="openEditModal(this)">
                                                <i class="fa-solid fa-pen"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-icon btn-outline-danger"
                                                onclick="confirmDelete('{{ $permission->id }}', '{{ $permission->name }}')">
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

@endsection

@section('page-script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize DataTable with advanced options
    const permissionsTable = document.getElementById('permissionsTable');
    const dataTable = new DataTable(permissionsTable, {
        responsive: true,
        order: [
            [0, 'asc']
        ],
        language: {
            search: '<i class="fa-solid fa-search"></i>',
            searchPlaceholder: 'Search permissions...',
            emptyTable: '<div class="text-center p-4"><i class="fa-solid fa-database fa-2x text-muted mb-3"></i><p>No permissions found</p></div>',
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
            this.innerHTML =
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';
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

                        // Add new row to DataTable
                        const newRow = [
                            dataTable.rows().count() + 1,
                            response.permission.name,
                            response.permission.created_at,
                            response.permission.updated_at,
                            `<div class="d-inline-flex">
                            <button type="button" class="btn btn-sm btn-icon btn-outline-primary me-2"
                                data-bs-toggle="modal" data-bs-target="#EditPermissionModal"
                                data-id="${response.permission.id}" data-name="${response.permission.name}"
                                onclick="openEditModal(this)">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-icon btn-outline-danger" 
                                onclick="confirmDelete(${response.permission.id}, '${response.permission.name}')">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>`
                        ];

                        dataTable.row.add(newRow).draw(false);
                        showToast('Success', 'Permission added successfully.', 'bx bx-check ',
                            'bg-success');

                    } else {
                        showToast('Error', 'Failed to delete permission.', 'bx bx-error',
                            'bg-danger');
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

// Open Edit Modal with permission data----------------------------------------------------------------------------
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
    btn.innerHTML =
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...';
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

                // Update row in table
                const table = new DataTable('#permissionsTable');
                let rowFound = false;

                const row = document.querySelector(`button[data-id="${id}"]`);

                // const row = document.querySelector(`button[data-id="${id}"]`);

                if (row) {
                    const tr = row.closest('tr'); // get the <tr> element
                    const dataTable = $('#permissionsTable').DataTable(); // jQuery-style access

                    const rowIndex = dataTable.row(tr).index();

                    // Update the row data (example: updating name and updated_at)
                    const rowData = dataTable.row(tr).data();
                    rowData[1] = name; // assuming column 1 is the name
                    rowData[3] = Date.now(); // assuming column 3 is updated_at

                    dataTable.row(rowIndex).data(rowData).draw(false);
                }


                table.rows().every(function() {
                    const rowData = this.data();
                    if (rowData[0] === id.toString() || rowData[0] === parseInt(id)) {
                        rowData[1] = name;
                        rowData[3] = response.permission.updated_at || new Date().toLocaleString();
                        this.data(rowData);
                        rowFound = true;
                        return false; // Break the loop
                    }
                });

                showToast('Success', 'Permission Updated successfully.', 'bx bx-check ',
                    'bg-success');

                if (rowFound) {
                    table.draw(false);

                } else {
                    // If row not found, reload the page
                    // window.location.reload();
                    return;
                }

                // Show success notification
                showToast('Success', 'Permission Updated successfully.', 'bx bx-check ',
                    'bg-success');

            } else {
                showToast('Error', 'Failed to delete permission.', 'bx bx-error', 'bg-danger');
            }
        })
        .catch(error => {

            showToast('Error', 'Something went wrong. Please try again.', 'bx bx-error', 'bg-danger');
            console.error('Error:', error);
        })
        .finally(() => {
            // Reset button state
            btn.innerHTML = originalText;
            btn.disabled = false;
        });
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

                // Remove row from table
                const table = new DataTable('#permissionsTable');
                const deleteButton = document.querySelector(
                    `button[onclick="confirmDelete('${response.permission.id}', '${response.permission.name}')"]`
                );

                console.log(deleteButton);
                // console.log(response.permission.name);
                if (deleteButton) {
                    const row = deleteButton.closest('tr');
                    console.log(row);
                    table.row(row).remove().draw();
                }

                showToast('Success', 'Permission deleted successfully.', 'bx bx-check ', 'bg-success');

            } else {
                showToast('Error', 'Failed to delete permission.', 'bx bx-error', 'bg-danger');
            }
        })
        .catch(error => {
            showToast('Error', 'Something went wrong. Please try again.', 'bx bx-error', 'bg-danger');
            console.error('Error:', error);
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