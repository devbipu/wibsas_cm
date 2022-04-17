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

    // change-payment-status on payment
    function onDHPayChange(Request $res){
        $inspayStatus = $res->input('DHpayStatus');
        $installId = $res->input('softInsId');
        $columnName = $res->input('changeColumenName');
        $currentBillingDate = $res->input('currentBillingDate');
        $bill_renew_type = $res->input('bill_renew_type');
        $next_bill_column_name = $res->input('next_bill_column_name');
        $billFor = $res->input('billFor');

        //Monthly or Yearly payment
        if($bill_renew_type == "monthly"){
            $dbres = DB::table('soft_install_per_client')->where('id', '=', $installId)
            ->update(
                [
                    $next_bill_column_name => date('Y-m-d', strtotime('+1 month' . $currentBillingDate)),
                    $columnName => $inspayStatus
                ]
            );
        }elseif($bill_renew_type == "yearly"){
            $dbres = DB::table('soft_install_per_client')->where('id', '=', $installId)
            ->update(
                [
                    $next_bill_column_name => date('Y-m-d', strtotime('+1 year' . $currentBillingDate)),
                    $columnName => $inspayStatus
                ]
            );
        }else{
            $dbres = DB::table('soft_install_per_client')->where('id', '=', $installId)
            ->update(
                [
                    $columnName => $inspayStatus
                ]
            );
        }


        if($billFor == 'dhBill'){
            $this->insertIntoBillDhTable($installId, $currentBillingDate);
        }elseif($billFor == 'slaBill'){
            $this->insertIntoBillTable($installId, $currentBillingDate);
        }
        

        if ($dbres) {
            return $dbres;
        } else {
            return 0;
        }        
    }


    // Insert data into Billing table

    // function showQueryData($id){
    //     $this->insertIntoBillTable($id);
    // }

    function insertIntoBillTable($id, $currentBillingDate){
        $datas = DB::table('soft_install_per_client')
        ->join('clients', 'soft_install_per_client.client_id', 
            '=', 'clients.id')
        ->select('soft_install_per_client.*', 'clients.client_name', 'clients.contact_number', 'clients.client_address')
        ->where('soft_install_per_client.id', '=', $id)->first();

        $insetIntoBillingTable = DB::table('all_billing')->insert([
            'client_id' => $datas->client_id,
            'software_install_id' => $datas->id,
            'bill_gen_date' => $currentBillingDate,
            'bill_pay_date' => date('Y-m-d'),
            'bill_type'         => $datas->service_level_aggre,
            'bill_amount'       => $datas->service_level_amount,
            'bill_status'       => 1
        ]);

        if ($insetIntoBillingTable) {
            return $insetIntoBillingTable;
        } else {
            return $insetIntoBillingTable;
        }  
    }


    //Insert into dh bill table
    function insertIntoBillDhTable($id, $currentBillingDate){
        $datas = DB::table('soft_install_per_client')
        ->join('clients', 'soft_install_per_client.client_id', 
            '=', 'clients.id')
        ->select('soft_install_per_client.*', 'clients.client_name', 'clients.contact_number', 'clients.client_address')
        ->where('soft_install_per_client.id', '=', $id)->first();

        $insetIntoBillingTable = DB::table('dh_bill_report')->insert([
            'client_id'             => $datas->client_id,
            'software_install_id'   => $datas->id,
            'bill_gen_date'         => $currentBillingDate,
            'bill_pay_date'         => date('Y-m-d'),
            'bill_type'             => $datas->service_level_aggre,
            'bill_amount'           => $datas->service_level_amount,
            'bill_status'           => 1
        ]);

        if ($insetIntoBillingTable) {
            return $insetIntoBillingTable;
        } else {
            return $insetIntoBillingTable;
        }  
    }









    // Check payment status and set unpaid if date over
    function checkPayStatus(){
        $nextPayDate = DB::table('soft_install_per_client')->get(['sla_next_bill_date'])->toArray();
        $currentDate = date('Y-m-d');
        // $currentDate = '2022-04-15';


        foreach($nextPayDate as $payDate){
           
            if($payDate->sla_next_bill_date < $currentDate){
                $changeStatus = DB::table('soft_install_per_client')
                ->where('sla_next_bill_date', '<', $currentDate)
                ->update(['sla_bill_status' => 0]);
            }
        }

        //For Domain & Hosting bill

        $nextDHBillPayDate = DB::table('soft_install_per_client')->get(['dh_next_bill_date'])->toArray();
        foreach($nextDHBillPayDate as $dhBpayDate){
            if($dhBpayDate->dh_next_bill_date < $currentDate){
                $changeStatus = DB::table('soft_install_per_client')
                ->where('dh_next_bill_date', '<', $currentDate)
                ->update(['dh_bill_status' => 0]);
            }
        }
    }




    //billing report show
    function billReportShow(){
        $dbres = DB::table('all_billing')
        ->join('soft_install_per_client', 'all_billing.software_install_id', '=', 'soft_install_per_client.id')
        ->join('clients', 'all_billing.client_id', '=', 'clients.id')
        ->select('all_billing.*', 'clients.client_name', 'clients.contact_number', 'clients.client_address', 'soft_install_per_client.business_name')
        ->get();


        if($dbres){
            return view('backend.report.billreport', ['allBilling' => $dbres]);
        }else{
            return view('backend.report.billreport');
        }
    }

    //billing report show
    function dhBillReport(){
        $dbres = DB::table('dh_bill_report')
        ->join('soft_install_per_client', 'dh_bill_report.software_install_id', '=', 'soft_install_per_client.id')
        ->join('clients', 'dh_bill_report.client_id', '=', 'clients.id')
        ->select('dh_bill_report.*', 'clients.client_name', 'clients.contact_number', 'clients.client_address', 'soft_install_per_client.business_name')
        ->get();


        if($dbres){
            return view('backend.report.dh_billreport', ['dhBilles' => $dbres]);
        }else{
            return view('backend.report.dh_billreport');
        }
    }

}
