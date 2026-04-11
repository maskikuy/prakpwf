<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas Praktikum</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0f0f0f] text-white flex items-center justify-center min-h-screen font-sans antialiased">

    <div class="border border-gray-800 rounded-lg p-10 w-full max-w-4xl h-72 flex flex-col justify-center mx-4">
        
        <h1 class="text-xl font-medium tracking-wide">Rizky Gusti Afiq</h1>
        
        <p class="text-gray-400 mt-2 mb-6 text-sm">20230140060</p> 

        <div class="flex gap-3">
            <a href="#" class="inline-block bg-[#f4f4f5] text-black text-sm font-medium px-4 py-2 rounded hover:bg-gray-300 transition duration-200">
                Modul Pertemuan 1
            </a>

            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="inline-block bg-indigo-600 text-white text-sm font-medium px-4 py-2 rounded hover:bg-indigo-700 transition duration-200">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="inline-block border border-gray-600 text-gray-300 text-sm font-medium px-4 py-2 rounded hover:bg-gray-800 transition duration-200">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-block border border-gray-600 text-gray-300 text-sm font-medium px-4 py-2 rounded hover:bg-gray-800 transition duration-200">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>

    </div>

</body>
</html>