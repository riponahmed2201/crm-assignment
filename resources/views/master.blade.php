<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title') - University of South Asia</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('admin.includes.css')

</head>

<body>

    <!-- ======= Header ======= -->
    @include('admin.includes.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('admin.includes.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">@yield('page_title')</li>
                </ol>
            </nav>
        </div>

        @yield('content')

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    {{-- @include('admin.includes.footer') --}}
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('admin.includes.script')

    @include('vendor.lara-izitoast.toast')

</body>

</html>
