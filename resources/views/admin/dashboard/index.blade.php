@extends('layouts.app',[
	'title' => 'Dashboard'
])

@section('content')


<div class="header-content">
    <h1>Halo Administrator!</h1>
    <p>Sistem Informasi pencatatan arsip terintegrasi dengan website</p>
</div>

<div class="container-content" style="position: relative; margin-top: -20px;" >
    <div class="card-custom">
        <div class="conten-custom">
            <img src="{{asset ("template") }}/img/maps.jpg" class="img-fluid" alt="...">
        </div>
    </div>
</div>

<div class="container-content mt-5">
    <div class="card-custom">
        <div class="conten-custom">
            <canvas id="myBarChart" style="display: block; height: auto; width: auto;" width="897" height="400" class="chartjs-render-monitor"></canvas>
        </div>
    </div>
</div>
@endsection
<input type="hidden" name="" id="years_chart" value="{{(json_encode($year_combine))}}">
<input type="hidden" name="" id="impress_fund_chart" value="{{(json_encode($impress_funds))}}">
<input type="hidden" name="" id="tag_partner_chart" value="{{(json_encode($tag_partners))}}">
@push('js')
    <script src="{{ asset('template') }}/vendor/chart.js/Chart.min.js"></script>
    <script src="{{ asset('template') }}/js/demo/chart-bar-demo.js"></script>
@endpush