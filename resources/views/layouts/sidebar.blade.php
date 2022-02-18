<ul class="navbar-nav sidebar sidebar-dark sidebar-custom accordion" id="accordionSidebar">

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
        <a class="nav-link " href="/dashboard" id="dashboard">
            <img src="{{asset ("template")}}/img/icon-sidebar-dashboard.svg" alt="">
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="sb nav-item">
        <a class="nav-link collapsed active" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <img src="{{asset ("template")}}/img/icon-sidebar-dashboard.svg" alt="">
            <span>Kelola Arsip</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
                <a class="nav-link " href="{{ route('impress_fund.index') }}" id="impress-fund">
                    <img src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip.svg" alt="">
                    <span>IMPRESS FUND</span>
                </a>
                <a class="nav-link " href="/tag-mitra" id="tag-mitra">
                    <img src="{{asset ("template")}}/img/icon-sidebar-kelola-arsip.svg" alt="">
                    <span>TAG MITRA</span>
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

@push('js')
<script>
    $(document).ready(function () {
        var url = window.location.pathname;
        // console.log(url);

        if ( url == "/dashboard"){
            $('#dashboard').addClass('active-custom')
        }
        if ( url == "/impress-fund"){
            $('#impress-fund').addClass('active-custom')
        }
        if ( url == "/tag-mitra"){
            $('#tag-mitra').addClass('active')
        }
    // $('.sb').click(function() {
    //     $('.sb').removeClass('active-custom');
    //     $(this).addClass('active-custom');
    // }); 
});
</script>
@endpush