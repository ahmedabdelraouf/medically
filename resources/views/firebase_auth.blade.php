<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laravel 8 Firebase Phone Number Auth with Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .container {
            max-width: 500px;
            margin-top: 50px;
        }

    </style>
</head>

<body>
<div class="container">
    <div class="alert alert-danger" id="showError" style="display: none;"></div>

    <h4>Phone number</h4>
    <div class="alert alert-success" id="authSuccess" style="display: none;"></div>

    <form>
        <div class="form-group mb-3">
            <input type="text" id="phoneNumber" class="form-control" placeholder="+91 #########">
        </div>

        <div class="form-group">
            <div id="recaptcha-container"></div>
        </div>

        <div class="d-grid mt-3">
            <button type="button" class="btn btn-dark" onclick="sendFirebasePhoneOTP();">Send OTP</button>
        </div>
    </form>


    <div class="mb-5 mt-5">
        <h3>Enter OTP</h3>
        <div class="alert alert-success" id="otpSuccess" style="display: none;"></div>
        <form>

            <input type="text" id="verfifyNumber" class="form-control" placeholder="Verification code">

            <div class="d-grid mt-3">
                <button type="button" class="btn btn-danger mt-3" onclick="verifyPhoneNumber()">Authenticate</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

<script>
    var firebaseConfig = {
        apiKey: "AIzaSyCLITUCR2LeFlSBipw2gX4isbAe735no8g",
        databaseURL: "https://PROJECT_ID.firebaseio.com",
        authDomain: "medical_egy-app-94599.firebaseapp.com",
        projectId: "medical_egy-app-94599",
        storageBucket: "medical_egy-app-94599.appspot.com",
        messagingSenderId: "257849141723",
        appId: "1:257849141723:web:c716364bd779c294521ffe",
        measurementId: "G-SD3JQ1TP45"
    };
    firebase.initializeApp(firebaseConfig);
</script>

<script type="text/javascript">
    window.onload = function () {
        render();
    };

    function render() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }

    function sendFirebasePhoneOTP() {
        var phoneNumber = $("#phoneNumber").val();
        firebase.auth().signInWithPhoneNumber(phoneNumber, window.recaptchaVerifier)
            .then(function (confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                $("#authSuccess").text("Message sent");
                $("#authSuccess").show();
            }).catch(function (error) {
            $("#showError").text(error.message);
            $("#showError").show();
        });
    }

    function verifyPhoneNumber() {
        var code = $("#verfifyNumber").val();
        coderesult.confirm(code).then(function (res) {
            var user = res.user;
            alert(user);
            $("#otpSuccess").text("Auth successful");
            $("#otpSuccess").show();
        }).catch(function (error) {
            $("#showError").text(error.message);
            $("#showError").show();
        });
    }
</script>
</body>

</html>
