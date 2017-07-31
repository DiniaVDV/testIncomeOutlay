<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleXMLElement;

class CurrencyController extends Controller
{
    public function getCurrency()
    {
        $url = "https://api.privatbank.ua/p24api/pubinfo?exchange&coursid=5";
        $curl = curl_init($url);
        if( $curl ){
            curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
            $page = curl_exec($curl);
            curl_close($curl);
            unset($curl);
            $xml = new SimpleXMLElement($page);
            return $xml->row[2]->exchangerate['sale'][0];
        }else{
			return 1;
		}
    }
}
