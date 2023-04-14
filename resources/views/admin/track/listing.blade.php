@extends('template.admin-index')
@section('page-name')
    Music Track
@stop
@section('title')
    Music Track
@stop
@section('page-actions')
    <a href="javascript:void(0);" class="btn btn-sm btn-add btn-primary">
        <i class="fal fa-plus-square mr-1"></i>Add Music Track</a>
@stop
@section('breadcrumb')
    <li>
        <a class="text-muted text-capitalize  text-decoration-none ms-1 ">Music Track</a>
    </li>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table id="data-table" class="table table-grid table-striped table-sm" style="width: 100%">
                    <thead class="bg-secondary">
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Music Category</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        var table;
        $(document).ready(function() {
            table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                "pageLength": 25,
                columnsDefs: [{
                    orderable: true
                }],
                ajax: {
                    url: "{{url('admin/track')}}",
                },
                columns: [
                    {
                        data: 'title',
                        name: 'title',
                    },
                    {
                        data: 'type',
                        name: 'type',
                    },
                    {
                        data: 'category',
                        name: 'category',
                    }
                    ,{
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false,
                    },
                ]
            });
        })
        //-- Edit
        $("#data-table").on('click', '.btn-edit', function() {
            var id = $(this).data('id');
            open_modal('{{url('admin/track-edit')}}' + '/' + id );
        });
        //-- Add
        $('.btn-add').click(function() {
            open_modal('{{url('admin/track-create')}}');
        });

        //-- Delete
        $("#data-table").on('click', '.btn-delete', function() {
            var id = $(this).data('id');
            Swal.fire({
                html: "Are you sure you want to delete it?",
                type: "warning",
                confirmButtonText: "Yes",
                showCancelButton: true,
                cancelButtonText: "No",
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-danger',
                },
            }).then((result) => {
                $.unblockUI();
                if (!result.value) return;
                $.ajax({
                    url: "{{url('admin/track-destroy')}}/" + id,
                    type: "DELETE",
                    dataType: "json",
                    cache: false,
                    success: function(res) {
                        $.blockUI();
                        if (res.success == 1) {
                            window.location.reload();
                        } else {
                            $.unblockUI();
                            Swal.fire(
                                'Not deleted',
                                res.message
                            )

                        }
                    }
                });
            });
        });
    </script>
@stop
