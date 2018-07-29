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
                        <h3 class="card-title">Blogs</h3>

                        <a style="padding: 10px" href="{{route('blog.create')}}"  CLASS="col-lg-3 pull-right btn btn-success">
                            <i class="fa fa-user-plus" style="padding-right: 10px"></i>Add New Blog
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
                                <th>Title</th>
                                <th>Photo</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($blogs)
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{$blog->id}}</td>
                                        <td>{{$blog->title}}</td>
                                        <td><img  height="30" width="30" src="/blogImages/{{$blog->photo->path}}" alt=""></td>
                                        <td>{{$blog->status == 1 ? 'Published' : 'Not Published'}}</td>
                                        <td>{{$blog->created_at->diffForHumans()}}</td>
                                        <td><a href="{{route('blog.edit', $blog->id)}}"><span class="fa fa-edit"></span></a></td>

                                        <td>

                                            <form method="post" id="delete-form-{{$blog->id}}" action="{{route('blog.destroy', $blog->id)}}">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}

                                            </form>

                                            <a href="" onclick="
                                                    if(confirm('Are you sure you want to delete this ?'))
                                                    {
                                                    event.preventDefault();document.getElementById('delete-form-{{$blog->id}}').submit();}
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
                                <th>Title</th>
                                <th>Photo</th>
                                <th>Status</th>
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