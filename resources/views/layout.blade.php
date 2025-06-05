{{-- layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <header class="w-full h-20 flex justify-center items-center">
        <h1 class="text-2xl md:text-4xl"><b>Sistem Pemesanan Lapangan</b></h1>
    </header>
    
    <main class="p-10 px-15 w-full">
        @if(session('success'))
            <script>
                alert('{{ session('success') }}');
            </script>
        @endif

        @if(session('error'))
            <script>
                alert('{{ session('error') }}');
            </script>
        @endif
        @yield('content')
    </main>
    
    <footer class="w-full flex flex-col justify-end items-end px-10 pb-10">
        <div class="border-t-1 w-full h-0 "></div>
        <p class="pt-2"><em>by Jeremiah Salim Hidayat - C14230034</em></p>
    </footer>
</body>
</html>