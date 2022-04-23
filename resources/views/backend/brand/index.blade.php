@extends('admin.layouts.app')
@section('title','Brand Manage')
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
                        <h4 class="box-title">All Brands</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table mb-0" id="brand_dt">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name En</th>
                                    <th scope="col">Name Bn</th>
                                    <th scope="col">Image</th>
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
                        <h4 class="box-title">Add new Brand</h4>
                        <div class="box-controls pull-right">

                        </div>
                    </div>

                    <div class="box-body">
                        <form novalidate="" method="POST" action="{{ route('brand.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5>Brand Name En<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name_en" id="name_en" class="form-control" required=""
                                        data-validation-required-message="This field is required" aria-invalid="false">
                                    <div class="help-block"></div>
                                    @error('name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Brand Name Bn<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name_bn" id="name_bn" class="form-control" required=""
                                        data-validation-required-message="This field is required" aria-invalid="false">
                                    <div class="help-block"></div>
                                    @error('name_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Brand Image<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="image" id="image" class="form-control" required=""
                                        data-validation-required-message="This field is required" aria-invalid="false">
                                    <div class="help-block"></div>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Add">
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
            // Brand data show
            var brand_dt = $('#brand_dt').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    type: "post",
                    url: "{{ route('brand.data.get') }}",
                    data: {
                        _token: _token,
                    },
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false  },
                    { data: 'name_en', name: 'name_en' },
                    { data: 'name_bn', name: 'name_bn' },
                    { data: 'image', name: 'image', searchable: false, orderable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });

            $(document).on('click','.delete-data', function(e){
                e.preventDefault();
                var id = $(this).data('id');
                var url = "{{ route('brand.delete') }}";
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
                                    'Your file has been deleted.',
                                    'success'
                                )
                                brand_dt.draw()
                            }
                        })
                    }
                })
            });
        } );
    </script>
@endpush

