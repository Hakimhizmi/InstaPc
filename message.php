<?php
session_start();

if (empty($_SESSION['user'])) {
    header("location: signin.php");
}



$you = $_GET['user'];
$me = $_SESSION['user'];

if(empty($you)){
    header('location: chat.php') ;
}

$con = mysqli_connect('localhost', 'root', '', 'insta');
$profile_picture = mysqli_query($con, "SELECT prf_img FROM user_info WHERE username = '" . $me . "'");
$profile_picture1 = mysqli_query($con, "SELECT prf_img FROM user_info WHERE username = '" . $you . "'");


if (isset($_POST['subm'])) {
    $mess = $_POST['message'];
    $str5 = mysqli_query($con, "insert into message(sender,receiver,message,date) values ('$me','$you','$mess',now());  ");
    header("location: message.php?user=" . $you . "");
}






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesgeet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style\styleprofilee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>InstaPC • Direct</title>
    <link rel="icon" href="image\icons8-instagram-50.png">
    <link rel="stylesheet" href="style\stylemess.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
</head>

<body>
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
    <div class="row">
        <div class="framemes col-3">
            <div class="head">
                <a href="chat.php"><i class="fa-solid fa-reply-all" id="fntaa"></i></a>
                <h6 id="re">Recent</h6>
            </div>
            <div class="scrole">

            </div>


        </div>
        <div class="frame col-9">
            <div class="settings-tray">
                <?php
                while ($data6 = mysqli_fetch_array($profile_picture1)) {
                    echo '<img class="profile-image" src="data:image/png;base64 ,' . base64_encode($data6['prf_img']) . '" alt="Profile img">';
                }
                ?>
                <h5><a href="profilev2.php?user=<?php echo $you ?>" id="alink"><?php echo $you ?></a></h5>
                <span class="settings-tray--right">
                    <i id="reff" class="material-icons">cached</i>
                </span>

            </div>

            <div class="base-container">



            </div>
            <form method="POST">
                <div class="row">
                    <input type="text" id="sendmess" placeholder="Type message ....." name="message" required>
                    <div class="wrapper">
                        <button class="drdr" name="subm">
                            <span>SEND</span>
                            <div class="success">
                                <svg xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 29.756 29.756" style="enable-background:new 0 0 29.756 29.756;" xml:space="preserve">

                                    <path d="M29.049,5.009L28.19,4.151c-0.943-0.945-2.488-0.945-3.434,0L10.172,18.737l-5.175-5.173   c-0.943-0.944-2.489-0.944-3.432,0.001l-0.858,0.857c-0.943,0.944-0.943,2.489,0,3.433l7.744,7.752   c0.944,0.943,2.489,0.943,3.433,0L29.049,8.442C29.991,7.498,29.991,5.953,29.049,5.009z" />
                                </svg>
                            </div>
                        </button>
                    </div>


                </div>

            </form>
        </div>
    </div>



    <footer class="footer text-center ">
        <p>Made with <a href="#" target="_blank">hakim hizmi</a> by Creative Tim</p>
    </footer>
    <script>
        setInterval(loaddata, 1000);
        setInterval(loadlastmess,1000);   

        function loaddata() {
            $.ajax({
                method: 'post',
                url: 'getdata.php',
                data: {
                    me: '<?php echo $me ?>',
                    you: '<?php echo $you ?>',
                    type:'loadmessage',
                },
                success: function(data) {
                    $('.base-container').html(data)
                    var objDiv = document.querySelector(".base-container");
                    objDiv.scrollTop = objDiv.scrollHeight;
                }
            })
        }
        function loadlastmess(){
            $.ajax({
                method:'post',
                url:'getdata.php',
                data: {
                    me: '<?php echo $me ?>',
                    you: '<?php echo $you ?>',
                    type:'loadlastmess',
                },
                success: function(data) {
                    $('.scrole').html(data)
                }
            })
        }
    </script>
    <script>
        let btn = document.querySelector(".drdr");

        btn.addEventListener("click", () => {
            if (!document.getElementById('sendmess').value == "") {
                btn.classList.toggle("is_active");

            }

        });


        document.getElementById('reff').addEventListener('click', () => {
            window.location.reload();
        })
    </script>


    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>


</body>

</html>