<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hazard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="card-icon" viewBox="0 0 33 40">
        <path d="M31.99 37.41L29.7046 11.6754C29.6374 10.9713 29.0549 10.4262 28.3603 10.4262H23.6551V8.26838C23.6551 4.27077 20.451 1 16.4852 1C12.5418 1 9.31536 4.24806 9.31536 8.26838V10.4262H4.61014C3.91556 10.4262 3.33301 10.9713 3.26579 11.6754L1.0028 37.5009C0.980395 37.887 1.09242 38.2505 1.33889 38.5457C1.58535 38.8183 1.94384 39 2.32474 39H30.6457C31.3851 39 31.99 38.3867 31.99 37.6372C32.0124 37.5463 31.99 37.4782 31.99 37.41ZM12.0265 8.29109C12.0265 5.79259 14.043 3.74836 16.5076 3.74836C18.9723 3.74836 20.9888 5.79259 20.9888 8.29109V10.4489H12.0265V8.29109ZM3.82593 36.2744L5.86486 13.1745H9.33776V15.6049C9.33776 16.3545 9.94272 16.9677 10.6821 16.9677C11.4215 16.9677 12.0265 16.3545 12.0265 15.6049V13.1518H20.9664V15.5822C20.9664 16.3317 21.5713 16.945 22.3107 16.945C23.0501 16.945 23.6551 16.3317 23.6551 15.5822V13.1518H27.128L29.1669 36.2516H3.82593V36.2744Z"
              fill="white" stroke="white" stroke-miterlimit="10"/>
    </symbol>

    <symbol id="arrow-up" viewBox="0 0 33 20">
        <path d="M2 18L16.5 3L31 18" stroke-width="3"/>
    </symbol>

    <symbol id="arrow-down" viewBox="0 0 33 20">
        <path d="M2 2L16.5 17L31 2" stroke-width="3"/>
    </symbol>
</svg>

<div id="app">
    <div class="container">
        <div class="row">
            <sidebar></sidebar>
            <router-view></router-view>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
