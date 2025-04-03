<?php
session_start();
include('../config/dbconnection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $db = new DataBase();
     $connection = $db->connect();
     $data = json_decode(file_get_contents("php://input"), true);
     if (isset($data['id']) && isset($data['flowerId']) && isset($data['commentText'])) {
          $comment = $data['commentText'];
          $id = $data['id'];
          $fid = $data['flowerId'];
          $name = mysqli_query($connection, "SELECT user_name FROM users WHERE id='$id'");
          if (mysqli_num_rows($name) > 0) {
               $nmobj = mysqli_fetch_assoc($name);
               $nm = $nmobj['user_name'];
               echo $nm;
               $query = "INSERT INTO comments (comment,user_name,flower_id) VALUES ('$comment','$nm','$fid ')";
               try {
                    $res = mysqli_query($connection, $query);
                    if ($res) {
                         echo "Sucess";
                    }
               } catch (mysqli_sql_exception) {
                    echo "Error";
               }
          }
     } else {
          echo "Not success";
     }
}
$db = new DataBase();
$connection = $db->connect();
if($_SERVER['REQUEST_METHOD'] == 'GET'){
if (isset($_GET['flowerId'])) {
     $fid = $_GET['flowerId'];
     $query = "SELECT * FROM comments WHERE flower_id='$fid'";
     $result = mysqli_query($connection, $query);

     $comments = [];
     while ($row = mysqli_fetch_assoc($result)) {
          $comments[] = $row;
     }

     header('Content-Type: application/json');
     echo json_encode($comments);
} else {
     echo json_encode(["error" => "Flower ID not provided"]);
}
}