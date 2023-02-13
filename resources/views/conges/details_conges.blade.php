@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
     Details De La Demande
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Demandes Des Congés </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Details Demandes </span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    <!-- row opened -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab"> Infos Demande
                                                    </a></li>
                                            <li><a href="#tab5" class="nav-link" data-toggle="tab">Status </a></li>
                                            <li><a href="#tab6" class="nav-link" data-toggle="tab">Pieces Jointes</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">


                                        <div class="tab-pane active" id="tab4">
                                            <div class="table-responsive mt-15">

                                                <table class="table table-striped" style="text-align:center">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row"> Matricule </th>
                                                            <td>{{ $conge->employee_number }}</td>
                                                            <th scope="row"> Date De la demande</th>
                                                            <td>{{ $conge->conges_date }}</td>
                                                            <th scope="row">Service </th>
                                                            <td>{{ $conge->leavelists->leave_name }}</td>
                                                            <th scope="row">Equipe</th>
                                                            <td>{{ $conge->products }}</td>
                                                        </tr>

                                                        <tr>
                                                           
                                                            <th scope="row">Début Congé </th>
                                                            <td>{{ $conge->start_date }}</td>
                                                            <th scope="row">Fin Congé </th>
                                                            <td>{{ $conge->end_date }}</td>
                                                            <th scope="row">Date reprise</th>
                                                            <td>{{ $conge->reprise_date }}</td>
                                                        </tr>


                                                        <tr>
                                                            <th scope="row"> Total jours</th>
                                                            <td>{{ $conge->total_days }}</td>
                                                            <th scope="row"> Dnt Congés ss</th>
                                                            <td>{{ $conge->unpaid_days }}</td>
                                                            <th scope="row"> Demi journée </th>
                                                            <td>{{ $conge->half_day }}</td>
                                                            <th scope="row"> Raison </th>
                                                            <td>{{ $conge->reason }}</td>
                                                            <th scope="row">Etat actuel </th>

                                                            @if ($conge->value_status == 1)
                                                                <td><span
                                                                        class="badge badge-pill badge-success">{{ $conge->status }}</span>
                                                                </td>
                                                            @elseif($conge->value_status ==2)
                                                                <td><span
                                                                        class="badge badge-pill badge-warning">{{ $conge->status }}</span>
                                                                </td>
                                                            @else 
                                                                <td><span
                                                                        class="badge badge-pill badge-danger">{{ $conge->status }}</span>
                                                                </td>
                                                            @endif
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">Note</th>
                                                            <td>{{ $conge->note }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab5">
                                            <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0 table-hover"
                                                    style="text-align:center">
                                                    <thead>
                                                        <tr class="text-dark">
                                                            <th>#</th>
                                                            <th> Matricule</th>
                                                            <th>Equipe </th>
                                                            <th>Service</th>
                                                            <th>Etat  </th>
                                                            <th>date statut  </th>
                                                            <th>Remarques</th>
                                                            <th>Date insertion  </th>
                                                            <th>Utilisateur</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 0; ?>
                                                        @foreach ($details as $x)
                                                            <?php $i++; ?>
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $x->employee_number }}</td>
                                                                <td>{{ $x->products }}</td>
                                                                <td>{{ $conge->leavelists->leave_name }}</td>
                                                                @if ($x->value_status == 1)
                                                                    <td><span
                                                                            class="badge badge-pill badge-success">{{ $x->status }}</span>
                                                                    </td>
                                                                @elseif($x->value_status ==2)
                                                                    <td><span
                                                                            class="badge badge-pill badge-warning">{{ $x->status }}</span>
                                                                    </td>
                                                                @else   
                                                                    <td><span
                                                                            class="badge badge-pill badge-danger">{{ $x->status }}</span>
                                                                    </td>
                                                                @endif
                                                                <td>{{ $x->status_date }}</td>
                                                                <td>{{ $x->note }}</td>
                                                                <td>{{ $x->created_at }}</td>
                                                                <td>{{ $x->user }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>


                                        <div class="tab-pane" id="tab6">
                                            <!--pieces jointes-->
                                            <div class="card card-statistics">
                                               (' Ajout pj')
                                                    <div class="card-body">
                                                        <p class="text-danger">* Format  pdf, jpeg ,.jpg , png </p>
                                                        <h5 class="card-title"> Ajout PJ</h5>
                                                        <form method="post" action="{{ url('/CongesAttachments') }}"
                                                            enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="customFile"
                                                                    name="file_name" required>
                                                                <input type="hidden" id="customFile" name="employee_number"
                                                                    value="{{ $conge->employee_number }}">
                                                                <input type="hidden" id="LeaveApplication_id" name="LeaveApplication_id"
                                                                    value="{{ $conge->id }}">
                                                                <label class="custom-file-label" for="customFile">
                                                                    Select PJ</label>
                                                            </div><br><br>
                                                            <button type="submit" class="btn btn-primary btn-sm "
                                                                name="uploadedFile">Confirm</button>
                                                        </form>
                                                    </div>
                                                
                                                <br>

                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0 table table-hover"
                                                        style="text-align:center">
                                                        <thead>
                                                            <tr class="text-dark">
                                                                <th scope="col">PJ</th>
                                                                <th scope="col"> Nom du fichier</th>
                                                                <th scope="col"> Ajoutée Par </th>
                                                                <th scope="col"> Date D'Ajout</th>
                                                                <th scope="col">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 0; ?>
                                                            @foreach ($attachments as $attachment)
                                                                <?php $i++; ?>
                                                                <tr>
                                                                    <td>{{ $i }}</td>
                                                                    <td>{{ $attachment->file_name }}</td>
                                                                    <td>{{ $attachment->created_by }}</td>
                                                                    <td>{{ $attachment->created_at }}</td>
                                                                    <td colspan="2">

                                                                        <a class="btn btn-outline-success btn-sm"
                                                                            href="{{ url('View_file') }}/{{ $conge->employee_number }}/{{ $attachment->file_name }}"
                                                                            role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                            Voir</a>

                                                                        <a class="btn btn-outline-info btn-sm"
                                                                            href="{{ url('download_file') }}/{{ $conge->employee_number }}/{{ $attachment->file_name }}"
                                                                            role="button"><i
                                                                                class="fas fa-download"></i>&nbsp;
                                                                            Download</a>
                                                                            @can('Supp PJ')

                                                                            <button class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-file_name="{{ $attachment->file_name }}"
                                                                                data-employee_number="{{ $attachment->employee_number }}"
                                                                                data-id_file="{{ $attachment->id }}"
                                                                                data-target="#delete_file">Supp</button>
                                                                                @endcan
                                                                     

                                                                    </td>
                                                                   
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /div -->
        </div>

    </div>
    <!-- /row -->

    <!-- delete -->
    <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Suppr. PJ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('delete_file') }}" method="post">

                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red">   Etes Vous sure De vouloir Supprimer ?     </h6>
                        </p>

                        <input type="hidden" name="id_file" id="id_file" value="">
                        <input type="hidden" name="file_name" id="file_name" value="">
                        <input type="hidden" name="employee_number" id="employee_number" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annul</button>
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

    <script>
        $('#delete_file').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_file = button.data('id_file')
            var file_name = button.data('file_name')
            var employee_number = button.data('employee_number')
            var modal = $(this)

            modal.find('.modal-body #id_file').val(id_file);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #employee_number').val(employee_number);
        })

    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

    </script>

@endsection
