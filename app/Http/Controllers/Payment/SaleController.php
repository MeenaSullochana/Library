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

class SaleController extends Controller
{
    public function processSale(Request $request)
    {
        // Set time limit and include necessary files
        set_time_limit(0);
          
        // Initialize Utility class
        $utility = new Utility();

        // Define variables
        $logFilePath = 'sale_log.log';
        $EncKey = config('payment.ENC_KEY');
        $SECURE_SECRET = config('payment.SECURE_SECRET');
        $gatewayURL = config('payment.GATEWAYURL');

        // Get inputs
        $data = $request->post();

        // Manipulate data as needed
        $data['Version'] = config('payment.VERSION');
        $data['PassCode'] = config('payment.PASSCODE');
        $data['BankId'] = config('payment.BANKID');
        $data['MerchantId'] = config('payment.MERCHANTID');
        $data['MCC'] = config('payment.MCC');
        $data['TerminalId'] = config('payment.TERMINALID');
        $data['ReturnURL'] = config('payment.RETURNURL');
        $data['Amount'] = $data['Amount'] * 100;

        // Remove unwanted POST variables
        unset($data["SubButL"]);

        // Sort data on keys
        ksort($data);
        
        // Generate data to post to PG
        $dataToPostToPG = "";
        foreach ($data as $key => $value) {
            if ("" == trim($value) && $value === NULL) {
                continue;
            } else {
                $dataToPostToPG = $dataToPostToPG . $key . "||" . ($value) . "::";
            }
        }

        // Generate Secure hash on parameters
        $SecureHash = $utility->generateSecurehash($data);

        // Append hash and data with ::
        $dataToPostToPG = "SecureHash||" . urlencode($SecureHash) . "::" . $dataToPostToPG;

        // Removing last 2 characters (::)
        $dataToPostToPG = substr($dataToPostToPG, 0, -2);

        // Save request to log
        $dataArray = explode("::", $dataToPostToPG);
        $currentTime = now()->format('d-m-Y H:i:s');
        $logRequest = 'Request:' . "[$currentTime]";
        $logRequest .= json_encode($dataArray);
        $logFile = fopen($logFilePath, 'a');
        fwrite($logFile, $logRequest . PHP_EOL . PHP_EOL);
        fclose($logFile);

        /* Encrypt data with AES */
        $EncData = $utility->encrypt($dataToPostToPG, $EncKey);
        // Pass necessary data to Blade view
        return view('payment.sale', compact('EncData', 'data', 'gatewayURL','amount','user'));
    }
}