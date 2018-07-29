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
                        <h3 class="card-title">Permissions</h3>

                        <a style="padding: 10px" href="{{route('permission.create')}}"  CLASS="col-lg-3 pull-right btn btn-success">
                            <i class="fa fa-user-plus" style="padding-right: 10px"></i>Add New Permission
                        </a>

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
                                <th>Permission Name</th>
                                <th> Permission For</th>
                                <th>Created At</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($permissions)
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{$permission->id}}</td>
                                        <td>{{$permission->name}}</td>
                                        <td>{{$permission->for}}</td>

                                        <td>{{$permission->created_at->diffForHumans()}}</td>
                                        <td><a href="{{route('permission.edit', $permission->id)}}"><span class="fa fa-edit"></span></a></td>

                                        <td>

                                            <form method="post" id="delete-form-{{$permission->id}}" action="{{route('permission.destroy', $permission->id)}}">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}

                                            </form>

                                            <a href="" onclick="if(confirm('Are you sure you want to delete this ?'))
                                                    {
                                                    event.preventDefault();document.getElementById('delete-form-{{$permission->id}}').submit();}
                                                    else
                                                    {event.preventDefault();}">
                                                <span class="fa fa-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Permission Name</th>
                                <th> Permission For</th>
                                <th>Created At</th>
                                <th>Edit</th>
                                <th>Delete</th>
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