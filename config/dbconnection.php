<?php 
class DataBase{
    var $connection='';
    function connect(){
        try{
            $connection = mysqli_connect('localhost:3306','root','','flowerspot');
            if($connection){
                return $connection;
            }
        }catch(mysqli_sql_exception){
            echo "Error";
        }
    }
    function insertData($connection,$query){
        try{
            $result = mysqli_query($connection , $query);
            echo "Sucess";
        }catch(mysqli_sql_exception){
            echo "Error";
        }
    }
}
?>