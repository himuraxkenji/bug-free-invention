<?php
    include('db.php');

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($conexion, $query);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['description'];
        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $query = "UPDATE task SET title = '$title', description = '$description' WHERE id = $id";

        mysqli_query($conexion, $query);
        $_SESSION['message'] = 'Task updated';
        $_SESSION['message_type'] = 'warning';
        header('Location: index.php');

    }

?>

<?php
    include('includes/header.php');
    include('includes/navbar.php');
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?id=<?php echo $_GET['id']?>" method="post">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control"
                               placeholder="Update title" value="<?php echo $title; ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control"
                                  placeholder="Update description"><?php echo $description; ?></textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>





