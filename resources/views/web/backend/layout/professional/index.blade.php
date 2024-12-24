@extends('web.backend.app')

@section('title', ' Verifications List')

@push('style')
    <style>
        .custom-confirm-button {
            background-color: #ff5108 !important;
            /* Green */
            color: white !important;
        }

        .custom-cancel-button {
            background-color: #f72213 !important;
            /* Red */
            color: white !important;
        }

        /* Optional: Change button on hover */
        .custom-confirm-button:hover {
            background-color: #ff4e02;
            /* Darker green */
        }

        .custom-cancel-button:hover {
            background-color: #f51808;
            ;
            /* Darker red */
        }
    </style>
    <link rel="stylesheet" href="{{ asset('backend/vendors/datatable/css/datatables.min.css') }}">
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Business Verifications List</h4>
                        {{-- <div style="display: flex;justify-content: end;">
                            <a href="" class="btn btn-primary">Add User</a>
                        </div> --}}
                        <div class="table-responsive mt-4 p-4">
                            <table class="table table-hover" id="data-table">
                                <thead>
                                    <tr>
                                        <th>SI</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Web Url</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    {{-- Datatable --}}
    <script src="{{ asset('backend/vendors/datatable/js/datatables.min.js') }}"></script>
    {{-- sweet alart --}}
    <script src="{{ asset('backend/vendors/sweetalert/sweetalert2@11.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            var searchable = [];
            var selectable = [];
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                }
            });
            if (!$.fn.DataTable.isDataTable('#data-table')) {
                let dTable = $('#data-table').DataTable({
                    order: [],
                    lengthMenu: [
                        [25, 50, 100, 200, 500, -1],
                        [25, 50, 100, 200, 500, "All"]
                    ],
                    processing: true,
                    responsive: true,
                    serverSide: true,

                    language: {
                        processing: `<div class="text-center">
                            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                            <span class="visually-hidden">Loading...</span>
                          </div>
                            </div>`
                    },

                    scroller: {
                        loadingIndicator: false
                    },
                    pagingType: "full_numbers",
                    dom: "<'row justify-content-between table-topbar'<'col-md-2 col-sm-4 px-0'l><'col-md-2 col-sm-4 px-0'f>>tipr",
                    ajax: {
                        url: "{{ route('admin.user.professional.index') }}",
                        type: "get",
                    },

                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        }, {
                            data: 'first_name',
                            name: 'first_name',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'last_name',
                            name: 'last_name',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'business_url',
                            name: 'business_url',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'image',
                            name: 'image',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'status',
                            name: 'status',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],
                });

                new DataTable('#example', {
                    responsive: true
                });
            }
        });



        // sweet alert something went wrong
        const errorAlert = () => {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong!",
                footer: '<a href="#">Why do I have this issue?</a>'
            });
        }

        // Sweet alert Delete confirm
        const deleteAlert = (id) => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteAuction(id);
                }
            });
        }


        // deleting an auction
        const deleteAuction = (id) => {
            try {
                let url = '{{ route('admin.business.destroy', ':id') }}';
                let csrfToken = `{{ csrf_token() }}`;
                $.ajax({
                    type: "DELETE",
                    url: url.replace(':id', id),
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: (response) => {
                        console.log(response);
                        // Reload DataTable
                        $('#data-table').DataTable().ajax.reload();
                        if (response.success === true) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Auction has been deleted.",
                                icon: "success"
                            });
                        } else if (response.errors) {
                            console.log(response.errors[0])
                            errorAlert()
                        } else {
                            toastr.success(resp.message);
                        }
                    },
                    error: (error) => {
                        console.log(error.message);
                        errorAlert()
                    }
                })
            } catch (e) {
                console.log(e)
            }
        }


        function showStatusChangeAlert(id) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'You want to update the status?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    statusChange(id);
                }
            });
        }

        // Status Change
        function statusChange(id) {
            var url = '{{ route('admin.professional.status', ':id') }}';
            $.ajax({
                type: "GET",
                url: url.replace(':id', id),
                success: function(resp) {
                    console.log(resp);
                    // Reloade DataTable
                    $('#data-table').DataTable().ajax.reload();
                    if (resp.success === true) {
                        // show toast message
                        toastr.success(resp.message);
                    } else if (resp.errors) {
                        toastr.error(resp.errors[0]);
                    } else {
                        toastr.error(resp.message);
                    }
                }, // success end
                error: function(error) {
                    // location.reload();
                } // Erro
            });
        }
    </script>
@endpush