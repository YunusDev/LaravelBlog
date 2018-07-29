@extends('admin.layouts.app')



@section('content')

    <section class="content">

        <div class="row">
            <div class="col-12">

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title"><b>Edit Tag - {{$tag->name}}</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="col-lg-6">
                        @include('includes.form_error')
                    </div>
                    <form role ="form" method="post" action="{{route('tag.update', $tag->id)}}">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="card-body">
                            <div class="col-lg-5">

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" value="{{old('name') ? old('name') : $tag->name}}" class="form-control" name="name" id="name" placeholder="Enter  tag">
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('tag.index')}}" class="btn btn-danger">Back</a>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </section>

@endsection

