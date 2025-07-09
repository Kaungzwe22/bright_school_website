<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bright Edu Admin Dashboard</title>
    <link rel="icon" href="{{ asset('imgs/logo.jpg') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- data table  --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.bootstrap5.css">
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.bootstrap5.js"></script>

    {{-- summer note  --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');

        * {
            font-family: "Roboto", sans-serif;
        }
    </style>
    <style>
        .nav-link.active {
            background-color: var(--bs-primary);
            color: #fff !important;
        }

        .theme-toggle {
            position: absolute;
            right: 1rem;
            top: 1rem;
        }

        @media (min-width: 992px) {
            .offcanvas-lg {
                position: static;
                transform: none !important;
                visibility: visible !important;
                background-color: var(--bs-body-bg);
                border-right: 1px solid var(--bs-border-color);
                display: block !important;
            }

            .offcanvas-lg.offcanvas-start {
                width: 100%;
                max-width: none;
            }

            .offcanvas-lg .offcanvas-body {
                display: block !important;
                height: 100vh;
                overflow-y: auto;
            }

            .offcanvas-lg .offcanvas-header {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-light bg-body-tertiary shadow-sm px-3">
        <button class="btn btn-outline-primary d-lg-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#sidebar" aria-controls="sidebar">
            ☰
        </button>
        <a class="navbar-brand ms-3 me-5" href="#">Admin Panel</a>
        <div class="theme-toggle form-check form-switch ms-auto">
            <input class="form-check-input" type="checkbox" id="themeSwitch">
            <label class="form-check-label ms-2 d-none d-lg-block" for="themeSwitch">Dark Mode</label>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-lg-2 p-0">
                <div class="offcanvas offcanvas-start offcanvas-lg" tabindex="-1" id="sidebar"
                    aria-labelledby="sidebarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarLabel">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body p-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}"
                                    class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                    <i class="fa-solid me-2 fa-house"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user_view') }}"
                                    class="nav-link {{ request()->routeIs('user_view') ? 'active' : '' }}">
                                    <i class="fa-solid me-2 fa-users"></i> Users
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin_course_view') }}"
                                    class="nav-link {{ request()->routeIs('admin_course_view') ? 'active' : '' }}">
                                    <i class="fa-solid me-2 fa-chalkboard-user"></i> Courses
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin_project_view') }}"
                                    class="nav-link {{ request()->routeIs('admin_project_view') ? 'active' : '' }}">
                                    <i class="fa-solid me-2 fa-pen-to-square"></i> Projects
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin_classes_view') }}"
                                    class="nav-link {{ request()->routeIs('admin_classes_view') ? 'active' : '' }}">
                                    <i class="fa-solid me-2 fa-clock"></i> Classes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin_register_view') }}"
                                    class="nav-link {{ request()->routeIs('admin_register_view') ? 'active' : '' }}">
                                    <i class="fa-solid fa-user-plus me-1"></i> Registeration
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin_invoice_view') }}"
                                    class="nav-link {{ request()->routeIs('admin_invoice_view') ? 'active' : '' }}">
                                    <i class="fa-solid me-2 fa-print"></i> POS System
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="settings.html"
                                    class="nav-link {{ request()->is('settings') ? 'active' : '' }}">
                                    <i class="fa-solid me-2 fa-user-gear"></i> Settings
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>


            <!-- Main Content -->
            <div class="col-lg-10 ms-auto p-4">
                @yield('content')
            </div>

        </div>
    </div>

    <!-- Bootstrap JS (ensure this is included after HTML content) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Dark mode
        const themeSwitch = document.getElementById('themeSwitch');
    const htmlEl = document.documentElement;

    // Get theme status from localStorage
    let theme_status = localStorage.getItem('theme_status');

    // Apply theme on page load
    if (theme_status === 'dark') {
        htmlEl.setAttribute('data-bs-theme', 'dark');
        themeSwitch.checked = true; // if using a checkbox
    } else {
        htmlEl.setAttribute('data-bs-theme', 'light');
        themeSwitch.checked = false;
    }

    // Toggle theme on switch
    themeSwitch.addEventListener('change', () => {
        const newTheme = themeSwitch.checked ? 'dark' : 'light';
        htmlEl.setAttribute('data-bs-theme', newTheme);
        localStorage.setItem('theme_status', newTheme);
    });

        // Highlight active link
        const currentPage = window.location.pathname.split('/').pop();
        document.querySelectorAll('.nav-link').forEach(link => {
            if (link.getAttribute('href') === currentPage) {
                link.classList.add('active');
            }
        });

        let table = new DataTable('#myTable');
        let table2 = new DataTable('#myTable2');

        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200
            });
        });
    </script>
</body>

</html>
