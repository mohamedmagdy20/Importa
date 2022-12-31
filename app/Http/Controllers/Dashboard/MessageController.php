<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class MessageController extends Controller
{
    //

    // public function startConversation($phone)
    // {
    //     $responce = Http::withHeaders([
    //         'Authorization'=> 'Bearer '.config('app.message_key'),
    //         'Content-Type'=> 'application/json'   
    //     ])
    //     ->post('https://graph.facebook.com/v15.0/107666535538603/messages',[
    //         "messaging_product"=> "whatsapp",
    //         "to"=> $phone,
    //         "type"=> "template",
    //         "template"=> (object) [ 
    //             "name"=> "hello_world",
    //             "language" => (object)[ "code"=> "en_US" ]
    //         ]
    //         ]);
    //     return response()->json($responce->body());
  
    // }
    
        public function startConversation($phone)
        {
            $responce = Http::withHeaders([
                'Authorization'=> 'Bearer '.config('app.message_key'),
                'Content-Type'=> 'application/json'   
            ])
            ->post('https://graph.facebook.com/v15.0/107666535538603/messages',
        [
            "messaging_product"=> "whatsapp",
            "to"=> $phone,
            "type"=> "template",
            "template"=> (object) [
               "name"=> "sample_shipping_confirmation",
               "language"=> (object) [
                   "code"=> "en_US",
                   "policy"=> "deterministic"
               ],
               "components"=> [
                 (object)[
                   "type"=> "body",
                   "parameters"=> [
                       (object)[
                           "type"=> "text",
                           "text"=>"the REL WareHouse .... Please Reply to Message with 'Done' and we will Send Details of Storing in 1"
                       ]
                   ]
                 ]
               ]
            ]
        ]);
            return response()->json($responce->body());
    
        }

    
    public function sendingWhatsAppMessage($phone,$message)
    {
        $responce = Http::withHeaders([
            'Authorization'=> 'Bearer '.config('app.message_key'),
            'Content-Type'=> 'application/json' 
        ])
        ->post('https://graph.facebook.com/v15.0/107666535538603/messages',
        [
            "messaging_product" => "whatsapp",
            "recipient_type" => "individual",
            "to" => $phone,
            "type" => "text",
            "text" => (object) [
                "preview_url" => false,
                "body" => $message
            ]

        ]);

        return response()->json($responce->body());
    }

    // public function read()
    // {
    //     $responce = Http::withHeaders([
    //         'Authorization'=> 'Bearer EAANJRZC64uDsBAOh8rgkXQpDbG7t8YZC6zPFeO3RUmnM7Uea34OSAZCk5aLbCfg6GAaCsoPN4ZCUqfZAHCAtpj6JgzxJE8DngNwoYyl4kksF4yymlakfCdZCbgVhz3YRV1YUBZB8texb4HpvdHGRCyAEKH9WAOp3THTFDXRCq3a0KXhSjTByn9hvHP86MkoqHQsgy9fzibfVwZDZD',
    //         'Content-Type'=> 'application/json' 
    //     ])
    //     ->post('https://graph.facebook.com/v15.0/111476201818585/messages',
    //     [
    //         "messaging_product" => "whatsapp",
    //         "status"=> "read",
    //         "message_id"=> "wamid.HBgMMjAxMDY2MDE4MzQwFQIAERgSMjI5RjlEOUZDMEFDOEQxRDE0AA=="
              
    //     ]);

    //     return response()->json($responce->body());
    // }
}

