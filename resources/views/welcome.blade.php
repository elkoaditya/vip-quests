<!DOCTYPE html>
@php
    $footer = \Illuminate\Support\Facades\Config::get('layout.footer');
    $app = \Illuminate\Support\Facades\Config::get('layout.app');
@endphp
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{asset('material')}}/"
    data-template="horizontal-menu-template-no-customizer-starter">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Page 1 - Starter Kit | Materialize - Material Design HTML Admin Template</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('material')}}/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('material')}}/vendor/fonts/materialdesignicons.css" />

    <link rel="stylesheet" href="{{asset('material')}}/vendor/fonts/fontawesome.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('material')}}/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="{{asset('material')}}/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="{{asset('material')}}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('material')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{asset('material')}}/vendor/libs/node-waves/node-waves.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('material')}}/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('material')}}/js/config.js"></script>
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
    <div class="layout-container">
        <!-- Navbar -->

        <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
            <div class="container-xxl">
                <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
                    <a href="{{url()->current()}}" class="app-brand-link gap-2">
                        {{$app['logo']}}
                        <span class="app-brand-text demo menu-text fw-bold">{{$app['name']}}</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
                        <i class="mdi mdi-close align-middle"></i>
                    </a>
                </div>

                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="mdi mdi-menu mdi-24px"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <div class="navbar-nav align-items-center">
                        <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                            <i class="mdi mdi-24px"></i>
                        </a>
                    </div>

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <x-layout.profilenav />
                    </ul>
                </div>
            </div>
        </nav>

        <!-- / Navbar -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Content wra    pper -->
            <div class="content-wrapper">
                <x-layout.headernav />

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4">Page 1</h4>
                    <p>
                        Sample page.<br />For more layout options, refer
                        <a
                            href="https://demos.pixinvent.com/materialize-html-admin-template/documentation//layouts.html"
                            target="_blank"
                            class="fw-bold"
                        >Layout docs</a
                        >.
                    </p>
                </div>
                <!--/ Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl">
                        <div
                            class="footer-container d-flex align-items-center justify-content-between py-3 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                {{$footer['year']}}
                                , made with <span class="text-danger">❤️</span> by
                                <a href="{{$footer['url']}}" target="_blank" class="footer-link fw-medium">{{$footer['text']}}</a>
                            </div>
                            <div>
                                <a
                                    href="{{$footer['url']}}"
                                    target="_blank"
                                    class="footer-link me-4"
                                >Documentation</a
                                >
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!--/ Content wrapper -->
        </div>

        <!--/ Layout container -->
    </div>
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>

<!--/ Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset('material')}}/vendor/libs/jquery/jquery.js"></script>
<script src="{{asset('material')}}/vendor/libs/popper/popper.js"></script>
<script src="{{asset('material')}}/vendor/js/bootstrap.js"></script>
<script src="{{asset('material')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{asset('material')}}/vendor/libs/node-waves/node-waves.js"></script>

<script src="{{asset('material')}}/vendor/libs/hammer/hammer.js"></script>

<script src="{{asset('material')}}/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="{{asset('material')}}/js/main.js"></script>

<!-- Page JS -->
</body>
</html>
