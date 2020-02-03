@extends('layouts.frontend.app')

@section('title')
{{ 'NOS OPPORTUNITES' }}
@endsection

@section('content')

    <!-- Popular -->

        <div class="popular page_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1>Nos opportunités d'étude</h1>
                    </div>
                </div>
            </div>

            <div class="row course_boxes">

                <!-- Popular Course Item -->

                @foreach ($posts as $post)

                <div class="col-lg-4 course_box pb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ asset('storage/post') }}/{{ $post->image }}" alt="{{ $post->slug }}">
                        <div class="card-body">
                            <div class="card-title"><a href="courses.html">{{ str_limit($post->title, $limit = 50, $end = '...') }}</a></div>
                        </div>
                        <div class="price_box d-flex flex-row align-items-center">
                            @foreach ($post->pays as $p)
                            <div class="course_author_image">
                                <img src="{{ asset('storage/pays') }}/{{ $p->image }}" alt="{{ $p->slug }}">
                            </div>
                            <div class="course_author_name"><span>{{ $p->name }}</span></div>
                            <div class="course_price d-flex flex-column align-items-center justify-content-center">
                                <span>
                                    <a style="color: #1A1A1A" href="{{ route('post.details',$post->slug) }}">voir</a>
                                </span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
        </div>
@endsection
