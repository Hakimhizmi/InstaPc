<?php
    $con = mysqli_connect('localhost', 'root', '', 'insta');
    $id = $_GET['id'];
    $love = mysqli_query($con,"select love from post where id_post= $id");
    while($data = mysqli_fetch_array($love)){
        $like =  $data['love'] + 1 ;
        mysqli_query($con,"UPDATE post set love = $like WHERE id_post = $id ; ");
    }
?>
  
    