<div class="tab-pane active" id="sales">
  <table class="table table-striped table-bordered table-hover">
	 <thead>
		<tr>
		   <th><i class="fa fa-user"></i> Rank</th>
		   <th class="hidden-xs"><i class="fa fa-quote-left"></i> Slot Code</th>
		   <th><i class="fa fa-clock-o"></i> Time</th>
		   <th><i class="fa fa-bars"></i> Status</th>
		</tr>
	 </thead>
	 <tbody>
	 @foreach($slots as $slot)
	 	<tr>
		   <td><a href="/tree/{{$slot->id}}">{{$slot->id}}</a></td>
		   <td class="hidden-xs"><a href="#">{{$slot->slot_code}}</a></td>
		   <td>{{$slot->created_at->diffForHumans()}}</td>
		   @foreach($slot->status as $status)
		   	<td><span class="label label-{{ $status->status }} label-sm">{{ $status->status_message }}</span></td>
		   	@endforeach
		</tr>
	 @endforeach
	 </tbody>
  </table>
</div>

@if($ranks)
	<div class="tab-pane active" id="ranked">
	  <table class="table table-striped table-bordered table-hover">
		 <thead>
			<tr>
			   <th><i class="fa fa-user"></i> Rank</th>
			   <th class="hidden-xs"><i class="fa fa-quote-left"></i> Slot Code</th>
			   <th><i class="fa fa-clock-o"></i> Slot Exit</th>
			   <th><i class="fa fa-bars"></i> Action</th>
			</tr>
		 </thead>
		 <tbody>
		 @foreach($ranks as $rank)
		 	<tr>
			   <td>{{$rank->id}}</td>
			   <td class="hidden-xs"><a href="admin/ranked/{{$rank->slot_code}}">{{$rank->slot_code}}</a></td>
			   <td>{{$rank->created_at->diffForHumans()}}</td>
			   <td>
			   		@if($rank->slot_exit == 1)
				   		<span class="label label-success label-sm">EXIT</span>
				   		<span class="label label-success label-sm">Request Payout</span>
				   	@elseif($rank->slot_exit == 0)
				   		<span class="label label-warning label-sm">Waiting</span>
				   	@endif
			   	</td>
			</tr>
		 @endforeach
		 </tbody>
	  </table>
	</div>
@endif