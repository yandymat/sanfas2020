@extends('layouts.backend.app')

@section('title','Slider')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" >
@endpush

@section('content')
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                AJOUTER UNE NOUVELLE IMAGE AU SLIDER
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" class="form-control" name="name">
                                        <label class="form-label">Nom image : exemple Slider_1</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" class="form-control" name="texte">
                                        <label class="form-label">Texte de l'image</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <a href="{{ route('admin.slider.index') }}" class="btn btn-danger m-t-15 waves-effect">RETOUR</a>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">AJOUTER</button>
                            </form>
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
@endpush