
<!DOCTYPE html>

<html>

<head>

    <title>ChatGPT Demo</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        .chat-container {

            max-width: 800px;

            margin: 50px auto;

            padding: 20px;

        }

        .chat-box {

            height: 400px;

            border: 1px solid #ccc;

            overflow-y: auto;

            padding: 20px;

            margin-bottom: 20px;

            background-color: #fff;

            border-radius: 8px;

            box-shadow: 0 2px 4px rgba(0,0,0,0.1);

        }

        .message {

            margin-bottom: 10px;

            padding: 10px;

            border-radius: 5px;

            max-width: 80%;

        }

        .user-message {

            background-color: #007bff;

            color: white;

            margin-left: auto;

            border-radius: 15px 15px 0 15px;

        }

        .bot-message {

            background-color: #f8f9fa;

            margin-right: auto;

            border-radius: 15px 15px 15px 0;

        }

        .input-group {

            display: flex;

            gap: 10px;

        }

        #messageInput {

            flex-grow: 1;

            padding: 10px;

            border: 1px solid #ddd;

            border-radius: 5px;

            font-size: 16px;

        }

        button {

            padding: 10px 20px;

            background-color: #007bff;

            color: white;

            border: none;

            border-radius: 5px;

            cursor: pointer;

        }

        button:hover {

            background-color: #0056b3;

        }

        .loading {

            text-align: center;

            margin: 10px 0;

            color: #666;

        }

    </style>

</head>

<body class="bg-light">

    <div class="chat-container">

        <h2 class="text-center mb-4">ChatGPT Demo</h2>

        <div class="chat-box" id="chatBox"></div>

        <div class="input-group">

            <input type="text" id="messageInput" class="form-control" 

                   placeholder="메시지를 입력하세요..." autocomplete="off">

            <button onclick="sendMessage()" class="btn btn-primary">전송</button>

        </div>

    </div>



    <script>

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });



        function sendMessage() {

            const message = $('#messageInput').val();

            if (!message) return;



            // 사용자 메시지 표시

            $('#chatBox').append(`<div class="message user-message">${message}</div>`);

            $('#messageInput').val('');



            // 로딩 표시

            const loadingDiv = $('<div class="loading">응답을 기다리는 중...</div>');

            $('#chatBox').append(loadingDiv);

            $('#chatBox').scrollTop($('#chatBox')[0].scrollHeight);



            // API 호출

            $.ajax({

                url: '/chat',

                method: 'POST',

                data: { message: message },

                success: function(response) {

                    loadingDiv.remove();

                    $('#chatBox').append(`<div class="message bot-message">${response.message}</div>`);

                    $('#chatBox').scrollTop($('#chatBox')[0].scrollHeight);

                },

                error: function(xhr) {

                    loadingDiv.remove();

                    console.log('Error:', xhr.responseJSON);

                    $('#chatBox').append(`<div class="message bot-message error">

                        오류가 발생했습니다: ${xhr.responseJSON?.message || '알 수 없는 오류'}

                    </div>`);

                    $('#chatBox').scrollTop($('#chatBox')[0].scrollHeight);

                }

            });

        }



        // Enter 키 이벤트

        $('#messageInput').keypress(function(e) {

            if (e.which == 13) {

                sendMessage();

            }

        });

    </script>

</body>

</html>
