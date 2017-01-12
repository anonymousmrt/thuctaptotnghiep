@extends('admin.templates.default', ['title'=>'Edit Product',
            'libs_elements'=>['node-waves', 'animate', 'bootstrap-select', 'sweetalert', 'bootstrap-notify','ckeditor', 'jquery-slimscroll'],
            'customs_css'=>[
                URL::asset('/admin/css/products/delete-image.css'),
            ],
            'custom_scripts'=>[
                URL::asset('admin/js/pages/products/delete_image.js'),
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/pages/ui/dialogs.js'),
                URL::asset('admin/js/pages/forms/editors.js'),
            ]
            ])
@section('content')

    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Edit Product</h2>
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
                    <form id="form_validation" method="POST" action="{{url('admin/product/edit', ['id'=>$product->id])}}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <div class="form-group form-float">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <select name="category" required  class="form-control show-tick" data-show-subtext="true">
                                        <option value="">-- Please select Category --</option>
                                        <?php $categories =  \Illuminate\Support\Facades\DB::table('categories')->get();
                                        ?>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id == $product->category->id?'selected':''}} >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="name" value="{{$product->name}}" required>
                                
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <textarea  cols="30" name="description" rows="5" class="form-control no-resize" required>{{$product->description}}</textarea>
                                
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <textarea id="ckeditor" name="feature">
                                {{$product->feature}}
                            </textarea>
                        </div>

                        <div class="form-group form-float">
                            <div class="row clearfix">
                                <div class="col-sm-5 col-lg-3">
                                    <select name="status" class="form-control form-float show-tick" id="">
                                        <option value="0" {{$product->status == 0 ? 'selected': ''}}>Un publish </option>
                                        <option value="1" {{$product->status == 1 ? 'selected': ''}}>Live </option>
                                        <option value="2" {{$product->status == 2 ? 'selected': ''}}>Disable </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @if(isset($product->getMedia()[0])==true)
                        <div class="form-group form-float" id="media">
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <ul class="list-inline" >
                                        @foreach($product->getMedia() as $image)
                                            <li class="imgHover" >
                                                <img src="{{asset($image->getUrl())}}" alt="" height="100" width="100" >
                                                {{--<div class="row clearfix js-sweetalert">--}}
                                                    {{--<a class="btn btn-primary waves-effect delete-image" href="{{url('admin/product/delete-image', ['id'=>$image->id])}}" id="{{$image->id}}" data-id="{{$image->id}}" token="{{ csrf_token() }}" data-type="confirm">CLICK ME</a>--}}
                                                {{--</div>--}}
                                                <a href="{{url('admin/product/delete-image', ['id'=>$image->id])}}" id="{{$image->id}}" data-id="{{$image->id}}" class="delete-image" token="{{ csrf_token() }}" title=""><span class="glyphicon glyphicon-remove" ></span></a>
                                            </li>
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