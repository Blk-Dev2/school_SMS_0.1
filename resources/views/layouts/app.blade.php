<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SchoolSystem | Admin Dashboard</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fc;
        }

        /*Sidebar Styling*/
        #sidebar {
            min-width: 260px;
            max-width: 260px;
            background: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
            color: #fff;
            transition: all 0.3s;
            position: fixed;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 20px;
            background: rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
            padding: 12px 20px;
            margin: 5px 15px;
            display: flex;
            align-items: center;
            border-radius: 8px;
            transition: all 0.2s;
            font-weight: 500;
        }

        .nav-link i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #fff !important;
            transform: translateX(5px);
        }

        .nav-link.active {
            background-color: #fff !important;
            color: #4e73df !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        /*Main Content Area*/
        .main-wrapper {
            margin-left: 260px;
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .top-navbar {
            background-color: #fff;
            height: 70px;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .logout-btn {
            color: #e74a3b;
            font-weight: bold;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background 0.2s;
        }

        .logout-btn:hover {
            background: rgba(231, 74, 59, 0.1);
        }
    </style>
</head>
<body>
    <div id="app" class="d-flex">
        <nav id="sidebar" class="vh-100 shadow">
            <div class="sidebar-header">
                <h4 class="fw-bold mb-0"><i class="fas fa-graduation-cap me-2"></i>EduSys Pro</h4>
            </div>
            
            <div class="p-3">
                <p class="text-uppercase small fw-bold mb-2" style="opacity: 0.5; font-size: 0.7rem; padding-left: 15px;">Main Menu</p>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ url('/home') }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('students*') ? 'active' : '' }}" href="{{ route('students.index') }}">
                            <i class="fas fa-user-graduate"></i> Students
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('teachers*') ? 'active' : '' }}" href="{{ route('teachers.index') }}">
                            <i class="fas fa-chalkboard-teacher"></i> Teachers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('school-classes*') ? 'active' : '' }}" href="{{ route('school-classes.index') }}">
                            <i class="fas fa-school"></i> Classes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('subjects*') ? 'active' : '' }}" href="{{ route('subjects.index') }}">
                            <i class="fas fa-book"></i> Subjects
                        </a>
                    </li>
                </ul>
            </div>

            <div class="mt-auto p-4 position-absolute bottom-0 w-100">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                <a class="nav-link text-white bg-danger rounded" href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt text-white"></i> Logout
                </a>
            </div>
        </nav>

        <div class="main-wrapper">
            <header class="top-navbar">
                <div class="dropdown">
                    <a class="text-decoration-none text-dark fw-bold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=4e73df&color=fff" class="rounded-circle me-2" width="35">
                        Administrator
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                        <li><a class="dropdown-item py-2" href="#"><i class="fas fa-user-cog me-2 text-muted"></i> Profile Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item py-2 text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </header>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

            <main class="p-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>