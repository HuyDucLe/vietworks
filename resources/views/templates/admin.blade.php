@php ($name = session()->get('name',''))
@php ($role = session()->get('role', 'Khách'))

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Vietworks</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('')}}resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('')}}resources/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('')}}resources/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{asset('')}}resources/css/bootstrap-datepicker.css">
    <script src="{{asset('')}}resources/js/jquery.min.js"></script>
    <script src="{{asset('')}}resources/js/bootstrap.min.js"></script>
    <script src="{{asset('')}}resources/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('')}}resources/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('')}}resources/js/bootstrap-datepicker.js"></script>
    <script src="{{asset('')}}resources/js/theme.js"></script>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('')}}resources/img/jobico.png">
</head>
<style>
.custom-switch .custom-switch-input {
    display: none;
}
.custom-switch .custom-switch-input,
.custom-switch .custom-switch-input:after,
.custom-switch .custom-switch-input:before,
.custom-switch .custom-switch-input *,
.custom-switch .custom-switch-input *:after,
.custom-switch .custom-switch-input *:before,
.custom-switch .custom-switch-input + .custom-switch-btn {
    box-sizing: border-box;
}
.custom-switch .custom-switch-input:selection,
.custom-switch .custom-switch-input:after:selection,
.custom-switch .custom-switch-input:before:selection,
.custom-switch .custom-switch-input *:selection,
.custom-switch .custom-switch-input *:after:selection,
.custom-switch .custom-switch-input *:before:selection,
.custom-switch .custom-switch-input + .custom-switch-btn:selection {
    background: none;
}
.custom-switch .custom-switch-input + .custom-switch-btn {
    outline: 0;
    display: inline-block;
    position: relative;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    cursor: pointer;
    width: 68px;
    height: 38px;
    margin: 0;
    padding: 4px;
    background: #ced4da;
    border-radius: 76px;
    transition: all 300ms ease;
}
.custom-switch .custom-switch-input + .custom-switch-btn:after,
.custom-switch .custom-switch-input + .custom-switch-btn:before {
    position: relative;
    display: block;
    content: "";
    width: 30px;
    height: 30px;
}
.custom-switch .custom-switch-input + .custom-switch-btn:after {
    left: 2px;
    border-radius: 50%;
    background: white;
    transition: all 300ms ease;
}
.custom-switch .custom-switch-input + .custom-switch-btn:before {
    display: none;
}
.custom-switch .custom-switch-input:checked + .custom-switch-btn {
    background: #28a745;
}
.custom-switch .custom-switch-input:checked + .custom-switch-btn:after {
    left: 30px;
}
.custom-switch
    .custom-switch-input:checked
    + .custom-switch-btn
    ~ .custom-switch-content-checked {
    opacity: 1;
    height: auto;
}
.custom-switch
    .custom-switch-input:checked
    + .custom-switch-btn
    ~ .custom-switch-content-unchecked {
    display: none;
    opacity: 0;
    height: 0;
}
.custom-switch
    .custom-switch-input:not(:checked)
    + .custom-switch-btn
    ~ .custom-switch-content-checked {
    display: none;
    opacity: 0;
    height: 0;
}
.custom-switch
    .custom-switch-input:not(:checked)
    + .custom-switch-btn
    ~ .custom-switch-content-unchecked {
    opacity: 1;
    height: auto;
}
.custom-switch.custom-switch-label-yesno
    .custom-switch-input
    + .custom-switch-btn {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='68' height='38'%3E%3Ctext x='38.85714' y='23.75' font-size='12px' font-family='-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol' fill='%23fff'%3ENo%3C/text%3E%3C/svg%3E");
}

.custom-switch.custom-switch-label-yesno
    .custom-switch-input:checked
    + .custom-switch-btn {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='68' height='38'%3E%3Ctext x='9.71429' y='23.75' font-size='12px' font-family='-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol' fill='%23fff'%3EYes%3C/text%3E%3C/svg%3E");
}


</style>
<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index">
                    <div class="sidebar-brand-icon"><img class="rounded-circle" src="{{asset('')}}resources/img/jobico.png" width="40"></div>
                    <div class="sidebar-brand-text mx-3"><span>Vietworks</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link @if($page == 'index') active @endif" href="admin"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link @if($page == 'profile') active @endif" href="admin.profile"><i class="fas fa-user"></i><span>Profile</span></a>
                    
                    </li>
                    <li class="nav-item"><a class="nav-link @if($page == 'table') active @endif" href="admin.table"><i class="fas fa-table"></i><span>Admin control</span></a>
                        <ul  class="list-group" style="margin-left:10px;">
                            <li class="@if($page == 'user') active @endif">
                                <a class="nav-link" href="admin.user">
                                    <i class="fas fa-table"></i>
                                    <span> Users</span> <span class="menu-arrow"></span>
                                </a>
                            </li>
                            <li class="@if($page == 'company') active @endif">
                                <a class="nav-link" href="admin.company">
                                    <i class="fas fa-table"></i>
                                    <span> Companies</span> <span class="menu-arrow"></span>
                                </a>
                            </li>
                            <li class="@if($page == 'post') active @endif">
                                <a class="nav-link" href="admin.post">
                                    <i class="fas fa-table"></i>
                                    <span> Job Posts</span> <span class="menu-arrow"></span>
                                </a>
                            </li>
                            <li class="@if($page == 'cate') active @endif">
                                <a class="nav-link" href="admin.cate">
                                    <i class="fas fa-table"></i>
                                    <span> Job Categories</span> <span class="menu-arrow"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..."><button class="btn btn-light py-0" type="button"><i class="fas fa-search"></i></button></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="index"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="index"><span class="badge bg-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="index">
                                            <div class="me-3">
                                                <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="index">
                                            <div class="me-3">
                                                <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="index">
                                            <div class="me-3">
                                                <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                            </div>
                                        </a><a class="dropdown-item text-center small text-gray-500" href="index">Show All Alerts</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="index"><span class="badge bg-danger badge-counter">7</span><i class="fas fa-envelope fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="index">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="resources/img/avatars/avatar4.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem I've been having.</span></div>
                                                <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="index">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="resources/img/avatars/avatar2.jpeg">
                                                <div class="status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>I have the photos that you ordered last month!</span></div>
                                                <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="index">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="resources/img/avatars/avatar3.jpeg">
                                                <div class="bg-warning status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Last month's report looks great, I am very happy with the progress so far, keep up the good work!</span></div>
                                                <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="index">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="resources/img/avatars/avatar5.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</span></div>
                                                <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                            </div>
                                        </a><a class="dropdown-item text-center small text-gray-500" href="index">Show All Alerts</a>
                                    </div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="index"><i class="far fa-user-circle"></i><span class="d-none d-lg-inline me-2 text-gray-600 small">&nbsp;Admin</span></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="index"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="index"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="index"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="index"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
@yield('content')
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Vietworks 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
</body>
@yield('javascript')
</html>