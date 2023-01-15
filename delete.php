<?php
    $con = mysqli_connect('localhost', 'root', '', 'insta');
    $id = $_GET['id'];
    $str = mysqli_query($con,"delete from post where id_post = $id");
    header("location: profile.php");

?>