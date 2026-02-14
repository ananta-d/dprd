<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pengaduan</title>

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        .bg-nickelfox { background-color: #f4f7fe; } /* Warna khas background Nickelfox */
    </style>
</head>
<body class="bg-nickelfox antialiased">
    <div class="min-h-screen">
        <main>
            {{ $slot }}
        </main>
    </div>

    @include('sweetalert::alert')

</body>
</html>
