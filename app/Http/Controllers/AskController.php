<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Orhanerday\OpenAi\OpenAi;
class AskController extends Controller
{
    public function __invoke(Request $request)
    {
        $open_ai = new OpenAi(env('OPENAI_API_KEY'));
        $opts = [
            'prompt' => "write me job description for 'Laravel programmist' in russian",
            'temperature' => 0.9,
            "max_tokens" => 150,
            "frequency_penalty" => 0,
            "presence_penalty" => 0.6,
            "stream" => true,
         ];
         
         header('Content-type: text/event-stream');
         header('Cache-Control: no-cache');
         
         $open_ai->completion($opts, function ($curl_info, $data) {
            echo "event: update\n";
            echo $data. "<br><br>";
            echo PHP_EOL;
            ob_flush();
            flush();
            return strlen($data);
         });
        
    }
}
