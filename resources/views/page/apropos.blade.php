@extends('layouts.frontend.app')

@section('title')
{{ 'A PROPOS' }}
@endsection

@section('content')
<div class="popular page_section">
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="section_title text-center pb-5">
                    <h1>A propos de SANFAS</h1>
                </div>
                <div class="elements_accordions pt-5">
                    <div class="accordion_container">
                        <div class="accordion d-flex flex-row align-items-center"> Qui sommes-nous?</div>
                        <div class="accordion_panel" style="max-height: 0px;">
                            <p class="text-justify">
                                <strong>Study Abroad Network  For African Student (SANFAS)</strong> est une plateforme dédiée à l’accompagnement des étudiants africain ayant pour besoin de poursuivre leurs études a l’étranger. 
                                Nous sommes forte d’une connaissance terrain pointue, animée par la passion authentique de son savoir faire, et reconnue pour son investissement entier auprès de chaque étudiant, SANFAS est votre allié idéal pour la réussite de vos études. <br> 
                                Study Abroad Network  For African Student(SANFAS)  est une plateforme qui informe, guide, conseils et prépare les étudiants Africain aux programmes universitaires. Nous opérons avec la plus grande sincérité, honnêteté et veillons à ce que chacun de nos étudiants soient entièrement satisfaits de nos services.
                            </p>
                        </div>
                    </div>
                    <div class="accordion_container">
                        <div class="accordion d-flex flex-row align-items-center"> Notre mission</div>
                        <div class="accordion_panel" style="max-height: 0px;">
                            <p class="text-justify">
                                “Devenir la Meilleure et Efficace Plateforme de services éducationnel des étudiants Africains, la Plateforme la plus recherché qui s'efforce d'atteindre ,à satisfaire les besoins des étudiants Africains voulant faire des études a l’étranger.”
                            </p>
                        </div>
                    </div>
                    <div class="accordion_container">
                        <div class="accordion d-flex flex-row align-items-center"> Notre vision</div>
                        <div class="accordion_panel" style="max-height: 0px;">
                            <p class="text-justify">
                                La plateforme <strong>Study Abroad Network For African Student(SANFAS)</strong>  est une solution à votre problème d’orientation, de choix de Filières, de choix de Destinations selon votre budget. Nous croyons en l'égalité des chances et la clé pour atteindre cette objectif est d’exposer les étudiants Africains aux opportunités auxquelles nous avons accès. Nous avons des systèmes Claire et des procédures simple pour assurer la qualité du service afin de garantir la satisfaction maximale des étudiants...
                            </p>
                        </div>
                    </div>
                    <div class="accordion_container">
                        <div class="accordion d-flex flex-row align-items-center"> Nos valeurs</div>
                        <div class="accordion_panel" style="max-height: 0px;">
                            <p class="text-justify">
                                <strong>LA CONFIANCE</strong> : La confiance est de la plus haute importance dans toutes nos transactions et nous nous efforcerons d'atteindre la fiabilité à tout moment. <br>
                                <strong>QUALITÉ APPROPRIÉE</strong> : Nous nous efforcerons toujours de répondre aux besoins sur mesure de nos étudiants. <br> 
                                <strong>SÉCURISÉ ET SÉCURITAIRE</strong> : Vue que pendant la procédure de chaque cas des étudiants, nous rentrons en procession de certains document sensitive, alors veillez noter que nous pratiquons une haute protection de vos documents. <br> 
                                <strong>LA MAIN TENDUE</strong> : Ce n'est pas une stratégie, mais une qualité qui se reflète dans toutes nos transactions avec les étudiants et parents des étudiants. <br> 
                                <strong>INNOVATION</strong> : Les changements, les tendances dans le secteur éducatif a l’étranger change rapidement et à tout moment; nous ferons notre possible d’adapter nos services pour refléter ces changement et aussi d’informer les étudiants sur les nouvelles tendances.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row course_boxes">
            
        </div>
    </div>      
</div>
<!-- Testimonials -->

<div class="testimonials page_section">
    <!-- <div class="testimonials_background" style="background-image:url(assets/images/testimonials_background.jpg)"></div> -->
    <div class="testimonials_background_container prlx_parent">
        <div class="testimonials_background prlx" style="background-image:url(assets/images/milestones_background.jpg)"></div>
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
                                        <img src="assets/images/testimonials_user.jpg" alt="">
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
                                        <img src="assets/images/testimonials_user.jpg" alt="">
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
                                        <img src="assets/images/testimonials_user.jpg" alt="">
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
@endsection
