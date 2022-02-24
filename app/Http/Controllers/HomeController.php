<?php

namespace App\Http\Controllers;

use App\Models\ImpressFund;
use App\Models\TagPartner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $impress_fun_year=ImpressFund::distinct('periode')->orderBy('periode','ASC')->pluck('periode')->toArray();
        $tag_partner_year=TagPartner::distinct('periode')->orderBy('periode','ASC')->pluck('periode')->toArray();
        $data['year_combine']=array_unique(array_merge($tag_partner_year,$impress_fun_year));
        
        foreach ($data['year_combine'] as $year){
            $data['impress_funds'][]=ImpressFund::where('periode',$year)->count();
            $data['tag_partners'][]=TagPartner::where('periode',$year)->count();
        }


        // dd($data);

        return view('admin.dashboard.index',$data);
    }

    
}
