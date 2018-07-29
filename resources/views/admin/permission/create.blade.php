@extends('admin.layouts.app')


@section('styles')

    <link rel="stylesheet" href="{{asset('admin/plugins/datatables/dataTables.bootstrap4.css')}}">


@endsection

@section('content')

    <section class="content">

        <div class="row">
            <div class="col-12">

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title"><b>Create Permission</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="col-lg-6">
                        @include('includes.form_error')
                    </div>
                    <form role="form" method="post" action="{{route('permission.store')}}">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="col-lg-5">

                                <div class="form-group">
                                    <label for="name"> Permission</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter  permission">
                                </div>
                                <div class="form-group">

                                    <label for="for">Permission For</label>
                                    <select  class="form-control" name="for" id="for">

                                        <option selected disabled>Select Permission for</option>
                                        <option value="user">User</option>
                                        <option value="blog">Blog</option>
                                        <option value="other">Other</option>

                                    </select>

                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('permission.index')}}" class="btn btn-danger">Back</a>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </section>

@endsection

@section('scripts')

    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/dataTables.bootstrap4.js')}}"></script>

    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>

@endsection