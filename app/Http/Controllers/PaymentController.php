<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function doPayment()
    {
        /* Fetching all the testing credentials from .env file
         * payu_key,payu_salt etc
         */
        $payukey = env('PAYU_KEY');
        $payusalt = env('PAYU_SALT');
        $success_url = env('SUCCESS_URL');
        $failure_url = env('FAILURE_URL');

        $transactionId = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
        $action = env('PAYMENT_URL');
        $amount = 50;
        $firstname = 'kanak';
        $email = 'kanakmanjari@gmail.com';
        $phone = 8010292168;
        $productinfo = 'abc';



         /* hash is required to generate for validation of authenticity of data
          * function is made at bottom
          */
        $hash = $this->generateHash($payukey, $transactionId, $amount , $productinfo , $firstname, $email , $payusalt);

        /*redirecting to blade with all the values in a sequence required
         * with hash
         */
        return view('sendToGateway')->with('salt', $payusalt)->with('action', $action)->with('key', $payukey)
            ->with('txnid', $transactionId)->with('amount', $amount)->with('productinfo' , $productinfo)
            ->with('firstname', $firstname)-> with('email', $email)-> with('phone', $phone)
            ->with('surl', $success_url)->with('furl', $failure_url)->with('hash', $hash);

    }

    public function generateHash($payukey, $transactionId, $amount , $productinfo , $firstname, $email , $payusalt)
    {
        $hash_string = '';
        $hash_string .= $payukey . '|';
        $hash_string .= $transactionId . '|';
        $hash_string .= $amount . '|';
        $hash_string .= $productinfo . '|';
        $hash_string .= $firstname . '|';
        $hash_string .= $email . '|';
        $hash_string .= '||||||||||';
        $hash_string .= $payusalt;
        $hash = strtolower(hash('sha512', $hash_string));
        return $hash;


    }
}
