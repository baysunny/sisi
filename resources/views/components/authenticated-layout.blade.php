<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>X Home</title>
    <link rel="icon" type="image/png" href="/img/indihome-icon.png" sizes="34x32">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebars.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/2ce9937e4b.js" crossorigin="anonymous"></script>
</head>
<body>

    @php
        $user = auth()->user();
    @endphp

    <nav class="navbar navbar-private sticky-top flex-md-nowrap p-0 shadow">
        <a class="navbar-brand navbar-brand-private col-md-3 col-lg-2 px-3 text-center" href="/dashboard">{{$user->email}}</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav d-none d-md-block">
            <div class="nav-item text-nowrap">
                <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} px-3"><i class="fas fa-home"></i></a>
            </div>
        </div>
        @if($user->id_jenis_user == 1)
        <div class="navbar-nav d-none d-md-block">
            <div class="nav-item text-nowrap">
                <a href="/dashboard/menu-levels" class="nav-link {{ Request::is('dashboard/menu-levels') ? 'active' : '' }} px-3"><i class="fas fa-ellipsis-v"></i> Menu Level</a>
            </div>
        </div>
        <div class="navbar-nav d-none d-md-block">
            <div class="nav-item text-nowrap">
                <a href="/dashboard/menus" class="nav-link  {{ Request::is('dashboard/menus') ? 'active' : '' }} px-3"><i class="fas fa-file-text"></i> Menu</a>
            </div>
        </div>
        @endif
        <div class="navbar-nav d-none ms-auto d-md-block">
            <div class="nav-item text-nowrap">
                <form class="" method="POST" action="/logout">
                        @csrf
                    <button type="submit" class="btn btn-link nav-link px-3 text-dark"><i class="fas fa-sign-out-alt"></i> Sign out</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">

                    <div class="mb-3">
                        <img src="{{ $user->latestFoto ? asset('storage/'.$user->latestFoto->foto) : asset('user-fotos/default-user-foto.png')}}" class="img-thumbnail rounded-circle d-block mx-auto s-image-preview">
                    </div>

                    @if($user->id_jenis_user == 1)
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 d-block d-md-none">
                        <span>Setting</span>
                    </h6>
                    <ul class="nav flex-column mb-2 d-block d-md-none">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/menu-levels">
                                <i class="fas fa-file feather"></i> <span>Menu Level</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/menus" class="nav-link">
                                <i class="fas fa-file-text feather"></i> <span>Menu</span>
                            </a>
                        </li>
                    </ul>
                    @endif
                    @if(count($sharedMenus) != 0)
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1">
                        <span>Menu</span>
                    </h6>
                    <ul class="nav flex-column">
                        @foreach($sharedMenus as $menu)
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard/menus/' . $menu->menu_id) ? 'active' : '' }}" href="/dashboard/menus/{{ $menu->menu_id }}">
                                <img src="{{$menu->menu_icon ? asset('storage/'.$menu->menu_icon) : asset('icons/default-icon.png')}}" class="s-icon" alt="...">
                                <span class="feather">{{ $menu->menu_name }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1">
                        <span>Account</span>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard/users/'.$user->id_user.'/edit') ? 'active' : '' }}" href="/dashboard/users/{{$user->id_user}}/edit">
                                <i class="fas fa-cog feather"></i> <span class="feather">Setting</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <form class="" method="POST" action="/logout">
                                    @csrf
                                <button type="submit" class="btn btn-link nav-link"><i class="fas fa-sign-out-alt feather"></i>  <span class="feather">Sign out</span></button>
                            </form>
                            
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                {{$slot}}
            </main>
        </div>
    </div>
    <x-notification/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script>
        const defaultIcon = "{{ asset('icons/default-icon.png') }}";
        const defaultFoto = "{{ asset('user-fotos/default-user-foto.png') }}";
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    
</body>
</html>
