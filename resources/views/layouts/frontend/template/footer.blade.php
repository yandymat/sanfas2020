    <footer class="footer">
        <div class="container">
            
            <!-- Newsletter -->

            <div class="newsletter">
                <div class="row">
                    <div class="col">
                        <div class="section_title text-center">
                            <h1>S'inscrire à la Newsletter</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col text-center">
                        <div class="newsletter_form_container mx-auto">
                            <form action="post">
                                <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-center">
                                    <input id="newsletter_email" class="newsletter_email" type="email" placeholder="Adresse Mail" required="required" data-error="Valid email is required.">
                                    <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">S'inscrire maintenant</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Footer Content -->

            <div class="footer_content">
                <div class="row">

                    <!-- Footer Column - About -->
                    <div class="col-lg-4 footer_col">

                        <!-- Logo -->
                        <div class="logo_container">
                            <div class="logo">
                                <img src="{{asset('assets/frontend/images/logo_sanfas.png')}}" alt="">
                            </div>
                        </div>

                        <p class="footer_about_text">Study Abroad Network For African Student (SANFAS)
                            Le réseau d'étude à l'étranger pour les étudiants Africain.</p>

                    </div>

                    <!-- Footer Column - Usefull Links -->

                    <div class="col-lg-4 footer_col">
                        <div class="footer_column_title">Liens utiles</div>
                        <div class="footer_column_content">
                            <ul>
                                <li class="footer_list_item"><a href="{{ route('index') }}">Accueil</a></li>
                                <li class="footer_list_item"><a href="{{ route('a-propos') }}">A propos</a></li>
                                <li class="footer_list_item"><a href="{{ route('nos-opportunites') }}">Nos opportunités</a></li>
                                <li class="footer_list_item"><a href="{{ route('nos-universites') }}">Nos universités</a></li>
                                <li class="footer_list_item"><a href="{{ route('contacts') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Footer Column - Contact -->

                    <div class="col-lg-4 footer_col">
                        <div class="footer_column_title">Contact</div>
                        <div class="footer_column_content">
                            <ul>
                                <li class="footer_contact_item">
                                    <div class="footer_contact_icon">
                                        <img src="{{asset('assets/frontend/images/placeholder.svg')}}" alt="">
                                    </div>
                                    Riviera palmeraie, Cocody-Abidjan 
                                </li>
                                <li class="footer_contact_item">
                                    <div class="footer_contact_icon">
                                        <img src="{{asset('assets/frontend/images/smartphone.svg')}}" alt="">
                                    </div>
                                    Abidjan : (+225) 47 05 73 01 
                                </li>
                                <li class="footer_contact_item">
                                    <div class="footer_contact_icon">
                                        <img src="{{asset('assets/frontend/images/smartphone.svg')}}" alt="">
                                    </div>
                                    Londres : (+44) 778 726 9271 
                                </li>
                                <li class="footer_contact_item">
                                    <div class="footer_contact_icon">
                                        <img src="{{asset('assets/frontend/images/envelope.svg')}}" alt="">
                                    </div>info@sanfas.com
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer Copyright -->

            <div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
                <div class="footer_copyright">
                    <span>&copy;SANFAS<script>document.write(new Date().getFullYear())</script> | Tous droits reservés </span>
                </div>
                <div class="footer_social ml-sm-auto">
                    <ul class="menu_social">
                        <li class="menu_social_item"><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                        <li class="menu_social_item"><a href=""><i class="fab fa-instagram"></i></a></li>
                        <li class="menu_social_item"><a href=""><i class="fab fa-facebook-f"></i></a></li>
                        <li class="menu_social_item"><a href=""><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </footer>