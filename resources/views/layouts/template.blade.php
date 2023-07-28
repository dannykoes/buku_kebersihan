<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Griya Resik | PT. GUNA ADI GRAHA</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <link href="{{asset('asset/assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('asset/assets/js/loader.js')}}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('asset/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('asset/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/plugins/table/datatable/dt-global_style.css')}}">
    <link href="{{asset('asset/assets/css/components/tabs-accordian/custom-tabs.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('asset/plugins/sweetalerts/promise-polyfill.js')}}"></script>
    <link href="{{asset('asset/plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset/plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset/assets/css/components/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('asset/plugins/select2/select2.min.css')}}">
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{asset('asset/plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset/assets/css/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <script src="{{asset('asset/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('asset/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('asset/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('asset/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('asset/assets/js/app.js')}}"></script>
    <script src="{{asset('asset/assets/js/custom.js')}}"></script>
    <script src="{{asset('asset/plugins/table/datatable/datatables.js')}}"></script>
    <script src="{{asset('asset/plugins/apex/apexcharts.min.js')}}"></script>
    <script src="{{asset('asset/assets/js/dashboard/dash_2.js')}}"></script>
    <script src="{{asset('asset/plugins/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('asset/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{asset('asset/plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <script src="{{asset('asset/plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('asset/plugins/select2/custom-select2.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .navbar {
            border-radius: 20px
        }

        .widget {
            border-radius: 20px
        }

        .btn {
            border-radius: 15px
        }
    </style>
</head>

<body class="alt-menu sidebar-noneoverflow">
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm expand-header">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg></a>
            <ul class="navbar-item flex-row ml-auto">
                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg> --}}
                        <div class="user-profile-section">
                            <div class="media mx-auto">
                                <div class="mr-2">
                                    @auth
                                    <p>{{Auth::user()->name}}</p>
                                    @endauth
                                </div>
                                <img src="{{asset('asset/assets/img/90x90.jpg')}}" class="img-fluid mr-2" alt="avatar" style="width: 42px !important; height: 42px !important;">
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="dropdown-item">
                            <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg> Sign Out
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme" style="background-color: #007EFF">

            <nav id="sidebar">

                <ul class="navbar-nav theme-brand flex-row  text-center" style="background-color: #007EFF;background-image: linear-gradient(to right, #007EFF 0%, #007EFF 86%);">
                    <li class="nav-item theme-logo">
                        <a href="home">
                            <img src="{{asset('image/logo.png')}}" class="navbar-logo" alt="logo">
                        </a>
                    </li>
                    <li class="nav-item theme-text">
                        <a href="home" class="nav-link" style="font-size: 13px !important"> PT GUNA ADI GRAHA </a>
                    </li>
                </ul>

                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu" hidden>
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                <span class="text-white">Dashboards</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled show" id="dashboard" data-parent="#accordionExample">
                            <li>
                                <a href="/"> Analytics </a>
                            </li>
                            <li class="">
                                <a href="index2.html"> Sales </a>
                            </li>
                        </ul>
                    </li>


                    @IsSuperadmin
                    <li class="menu active">
                        <a href="home" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                                    <path d="M14 3H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2z">
                                    </path>
                                    <path d="M21 19v-9a2 2 0 0 0-2-2h-1v8a2 2 0 0 1-2 2H8v1a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2z">
                                    </path>
                                </svg>
                                <span class="text-white">Dashboard</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="master" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                                    <path d="m21.484 7.125-9.022-5a1.003 1.003 0 0 0-.968 0l-8.978 4.96a1 1 0 0 0-.003 1.748l9.022 5.04a.995.995 0 0 0 .973.001l8.978-5a1 1 0 0 0-.002-1.749z">
                                    </path>
                                    <path d="m12 15.856-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.971-1.748L12 15.856z">
                                    </path>
                                    <path d="m12 19.856-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.971-1.748L12 19.856z">
                                    </path>
                                </svg>
                                <span class="text-white">Master</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="laporan" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                                    <path d="M2 20h20v2H2z"></path>
                                    <rect x="5" y="2" width="6" height="16" rx="1"></rect>
                                    <rect x="13" y="6" width="6" height="12" rx="1"></rect>
                                </svg>
                                <span class="text-white">Laporan</span>
                            </div>
                        </a>
                    </li>
                    @endIsSuperadmin

                    @IsSpv
                    <li class="menu active">
                        <a href="home" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                                    <path d="M14 3H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2z">
                                    </path>
                                    <path d="M21 19v-9a2 2 0 0 0-2-2h-1v8a2 2 0 0 1-2 2H8v1a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2z">
                                    </path>
                                </svg>
                                <span class="text-white">Dashboard</span>
                            </div>
                        </a>
                    </li>
                    @endIsSpv

                    @IsClc
                    <li class="menu active">
                        <a href="home" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                                    <path d="M14 3H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2z">
                                    </path>
                                    <path d="M21 19v-9a2 2 0 0 0-2-2h-1v8a2 2 0 0 1-2 2H8v1a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2z">
                                    </path>
                                </svg>
                                <span class="text-white">Dashboard</span>
                            </div>
                        </a>
                    </li>
                    @endIsClc

                    @IsPtgs
                    <li class="menu active">
                        <a href="home" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                                    <path d="M14 3H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2z">
                                    </path>
                                    <path d="M21 19v-9a2 2 0 0 0-2-2h-1v8a2 2 0 0 1-2 2H8v1a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2z">
                                    </path>
                                </svg>
                                <span class="text-white">Dashboard</span>
                            </div>
                        </a>
                    </li>
                    @endIsPtgs

                </ul>

            </nav>

        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">
                    @if (session('info'))
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{session('info')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
        <form action="#" method="post" id="formdelete">@csrf @method('DELETE')
        </form>
    </div>
    <!-- END MAIN CONTAINER -->
    <script>
        $(document).ready(function() {
            App.init();
            // $('.sidebarCollapse').click();
        });
    </script>

    <script>
        function createDataTable(elm) {
            $(elm).DataTable({
                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                    "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7
            });
        }

        function radialbar(series, height, hollowsize, label, radialdiv) {

            var options4 = {
                chart: {
                    height: height,
                    type: "radialBar"
                },
                series: series,
                plotOptions: {
                    radialBar: {
                        hollow: {
                            margin: 15,
                            size: hollowsize
                        },
                        dataLabels: {
                            showOn: "always",
                            name: {
                                offsetY: -10,
                                show: true,
                                color: "#888",
                                fontSize: "12px"
                            },
                            value: {
                                color: "#111",
                                fontSize: "20px",
                                show: true
                            }
                        }
                    }
                },
                stroke: {
                    lineCap: "round",
                },
                labels: label
            };
            var chart4 = new ApexCharts(document.querySelector(radialdiv), options4);
            chart4.render();
        }

        function deletedata(url) {
            swal({
                title: 'Hapus!',
                text: "Apakah anda yakin?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                padding: '2em'
            }).then(function(result) {
                // if (result.value) {
                //   swal(
                //     'Deleted!',
                //     'Your file has been deleted.',
                //     'success'
                //   )
                // }
                if (result.value) {
                    $('#formdelete').attr('action', url);
                    $('#formdelete').submit();
                } else {
                    $('#formdelete').attr('action', '#');
                }
            })
        }
    </script>
    @yield('custom-js')
</body>

</html>