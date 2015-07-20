<div class="tab-pane fade" id="pro_edit">
	<form class="form-horizontal" action="#">
		<div class="row">
			 <div class="col-md-6">
				<div class="box border green">
					<div class="box-title">
						<h4><i class="fa fa-bars"></i>General Information</h4>
					</div>
					<div class="box-body big">
						<div class="row">
						 <div class="col-md-12">
							<h4>Basic Information</h4>
							<div class="form-group">
							   <label class="col-md-4 control-label">Name</label> 
							   <div class="col-md-8"><input type="text" name="regular" class="form-control" value="Jennifer"></div>
							</div>
							<div class="form-group">
							   <label class="col-md-4 control-label">Birthday</label> 
							   <div class="col-md-8"><input  class="form-control datepicker" type="text" name="regular" size="10"></div>
							</div>
							<div class="form-group">
							   <label class="col-md-4 control-label">Gender</label> 
							   <div class="col-md-8">
								  <label class="radio"> <input type="radio" class="uniform" name="optionsRadios1" value="option1"> Male </label> 
								 <label class="radio"> <input type="radio" class="uniform" name="optionsRadios1" value="option2" checked> Female </label>
							   </div>
							</div>
							<h4>Contact Information</h4>
							<div class="form-group">
							   <label class="col-md-4 control-label">Phone</label> 
							   <div class="col-md-8"><input type="number" name="regular" class="form-control" value="1002927323"></div>
							</div>
							
							<div class="form-group">
							   <label class="col-md-4 control-label">Address</label> 
							   <div class="col-md-8"><textarea name="regular" class="form-control"></textarea></div>
							</div>
							<div class="form-group">
							   <label class="col-md-4 control-label">Website</label> 
							   <div class="col-md-8">
									<div class="input-group">
									  <span class="input-group-addon">http://</span>
									  <input type="text" class="form-control" placeholder="Website">
									</div>						
							   </div>
							</div>
						 </div>
					  </div>
					</div>
				</div>
			 </div>
		 </div>
	  </form>
	  <div class="form-actions clearfix"> <input type="submit" value="Update Account" class="btn btn-primary pull-right"> </div>
   </div>
   <!-- /EDIT ACCOUNT -->
   <!-- /BUY -->
   	<div class="tab-pane fade" id="pro_buy">
		<form class="form-horizontal" method="POST"action="{{ url('/dashboard/user')}}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
			 	<div class="col-md-6">
					<div class="box border green">
						<div class="box-title">
							<h4><i class="fa fa-bars"></i>Purchase Slots for Queueing</h4>
						</div>
						<div class="box-body big">
							<div class="row">
						 		<div class="col-md-12">
									<div class="form-group">
							   			<label class="col-md-4 control-label">Number of slots
							   			</label> 
							   			<div class="col-sm-8">
											<select class="form-control" name="num_slots">
										 		@for($i = 1; $i <= $limit; $i++)
										 			<option>{{$i}}</option>
												@endfor
											</select>
										</div>
							   		</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
							   			<label class="col-md-4 control-label">Transaction Number
							   			</label> 
							   			<div class="col-sm-8">
											<input type="text" name="transaction_number" class="form-control" placeholder="{{old('transaction_number')}}">
										</div>
							   		</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
							   			<label class="col-md-4 control-label">Amount
							   			</label> 
							   			<div class="col-sm-8">
											<input type="text" name="amount" class="form-control" placeholder="{{old('amount')}}">
										</div>
							   		</div>
								</div>
						 	</div>
					  	</div>
					</div>
				</div>
			</div>
	  		<div class="form-actions clearfix">
	  			<input type="submit" value="Buy Slots" class="btn btn-primary pull-right">
	  		</div>
	  	</form>
   	</div>

   	<div class="tab-pane fade" id="pro_bank">
		@if($user->bank)
			<div class="tab-pane active" id="sales">
  				<table class="table table-striped table-bordered table-hover">
		 			<thead>
						<tr>
							<th><i class="fa fa-clock-o"></i> Bank</th>
					    	<th class="hidden-xs"><i class="fa fa-quote-left"></i> Account Number</th>
					    	<th><i class="fa fa-bars"></i> Status</th>
						</tr>
		   			</thead>
		    		<tbody>
		 				<tr>
		 					<td><a href="#">{{$user->bank->bank_type}}</a></td>
			   				<td class="hidden-xs"><a href="#">{{$user->bank->account_number}}</a></td>
			   				<td><span class="label label-warning label-sm">UNVERIFIED</span></td>
						</tr>
		 			</tbody>
  				</table></div>
			</div>
		@else
			<form class="form-horizontal" method="POST" action="{{ url('/dashboard/user/bank')}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">
				 	<div class="col-md-6">
						<div class="box border green">
							<div class="box-title">
								<h4><i class="fa fa-bars"></i>Bank Account</h4>
							</div>
							<div class="box-body big">
								<div class="row">
							 		<div class="col-md-12">
										<div class="form-group">
								   			<label class="col-md-4 control-label">
								   				Enter Bank Account Number
								   			</label> 
								   			<div class="col-md-8">
								   				<input type="text" name="bank_account" class="form-control" placeholder="{{old('bank_account')}}">
								   			</div>
										</div>
							 		</div>
							 		<div class="col-md-12">
										<div class="form-group">
											<label class="col-sm-3 control-label">Bank Type</label>
											<div class="col-sm-9">
												<select class="form-control" name="bank_type">
											 		<option>BDO</option>
													<option>BPI</option>
													<option>CHINABANK</option>
													<option>RCBC</option>
												</select>
											</div>		
										</div>
							 		</div>
							  	</div>
							</div>
						</div>
					</div>
				</div>
		  		<div class="form-actions clearfix">
		  			<input type="submit" value="Link Account" class="btn btn-primary pull-right">
		  		</div>
		  	</form>
		@endif
	</div>