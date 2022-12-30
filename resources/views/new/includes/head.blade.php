<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ url('frontend/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60"
        width="60">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                @if (isset(Auth()->user()->profile) && file_exists(public_path() . '/storage/images/' . Auth()->user()->profile))
                    <img src="{{ asset('storage/images/' . Auth()->user()->profile) }}" class="img-circle img-thumbnail"
                        width="40">
                @else
                    <img src="{{ asset('storage/images/default_profile.png') }}" class="img-circle img-thumbnail"
                        width="40">
                @endif
                @php
                    $user_name = Auth()->user() ? Auth()->user()->name : 'Gest';
                @endphp
                <span class="hidden-xs"> {!! $user_name !!}</span>
            </a>
            <ul class="dropdown-menu">

                <li class="user-header">
                    @if (isset(Auth()->user()->profile) && file_exists(public_path() . '/storage/images/' . Auth()->user()->profile))
                        <img src="{{ asset('storage/images/' . Auth()->user()->profile) }}"
                            class="img-circle img-thumbnail" width="100">
                    @else
                        <img src="{{ asset('storage/images/default_profile.png') }}" class="img-circle img-thumbnail"
                            width="100">
                    @endif
                    <p>
                        {!! $user_name !!}
                    </p>
                    <div class="pull-right">
                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                        <a href="{{ route('change.password.get') }}" class="btn btn-default btn-flat">Change
                            Password</a>
                    </div>
                </li>
                <li class="user-footer">
                </li>
            </ul>
        </li>
    </ul>

</nav>
<!-- /.navbar -->
