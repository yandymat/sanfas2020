@extends('layouts.frontend.app')

@section('title')
{{ $post->title }}
@endsection

@push('css')
@endpush

@section('content')


<!-- News -->

<div class="news">
    <div class="container pt-5">
        <div class="row">

            <!-- News Post Column -->

            <div class="col-lg-8">

                <div class="news_post_container">
                    <!-- News Post -->
                    <div class="news_post">
                        <div class="news_post_image">
                            <img src="{{ asset('storage/post') }}/{{ $post->image }}" alt="{{ $post->slug }}">
                        </div>
                        <div class="news_post_top d-flex flex-column flex-sm-row">
                            <div class="news_post_title_container">
                                <div class="news_post_title">
                                    <a href="news_post.html">{{ $post->title }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="news_post_text">
                            <p class="text-justify">{!! $post->body !!}</p>
                        </div>

                        <div class="news_post_quote">
                            <p class="news_post_quote_text"><span>Les conditions à remplir</span><br>tiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies venena tis. Suspendisse fermentum sodales lacus, lacinia gravida elit.</p>
                        </div>
                    </div>

                </div>

                

                <!-- Leave Comment -->

                <div class="leave_comment">
                    <div class="leave_comment_title">Laissez-nous un message</div>

                    <div class="leave_comment_form_container">
                        <form action="post">
                            <input id="comment_form_name" class="input_field contact_form_name" type="text" placeholder="Name" required="required" data-error="Name is required.">
                            <input id="comment_form_email" class="input_field contact_form_email" type="email" placeholder="E-mail" required="required" data-error="Valid email is required.">
                            <textarea id="comment_form_message" class="text_field contact_form_message" name="message" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
                            <button id="comment_send_btn" type="submit" class="comment_send_btn trans_200" value="Submit">send message</button>
                        </form>
                    </div>
                </div>

            </div>

            <!-- Sidebar Column -->

            <div class="col-lg-4">
                <div class="sidebar">

                    <!-- Tags 

                    <div class="sidebar_section">
                        <div class="sidebar_section_title">
                            <h3>Mots clés</h3>
                        </div>
                        <div class="tags d-flex flex-row flex-wrap">
                            @foreach ($tag as $t )
                            <div class="tag">
                                    <a href="#">{{ $t->name }}</a>
                                </div>
                            @endforeach
                            </div>
                    </div>
                -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
@endpush

