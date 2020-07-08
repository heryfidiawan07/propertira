<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">SYSTEM</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SYS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="@if(Request::segment(1) == 'dashboard') active @endif">
                <a class="nav-link" href="#"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Setting</li>
            <li class="dropdown @if(Request::segment(2) == 'user' || Request::segment(2) == 'role') active @endif">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users-cog"></i> <span>Administrator</span></a>
                <ul class="dropdown-menu">
                    <li class="@if(Request::segment(2) == 'user') active @endif">
                        <a class="nav-link" href="{{route('admin.user.index')}}"><i class="fas fa-user-tie"></i> User</a>
                    </li>
                    <li class="@if(Request::segment(2) == 'role') active @endif">
                        <a class="nav-link" href=""><i class="fas fa-user-cog"></i> Role</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
