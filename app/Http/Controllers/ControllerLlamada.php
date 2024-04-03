<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\TwiML\VoiceResponse;

class ControllerLlamada extends Controller
{
    public function Llamada()
    {
        // Credenciales de Twilio
        $accountSid = 'AC3fddd38bdf3da8c894d815d9f010774d';
        $authToken  = '085c3f096b8ef9371016f62956f0c821';

        $toPhoneNumber = '+573134452602'; // Número al que se realizará la llamada
        $fromPhoneNumber = '+12013409616'; // Tu número Twilio

        $twimlUrl = 'http://demo.twilio.com/docs/voice.xml';
        $client = new Client($accountSid, $authToken);

        $call = $client->calls->create(
            $toPhoneNumber,
            $fromPhoneNumber,
            array(
                'url' => $twimlUrl,
                'record' => true // Habilitar la grabación de la llamada
            )
        );

        // Imprimir el SID de la llamada
        echo 'Llamada iniciada con SID: ' . $call->sid;
    }

    // Método para manejar la acción después de que se complete la llamada
    public function callCompleted(Request $request)
    {
        // Acciones a realizar después de que la llamada se haya completado
    }
}
