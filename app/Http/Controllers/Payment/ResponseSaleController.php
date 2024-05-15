<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\PaymentBook;
use App\Models\PeriodicalDistributor;
use App\Models\PeriodicalPublisher;
use App\Models\Magazine;
use Illuminate\Support\Facades\Validator;
use Throwable;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Distributor;
use App\Models\PublisherDistributor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Procurementpaymrnt;
use App\Models\Notifications;
use App\Models\Admin;
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
        $SecureHash_final = $utility->generateSecurehash($dataFromPostFromPG);
        $txnRefNo= $utility->null2unknown("TxnRefNo",$dataFromPostFromPG);
        $amount= $utility->null2unknown("Amount",$dataFromPostFromPG);
        $responseCode= $utility->null2unknown("ResponseCode",$dataFromPostFromPG);
        $message= $utility->null2unknown("Message",$dataFromPostFromPG);
        $pgTxnId= $utility->null2unknown("pgTxnId",$dataFromPostFromPG);
        $usertype= $utility->null2unknown("UDF01",$dataFromPostFromPG);	
        $email= $utility->null2unknown("UDF02",$dataFromPostFromPG);	
        $password= $utility->null2unknown("UDF03",$dataFromPostFromPG);	
        $bookitem1= $utility->null2unknown("UDF04",$dataFromPostFromPG);	
        $Currency= $utility->null2unknown("Currency",$dataFromPostFromPG);	
        $CardNum= $utility->null2unknown("CardNum",$dataFromPostFromPG);	
        $PaymentOption= $utility->null2unknown("PaymentOption",$dataFromPostFromPG);	
        $TerminalId= $utility->null2unknown("TerminalId",$dataFromPostFromPG);		
        $authcode=$utility->null2unknown("AuthCode",$dataFromPostFromPG);
        $authstatus=$utility->null2unknown("AuthStatus",$dataFromPostFromPG);
        $bankid=$utility->null2unknown("BankId",$dataFromPostFromPG);
        $cavv=$utility->null2unknown("CAVV",$dataFromPostFromPG);
        $cardnum=$utility->null2unknown("CardNum",$dataFromPostFromPG);
        $currency=$utility->null2unknown("Currency",$dataFromPostFromPG);
        $enrolled=$utility->null2unknown("ENROLLED",$dataFromPostFromPG);
        $mcc=$utility->null2unknown("MCC",$dataFromPostFromPG);
        $maskedcardnumber=$utility->null2unknown("MaskedCardNumber",$dataFromPostFromPG);
        $merchantid=$utility->null2unknown("MerchantId",$dataFromPostFromPG);
        $message=$utility->null2unknown("Message",$dataFromPostFromPG);
        $passcode=$utility->null2unknown("PassCode",$dataFromPostFromPG);
        $responsecode=$utility->null2unknown("ResponseCode",$dataFromPostFromPG);
        $retrefno=$utility->null2unknown("RetRefNo",$dataFromPostFromPG);
        $txnrefno=$utility->null2unknown("TxnRefNo",$dataFromPostFromPG);
        $ucap=$utility->null2unknown("UCAP",$dataFromPostFromPG);
        $payopt=$utility->null2unknown("payOpt",$dataFromPostFromPG);
        $pgtxnid=$utility->null2unknown("pgTxnId",$dataFromPostFromPG);
        $paymentstatus=$utility->null2unknown("pgTxnId",$dataFromPostFromPG);

        $hashValidated = 'Invalid Hash';
        if( $SecureHash_final == $SecureHash )
        {
            $hashValidated = 'CORRECT';
        }

        $bookdata = PaymentBook::find($bookitem1);
        $type = $bookdata->type;
        $bookitem = $bookdata->bookId;
     if($type == "Book"){
        if($usertype == "publisher"){
            $user = Publisher::where('email',$email)->first();
           
            if ($user) {
                if ($password == $user->password) {
                    Auth::guard('publisher')->login($user);
                }
            }
            $url = "/publisher/index";
      
     }else if($usertype == "distributor"){
       
        $user = Distributor::where('email',$email)->first();
         
        if ($user) {
            if ($password == $user->password) {
                Auth::guard('distributor')->login($user);
            }
        }
        $url = "/distributor/index";
     }else{
        $user = PublisherDistributor::where('email',$email)->first();
         
        if ($user) {
            if ($password == $user->password) {
                Auth::guard('publisher_distributor')->login($user);
            }
        }
        $url = "/publisher_and_distributor/index";
     }
     }else if($type == "Periodical"){
        if($usertype == "publisher"){
            $user = PeriodicalPublisher::where('email',$email)->first();
           
            if ($user) {
                if ($password == $user->password) {
                    Auth::guard('periodical_publisher')->login($user);
                }
            }
            $url = "/periodical_publisher/index";
      
     }else if($usertype == "distributor"){
       
        $user = PeriodicalDistributor::where('email',$email)->first();
         
        if ($user) {
            if ($password == $user->password) {
                Auth::guard('periodical_distributor')->login($user);
            }
        }
        $url = "/periodical_distributor/index";
     }
     }
        
   
       if ($hashValidated == 'CORRECT' && $responseCode == 'CAN'){
                    $route = 'payment.cancel';
                    $paymentstatus = 'Cancel';
                    $paidstatus = 2;
        }else if($hashValidated == 'CORRECT' && $responseCode == '00'){
            $route = 'payment.success';
              $paymentstatus = 'Success';
              $paidstatus = 1;
        }else{
            $route = 'payment.failure';
              $paymentstatus = 'Failed';
              $paidstatus = 3;
        }

     

        $pay = New Procurementpaymrnt();
        $pay->bookId =$bookitem;
        $pay->userId = $user->id;
        $pay->type = $type;
        $pay->amount = "450";
        $pay->totalAmount =  $amount/100;
        $pay->userType =  $usertype;
        $pay->userName = $user->firstName . ' ' . $user->lastName ;
        $pay->paymentType = $PaymentOption;
        $randomCode = str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT);
        $pay->invoiceNumber =       $randomCode ;
        $pay->authcode=$authcode;
        $pay->authstatus=$authstatus;
        $pay->bankid=        $bankid;
        $pay->cavv=        $cavv;
        $pay->cardnum=        $cardnum;
        $pay->currency=        $currency;
        $pay->enrolled=        $enrolled;
        $pay->mcc=        $mcc;
        $pay->maskedcardnumber=        $maskedcardnumber;
        $pay->merchantid=        $merchantid;
        $pay->message=        $message;
        $pay->passcode=        $passcode;
        $pay->responsecode=        $responsecode;
        $pay->retrefno=        $retrefno;
        $pay->terminalid=        $TerminalId;
        $pay->txnrefno=        $txnrefno;
        $pay->ucap=        $ucap;
        $pay->payopt=        $payopt;
        $pay->pgtxnid=        $pgtxnid;
        $pay->paymentstatus=        $paymentstatus;
        $pay->paidstatus=        $paidstatus;
        $pay->save();
   if($type == "Book"){
    if($paymentstatus == "Success"){
        $record = json_decode($bookitem);
        foreach($record as $val){
        $data1=Book::where('user_id','=',$user->id)->where('id','=',$val)->first();
 
        $data1->book_procurement_status = "5";
        $data1->save();
        }
       
        $notifi= new Notifications();
        $admin=Admin::first();
 
        $notifi->message = "Book Applied For Procurement";
        $notifi->to= $admin->id;
        $notifi->from=$user->id;
        $notifi->type=$usertype;
        $notifi->save();
    }
   }else if($type == "Periodical"){
    if($paymentstatus == "Success"){
        $record = json_decode($bookitem);
        foreach($record as $val){
        $data1=Magazine::where('user_id','=',$user->id)->where('id','=',$val)->first();
 
        $data1->periodical_procurement_status = "5";
        $data1->save();
        }
       
        $notifi= new Notifications();
        $admin=Admin::first();
 
        $notifi->message = "Periodical Applied For Procurement";
        $notifi->to= $admin->id;
        $notifi->from=$user->id;
        $notifi->type=$usertype;
        $notifi->save();
    }
   }
        
       

        // Return the response view with data
        return view($route, [
            'txnRefNo' => $txnRefNo,
            'pgTxnId' => $pgTxnId,
            'amount' => $amount,
            'responseCode' => $responseCode,
            'message' => $message,
            'hashValidated' => $hashValidated,
            'dataFromPostFromPG' => $dataFromPostFromPG,
            'usertype'=>$usertype,
            'email'=>$email,
            'password'=>$password,
            'currency'=>$Currency,
            'CardNum'=>$CardNum,
            'PaymentOption'=>$PaymentOption,
            'TerminalId'=>$TerminalId,
            'url'=>$url,
            'bookitem'=>$bookitem
        ]);
    }

}