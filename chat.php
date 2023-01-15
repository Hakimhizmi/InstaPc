<?php
session_start();

if (empty($_SESSION['user'])) {
    header("location: signin.php");
}

$me = $_SESSION['user'];

$con = mysqli_connect('localhost', 'root', '', 'insta');
$profile_picture = mysqli_query($con, "SELECT prf_img FROM user_info WHERE username = '" . $me . "'");
$selectrecevier = mysqli_query($con, "SELECT receiver from message WHERE sender='" . $me . "'  GROUP by receiver ORDER by date DESC ;");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/stylechat.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesgeet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style\styleprofilee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<nav class="navbar  navbar-expand-sm">
        <div class="logo">
            <a id="logo" href="main.php">InstaPC</a>
        </div>



        <a href="main.php" class="rr1"><img src="image/home_home_page_house_page_home_icon_127147 (1).png" alt=""></a>
        <a href="#" class="rr"><img src="image/chat_communication_message_talk_icon_127139.png" alt=""></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-list-4">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php while ($data = mysqli_fetch_array($profile_picture)) {
                            echo '<img src="data:image/png;base64 ,' . base64_encode($data['prf_img']) . '" width="40" height="40" class="rounded-circle">';
                        }
                        ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <a class="dropdown-item" href="logout.php">Log Out</a>
                    </div>
                </li>
            </ul>
        </div>


    </nav>


    <div class="framemes">
            <div class="head">
                <h6 id="re">CHat</h6>
            </div>
            <div class="scrole">
                
                <?php

                while ($datamees = mysqli_fetch_array($selectrecevier)) {
                    echo '<a href="message.php?user='.$datamees['receiver'].'" class="linkamp">';
                    echo '<div class="frm4">';
                    $profile_picture4 = mysqli_query($con, "SELECT prf_img FROM user_info WHERE username = '" .$datamees['receiver']. "'");
                    while($img = mysqli_fetch_array($profile_picture4)){
                        echo '<img src="data:image/png;base64 ,' . base64_encode($img['prf_img']) . '" alt="" id="img" width="40" height="40">';
                    }
                    echo '<h6 id="y">' . $datamees['receiver'] . '</h6>';
                    $firstmes = mysqli_query($con, "SELECT message FROM `message` WHERE sender='" . $me . "' and receiver='" . $datamees['receiver'] . "'  or  sender='" . $datamees['receiver'] . "' and receiver= '" . $me . "'   ORDER by date DESC LIMIT 1;");
                    while ($data4 = mysqli_fetch_array($firstmes)) {
                        echo '<h6 id="t">' . $data4['message'] . '</h6>';
                    }
                    echo '</div>';
                    echo '</a>';
                }






                ?>
            </div>


        </div>










    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>


</body>
</html>