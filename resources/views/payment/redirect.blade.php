<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>
<style>
    body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
    }

    h1 {
        color: #88B04B;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }

    p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size: 20px;
        margin: 0;
    }

    .checkmark {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left: -15px;
    }

    .checkmarkfail {
        color: #760000;
        font-size: 100px;
        line-height: 200px;
        margin-left: -15px;
    }

    .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
        min-height: 350px;
    }
</style>
<body>
<div class="card">
    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        @if($data['status']=='success')
            <i class="checkmark">✓</i>
            <h1>تمت عملية الدفع بنجاح</h1>
            <h3>شكرا لك</h3>
        @elseif($data['status']=='fail')
            <i class="checkmarkfail">x</i>
            <h4 style="color: darkred">حدث خطـأ اثناء عملية الدفع برجاء المحاولة مرة أخرى</h4>
            <h5>شكرا لك</h5>
        @endif
        <h6>{{$data['description']}}</h6>
    </div>
</div>
</body>
</html>

