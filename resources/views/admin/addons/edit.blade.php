@extends('admin.templates.default', ['title'=>'Edit Product',
            'libs_elements'=>['node-waves', 'animate', 'bootstrap-select', 'ckeditor', 'jquery-slimscroll'],
            'customs_css'=>[],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/pages/forms/editors.js')
            ]
            ])
@section('content')

        <!-- Basic Validation -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Edit Addon</h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="body">
                <form id="form_validation" method="POST" action="{{url('admin/addon/edit', ['id'=>$addon->id])}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group form-float">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <select name="product" required  class="form-control show-tick" data-show-subtext="true">
                                    <option value="">-- Please select Product --</option>
                                    <?php $products =  \Illuminate\Support\Facades\DB::table('products')->get();
                                    ?>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}" {{$product->id == $addon->product_id?'selected':''}} >{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" value="{{$addon->name}}" required>

                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="price" value="{{$addon->price}}" required>

                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="feature" cols="30" rows="5" class="form-control no-resize" required>{{$addon->feature}}</textarea>

                        </div>
                    </div>

                    <div class="form-group form-float">
                            <textarea id="ckeditor" name="description">
                                {{$addon->description}}
                            </textarea>
                    </div>

                    <div class="form-group form-float">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-5">
                                <select name="status" class="form-control form-float show-tick" id="">
                                    <option value="0" {{$addon->status == 0 ? 'selected': ''}}>Un publish </option>
                                    <option value="1" {{$addon->status == 1 ? 'selected': ''}}>Live </option>
                                    <option value="2" {{$addon->status == 2 ? 'selected': ''}}>Disable </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    @if(isset($addon->getMedia()[0])==true)
                        <div class="form-group form-float" id="media">
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <ul class="list-inline">
                                        @foreach($addon->getMedia() as $image)
                                            <li><img src="{{asset($image->getUrl())}}" alt="" height="100" width="100"></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="file" name="file[]" multiple>
                        </div>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                </form>
            </div>

            <div class="card">
                <div class="header">
                    <h2>
                        FILE UPLOAD - DRAG & DROP OR WITH CLICK & CHOOSE
                        <small>Taken from <a href="http://www.dropzonejs.com/" target="_blank">www.dropzonejs.com</a></small>
                    </h2>

                </div>
                <div class="body">
                    <form action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                        <div class="dz-message">
                            <div class="drag-icon-cph">
                                <i class="material-icons">touch_app</i>
                            </div>
                            <h3>Drop files here or click to upload.</h3>
                            <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em>
                        </div>
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@stop
@section('foot')
    @parent
    <script src="{{asset('admin')}}/js/pages/forms/basic-form-elements.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-validation/jquery.validate.js"></script>
    <!-- JQuery Steps Plugin Js -->
    <script src="{{asset('admin')}}/plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="{{asset('admin')}}/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('admin')}}/plugins/node-waves/waves.js"></script>

    <!-- Ckeditor -->
    <script src="{{asset('admin')}}/plugins/ckeditor/ckeditor.js"></script>

    <script src="{{asset('admin')}}/js/pages/forms/editors.js"></script>


    <!-- Select Plugin Js -->
    <script src="{{asset('admin')}}/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="{{asset('admin')}}/plugins/dropzone/dropzone.js"></script>


@endsection