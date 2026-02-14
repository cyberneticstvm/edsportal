<!DOCTYPE html>
<html>

<head>
    <title>Empire Data Systems | Course Certificate</title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        html,
        body {
            margin: 0;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            font-size: 12px;
            font-weight: normal;
            background-image: url("./assets/images/cert-bg.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .title-color {
            color: #394432;
        }

        .font-big {
            font-size: 20px;
        }

        .font-medium {
            font-size: 15px;
        }

        .text-center {
            text-align: center;
        }

        .text-right,
        .text-end {
            text-align: right;
        }

        .table,
        .no-border {
            border: none !important;
        }

        .mx-auto {
            margin: 0 auto !important;
        }

        .bordered td,
        .bordered th,
        .bordered {
            border: 1px solid #e6e6e6;
        }

        .box {
            border: 1px solid #000;
        }

        .border-0 {
            border: 0;
        }

        th,
        td {
            border: 1px solid #262525;
            padding: 5px;
            text-align: left;
        }

        .ln-h-30 {
            line-height: 30px;
        }

        .ln-h-10 {
            line-height: 10px;
        }

        .ln-h-5 {
            line-height: 5px;
        }

        .pd-1 {
            padding: 3px !important;
        }

        .mt-10 {
            margin-top: 10px;
        }

        .mt-3 {
            margin-top: 3px;
        }

        .mt-5 {
            margin-top: 5px;
        }

        .mb-5 {
            margin-bottom: 5px;
        }

        .mt-30 {
            margin-top: 30px;
        }

        .mt-50 {
            margin-top: 50px;
        }

        .pt-50 {
            padding-top: 50px;
        }

        .mt-100 {
            margin-top: 100%;
        }

        .mb-50 {
            margin-bottom: 10px;
        }

        .mb-50 {
            margin-bottom: 50px;
        }

        .h-50>tr>td {
            height: 50px;
        }

        .fw-bold {
            font-weight: bold;
        }

        .text-danger {
            color: red;
        }

        .txt {
            font-size: 10px !important;
        }

        .b-0 {
            border-bottom: none !important;
            border-top: none !important;
        }

        footer {
            position: fixed;
            bottom: -30px;
            left: 0px;
            right: 0px;
            height: 50px;
            text-align: center;
            line-height: 35px;
        }

        .dt {
            position: absolute;
            right: 30%;
            bottom: 17%;
        }

        .qr {
            position: absolute;
            right: 15%;
            bottom: 15%;
        }

        .code {
            position: absolute;
            right: 13%;
            bottom: 9%;
        }
    </style>
</head>

<body>
    <div class="container">
        <!--<img src="data:image/png;base64, {!! $qrcode !!}">-->
        <div class="text-center" style="margin-top: 21%;">
            <p class="font-medium">This certificate is awarded to</p>
            <h1>{{ $certificate->student_name }}</h1>
            <p class="font-medium">in recognition of successfully completing 90+ hours training program in</p>
            @forelse($courses as $key => $course):
            <h1 class="ln-h-5">{{ $course->name }}</h1>
            @empty
            @endforelse
        </div>
        <div>
            <p class="dt font-medium">{{ $certificate->created_at->format('m/d/Y') }}</p>
            <img class="qr" src="data:image/png;base64, {!! base64_encode($qrcode) !!}">
        </div>
        <div>
            <p class="code">Verification QR Code<br>Cert No: {{ $certificate->course->code }}{{ $certificate->cert_id }}</p>
        </div>
    </div>
</body>

</html>