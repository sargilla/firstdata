<?php

namespace Sargilla\Firstdata;

use Carbon\Carbon;

class Firstdata
{

    public $dateTime;

    public function __construct()
    {
        $this->dateTime = Carbon::now()->format("Y:m:d-H:i:s");
    }

    public function getDateTime(){
        return $this->dateTime;
    }

    public function createExtendedHash($chargetotal, $currency, $invoice) {
        // dd(config('firstdata.store_id'));
        $arrayToHash = [
            $chargetotal,
            $currency,
            'HMACSHA256',
            $invoice,
            'payonly',
            'M',
            config('firstdata.response_failure'),
            config('firstdata.response_success'),
            config('firstdata.store_id') ,
            config('firstdata.timezone'),
            config('firstdata.response_notification'),
            $this->getDateTime(),
            'sale'
        ];
        $stringToHash = implode('|',$arrayToHash);
        $hashSHA256 = hash_hmac('sha256',$stringToHash,config('firstdata.shared_secret'),true);
        $extHash = base64_encode($hashSHA256);
        return $extHash;
    }
}
