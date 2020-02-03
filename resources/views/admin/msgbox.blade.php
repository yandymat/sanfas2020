@extends('layouts.backend.app')

@section('title','Message Box')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/sweetalert2.min.css')}}">
@endpush

@section('content')
    <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TOUTES LES MAILS
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom & prenom</th>
                                            <th>Adresse mail</th>
                                            <th>Contact</th>
                                            <th>Destination</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom & prenom</th>
                                            <th>Adresse mail</th>
                                            <th>Contact</th>
                                            <th>Destination</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                                @foreach($msgboxx as $key=>$msgbox)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $msgbox->name }}</td>
                                                <td>{{ $msgbox->email }}</td>
                                                <td>{{ $msgbox->contact }}</td>
                                                <td>
                                                    @foreach($msgbox->pays as $mp)
                                                    {{ $mp->name}}
                                                    @endforeach
                                                </td>
                                                <td>{{ date_format($msgbox->created_at, 'd-m-Y') }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-danger waves-effect" type="button" onclick="deleteSub({{ $msgbox->id }})">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                    <form id="delete-form-{{ $msgbox->id }}" action="{{ route('admin.msgbox.destroy',$msgbox->id) }}" method="POST" style="display: none;">
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
        function deleteSub(id){

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
