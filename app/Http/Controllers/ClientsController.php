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
        ]);
    }

}
