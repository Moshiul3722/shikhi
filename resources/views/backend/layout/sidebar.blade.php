<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index-2.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('./backend/assets/images/shikhi-logo.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('./backend/assets/images/shikhi-logo.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index-2.html" class="logo logo-light">
            <span class="logo-sm">
                <img class="shikhi-logo " src="{{ asset('./backend/assets/images/shikhi-logo.png') }}" alt=""
                    height="22">
            </span>
            <span class="logo-lg">
                <img class="shikhi-logo " src="{{ asset('./backend/assets/images/shikhi-logo.png') }}" alt=""
                    height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('dashboard.index') }}" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarRoleManagement" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-team-line"></i> <span data-key="t-dashboards">Role
                            Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarRoleManagement">
                        <ul class="nav nav-sm flex-column">
                            {{-- <li class="nav-item">
                                <a href="{{ route('user.management.index') }}" class="nav-link" data-key="t-analytics">
                                    User Management
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('user.role.index') }}" class="nav-link" data-key="t-analytics"> Role
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link" data-key="t-crm"> Permission </a>
                            </li>
                            <li class="nav-item">
                                <a href="index-2.html" class="nav-link" data-key="t-ecommerce"> Users </a>
                            </li>

                        </ul>
                    </div>
                </li> <!-- end Role Management Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('user.*') ? 'active' : '' }}" href="#userLayouts"
                        data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="userLayouts">
                        <i class="ri-user-settings-line"></i> <span data-key="t-layouts">User
                            Management</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('user.*') ? 'show' : '' }}"
                        id="userLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('user.management.index') }}"
                                    class="nav-link {{ request()->routeIs('user.management.index') ? 'active' : '' }}"
                                    target="" data-key="t-horizontal">View All</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.create') }}"
                                    class="nav-link {{ request()->routeIs('user.create') ? 'active' : '' }}"
                                    target="" data-key="t-two-column">Add Lesson</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('category.*') ? 'active' : '' }}"
                        href="{{ route('category.index') }}">
                        <i class="mdi mdi-bookmark-box-multiple-outline"></i> <span data-key="t-widgets">Category</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('course.*') ? 'active' : '' }}"
                        href="#courseLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="courseLayouts">
                        <i class="mdi mdi-view-carousel-outline"></i> <span data-key="t-layouts">Course
                            Management</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('course.*') ? 'show' : '' }}"
                        id="courseLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('course.index') }}"
                                    class="nav-link {{ request()->routeIs('course.index') ? 'active' : '' }}"
                                    target="" data-key="t-horizontal">View All</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('course.create') }}"
                                    class="nav-link {{ request()->routeIs('course.create') ? 'active' : '' }}"
                                    target="" data-key="t-two-column">Add Course</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('lesson.*') ? 'active' : '' }}"
                        href="#lessonLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="lessonLayouts">
                        <i class="ri-book-mark-line"></i> <span data-key="t-layouts">Lesson
                            Management</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('lesson.*') ? 'show' : '' }}"
                        id="lessonLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('lesson.index') }}"
                                    class="nav-link {{ request()->routeIs('lesson.index') ? 'active' : '' }}"
                                    target="" data-key="t-horizontal">View All</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('lesson.create') }}"
                                    class="nav-link {{ request()->routeIs('lesson.create') ? 'active' : '' }}"
                                    target="" data-key="t-two-column">Add Lesson</a>
                            </li>
                        </ul>
                    </div>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
