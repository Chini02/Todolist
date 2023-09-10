<?php
require "config.php";
if(isset($_GET["delete_id"])){
    $id = $_GET["delete_id"];
    $sql = $conn->prepare("DELETE FROM task WHERE id=:id");

    $sql->execute([":id" => $id]);
    header("location: index.php");
}

?>