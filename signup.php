<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login • Instaswipe</title>
    <link rel="icon" href="image\icons8-instagram-50.png">
    <link rel="icon" href="icon/iconfinder-social-media-web-network-logo05-4584665_122286.png">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <style>
        #output {
            border-radius: 200px;
            cursor: pointer;
            border: 3px solid rgb(0, 0, 0);
            ;
        }

        .lab {
            margin-left: 150px;

        }

        .far {
            position: absolute;
            bottom: 40px;
            right: 15px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    $con = mysqli_connect('localhost', 'root', '', 'insta');
    $error = '';
    $err = "";




    if (isset($_POST['sub'])) {
        $user = $_POST['user'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $filename = $_FILES['image']["name"];
        $typ = $_FILES['image']["type"];
        $str = mysqli_query($con, "SELECT username FROM user_info where username = '$user'");
        $str1 = mysqli_query($con, "SELECT email FROM user_info where email = '$email'");
        $test = mysqli_fetch_array($str);
        $test1 = mysqli_fetch_array($str1);

        if ($typ == "image/png" or  $typ == "image/jpeg") {
            $filedata = addslashes(file_get_contents($_FILES['image']["tmp_name"]));

            if ($test or $test1) {
                $error = "account is already exist";
            } else {
                mysqli_query($con, "INSERT INTO user_info(username,prf_img,email,pass) VALUES ('$user','$filedata','$email','$pass')");
                header("location: signin.php");
            }
        } else {
            $err = "Please add a photo ";
        }
    }
    ?>


    <div class="frame">

        <div class="imag">
            <img src="image/signup-image.jpg" alt="">
        </div>

        <div>
            <div class="login-box">
                <h2>Sign Up</h2>

                <form method="POST" enctype="multipart/form-data">

                    <p><input type="file" class="lab" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;"></p>
                    <p><label for="file" accept="image/*" class="lab" style="cursor: pointer;"><img id="output" width='80px' height='80px' src="image/prff.png" /></label></p>

                    <h4 style="color: red;"><?php echo $error . "   " . $err  ?></h4>
                    <div class="user-box">
                        <input type="text" name="user" required="">
                        <label>Username</label>
                    </div>
                    <div class="user-box">
                        <input type="email" name="email" required="">
                        <label>email</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="pass" id="passowrd" required="">
                        <i class="far fa-eye" id="togglePassword"></i>
                        <label>password</label>
                    </div>


                    <button class="subm" name="sub">Register</button>
                    <a href="signin.php">I am already member</a>


                </form>


            </div>
        </div>

    </div>
    <footer class="footer text-center ">
        <p>Made with <a href="#" target="_blank">hakim hizmi</a> by Creative Tim</p>
    </footer>

    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#passowrd');

        togglePassword.addEventListener('click', function(e) {

            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>