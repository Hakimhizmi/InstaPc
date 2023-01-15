<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InstaPC • addPost</title>
    <link rel="icon" href="image\icons8-instagram-50.png">
    <link rel="stylesheet" href="style/styleaddd.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <?php
    session_start();
    if (empty($_SESSION['user'])) {
        header("location: signin.php");
    }


    $err = "";
    $con = mysqli_connect('localhost', 'root', '', 'insta');
    $profile_picture = mysqli_query($con, "SELECT prf_img FROM user_info WHERE username = '" . $_SESSION['user'] . "'");


    if (isset($_POST['subpost'])) {
        
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        if($_FILES['imgpost']['size'] > 10000000) {
            $err = "Sorry, your file is too large.";
            header("location: main.php");
        } else {
            $typ = $_FILES['imgpost']["type"];
            if ($typ == "image/png" or  $typ == "image/jpeg" or $typ ==  "video/mp4") {
                $filedata = addslashes(file_get_contents($_FILES['imgpost']["tmp_name"]));
                
                mysqli_query($con, "INSERT INTO post(title,post,type_file,descr,username) VALUES ('$title','$filedata','$typ','$desc','" . $_SESSION['user'] . "')");
                header("location: main.php");
            } else {
                $err = "Please add a photo or vidio ";
            }
        }
    }

    ?>





    <nav class="navbar  navbar-expand-sm">
        <div class="logo">
            <a id="logo" href="main.php">InstaPC</a>
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

    <div class="frame">
        <div class="wrapper">
            <form method="POST" enctype="multipart/form-data">
                <header id="head">
                    <h1>Add Post</h1>

                </header>



                <div class="sections">


                    <h4 style="color: red;"><?php echo $err  ?></h4>
                    <section class="active">
                        <input type="text" placeholder="Title" name="title" id="title" />
                        <section>
                            <textarea placeholder="something..." id="msg" name="desc"></textarea>
                            <p><input type="file" class="lab" accept="image/*,video/*" name='imgpost' id="file" onchange="loadFile(event)" style="display: none;"></p>
                            <p><label for="file" class="lab" style="cursor: pointer;"><img id="output" width='110px' height='110px' src="image/screenshot-localhost-2022.06.10-20_03_52.png" /></label></p>
                        </section>
                </div>
                <footer>
                    <ul>
                        <li><span id="reset">reset</span></li>
                        <li><button class="subm" name="subpost">&nbsp; Send &nbsp;</button></li>
                    </ul>
                </footer>
            </form>

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

        document.getElementById('reset').addEventListener('click', () => {
            window.location.reload();
        })
    </script>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>