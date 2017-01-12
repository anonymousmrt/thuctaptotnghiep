@extends('admin.templates.default', ['title'=>'List Product',
            'libs_elements'=>['node-waves', 'animate', 'bootstrap-select','dataTables'],
            'customs_css'=>[],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/pages/products/product.js'),
                URL::asset('admin/js/pages/addons/addon.js')
            ]
            ])
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        List Addon
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
                            <th>Price</th>
                            <th>Product</th>
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
                            <th>Price</th>
                            <th>Category</th>
                            <th>Feature</th>
                            <th>Desciption</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php $i= 0;?>
                        @foreach($addons as $addon)
                            <tr class="item{{$addon->id}}">
                                <td>{{$i+=1}}</td>
                                @if($addon->getMedia()->isEmpty()==false)
                                    <td><img src="{{asset($addon->getMedia()[0]->getUrl())}}" height="100" width="100"></td>
                                @else
                                    <td><img src="" alt=""></td>
                                @endif
                                <td>{{$addon->name}}</td>
                                <td>{{$addon->price}}</td>
                                <td>{{\App\Product::find($addon->product_id)->name}}</td>
                                <td>{!! $addon->feature !!}}}</td>
                                <td>{!! $addon->description !!}</td>
                                <td>
                                    <select name="status" class="edit-status" id="09">
                                        <option href="{{url('admin/addon/edit-status', ['id'=>$addon->id])}}" value="0" {{$addon->status == 0? 'selected':''}}>Un publish</option>
                                        <option href="{{url('admin/addon/edit-status', ['id'=>$addon->id])}}" value="1" {{$addon->status == 1? 'selected':''}}>Live</option>
                                        <option href="{{url('admin/addon/edit-status', ['id'=>$addon->id])}}" value="2" {{$addon->status == 2? 'selected':''}}>Disable</option>
                                    </select>
                                </td>
                                <td><a href="{{url('admin/addon/edit', ['id'=>$addon->id])}}"><span class="demo-google-material-icon"> <i class="material-icons" style="font-size: 20px;">edit</i> <span class="icon-name"></span></span></a>

                                    <a href="#" id="{{$addon->id}}" class="delete-product" addon-id="{{$addon->id}}" data-token="{{ csrf_token() }}"><span class="demo-google-material-icon"> <i class="material-icons" style="font-size: 20px;">delete_forever</i> <span class="icon-name"></span></span></a></td>
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
