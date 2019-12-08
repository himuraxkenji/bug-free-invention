<?php
    include('db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $querry = "DELETE FROM task WHERE id = $id";
        $result = mysqli_query($conexion, $querry);

        if(!isset($result)){
            die('Query Failed');
        }
        $_SESSION['message'] = 'Task Remove Successfully';
        $_SESSION['message_type'] = 'danger';
        header('Location: index.php');
    }

?>