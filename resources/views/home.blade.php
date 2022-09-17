@include('layouts.header')

<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA -->
</head>

<body>
    @php

        $m = App\Models\Dosen_jadwal::all();
        $a = App\Models\Absensi::where('mahasiswa_id', 2)->get();

    @endphp

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        <div class="search-backdrop"></div>
                        <div class="search-result">
                            <div class="search-header">
                                Histories
                            </div>
                            <div class="search-item">
                                <a href="#">How to hack NASA using CSS</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">Kodinger.com</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">#Stisla</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-header">
                                Result
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30"
                                        src="{{ asset('style/img/products/product-3-50.png') }}" alt="product">
                                    oPhone S9 Limited Edition
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30"
                                        src="{{ asset('style/img/products/product-2-50.png') }}" alt="product">
                                    Drone X2 New Gen-7
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30"
                                        src="{{ asset('style/img/products/product-1-50.png') }}" alt="product">
                                    Headphone Blitz
                                </a>
                            </div>
                            <div class="search-header">
                                Projects
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-danger text-white mr-3">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    Stisla Admin Template
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-primary text-white mr-3">
                                        <i class="fas fa-laptop"></i>
                                    </div>
                                    Create a new Homepage Design
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    @php
                        $p = App\Models\Mahasiswa::where('user_id', Auth::user()->id)->first();
                    @endphp
                    {{-- @if ($p->keterangan != 0) --}}
                        {{-- {{$p}} --}}
                        {{-- <li class="dropdown dropdown-list-toggle beep"><a href="#" data-toggle="dropdown" --}}
                                {{-- class="nav-link nav-link-lg"><i class="far fa-envelope"></i></a> --}}
                            {{-- message-toggle beep --}}
                        {{-- @elseif ($p->keterangan == 0) --}}
                        {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                                class="nav-link nav-link-lg"><i class="far fa-envelope"></i></a> --}}
                        {{-- @else --}}
                        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                                class="nav-link nav-link-lg"><i class="far fa-envelope"></i></a>
                    {{-- @endif --}}

                    <div class="dropdown-menu dropdown-list dropdown-menu-right">
                        <div class="dropdown-header">Messages
                            <div class="float-right">
                                <a href="#">Mark All As Read</a>
                            </div>
                        </div>
                        <div class="dropdown-list-content dropdown-list-message">
                            <a href="#" class="dropdown-item dropdown-item-unread">
                                <div class="dropdown-item-avatar">
                                    <img alt="image" src="{{ asset('style/img/avatar/avatar-3.png') }}"
                                        class="rounded-circle">
                                    <div class="is-online"></div>
                                </div>
                                <div class="dropdown-item-desc">

                                    <b></b>
                                    {{-- <p>{{ $p->keterangan }}</p> --}}
                                    {{-- <div class="time">{{ Carbon\Carbon::parse($p->updated_at)->diffForHumans()}}</div> --}}
                                </div>
                            </a>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>

                        </div>

                    </div>
                    </li>

                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                            <img alt="image" src="{{ asset('style/img/avatar/' . Auth::user()->foto) }}"
                                class="">


                            {{-- rounded-circle mr-1 --}}
                            <div class="d-sm-none d-lg-inline-block">
                                {{ Auth::user()->email }}


                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <form class="" id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                                <button type="submit" class="dropdown-item has-icon text-danger"
                                    style="border:none;background:none">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="#">R O U F Perpust</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">St</a>
                    </div>
                    <ul class="sidebar-menu">
                        @if (Auth::user()->level == 'admin')
                         <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                                    <span>Admin Premis</span></a>
                                <ul class="">
                                    <li><a class="nav-link" href="/jadwal-dosen/">Dosen</a></li>
                                    <li><a class="nav-link" href="/mahasiswa-data/">Mahasiswa</a></li>

                                    <li><a class="nav-link beep beep-sidebar" href="/update-semester">Update Semester Mhs</a></li>
                                </ul>
                            </li>


                        @elseif (Auth::user()->level == 'dosen')
                            {{-- <li class="menu-header">Jadwal Dosen</li> --}}
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                                    <span>Learning</span></a>
                                <ul class="">
                                    <li><a class="nav-link" href="/jadwaldosen">KBM</a></li>
                                    <li><a class="nav-link" href="/kelas-all">Kelas</a>
                                    <li><a class="nav-link" href="/ujian-mhs">Ujian</a>
                                        <ul class="dropdown-menu">
                                            {{-- @php
                                                $k = App\Models\Pertemuan::with('jadwal', 'dosen')
                                                    ->where('user_id', Auth::user()->id)
                                                    ->first();

                                            @endphp
                                            @foreach ($k->jadwal as $item)
                                                <li><a class="nav-link" href="#">{{ $item->kelas }}</a></li>
                                            @endforeach --}}

                                        </ul>

                                    </li>

                                    {{-- <li><a class="nav-link beep beep-sidebar" href="#">Profile Dosen</a></li> --}}
                                    {{-- <li><a class="nav-link beep beep-sidebar" href="#tiga">-</a></li> --}}
                                </ul>
                            </li>
                            {{-- <li class="menu-header">KRS</li> --}}

                            <li class="menu-header">Penugasan</li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i
                                        class="fas fa-fire"></i><span>Dashboard</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="#">Mahasiswa Tugas</a></li>
                                    <li><a class="nav-link" href="#">-</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                                    <span>Mahasiswa</span></a>
                                <ul class="">




                                    <li><a class="nav-link" href="/profil-mahasiswa">Profil Mahasiswa</a></li>
                                    <li><a class="nav-link" href="/jadwal">Jadwal </a></li>

                                    <li><a class="nav-link-sidebar" href="/ujian">Ujian On</a></li>
                                    <li><a class="nav-link-sidebar" href="/e-ujian">Hasil Ujian</a></li>
                                    {{-- <li><a class="nav-link beep beep-sidebar" href="#tiga">-</a></li> --}}
                                </ul>
                            </li>
                            {{-- <li class="menu-header">KRS</li> --}}
                        @endif

                        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                            <a href="https://getstisla.com/docs"
                                class="btn btn-primary btn-lg btn-block btn-icon-split">
                                <i class="fas fa-rocket"></i> MY UCIC
                            </a>
                        </div>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Halaman @yield('title')</h1>
                    </div>

                    @yield('content')

                    <div class="section-body">
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="#">Rouf Majid</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    @include('layouts.bawah')
