@extends('layouts.app')

@section('content')
<div id="wrapper">
    <div class="page-overlay">
        <div class="preloader-wrap">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div>
    <!-- header Mobile -->
    <header class="header-light header-for-mobile transparent scroll-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between">
                        <div class="align-self-center header-col-left">
                            <!-- logo begin -->
                            <div id="logo">
                                <a href="index.html">
                                    {{$profile->name}}
                                </a>
                            </div>
                            <!-- logo close -->
                        </div>
                        <div class="align-self-center ml-auto header-col-mid">
                            <!-- mainmenu begin -->
                            <ul id="mainmenu" class="scrollnav">
                                <li><a href="#section-hero" class="active">Home</a></li>
                                <li></li>
                                <li><a href="#section-about">About</a></li>
                                <li></li>
                                <li><a href="#section-services">Services</a></li>
                                <li></li>
                                <li><a href="#section-portfolio">Portfolio</a></li>
                                <li></li>
                                <li><a href="#section-blog">Blog</a></li>
                                <li></li>
                                <li><a href="#section-contact">Contact</a></li>
                                <li></li>
                            </ul>

                            <!-- mainmenu close -->
                        </div>
                        <div class="align-self-center ml-auto header-col-right">
                            <div class="social-icons">
                                <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                                <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                                <a href="#"><i class="fa fa-linkedin fa-lg"></i></a>
                                <a href="#"><i class="fa fa-instagram fa-lg"></i></a>
                            </div>

                            <span id="menu-btn"></span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header for mobile close -->

    <!-- header for desktop begin -->
    <div id="sidebar-content" class="text-center">
        <div class="sc-inner">
            <!-- logo begin -->
            <div id="sc-logo">
                <div>
                    <img src="storage/{{$profile->image}}" class="img-fluid" alt="">
                    <h1>{{$profile->name}}</h1>
                </div>
            </div>
            <!-- logo close -->

            <!-- mainmenu begin -->
            <ul id="menuside" class="scrollnav">
                <li><a href="#section-hero" class="active">Trang chủ</a></li>
                <li></li>
                <li><a href="#section-about">Giới thiệu</a></li>
                <li></li>

                <li><a href="#section-portfolio">Yêu thích</a></li>
                <li></li>

                <li><a href="#section-contact">Liên hệ</a></li>
                <li></li>
            </ul>
            <!-- mainmenu close -->

            <div class="social-icons">
                <a href="{{$profile->fb_url}}"><i class="fa fa-facebook fa-lg"></i></a>
                <a href="{{$profile->ins_url}}"><i class="fa fa-instagram fa-lg"></i></a>
            </div>
        </div>

        <div class="sc-bg"></div>
    </div>
    <!-- header for desktop close -->

    <div id="main-content">
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>

            <section id="section-hero" class="vertical-center" data-bgimage="url(storage/{{$profile->home->image}}) top" data-stellar-background-ratio=".5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-5 offset-lg-7">
                            <h1 class="wow fadeInUp" data-wow-delay=".5s">{{$profile->home->title}}</h1>
                            <p class="lead wow fadeInUp" data-wow-delay=".75s">{{$profile->home->content}}</p>
                            <div class="spacer-20"></div>
                            <a class="btn-custom scroll-to wow fadeInUp" data-wow-delay="1s" href="#section-about">About Me</a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="section-about">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 mb-sm-30 text-center">
                            <div class="de-images">
                                <img class="di-small-2 wow fadeInLeft" src="storage/{{$profile->about->small_image}}" alt="" />
                                <img class="img-fluid wow fadeInRight" src="storage/{{$profile->about->big_image}}" alt="" />
                            </div>
                        </div>

                        <div class="col-lg-5 offset-md-1 wow fadeInLeft" data-wow-delay=".5s">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2>Về <span class="id-color">Tôi</span></h2>
                            </div>
                            <p>
                                {{$profile->about->content}}
                            </p>
                            <div class="spacer-10"></div>
                            <span id="btn-show-skills" class="btn-border wow fadeInUp mb-2 mr-3" data-wow-delay="1s">Các kỹ năng</span>
                        </div>
                    </div>

                    <div id="skills" class="row">
                        <div class="spacer-double"></div>
                        <div class="spacer-double"></div>
                        @foreach($profile->skills as $skill)
                        <div class="col-md-4">
                            <div class="skill-bar style-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5>{{$skill->name}}</h5>


                                </div>
                                <div class="de-progress">
                                    <div class="value"></div>
                                    <div class="progress-bar" data-value="{{$skill->progress}}%"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- section begin -->
            <!-- section close -->

            <!-- section begin -->
            <section id="section-portfolio">
                <div class="container">
                    <!-- portfolio filter begin -->
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2><span class="id-color">Yêu Thích</span></h2>
                            <div class="d-flex justify-content-center">

                            </div>
                        </div>

                        <div class="spacer-single"></div>

                        <div class="col-md-12 text-center">
                            <ul id="filters">
                                <li>
                                    <a href="#" data-filter="*" class="link selected">Tất cả</a>

                                </li>
                                @foreach ($profile->favorites as $favorite)
                                <li class="position-relative">
                                    <a href="#" class="link" data-filter=".favorite-{{$favorite->id}}">{{$favorite->name}}</a>
                                </li>
                                @endforeach
                            </ul>

                            <div id="gallery" class="gallery full-gallery de-gallery pf_full_width pf_3_cols grid sequence">
                                <!-- gallery item -->
                                @foreach ($profile->favorites as $favorite)
                                @foreach ($favorite->favorite_details as $favorite_detail)
                                <div class="item favorite-{{$favorite->id}} website gallery-item">
                                    <div class="picframe wow">
                                        <span class="overlay">
                                            <span class="pf_text">
                                                <span class="project-name">{{$favorite_detail->title}}</span>
                                            </span>
                                        </span>
                                        <img src="storage/{{$favorite_detail->image}}" alt="" />
                                    </div>
                                </div>
                                @endforeach
                                @endforeach
                                <!-- close gallery item -->

                                <!-- close gallery item -->
                            </div>
                        </div>
                        <!-- portfolio filter close -->
                    </div>
                </div>
            </section>
            <!-- section close -->





            <!-- section begin -->
            <section id="section-contact" class="no-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="text-center">
                                <h2>Liên hệ tôi</h2>
                                <div class="spacer-30"></div>
                            </div>
                        </div>
                    </div>
                    @if(Session::has('msg-success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('msg-success')}}
                    </div>
                    @endif
                    <form name="contactForm" id="contact_form" class="row form-default" method="post" action="/contact/send">
                        @csrf

                        <div class="col-md-6">
                            <div class="field-set">
                                <input type="text" name="contact-name" id="name" class="form-control @error('contact-name') is-invalid @enderror" placeholder="Tên của bạn" />
                                <div class="line-fx"></div>
                            </div>

                            <div class="field-set">
                                <input type="text" name="contact-email" id="email" class="form-control @error('contact-email') is-invalid @enderror" placeholder="Email" />
                                <div class="line-fx"></div>

                            </div>

                            <div class="field-set">
                                <input type="text" name="contact-phone" id="phone" class="form-control @error('contact-phone') is-invalid @enderror" placeholder="Số điện thoại" />
                                <div class="line-fx"></div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="field-set">
                                <textarea name="contact-message" id="message" class="form-control @error('contact-message') is-invalid @enderror" placeholder="Tin nhắn"></textarea>
                                <div class="line-fx"></div>

                            </div>
                        </div>

                        <div class="spacer-single"></div>

                        <div class="col-md-12 text-center">
                            <div>
                                <input type="submit" id="send-contact" value="Gửi" class="btn btn-custom color-2" />
                            </div>
                            <div id="mail_success" class="success">Your message has been sent successfully.</div>
                            <div id="mail_fail" class="error">Sorry, error occured this time sending your message.</div>
                        </div>
                    </form>

                    <div class="spacer-double"></div>

                    <div class="row text-center wow fadeInUp">
                        <div class="col-md-4">
                            <div class="wm-1"></div>
                            <i class="icon_mobile id-color size40 mb20"></i>
                            <h6 class="id-color">Số điện thoại</h6>
                            <p>{{$profile->phone}}</p>
                        </div>

                        <div class="col-md-4">
                            <div class="wm-1"></div>
                            <i class="icon_house_alt id-color size40 mb20"></i>
                            <h6 class="id-color">Địa chỉ</h6>
                            <p>{{$profile->address}}</p>
                        </div>

                        <div class="col-md-4">
                            <div class="wm-1"></div>
                            <i class="icon_mail_alt id-color size40 mb20"></i>
                            <h6 class="id-color">Email</h6>
                            <p>{{$profile->email}}</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- content close -->

        <!-- footer begin -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6 sm-text-center mb-sm-30">
                        &copy; Copyright 2020 - Jess by Designesia
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer close -->
    </div>

    <a href="#" id="back-to-top"></a>

    <div id="preloader">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
</div>

@endsection