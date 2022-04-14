<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class BillingController extends Controller
{

    function getAllBilling(){
        $dbres = DB::table('soft_install_per_client')
        ->join('clients', 'soft_install_per_client.client_id', '=', 'clients.id')
        ->select('soft_install_per_client.*', 'clients.client_name', 'clients.contact_name', 'clients.contact_number', 'clients.client_address')
        ->get();
        if ($dbres) {
            return $dbres;
        } else {
            return 0;
        }
    }

    // All bill with blade
    function allBills(){
        $dbres = DB::table('soft_install_per_client')
        ->join('clients', 'soft_install_per_client.client_id', '=', 'clients.id')
        ->select('soft_install_per_client.*', 'clients.client_name', 'clients.contact_name', 'clients.contact_number', 'clients.client_address')
        ->get();
        return view('backend.allbill', ['billes' => $dbres]);
    }

    // change-payment-status
    function onDHPayChange(Request $res){
        $inspayStatus = $res->input('DHpayStatus');
        $installId = $res->input('softInsId');
        $columnName = $res->input('changeColumenName');

        $dbres = DB::table('soft_install_per_client')->where('id', '=', $installId)
        ->limit(1) 
        ->update([$columnName => $inspayStatus]);

        if ($dbres) {
            return $dbres;
        } else {
            return 0;
        }
        
    }
}
