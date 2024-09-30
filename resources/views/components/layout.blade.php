<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel Positions</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-black text-white font-hanken-grotesk pb-20">
    <div class="px-10">
        <nav class="flex justify-between items-center py-4 border-b border-white/10">
            <div>
                <a href="{{url('/')}}">
                    <img src="{{Vite::asset('resources/images/logo.svg')}}" alt="" srcset="">
                </a>
            </div>
            <div class="space-x-6 font-bold">
                <a href="{{url('/')}}">Jobs</a>
                <a href="">Careers</a>
                <a href="">Salaries</a>
                <a href="">Companies</a>
            </div>
            @auth()
                <div class="space-x-6 font-bold flex">
                    <a href="{{url('/jobs/create')}}">Post a Job</a>
                    <form action="{{url('logout')}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Logout</button>
                    </form>
                </div>
            @endauth

            @guest()
                <div class="space-x-6 font-bold">
                    <a href="{{url('/register')}}">Sign Up</a>
                    <a href="{{url('/login')}}">Login</a>
                </div>
            @endguest
        </nav>

        <main class="mt-10 max-w-[986px] mx-auto">
            {{$slot}}
        </main>
    </div>
</body>
</html>
