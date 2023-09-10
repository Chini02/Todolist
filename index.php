<?php
require "config.php";
require "insertData";
$data = $conn->query("SELECT * FROM task");

?>
<?php include "header.php"; ?>
<?php if (!empty($error)) : ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
<?php endif; ?>
    <div class="container">
        <center>
            <form class="row g-3" method="POST" action="insertData.php">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            
                            <input type="text" name="nameTask" class="form-control"
                                id="inputTask" placeholder="Name Task"
                            >
                              
                        </div>
                        <div class="col ">
                            <div class="row">
                                
                                    <input type="text" name="task" class="form-control" 
                                        id="inputTask" placeholder="Task ..."\
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
        <div class="container-fluid">
            <div class="container mr-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th scope="col w-[80%]">Name</th>
                            <th scope="col w-[80%]">Task</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($rows = $data->fetch(PDO::FETCH_OBJ)):
                        ?>
                        <tr>
                            <td><?php echo $rows->id; ?></td>
                            <td><?php echo $rows->name; ?></td>
                            <td><?php echo $rows->task; ?></td>
                            <td>
                                <a href="delete.php?delete_id=<?php echo $rows->id; ?>">
                                    <button type="button" class="btn btn-danger">
                                        Delete
                                    </button>
                                </a>
                                <a sty href="update.php?update_id=<?php echo $rows->id; ?>">
                                    <button type="button" class="btn btn-warning">
                                        Update
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <?php
                            endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
<?php include "footer.php"; ?>