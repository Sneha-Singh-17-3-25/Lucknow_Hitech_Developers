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
<!-- Users Management Card -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="card-title mb-0">Users Management</h5>
                    <button type="button" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                        data-bs-target="#addRolesModal">
                        <i class="fa-solid fa-plus me-2"></i>
                        <span>Add Role</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="usersTable"
                            class="table table-hover table-striped align-middle dt-responsive nowrap w-100">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Name</th>
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
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $sr++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td class="text-center">
                                        <div class="d-inline-flex">
                                            <button type="button" class="btn btn-sm btn-icon btn-outline-primary me-2"
                                                data-bs-toggle="modal" data-bs-target="#EditUserModal"
                                                data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                                                data-email="{{$user->email}}" data-mobile="{{$user->mobile}}"
                                                onclick="openEditUserModal(this)">
                                                <i class="fa-solid fa-pen"></i>
                                            </button>
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-outline-danger btn-delete-user"
                                                onclick="confirmUsersDelete('{{ $user->id }}', '{{ $user->name }}')">
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


<!-- Add Users Modal -->
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


<!-- Edit User Modal -->
<div class="modal fade" id="EditUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUserForm">
                    <input type="hidden" id="editUserId">
                    <div class="mb-3">
                        <label for="editUserName" class="form-label">Name</label>
                        <input type="text" id="editUserName" class="form-control" placeholder="Enter user name">
                        <div class="invalid-feedback">Please enter a valid name.</div>
                    </div>
                    <div class="mb-3">
                        <label for="editUserEmail" class="form-label">Email</label>
                        <input type="email" id="editUserEmail" class="form-control" placeholder="Enter user email">
                        <div class="invalid-feedback">Please enter a valid email.</div>
                    </div>
                    <div class="mb-3">
                        <label for="editUserMobile" class="form-label">Mobile</label>
                        <input type="text" id="editUserMobile" class="form-control" placeholder="Enter mobile number">
                        <div class="invalid-feedback">Please enter a valid mobile number.</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updateUser()">
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
    const permissionsTable = document.getElementById('usersTable');
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

    // We 'll create buttons later when appending to container

    // Add the
    // export buttons to the proper container
    // const buttonsContainer = document.querySelector('#permissionsTable_wrapper .col-md-6:nth-child(1)');

    // // Create buttons and get their container node
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

    // // The.container() method returns a jQuery object in DataTables, so we need to
    // // access its DOM node in vanilla JS
    // const buttonNode = buttons.container();

    // Check
    // // if we have a valid node to append
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

// Update User
function updateUser() {
    const id = document.getElementById('editUserId').value;
    const nameInput = document.getElementById('editUserName');
    const emailInput = document.getElementById('editUserEmail');
    const mobileInput = document.getElementById('editUserMobile');
    const name = nameInput.value.trim();
    const email = emailInput.value.trim();
    const mobile = mobileInput.value.trim();

    let valid = true;

    if (!name) {
        nameInput.classList.add('is-invalid');
        valid = false;
    } else {
        nameInput.classList.remove('is-invalid');
    }

    if (!/^[6-9]\d{9}$/.test(mobile)) {
        mobileInput.classList.add('is-invalid');
        valid = false;
    } else {
        mobileInput.classList.remove('is-invalid');
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        emailInput.classList.add('is-invalid');
        valid = false;
    } else {
        emailInput.classList.remove('is-invalid');
    }

    if (!valid) return;

    const btn = document.querySelector('#EditUserModal .btn-primary');
    const originalText = btn.innerHTML;
    btn.innerHTML =
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...';
    btn.disabled = true;

    fetch("{{ route('users_update') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                id,
                name,
                email,
                mobile
            })
        })
        .then(response => response.json())
        .then(response => {
            if (response.success) {
                const modal = bootstrap.Modal.getInstance(document.getElementById('EditUserModal'));
                modal.hide();
                document.body.classList.remove('modal-open');
                document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());


                const rowButton = document.querySelector(`#usersTable button[data-id="${id}"]`);
                if (rowButton) {
                    const tr = rowButton.closest('tr');
                    const dataTable = $('#usersTable').DataTable();

                    const rowIndex = dataTable.row(tr).index();
                    const rowData = dataTable.row(tr).data();

                    rowData[1] = name; // Name
                    rowData[2] = email;
                    rowData[3] = mobile; // Mobile

                    dataTable.row(rowIndex).data(rowData).draw(false);
                }

                showToast('Success', 'User updated successfully.', 'bx bx-check', 'bg-success');
            } else {
                showToast('Error', 'Failed to update user.', 'bx bx-error', 'bg-danger');
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
function confirmUsersDelete(id, name) {
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
            deleteUsers(id);
        }
    });
}

// Delete role
function deleteUsers(id) {
    fetch("{{ url('users/delete') }}/" + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(response => {
            console.log(response); // corrected: "consol.log" → "console.log"

            if (response.success) {
                const dataTable = $('#usersTable').DataTable();
                const deleteButton = document.querySelector(
                    `button[onclick="confirmUsersDelete('${response.user.id}', '${response.user.name}','${response.user.email}','${response.user.mobile}','${response.user.created_at}')"]`
                );

                const row = $(`#usersTable .btn-delete-user[data-id="${id}"]`).closest('tr');
                dataTable.row(row).remove().draw();
                showToast('Success', 'User deleted successfully.', 'bx bx-check', 'bg-success');

                // 🔄 Refresh the page after short delay
                setTimeout(() => {
                    location.reload();
                }, 400); // delay 1 second (optional, for showing toast)
            } else {
                showToast('Error', 'Failed to delete User.', 'bx bx-error', 'bg-danger');
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
        <div class="bs-toast toast fade show ${bgColor} text-white" role="alert" aria-live="assertive" aria-atomUic="true">
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