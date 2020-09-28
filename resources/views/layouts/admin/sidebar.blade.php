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
            
            <li class="@if(Request::segment(2) == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard.index')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
            </li>

            <li class="@if(Request::segment(1) == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('product.index')}}"><i class="fas fa-shopping-bag"></i> <span>Product</span></a>
            </li>

            <li class="@if(Request::segment(1) == 'dashboard') active @endif">
                <a class="nav-link" href="#"><i class="fas fa-newspaper"></i> <span>Article</span></a>
            </li>

            <li class="dropdown @if(Request::segment(2) == 'user' || Request::segment(2) == 'role') active @endif">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-box"></i> <span>Partials</span></a>
                <ul class="dropdown-menu">
                    <li class="@if(Request::segment(2) == 'user') active @endif">
                        <a class="nav-link" href=""><i class="fas fa-fire"></i> Promo</a>
                    </li>
                    <li class="@if(Request::segment(2) == 'role') active @endif">
                        <a class="nav-link" href=""><i class="fas fa-map-marked-alt"></i> Area</a>
                    </li>
                    <li class="@if(Request::segment(2) == 'role') active @endif">
                        <a class="nav-link" href=""><i class="fas fa-tag"></i> Category</a>
                    </li>
                </ul>
            </li>
            
            {{-- <li class="menu-header">Setting</li> --}}
            <li class="dropdown @if(Request::segment(2) == 'user' || Request::segment(2) == 'role') active @endif">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users-cog"></i> <span>Administrator</span></a>
                <ul class="dropdown-menu">
                    <li class="@if(Request::segment(2) == 'user') active @endif">
                        <a class="nav-link" href=""><i class="fas fa-user-tie"></i> User</a>
                    </li>
                    <li class="@if(Request::segment(2) == 'role') active @endif">
                        <a class="nav-link" href=""><i class="fas fa-user-cog"></i> Role</a>
                    </li>
                </ul>
            </li>
            
            <li class="@if(Request::segment(1) == 'dashboard') active @endif">
                <a class="nav-link" href="#"><i class="fas fa-cogs"></i> <span>Settings</span></a>
            </li>
        </ul>
    </aside>
</div>
