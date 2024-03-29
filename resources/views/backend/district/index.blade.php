@extends('admin.layouts.app')
@section('title', 'Manage District')
@push('style')

@endpush

@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">All District</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table mb-0" id="datatable_dt">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">District</th>
                                    <th scope="col">Division</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Add New District</h4>
                        <div class="box-controls pull-right">

                        </div>
                    </div>

                    <div class="box-body">
                        <form novalidate="" method="POST" action="{{ route('district.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="" class="required">Division Name</label>
                                <select name="division_id" id="division_id" class="form-control">
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                </select>
                                @error('division')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <x-forms.textbox name="name" required="required" label="District Name" error="name" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Add Division">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
@push('script')
    <script>
        $(document).ready( function () {
            // Category data show
            var datatable_dt = $('#datatable_dt').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    type: "post",
                    url: "{{ route('district.data.get') }}",
                    data: {
                        _token: _token,
                    },
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false  },
                    { data: 'name' },
                    { data: 'division' }, 
                    { data: 'action', orderable: false, searchable: false },
                ]
            });

            $(document).on('click','.delete-data', function(e){
                e.preventDefault();
                var id = $(this).data('id');
                var url = "{{ route('district.delete') }}";
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: {
                                id: id,
                                _token: _token,
                            },
                            dataType: "json",
                            success: function (response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Division has been deleted successfull.',
                                    'success'
                                )
                                datatable_dt.draw();
                            }
                        })
                    }
                })
            });
        });
    </script>
@endpush

