<?php
$you = $_POST['you'];
$me = $_POST['me'];
$con = mysqli_connect('localhost', 'root', '', 'insta');
if ($_POST['type'] == 'loadmessage') {
    $str = mysqli_query($con, "select * from message where sender = '" . $me . "' and receiver='" . $you . "' or sender = '" . $you . "' and receiver='" . $me . "' ;");
    while ($data1 = mysqli_fetch_assoc($str)) {

        if ($data1['sender'] == $me) {
            echo '<div class="my-text-div">';
            echo '<div class="my-text-container">';
            echo '<div class="my-text">' . $data1['message'] . '</div>';
            echo '<div class="timeme">' . $data1['date'] . '</h6></div>';
            echo '</div>';
            echo '</div>';
        }
        if ($data1['sender'] == $you) {
            echo '<div class="friend-text-div">';
            $profile_picture3 = mysqli_query($con, "SELECT prf_img FROM user_info WHERE username = '" . $you . "'");
            while ($data2 = mysqli_fetch_array($profile_picture3)) {
                echo '<img src="data:image/png;base64 ,' . base64_encode($data2['prf_img']) . '" class="rounded-circle" width="35" height="35" />';
            }
            echo '<div class="friend-text-container">';
            echo '<div class="friend-text">' . $data1['message'] . '</div>';
            echo '<div class="timeyou"><h6>' . $data1['date'] . '</h6></div>';
            echo '</div>';
            echo '</div>';
        }
    }
}

if ($_POST['type'] == 'loadlastmess') {
    $selectrecevier = mysqli_query($con, "SELECT receiver from message WHERE sender='" . $me . "'  GROUP by receiver ORDER by date DESC ;");
    while ($datamees = mysqli_fetch_array($selectrecevier)) {
        echo '<a href="message.php?user=' . $datamees['receiver'] . '" class="linkamp">';
        echo '<div class="frm4">';
        $profile_picture4 = mysqli_query($con, "SELECT prf_img FROM user_info WHERE username = '" . $datamees['receiver'] . "'");
        while ($img = mysqli_fetch_array($profile_picture4)) {
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
}
