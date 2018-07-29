
@extends('admin.layouts.app')


@section('content')

    <div class="col-md-6 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Latest Members</h3>

                <div class="card-tools">
                    <span class="badge badge-danger">{{$admins->count()}} members</span>
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <ul class="users-list clearfix">

                    @foreach($admins as $admin)
                        <li>
                            <img src="/AdminProfilePic/{{$admin->photo->path ? $admin->photo->path : 'none' }}" alt="User Image">
                            <a class="users-list-name" href="#">{{$admin->name}}</a>
                            {{--<span class="users-list-date">{{$admin->created_at->diffForHumans()}}</span>--}}
                        </li>
                    @endforeach
                </ul>
                <!-- /.users-list -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center mt-3" >
                <a href="{{route('admins.index')}}">View All Admins</a>
            </div>
            <!-- /.card-footer -->
        </div>

    </div>
@endsection

