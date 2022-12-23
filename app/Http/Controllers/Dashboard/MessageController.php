<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class MessageController extends Controller
{
    //
    public function sendingWhatsAppMessage($phone,$message)
    {
        $responce = Http::withHeaders([
            'Authorization'=> 'Bearer EAANJRZC64uDsBAMWgLAknixwOU1KGnF57kCOjaWnfFi1I93TQbqshuAf73F56ZBwuREzRxrQ96OUnKkXi2SC9urYNby4m5RcjgCdMYDrN77icMSRP6CMZAZBDNLBljC5aN1T0TG3uWeVZAPFtg1oEC8uivxlgYrxUY4aRm1yHO054S204ey0PsrVaLDROjZBd1hsnaU0aFXgZDZD',
            'Content-Type'=> 'application/json' 
        ])
        ->post('https://graph.facebook.com/v15.0/111476201818585/messages',
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

