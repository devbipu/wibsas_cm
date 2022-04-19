<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clients_table;
use Illuminate\Support\Facades\DB;



class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $allC = DB::table('clients')->latest('id')->get();
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
        $product_type           = $req->input('product_type'); 
        $product_install_id         = $req->input('product_install_id'); 
        $product_url                = $req->input('product_url'); 
        $product_username           = $req->input('product_username'); 
        $product_password           = $req->input('product_password'); 
        $product_install_date       = $req->input('product_install_date'); 
        $rafared_agents         = $req->input('rafared_agents'); 
        $agent_id               = $req->input('agent_id');
        $hosted_by              = $req->input('hosted_by'); 
        $domain_by              = $req->input('domain_by'); 
        $domain_hosting_bill_type = $req->input('domain_hosting_bill_type'); 
        $domain_hosting_bill    = $req->input('domain_hosting_bill'); 
        $dh_bill_starting_date  = $req->input('dh_bill_starting_date'); 
        $dh_payment_recived     = $req->input('dh_payment_recived'); 
        
        if ($domain_hosting_bill_type == "monthly") {
            if($dh_payment_recived == 1){
                $dh_next_bill_date = date('Y-m-d', strtotime('+1 month' . $dh_bill_starting_date));
                $dh_bill_status = 1;
            }else{
                $dh_next_bill_date = $dh_bill_starting_date;
                $dh_bill_status = 0;
            }
        } elseif($domain_hosting_bill_type == 'yearly') {
            if ($dh_payment_recived == 1) {
                $dh_next_bill_date = date('Y-m-d', strtotime('+1 year' . $dh_bill_starting_date));
                $dh_bill_status = 1;
            } else {
                $dh_next_bill_date = $dh_bill_starting_date;
                $dh_bill_status = 0;
            }
        }
        
        $soft_price             = $req->input('soft_price'); 
        $installation_charge    = $req->input('installation_charge'); 
        $service_level_aggre    = $req->input('service_level_aggre'); 
        $service_level_amount   = $req->input('service_level_amount');
        $sla_bill_start_date    = $req->input('sla_bill_start_date');
        $sla_payment_recived    = $req->input('sla_payment_recived');


        if ($service_level_aggre == "monthly") {
            if($sla_payment_recived == 1){
                $sla_next_bill_date  = date('Y-m-d', strtotime('+1 month ' . $sla_bill_start_date));
                $sla_bill_status = 1;
            }else{
                $sla_next_bill_date = $sla_bill_start_date;
                $sla_bill_status = 0;
            }
        } elseif($service_level_aggre == 'yearly') {
            if ($sla_payment_recived == 1) {
                $sla_next_bill_date  = date('Y-m-d', strtotime('+1 year ' . $sla_bill_start_date));
                $sla_bill_status = 1;
            } else {
                $sla_next_bill_date = $sla_bill_start_date;
                $sla_bill_status = 0;
            }
        }else{
            if ($sla_payment_recived == 1) {
                $sla_next_bill_date  = null;
                $sla_bill_status = 1;
            } else {
                $sla_next_bill_date = null;
                $sla_bill_status = 0;
            }
        }


        $client_id  = $req->input('client_id');


        $dbRes = DB::table('soft_install_per_client')->insert([
            'business_name'        =>   $business_name,  
            'business_address'     =>   $business_address,  
            'product_type'         =>   $product_type,  
            'product_install_id'   =>   $product_install_id,  
            'product_url'          =>   $product_url,  
            'product_username'     =>   $product_username,  
            'product_password'     =>   $product_password,  
            'product_install_date' =>   $product_install_date,  
            'agent_id'             =>   $agent_id,
            'hosted_by'            =>   $hosted_by,  
            'domain_by'            =>   $domain_by,  
            'domain_hosting_bill_type'  =>   $domain_hosting_bill_type,  
            'domain_hosting_bill'  =>   $domain_hosting_bill,  
            'dh_bill_status'       =>   $dh_bill_status,  
            'dh_bill_starting_date'=>   $dh_bill_starting_date,
            'dh_next_bill_date'    =>   $dh_next_bill_date,
            'soft_price'           =>   $soft_price,  
            'installation_charge'  =>   $installation_charge,  
            'service_level_aggre'  =>   $service_level_aggre,  
            'service_level_amount' =>   $service_level_amount,
            'sla_bill_start_date'  =>   $sla_bill_start_date,
            'sla_next_bill_date'   =>   $sla_next_bill_date,
            'sla_bill_status'      =>   $sla_bill_status,
            'client_id'            =>   $client_id, 
        ]);

        if($dbRes){
            return "Success";
        }else{
            return "Faild";
        }
    }



    //update registred product datas
    function onProductUpdate(Request $req){
        $product_id             = $req->input('product_id');
        $business_name          = $req->input('business_name'); 
        $business_address       = $req->input('business_address'); 
        $product_type           = $req->input('product_type'); 
        $product_install_id         = $req->input('product_install_id'); 
        $product_url                = $req->input('product_url'); 
        $product_username           = $req->input('product_username'); 
        $product_password           = $req->input('product_password'); 
        $product_install_date       = $req->input('product_install_date'); 
        $product_rafaral            = $req->input('product_rafaral'); 
        $rafared_agents         = $req->input('rafared_agents'); 
        $agent_id         = $req->input('agent_id');
        $hosted_by              = $req->input('hosted_by'); 
        $domain_by              = $req->input('domain_by'); 
        $domain_hosting_bill_type = $req->input('domain_hosting_bill_type'); 
        $domain_hosting_bill    = $req->input('domain_hosting_bill'); 
        $dh_bill_starting_date  = $req->input('dh_bill_starting_date'); 
        $dh_payment_recived  = $req->input('dh_payment_recived'); 
        
        if ($domain_hosting_bill_type == "monthly") {
            if($dh_payment_recived == 1){
                $dh_next_bill_date = date('Y-m-d', strtotime('+1 month' . $dh_bill_starting_date));
                $dh_bill_status = 1;
            }else{
                $dh_next_bill_date = $dh_bill_starting_date;
                $dh_bill_status = 0;
            }
        } elseif($domain_hosting_bill_type == 'yearly') {
            if ($dh_payment_recived == 1) {
                $dh_next_bill_date = date('Y-m-d', strtotime('+1 year' . $dh_bill_starting_date));
                $dh_bill_status = 1;
            } else {
                $dh_next_bill_date = $dh_bill_starting_date;
                $dh_bill_status = 0;
            }
        }else{
            if ($dh_payment_recived == 1) {
                $dh_next_bill_date = null;
                $dh_bill_status = 1;
            } else {
                $dh_next_bill_date = null;
                $dh_bill_status = 0;
            }
        }
        
        $soft_price             = $req->input('soft_price'); 
        $installation_charge    = $req->input('installation_charge'); 
        $service_level_aggre    = $req->input('service_level_aggre'); 
        $service_level_amount   = $req->input('service_level_amount');
        $sla_bill_start_date    = $req->input('sla_bill_start_date');
        $sla_payment_recived    = $req->input('sla_payment_recived');

        if ($service_level_aggre == "monthly") {
            if($sla_payment_recived == 1){
                $sla_next_bill_date  = date('Y-m-d', strtotime('+1 month ' . $sla_bill_start_date));
                $sla_bill_status = 1;
            }else{
                $sla_next_bill_date = $sla_bill_start_date;
                $sla_bill_status = 0;
            }
        } elseif($service_level_aggre == 'yearly') {
            if ($sla_payment_recived == 1) {
                $sla_next_bill_date  = date('Y-m-d', strtotime('+1 year ' . $sla_bill_start_date));
                $sla_bill_status = 1;
            } else {
                $sla_next_bill_date = $sla_bill_start_date;
                $sla_bill_status = 0;
            }
        }else{
            if ($sla_payment_recived == 1) {
                $sla_next_bill_date  = null;
                $sla_bill_status = 1;
            } else {
                $sla_next_bill_date = null;
                $sla_bill_status = 0;
            }
        }
        $client_id  = $req->input('client_id');


        $dbRes = DB::table('soft_install_per_client')->where('id', '=', $product_id)->update([
            'business_name'        =>   $business_name,  
            'business_address'     =>   $business_address,  
            'product_type'         =>   $product_type,  
            'product_install_id'   =>   $product_install_id,  
            'product_url'          =>   $product_url,  
            'product_username'     =>   $product_username,  
            'product_password'     =>   $product_password,  
            'product_install_date' =>   $product_install_date,  
            'product_rafaral'      =>   $product_rafaral,  
            'rafared_agents'       =>   $rafared_agents,  
            'agent_id'             =>   $agent_id,  
            'hosted_by'            =>   $hosted_by,  
            'domain_by'            =>   $domain_by,  
            'domain_hosting_bill_type'  =>   $domain_hosting_bill_type,  
            'domain_hosting_bill'  =>   $domain_hosting_bill,  
            'dh_bill_status'       =>   $dh_bill_status,  
            'dh_bill_starting_date'=>   $dh_bill_starting_date,
            'dh_next_bill_date'    =>   $dh_next_bill_date,
            'soft_price'           =>   $soft_price,  
            'installation_charge'  =>   $installation_charge,  
            'service_level_aggre'  =>   $service_level_aggre,  
            'service_level_amount' =>   $service_level_amount,
            'sla_bill_start_date'  =>   $sla_bill_start_date,
            'sla_next_bill_date'   =>   $sla_next_bill_date,
            'sla_bill_status'      =>   $sla_bill_status,
        ]);

        if($dbRes){
            return "Success";
        }else{
            return "Faild";
        }
    }

    // show installed apps
    function getInstlledSoft(Request $req){
        $client_id = $req->input('client_id');
        $dbRes = DB::table('soft_install_per_client')->where('client_id' , '=', $client_id)->get();

        if ($dbRes) {
            return $dbRes;
        }else{
            return $dbRes;
        }
    }

    //Get product info by client
    function getproductByClientId($id){
        $dbRes = DB::table('soft_install_per_client')
        ->join('clients', 'soft_install_per_client.client_id', '=', 'clients.id')
        ->select('soft_install_per_client.*', 'clients.client_name', 'clients.client_address', 'clients.contact_number')
        ->where('soft_install_per_client.id', $id)
        ->first();

        if ($dbRes) {
            return view('backend.product_install_details', ['datas' => $dbRes]);
        } else {
            return redirect(url()->previous());
        }
        
    }


    //Delete by id 

    function onProductDelete(Request $req){
        $id = $req->input('product_id');
        $dbres = DB::table('soft_install_per_client')->where('id', '=', $id)->delete();

        if($dbres){
            return $dbres;
        }else{
            return $dbres;
        }
    }
   
}
