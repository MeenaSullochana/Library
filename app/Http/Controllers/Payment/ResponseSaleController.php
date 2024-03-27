<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Throwable;
use App\Utilities\Utility;

class ResponseSaleController extends Controller
{
    public function processPaymentResponse(Request $request)
    {

        $utility = new Utility();
        $logFilePath = 'sale_log.log';
        
        $EncKey = config('payment.ENC_KEY');
        $SECURE_SECRET = config('payment.SECURE_SECRET');
        
        
        $EncData=trim($_POST['EncData']);
        $merchantId = trim($_POST['MerchantId']);
        $bankID  = trim($_POST['BankId']);
        $terminalId =  trim($_POST['TerminalId']);
        
        if($bankID=="" && $merchantId=="" && $terminalId=="" && $EncData=="" )
        {
            echo "Invalid data";
            exit();
        }
        if(empty($bankID) && empty($merchantId) && empty($terminalId) && empty($EncData) )
        {
            echo "Invalid data";
            exit();
        }
        
        
        $data=$utility->decrypt($EncData, $EncKey); 
    
        $data=substr($data, 0, -2);
        
        $dataArray=explode("::",$data);
        
        foreach ($dataArray as $key => $value) 
        {
            $valuesplit=explode("||",$value);
            $dataFromPostFromPG[$valuesplit[0]]=urldecode($valuesplit[1]);
        }
        
        // SecureHash got in reply
        $SecureHash=$dataFromPostFromPG['SecureHash'];
                
        //remove SecureHash from data 	
        unset($dataFromPostFromPG['SecureHash']);
                
        //remove null or empty data
        unset($dataFromPostFromPG['']);
                
        //remove null or empty data
        array_filter($dataFromPostFromPG);
                
        //sort data array
        ksort($dataFromPostFromPG);
        
        //Log the response
        $currentTime = date('d-m-Y H:i:s'); // Get current timestamp with date and time
        $logRequest = 'Response:'."[$currentTime]"; // Include timestamp in the log message
        $logRequest .= json_encode($dataFromPostFromPG);
        $logFile = fopen($logFilePath, 'a');
        fwrite($logFile, $logRequest . PHP_EOL.PHP_EOL);
        fclose($logFile); 
        
        $txnRefNo= $utility->null2unknown("TxnRefNo",$dataFromPostFromPG);
        $amount= $utility->null2unknown("Amount",$dataFromPostFromPG);
        $responseCode= $utility->null2unknown("ResponseCode",$dataFromPostFromPG);
        $message= $utility->null2unknown("Message",$dataFromPostFromPG);
        $pgTxnId= $utility->null2unknown("pgTxnId",$dataFromPostFromPG);	
        $SecureHash_final = $utility->generateSecurehash($dataFromPostFromPG);
        
        $hashValidated = 'Invalid Hash';
        if( $SecureHash_final == $SecureHash )
        {
            $hashValidated = 'CORRECT';
        }
        

        // Return the response view with data
        return view('payment.responsesale', [
            'txnRefNo' => $txnRefNo,
            'pgTxnId' => $pgTxnId,
            'amount' => $amount,
            'responseCode' => $responseCode,
            'message' => $message,
            'hashValidated' => $hashValidated,
            'dataFromPostFromPG' => $dataFromPostFromPG,
        ]);
    }

}