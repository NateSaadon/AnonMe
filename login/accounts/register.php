<?php
require_once '../api/conn.php';
?>
<html>
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
        .textfield{
            margin: 5px 5px 2px 40px;
            justify-content: center;
        }
        .mdl-textfield__label{
            color: aliceblue;
        }
        input[type=text]{
            color: aliceblue;
        }
        input[type=button]{
            font-family: 'Raleway', sans-serif;
            color: #BDBDBD;
            font-size: medium;
            text-transform: capitalize;
            margin-top: 20px;
        }
        .button1{
            width: 200px;
            background-color: #303F9F;
            border-radius: 5px;

        }
        /*actual content in the card*/
        .demo-card-square.mdl-card {
            align-items: center;
            height: 600px;
            width: 400px;
            justify-self: center;


        }
        /*card itself*/
        .demo-card-square {
            background-color: #3F51B5;
            border-radius: 6px;
            size: 400px;
            justify-content: center;
        }
        @media only screen and (max-width: 600px) {
            #panel {
                width: 100% !important;
                height: 100vh !important;
            }
        }
    </style>
    <script>
        function submit(){
            var usr = $("#username").val();
            var psw = $("#password").val();
            var cpsw = $("#confirm_password").val();
        if(cpsw == psw){
            $.post("../api/api.php?action=create_account", {username: usr, password: psw}, function(data){
                // alert(data);
                if(data == "1")
                    location.href='login.php';
                else
                    location.href='register.php';
            });
        }
        else{
            alert("Passwords must match!");
        }
        }
    </script>
</head>
<body class="container">
    <div class="demo-card-square mdl-card mdl-shadow--6dp" id="panel">
        <p class="card-title" style="font-family: 'Quicksand', sans-serif;" >Create an Account</p>
        <img class="img" src="../login_logo.png" name="logo">
        <div class="textfield mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input type="text" name="username" class="mdl-textfield__input" id="username"/>
            <label class="mdl-textfield__label" style="font-family: 'Raleway', sans-serif;" for="username">Username</label>
        </div>
        <div class="textfield mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input type="password" name="password" class="mdl-textfield__input" id="password"/>
            <label class="mdl-textfield__label" style="font-family: 'Raleway', sans-serif;" for="password">Password</label>
        </div>
        <div class="textfield mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input type="password" name="confirm_password" class="mdl-textfield__input" id="confirm_password"/>
            <label class="mdl-textfield__label" style="font-family: 'Raleway', sans-serif;" for="confirm_password">Confirm Password</label>
        </div>
        <div>
            <input type="button" id="submit" value="Create Account" class="button1 mdl-button mdl-js-button mdl-button--raised" onclick="submit()">
        </div>
    </div>
</body>
</html>

