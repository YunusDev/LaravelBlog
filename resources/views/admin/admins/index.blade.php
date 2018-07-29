@extends('admin.layouts.app')


@section('styles')

    <link rel="stylesheet" href="{{asset('admin/plugins/datatables/dataTables.bootstrap4.css')}}">


@endsection

@section('content')

    <section class="content">

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Admins</h3>

                        @can('CreateUsers')
                        <a style="padding: 10px" href="{{route('admins.create')}}"  CLASS="col-lg-3 pull-right btn btn-success">
                            <i class="fa fa-user-plus" style="padding-right: 10px"></i>Add New Admin
                        </a>
                        @endcan

                    </div>

                    <div class="box-header">
                        @include('includes.form_error')
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>DP</th>
                                <th>Admin Name</th>
                                <th>Status</th>
                                <th>Assigned Roles</th>
                                @can('EditUsers')

                                    <th>Edit</th>

                                @endcan
                                @can('DeleteUsers')

                                    <th>Delete</th>

                                @endcan
                            </tr>
                            </thead>
                            <tbody>

                            @if($admins)
                                @foreach($admins as $admin)
                                    <tr>
                                        <td>{{$admin->id}}</td>
                                        <td><img  height="30" width="30" src="/AdminProfilePic/{{$admin->photo ? $admin->photo->path : "No photo"}}" alt=""></td>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->status == 1 ? 'Active': 'Not Active' }}</td>
                                        <td> {{$admin->roles()->pluck('name')->implode(' | ')}}</td>
                                        @can('EditUsers')

                                            <td><a href="{{route('admins.edit', $admin->id)}}"><span class="fa fa-edit"></span></a></td>

                                        @endcan
                                        @can('DeleteUsers'))
                                            <td>

                                                <form method="post" id="delete-form-{{$admin->id}}" action="{{route('admins.destroy', $admin->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}

                                                </form>

                                                <a href="" onclick="
                                                        if(confirm('Are you sure you want to delete this ?'))
                                                        {
                                                        event.preventDefault();document.getElementById('delete-form-{{$admin->id}}').submit();}
                                                        else
                                                        {event.preventDefault();}">
                                                    <span class="text-center fa fa-trash" ></span></a>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>DP</th>
                                <th>Admin Name</th>
                                <th>Status</th>
                                <th>Assigned Roles</th>
                                @can('EditUsers')

                                    <th>Edit</th>

                                @endcan
                                @can('DeleteUsers')

                                    <th>Delete</th>

                                @endcan
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
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