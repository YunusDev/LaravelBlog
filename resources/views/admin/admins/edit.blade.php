@extends('admin.layouts.app')

@section('styles')

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('admin/plugins/iCheck/all.css')}}">

@endsection

@section('content')

    <section class="content">

        <div class="row">
            <div class="col-12">

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title"><b>Edit User - </b><i>{{$admin->name}}</i></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="col-lg-6 ">
                        @include('includes.form_error')
                    </div>
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('admins.update', $admin->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="card-body">

                            <div class="col-lg-5">

                                <div class="form-group col-lg-12">
                                    <label for="name"> Name</label>
                                    <input type="text" value="@if(old('name')) {{old('name')}} @else {{$admin->name}} @endif" class="form-control" name="name" id="name" placeholder="Enter  username">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="email"> Email</label>
                                    <input type="email" value="@if(old('email')) {{old('email')}} @else {{$admin->email}} @endif" class="form-control" name="email" id="email" placeholder="Enter  email ">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="number" value="{{$admin->phone}}"  class="form-control" name="phone" id="phone" placeholder="Enter  number ">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Profile Pic</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="photo_id" type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label for="status">Status </label>
                                    <div class="checkbox">
                                        <label><input type="checkbox" class="flat-red" name="status" id="status" @if(old('status') == 1 || $admin->status == 1)checked @endif  value="1">Status</label>
                                    </div>
                                </div>
                                <div class="form-group row col-lg-12">
                                    <h6 class="col-lg-12 text-bold">Roles </h6>
                                    @foreach($roles as $role)
                                        <div class="col-lg-4 col-xs-4">
                                            <label >{{$role->name}}</label>
                                            <input name="roles[]" class="flat-red" type="checkbox" value="{{$role->id}}"
                                               @foreach($admin->roles as $adrole)
                                                   @if($adrole->id  == $role->id)
                                                        checked
                                                    @endif
                                                @endforeach
                                            >
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('admins.index')}}" class="btn btn-danger">Back</a>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </section>

@endsection

@section('scripts')

    <!-- iCheck 1.0.1 -->
    <script src="{{asset('admin/plugins/iCheck/icheck.min.js')}}"></script>

    <script>

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })

    </script>

@endsection