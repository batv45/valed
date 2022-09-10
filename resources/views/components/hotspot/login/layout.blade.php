<html lang="tr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{$title}}</title>
    @vite('resources/js/hotspot.js')

</head>
<body class="d-flex flex-column">
<div x-data=""  class="page page-center">
        {{ $slot }}
</div>
<script>
</script>
</body>
</html>
