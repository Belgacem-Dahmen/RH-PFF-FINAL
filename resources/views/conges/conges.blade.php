@extends('layouts.master')
@section('title')
Etat des Demandes Congés
@stop
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
 <!--Internal   Notify -->
 <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Congés</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/liste des Congés</span>
						</div>
					</div>
		
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

@if (session()->has('delete_conge'))
        <script>
            window.onload = function() {
                notif({
                    msg: "Succes Suppression ! ",
                    type: "success"
                })
            }

        </script>
    @endif
	@if (session()->has('status_update'))
	<script>
		window.onload = function() {
			notif({
				msg: "  Succes Changement Statut  ",
				type: "success"
			})
		}

	</script>
@endif
				<!-- row opened -->
				<div class="row row-sm">
									
			
				
					<!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
									<a href="conges/create" class="btn btn-success btn-with-icon btn-block" style="color:white"><i
										class="typcn typcn-edit"></i>&nbsp; Ajout Demande </a>
								</div>
								<div class="d-flex justify-content-between">
									
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example1" class="table key-buttons text-md-nowrap" >
										<thead>
											<tr>
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">Matricule </th>
												<th class="border-bottom-0">Date demande</th>
												<th class="border-bottom-0">Service</th>
												<th class="border-bottom-0">Equipe</th>
												<th class="border-bottom-0">Raison</th>
												<th class="border-bottom-0">Date debut</th>
												<th class="border-bottom-0">Date fin</th>
												<th class="border-bottom-0">total jrs </th>
												<th class="border-bottom-0">jours css </th>
												<th class="border-bottom-0">full / half </th>
												<th class="border-bottom-0">Date reprise</th>
												<th class="border-bottom-0">statut</th>
												<th class="border-bottom-0">user</th>
												<th class="border-bottom-0">note</th>
												<th class="border-bottom-0">Actions</th>
											</tr>
										</thead>
										<tbody>
											@php
											$i=0;
												@endphp
											@foreach($conges as $conge)
											@php
											$i++
											@endphp
											<tr>
												<td><a href="{{ url('CongesDetails') }}/{{ $conge->id }}">{{$i}}</a></td>
													
												<td>{{$conge->employee_number}}</td>
												<td>{{$conge->conges_date}}</td>
												
												<td>{{ $conge->leavelists->leave_name }}</td>
												<td>{{$conge->products}}</td>
												<td>{{$conge->reason}}</td>
												<td>{{$conge->start_date}} </td>
												
												<td>{{$conge->end_date}} </td>
												<td>{{$conge->total_days}}</td>
												<td>{{$conge->unpaid_days}}</td>
												<td>{{$conge->half_day}}</td>
												<td>{{$conge->reprise_date}}</td>
												<td>
													@if ($conge->value_status == 1)
														<span class="text-success">{{ $conge->status }}</span>
													@elseif  ($conge->value_status == 2)
														<span class="text-warning">{{ $conge->status }}</span>
													@else  
														<span class="text-danger">{{ $conge->status }}</span>
													@endif
		
												</td>
												<td>{{$conge->user}}</td>
												<td>{{$conge->note}}</td>
												<td>
													<div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
														<div class="dropdown dropleft">
															<button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-danger dropdown-toggle"
															data-toggle="dropdown" id="dropleftMenuButton" type="button">Select</button>
															<div aria-labelledby="dropleftMenuButton" class="dropdown-menu tx-13">
																@can('Edit Demande Congé')
															<a class="dropdown-item" href="{{ url('edit_conge') }}/{{ $conge->id }}">Edit Demande Congé</a>
															@endcan

															@can('Suppr Congé')

															<a class="dropdown-item" href="#" data-conge_id="{{ $conge->id }}"
																data-toggle="modal" data-target="#delete_conge"><i
																	class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;
																Suppr Congé</a>
																@endcan
																@can('Changement Statut')
																 
																<a class="dropdown-item"
																	href="{{ URL::route('status_show', [$conge->id]) }}"><i
																		class=" text-success fa fa-money-bill"></i>&nbsp;&nbsp;
																			Changement Statut
																	</a>
																	@endcan
		
																
														</div>
													</div>
													
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
<!-- Supprime Demande  -->
<div class="modal fade" id="delete_conge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel"> Supp. Demande</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<form action="{{ route('conges.destroy', 'test') }}" method="post">
				{{ method_field('delete') }}
                        {{ csrf_field() }}
		</div>
		<div class="modal-body">
			Etes Vous sure de vouloir Seupprimer ?       
			<input type="hidden" name="conge_id" id="conge_id" value="">
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Annul</button>
			<button type="submit" class="btn btn-danger">Confirm</button>
		</div>
		</form>
	</div>
</div>
</div>

					
				</div>
				<!-- /row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
 <!--Internal  Notify js -->
 <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
 <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>


<script>
	$('#delete_conge').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget)
		var conge_id = button.data('conge_id')
		var modal = $(this)
		modal.find('.modal-body #conge_id').val(conge_id);
	})

</script>
@endsection