<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="app, app landing, app landing page, agency, startup, saas, startup template, saas template, app, app template, app website, clean app landing, app landing, app landing template, business, creative, landing, marketing, product, software, software landing, Simple App Landing, webapp">
    <meta name="author" content="medical_egy">
    <title>medical_egy</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min-rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-dropdownhover.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"  crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link href="fonts/JF-Flat-regular.otf" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles-rtl.css') }}">
    <link rel="shortcut icon" href="{{asset('assets/images/medical_egy_logo.jpeg')}}" />
</head>
<body class="antialiased">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <div class="navbar-toggle cfollapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false" role="button">
                <div class="menu-icon">
                    <div class="toggle-bar "></div>
                </div>
            </div>
            <div class="logo"> <img class="navbar-brand" src="img/logo/medical_egy_logo.jpeg" alt="logo"> </div>
        </div>
        <div class="collapse navbar-collapse" id="menu" data-hover="dropdown" data-animations="fadeInUp">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a class="click-close" href="#home">الرئيسية</a></li>
                <li><a class="click-close" href="#about">حولنا</a></li>
                <li><a class="click-close" href="#download">التحميل</a></li>
                <li><a class="click-close" href="#contact-us">تواصل معنا</a></li>
                <li></li>
            </ul>
        </div>
    </div>
</nav>

<header id="home" class="header-home">
    <div class="container">
        <div class="content-height row">
            <div class="content-height col-lg-8 col-md-6 col-sm-12 col-xs-12">
                <div class="content">
                    <div class="header-text">
                        <h1> medical_egy Arabia</h1>
                        <p>medical_egy descriptio short</p>
                    </div>
                </div>
            </div>
            <div class="mock-header col-lg-4 col-md-6 col-sm-8 col-xs-12">
                <div class="mock"> <img class="custom-image" src="{{ asset('img/view/1.png') }}" alt="default image"> </div>
            </div>
        </div>
    </div>
    <div class="header-elment">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 1080" style="enable-background:new 0 0 1920 1080;" xml:space="preserve">
                    <style type="text/css">
                        .st0 {
                            fill: #FFFFFF;
                        }
                    </style>
            <path class="st0" d="M0,516.42L0,1080h1920V333l-142.25,449.44c-47.14,148.92-206.08,231.44-355,184.3L0,516.42z" /> </svg>
    </div>
</header>

<section id="about" class="about section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                <div class="mock-about"> <img class="custom-image" src="{{ asset('img/view/2.png') }}" alt=""> </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
                <div class="about-text">
                    <h2 class="about-heading">إلق نظرة<br>حول تطبيقنا</h2>
                    <p>
                        medical_egy first clinics management system and realtime patient reservations </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="download" class="download section-padding">
    <div class="container">
        <div class="row">
            <div class="mock-float col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <div class="mock-section mock-float"> <img class="custom-image" src="{{ asset('img/view/1.png') }}" alt=""> </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <div class="download-left">
                    <div class="download-text">
                        <h2>حمل التطبيق الآن</h2>
                        <p></p>
                    </div>
                    <div class="download-badge">
                        <a class="store" href="{{ setting('ios_download_link') }}"><img src="img/badge/app-store.png" alt="store"></a>
                        <a class="play" href="{{ setting('android_download_link') }}"><img src="img/badge/google-play.png" alt="play"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact-us" class="contact-us section-padding">
    <div class="container">
        <div class="row">
            <div class=" col-lg-4 col-md-5 col-sm-12 col-xs-12">
                <div class="mock-section "> <img class="custom-image" src="{{ asset('img/view/4.png') }}" alt=""> </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
                <div class="about-text">
                    <h2> تواصل معنا</h2>
                    <form class="contact_us_form">
                        @csrf
                        <div class="alert alert-danger d-none" id="form_errors" role="alert">
                        </div>
                        <div class="alert alert-success d-none" id="form_success" role="alert">
                            تم أرسال الرساله بنجاح
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" id="name" name="name" class="form-control" placeholder="الاسم" />
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="رقم الهاتف" />
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea  name="message" id="message" class="form-control" placeholder="الرساله" rows="10" ></textarea>
                            </div>
                            <img src="{{asset('assets/images/loader.gif')}}" class="mr-3 d-none" id="loader-image" style="width: 30px" />
                            <input type="submit" value="أرسال" class="subnit_form pull-right" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<footer style="padding: 50px 0 30px 0">
    <div class="container">
        <div class="footer-logo"> <img src="img/logo/medical_egy_logo.jpeg" alt="logo"> </div>
        <div class="footer-link">
            <ul>
                {{--  <li><a href="#">الدعم</a></li>  --}}
                <li><a href="{{ route('settings.privacy') }}">سياسة خاصة</a></li>
                <li><a href="{{ route('settings.terms') }}">الشروط والأحكام</a></li>
                {{--  <li><a href="#">وظائف</a></li>  --}}
            </ul>
        </div>
        <div class="social" style="margin-bottom: 20px">
            <ul>
                <li><a href="https://www.facebook.com/2goarabia"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/medical_egy_arabia?s=21"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://instagram.com/medical_egy_arabia?utm_medium=copy_link"><i class="fab fa-instagram"></i></a></li>
                <li><a href="{{ setting('linkedin') }}"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
        <div>
            <p>جميع الحقوق محفوظة © {{ date('Y' , strToTime(now())) }}</p>
        </div>
    </div>
</footer>

<div class="scroll-top">
            <span class="animated fadeInRight">
                <i class="fas fa-chevron-up"></i>
            </span>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ asset('js/bootstrap-dropdownhover.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        center: true,
        margin: 0,
        rtl: true,
        dots: false,
        autoplay: true,
        nav: true,
        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        autoplayHoverPause: true,
        responsive: {
            991: {
                items: 3
            },
            767: {
                items: 1
            },
            480: {
                items: 1,
                nav: false
            },
            330: {
                items: 1
            }
        }
    });

    $('.contact_us_form').submit(function(e){
        e.preventDefault();
        var frm = $(this);
        var myForm = frm[0];
        var frmData = new FormData(myForm);
        $.ajax({
            type: 'POST',
            global: false,
            url: "{{route('contact.store')}}",
            dataType: "JSON",
            data: frmData,
            cache       : false,
            contentType : false,
            processData : false,
            beforeSend:function (oEvent) {
                $('#loader-image').removeClass('d-none');
            },
            success: function (data) {
                if(data == 'true'){
                    $('#form_errors').addClass('d-none');
                    $('#form_success').removeClass('d-none');
                    $('#name,#phone,#message').val('');
                }
            },
            error: function (reject , ajaxOptions, thrownError) {
                if( reject.status === 422 ) {
                    var errorString = '<ul>';
                    var errors = $.parseJSON(reject.responseText);
                    console.log(reject);
                    console.log(errors.errors);
                    errorString += '<li>' + errors.errors + '</li>';
                    {{-- $.each(errors.errors, function (key, value) {
                    }); --}}
                        errorString += '</ul>';
                    console.log('errorString');
                    $("#form_errors").removeClass('d-none');
                    $('#form_success').addClass('d-none');
                    $("#form_errors").html(errorString);
                }
            },
            complete: function() {
                $('#loader-image').addClass('d-none');
            },
        });

    });

</script>
</body>
</html>
