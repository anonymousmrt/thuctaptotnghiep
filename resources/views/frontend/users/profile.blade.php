<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>IsisOne-Profile</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	

	
	<!-- framework -->
	<link href="{{asset('frontend')}}/css/framework.css" rel="stylesheet" type="text/css" />
	<link href="{{asset('frontend')}}/css/layout.css" rel="stylesheet" type="text/css" />
	<link href="{{asset('frontend')}}/css/reset.css" rel="stylesheet" type="text/css" />

	

	<!-- colors : demo only -->
	<link href="{{asset('frontend')}}/css/color/green.css" rel="stylesheet" type="text/css" /><!-- default style : green-->
	<link href="{{asset('frontend')}}/css/color/blue.css" rel="alternate stylesheet" type="text/css" title="blue" />
	<link href="{{asset('frontend')}}/css/color/orange.css" rel="alternate stylesheet" type="text/css" title="orange" />
	<link href="{{asset('frontend')}}/css/color/green.css" rel="alternate stylesheet" type="text/css" title="green" />
	<link href="{{asset('frontend')}}/css/color/red.css" rel="alternate stylesheet" type="text/css" title="red" />
	<link href="{{asset('frontend')}}/css/color/yellow.css" rel="alternate stylesheet" type="text/css" title="yellow" />
	<link href="{{asset('frontend')}}/css/color/gray.css" rel="alternate stylesheet" type="text/css" title="gray" />
	<link href="{{asset('frontend')}}/css/color/pink.css" rel="alternate stylesheet" type="text/css" title="pink" />
	<link href="{{asset('frontend')}}/css/color/mauve.css" rel="alternate stylesheet" type="text/css" title="mauve" />
	

	<!-- ICONS -->
	<link rel="shortcut icon" href="{{asset('frontend')}}/images/favicon.png" type="image/x-icon" />
	<link rel="icon" href="{{asset('frontend')}}/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="{{asset('frontend')}}/images/favicon.ico" type="image/x-icon" />




	<style type="text/css" media="screen">

		#main{
			margin-top: 70px;
		}
		.panel-default > .panel-heading {
		  color: #111111;
		  background-color: #111111;
		  border-color: #111111;

		}

		body{padding-top:30px;}

		.glyphicon {  margin-bottom: 10px;margin-right: 10px;}

		small {
		display: block;
		line-height: 1.428571429;
		color: #999;
		}
		.panel-title{
			font-color:#ffffff;
		}
		.panel-title{
			color: #ffffff;
		}
		#footer{
			margin-bottom: 0px;
			background-color: #111111;
		}
		
	</style>

	
</head>
<body>
	
	<div id="header">
		<div class="container">
			<button id="mobileMenu" class="fa fa-bars" type="button" data-toggle="collapse" data-target=".navbar-collapse"></button>
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
					<button id="mobileMenu" class="fa fa-bars" type="button" data-toggle="collapse" data-target=".navbar-collapse"></button>
					<div class="navbar-header">
						<a class="navbar_brand scrollTo" href="#home">
							
							<span class="">FSFLEX</span>
						</a>
					</div>
				

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" aria-expanded="true">

							<ul class="nav navbar-nav navbar-right">
								<li><a href="{{asset('/')}}" class="scrollTo">Home</a></li>
								<li><a href="#services" class="scrollTo">Services</a></li>
								<li><a href="#contact" class="scrollTo">Contact</a></li>
							</ul>
					</div>


					<!-- ///// -->
				</div>
			</nav>

		</div>
	</div> <!-- /header -->

	<div id="main">
		<div class="container-fluid">
			<div class="row">
				
				<div class="col-md-4 ">

					<div class="post">

						<div class="panel panel-default">	
							<div class="panel-heading" >
								<h3 class="panel-title"> Information </h3>
							</div> <!-- /panel-heading -->

							<div class="panel-body">

								<div class="media">
									<a class="pull-top" href="#">
									      	<img src="http://placehold.it/190x190" alt="" class="img-rounded img-responsive" />							    
									</a>
									<div class="media-body">
										<div class="col-sm-6 col-md-8">
					                        
					                        <h4>{{Auth::user()->name}}</h4>
					                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
					                        </i></cite></small>
					                        <p>
					                            <i class="glyphicon glyphicon-envelope"></i>{{Auth::user()->email}}
					                            <br>
					                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
					                            <br>
					                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p>
					                        <!-- Split button -->
					                        <div class="btn-group">
					                            
												<a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
	                                                <button type="button" class="btn btn-warning">
						                                Logout
						                            </button></a>
					                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
					                                {{ csrf_field() }}
					                            </form>
					                            
					                   
					                            <ul class="dropdown-menu" role="menu">
					                                <li><a href="#">Twitter</a></li>
					                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
					                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
					                                <li class="divider"></li>
					                                <li><a href="#">Github</a></li>
					                            </ul>
					                        </div>
					                    </div>
									</div>
								</div>
								
							</div>
						</div> 
					</div>
					
				</div> <!-- /sidebar -->

				<div class="col-md-8 content">

					<div class="post">

						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Orders</h3>
							</div> <!-- /panel-heading -->

							<div class="panel-body">


								
									      <p>
									      	<table class="table table-hover">
									      		<thead>
									      			<tr>
									      				<th>ID</th>
									      				<th>Addon</th>
									      				<th>Price</th>
									      				<th>Status</th>
									      			</tr>
									      			
									      		</thead>
									      		<tbody>
									      			@foreach($orders as $order)
									      				<tr>
									      					<td>{{$order->id}} </td>
									      					<td>{{$order->addon->name}}</td>
									      					<td>{{$order->addon->price}}</td>
									      					<td>
									      						@if($order->status == 1)
									      							paid
									      						@else
									      							unpaid
									      						@endif
									      					</td>
									      				</tr>
									      			@endforeach
									      		</tbody>
									      	</table>

									      </p>
									   
								    
								
											
								<!-- <div class="container">
									<ul class="nav nav-tabs">
									    <li class="active"><a data-toggle="tab" href="#home">Orders</a></li>
									    <li><a data-toggle="tab" href="#menu1">Messages</a></li>
									    <li><a data-toggle="tab" href="#menu2">Setting</a></li>
									    
									</ul>
								
									<div class="tab-content">
									    <div id="home" class="tab-pane fade in active">
									      	<h3>HOME</h3>
									      	<p>
									      		
									      	</p>
								
									      	
									    </div>
										    <div id="menu1" class="tab-pane fade">
										    <h3>Menu 1</h3>
									      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									    </div>
									    <div id="menu2" class="tab-pane fade">
									      	<h3>Menu 2</h3>
									      	<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
									    </div>
									    
									</div> 
								</div> /container -->
							</div> <!-- /panel-body -->
							
						</div>						
					</div> <!--/post -->

				</div> <!-- /content-->

				
				

			</div>
			
		</div>
		
	</div> <!-- /main -->

	
	<div id="footer">
		<footer>

			<!-- SCROOL TO TOP -->

			<div class="container">

				<div class="row">

					<div class="col-md-6 copyright">
						Your Company, LTD<br>
						2017 © All Rights Reserved.
					</div>

					<div class="col-md-6 text-right">
						<a href="#" class="social fa fa-facebook"></a>
						<a href="#" class="social fa fa-twitter"></a>
						<a href="#" class="social fa fa-google-plus"></a>
					</div>

				</div>

			</div>
		</footer>

	</div>

	



	

<!-- script	 -->
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>



</body>
</html>