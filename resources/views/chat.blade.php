<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chatstyle.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script>
        window.GlobalInfo = {!! json_encode([
            'csrfToken'=> csrf_token(),
            'user'=> [
                'authenticated' => Auth::check(),
                'id' => Auth::check() ? Auth::id() : null,
                'name' => Auth::check() ? Auth::user()->name : null, 
                ]
            ])
        !!};
    </script>
</head>

<body>
    @include('layouts.header')
    <div class="d-flex justify-content-center container-fluid h-100" id="app">
        <div class="col-md-8 col-xl-6 chat">
            <div class="card" v-chat-scroll>
                <div class="card-body msg_card_body">
                    <message v-for="(value,index) in chat.message" :user=chat.user[index] :time=chat.time[index]
                        :key="value.index">@{{ value }}</message>
                </div>
                <div class="card-footer">
                    <div class="input-group">
                        <div class="input-group-append">
                            <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                        </div>
                        <input type="text" name="" class="form-control type_msg" placeholder="メッセージ" v-model="message">
                        <div class="input-group-append">
                            <span class="input-group-text send_btn"><i class="fas fa-location-arrow" v-on:click="send"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>