<?php
require_once '../api/conn.php';
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load MDL -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand|Raleway&display=swap" rel="stylesheet">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        .card-title{
            float: top;
            color: aliceblue;
            padding-top: 30px;
            font-size: x-large;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color:  #303F9F;
        }
        .img{
            width: 150px;
            padding-bottom: 10px;
        }
        .mdl-textfield__label{
            color: aliceblue;
        }
        .textfield{
            padding: 20px;

        }
        input[type=button]{
            font-family: 'Raleway', sans-serif;
            color: #BDBDBD;
            font-size: medium;
            text-transform: capitalize;
        }
        .button{
            background-color: #03A9F4;
            margin: 20px;
            border-radius: 5px;
        }
        /*actual content in the card*/
        .demo-card-square.mdl-card {
            align-items: center;
            height: 470px;
            width: 400px;
        }
        /*card itself*/
        .demo-card-square {
            background-color: #3F51B5;
            border-radius: 6px;
            size: 400px;
        }
        @media only screen and (max-width: 600px) {
            #panel {
                width: 100% !important;
                height: 100vh !important;
            }
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        function submit(){
            var usr = $("#username").val();
            var psw = $("#password").val();
            $.post("../api/api.php?action=log_in", {username: usr, password: psw}, function(){
                window.location.replace('../AnonMe/index2.php');
            });
        }
    </script>
</head>
<body class="container">
    <div class="demo-card-square mdl-card mdl-shadow--6dp" id="panel">
        <p class="card-title" style="font-family: 'Quicksand', sans-serif;" >Log In</p>
        <img class="img" src="../login_logo.png" name="logo">
        <p><?php if(isset($_GET['alert'])) echo $_GET['alert'];?></p>
        <div class="textfield mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input type="text" class="mdl-textfield__input" id="username"/>
            <label class="mdl-textfield__label" style="font-family: 'Raleway', sans-serif;" for="username">Username</label>
        </div>
        <div class="textfield mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input type="password" class="mdl-textfield__input" id="password"/>
            <label class="mdl-textfield__label" style="font-family: 'Raleway', sans-serif;" for="password">Password</label>
        </div>
        <div>
            <input type="button" value="Log In" style="font-family: 'Raleway', sans-serif;" class="button mdl-button mdl-js-button mdl-button--raised" onclick="submit()">
        </div>
    </div>
</body>

