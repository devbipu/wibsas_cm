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
        $clients = DB::table('clients')->count();
        $agents = DB::table('agents')->count();
        $totalInstall = DB::table('soft_install_per_client')->count();
        $total_sla_bill = DB::table('all_billing')->count();
        $total_bill_sla_amount = DB::table('all_billing')->sum('bill_amount');
        $total_DH_bill = DB::table('dh_bill_report')->count();
        $total_DH_bill_amount = DB::table('dh_bill_report')->sum('bill_amount');
        
        

        return view('backend.home',[
            'total_client' => $clients,
            'total_agent'  => $agents,
            'total_product'=> $totalInstall,
            'total_bill_sla_amount' => $total_bill_sla_amount,
            'total_sla_bill'    => $total_sla_bill,
            'total_DH_bill' => $total_DH_bill,
            'total_DH_bill_amount' => $total_DH_bill_amount
        ]);
    }


    // show all install
    function allInstallShow(){
        $allInstall = DB::table('soft_install_per_client')
        ->join('clients', 'soft_install_per_client.client_id', '=', 'clients.id')
        ->leftJoin('agents', 'soft_install_per_client.agent_id', '=','agents.id')
        ->select('soft_install_per_client.*', 'clients.client_name', 'clients.contact_name', 'clients.contact_number', 'clients.client_address', 'agents.agent_name', 'agents.agent_number')
        ->orderBy('id', 'ASC')
        ->get();

        if ($allInstall) {
            return view('backend.allinstall',[
                'all_install' => $allInstall,
            ]);
        } else {
            return 0;
        }
    }

    //dashboard counter

    // function dashboardcounts(){
        
    // }
    
}
