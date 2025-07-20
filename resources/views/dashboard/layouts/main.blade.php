<!doctype html>
<html lang="en">

<head>
    @include('dashboard.layouts.head')
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('dashboard.layouts.sidebar')
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('dashboard.layouts.navbar')
            <!--  Header End -->
            <div class="container-fluid">
                <!--  Breadcrumb Start -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-light rounded-3 p-3 shadow-sm">
                            <li class="breadcrumb-item"><a href="/dashboard"
                                    class="text-decoration-none text-primary"><i class="fas fa-home"></i> Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active text-muted" aria-current="page"></li>
                        </ol>
                    </nav>
                <!--  Breadcrumb End -->

                <!--  Row 1 -->
                @yield('content')
            </div>
        </div>
    </div>
    @include('dashboard.layouts.script')

    @yield('script')
</body>

</html>
