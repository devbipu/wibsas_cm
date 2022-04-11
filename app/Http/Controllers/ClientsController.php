<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clients_table;
use Illuminate\Support\Facades\DB;



class ClientsController extends Controller
{

    // On client show
    public function clientsShow(){
        return view("backend.clients");
    }

    //On client add
    function onClintAdd(Request $request){
        $client_name = $request->input('client_name');
        $contact_name = $request->input('contact_name');
        $contact_number = $request->input('contact_number');
        $alter_contact = $request->input('alter_contact');
        $client_address = $request->input('client_address');
        
        $dbins =  DB::table('clients')->insert([
            'client_name' => $client_name,
            'contact_name' => $contact_name,
            'contact_number' => $contact_number,
            'alter_contact' => $alter_contact,
            'client_address' => $client_address,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        if($dbins){
            return 1;
        }else{
            return 0;
        }
    }

    //on show cients
    public function onShowClients(){
        $allC = DB::table('clients')->get();

        
        if($allC){
            return $allC;
        }else{
            return 0;
        }
    }


    //clients single page
    function onSinglePage(Request $req, $id){
        $clientData = clients_table::where("id", "=", $id)->get()->first();
        return view('backend.client_single', [
            "clientData" => $clientData,
            "c_id"    => $id,
        ]);
    }


    function onSoftAdd(Request $req){
        $business_name          = $req->input('business_name'); 
        $business_address       = $req->input('business_address'); 
        $service_type           = $req->input('service_type'); 
        $app_install_id         = $req->input('app_install_id'); 
        $app_url                = $req->input('app_url'); 
        $app_username           = $req->input('app_username'); 
        $app_password           = $req->input('app_password'); 
        $app_install_date       = $req->input('app_install_date'); 
        $app_rafaral            = $req->input('app_rafaral'); 
        $rafared_agents         = $req->input('rafared_agents'); 
        $hosted_by              = $req->input('hosted_by'); 
        $domain_by              = $req->input('domain_by'); 
        $domain_by              = $req->input('domain_by'); 
        $domain_hosting_bill    = $req->input('domain_hosting_bill'); 
        $bill_starting_date     = $req->input('bill_starting_date'); 
        $soft_price             = $req->input('soft_price'); 
        $installation_charge    = $req->input('installation_charge'); 
        $service_level_aggre    = $req->input('service_level_aggre'); 
        $service_level_amount   = $req->input('service_level_amount'); 
        $client_id              = $req->input('client_id');

        $dbRes = DB::table('soft_install_per_client')->insert([
            'business_name'        =>   $business_name,  
            'business_address'     =>   $business_address,  
            'service_type'         =>   $service_type,  
            'app_install_id'       =>   $app_install_id,  
            'app_url'              =>   $app_url,  
            'app_username'         =>   $app_username,  
            'app_password'         =>   $app_password,  
            'app_install_date'     =>   $app_install_date,  
            'app_rafaral'          =>   $app_rafaral,  
            'rafared_agents'       =>   $rafared_agents,  
            'hosted_by'            =>   $hosted_by,  
            'domain_by'            =>   $domain_by,  
            'domain_by'            =>   $domain_by,  
            'domain_hosting_bill'  =>   $domain_hosting_bill,  
            'bill_starting_date'   =>   $bill_starting_date,  
            'soft_price'           =>   $soft_price,  
            'installation_charge'  =>   $installation_charge,  
            'service_level_aggre'  =>   $service_level_aggre,  
            'service_level_amount' =>   $service_level_amount,  
            'client_id'            =>   $client_id, 
        ]);

        if($dbRes){
            return "Success";
        }else{
            return "Faild";
        }
    }

    // show installed apps
    function getInstlledSoft($id){
        $dbRes = DB::table('soft_install_per_client')->where('client_id' , '=', $id)->get();

        if ($dbRes) {
            return $dbRes;
        }else{
            return $dbRes;
        }
    }
}
