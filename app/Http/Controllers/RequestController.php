<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function getRequestFormParts(Request $request){
        $website = 'Сайт:';
        $phoneFieldset = 'Телефон: ';
        $partsFieldset = "Запчасть: ";
        $typeFieldset = 'Тип спецтехники: ';
        $brandFieldset = 'Марка: ';
        $data = [
            $website => 'K700.Asia',
            $phoneFieldset => $request->get('telephone'),
            $partsFieldset => $request->get('parts'),
            $typeFieldset => $request->get('type'),
            $brandFieldset => $request->get('brand')
        ];
        $token = "548373919:AAFagyXtVE0zmuMWUNE9PHsyjR2dBg8DpQ8";
        $chat_id = "-241339519";
        $txt = '';
        foreach($data as $key => $value) {
            $txt .= "<b>".$key."</b> ".$value."%0A";
        };

        //Mail::send('emails.spec', $data, function($message){
           // $message->to('manager@roomix.kz', 'Yuriy')->subject('Заявка с сайта ROOMIX');

       // });
        fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
        return back()->with('message', 'Ваша заявка получена, ожидайте ответа. Спасибо!');

    }
}
