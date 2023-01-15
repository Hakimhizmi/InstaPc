<?php

    $con = mysqli_connect('localhost', 'root', '', 'insta');
    mysqli_query($con,"set global net_buffer_length=1000000;");
    mysqli_query($con,"set global max_allowed_packet=1000000000;");
?>