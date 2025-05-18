<?php 
class DataBase{
    var $connection='';
    function connect(){
        try{
            $connection = mysqli_connect('localhost:3306','root','','flowerspot');
            if($connection){
                // echo "Connect";
                return $connection;
            }
        }catch(mysqli_sql_exception){
            echo "Error";
        }
    }
}
// $d = new DataBase();
// $d->connect();
?>