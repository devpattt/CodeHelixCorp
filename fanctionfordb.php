<?php

    function check_login($con)
    {
        if(isset($_SESSION['username']))
        {
            $id = $_SESSION['username'];
            $query = "select * from users where username = '$id' limit 1";

            $result = mysqli_query($con,$query);
            if($result && mysqli_num_rows($result) >0)
            {
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }

        //code to redirect login 
        header("Location: index.php");
        die;
    }

    function random_num($length)
{
    $text = "";
    if($length <5)
    {
        $length = 5;
    }
    $len = rand(4,$length);

    for ($i=0; $i < $len; $i++) {
        # code...

        $text .= rand(0,9);
    }
    return $text;
}