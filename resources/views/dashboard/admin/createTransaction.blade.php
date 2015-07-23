@extends('dashboard.admin.app')

@section('content')

<div id="main-content">
			<div class="container">
				<div class="row">
					<div id="content" class="col-lg-12">
						<!-- PAGE HEADER-->
						<div class="row">
							<div class="col-sm-12">
								<div class="page-header">
									<!-- STYLER -->
									
									<!-- /STYLER -->
									<!-- BREADCRUMBS -->
									<ul class="breadcrumb">
										<li>
											<i class="fa fa-home"></i>
											<a href="index-2.html">Home</a>
										</li>
										<li>
											<a href="#">Other Pages</a>
										</li>
										<li>Blank Page</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Blank Page</h3>
									</div>
									<div class="description">Blank Page</div>
								</div>
							</div>
						</div>
<div class="row">
	<div class="col-md-12">
		<!-- BOX -->
		<div class="box border green">
			<div class="box-title">
				<h4><i class="fa fa-table"></i>Pending slots under {{$user->first_name}} {{$user->last_name}}</h4>
				<div class="tools hidden-xs">
					<a href="#box-config" data-toggle="modal" class="config">
						<i class="fa fa-cog"></i>
					</a>
					<a href="javascript:;" class="reload">
						<i class="fa fa-refresh"></i>
					</a>
					<a href="javascript:;" class="collapse">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a href="javascript:;" class="remove">
						<i class="fa fa-times"></i>
					</a>
				</div>
			</div>
			<div class="box-body">
				<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Slot Code</th>
							<th class="hidden-xs">Status</th>
						</tr>
					</thead>
					<tbody>
					@foreach($slots as $slot)
					@foreach($slot->status as $status)
						@if($status->status_message == "PENDING")
						<tr class="gradeX">
							<td>
								<a href="/slots/{{$slot->slot_code}}">{{$slot->slot_code}}</a>
							</td>
							
							
							<td><span class="label label-{{ $status->status }} label-sm">{{ $status->status_message }}</span></td>
							
						</tr>
						@endif
					@endforeach
					@endforeach
					</tbody>
				</table>
				
				<form class="form-horizontal" method="POST" action="{{ url('admin/client/transaction/')}}">
					
					<div class="form-group">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="email" value="{{$user->email}}">
			   			<label class="col-md-4 control-label">
			   				Transaction Number
			   			</label> 
			   			<div class="col-md-8">
			   				<input type="text" name="transaction_number" class="form-control" value="{{old('t_num')}}">
			   			</div>
			   			<label class="col-md-4 control-label">
			   				Amount
			   			</label> 
			   			<div class="col-md-4">
			   				<input type="text" name="amount" class="form-control">
			   			</div>
					</div>
					<div class="form-actions clearfix">
		  				<input type="submit" value="Link Transaction" class="btn btn-primary pull-right">
		  			</div>
				</form>
				
				
			</div>
		</div>
		<!-- /BOX -->
	</div>
</div>
</div>
</div>
</section>
<div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> Top
							</span>
						</div>
					</div><!-- /CONTENT-->
				</div>
			</div>
		</div>
	</section>
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="/js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="/bootstrap-dist/js/bootstrap.min.js"></script>
	
		
	<!-- DATE RANGE PICKER -->
	<script src="/js/bootstrap-daterangepicker/moment.min.js"></script>
	
	<script src="/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- EASY PIE CHART -->
	<script src="/js/jquery-easing/jquery.easing.min.js"></script>
	<script type="text/javascript" src="/js/easypiechart/jquery.easypiechart.min.js"></script>
	<!-- SPARKLINES -->
	<script type="text/javascript" src="/js/sparklines/jquery.sparkline.min.js"></script>
	<!-- UNIFORM -->
	<script type="text/javascript" src="/js/uniform/jquery.uniform.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="/js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="/js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("dynamic_table");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->
</body>
</html>			

@endsection