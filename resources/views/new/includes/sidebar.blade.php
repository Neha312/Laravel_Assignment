<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

                <img src="{{ asset('storage/images/default_profile.png') }}" class="img-circle img-thumbnail"
                    width="40">

            </div>
            <div class="info">
                <a href="#" class="d-block">Abc</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="far fa-list-alt nav-icon"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="" class="nav-link ">
                        <i class="fa fa-circle nav-icon"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>

                <li class="nav-header">EXAMPLES</li>

                <li class="nav-item">
                    <a href="" class="nav-link  ">
                        <i class="fa fa-shopping-cart nav-icon"></i>
                        <p>
                            Orders
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
