@extends('layouts.frontend.app')

@section('title')
{{ 'NOS UNIVERSITES' }}
@endsection

@section('content')

    <!-- Popular -->

        <div class="popular page_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1>Nos universités partenaires</h1>
                    </div>
                </div>
            </div>

            <div class="row course_boxes">


                

                <!-- Popular Course Item -->

                @foreach ($universites as $universite)
                    <div class="col-lg-4 course_box pb-5 view view-first">
                        <img class="card-img-top" src="{{ asset('storage/universites') }}/{{ $universite->image }}" alt="{{ $universite->slug }}">
                        <div class="card-body mask">
                            <h2>{{ $universite->name }}</h2>  
                            <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie</p>  
                            <a href="#" class="info">En savoir plus</a> 
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
@endsection
