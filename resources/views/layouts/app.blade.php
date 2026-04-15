<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>


   <!-- css style -->
    <style>
    
    nav.bg-dark {
        min-width: 250px;
        max-width: 250px;
        background-color: #212529 !important;
        transition: all 0.3s;
    }

    .nav-link {
        color: rgba(255, 255, 255, 0.8) !important;
        padding: 10px 20px;
        display: block;
        transition: 0.3s;
    }

    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: #fff !important;
        border-radius: 5px;
        margin: 0 10px;
    }

    .nav-link.active {
        background-color: #0d6efd !important;
        color: #fff !important;
        border-radius: 5px;
        margin: 0 10px;
    }

    
    main {
        flex: 1;
        background-color: #f8f9fa;
        min-height: 100vh;
    }
</style>
</head>
<body>
    <div id="app" class="d-flex">
        <nav class="bg-dark text-white p-3 vh-100 shadow" style="width: 250px; position: fixed;">
            <h4 class="text-center mb-4 border-bottom pb-2">School System</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link text-white {{ Request::is('home') ? 'bg-primary rounded' : '' }}" href="{{ url('/home') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white {{ Request::is('students*') ? 'bg-primary rounded' : '' }}" href="{{ route('students.index') }}">
                         Students
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white {{ Request::is('teachers*') ? 'bg-primary rounded' : '' }}" href="{{ route('teachers.index') }}">
                        Teachers
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white {{ Request::is('school-classes*') ? 'bg-primary rounded' : '' }}" href="{{ route('school-classes.index') }}">
                         Classes
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white {{ Request::is('subjects*') ? 'bg-primary rounded' : '' }}" href="{{ route('subjects.index') }}">
                         Subjects
                    </a>
                </li>
            </ul>
            
            <div class="mt-auto pt-4 border-top">
                <a class="nav-link text-danger" href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </div>
        </nav>

        <main class="py-4 w-100" style="margin-left: 260px;">
            @yield('content')
        </main>
    </div>
</body>
</html>
