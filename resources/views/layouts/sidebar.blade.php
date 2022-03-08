<ul class="nav navbar-nav sidebar sidebar-dark sidebar-custom accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html" >
        <span class="arta">ARTA<span> 
        <span class="apps">Apps</span> 
    </a>

   

    <div class="item-wrap">
    <div class="sidebar-title sidebar-heading mb-3 mt-4">
        <span>MENU</span>
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="sb nav-item">
        <a class="nav-link {{ Request::is('/*') ? 'nav-active-custom' : '' }} " href="{{ route('home') }}" id="dashboard">
            @if (Request::is('/*'))
                <img src="{{asset ("template")}}/img/icon-sidebar-dashboard-active.svg" alt="">
            @else
                <img src="{{asset ("template")}}/img/icon-sidebar-dashboard.svg" alt="">
            @endif
            <span class="{{ Request::is('/*') ? 'nav-active-custom-span' : '' }}">Dashboard</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="sb nav-item">
        <a class="nav-link collapsed active" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <img src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip.svg" alt="">
            <span>Kelola Arsip</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
                <a class="nav-link {{ Request::is('impress-fund*') ? 'nav-active-custom' : '' }} " href="{{ route('impress_fund.index') }}" id="impress-fund">
                @if (Request::is('impress-fund*'))
                    <img src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip-active.svg" alt="">
                @else
                    <img src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip.svg" alt="">
                @endif
                <span class="{{ Request::is('impress-fund*') ? 'nav-active-custom-span' : '' }}">IMPRESS FUND</span>
                </a>
                <a class="nav-link {{ Request::is('tag-mitra*') ? 'nav-active-custom' : '' }} " href="{{ route('tag_mitra.index') }}" id="tag-mitra">
                @if (Request::is('tag-mitra*'))
                    <img src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip-active.svg" alt="">
                @else
                    <img src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip.svg" alt="">
                @endif
                <span class="{{ Request::is('tag-mitra*') ? 'nav-active-custom-span' : '' }}">TAG MITRA</span>
                </a>    
            </div>
        </div>
    </li>

    {{-- <li class="sb nav-item">
        <a class="nav-link " href="/test">
            <img src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip.svg" alt="">
            <span>Tentang Aplikasi</span></a>
    </li> --}}

       <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    </div>
</ul>
