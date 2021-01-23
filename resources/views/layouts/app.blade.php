<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{asset('img/practice-2.svg')}}">



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    @yield('css')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand font-weight-bold text-primary" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                    @if(!Auth::guest())
                        @if(Auth::user()->role == "teacher")
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" href="{{ route('teacher.task.index') }}">
                                    <ion-icon name="folder-open-outline" class="mr-2" style="font-size: 18px;"></ion-icon>
                                    {{ __('Penugasan') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" href="{{ route('teacher.practice.index') }}">
                                    <ion-icon name="git-network-outline" class="mr-2" style="font-size: 18px;"></ion-icon>
                                    {{ __('Wahana Praktik') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex aign-items-center" href="{{ route('teacher.agency.index') }}">
                                    <ion-icon name="navigate-outline" class="mr-2" style="font-size: 18px;"></ion-icon>
                                    {{ __('Tempat Praktik') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" href="{{ route('teacher.skill.index') }}">
                                    <ion-icon name="flask-outline" class="mr-2" style="font-size: 18px;"></ion-icon>
                                    {{ __('Kompetensi') }}
                                </a>
                            </li>
                        @elseif(Auth::user()->role == "student")
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('student.task.index') }}">{{ __('Tugas') }}</a>
                            </li>

                        @elseif(Auth::user()->role == "admin")
                            <li class="nav-item">
                                <a class="nav-link d-flex aign-items-center" href="{{ route('admin.teacher.index') }}">
                                    <ion-icon name="person-outline" class="mr-2" style="font-size: 18px;"></ion-icon>
                                    {{ __('Guru') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex aign-items-center" href="{{ route('admin.classroom.index') }}">
                                    <ion-icon name="layers-outline" class="mr-2" style="font-size: 18px;"></ion-icon>
                                    {{ __('Kelas') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex aign-items-center" href="{{ route('admin.course.index') }}">
                                    <ion-icon name="book-outline" class="mr-2" style="font-size: 18px;"></ion-icon>
                                    {{ __('Mata Kuliah') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex aign-items-center" href="{{ route('admin.agency.index') }}">
                                    <ion-icon name="navigate-outline" class="mr-2" style="font-size: 18px;"></ion-icon>
                                    {{ __('Tempat Praktik') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" href="{{ route('admin.skill.index') }}">
                                    <ion-icon name="flask-outline" class="mr-2" style="font-size: 18px;"></ion-icon>
                                    {{ __('Kompetensi') }}
                                </a>
                            </li>
                        @endif
                    @endif

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="{{ route('login') }}">
                                <ion-icon name="log-in-outline" class="mr-2" style="font-size: 18px;"></ion-icon>
                                {{ __('Login') }}
                            </a>
                        </li>
                    @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link d-flex align-items-center dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <ion-icon name="person-circle-outline" class="mr-2" style="font-size: 18px;"></ion-icon>

                            @if(Auth::user()->role == 'admin')
                                    {{ Auth::user()->username }}
                                @elseif(Auth::user()->role == 'teacher')
                                    {{ Auth::user()->teacher->name }}
                                @elseif(Auth::user()->role == 'student')
                                    {{ Auth::user()->student->name }}
                                @endif
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <ion-icon name="log-out-outline" class="mr-2" style="font-size: 18px;"></ion-icon>

                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4" style="min-height: 100vh;">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container text-center text-muted">
            Copyright &copy; {{date('Y')}}, <a href="http://irfanmaulana.com" class="font-weight-bold text-primary">Ahmad Irfan Maulana</a>.
        </div>
    </footer>
</div>

@include('sweetalert::alert')
<script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()

        $('.ajax').click(function (e) {
            e.preventDefault();

            let token = $('meta[name="csrf-token"]').attr('content');
            let text = $(this).data('text');

            Swal.fire({
                "title": "Konfirmasi",
                "text": text ? text : "Apakah kamu yakin ?",
                "width":"32rem",
                "heightAuto":true,
                "padding":"1.25rem",
                "showConfirmButton":true,
                "showCloseButton":false,
                "customClass":{
                    "container":null,
                    "popup":null,
                    "header":null,
                    "title":null,
                    "closeButton":null,
                    "icon":null,
                    "image":null,
                    "content":null,
                    "input":null,
                    "actions":null,
                    "confirmButton":"btn btn-primary",
                    "cancelButton":null,"footer":null
                },
                "icon":"question",
                "showCancelButton":true,
                "cancelButtonText":"Batalkan",
                "cancelButtonColor":"#aaa",
                "confirmButtonText":"Konfirmasi",
                "confirmButtonColor":"#2B7D75",
                "allowOutsideClick":false
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: $(this).data('url'),
                        method: 'POST',
                        data: {_token: token },
                        success: function (response) {
                            Swal.fire({
                                title: 'Berhasil',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'Tutup',
                                confirmButtonColor: '#2B7D75',
                            })

                            if (response.redirect)
                                window.location = response.redirect;
                        },
                        error: function () {
                            Swal.fire({
                                title: 'Gagal',
                                text: 'Data tidak bisa diproses. Silahkan coba kembali.',
                                icon: 'error',
                                confirmButtonText: 'Coba Kembali',
                                confirmButtonColor: '#2B7D75',
                            })
                        }
                    })


                }
            });

        });

        $('#exampleModal').on('show.bs.modal', function() {
            setTimeout(() => {
                if ($('#exampleModal .autofocus').length > 0) {
                    $('#exampleModal .autofocus')[0].focus();
                }
            }, 500);
        })

    })
</script>

@yield('js')
</body>
</html>
