@extends('layouts.frontend.app')

@section('title')
{{ 'ACCUEIL' }}
@endsection

@section('content')

<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="pb-2">
            <img src="{{ asset('assets/frontend/images/flyer_popup.png') }}" alt="" class="img-fluid">
        </div>
        <form method="POST" action="{{ route('msgbox.store') }}">
            @csrf
          <div class="form-group">
            <input type="text" name="name" class="form-control" id="recipient-name" placeholder="Nom & prenom(s)">
          </div>
          <div class="form-group">
            <input type="text" name="contact" class="form-control" id="recipient-name" placeholder="Contact">
          </div>
          <div class="form-group">
            <input type="text" name="email" class="form-control" id="recipient-name" placeholder="Adresse E-mail">
          </div>
          <div class="form-group">
            <label for="pays">Pays de votre choix</label>
            <select name="pays[]" id="pays" class="form-control show-tick">
                @foreach($pays as $pay)
                    <option value="{{ $pay->id }}">{{ $pay->name }}</option>
                @endforeach
            </select>
          </div>
      <div class="modal-footer">
        <button type="submit" class="newsletter_submit_btn trans_300" onclick="submitPopup()">Oui, je valide</button>
        <button type="button" class="newsletter_submit_btn trans_300" data-dismiss="modal">Nom, merci</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->


    <!-- Home -->

        <div class="home_index">
            <!-- Hero Slider -->
            <div class="hero_slider_container">
                <div class="hero_slider owl-carousel">
                    <!-- Hero Slide -->
                    @foreach ($sliders as $slider)
                    <div class="hero_slide">
                        <div class="hero_slide_background" style="background-image:url({{ asset('storage/slider') }}/{{ $slider->image }})"></div>
                        <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                            <div class="hero_slide_content text-center">
                                <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"><span>{{ $slider->texte}}</span></h1>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="hero_boxes">
            <div class="hero_boxes_inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 hero_box_col">
                            <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                                <img src="{{asset('assets/frontend/images/books.svg')}}" class="svg" alt="">
                                <div class="hero_box_content">
                                    <h2 class="hero_box_title">Bourses d'étude</h2>
                                    <a href="" class="hero_box_link">voir plus</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 hero_box_col">
                            <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                                <img src="{{asset('assets/frontend/images/mortarboard.svg')}}" class="svg" alt="">
                                <div class="hero_box_content">
                                    <h2 class="hero_box_title">Etudier à l'étranger</h2>
                                    <a href="" class="hero_box_link">Voir plus</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 hero_box_col">
                            <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                                <img src="{{asset('assets/frontend/images/earth-globe.svg')}}" class="svg" alt="">
                                <div class="hero_box_content">
                                    <h2 class="hero_box_title">Les destinations</h2>
                                    <a href="" class="hero_box_link">Voir plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Popular -->

        <div class="popular page_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1>Profitez de nos récentes opportunités d'étude</h1>
                    </div>
                </div>
            </div>

            <div class="row course_boxes">

                <!-- Popular Course Item -->

                @foreach ($posts as $post)

                <div class="col-lg-4 course_box">
                    <div class="card">
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
                                <span><a style="color: #1a1a1a" href="{{ route('post.details', $post->slug) }}">Voir l'offre</a></span></div>
                            @endforeach
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
        </div>

    <!-- Register -->

        <div class="register">

        <div class="container-fluid">

            <div class="row row-eq-height">
                <div class="col-lg-6 nopadding">

                    <!-- Register -->

                    <div class="register_section d-flex flex-column align-items-center justify-content-center">
                        <div class="register_content">
                            <h1 class="register_title">qui sommes-nous ?</h1>
                            <p class="register_text text-justify">
                                <strong style="color: #1a1a1a">SANFAS</strong> (Study Abroad Network For African Student ) est une plateforme dédiée à l’accompagnement des étudiants africains ayant pour besoin de poursuivre leurs études à l’étranger. Nous sommes forte d’une connaissance terrain pointue, animée par la passion authentique de son savoir-faire et reconnue pour son investissement entier auprès de chaque étudiant.<br>
                                SANFAS est votre allié idéal pour la réussite de vos projets d’études.
                            </p>
                            <div class="button button_color_2 text-center trans_200 mt-4 w-50 mx-auto">
                                <a class="text-center text-light" href="a-propos.php"> en savoir + </a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 nopadding">

                    <!-- Search -->

                    <div class="search_section d-flex flex-column align-items-center justify-content-center">
                        <div class="search_background" style="background-image:url(images/search_background.jpg);"></div>
                        <div class="search_content text-center">
                            <h1 class="search_title">Trouver une offre d'étude</h1>
                            <form id="search_form" class="search_form" action="{{ route('search') }}" method="GET">
                                <input name="query" id="search_form_name" class="input_field search_form_name" type="text" placeholder="Votre destination" required="required" data-error="Course name is required.">
                                <input name="formation"  id="search_form_category" class="input_field search_form_category" type="text" placeholder="Votre formation">
                                <input name="cycle"  id="search_form_degree" class="input_field search_form_degree" type="text" placeholder="Cycle">
                                <button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">Trouver</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>

    <!-- Testimonials -->

        <div class="testimonials page_section">
        <!-- <div class="testimonials_background" style="background-image:url(assets(images/testimonials_background.jpg)"></div> -->
        <div class="testimonials_background_container prlx_parent">
            <div class="testimonials_background prlx" style="background-image:url({{asset('assets/frontend/images/testimonials_background.jpg')}})"></div>
        </div>
        <div class="container">

            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1>Les témoignages de nos étudiant(e)s</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-10 offset-lg-1">

                    <div class="testimonials_slider_container">

                        <!-- Testimonials Slider -->
                        <div class="owl-carousel owl-theme testimonials_slider">

                            <!-- Testimonials Item -->
                            <div class="owl-item">
                                <div class="testimonials_item text-center">
                                    <div class="quote">“</div>
                                    <p class="testimonials_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
                                    <div class="testimonial_user">
                                        <div class="testimonial_image mx-auto">
                                            <img src="images/testimonials_user.jpg" alt="">
                                        </div>
                                        <div class="testimonial_name">james cooper</div>
                                        <div class="testimonial_title">Graduate Student</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Testimonials Item -->
                            <div class="owl-item">
                                <div class="testimonials_item text-center">
                                    <div class="quote">“</div>
                                    <p class="testimonials_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
                                    <div class="testimonial_user">
                                        <div class="testimonial_image mx-auto">
                                            <img src="images/testimonials_user.jpg" alt="">
                                        </div>
                                        <div class="testimonial_name">james cooper</div>
                                        <div class="testimonial_title">Graduate Student</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Testimonials Item -->
                            <div class="owl-item">
                                <div class="testimonials_item text-center">
                                    <div class="quote">“</div>
                                    <p class="testimonials_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
                                    <div class="testimonial_user">
                                        <div class="testimonial_image mx-auto">
                                            <img src="images/testimonials_user.jpg" alt="">
                                        </div>
                                        <div class="testimonial_name">james cooper</div>
                                        <div class="testimonial_title">Graduate Student</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

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
                <div id="myCarousel" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner w-100" role="listbox">
                    @foreach($universites as $key => $universite)
                        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                            <div class="col-lg-4 col-md-6">
                               <a href="{{ $universite->lien }}"><img class="img-thumbnail" src="{{ asset('storage/universites') }}/{{ $universite->image }}"></a>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
