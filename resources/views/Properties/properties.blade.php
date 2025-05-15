<style>
div.dataTables_wrapper div.dataTables_length label {
    margin-left: 10px;
}

div.dataTables_wrapper div.dataTables_info {
    margin-left: 10px;
    margin-bottom: 10px;
}

div.dataTables_wrapper div.dataTables_filter label {
    margin-right: 10px;
}

button:not(:disabled),
[type=button]:not(:disabled),
[type=reset]:not(:disabled),
[type=submit]:not(:disabled) {
    margin-right: 10px;
}


div.dataTables_wrapper div.dataTables_paginate ul.pagination {
    margin-right: 20px;
    margin-top: 10px;
}
</style>




@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Properties Table')


@section('content')
<!-- <h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Tables /</span> Users Table
</h4> -->

<!-- Bootstrap DataTable -->
<div class="card">
    <!-- Table will have its header inserted by DataTables initComplete -->
    <div class="card-datatable table-responsive">
        <table class="table border-top dt-responsive nowrap" id="projectTable">
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Client</th>
                    <th>Users</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <tr>
                    <td><i class="bx bxl-angular bx-sm text-danger me-3"></i> <span class="fw-medium">Angular
                            Project</span></td>
                    <td>Albert Cook</td>
                    <td>
                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                <img src="{{asset('assets/img/avatars/5.png')}}" alt="Avatar" class="rounded-circle">
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                <img src="{{asset('assets/img/avatars/6.png')}}" alt="Avatar" class="rounded-circle">
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                class="avatar avatar-xs pull-up" title="Christina Parker">
                                <img src="{{asset('assets/img/avatars/7.png')}}" alt="Avatar" class="rounded-circle">
                            </li>
                        </ul>
                    </td>
                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"><i
                                        class="fa-solid fa-pen fa-beat"></i>
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);"><i
                                        class="fa-solid fa-trash fa-beat"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><i class="bx bxl-react bx-sm text-info me-3"></i> <span class="fw-medium">React Project</span>
                    </td>
                    <td>Barry Hunter</td>
                    <td>
                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                <img src="{{asset('assets/img/avatars/5.png')}}" alt="Avatar" class="rounded-circle">
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                <img src="{{asset('assets/img/avatars/6.png')}}" alt="Avatar" class="rounded-circle">
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                class="avatar avatar-xs pull-up" title="Christina Parker">
                                <img src="{{asset('assets/img/avatars/7.png')}}" alt="Avatar" class="rounded-circle">
                            </li>
                        </ul>
                    </td>
                    <td><span class="badge bg-label-success me-1">Completed</span></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i>
                                    Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i>
                                    Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><i class="bx bxl-vuejs bx-sm text-success me-3"></i> <span class="fw-medium">VueJs
                            Project</span></td>
                    <td>Trevor Baker</td>
                    <td>
                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                <img src="{{asset('assets/img/avatars/5.png')}}" alt="Avatar" class="rounded-circle">
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                <img src="{{asset('assets/img/avatars/6.png')}}" alt="Avatar" class="rounded-circle">
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                class="avatar avatar-xs pull-up" title="Christina Parker">
                                <img src="{{asset('assets/img/avatars/7.png')}}" alt="Avatar" class="rounded-circle">
                            </li>
                        </ul>
                    </td>
                    <td><span class="badge bg-label-info me-1">Scheduled</span></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i>
                                    Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i>
                                    Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><i class="bx bxl-bootstrap bx-sm text-primary me-3"></i> <span class="fw-medium">Bootstrap
                            Project</span></td>
                    <td>Jerry Milton</td>
                    <td>
                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                <img src="{{asset('assets/img/avatars/5.png')}}" alt="Avatar" class="rounded-circle">
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                <img src="{{asset('assets/img/avatars/6.png')}}" alt="Avatar" class="rounded-circle">
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                class="avatar avatar-xs pull-up" title="Christina Parker">
                                <img src="{{asset('assets/img/avatars/7.png')}}" alt="Avatar" class="rounded-circle">
                            </li>
                        </ul>
                    </td>
                    <td><span class="badge bg-label-warning me-1">Pending</span></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i>
                                    Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i>
                                    Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form id="propertyForm" class="needs-validation" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title">Add New Property</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="propertyName" class="form-label">Property Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="propertyName" class="form-control" placeholder="Enter property name"
                                required>
                            <div class="invalid-feedback">Please enter the property name.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="propertyPrice" class="form-label">Price (₹) <span
                                    class="text-danger">*</span></label>
                            <input type="number" id="propertyPrice" class="form-control" placeholder="Enter price"
                                required min="1">
                            <div class="invalid-feedback">Please enter a valid price greater than 0.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Features</label>
                            <div id="featuresWrapper">
                                <div class="input-group mb-2">
                                    <input type="text" name="features[]" class="form-control"
                                        placeholder="Enter a feature">
                                    <button type="button" class="btn btn-secondary addFeatureBtn">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Property Images</label>
                            <div id="imagesWrapper">
                                <div class="input-group mb-2">
                                    <input type="file" name="images[]" class="form-control" accept="image/*">
                                    <button type="button" class="btn btn-secondary addImageBtn">+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 🆕 Property Title Field -->
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="propertyTitle" class="form-label">Property Title <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="propertyTitle" class="form-control"
                                placeholder="Enter property title" required>
                            <div class="invalid-feedback">Property title is required.</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="propertyDescription" class="form-label">Description</label>
                            <textarea id="propertyDescription" class="form-control" rows="3"
                                placeholder="Enter description (optional)"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="propertyAddress" class="form-label">Address <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="propertyAddress" class="form-control" placeholder="Enter address"
                                required>
                            <div class="invalid-feedback">Address is required.</div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4 mb-3">
                            <label for="propertyCity" class="form-label">City <span class="text-danger">*</span></label>
                            <input type="text" id="propertyCity" class="form-control" placeholder="Enter city" required>
                            <div class="invalid-feedback">City is required.</div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="propertyState" class="form-label">State <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="propertyState" class="form-control" placeholder="Enter state"
                                required>
                            <div class="invalid-feedback">State is required.</div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="propertyPincode" class="form-label">Pincode <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="propertyPincode" class="form-control"
                                placeholder="Enter 6-digit pincode" required pattern="^\d{6}$">
                            <div class="invalid-feedback">Please enter a valid 6-digit pincode.</div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-secondary">Save Property</button>
                </div>
            </form>
        </div>
    </div>
</div>





<script>
document.addEventListener('DOMContentLoaded', function() {
    // DataTable initialization
    const projectTable = new DataTable('#projectTable', {
        processing: true,
        responsive: true,
        // Default ordering (sorting)
        order: [
            [0, 'asc']
        ],
        // Search, pagination, and info display
        searching: true,
        paging: true,
        info: true,
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50, 75, 100],

        // DOM layout configuration
        dom: '<"card-header d-flex flex-column flex-md-row align-items-center justify-content-between"' +
            '<"head-label text-center"><"dt-action-buttons text-end"B>>' +
            '<"row"' +
            '<"col-sm-12 col-md-6"l>' +
            '<"col-sm-12 col-md-6"f>>' +
            '<"table-responsive"t>' +
            '<"row"' +
            '<"col-sm-12 col-md-6"i>' +
            '<"col-sm-12 col-md-6"p>>',

        // Buttons definition
        buttons: [{
            extend: 'collection',
            className: 'btn btn-label-primary dropdown-toggle me-2',
            text: '<i class="bx bx-export me-1"></i> Export',
            buttons: [{
                    extend: 'print',
                    text: '<i class="bx bx-printer me-1"></i> Print',
                    className: 'dropdown-item'
                },
                {
                    extend: 'csv',
                    text: '<i class="bx bx-file me-1"></i> CSV',
                    className: 'dropdown-item'
                },
                {
                    extend: 'excel',
                    text: '<i class="bx bx-file me-1"></i> Excel',
                    className: 'dropdown-item'
                },
                {
                    extend: 'pdf',
                    text: '<i class="bx bx-file-pdf me-1"></i> PDF',
                    className: 'dropdown-item'
                }
            ]
        }],

        // Initialized the header title
        initComplete: function() {
            const headerTitle = document.querySelector('.head-label');
            if (headerTitle) {
                headerTitle.innerHTML = '<h5 class="card-title mb-0">Properties Table</h5>';
            }

            // Add User button
            const addUserBtn = document.createElement('button');
            addUserBtn.innerHTML =
                '<i class="bx bx-plus me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Add New User</span>';
            addUserBtn.className = 'btn btn-primary';
            addUserBtn.addEventListener('click', function() {
                const myModal = new bootstrap.Modal(document.getElementById(
                    'addUserModal'));
                myModal.show();
            });

            const buttonsContainer = document.querySelector('.dt-action-buttons');
            if (buttonsContainer) {
                buttonsContainer.prepend(addUserBtn);
            }
        }
    });

    // Initialize tooltips for the table
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>
<!--/ Bootstrap DataTable -->

<!-- script for modal validation -->
<script>
(function() {
    'use strict';
    const form = document.getElementById('propertyForm');
    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            alert('Form is valid and ready to submit!');
            const modal = bootstrap.Modal.getInstance(document.getElementById('addUserModal'));
            modal.hide();
        }
        form.classList.add('was-validated');
    }, false);
})();
</script>


<!-- features and images input fields script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add more features
    document.querySelector('#featuresWrapper').addEventListener('click', function(e) {
        if (e.target.classList.contains('addFeatureBtn')) {
            const newFeature = document.createElement('div');
            newFeature.classList.add('input-group', 'mb-2');
            newFeature.innerHTML = `
                <input type="text" name="features[]" class="form-control" placeholder="Enter a feature">
                <button type="button" class="btn btn-danger removeFeatureBtn">−</button>
            `;
            this.appendChild(newFeature);
        } else if (e.target.classList.contains('removeFeatureBtn')) {
            e.target.parentElement.remove();
        }
    });

    // Add more images
    document.querySelector('#imagesWrapper').addEventListener('click', function(e) {
        if (e.target.classList.contains('addImageBtn')) {
            const newImage = document.createElement('div');
            newImage.classList.add('input-group', 'mb-2');
            newImage.innerHTML = `
                <input type="file" name="images[]" class="form-control" accept="image/*">
                <button type="button" class="btn btn-danger removeImageBtn">−</button>
            `;
            this.appendChild(newImage);
        } else if (e.target.classList.contains('removeImageBtn')) {
            e.target.parentElement.remove();
        }
    });
});
</script>





@endsection