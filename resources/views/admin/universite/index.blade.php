@extends('layouts.backend.app')

@section('title','Universités partenaires')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/sweetalert2.min.css')}}">
    <style>
        .table > tbody > tr > td{
            vertical-align: middle;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
            <div class="block-header">
                <a class="btn btn-primary waves-effect" href="{{ route('admin.universite.create') }}">
                    <i class="material-icons">add</i>
                    <span>Ajouter une université partenaire</span>
                </a>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TOUTES LES UNIVERSITES PARTENAIRES
                            </h2>
                                Vous avez au total : <span class="badge bg-pink"> {{ $universites->count() }}</span> université partenaire(s)
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Image</th>
                                            <th>Site web université</th>
                                            <th>Date d'ajout</th>
                                            <th>Date de modification</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Image</th>
                                            <th>Site web université</th>
                                            <th>Date d'ajout</th>
                                            <th>Date de modification</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody >
                                                @foreach($universites as $key=>$universite)
                                            <tr class="data">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $universite->name }}</td>
                                                <td><img src="{{ asset('storage/universites') }}/{{ $universite->image }}" alt="{{ $universite->slug }}" style="width:80px"></td>
                                                <td><a href="{{ $universite->lien }}">{{ $universite->lien }}</a></td>
                                                <td>{{ date_format($universite->created_at, 'd-m-Y') }}</td>
                                                <td>{{ date_format($universite->updated_at, 'd-m-Y') }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.universite.edit',$universite->id) }}" class="btn btn-info waves-effect">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <button class="btn btn-danger waves-effect" type="button" onclick="deleteUniversite({{ $universite->id }})">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                    <form id="delete-form-{{ $universite->id }}" action="{{ route('admin.universite.destroy',$universite->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                                @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
@endsection

@push('js')
    <script src="{{asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="{{asset('assets/backend/js/sweetalert2.all.min.js')}}"></script>
    <script type="text/javascript">
        function deleteUniversite(id){

            const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
              },
              buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
              title: 'Êtes vous sûr?',
              text: "De bien vouloir supprimer",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Oui, supprimer!',
              cancelButtonText: 'Non, annuler!',
              reverseButtons: true
            }).then((result) => {
              if (result.value) {
                  event.preventDefault();
                  document.getElementById('delete-form-'+id).submit();

               
              } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
              ) {
                swalWithBootstrapButtons.fire(
                  'Annulé',
                  'Vous avez annulé l\'oppération',
                  'error'
                )
              }
            })
        }
    </script>
@endpush