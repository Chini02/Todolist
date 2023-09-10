<?php
require "config.php";
// Validation
    if(isset($_POST["submit"])){
            $name = $_POST["nameTask"];
            $task = $_POST["task"];
            if (empty($name) || empty($task)) {
                $error = "Both fields must be filled.";
            } else {
            $sql = "INSERT INTO task (name, task) VALUES (:name, :tsk)";
            $data = $conn->prepare($sql);
            $data->execute([":name" => $name, ":tsk" => $task]);
            header("location: index.php");
            }
        
    }

?>