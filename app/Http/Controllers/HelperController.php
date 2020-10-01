<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Osiset\BasicShopifyAPI\BasicShopifyAPI;
use Osiset\BasicShopifyAPI\Options;
use Osiset\BasicShopifyAPI\Session;
use App\User;

class HelperController extends Controller
{
    public static function config() {

        // Create options for the API
        $options = new Options();
        //  $options->setType(true); // Makes it private
        $options->setVersion('2020-07');
        $options->setApiKey(env('SHOPIFY_API_KEY'));
        $options->setApiSecret(env('SHOPIFY_API_SECRET'));

        $domain = "otc-shoppe-express.myshopify.com";



        // Create the client and session
        $api = new BasicShopifyAPI($options);
        // $api->setSession(new Session("pixastudio.myshopify.com"));
        $shop = User::where('name', $domain)->first();
        $api->setSession(new Session($domain, $shop->password));

        return $api;


    }
}
