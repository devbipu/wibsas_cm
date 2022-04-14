<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('backend.home');
    }


    // show all install
    function allInstallShow(){
        $allInstall = DB::table('soft_install_per_client')
        ->join('clients', 'soft_install_per_client.client_id', '=', 'clients.id')
        ->leftJoin('agents', 'soft_install_per_client.agent_id', '=','agents.id')
        ->select('soft_install_per_client.*', 'clients.client_name', 'clients.contact_name', 'clients.contact_number', 'clients.client_address', 'agents.agent_name', 'agents.agent_number')
        ->get();

        if ($allInstall) {
            return view('backend.allinstall',[
                'all_install' => $allInstall,
            ]);
        } else {
            return 0;
        }
    }

    // get all soft install data by id
    // function allSoftDataById(Request $req){
    //     $install_soft_id = $req->input('softinstallID');

    //     // $dbdata = DB::table('soft_install_per_client')->where('id', '=', $install_soft_id)->get()->first(); 

    //     $dbdata = DB::table('soft_install_per_client')
    //     ->join('clients', 'soft_install_per_client.client_id' , '=', 'clients.id')
    //     ->select('soft_install_per_client.*', 'clients.client_name', 'clients.contact_number', 'clients.alter_contact', 'clients.contact_name')
    //     ->where('soft_install_per_client.id', '=', $install_soft_id)
    //     ->first();



    //     if ($dbdata) {
    //         return $dbdata;
    //     } else {
    //         return 0;
    //     }  
    // }


    
}
