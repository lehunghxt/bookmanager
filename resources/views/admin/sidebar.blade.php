<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Book</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    @if (Auth::user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/list-categories') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Book Categories</span>
            </a>
        </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{ url('list-book') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Book List</span>
        </a>
    </li>
    {{--  --}}
    @if (Auth::user()->role == 'user')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('list_borrow') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Sách Đã Mượn</span>
        </a>
    </li>
    @endif
    {{--  --}}
    @if (Auth::user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('list-member') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Thành Viên</span>
        </a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
