<?php

namespace App\Http\Controllers;

use App\Models\Archive;
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
        $impress_fun_year=Archive::distinct('periode')->orderBy('periode','ASC')->where('type','IF')->pluck('periode')->toArray();
        $tag_partner_year=Archive::distinct('periode')->orderBy('periode','ASC')->where('type','TM')->pluck('periode')->toArray();
        $data['year_combine']=array_values(array_unique(array_merge($tag_partner_year,$impress_fun_year)));
        
        foreach ($data['year_combine'] as $year){
            $data['impress_funds'][]=Archive::where('periode',$year)->where('type','IF')->count();
            $data['tag_partners'][]=Archive::where('periode',$year)->where('type','TM')->count();
        }
        return view('admin.dashboard.index',$data);
    }

    
}
