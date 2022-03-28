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

        <!-- Nav Item - Dashboard -->
        <a class="nav-link {{ Request::is('/*') ? 'nav-active-custom' : '' }} " href="{{ route('home') }}" id="dashboard">
            @if (Request::is('/*'))
                <img src="{{asset ("template")}}/img/icon-sidebar-dashboard-active.svg" alt="">
            @else
                <img src="{{asset ("template")}}/img/icon-sidebar-dashboard.svg" alt="">
            @endif
            <span class="{{ Request::is('/*') ? 'nav-active-custom-span' : '' }}">Dashboard</span>
        </a>

        <!-- Nav Item - Pages Collapse Unit -->
        <a class="nav-link collapsed active" href="#" data-toggle="collapse" data-target="#unit"
            aria-expanded="true" aria-controls="collapseTwo">
            <img class="nav-icon-impress" src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip.svg" alt="">
            <span>Unit</span>
        </a>
        <div id="unit" class="collapse show" aria-labelledby="headingTwo" data-parent="#unit">
            <div class="py-2 collapse-inner rounded">

                <!-- Nav Item - Pages Collapse Menu Finance & Billco -->
                <a class="nav-link collapsed active" href="#" data-toggle="collapse" data-target="#finance-billco"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <img class="nav-icon-impress" src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip.svg" alt="">
                    <span>Finance & Billco</span>
                </a>
                <div id="finance-billco" class="collapse show" aria-labelledby="headingTwo" data-parent="#finance-billco">
                    <div class="py-2 collapse-inner rounded">

                        <!-- Nav Item - Imprest Fund -->
                        <a class="nav-link {{ Request::is('impress-fund*') ? 'nav-active-custom' : '' }} " href="{{ route('impress_fund.index') }}" id="impress-fund">
                            @if (Request::is('impress-fund*'))
                                <img class="nav-icon-impress" class="nav-icon-impress" src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip-active.svg" alt="">
                            @else
                                <img class="nav-icon-impress" src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip.svg" alt="">
                            @endif
                            <span class="{{ Request::is('impress-fund*') ? 'nav-active-custom-span' : '' }}">Imprest Fund</span>
                        </a>

                        <!-- Nav Item - Tagihan Mitra -->
                        <a class="nav-link {{ Request::is('tag-mitra*') ? 'nav-active-custom' : '' }} " href="{{ route('tag_mitra.index') }}" id="tag-mitra">
                            @if (Request::is('tag-mitra*'))
                                <img class="nav-icon-impress" src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip-active.svg" alt="">
                            @else
                                <img class="nav-icon-impress" src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip.svg" alt="">
                            @endif
                            <span class="{{ Request::is('tag-mitra*') ? 'nav-active-custom-span' : '' }}">Tagihan Mitra</span>
                        </a>    
                                                
                        <!-- Nav Item - BILLING COLLECTION -->
                        <a class="nav-link  {{ Request::is('billing-collection*') ? 'nav-active-custom' : '' }}" href="{{ route('billing.index') }}" id="billing collection">
                            @if (Request::is('billing-collection*'))
                                <img class="nav-icon-impress" class="nav-icon-impress" src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip-active.svg" alt="">
                            @else
                                <img class="nav-icon-impress" src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip.svg" alt="">
                            @endif
                            <span class="{{ Request::is('billing-collection*') ? 'nav-active-custom-span' : '' }}">BILLING COLLECTION</span>
                        </a>
                    </div>
                </div>


                <!-- Nav Item - Commerce -->
                <a class="nav-link {{ Request::is('commerce*') ? 'nav-active-custom' : '' }}" href="{{ route('commerce.index') }}" id="commerce">
                    @if (Request::is('commerce*'))
                        <img class="nav-icon-impress" class="nav-icon-impress" src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip-active.svg" alt="">
                    @else
                        <img class="nav-icon-impress" src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip.svg" alt="">
                    @endif
                    <span class="{{ Request::is('commerce*') ? 'nav-active-custom-span' : '' }}">Commerce</span>
                </a>

                <!-- Nav Item - Construction -->
                <a class="nav-link {{ Request::is('construction*') ? 'nav-active-custom' : '' }}" href="{{ route('construction.index')}}" id="construction">
                    @if (Request::is('construction*'))
                        <img class="nav-icon-impress" class="nav-icon-impress" src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip-active.svg" alt="">
                    @else
                        <img class="nav-icon-impress" src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip.svg" alt="">
                    @endif
                    <span class="{{ Request::is('construction*') ? 'nav-active-custom-span' : '' }}">Construction</span>
                </a>

                <!-- Nav Item - HCM -->
                <a class="nav-link {{ Request::is('hcm*') ? 'nav-active-custom' : '' }}" href="{{ route('hcm.index') }}" id="hcm">
                    @if (Request::is('hcm*'))
                        <img class="nav-icon-impress" class="nav-icon-impress" src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip-active.svg" alt="">
                    @else
                        <img class="nav-icon-impress" src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip.svg" alt="">
                    @endif
                    <span class="{{ Request::is('hcm*') ? 'nav-active-custom-span' : '' }}">HCM</span>
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
