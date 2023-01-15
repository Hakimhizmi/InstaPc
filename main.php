<?php
$con = mysqli_connect('localhost', 'root', '', 'insta');
$str = mysqli_query($con, "SELECT * FROM `post` order by id_post desc");

session_start();

$profile_picture = mysqli_query($con, "SELECT prf_img FROM user_info WHERE username = '" . $_SESSION['user'] . "'");

if (empty($_SESSION['user'])) {
    header("location: signin.php");
}

/*
if (isset($_POST['filestory'])) {
    if ($_FILES['filestory']['size'] >= 0) {
        $file = addslashes(file_get_contents($_FILES['filestory']['tmp_name']));
        mysqli_query($con, "INSERT INTO story(filedata,username) VALUES ('$file','" . $_SESSION['user'] . "' ");
        header("location: main.php");
    }
}
*/

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InstaPC</title>
    <link rel="icon" href="image\icons8-instagram-50.png">
    <link rel="stylesheet" href="style/stylemaiin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.1.4/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.2/utilities.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.2/components.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
        .frame {
            border-radius: 6px;
            box-shadow: 0 16px 24px 2px rgba(0, 0, 0, .14), 0 6px 30px 5px rgba(0, 0, 0, .12), 0 8px 10px -5px rgba(0, 0, 0, .2);
        }

        footer {
            color: #555;
            font-weight: 300;

        }

        .footer p {
            font-size: 14px;
            margin: 0 0 10px;
            font-weight: 300;
        }

        footer p a {
            color: #555;
            font-weight: 400;
        }

        footer p a:hover {
            color: #9f26aa;
            text-decoration: none;
        }

        .navbar {
            background: white;
            color: #333;
            height: 50px;
            border-radius: 120px / 10px;
            box-shadow: 0px 0px 8px rgba(0, 0, 0, .6);
        }

        .logo {
            margin-left: 200px;
        }

        .rr1 {
            margin-left: 200px;
            padding-right: 49px;
        }

        .rr {
            padding-right: 40px;
        }

        .middle {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            position: absolute;
        }

        .bar {
            width: 10px;
            height: 70px;
            background: #6c75f4;
            display: inline-block;
            transform-origin: bottom center;
            border-top-right-radius: 20px;
            border-top-left-radius: 20px;
            animation: loader 1.2s linear infinite;
        }

        .bar1 {
            animation-delay: 0.1s;
        }

        .bar2 {
            animation-delay: 0.2s;
        }

        .bar3 {
            animation-delay: 0.3s;
        }

        .bar4 {
            animation-delay: 0.4s;
        }

        .bar5 {
            animation-delay: 0.5s;
        }

        .bar6 {
            animation-delay: 0.6s;
        }

        .bar7 {
            animation-delay: 0.7s;
        }

        .bar8 {
            animation-delay: 0.8s;
        }

        @keyframes loader {
            0% {
                transform: scaleY(0.1);

            }

            50% {
                transform: scaleY(1);
                background: yellowgreen;
            }

            100% {
                transform: scaleY(0.1);
                background: transparent;
            }
        }

        #logo {
            color: #6c75f4;
        }

        #logo:hover {
            color: rgba(0, 0, 0, .6);
        }

        #p {
            width: 140px;

        }

        input {
            border: 2px solid lightslategray;
            height: 30px;
            width: 15%;
            margin-left: 280px;
            border-radius: 3px;
            padding: 5px;
            font-size: 1rem;
        }

        input:focus {
            outline: none;
            border: 2px solid darkslategray;

        }

        #myHouse {
            border-radius: 15px 225px 255px 15px 15px 255px 225px 15px;
            border-style: solid;
            border-width: 2px;
            border-bottom-left-radius: 15px 255px;
            border-bottom-right-radius: 225px 15px;
            border-top-left-radius: 255px 15px;
            border-top-right-radius: 15px 225px;
            user-select: none;
            -webkit-user-select: none;
        }

        #vidioo {
            width: 100% !important;
            max-width: 100%;
            height: 85%;
        }

        .sond {
            position: absolute;
            bottom: 120px;
            right: 25px;
            font-size: 20px;
        }

        .frm {
            -webkit-box-shadow: 0px 0px 5px 2px rgba(179, 179, 179, 0.3);
            -moz-box-shadow: 0px 0px 5px 2px rgba(179, 179, 179, 0.3);
            box-shadow: 0px 0px 5px 2px rgba(179, 179, 179, 0.7);
        }

        .framestory {
            background-color: #fff;
            margin: auto;
            width: 1080px;
            height: 80px;
            margin-top: 20px;
            border-radius: 6px;
            box-shadow: rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px, rgba(17, 17, 26, 0.1) 0px 24px 80px;
        }

        #nmstr {
            margin-top: -5px;
        }
    </style>

</head>

<body style="visibility:hidden ;">
    <div class="middle">
        <div class="bar bar1"></div>
        <div class="bar bar2"></div>
        <div class="bar bar3"></div>
        <div class="bar bar4"></div>
        <div class="bar bar5"></div>
        <div class="bar bar6"></div>
        <div class="bar bar7"></div>
        <div class="bar bar8"></div>
    </div>



    <nav class="navbar  navbar-expand-sm">
        <div class="logo">
            <a id="logo" href="main.php">InstaPC</a>
        </div>

        <input list="magicHouses" id="myHouse" onkeydown="if (event.keyCode == 13)window.location='profilev2.php?user=' + this.value" name="myHouse" placeholder="Search..." />
        <datalist id="magicHouses">
            <?php
            $strr = mysqli_query($con, "SELECT username FROM user_info");
            while ($data = mysqli_fetch_array($strr)) {
                echo "<option value='" . $data['username'] . "'>";
            }

            ?>
        </datalist>




        <a href="main.php" class="rr1"><img src="image/home_home_page_house_page_home_icon_127147 (1).png" alt=""></a>
        <a href="chat.php" class="rr"><img src="image/chat_communication_message_talk_icon_127139.png" alt=""></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-list-4">
            <ul class="navbar-nav">
                <li class="nav-item dropdown  mt-4">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php while ($data = mysqli_fetch_array($profile_picture)) {
                            echo '<img src="data:image/png;base64 ,' . base64_encode($data['prf_img']) . '" width="40" height="40" class="w-11 h-11 rounded-full" >';
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











<!--
        <div class="framestory">
            <div class="max-w-2xl mx-auto p-1">
                <ul class="flex space-x-4">
                    <li class="flex flex-col items-center space-y-1 ">
                        <div class="relative bg-gradient-to-tr from-yellow-400 to-purple-600 p-1 rounded-full">
                            <a href="#" class="block bg-white p-1 rounded-full transform transition hover:-rotate-6">
                                <img class="w-10 h-10 rounded-full" src="https://placekitten.com/200/200" alt="cute kitty">
                            </a>

                            <button id="butadd" class="absolute bg-blue-500 text-white text-2xl font-medium w-6 h-6 rounded-full bottom-0 right-1 border-4 border-white flex justify-center items-center font-mono hover:bg-blue-700 focus:outline-none">

                                <div class="transform -translate-y-px">+</div>

                            </button>

                        </div>
                        <a href="#" id="nmstr">kitty_one</a>
                    </li>

                </ul>
            </div>
        </div>-->
    </form>







 

<div class="frame">

        <?php

        while ($data = mysqli_fetch_array($str)) {
            $str1 = mysqli_query($con, "SELECT COUNT(username) as nomberp FROM `post` WHERE username='" . $data['username'] . "';");
            while ($data1 = mysqli_fetch_array($str1)) {
                $nbrpo = $data1['nomberp'];
            }

            echo "<div class='row'>";
            echo "<div class='col'>";
            echo "<div class='frm'>";
            echo "<h3>" . $data['title'] . "</h3>";
            if ($data['type_file'] == 'image/png' or $data['type_file'] == 'image/jpeg') {
                echo '<img id="image" src="data:image/png;base64 ,' . base64_encode($data['post']) . '">';
            } else {
                echo '<video id="vidioo" class="mutevid" src="data:video/mp4;base64,' . base64_encode($data['post']) . '"></video>';
                echo '<i class="fa-solid fa-volume-high sond" id="' . $data['id_post'] . '"  ></i>';
            }
            echo "<div class='row ml-3 like'>";
            echo "<span  ><i class='fa fa-heart-o " . $data['id_post'] . "'  onclick='us(" . $data['id_post'] . ")' style='font-size:38px;color:black' aria-hidden='true'></i></span>";
            echo "<marquee width='47%' direction='right'>" . $data['descr'] . "</marquee>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<div class='col'>";
            echo "<div class='container d-flex justify-content-center mt-5'>";
            echo "<div class='card'>";
            echo " <div class='top-container'>";
            $str4 = mysqli_query($con, "SELECT * FROM user_info WHERE username = '" . $data['username'] . "'");
            while ($dataprf = mysqli_fetch_array($str4)) {
                echo '<img src="data:image/png;base64 ,' . base64_encode($dataprf['prf_img']) . '" class="img-fluid profile-image" width="90">';
            }
            echo "<div class='ml-3'>";
            echo "<h5 class='name'>" . $data['username'] . "</h5>";
            $str5 = mysqli_query($con, "SELECT * FROM user_info WHERE username = '" . $data['username'] . "'");
            while ($dataprf = mysqli_fetch_array($str5)) {
                echo "<p id='p' class='mail'>" . $dataprf['email'] . "</p>";
            }
            echo "</div>";
            echo "</div>";
            echo "<div class='middle-container d-flex justify-content-between align-items-center mt-3 p-2'>";
            echo "<div class='dollar-div px-3'>";
            echo "<div class='round-div'><i class='fa fa-thin fa-address-card'></i></div>";
            echo "</div>";
            echo "<div class='d-flex flex-column text-right mr-2'>";
            echo "<span class='current-balance'>number of post</span>";
            echo "<span class='amount'><span class='dollar-sign'></span>" . $nbrpo . "</span>";
            echo "</div>";
            echo "</div>";
            echo " <br>";
            echo "<div class='wishlist-border pt-2'>";
            echo "<a href='profilev2.php?user=" . $data['username'] . "'><span class='wishlist'>profile</span></a>";
            echo "</div>";
            echo "<div class='fashion-studio-border pt-2'>";
            if ($_SESSION['user'] != $data['username']) {
                echo "<a href='message.php?user=" . $data['username'] . "'><span class='fashion-studio'>message</span></a>";
            }
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo " </div>";
        }

        ?>

    </div>


    <footer class="footer text-center ">
        <p>Made with <a href="#" target="_blank">hakim hizmi</a> by Creative Tim</p>
    </footer>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>

    </script>


    <script>
        function us(id) {
            if ($("." + id).hasClass("liked")) {
                $("." + id).css('color', 'black')
                $("." + id).removeClass("liked");
            } else {
                $("." + id).css('color', 'red')
                $("." + id).addClass("liked");
            }
        }






        var video = document.querySelectorAll('video');

        for (var vid of video) {
            vid.addEventListener('click', (e) => {
                if (e.target.paused) {
                    e.target.play();
                } else {
                    e.target.pause();
                }
            })
        }


        var aw = document.querySelectorAll('.sond');
        for (var elm of aw) {
            elm.addEventListener('click', () => {
                for (var ae of aw) {
                    if (ae.getAttribute('class') == 'fa-solid fa-volume-high sond') {
                        ae.setAttribute('class', 'fa-solid fa-volume-xmark sond');
                        var x = document.querySelectorAll('.mutevid');
                        for (var i of x) {
                            i.muted = true;
                        }
                    } else {
                        ae.setAttribute('class', 'fa-solid fa-volume-high sond');
                        var x = document.querySelectorAll('.mutevid');
                        for (var i of x) {
                            i.muted = false;
                        }

                    }

                }

            })

        }
    </script>
    <script>
        window.onload = function() {
            document.querySelector(
                ".middle").style.visibility = "visible";
            setTimeout(function() {
                document.querySelector(
                    ".middle").style.display = "none";
                document.querySelector(
                    "body").style.visibility = "visible";;
            }, 1000)
        }
    </script>


</body>

</html>