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

    .reject-input:checked {
        background-color: red;
        border-color: red;
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
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Property Type</th>
                                    <th>Want For</th>
                                    <th>Status</th>
                                    <th>Plot Area</th>
                                    <th>Furnished</th>
                                    <th>price</th>
                                    <th>Approved Status</th>
                                    <!-- <th>Reject Status</th> -->
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $sr = 1;
                                @endphp
                                @foreach($allProperties as $property)
                                <tr>
                                    <td> {{$sr++}}</td>
                                    <td>{{$property->name}}</td>
                                    <td>{{$property->email}}</td>
                                    <td>{{$property->phone}}</td>
                                    <td>{{$property->property_type}}</td>
                                    <td>{{$property->want_for}}</td>
                                    <td>{{$property->poss_status}}</td>
                                    <td>{{$property->plot_area}}</td>
                                    <td>{{$property->furnished}}</td>
                                    <td>{{$property->price}}</td>
                                    <td class="text-center">
                                        <select class="form-select w-auto status-select" data-location-id="{{ $property->location_id }}" data-property-type="{{ $property->property_type }}">
                                            <option selected disabled>Select Status</option>
                                            <option value="approve">Approve</option>
                                            <option value="reject">Reject</option>
                                            <option value="pending">Pending</option>
                                        </select>
                                    </td>

                                    <td class="text-center">
                                        <div class="d-inline-flex">
                                            <button type="button" class="btn btn-sm btn-icon btn-outline-primary me-2"
                                                data-bs-toggle="modal" data-bs-target="#EditRoleModal"

                                                onclick="openEditRoleModal(this)">
                                                <i class="fa-solid fa-pen"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-icon btn-outline-danger">
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
            responsive: false,
            scrollX: true,

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
        const buttonsContainer = document.querySelector('#permissionsTable_wrapper .col-md-6:nth-child(1)');

        // Create buttons and get their container node
        const buttons = new DataTable.Buttons(dataTable, {
            buttons: [{
                extend: 'collection',
                text: '<i class="fa-solid fa-download me-1"></i> Export',
                className: 'btn btn-sm btn-outline-primary ms-2',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ]
            }]
        });

        // The .container() method returns a jQuery object in DataTables, so we need to 
        // access its DOM node in vanilla JS
        const buttonNode = buttons.container();

        // Check if we have a valid node to append
        if (buttonsContainer && buttonNode && buttonNode.nodeType === Node.ELEMENT_NODE) {
            buttonsContainer.appendChild(buttonNode);
        } else if (buttonsContainer && buttonNode && buttonNode[0]) {
            // If buttonNode is a jQuery object or array-like object
            buttonsContainer.appendChild(buttonNode[0]);
        }

    });



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


    // script for approved status 
    document.querySelectorAll('.status-select').forEach(select => {
        select.addEventListener('change', function() {
            const LocationId = this.dataset.locationId;
            const propertyType = this.dataset.propertyType;
            const status = this.value;

            // AJAX POST request to Laravel route
            fetch(`/update-property-status/${LocationId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        locationId:LocationId,
                        status: status,
                        property_type: propertyType
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Status updated:', data.message);
                })
                .catch(error => {
                    console.error('Error updating status:', error);
                });
        });
    });
</script>
@endsection