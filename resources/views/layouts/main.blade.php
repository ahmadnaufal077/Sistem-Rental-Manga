<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku | @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/st.css') }}"> --}}

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <style>
        .active {
            color: white;
        }
    </style>

</head>
</head>

<body>
    <div id="wrapper">

        <!-- Sidebar -->
        @if (Auth::user())
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <div class="sidebar-brand d-flex align-items-center justify-content-center">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="bi bi-emoji-smile"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">

                        @if (Auth::user()->role_id == 1)
                            {{ Auth::user()->username }}
                        @else
                            {{ Auth::user()->username }}
                        @endif
                    </div>
                </div>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">


                @if (Auth::user()->role_id == 1)
                    <li
                        @if (request()->route()->uri == 'dashboard') class="active nav-item mx-1" @else class="nav-item mx-1" @endif>
                        <a class="nav-link" href="/dashboard" href="/dashboard">
                            <i class="bi bi-grid"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">
                        Interface
                    </div>

                    <li
                        @if (request()->route()->uri == 'users' ||
                                request()->route()->uri == 'registered-user' ||
                                request()->route()->uri == 'user-detail/{slug}' ||
                                request()->route()->uri == 'user-approve/{slug}' ||
                                request()->route()->uri == 'user-delete/{slug}' ||
                                request()->route()->uri == 'user-deleted') class="active nav-item mx-1" @else class="nav-item mx-1" @endif>
                        <a class="nav-link" href="/users">
                            <i class="bi bi-person"></i>
                            <span>User</span></a>
                    </li>

                    <li
                        @if (request()->route()->uri == 'books' ||
                                request()->route()->uri == 'book-add' ||
                                request()->route()->uri == 'book-edit/{slug}' ||
                                request()->route()->uri == 'book-delete/{slug}' ||
                                request()->route()->uri == 'book-deleted') class="active nav-item mx-1" @else class="nav-item mx-1" @endif>
                        <a class="nav-link" href="/books">
                            <i class="bi bi-journal-bookmark"></i>
                            <span>Book</span>
                        </a>
                    </li>

                    <li
                        @if (request()->route()->uri == 'category' ||
                                request()->route()->uri == 'category-add' ||
                                request()->route()->uri == 'category-edit/{slug}' ||
                                request()->route()->uri == 'category-delete/{slug}' ||
                                request()->route()->uri == 'category-deleted') class="active nav-item mx-1" @else class="nav-item mx-1" @endif>
                        <a class="nav-link" href="/category">
                            <i class="bi bi-tag"></i>
                            <span>Category</span></a>
                    </li>

                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">
                        Addons
                    </div>

                    <li
                        @if (request()->route()->uri == '/') class="active nav-item mx-1" @else class="nav-item mx-1" @endif>
                        <a class="nav-link" href="/">
                            <i class="bi bi-card-list"></i>
                            <span>Books List</span></a>
                    </li>

                    <li
                        @if (request()->route()->uri == 'book-rent') class="active nav-item mx-1" @else class="nav-item mx-1" @endif>
                        <a class="nav-link" href="/book-rent">
                            <i class="bi bi-upload"></i>
                            <span>Rental Book</span></a>
                    </li>

                    <li
                        @if (request()->route()->uri == 'book-return') class="active nav-item mx-1" @else class="nav-item mx-1" @endif>
                        <a class="nav-link" href="/book-return">
                            <i class="bi bi-download"></i>
                            <span>Renturn Book</span></a>
                    </li>

                    <li class="nav-item mx-1">
                        <a class="nav-link" href="/logout">
                            <i class="bi bi-box-arrow-left"></i>
                            <span>Log Out</span></a>
                    </li>
                @else
                    <li
                        @if (request()->route()->uri == 'profile') class="active nav-item mx-1" @else class="nav-item mx-1" @endif>
                        <a class="nav-link" href="/profile">
                            <i class="bi bi-grid"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">
                        Interface
                    </div>

                    <li
                        @if (request()->route()->uri == '/profile-detail') class="active nav-item mx-1" @else class="nav-item mx-1" @endif>
                        <a class="nav-link" href="/profile-detail">
                            <i class="bi bi-person-circle"></i>
                            <span>Profile</span></a>
                    </li>

                    <li
                        @if (request()->route()->uri == '/') class="active nav-item mx-1" @else class="nav-item mx-1" @endif>
                        <a class="nav-link" href="/">
                            <i class="bi bi-card-list"></i>
                            <span>Books List</span></a>
                    </li>

                    <li class="nav-item mx-1">
                        <a class="nav-link" href="/logout">
                            <i class="bi bi-box-arrow-left"></i>
                            <span>Log Out</span></a>
                    </li>
                @endif

                <hr class="sidebar-divider d-none d-md-block">

                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
        @endif
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                @if (Auth::user())
                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                        <nav class="navbar mb-4 static-top shadow ">
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>
                            <div class="my-2">
                                <h3><b class="text-black">RENTAL BUKU</b></h3>
                            </div>
                        </nav>
                    @endif
                @else
                    <nav class="navbar mb-4 static-top shadow">
                        <div class="my-2">
                            <h3><b class="text-black">RENTAL BUKU</b></h3>
                        </div>
                        <div><a href="/login"><button type="button" class="btn btn-outline-primary">Login</button></a>
                        </div>
                    </nav>
                @endif

                <div class="container-fluid">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>

            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="py-2 bg-white mt-1 shadow">
                <div class="container">
                    <div class="copyright text-center">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


    {{-- <div class="main d-flex justify-content-between flex-column">
        <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Rental Buku</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar"
                    aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="sidebar">
                    @if (Auth::user())
                        @if (Auth::user()->role_id == 1)
                            <h2 class="text-center text-white">Welcome, {{ Auth::user()->username }}</h2>
                            <a href="/dashboard" @if (request()->route()->uri == 'dashboard') class='active' @endif>Dashboard</a>

                            <a href="/books" @if (request()->route()->uri == 'books' || request()->route()->uri == 'book-add' || request()->route()->uri == 'book-edit/{slug}' || request()->route()->uri == 'book-delete/{slug}' || request()->route()->uri == 'book-deleted') class='active' @endif>Books</a>

                            <a href="/" @if (request()->route()->uri == '/') class='active' @endif>Book List</a>

                            <a href="/category" @if (request()->route()->uri == 'category' || request()->route()->uri == 'category-add' || request()->route()->uri == 'category-edit/{slug}' || request()->route()->uri == 'category-delete/{slug}' || request()->route()->uri == 'category-deleted') class='active' @endif>Categories</a>

                            <a href="/users" @if (request()->route()->uri == 'users' || request()->route()->uri == 'registered-user' || request()->route()->uri == 'user-detail/{slug}' || request()->route()->uri == 'user-approve/{slug}' || request()->route()->uri == 'user-delete/{slug}' || request()->route()->uri == 'user-deleted') class='active' @endif>Users</a>

                            <a href="/book-rent" @if (request()->route()->uri == 'book-rent') class='active' @endif>Books
                                Rent</a>

                            <a href="/rent-log" @if (request()->route()->uri == 'rent-log') class='active' @endif>Rental
                                Logs</a>

                            <a href="/book-return" @if (request()->route()->uri == 'book-return') class='active' @endif>Book
                                Return</a>

                            <a href="/logout">Logout</a>
                        @else
                            <h2 class="text-center text-white">Welcome, {{ Auth::user()->username }}</h2>
                            <a href="/profile" @if (request()->route()->uri == 'profile') class='active' @endif>profile</a>
                            <a href="/" @if (request()->route()->uri == '/') class='active' @endif>Book List</a>
                            <a href="/logout">Logout</a>
                        @endif
                    @else
                        <a href="/login">Log in</a>
                    @endif
                </div>
                <div class="content col-lg-10 p-5">
                    @yield('content')
                </div>
            </div>
        </div>
    </div> --}}

    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "lengthMenu": [
                    [8],
                    [, "All"]
                ],
                lengthChange: false
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
