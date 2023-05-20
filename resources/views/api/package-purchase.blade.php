<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('payment') }}</title>
    <link rel="icon" type="image/png" sizes="57x57" href="{{ $favicon }}">
    <style>
        .success-page {
            max-width: 300px;
            display: block;
            margin: 0 auto;
            text-align: center;
            position: relative;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .success-page img {
            max-width: 62px;
            display: block;
            margin: 0 auto;
        }

        .btn-view-orders {
            display: block;
            border: 1px solid #f2c522;
            width: 100px;
            margin: 0 auto;
            margin-top: 45px;
            padding: 10px;
            color: #fff;
            background-color: #f2c522;
            text-decoration: none;
            margin-bottom: 20px;
        }

        h2 {
            color: #47c7c5;
            margin-top: 25px;

        }

        a {
            text-decoration: none;
        }

        i {
            color: #9ABC66;
            font-size: 100px;
            line-height: 200px;
            margin-left: -15px;
        }
    </style>
</head>
<body>


<div style="height: 500px;position: relative;">
    <div class="success-page">
        <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
            <i class="checkmark">✓</i>
        </div>
        <h2>Package Subscribed Successfully!</h2>
        <a href="#" id="shipping_btn">Back To Home</a>
    </div>
</div>

</body>
</html>
