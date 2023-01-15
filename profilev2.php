<?php
session_start();
if (empty($_SESSION['user'])) {
    header("location: signin.php");
}
$con = mysqli_connect('localhost', 'root', '', 'insta');
$user = $_GET['user'];
if ($_SESSION['user'] == $user) {
    header("location: profile.php");
}

$str9 = mysqli_query($con, "SELECT username FROM user_info where username='$user'");
$d = mysqli_fetch_array($str9);
if(!$d){
    header("location: main.php");
}




$str = mysqli_query($con, "SELECT prf_img FROM user_info WHERE username = '" . $user . "'");
$profile_picture = mysqli_query($con, "SELECT prf_img FROM user_info WHERE username = '" . $_SESSION['user'] . "'");
$post = mysqli_query($con, "SELECT * FROM post  WHERE username = '" . $user . "'");


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesgeet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style\styleprofilee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>InstaPC • <?Php echo $user ?></title>
    <link rel="icon" href="image\icons8-instagram-50.png">
    <style>
        #logo {
            color: #6c75f4;
        }

        #logo:hover {
            color: rgba(0, 0, 0, .6);
            text-decoration: none;
        }

        .subm {
            width: 130px;
            margin-left: 45%;
            align-self: center;
            text-align: center;
            background-color: #fff;
            background-image: none;
            background-position: 0 90%;
            background-repeat: repeat no-repeat;
            background-size: 4px 3px;
            border-radius: 15px 225px 255px 15px 15px 255px 225px 15px;
            border-style: solid;
            border-width: 2px;
            box-shadow: rgba(0, 0, 0, .2) 15px 28px 25px -18px;
            box-sizing: border-box;
            color: #41403e !important;
            cursor: pointer;
            display: inline-block;
            font-family: Neucha, sans-serif;
            font-size: 1rem;
            line-height: 23px;
            outline: none;
            padding: .15rem;
            text-decoration: none;
            transition: all 235ms ease-in-out;
            border-bottom-left-radius: 15px 255px;
            border-bottom-right-radius: 225px 15px;
            border-top-left-radius: 255px 15px;
            border-top-right-radius: 15px 225px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .subm:hover {
            box-shadow: rgba(0, 0, 0, .8) 2px 8px 8px -5px;
            transform: translate3d(0, 3px, 0);
        }

        #ali {
            color: #41403e;
        }

        #ali:hover {
            text-decoration: none;
        }

        .subm:focus {
            box-shadow: rgba(0, 0, 0, .3) 2px 8px 4px -6px;
        }

        #vidioo {
            width: 100% !important;
            max-width: 100%;
            height: 70%;
        }
    </style>


</head>

<body class="profile-page">


    <nav class="navbar  navbar-expand-sm">
        <div class="logo">
            <a id="logo" href="main.php">Instaswipe</a>
        </div>



        <a href="main.php" class="rr1"><img src="image/home_home_page_house_page_home_icon_127147 (1).png" alt=""></a>
        <a href="chat.php" class="rr"><img src="image/chat_communication_message_talk_icon_127139.png" alt=""></a>

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

    <div class="page-header header-filter" data-parallax="true" style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');"></div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <?php
                                while ($data = mysqli_fetch_array($str)) {
                                    echo '<img src="data:image/png;base64 ,' . base64_encode($data['prf_img']) . '" alt="Circle Image"  class="img-raised rounded-circle img-fluid">';
                                }
                                ?>
                            </div>
                            <div class="name">
                                <h3 class="title"><?php echo $user  ?></h3>


                            </div>
                        </div>
                    </div>
                </div>














                <button class="subm" name="sub"><a id="ali" href="message.php?user=<?php echo $user  ?>">Message</a></button>

                <div class="tab-pane text-center gallery container-fluid" id="works">
                    <div class='row'>
                        <?php
                        $len = 0;
                        while ($datapost = mysqli_fetch_array($post)) {
                            if ($datapost['type_file'] == 'image/png' or $datapost['type_file'] == 'image/jpeg') {
                                echo '<div class="col-4 "><img id="image" src="data:image/png;base64 ,' . base64_encode($datapost['post']) . '" ></div>';
                            } else {
                                echo '<div class="col-4 "><video id="vidioo" controls src="data:video/mp4;base64,' . base64_encode($datapost['post']) . '" ></video></div>';
                            }
                            $len += 1;
                            if ($len == 3) {
                                echo '<div class="w-100"></div>';
                                $len = 0;
                            }
                        }
                        ?>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <footer class="footer text-center ">
        <p>Made with <a href="#" target="_blank">hakim hizmi</a> by Creative Tim</p>
    </footer>















    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>




</body>

</html>