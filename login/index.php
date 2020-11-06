<?php
require_once 'api/conn.php';
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
    <style>
        .card-title{
            float: top;
            color: aliceblue;
            padding-top: 50px;
            font-size: x-large;
        }
        .img{
            width: 150px;
            padding-bottom: 10px;
        }
        input[type=button]{
            font-family: 'Raleway', sans-serif;
            color: #BDBDBD;
            font-size: medium;
            text-transform: capitalize;
        }
        .button1{
            width: 200px;
            margin: 20px;
            background-color: #303F9F;
            border-radius: 5px;

        }
        .button2{
            width: 200px;
            margin 10px;
            background-color: #448AFF;
            border-radius: 5px;
        }
        /*container*/
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #303F9F;
        }
        /*actual content in the card*/
        .demo-card-square.mdl-card {
            float: top;
            align-items: center;
            height: 450px;
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
<!--    <script>-->
<!--        function create(){-->
<!--            $.post("api/api.php?action=create_table", {}, function(data){-->
<!--                if (data == "1"){-->
<!--                    location.href='accounts/register.php';-->
<!--                }-->
<!--                else{-->
<!--                    Location.href='index.php';-->
<!--                }-->
<!--            });-->
<!--        }-->
<!--        // window.onload = create;-->
<!--    </script>-->
</head>
<body class="container">
    <div class="demo-card-square mdl-card mdl-shadow--6dp" id="panel">
        <div>
            <p class="card-title" style="font-family: 'Quicksand', sans-serif;" >Log In or Create an Account</p>
        </div>
        <img class="img" src="login_logo.png" name="logo">
        <div>
            <input type="button" class="button1 mdl-button mdl-js-button mdl-button--raised" name="register" value="Create Account" onclick="location.href='accounts/register.php'">
        </div>
        <div>
            <input type="button" class="button2 mdl-button mdl-js-button mdl-button--raised" name="login" value="Log In" onclick="location.href='accounts/login.php'">
        </div>
    </div>
</body>
</html>
