<?php
require "config.php";
if (isset($_GET["update_id"])) {
    $id = $_GET["update_id"];
    $data = $conn->query("SELECT * FROM task WHERE id='$id'");

    $row = $data->fetch(PDO::FETCH_OBJ);
    if(isset($_POST["submit"])){

        $name = $_POST["nameTask"];
        $task = $_POST["task"];
        
        $sql = "UPDATE task SET name=:name, task=:tsk WHERE id='$id'";
        $data = $conn->prepare($sql);
        $data->execute([":name" => $name, ":tsk" => $task]);
        header("location: index.php");
    }
}
?>
<?php include "header.php"; ?>
    <div class="container">
        <center>
            <form class="row g-3" method="POST" action="update.php?update_id=<?php echo $id; ?>">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <input type="text" name="nameTask" class="form-control"
                                id="inputTask" placeholder="Name Task"
                                value="<?php echo $row->name; ?>"
                            >
                        </div>
                        <div class="col ">
                            <div class="row">
                                <input type="text" name="task" class="form-control" 
                                    id="inputTask" placeholder="Task ..."
                                    value="<?php echo $row->task; ?>"
                                >
                            </div>
                        </div>
                        <div class="col">
                            <button name="submit" type="submit" class="btn btn-primary mb-3">Confirm Task</button>
                        </div>
                    </div>
                </div> 
            </form>
    </center>

<?php include "footer.php"; ?>

