<html lang="tr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{$title}}</title>
    @vite('resources/js/hotspot.js')
    <style>
        .loading {
            display: flex;
            justify-content: center;
        }

        .loading::after {
            content: "";
            width: 50px;
            height: 50px;
            border: 10px solid #dadada;
            border-top-color: #00aaff;
            border-radius: 50%;
            animation: loading 1s ease infinite;
        }

        @keyframes loading {
            to {
                transform: rotate(1turn);
            }
        }
    </style>
</head>
<body class=" d-flex flex-column">
<div id="spinload" class="d-none d-flex justify-content-center text-center fs-1 mt-5">
    <div style="width: 150px; height: 150px;">
        <div class="loading loading--full-height"></div>
    </div>
</div>
<div x-data="" id="pageMain" style="display:none" class="page page-center">
        {{ $slot }}
</div>
<script>
</script>
</body>
</html>
