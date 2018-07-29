@extends('admin.layouts.app')

@section('styles')

    <link rel="stylesheet" href="{{asset('admin/plugins/select2/select2.min.css')}}">

@endsection

@section('content')

    <section class="content">

        <div class="row">
            <div class="col-12">

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title"><b>Create Blog</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="col-lg-6">
                        @include('includes.form_error')
                    </div>
                    <form role="form" method="post" action="{{route('blog.store')}}" style="margin-top: 30px" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-body">

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" value="{{old('title')}}" name="title" class="form-control" placeholder="Enter Title" required>
                                </div>
                                <div class="form-group">
                                    <label for="subtitle">Subtitle</label>
                                    <input type="text" value="{{old('subtitle')}}" class="form-control" name="subtitle" id="subtitle" placeholder="Enter subtitle" required>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <br>
                                <div class="pull-right">

                                    <div class="form-group">
                                        <label for="photo_id">File input: </label>
                                        <input type="file" id="photo_id" name="photo_id" required>

                                        {{--<p class="help-block">Example block-level help text here.</p>--}}
                                    </div>

                                </div>
                                    <div class="checkbox pull-left">
                                        <label>
                                            <input type="checkbox" name="status" value="1" > Publish
                                        </label>
                                    </div>
                                <br>
                                <br>


                            </div>

                        </div>

                            <div class="col-lg-6">
                                <div class="form-group" style="margin-top: 17px;" >
                                    <label>Select Tag</label>
                                    <select
                                            class="form-control select2 select2-hidden-accessible"
                                            multiple="" data-placeholder="Select Tags" style="width: 100%;" tabindex="-1"
                                            aria-hidden="true" name="tags[]" >
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Select Author</label>
                                    {{--<select  name="categories[]" class="form-control select2 select2-hidden-accessible"  style="width: 100%;" tabindex="-1" aria-hidden="true">--}}
                                    <select name="admin_id" class="form-control" >
                                        <option selected disabled>Select an Author</option>
                                        @foreach($admins as $admin)
                                            <option value="{{$admin->id}}">{{$admin->name}}</option>
                                        @endforeach
                                    </select>
                                    {{--</select><span class="select2 select2-container select2-container--default select2-container--below select2-container--focus" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-7njn-container"><span class="select2-selection__rendered" id="select2-7njn-container" title="California">California</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
                                </div>
                            </div>
                        <!-- /.card-body -->

                        <div class="box">
                            <div class="box-header">
                                <label for="">Body</label>

                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">
                                        <textarea value="{{old('body')}}" name="body"
                                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"id="editor1">{{old('body')}}</textarea>
                            </div>

                        </div>

                        <div class="card-footer" style="margin-top: 25px">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('blog.index')}}" class="btn btn-danger">Back</a>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </section>

@endsection


@section('scripts')

    <script src="{{asset('admin/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
    <script>

        $(document).ready(function () {

            //Initialize Select2 Elements
            $('.select2').select2()

        });

    </script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1');
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5();
        });
    </script>

@endsection
