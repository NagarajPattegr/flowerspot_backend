<?php
    include('../config/dbconnection.php');
    $db =new DataBase();
    $connection = $db->connect();
    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        if($connection){
           $target = "public/";
           $flower_name = filter_input(INPUT_POST , "flower_name" , FILTER_SANITIZE_SPECIAL_CHARS);
           $flower_desc = filter_input(INPUT_POST , "flower_desc" , FILTER_SANITIZE_SPECIAL_CHARS);
           $flower_price = filter_input(INPUT_POST , "flower_price" , FILTER_SANITIZE_SPECIAL_CHARS);
           $flower_type = filter_input(INPUT_POST , "flower_type" , FILTER_SANITIZE_SPECIAL_CHARS);
            $image_name = basename($_FILES['flower_image']['name']);
            $extnesion = pathinfo($image_name,PATHINFO_EXTENSION);
            $path = $target.$image_name;
            $ext_arr = ["jpg","jpeg","png"];
            if(in_array($extnesion , $ext_arr)){
                if(move_uploaded_file($_FILES['flower_image']['tmp_name'],"../".$path)){
                    $query = "INSERT INTO flowers (flower_name ,price,description,image,type) VALUES ('$flower_name','$flower_price','$flower_desc','$path','$flower_type')";
                    $result = '';
                    try{
                        $result = mysqli_query($connection , $query);
                    }catch(mysqli_sql_exception){
                        echo "Error";
                    }
                    if($result == "success"){
                        echo "success";
                    }else{
                        echo "Can`t upload";
                    }
                }
            }
            else{
                echo "Please upload this type of image {jpeg , jpg , png}";
            }
    }
}
?>