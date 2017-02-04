<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>
    <style type="text/css">

        * {
            box-sizing: border-box;
        }

        body {
            background-color: #edeff2;
            font-family: "Calibri", "Roboto", sans-serif;
        }

        .chat_window {
            position: absolute;
            width: calc(100% - 20px);
            max-width: 800px;
            height: 500px;
            border-radius: 10px;
            background-color: #fff;
            left: 50%;
            top: 50%;
            transform: translateX(-50%) translateY(-50%);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            background-color: #f8f8f8;
            overflow: hidden;
        }

        .top_menu {
            background-color: #fff;
            width: 100%;
            padding: 20px 0 15px;
            box-shadow: 0 1px 30px rgba(0, 0, 0, 0.1);
        }

        .top_menu .buttons {
            margin: 3px 0 0 20px;
            position: absolute;
        }

        .top_menu .buttons .button {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 10px;
            position: relative;
        }

        .top_menu .buttons .button.close {
            background-color: #f5886e;
        }

        .top_menu .buttons .button.minimize {
            background-color: #fdbf68;
        }

        .top_menu .buttons .button.maximize {
            background-color: #a3d063;
        }

        .top_menu .title {
            text-align: center;
            color: #bcbdc0;
            font-size: 20px;
        }

        .messages {
            position: relative;
            list-style: none;
            padding: 20px 10px 0 10px;
            margin: 0;
            height: 347px;
            overflow: scroll;
        }

        .messages .message {
            clear: both;
            overflow: hidden;
            margin-bottom: 20px;
            transition: all 0.5s linear;
            opacity: 0;
        }

        .messages .message.left .avatar {
            background-color: #f5886e;
            float: left;
        }

        .messages .message.left .text_wrapper {
            background-color: #ffe6cb;
            margin-left: 20px;
        }

        .messages .message.left .text_wrapper::after, .messages .message.left .text_wrapper::before {
            right: 100%;
            border-right-color: #ffe6cb;
        }

        .messages .message.left .text {
            color: #c48843;
        }

        .messages .message.right .avatar {
            background-color: #fdbf68;
            float: right;
        }

        .messages .message.right .text_wrapper {
            background-color: #c7eafc;
            margin-right: 20px;
            float: right;
        }

        .messages .message.right .text_wrapper::after, .messages .message.right .text_wrapper::before {
            left: 100%;
            border-left-color: #c7eafc;
        }

        .messages .message.right .text {
            color: #45829b;
        }

        .messages .message.appeared {
            opacity: 1;
        }

        .messages .message .avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: inline-block;
        }

        .messages .message .text_wrapper {
            display: inline-block;
            padding: 20px;
            border-radius: 6px;
            width: calc(100% - 85px);
            min-width: 100px;
            position: relative;
        }

        .messages .message .text_wrapper::after, .messages .message .text_wrapper:before {
            top: 18px;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
        }

        .messages .message .text_wrapper::after {
            border-width: 13px;
            margin-top: 0px;
        }

        .messages .message .text_wrapper::before {
            border-width: 15px;
            margin-top: -2px;
        }

        .messages .message .text_wrapper .text {
            font-size: 18px;
            font-weight: 300;
        }

        .bottom_wrapper {
            position: relative;
            width: 100%;
            background-color: #fff;
            padding: 20px 20px;
            position: absolute;
            bottom: 0;
        }

        .bottom_wrapper .message_input_wrapper {
            display: inline-block;
            height: 50px;
            border-radius: 25px;
            border: 1px solid #bcbdc0;
            width: calc(100% - 160px);
            position: relative;
            padding: 0 20px;
        }

        .bottom_wrapper .message_input_wrapper .message_input {
            border: none;
            height: 100%;
            box-sizing: border-box;
            width: calc(100% - 40px);
            position: absolute;
            outline-width: 0;
            color: gray;
        }

        .bottom_wrapper .send_message {
            width: 140px;
            height: 50px;
            display: inline-block;
            border-radius: 50px;
            background-color: #a3d063;
            border: 2px solid #a3d063;
            color: #fff;
            cursor: pointer;
            transition: all 0.2s linear;
            text-align: center;
            float: right;
        }

        .bottom_wrapper .send_message:hover {
            color: #a3d063;
            background-color: #fff;
        }

        .bottom_wrapper .send_message .text {
            font-size: 18px;
            font-weight: 300;
            display: inline-block;
            line-height: 48px;
        }

        .message_template {
            display: none;
        }
    </style>
    <style>

        .chat-wraper {
            min-height: 300px;
            border: 1px solid #b8b8b8;
        }

        .form {
            background: #000;
            padding: 3px;
            bottom: 0;
            width: 100%;
        }

        .form input {
            border: 0;
            padding: 10px;
            width: 90%;
            margin-right: .5%;
        }

        .form button {
            width: 9%;
            background: rgb(130, 224, 255);
            border: none;
            padding: 10px;
        }

        #messages {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        #messages li {
            padding: 5px 10px;
        }

        #messages li:nth-child(odd) {
            background: #eee;
        }
    </style>
</head>
<body>

<div class="chat_window">
    <div class="top_menu">
        <div class="buttons">
            <div class="button close"></div>
            <div class="button minimize"></div>
            <div class="button maximize"></div>
        </div>
        <div class="title">Chat</div>
    </div>
    <ul class="messages" id="messages">

    </ul>
    <div class="bottom_wrapper clearfix">
        <div class="message_input_wrapper">
            <input class="message_input" placeholder="Type your message here..."/>
        </div>
        <button class="send_message">
            <div class="icon"></div>
            <div class="text">Send</div>
        </button>
    </div>
</div>
<div class="message_template">
    <li class="message">
        <div class="avatar"></div>
        <div class="text_wrapper">
            <div class="text">sss</div>
        </div>
    </li>
</div>
<p class="footer">Page rendered in <strong>0.0121</strong> seconds. CodeIgniter Version <strong>3.1.2</strong></p>

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://cdn.socket.io/socket.io-1.4.0.js"></script>
<script>

    var person = "Person";
    var socket = io.connect("http://" + location.hostname + ":8254");
    console.log("http://" + location.hostname + ":8254");

    socket.on('connect', function () {
        person = prompt("What's your name?");
        socket.emit('adduser', person);

    });
    socket.on('updatechat', function (user, data) {
        console.log(user + " : " + data);

//        $('.chat-wraper').append('<b>' + user + ':</b> ' + data + '<br>');
        $('.messages').append('<li class="message left appeared"><div class="avatar"></div><div class="text_wrapper"><div class="text"> ' + data +'</div></div></li>');
        var element = document.getElementById("messages");
        element.scrollTop = element.scrollHeight;
    });

    $(function () {

        $('button').click(function () {
            var message = $('.message_input').val();
            $('.message_input').val('');
//            $('.messages').append('<p style="text-align: right;"><b>' + person + ':</b> ' + message + '</p><br>');
            $('.messages').append('<li class="message right appeared"><div class="avatar"></div><div class="text_wrapper"><div class="text text-right">'+message+'</div></div></li>');
            socket.emit('sendchat', message);

            var element = document.getElementById("messages");
            element.scrollTop = element.scrollHeight;

                $('.message_input').focus();
        });


        $('.message_input').keypress(function (e) {
            if (e.which == 13) {
                $(this).blur();
                $('.send_message').focus().click();
            }
        });
    });

</script>
</body>
</html>