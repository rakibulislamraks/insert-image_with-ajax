<?php

if(isset($_FILES['my_image'])){
    include "config.php";
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if($error === 0){
        if($img_size > 1000000){
            echo "Image size is very large";
            exit();
        }
        else{
            $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_ex = array("jpg","png","jpeg");
            if(in_array($img_ex_lc, $allowed_ex)){
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                $img_upload_path = "images/".$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                $sql = "INSERT INTO images(img_name) VALUE('$new_img_name')";
                mysqli_query($conn, $sql);
                
                $res = array('error' => 0, 'src'=> $new_img_name);
                echo json_encode($res);
                exit();
               
            }else{
                echo "select jpg or png or jpeg image";
                exit();
            }
        }
    }else{
        echo "error";
        exit();
    }
}
?>