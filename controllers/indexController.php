<?php
     session_start();
    if($_SERVER['REQUEST_METHOD']=='GET'){
         include('../config/dbconnection.php');
     $db =new DataBase();
     $connection = $db->connect();
    $query = "SELECT * FROM flowers";
    $arr='';
    $array = array();
    try{
        $arr = mysqli_query($connection , $query);
    }catch(mysqli_sql_exception){
        echo "Error";
    }
    if(mysqli_num_rows($arr)>0){
        while($res = mysqli_fetch_assoc($arr)){
            array_push($array , $res);
        }
    }
    $jsonData = json_encode($array);
    echo $jsonData;
}
?>