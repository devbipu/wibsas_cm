<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // show agents
    function onshowAgentPage(){
        return view('backend.agents.agents');
    }


    //Add agents
    function onAgentAdd(Request $request){
        $agent_name = $request->input('agent_name');
        $agent_number = $request->input('agent_number');
        $alter_contact = $request->input('alter_contact');
        $agent_email = $request->input('agent_email');
        $agent_address = $request->input('agent_address');
        
        $dbins =  DB::table('agents')->insert([
            'agent_name' => $agent_name,
            'agent_number' => $agent_number,
            'alter_contact' => $alter_contact,
            'agent_email' => $agent_email,
            'agent_address' => $agent_address,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        if($dbins){
            return 1;
        }else{
            return 0;
        }
    }

    function onAgentShow(){
        $allC = DB::table('agents')->latest('id')->get();

        if($allC){
            return $allC;
        }else{
            return 0;
        }
    }

    function getAllAgents(){
        $allC = DB::table('agents')->latest('id')->get();
        
        if($allC){
            return $allC;
        }else{
            return 0;
        }
    }
}
