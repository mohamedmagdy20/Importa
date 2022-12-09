<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Channels\Messages\WhatsAppMessage;
use App\Channels\WhatsAppChannel;
use App\Models\Transportation;
class VerifiyTransportation extends Notification
{
      use Queueable;


    public $transport;
    
    public function __construct(Transportation $transport)
    {
         $this->transport = $transport;
    }

    public function via($notifiable)
    {
      return [WhatsAppChannel::class];
    }

    public function toWhatsApp($notifiable)
    {
      $company = 'REL';
      $container_num = $this->transport->container->container_num;

      return (new WhatsAppMessage)
          ->content("تم تخزين الحاويه رقم {$container_num} من قيل شركه {$company} برجاء تاكيد الاستلام");
    }
}   
