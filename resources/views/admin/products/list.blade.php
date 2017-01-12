@extends('admin.templates.default', ['title'=>'List Product',
            'libs_elements'=>['node-waves', 'animate','bootstrap-select','dataTables'],
            'customs_css'=>[],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/pages/products/product.js')
            ]
            ])
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        EXPORTABLE TABLE
                    </h2>
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
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Feature</th>
                            <th>Desciption</th>
                            <th>Status</th>
                            <th width="7%">Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Feature</th>
                            <th>Desciption</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php $i= 0;?>
                            @foreach($products as $product)
                                <tr class="item{{$product->id}}">
                                    <td>{{$i+=1}}</td>
                                    @if(isset($product->getMedia()[0]))
                                    <td><img src="{{asset($product->getMedia()[0]->getUrl())}}" height="100" width="100"></td>
                                        @else
                                        <td><img src="" alt=""></td>
                                    @endif
                                    <td><a style="color: black" href="{{url('admin/product/detail', ['id'=>$product->id])}}">{{$product->name}}</a></td>
                                    <td>{{\App\Category::find($product->category_id)->name}}</td>
                                    <td>{{$product->feature}}</td>
                                    <td>{!! $product->description !!}</td>
                                    <td>
                                        <select name="status" class="edit-status" id="09">
                                            <option href="{{url('admin/product/edit-status', ['id'=>$product->id])}}" value="0" {{$product->status == 0? 'selected':''}}>Un publish</option>
                                            <option href="{{url('admin/product/edit-status', ['id'=>$product->id])}}" value="1" {{$product->status == 1? 'selected':''}}>Live</option>
                                            <option href="{{url('admin/product/edit-status', ['id'=>$product->id])}}" value="2" {{$product->status == 2? 'selected':''}}>Disable</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="{{url('admin/product/edit', ['id'=>$product->id])}}"><span class="demo-google-material-icon"> <i class="material-icons" style="font-size: 20px;">edit</i> <span class="icon-name"></span></span></a>
                                        <a href="#" id="{{$product->id}}" class="delete-product" product-id="{{$product->id}}" data-token="{{ csrf_token() }}"><span class="demo-google-material-icon"> <i class="material-icons" style="font-size: 20px;">delete_forever</i> <span class="icon-name"></span></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@stop

@section('footer')
    @parent

@endsection
