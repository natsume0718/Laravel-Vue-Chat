<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        #chat-area{
           overflow: scroll;
           height:70vh;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row" id="app">
            <div class="offset-4 col-4">
                <li class="list-group-item active">Chat Room</li>
                <ul class="list-group" id="chat-area" v-chat-scroll >
                    <message color='warning' v-for="(value,index) in chat.message" :key="index">@{{ value }}</message>
                </ul>
                <input type="text" class="form-controll" placeholder="メッセージ" v-model="message" v-on:keyup.enter='send'>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js')}}"></script>
</body>

</html>