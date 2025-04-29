<?php



namespace App\Http\Controllers;



use OpenAI\Laravel\Facades\OpenAI;

use Illuminate\Http\Request;



class ChatController extends Controller

{

    public function index()

    {

        return view('chat');

    }



    public function ask(Request $request)

    {

        try {

            $result = OpenAI::chat()->create([

                'model' => 'gpt-3.5-turbo',

                'messages' => [

                    [

                        'role' => 'system',

                        'content' => '당신은 도움이 되는 AI 어시스턴트입니다.'

                    ],

                    [

                        'role' => 'user',

                        'content' => $request->input('message')

                    ]

                ],

                'temperature' => 0.7,

            ]);



            return response()->json([

                'message' => $result->choices[0]->message->content

            ]);

        } catch (\Exception $e) {

            \Log::error('OpenAI Error: ' . $e->getMessage());

            return response()->json([

                'message' => '오류가 발생했습니다: ' . $e->getMessage()

            ], 500);

        }

    }

}


