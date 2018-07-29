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
                        <h3 class="card-title">Roles</h3>

                        <a style="padding: 10px" href="{{route('role.create')}}"  CLASS="col-lg-3 pull-right btn btn-success">
                            <i class="fa fa-user-plus" style="padding-right: 10px"></i>Add New Role
                        </a>

                    </div>
                    <div class="box-header">
                        @include('includes.form_error')
                    </div>
                    <!-- /.box-header -->
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Role Name</th>
                                <th>Related</th>
                                <th>Created At</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($roles)
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>
                                            @foreach($role->permissions as $permitted)

                                                {{$permitted->name}} |

                                            @endforeach

                                        </td>
                                        <td>{{$role->created_at->diffForHumans()}}</td>
                                        <td><a href="{{route('role.edit', $role->id)}}"><span class="fa fa-edit"></span></a></td>

                                        <td>

                                            <form method="post" id="delete-form-{{$role->id}}" action="{{route('role.destroy', $role->id)}}">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}

                                            </form>

                                            <a href="" onclick="
                                                    if(confirm('Are you sure you want to delete this ?'))
                                                    {
                                                    event.preventDefault();document.getElementById('delete-form-{{$role->id}}').submit();}
                                                    else
                                                    {event.preventDefault();}">
                                                <span class="fa fa-trash"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Role Name</th>
                                <th>Related</th>
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