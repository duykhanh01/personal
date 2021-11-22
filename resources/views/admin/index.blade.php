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

    <!-- header for mobile begin -->
    <header class="header-light header-for-mobile transparent scroll-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between">
                        <div class="align-self-center header-col-left">
                            <!-- logo begin -->
                            <div id="logo">
                                <a href="/">
                                    {{$profile->name}}
                                </a>
                            </div>
                            <!-- logo close -->
                        </div>
                        <div class="align-self-center ml-auto header-col-mid">
                            <!-- mainmenu begin -->
                            <ul id="mainmenu" class="scrollnav">
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
                        </div>
                        <div class="align-self-center ml-auto header-col-right">
                            <div class="social-icons">
                                <a href="{{$profile->fb_url}}"><i class="fa fa-facebook fa-lg"></i></a>
                                <a href="{{$profile->ins_url}}"><i class="fa fa-instagram fa-lg"></i></a>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#profileModal">
                        Chỉnh sửa hồ sơ
                    </button>
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

    <!-- Model update profile -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/profile/{{$profile->id}}" enctype="multipart/form-data" id="form-profile" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Họ tên</label>
                            <input type="text" class="form-control @error('profile-name') is-invalid @enderror" name="profile-name" value="{{ old('profile-name') ?? $profile->name }}" required autocomplete="profile-name" autofocus" id="exampleInputEmail1">
                            @if ($errors->has('profile-name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('profile-name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Địa chỉ</label>
                            <input class="form-control @error('profile-address') is-invalid @enderror" name="profile-address" value="{{ old('profile-address') ?? $profile->address }}" required autocomplete="profile-address" autofocus" id="">
                            @if ($errors->has('profile-address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('profile-address') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input class="form-control @error('profile-email') is-invalid @enderror" name="profile-email" value="{{ old('profile-email') ?? $profile->email }}" required autocomplete="profile-email" autofocus" id="">
                            @if ($errors->has('profile-email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('profile-email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Số điện thoại</label>
                            <input class="form-control @error('profile-phone') is-invalid @enderror" name="profile-phone" value="{{ old('profile-phone') ?? $profile->phone }}" required autocomplete="profile-phone" autofocus" id="">
                            @if ($errors->has('profile-phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('profile-phone') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Link facbook</label>
                            <input class="form-control @error('profile-fb') is-invalid @enderror" name="profile-fb" value="{{ old('profile-fb') ?? $profile->fb_url }}" autocomplete="profile-fb" autofocus" id="">
                            @if ($errors->has('profile-fb'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('profile-fb') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Link instagram</label>
                            <input class="form-control @error('profile-ins') is-invalid @enderror" name="profile-ins" value="{{ old('profile-ins') ?? $profile->ins_url }}" autocomplete="profile-ins" autofocus" id="">
                            @if ($errors->has('profile-ins'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('profile-ins') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Chọn ảnh đại diện của bạn</label>
                            <input type="file" class="form-control-file" accept="image/*" / id="image" name="profile-image">
                            @if ($errors->has('profile-image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('profile-image') }}</strong>
                            </span>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" id="submit-profile" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- header for desktop close -->

    <div id="main-content">
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>

            <section id="section-hero" class="vertical-center" data-bgimage="url(storage/{{$profile->home->image}}) top" data-stellar-background-ratio=".5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 offset-lg-7">
                            <h1 class="wow fadeInUp" data-wow-delay=".5s">{{$profile->home->title}}</h1>
                            <p class="lead wow fadeInUp" data-wow-delay=".75s">{{$profile->home->content}}</p>
                            <div class="spacer-20"></div>
                            <a class="btn-custom scroll-to wow fadeInUp" data-wow-delay="1s" data-toggle="modal" data-target="#homeModal">Chỉnh sửa</a>
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
                                <a class="btn-custom scroll-to wow fadeInUp" data-wow-delay="1s" data-toggle="modal" data-target="#aboutModal">Chỉnh sửa</a>
                            </div>
                            <p>
                                {{$profile->about->content}}
                            </p>
                            <div class="spacer-10"></div>
                            <span id="btn-show-skills" class="btn-border wow fadeInUp mb-2 mr-3" data-wow-delay="1s">Các kỹ năng</span>
                            <span id="btn-show-skills" class="btn-border wow fadeInUp" data-toggle="modal" data-target="#addSkill" data-wow-delay="1s">Thêm kỹ năng</span>
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
                                    <div class="action">
                                        <a class="mb-2 update-skill" skill-id="{{$skill->id}}" skill-name="{{$skill->name}}" skill-progress="{{$skill->progress}}" href="" data-toggle="modal" data-target="#updateSkill"><i class="fa fa-edit"></i></a>
                                        <a class="mb-2 update-skill" skill-id="{{$skill->id}}" href="admin/skill/{{$skill->id}}"><i class=" fa fa-trash"></i></a>
                                    </div>

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

            <section id="section-portfolio">
                <div class="container">
                    <!-- portfolio filter begin -->
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2><span class="id-color">Yêu Thích</span></h2>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary d-block mr-2" data-toggle="modal" data-target="#favoriteModal">Thêm mục</button>
                                <button class="btn btn-primary d-block mr-2" data-toggle="modal" data-target="#listFavorite">Quản lý mục</button>
                                <button class="btn btn-primary d-block" data-toggle="modal" data-target="#favoriteDetailsModal">Thêm ảnh</button>

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
                                                <a class="mb-2 update-favorite-details text-dark" favorite-details-id="{{$favorite_detail->id}}" favorite-title="{{$favorite_detail->title}}" farotite-group="{{$favorite->id}}" href="" data-toggle="modal" data-target="#editDetailsFavorite"><i class="fa fa-edit fa-lg"></i></a>
                                                <a class="mb-2  text-danger" href="admin/favorite/details/{{$favorite_detail->id}}"><i class="fa fa-trash-alt fa-lg"></i></a>
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
        <!-- Home Modal -->
        <div class="modal fade" id="homeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa home</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/home/{{$profile->id}}" enctype="multipart/form-data" id="form-home" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tiêu đề</label>
                                <input type="text" class="form-control @error('home-title') is-invalid @enderror" name="home-title" value="{{ old('home-title') ?? $profile->home->title }}" required autocomplete="home-title" autofocus" id="">
                                @if ($errors->has('home-title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('home-title') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Nội dung</label>
                                <textarea class="form-control @error('home-content') is-invalid @enderror" name="home-content" required autocomplete="home-content" autofocus" id="">{{ old('home-content') ?? $profile->home->content }}</textarea>
                                @if ($errors->has('home-content'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('home-content') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Chọn ảnh đại diện của bạn</label>
                                <input type="file" class="form-control-file" accept="image/*" / id="image" name="home-image">
                                @if ($errors->has('home-image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('home-image') }}</strong>
                                </span>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="submit-home" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update About Modal -->
        <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa about</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/about/{{$profile->id}}" enctype="multipart/form-data" id="form-about" method="post">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3">
                                <label for="" class="form-label">Nội dung</label>
                                <textarea class="form-control @error('about-content') is-invalid @enderror" name="about-content" required autocomplete="about-content" autofocus" id="">{{ old('about-content') ?? $profile->about->content }}</textarea>
                                @if ($errors->has('about-content'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('about-content') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Chọn ảnh lớn</label>
                                <input type="file" class="form-control-file" accept="image/*" / id="image" name="about-bigimage">
                                @if ($errors->has('about-bigimage'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('about-bigimage') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Chọn ảnh nhỏ</label>
                                <input type="file" class="form-control-file" accept="image/*" / id="image" name="about-smallimage">
                                @if ($errors->has('about-smallimage'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('about-smallimage') }}</strong>
                                </span>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="submit-about" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add skill Modal -->
        <div class="modal fade" id="addSkill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm kĩ năng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/skill" enctype="multipart/form-data" id="form-add-skill" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tên</label>
                                <input type="text" class="form-control @error('skill-name') is-invalid @enderror" name="skill-name" value="{{ old('skill-name')  }}" required autocomplete="skill-name" autofocus" id="">
                                @if ($errors->has('skill-name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('skill-name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Thanh tiến trình ( từ 1% - 100% )</label>
                                <input type="number" class="form-control @error('skill-progress') is-invalid @enderror" name="skill-progress" value="{{ old('skill-progress')  }}" required autocomplete="skill-progress" autofocus" placeholder="%" id="">
                                @if ($errors->has('skill-progress'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('skill-progress') }}</strong>
                                </span>
                                @endif
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="submit-add-skill" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- update skill Modal -->
        <div class="modal fade" id="updateSkill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Chỉnh sửa kĩ năng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/skill/{{$profile->skill->id ?? ""}}" enctype="multipart/form-data" id="form-update-skill" method="post">
                            @csrf
                            @method('PATCH')
                            <input class="skill-id" type="hidden" name="skill-id" value="">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tên</label>
                                <input type="text" class="form-control skill-name @error('skill-update-name') is-invalid @enderror" name="skill-update-name" value="{{ old('skill-update-name')}} " required autocomplete="skill-update-name" autofocus" id="">
                                @if ($errors->has('skill-update-name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('skill-update-name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Thanh tiến trình ( từ 1% - 100% )</label>
                                <input type="number" class="form-control skill-progress @error('skill-update-progress') is-invalid @enderror" name="skill-update-progress" value="{{ old('skill-update-progress') }} " required autocomplete="skill-update-progress" autofocus" placeholder="%" id="">
                                @if ($errors->has('skill-update-progress'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('skill-update-progress') }}</strong>
                                </span>
                                @endif
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="submit-update-skill" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- add favorite modal -->
        <div class="modal fade" id="favoriteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel4">Thêm mục</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/favorite" enctype="multipart/form-data" id="form-favorite" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tên</label>
                                <input type="text" class="form-control @error('favorite-name') is-invalid @enderror" name="favorite-name" value="{{ old('favorite-name')  }}" required autocomplete="favorite-name" autofocus" id="">
                                @if ($errors->has('favorite-name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('favorite-name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="submit-favorite" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- list favorite modal -->
        <div class="modal fade" id="listFavorite" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel6">Quản lý mục</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên mục</th>
                                    <th scope="col">Số ảnh</th>
                                    <th scope="col">Xoá mục</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($profile->favorites as $i=>$favorite)
                                <tr>
                                    <th scope="row">{{$i+1}}</th>
                                    <td>{{$favorite->name}}</td>
                                    <td>
                                        {{$favorite->favorite_details->count()}}
                                    </td>
                                    <td>
                                        <a class="" href="/admin/favorite/{{$favorite->id}}">
                                            <i class="fas fa-trash-alt text-danger"></i>
                                        </a>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="submit-favorite" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- add favorite details modal -->
        <div class="modal fade" id="favoriteDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabe5">Thêm ảnh trong danh mục</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/favorite/details" enctype="multipart/form-data" id="form-favorite-details" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Tiêu đề ảnh</label>
                                <input class="form-control @error('favorite-title') is-invalid @enderror" name="favorite-title" required autocomplete="favorite-title" value="{{ old('favorite-title') }}" autofocus" id="">
                                @if ($errors->has('favorite-title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('favorite-title') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Danh mục</label>
                                <select class="form-control" name="favorite-id">

                                    <option>Chọn danh mục</option>

                                    @foreach($profile->favorites as $favorite)
                                    <option value="{{ $favorite->id }}"> {{ $favorite->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Chọn ảnh của bạn</label>
                                <input type="file" class="form-control-file" accept="image/*" / id="image" name="favorite-image">
                                @if ($errors->has('favorite-image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('favorite-image') }}</strong>
                                </span>
                                @endif
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="submit-favorite-details" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- update favorite modal -->
        <div class="modal fade" id="editDetailsFavorite" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabe5">Chỉnh sửa ảnh</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" enctype="multipart/form-data" id="form-update-favorite-details" method="post">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3">
                                <label for="" class="form-label">Tiêu đề ảnh</label>
                                <input class="form-control favorite-title @error('favorite-title') is-invalid @enderror" name="favorite-update-title" autocomplete="favorite-title" value="{{ old('favorite-title') }}" autofocus" id="">
                                @if ($errors->has('favorite-title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('favorite-title') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Chọn ảnh của bạn</label>
                                <input type="file" class="form-control-file" accept="image/*" / id="image" name="favorite-update-image">
                                @if ($errors->has('favorite-image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('favorite-image') }}</strong>
                                </span>
                                @endif
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="submit-update-favorite-details" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- content close -->

        <!-- footer begin -->
        <footer class="footer">
            <div class="container">
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