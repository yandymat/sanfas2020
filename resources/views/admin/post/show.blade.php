@extends('layouts.backend.app')

@section('title','Post')

@push('css')

@endpush

@section('content')
        <div class="container-fluid">
            <a href="{{ route('admin.post.index') }}" class="btn btn-danger waves-effect">Retour</a>
            @if($post->is_approved ==  false)
                <button type="button" class="btn btn-success waves-effect pull-right" onclick="approvePost({{ $post->id }})">
                    <i class="material-icons">done</i>
                    <span>Aprouvé</span>
                </button>
                <form method="POST" action="{{ route('admin.post.approuver', $post->id) }}" id="approbation-form" style="display: none;">
                    @csrf
                    @method('PUT')
                </form>
            @else
                <button type="button" class="btn btn-success pull-right" disabled="true">
                    <i class="material-icons">done</i>
                    <span>Aprouvé</span>
                </button>
            @endif
            <br>
            <br>
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    {{ $post->title }} 
                                    <small>
                                        publié par 
                                        <strong><a href="">{{ $post->user->name }}</a></strong> le {{ ($post->created_at->format('d-M-Y à H:i:s')) }}
                                    </small>
                                </h2>
                            </div>
                            <div class="body">
                                {!! $post->body !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header bg-cyan">
                                <h2>
                                    Pays
                                </h2>
                            </div>
                            <div class="body">
                                @foreach($post->pays as $pay)
                                    <span class="label bg-cyan">{{ $pay->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Tags
                                </h2>
                            </div>
                            <div class="body">
                                @foreach($post->tags as $tag)
                                    <span class="label bg-red">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h2>
                                    image d'illustration
                                </h2>
                            </div>
                            <div class="body">
                                <img class="img-responsive thumbnail" src="{{ url('storage/post/'. $post->image) }}">
                            </div>
                        </div>
                        <div class="card">
                            <div class="header text-center">
                                <a href="{{ route('admin.post.edit',$post->id) }}" class="btn btn-info waves-effect"><i class="material-icons">edit</i>Modifier le post</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
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
    <script src="{{asset('assets/backend/js/bootstrap-select.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/tinymce/tinymce.js')}}"></script>
    <script src="{{asset('assets/backend/js/sweetalert2.all.min.js')}}"></script>
    <script>
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{asset('assets/backend/plugins//tinymce')}}';
        });

        function approvePost(id){
            const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
              },
              buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
              title: 'Êtes vous sûr?',
              text: "De bien vouloir approuver ce post !",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Oui, approuver!',
              cancelButtonText: 'Non, annuler!',
              reverseButtons: true
            }).then((result) => {
              if (result.value) {
                  event.preventDefault();
                  document.getElementById('approbation-form').submit();

               
              } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
              ) {
                swalWithBootstrapButtons.fire(
                  'Annulé',
                  'le poste est en attente',
                  'info'
                )
              }
            })
        }
    </script>
@endpush