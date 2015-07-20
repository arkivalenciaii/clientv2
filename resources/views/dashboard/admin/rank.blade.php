@extends('dashboard.app')

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
				<h4><i class="fa fa-table"></i>Number of slots - {{$slots->count()}}</h4>
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
							<th>Rank</th>
							<th>Slot Code</th>
							<th>Owner</th>
							<th class="hidden-xs">Status</th>
						</tr>
					</thead>
					<tbody>
					
					@foreach($slots as $slot)
						@foreach($slot->status as $status)
							@if($status->id == 1)
								<tr class="gradeX">
									<td>-</td>
									<td>
										<a href="/slots/{{$slot->slot_code}}">{{$slot->slot_code}}</a>
									</td>
									<td class="center">{{ $slot->user->first_name }}</td>
									<td><span class="label label-{{ $status->status }} label-sm">{{ $status->status_message }}</span>
									</td>	
								</tr>
							@endif
							
						@endforeach
					@endforeach	
					</tbody>
				</table>	
			</div>
		</div>
		<!-- /BOX -->
	</div>
</div>
@endsection