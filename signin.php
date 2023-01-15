<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login • Instaswipe</title>
    <link rel="icon" href="icon/iconfinder-social-media-web-network-logo05-4584665_122286.png">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="icon" href="image\icons8-instagram-50.png">
    <style>
        .far {
            position: absolute;
            bottom: 40px;
            right: 15px;
            cursor: pointer;
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
    <?php
    $con = mysqli_connect('localhost', 'root', '', 'insta');
    $error = '';
    session_start();

    if (isset($_POST['sub'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $str1 = mysqli_query($con, "SELECT username FROM user_info where username = '$user'");
        $test = mysqli_fetch_array($str1);
        if ($test) {
            $str3 = mysqli_query($con, "SELECT pass FROM user_info where username = '$user'");
            $str2 = mysqli_fetch_array($str3);
            if ($str2['pass'] == $pass) {

                $_SESSION['user'] = $user;
            } else {
                $error = 'invalid password';
            }
        } else {
            $error = "account doesn't exist";
        }
    }
    if (isset($_SESSION['user'])) {
        header('location: main.php');
    }


    ?>
    <div class="frame">

        <div class="imag">
            <img src="image/signin-image.jpg" alt="">
        </div>

        <div>
            <div class="login-box">
                <h2>Sign in</h2>
                <h4 style="color: red;"><?php echo $error  ?></h4>
                <form method="POST" enctype="multipart/form-data">
                    <div class="user-box">
                        <input type="text" name="user" required="">
                        <label>Username</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="pass" id="passowrd" required="">
                        <i class="far fa-eye" id="togglePassword"></i>
                        <label>password</label>
                    </div>


                    <button class="subm" name="sub">Log in</button>
                    <a href="signup.php">Create an account</a>


                </form>


            </div>
        </div>

    </div>
    <footer class="footer text-center ">
        <p>Made with <a href="#" target="_blank">hakim hizmi</a> by Creative Tim</p>
    </footer>
    <script>
        const icon = document.querySelector('#togglePassword');
        const password = document.querySelector('#passowrd');

        icon.addEventListener('click', function(e) {

            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            this.classList.toggle('fa-eye-slash');
        });
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
            }, 500)
        }
    </script>
</body>

</html>