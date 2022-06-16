<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords"
          content="app, app landing, app landing page, agency, startup, saas, startup template, saas template, app, app template, app website, clean app landing, app landing, app landing template, business, creative, landing, marketing, product, software, software landing, Simple App Landing, webapp">
    <meta name="author" content="medical_egy">
    <title>Medical EGY</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min-rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-dropdownhover.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link href="fonts/JF-Flat-regular.otf" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles-rtl.css') }}">
    <link rel="shortcut icon" href="{{asset('assets/images/medical_egy_logo.jpeg')}}"/>
</head>
<body class="antialiased">

<iframe style="width: 100%;height: 100%" src="http://medicalegy.com/"></iframe>

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

    $('.contact_us_form').submit(function (e) {
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
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function (oEvent) {
                $('#loader-image').removeClass('d-none');
            },
            success: function (data) {
                if (data == 'true') {
                    $('#form_errors').addClass('d-none');
                    $('#form_success').removeClass('d-none');
                    $('#name,#phone,#message').val('');
                }
            },
            error: function (reject, ajaxOptions, thrownError) {
                if (reject.status === 422) {
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
            complete: function () {
                $('#loader-image').addClass('d-none');
            },
        });

    });

</script>
</body>
</html>
