<?php
    if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
        //checks if the user exsist
        $id = $_GET['id'];
    } else {
        //redirecting to another page
        header('Location: select.php');
    }
?>
<!DOCTYPE>
<html>
<head>
    <title>PHP</title>
</head>
<body>
    <?php 
        $db = mysqli_connect('localhost', 'root', '', 'php');
        $sql = "DELETE FROM users WHERE id=$id";
        mysqli_query($db, $sql);
        echo '<p>user deleted</p>';
        mysqli_close($db);
    ?>
</body>
</html>