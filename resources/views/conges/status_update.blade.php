@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
 Edit Statut
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Demandes</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                   Changment de Status </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('status_update'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('status_update') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                       <!--   route('status_update', ['id' => $conges->id]) -->
                    <form action="{{route('status_update', ['id' => $conges->id])}}" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">Matricule </label>
                                <input type="hidden" name="conges_id" value="{{ $conges->id }}">
                                <input type="text" class="form-control" id="employee_number" name="employee_number"
                                   value="{{ $conges->employee_number }}" readonly  required>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">Raison de la Demande </label>
                                <input type="text" class="form-control" id="conges_reason" name="conges_reason"
                                value="{{ $conges->reason }}" readonly required>
                            </div>
                            <div class="col">
                                <label> Date de la demande</label>
                                <input class="form-control fc-datepicker" name="conges_date" id="conges_date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ $conges->conges_date }}" readonly required>
                            </div>

                            

                        </div>

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">service</label>
                                <select name="leave" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')" readonly>
                                    <!--placeholder-->
                                    <option value=" {{ $conges->leavelists->id }}" >
                                        {{ $conges->leavelists->leave_name }}
                                    </option>
                                    
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">Equipe</label>
                                <select id="products" name="products"  class="form-control" readonly>
                                    <option value="{{ $conges->products }}" > {{ $conges->products }}</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="start_date"> Date Début</label>
                                <input  type="date" id="start_date" name="start_date" class="form-control fc-datepicker"  placeholder="YYYY-MM-DD"
                                    type="text" value="{{ $conges->start_date }}" readonly required>
                            </div>
                            <div class="col">
                                <label for="end_date">Date fin </label>
                                <input type="date" id="end_date" name="end_date" class="form-control fc-datepicker" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ $conges->end_date }}" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="half_day">Choix Congé</label>
                                <input class="form-control" id="half_day" name="half_day" value="{{ $conges->half_day }}" readonly>
                                    
                                   
                                
                            </div>
                            
                        </div>


                        {{-- 3 --}}
                       
                        
                        <div class="row">
                            <div class="col">
                                <label for="result_label" class="control-label">Total jours </label>
                                <input type="text" class="form-control" id="total_days" name="total_days" value="{{ $conges->total_days }}"   readonly>

                            </div>

                            

                            <div class="col">
                                <label for="inputName" class="control-label">Votre total Congé sans solde</label>
                                <input type="text" class="form-control form-control-lg" id="unpaid_days" name="unpaid_days"
                                   
                                    
                               value="{{ $conges->unpaid_days }}" readonly  >
                            </div>


                            <div class="row">
                                <div class="col">
                                    <label for="reprise_date">Date de reprise </label>
                                    <input type="date" id="reprise_date" name="reprise_date" class="form-control fc-datepicker" placeholder="YYYY-MM-DD"
                                        type="text" value="{{ $conges->reprise_date }}" readonly >
                                </div>
    <div class="col">
                                
                            </div>  

                        </div>

                        {{-- 4 --}}

                    
                        </div>

                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">Remarques</label>
                                <textarea class="form-control" id="exampleTextarea" name="note" value="{{ $conges->note }}"rows="3" readonly></textarea>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea"> Etat status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option selected="true" disabled="disabled">-- Select etat status --</option>
                                    <option value="Accepted">Accepter</option>
                                    <option value="Refused"> Refuser </option>
                                </select>
                            </div>

                            <div class="col">
                                <label> Date Modification</label>
                                <input class="form-control fc-datepicker" name="status_date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ date('Y-m-d') }}" required>
                            </div>


                        </div><br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">  Valider</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
 <!-- Internal jquery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();

    </script>

 



@endsection
