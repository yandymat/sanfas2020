@extends('layouts.backend.app')

@section('title','Post')

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
                <a class="btn btn-primary waves-effect" href="{{ route('admin.post.create') }}">
                    <i class="material-icons">add</i>
                    <span>Ajouter un Post</span>
                </a>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TOUS LES POSTS
                            </h2>
                            <div>
                                Vous avez au total : <span class="badge bg-pink"> {{ $posts->count() }}</span> post(s)
                            </div>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Intitulé</th>
                                            <th>Auteur</th>
                                            <th><i class="material-icons">visibility</i></th>
                                            <th>Approuvé</th>
                                            <th>Status</th>
                                            <th>Ajouté le</th>
                                            <th>Modifié le</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Intitulé</th>
                                            <th>Auteur</th>
                                            <th><i class="material-icons">visibility</i></th>
                                            <th>Approuvé</th>
                                            <th>Status</th>
                                            <th>Ajouté le</th>
                                            <th>Modifié le</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody >
                                        @foreach($posts as $key=>$post)
                                            <tr class="data">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ str_limit($post->title, $limit = 15, $end = '...') }}</td>
                                                <td>{{ $post->user->name }}</td>
                                                <td>{{ $post->view_count }}</td>
                                                <td>
                                                    @if($post->is_approved == true)
                                                        <span class="badge bg-blue">Approuvé</span>
                                                    @else
                                                        <span class="badge bg-pink">En attente</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($post->status == true)
                                                        <span class="badge bg-blue">publié</span>
                                                    @else
                                                        <span class="badge bg-pink">En attente</span>
                                                    @endif
                                                </td>
                                                <td>{{ ($post->created_at->format('d-m-Y')) }}</td>
                                                <td>{{ ($post->updated_at->format('d-m-Y')) }}</td>
                                                <td class="text-center">

                                                    <a href="{{ route('admin.post.show',$post->id) }}" class="btn btn-success waves-effect">
                                                        <i class="material-icons">visibility</i>
                                                    </a>

                                                    <a href="{{ route('admin.post.edit',$post->id) }}" class="btn btn-info waves-effect">
                                                        <i class="material-icons">edit</i>
                                                    </a>

                                                    <button class="btn btn-danger waves-effect" type="button" onclick="deletePost({{ $post->id }})">
                                                        <i class="material-icons">delete</i>
                                                    </button>

                                                    <form id="delete-form-{{ $post->id }}" action="{{ route('admin.post.destroy',$post->id) }}" method="POST" style="display: none;">
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
        function deletePost(id){

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