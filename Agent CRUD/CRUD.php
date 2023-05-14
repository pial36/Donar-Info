<?php
require_once('../models/dbmodel.php');



if (isset($_GET['deleteA'])) {
    $id = $_GET['deleteA'];
    $Delete=AgentD($id);
    if ($Delete) {
        // Redirect to current page after successful deletion
        header("Location: ../views/AdminA.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

if(isset($_REQUEST['edit']))
{
  $id=$_REQUEST['edit'];
    $edits=editA($id);
    include '../views/AgentE.php';
    //header("location:../views/edit.php/'{$id}'");
}

if(isset($_REQUEST['submitA']))
{
  if(isset($_REQUEST["submitA"])) {
    $id = $_REQUEST["id"];
    $username = $_REQUEST["username"];
    $pass = $_REQUEST["password"];
    $updateA=updateA($id,$username,$pass);
    if($updateA)
      {
          header('location:../views/AdminA.php');
      }
      else
      {
          header('location:../views/AdminA.php');
      } 
}
}

?>