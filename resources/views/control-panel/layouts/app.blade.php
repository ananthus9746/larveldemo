<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta
            name="keywords"
            content="pos"
            />
        <meta
            name="description"
            content="Powerful Control Panel of your website"
            />
        <meta name="robots" content="noindex,nofollow" />
        <title>@yield('title', 'Dashboard') | {{ env('APP_NAME') }}</title>
        <link
            rel="canonical"
            href="{{ url('/') }}"
            />
        <!-- Favicon icon -->
        <link
            rel="icon"
            type="ico"
            sizes="16x16"
            href="{{ url('assets/images/favicon.ico') }}"
            />
        <!-- Font Awesome -->
        <link href="{{ url('assets/plugins/calculator/css/calculator.css') }}" rel="stylesheet">
        <!-- Calculator -->
        <link href="{{ url('assets/plugins/fontawesome/css/all.min.css') }}" rel="stylesheet">
        <!-- NProgress Bar -->
        <link href="{{ url('assets/plugins/nprogress/css/nprogress.css') }}" rel="stylesheet">
        <!-- Sweet Alert 2 -->
        <link href="{{ url('assets/plugins/sweetalert2/css/sweetalert2.min.css') }}" rel="stylesheet">
        <!-- jquery zoiaTable -->
        <link href="{{ url('assets/plugins/jquery-zoiaTable/css/zoiaTable.css') }}" rel="stylesheet">
        <!-- Pagination -->
        <link href="{{ url('assets/plugins/simplePagination/css/simplePagination.css') }}" rel="stylesheet">
        <!-- Select 2 -->
        <link href="{{ url('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ url('assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet">
        <!-- Admin Panel Layout -->
        <link href="{{ url('assets/css/control-panel/layout.min.css') }}" rel="stylesheet">
        <!-- Datetimepicker -->
        <link href="{{ url('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{ url('assets/css/control-panel/style.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/control-panel/responsive.css') }}" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!--This page CSS -->
        <script>
            const comma_separator = "subcontinent";
        </script>
        @yield('head')
    </head>
    <body>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            {{-- <svg
                class="tea lds-ripple"
                width="37"
                height="48"
                viewbox="0 0 37 48"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                >
                <path
                    d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z"
                    stroke="#1e88e5"
                    stroke-width="2"
                    ></path>
                <path
                    d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34"
                    stroke="#1e88e5"
                    stroke-width="2"
                    ></path>
                <path
                    id="teabag"
                    fill="#1e88e5"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z"
                    ></path>
                <path
                    id="steamL"
                    d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke="#1e88e5"
                    ></path>
                <path
                    id="steamR"
                    d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13"
                    stroke="#1e88e5"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    ></path>
            </svg> --}}
            <div class="icon"></div>
        </div>

        <div class="loading-progress-bar">
            <div class="bar">

            </div>
        </div>

        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                    <div class="navbar-header">
                        <!-- This is for the sidebar toggle which is visible on mobile only -->
                        <a
                            class="nav-toggler waves-effect waves-light d-block d-md-none"
                            href="javascript:void(0)"
                            ><i class="ti-menu ti-close"></i
                            ></a>
                        <!-- ============================================================== -->
                        <!-- Logo -->
                        <!-- ============================================================== -->
                        <a class="navbar-brand" href="{{ url("/control-panel") }}" style="min-height: 70px;">
                            <!-- Logo icon -->
                            <span class="logo-icon">
                                <h2 class="text-white mb-0">CP</h2>
                            </span>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <h2 class="text-white mb-0">Control Panel</h2>
                            </span>
                        </a>
                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Toggle which is visible on mobile only -->
                        <!-- ============================================================== -->
                        <a
                            class="topbartoggler d-block d-md-none waves-effect waves-light"
                            href="javascript:void(0)"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                            ><i class="ti-more"></i
                            ></a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse collapse" id="navbarSupportedContent">
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav me-auto">
                            <!-- This is  -->
                            <li class="nav-item">
                                <a
                                    class="
                                    nav-link
                                    sidebartoggler
                                    d-none d-md-block
                                    waves-effect waves-dark
                                    "
                                    href="javascript:void(0)"
                                    ><i class="ti-menu"></i
                                    ></a>
                            </li>
                            <!-- ============================================================== -->
                            <!-- Home Icon -->
                            <!-- ============================================================== -->
                            <li class="nav-item">
                                <a class="nav-link d-none d-md-block waves-effect waves-dark" href="{{ url('/') }}"><i class="ti-home"></i>
                                </a>
                            </li>
                            <!-- ============================================================== -->
                            <!-- Mega Menu -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown mega-dropdown">
                                {{-- <a
                                    class="nav-link dropdown-toggle waves-effect waves-dark"
                                    href="#"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    >
                                    <img src="{{ url('assets/icon/youtube.svg') }}" alt="Youtube" width="25px">
                                </a>
                                <div class="dropdown-menu dropdown-menu-animate-up">
                                    <ul class="mega-dropdown-menu row">
                                        <li class="col-lg-3 list-style-none col-xlg-2 mb-4">
                                            <h4 class="mb-3">XZY</h4>
                                            <ul class="list-style-none">
                                                <li>
                                                    <a href="javascript:void(0)">
                                                Quick Tour</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                    ABC</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                    MNO</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                PQR</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                EFG</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="col-lg-3 list-style-none mb-4">
                                            <h4 class="mb-3">XZY</h4>
                                            <ul class="list-style-none">
                                                <li>
                                                    <a href="javascript:void(0)">
                                                XYZ</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                    ABC</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                    MNO</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                PQR</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                EFG</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="col-lg-3 list-style-none mb-4">
                                            <h4 class="mb-3">XZY</h4>
                                            <ul class="list-style-none">
                                                <li>
                                                    <a href="javascript:void(0)">
                                                XYZ</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                    ABC</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                    ABC</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                PQR</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                    EFG</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="col-lg-3 list-style-none col-xlg-4 mb-4">
                                            <h4 class="mb-3">XZY</h4>
                                            <ul class="list-style-none">
                                                <li>
                                                    <a href="javascript:void(0)">
                                                XYZ</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                    ABC</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                    ABC</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                PQR</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                    EFG</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div> --}}
                            </li>
                            <!-- ============================================================== -->
                            <!-- End Mega Menu -->
                            <!-- ============================================================== -->
                        </ul>
                        <!-- ============================================================== -->
                        <!-- Right side toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav">
                            <!-- ============================================================== -->
                            <!-- Calculator -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle waves-effect waves-dark"
                                    href="#"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    >
                                    <img src="{{ url('assets/icon/calculator.svg') }}" alt="Calculator" width="25px">
                                </a>
                                <div
                                    class="
                                    dropdown-menu dropdown-menu-end
                                    calculator-dropdown 
                                    mailbox
                                    animated
                                    flipInY
                                    keep-inside-clicks-open
                                    "
                                    >
                                    <div class="calculator-container p-3">
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                        <form>
                                            <input readonly id="display1" type="text" class="form-control-lg text-right">
                                            <input readonly id="display2" type="text" class="form-control-lg text-right">
                                        </form>
                                        
                                        <div class="d-flex justify-content-between button-row">
                                            <button id="left-parenthesis" type="button" class="operator-group">&#40;</button>
                                            <button id="right-parenthesis" type="button" class="operator-group">&#41;</button>
                                            <button id="square-root" type="button" class="operator-group">&#8730;</button>
                                            <button id="square" type="button" class="operator-group">&#120;&#178;</button>
                                        </div>
                                                                
                                        <div class="d-flex justify-content-between button-row">
                                            <button id="clear" type="button">&#67;</button>
                                            <button id="backspace" type="button">&#9003;</button>
                                            <button id="ans" type="button" class="operand-group">&#65;&#110;&#115;</button>
                                            <button id="divide" type="button" class="operator-group">&#247;</button>
                                        </div>
                                        
                                        
                                        <div class="d-flex justify-content-between button-row">
                                            <button id="seven" type="button" class="operand-group">&#55;</button>
                                            <button id="eight" type="button" class="operand-group">&#56;</button>
                                            <button id="nine" type="button" class="operand-group">&#57;</button>
                                            <button id="multiply" type="button" class="operator-group">&#215;</button>
                                        </div>
                                                                
                                        
                                        <div class="d-flex justify-content-between button-row">
                                            <button id="four" type="button" class="operand-group">&#52;</button>
                                            <button id="five" type="button" class="operand-group">&#53;</button> 
                                            <button id="six" type="button" class="operand-group">&#54;</button> 
                                            <button id="subtract" type="button" class="operator-group">&#8722;</button>
                                        </div>
                                                            
                                        
                                        <div class="d-flex justify-content-between button-row">
                                            <button id="one" type="button" class="operand-group">&#49;</button> 
                                            <button id="two" type="button" class="operand-group">&#50;</button>
                                            <button id="three" type="button" class="operand-group">&#51;</button>
                                            <button id="add" type="button" class="operator-group">&#43;</button>
                                        </div>
                                        
                                        <div class="d-flex justify-content-between button-row">
                                            <button id="percentage" type="button" class="operand-group">&#37;</button>
                                            <button id="zero" type="button" class="operand-group">&#48;</button>
                                            <button id="decimal" type="button" class="operand-group">&#46;</button>
                                            <button id="equal" type="button">&#61;</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- ============================================================== -->
                            <!-- End Calculator -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Profile -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle waves-effect waves-dark"
                                    href="#"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    >
                                <img
                                    src="{{ url('assets/img/users/'. (auth('admin')->user()->profile_image ?? 'default-user.png')) }}"
                                    alt="user"
                                    width="30"
                                    height="30"
                                    class="profile-pic rounded-circle bg-white"
                                    />
                                </a>
                                <div
                                    class="
                                    dropdown-menu dropdown-menu-end
                                    user-dd
                                    animated
                                    flipInY
                                    "
                                    >
                                    <div
                                        class="
                                        d-flex
                                        no-block
                                        align-items-center
                                        p-3
                                        bg-info
                                        text-white
                                        mb-2
                                        "
                                        >
                                        <div class="">
                                            <img
                                                src="{{ url('assets/img/users/'. (auth('admin')->user()->profile_image ?? 'default-user.png')) }}"
                                                alt="user"
                                                class="rounded-circle bg-white"
                                                width="60"
                                                height="60"
                                                />
                                        </div>
                                        <div class="ms-2">
                                            <h4 class="mb-0 text-white">{{ auth('admin')->user()->first_name . ' ' . auth('admin')->user()->last_name }}</h4>
                                            <p class="mb-0">{{ auth('admin')->user()->email }}</p>
                                        </div>
                                    </div>
                                    <a class="dropdown-item" href="<?= url('control-panel/profile') ?>">
                                        <i
                                        data-feather="user"
                                        class="feather-sm text-info me-1 ms-1"
                                        ></i>
                                        My Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= url('control-panel/change-password') ?>">
                                        <i
                                        data-feather="settings"
                                        class="feather-sm text-warning me-1 ms-1"
                                        ></i>
                                        Change Password
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= url('control-panel/logout') ?>">
                                        <i
                                        data-feather="log-out"
                                        class="feather-sm text-danger me-1 ms-1"
                                        ></i>
                                        Logout
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <div class="pl-4 p-2">
                                        <a href="<?= url('control-panel/profile') ?>" class="btn d-block w-100 btn-info rounded-pill">View Profile</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                            
                        <ul id="sidebarnav">
                                    
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="<?= url('control-panel') ?>">
                                    <i class="nav-icon fas fa-fw fa-tachometer-alt"></i>
                                <span class="hide-menu"> Dashboard</span>
                                </a>
                            </li>
                                    
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow" href="#">
                                    {{-- <i class="nav-icon fas fa-pager"></i> --}}
                                    <i class="nav-icon fas fa-money-check"></i>
                                    <span class="hide-menu">Products</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="<?= url('control-panel/products') ?>">
                                            <span class="hide-menu">Create Products</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="<?= url('control-panel/categories') ?>">
                                            <span class="hide-menu">Create Types</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="<?= url('control-panel/pages') ?>">
                                            <span class="hide-menu">Create Pages</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="<?= url('control-panel/sub-categories') ?>">
                                            <span class="hide-menu">Create Brands</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="<?= url('control-panel/finishes') ?>">
                                            <span class="hide-menu">Create Finishes</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="<?= url('control-panel/colors') ?>">
                                            <span class="hide-menu">Create Colors</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="<?= url('control-panel/sizes') ?>">
                                            <span class="hide-menu">Create Sizes</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </aside>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-12 align-self-center">
                        <h3 class="text-themecolor mb-0">@yield('title', 'Not added')</h3>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0)">Home</a>
                            </li>
                            <li class="breadcrumb-item active">@yield('title', 'Not added')</li>
                        </ol>
                    </div>
                    <div class="col-md-7 col-12 align-self-center d-none d-md-block">
                        
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Content  -->
                <!-- ============================================================== -->
                <div class="content">
                    @yield('content')
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <footer class="footer text-center">
                    <strong style="color: black;"><span class="d-block d-sm-block d-md-inline">Copyright © <?= date('Y') ?> All rights reserved.</span> <span class="d-block d-sm-block d-md-inline">Control Panel Powered by <a href="https://albaritechnologies.com" target="_blank">Al-Bari Technologies</a></span></strong>  <strong>(+92) 03034466999</strong>
                    (<b>Version</b> 1.1.9)
                </footer>
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- customizer Panel -->
        <!-- ============================================================== -->
        <aside class="customizer">
            <a href="javascript:void(0)" class="service-panel-toggle"
                ><i class="fa fa-spin fa-cog"></i
                ></a>
            <div class="customizer-body">
                <ul class="nav customizer-tab" role="tablist">
                    <li class="nav-item">
                        <a
                            class="nav-link active"
                            id="pills-home-tab"
                            data-bs-toggle="pill"
                            href="#pills-home"
                            role="tab"
                            aria-controls="pills-home"
                            aria-selected="true"
                            ><i class="mdi mdi-wrench fs-6"></i
                            ></a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <!-- Tab 1 -->
                    <div
                        class="tab-pane fade show active"
                        id="pills-home"
                        role="tabpanel"
                        aria-labelledby="pills-home-tab"
                        >
                        <div class="p-3 border-bottom">
                            <!-- Sidebar -->
                            <h5 class="font-weight-medium mb-2 mt-2">Layout Settings</h5>
                            <div class="form-check mt-3">
                                <input
                                    type="checkbox"
                                    name="theme-view"
                                    class="form-check-input"
                                    id="theme-view"
                                    />
                                <label class="form-check-label" for="theme-view">
                                <span>Dark Theme</span>
                                </label>
                            </div>
                            <div class="form-check mt-2">
                                <input
                                    type="checkbox"
                                    class="sidebartoggler form-check-input"
                                    name="collapssidebar"
                                    id="collapssidebar"
                                    />
                                <label class="form-check-label" for="collapssidebar">
                                <span>Collapse Sidebar</span>
                                </label>
                            </div>
                            <div class="form-check mt-2">
                                <input
                                    type="checkbox"
                                    name="sidebar-position"
                                    class="form-check-input"
                                    id="sidebar-position"
                                    />
                                <label class="form-check-label" for="sidebar-position">
                                <span>Fixed Sidebar</span>
                                </label>
                            </div>
                            <div class="form-check mt-2">
                                <input
                                    type="checkbox"
                                    name="header-position"
                                    class="form-check-input"
                                    id="header-position"
                                    />
                                <label class="form-check-label" for="header-position">
                                <span>Fixed Header</span>
                                </label>
                            </div>
                            <div class="form-check mt-2">
                                <input
                                    type="checkbox"
                                    name="boxed-layout"
                                    class="form-check-input"
                                    id="boxed-layout"
                                    />
                                <label class="form-check-label" for="boxed-layout">
                                <span>Boxed Layout</span>
                                </label>
                            </div>
                        </div>
                        <div class="p-3 border-bottom">
                            <!-- Logo BG -->
                            <h5 class="font-weight-medium mb-2 mt-2">Logo Backgrounds</h5>
                            <ul class="theme-color m-0 p-0">
                                <li class="theme-item list-inline-item me-1">
                                    <a
                                        href="javascript:void(0)"
                                        class="theme-link rounded-circle d-block"
                                        data-logobg="skin1"
                                        ></a>
                                </li>
                                <li class="theme-item list-inline-item me-1">
                                    <a
                                        href="javascript:void(0)"
                                        class="theme-link rounded-circle d-block"
                                        data-logobg="skin2"
                                        ></a>
                                </li>
                                <li class="theme-item list-inline-item me-1">
                                    <a
                                        href="javascript:void(0)"
                                        class="theme-link rounded-circle d-block"
                                        data-logobg="skin3"
                                        ></a>
                                </li>
                                <li class="theme-item list-inline-item me-1">
                                    <a
                                        href="javascript:void(0)"
                                        class="theme-link rounded-circle d-block"
                                        data-logobg="skin4"
                                        ></a>
                                </li>
                                <li class="theme-item list-inline-item me-1">
                                    <a
                                        href="javascript:void(0)"
                                        class="theme-link rounded-circle d-block"
                                        data-logobg="skin5"
                                        ></a>
                                </li>
                                <li class="theme-item list-inline-item me-1">
                                    <a
                                        href="javascript:void(0)"
                                        class="theme-link rounded-circle d-block"
                                        data-logobg="skin6"
                                        ></a>
                                </li>
                            </ul>
                            <!-- Logo BG -->
                        </div>
                        <div class="p-3 border-bottom">
                            <!-- Navbar BG -->
                            <h5 class="font-weight-medium mb-2 mt-2">Navbar Backgrounds</h5>
                            <ul class="theme-color m-0 p-0">
                                <li class="theme-item list-inline-item me-1">
                                    <a
                                        href="javascript:void(0)"
                                        class="theme-link rounded-circle d-block"
                                        data-navbarbg="skin1"
                                        ></a>
                                </li>
                                <li class="theme-item list-inline-item me-1">
                                    <a
                                        href="javascript:void(0)"
                                        class="theme-link rounded-circle d-block"
                                        data-navbarbg="skin2"
                                        ></a>
                                </li>
                                <li class="theme-item list-inline-item me-1">
                                    <a
                                        href="javascript:void(0)"
                                        class="theme-link rounded-circle d-block"
                                        data-navbarbg="skin3"
                                        ></a>
                                </li>
                                <li class="theme-item list-inline-item me-1">
                                    <a
                                        href="javascript:void(0)"
                                        class="theme-link rounded-circle d-block"
                                        data-navbarbg="skin4"
                                        ></a>
                                </li>
                                <li class="theme-item list-inline-item me-1">
                                    <a
                                        href="javascript:void(0)"
                                        class="theme-link rounded-circle d-block"
                                        data-navbarbg="skin5"
                                        ></a>
                                </li>
                                <li class="theme-item list-inline-item me-1">
                                    <a
                                        href="javascript:void(0)"
                                        class="theme-link rounded-circle d-block"
                                        data-navbarbg="skin6"
                                        ></a>
                                </li>
                            </ul>
                            <!-- Navbar BG -->
                        </div>
                        <div class="p-3 border-bottom">
                            <!-- Logo BG -->
                            <h5 class="font-weight-medium mb-2 mt-2">Sidebar Backgrounds</h5>
                            <ul class="theme-color m-0 p-0">
                                <li class="theme-item list-inline-item me-1">
                                    <a
                                        href="javascript:void(0)"
                                        class="theme-link rounded-circle d-block"
                                        data-sidebarbg="skin1"
                                        ></a>
                                </li>
                                <li class="theme-item list-inline-item me-1">
                                    <a
                                        href="javascript:void(0)"
                                        class="theme-link rounded-circle d-block"
                                        data-sidebarbg="skin2"
                                        ></a>
                                </li>
                                <li class="theme-item list-inline-item me-1">
                                    <a
                                        href="javascript:void(0)"
                                        class="theme-link rounded-circle d-block"
                                        data-sidebarbg="skin3"
                                        ></a>
                                </li>
                                <li class="theme-item list-inline-item me-1">
                                    <a
                                        href="javascript:void(0)"
                                        class="theme-link rounded-circle d-block"
                                        data-sidebarbg="skin4"
                                        ></a>
                                </li>
                                <li class="theme-item list-inline-item me-1">
                                    <a
                                        href="javascript:void(0)"
                                        class="theme-link rounded-circle d-block"
                                        data-sidebarbg="skin5"
                                        ></a>
                                </li>
                                <li class="theme-item list-inline-item me-1">
                                    <a
                                        href="javascript:void(0)"
                                        class="theme-link rounded-circle d-block"
                                        data-sidebarbg="skin6"
                                        ></a>
                                </li>
                            </ul>
                            <!-- Logo BG -->
                        </div>
                    </div>
                    <!-- End Tab 1 -->
                </div>
            </div>
        </aside>
        <div class="chat-windows"></div>
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ url('assets/plugins/jquery-migrate/jquery-migrate-3.4.0.min.js') }}"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="{{ url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- apps -->
        <script src="{{ url('assets/js/control-panel/app.min.js') }}"></script>
        <script src="{{ url('assets/js/control-panel/app.init.js') }}"></script>
        <script src="{{ url('assets/js/control-panel/app-style-switcher.js') }}"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="{{ url('assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
        <script src="{{ url('assets/plugins/sparkline/sparkline.js') }}"></script>
        <!--Wave Effects -->
        <script src="{{ url('assets/js/control-panel/waves.js') }}"></script>
        <!-- ============================================================== -->
        <!-- Plugins -->
        <!-- ============================================================== -->
        <!--Jqurey Ajax Form -->
        <script src="{{ url('assets/plugins/jquery-form/jquery.form.min.js') }}"></script>
        <!--Calculator -->
        <script src="{{ url('assets/plugins/calculator/js/calculator.js') }}"></script>
        <!--NProgress Bar -->
        <script src="{{ url('assets/plugins/nprogress/js/nprogress.js') }}"></script>
        <!--Select 2 -->
        <script src="{{ url('assets/plugins/select2/js/select2.min.js') }}"></script>
        <!--Floating Label -->
        <script src="{{ url('assets/plugins/format-number/format-number.js') }}"></script>
        <!-- zoiaTable -->
        <script src="{{ url('assets/plugins/jquery-zoiaTable/js/jquery.zoiaTable.js') }}"></script>
        <!-- Sweet alert 2 -->
        <script src="{{ url('assets/plugins/sweetalert2/js/sweetalert2.all.min.js') }}"></script>
        <!-- Pagination -->
        <script src="{{ url('assets/plugins/simplePagination/js/jquery.simplePagination.js') }}"></script>
        <!-- Moment -->
        <script src="{{ url('assets/plugins/moment/moment.min.js') }}"></script>
        <!-- Date Picker -->
        <script src="{{ url('assets/plugins/datedropper/js/datedropper-jquery.js') }}"></script>
        <!-- DateTimePicker -->
        <script src="{{ url('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
        <!-- ============================================================== -->
        <!-- Plugins -->
        <!-- ============================================================== -->
        <!--Menu sidebar -->
        <script src="{{ url('assets/js/control-panel/sidebarmenu.js') }}"></script>
        <!-- PJAX -->
        <script src="{{ url('assets/plugins/pjax/jquery.pjax.js') }}"></script>
        {{-- <script src="{{ url('assets/plugins/pjax-api/pjax-api.js') }}"></script> --}}
        <!-- Laravel Javascript Validation -->
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
        <!--Custom JavaScript -->
        <script src="{{ url('assets/js/control-panel/utils.js') }}"></script>
        <script src="{{ url('assets/js/control-panel/script.js') }}"></script>
        <!--This page JavaScript -->
        @yield('script')

    </body>
</html>
