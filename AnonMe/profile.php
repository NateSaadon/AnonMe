<?php
    require_once '../api/conn.php';
    session_start();
    $conn = new conn();

    $username = htmlspecialchars($_GET["username"]);
    if($username === null){
      $username = $_SESSION['username']; #default to current user profile
    }



    function getImageFromID($conn){
        $username = getName();
        $response = $conn->query("SELECT * FROM users WHERE username='$username' LIMIT 1");
        while($row = mysqli_fetch_array($response)){
            $img = $row['pic'];
            if(filter_var($img, FILTER_VALIDATE_URL)){
              if(is_array(getimagesize($img))){
                  return $img;
              }else{
                return "img/img_avatar.png";
              }
            }else{
              return "img/img_avatar.png";
            }
        }
    }

    function getImageForViewer($conn){
        $username = $_SESSION['username'];
        $response = $conn->query("SELECT * FROM users WHERE username='$username' LIMIT 1");
        while($row = mysqli_fetch_array($response)){
            $img = $row['pic'];
            if(filter_var($img, FILTER_VALIDATE_URL)){
              if(is_array(getimagesize($img))){
                  return $img;
              }else{
                return "img/img_avatar.png";
              }
            }else{
              return "img/img_avatar.png";
            }
        }
    }

    function getBio($conn){
      $username = getName();
      $response = $conn->query("SELECT * FROM users WHERE username='$username' LIMIT 1");
      while($row = mysqli_fetch_array($response)){
          return $row['bio'];
        }
    }

    function getDOB($conn){
      $username = getName();
      #$username = $_SESSION['username'];
      $response = $conn->query("SELECT * FROM users WHERE username='$username' LIMIT 1");
      while($row = mysqli_fetch_array($response)){
          return $row['DOB'];
        }
    }

    function getName(){
      $username = htmlspecialchars($_GET["username"]);
      if($username === null){
        $username = $_SESSION['username']; #default to current user profile
      }
      return $username;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap 4 Introduction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/creative.min.css" rel="stylesheet">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand|Raleway&display=swap" rel="stylesheet">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<style>
		* {
			box-sizing: border-box;
		}
		.button {
			padding: auto;
		}
		.card {
			margin: 0 auto; /* Added */
			float: none; /* Added */
			margin-bottom: 10px; /* Added */
		}
		.profile-blank {
			padding-right: 10%;
		}
		#appDive {
			position: absolute;
			right: 0%;
			background: #80cbc4;
			border:1px solid black;
			width:12%;

		}

		.card-title {
			margin:2.5%;
		}
		.name {
			width: 30%;
		}


		.side-bitch
		{
			padding-top: .7em;
			padding-bottom: .8em;
		}
		.card-body{
			padding: 2%;

			border:1px solid black;
		}
		.card-head {
			width: 81%;

			border:1px solid black;
		}

		.profile {
			margin: 2%;
			border-radius: 360%;
			width: 8%;
			height: 8%;
		}
		.profile2 {
			border-radius: 360%;
			width: 8%;
			height: 8%;
			border:2px solid black;
		}
    .profile3 {
			border-radius: 100%;
			width: 8%;
			height: 8%;
			border:2px solid black;
		}

		 .row-full{
			 width: 100vw;
			 position: relative;
			 margin-left: -50vw;
			 height: 10%;
			 padding: 2%;
			 padding-top:3%;
			 margin-top: 0%;
			 left: 50%;
			}
        .profile-card{
            position: absolute;
            margin:100px;
            margin-left: 22px;
            background-color: #80cbc4;
            border-radius: 7px;
            width: 20%;
            height: auto;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
        }
        .profile-card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        .profile-card-contents{
            position: center;
            padding: 10px;
            width: 100%;
        }
		.user-name-top{
			position: absolute;
			width:10%;
			margin-top: 1%;
			margin-left: 9%;
		}
		.user-name-top2{
			position: absolute;
			width:10%;
			margin-top: 4%;
			margin-left: 9%;
		}
		.card{
			margin-top: 4%;
		}
        body{
            overflow-x: hidden;
        }

	</style>
</head>

<body>
  <nav class="navbar navbar-dark navbar-expand-md bg-success justify-content-between">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-nav">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse collapse dual-nav w-50 order-1 order-md-0">
				<ul class="navbar-nav">
				  <div class = "profile-blank">
						<li class="nav-item active">
							<a class="nav-link pl-0" href="#">
                <button style = "background-color:#80cbc4; border: none" onclick="openProfile()">
								    <img src="img/profile icon transparent.png" class="img-fluid" alt="logo" width="33" height="33"/>
                </button>
                <script>
                  function openProfile(){
                      window.open("index2.php","_self");
                    }
                </script>
							</a>
						</li>
					</div>
					<li class="nav-item">
					  <a class="nav-link pl-0 " href="#">
							<img src="img/notification bell transparent.png" class="img-fluid" alt="logo" width="30" height="30"/>
						</a>
					</li>
				</ul>
			</div>
			<img href="/" class="navbar-brand d-block text-center order-0 order-md-1 w-20" src="img/logo.png" alt="anon" width="125" height="60"/>
			<img href="/" class="navbar-brand d-block text-center order-0 order-md-1 w-20" src="line.png" width="50" height="50">
			<img href="/" class="navbar-brand d-block text-center order-0 order-md-1 w-20" src="img/Anonymous icon with line transparent.png" alt="anon" width="50" height="50"/>
			<div class="navbar-collapse collapse dual-nav w-50 order-2">
				<ul class="nav navbar-nav ml-auto">
					<div class="search_box">
						<input type="text" class="search_bar" name="" placeholder="Friend Search">
						<a class="search_button" href="#">
							<i class="fas fa-search" style="color:#ffffff;"></i>
						</a>
					</div>
				</ul>
			</div>
		</div>
	</nav>
  <div class="row-full">
      <img class = "profile2" align = "left" src=<?php echo getImageForViewer($conn);?> alt="Avatar">
      <div class =  "user-name-top">
          <h4 class="card-title" style="font-size:2vw;"><?php echo $_SESSION['username']; ?></h4>
      </div>
      <div class =  "user-name-top2">
          <h4 class="card-title" style="font-size:2vw;">YOLO</h4>
      </div>
  </div>

  <div class="profile-card" id="input">
      <div class="profile-card-contents">
          <div class="textfield mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" id="bio" placeholder="Bio"><br><br><br>
              <input class="mdl-textfield__input" id="img" placeholder="Pic"><br><br><br>
              <input class="mdl-textfield__input" id="DOB" placeholder="Date of Birth"><br><br><br>
              <button class="mdl-button mdl-js-button mdl-button--raised" onclick="submit_post()">Update</button>
          </div>
      </div>
  </div>
</div>

<script>
function submit_post() {
  var bio = $("#bio").val();
  var pic = $("#img").val()
  var dob = $("#DOB").val();;
  $.post("../api/api.php?action=update_user", {bio: bio, pic: pic, dob: dob}, function() {
      location.reload();
  });
}
</script>

<div class="card" style="width:40%; margin-left: 34%;">
    <div class="card-head" style="width:100%">

        <h3 class="card-title" align = "left" style="font-size:2vw;"><?php echo getName();?>'s Profile</h3>
    </div>
    <img id = "test" class="card-img-top" src=<?php echo getImageFromID($conn);?> alt="Card image" style="width:100%">

    <div class="card-body" style="width:100%; padding-bottom: 15%;">
      <p><b> DOB: </b> <?php echo getDOB ($conn);?></p>
      <p><b> Bio: </b> <?php echo getBio ($conn);?></p>
    </div>
</div>

</script>
</body>
