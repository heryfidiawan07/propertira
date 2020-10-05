<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('dashboard.index')}}"><h4 class="mt-4 float-left ml-4 text-parent">PROPERTIRA</h4></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('dashboard.index')}}" class="text-parent">PROP</a>
        </div>
        <ul class="sidebar-menu">
            {{-- <li class="menu-header">Dashboard</li> --}}
            
            <li class="@if(Request::segment(2) == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard.index')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
            </li>

            <li class="@if(Request::segment(2) == 'page') active @endif">
                <a class="nav-link" href="{{route('page.index')}}"><i class="fas fa-columns"></i> <span>Page</span></a>
            </li>

            <li class="@if(Request::segment(2) == 'property') active @endif">
                <a class="nav-link" href="{{route('property.index')}}"><i class="fas fa-building"></i> <span>Property</span></a>
            </li>

            <li class="@if(Request::segment(2) == 'blog') active @endif">
                <a class="nav-link" href="{{route('blog.index')}}"><i class="fas fa-newspaper"></i> <span>Blog</span></a>
            </li>

            <li class="dropdown @if(Request::segment(2) == 'promo' || Request::segment(2) == 'area' || Request::segment(2) == 'category')  active @endif">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-box"></i> <span>Partials</span></a>
                <ul class="dropdown-menu">
                    <li class="@if(Request::segment(2) == 'promo') active @endif">
                        <a class="nav-link" href="{{route('promo.index')}}"><i class="fas fa-fire"></i> Promo</a>
                    </li>
                    <li class="@if(Request::segment(2) == 'area') active @endif">
                        <a class="nav-link" href="{{route('area.index')}}"><i class="fas fa-map-marked-alt"></i> Area</a>
                    </li>
                    <li class="@if(Request::segment(2) == 'category') active @endif">
                        <a class="nav-link" href="{{route('category.index')}}"><i class="fas fa-tag"></i> Category</a>
                    </li>
                </ul>
            </li>
            
            {{-- <li class="menu-header">Setting</li> --}}
            <li class="dropdown @if(Request::segment(2) == 'user' || Request::segment(2) == 'role') active @endif">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users-cog"></i> <span>Administrator</span></a>
                <ul class="dropdown-menu">
                    <li class="@if(Request::segment(2) == 'user') active @endif">
                        <a class="nav-link" href="{{route('user.index')}}"><i class="fas fa-user-tie"></i> User</a>
                    </li>
                    <li class="@if(Request::segment(2) == 'role') active @endif">
                        <a class="nav-link" href="{{route('role.index')}}"><i class="fas fa-user-cog"></i> Role</a>
                    </li>
                </ul>
            </li>
            
            <li class="@if(Request::segment(2) == 'setting') active @endif">
                <a class="nav-link" href="{{route('setting.index')}}"><i class="fas fa-cogs"></i> <span>Settings</span></a>
            </li>
        </ul>
    </aside>
</div>
