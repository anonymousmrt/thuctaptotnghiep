@extends('admin.templates.default', ['title'=>'List Category',
            'libs_elements'=>['node-waves', 'animate',  'dataTables'],
            'customs_css'=>[],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/pages/category/edit_status.js'),
                URL::asset('admin/js/pages/category/delete.js')
            ]
            ])
@section('content')

            
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List Category
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
                                    <th>Name</th>
                                    <th>Creat at</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                                </thead>

                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Creat at</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                                </tfoot>

                                <tbody>
                                
                                   
                                @foreach($categories as $category)
                                        <tr>
                                            
                                            
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->updated_at}}</td>
                                            <td>
                                            
                                            <select name="status" class="form-control form-float show-tick" id="category-status" data-id="{{$category->id}}">
                                                
                                                <option value="0"  @php if($category->status == 0) echo"selected" @endphp> 
                                                     <a href="#" id="{{$category->id}}"  product-id="{{$category->id}}" data-token="{{ csrf_token() }}">
                                                        Un Publish
                                                     </a>
                                                     
                                                </option>
                                                
                                                <option value="1" @php if($category->status == 1) echo"selected" @endphp> 
                                                    <a href="#" id="{{$category->id}}"  product-id="{{$category->id}}" data-token="{{ csrf_token() }}">
                                                        Live
                                                    </a>

                                                </option>
                                                
                                                <option value="2" @php if($category->status == 2) echo"selected" @endphp > 
                                                    <a href="#" id="{{$category->id}}"  product-id="{{$category->id}}" data-token="{{ csrf_token() }}">
                                                        Disable
                                                    </a>
                                                </option>
                                                
                                            </select>
                                            
                                            </td>
                                            <td>
                                                <a href="edit/{{$category->id}}">
                                                    <button type="button" class="btn btn-primary btn-lg">Edit</button>
                                                </a>
                                                
                                                <a href="#" id="{{$category->id}}" class="delete-category" category-id="{{$category->id}}" data-token="{{ csrf_token() }}">
                                                    <button type="button" class="btn btn-primary btn-lg">Delete</button>
                                                </a>
                                                
                                            </td>
                                            
                                        </tr>
                                    
                                @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
@stop