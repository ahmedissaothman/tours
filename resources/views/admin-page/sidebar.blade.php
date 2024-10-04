<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <!-- Add more links here -->

            <!-- Manage Packages -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePackages" aria-expanded="false" aria-controls="collapsePackages">
                <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                Manage Packages
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePackages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    {{-- <a class="nav-link" href="{{ route('add-package') }}"><i class="fas fa-plus-circle"></i> Add New Package</a> --}}
                    <a class="nav-link" href="{{ route('admin.view-package') }}"><i class="fas fa-list"></i> View All Packages</a>
                </nav>
            </div>

            <!-- Manage Orders -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOrders" aria-expanded="false" aria-controls="collapseOrders">
                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                Manage Orders
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseOrders" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('admin.view-order') }}"><i class="fas fa-list-alt"></i> View All Orders</a>
                </nav>
            </div>

            <!-- Recommended Packages -->
            
            <a class="nav-link" href="{{ route('admin.view-recommended-package') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                Recommended Packages
            </a>

            <!-- Logout -->
            <a class="nav-link" href="logout.html">
                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                Logout
            </a>

        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Admin
    </div>
</nav>