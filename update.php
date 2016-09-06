<?php
        if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
        //checks if the user exsist
        $id = $_GET['id'];
    } else {
        //redirecting to another page
        header('Location: select.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
</head>
<body>
<?php
    $name = '';
    $gender = '';
    $color = '';


    if (isset($_POST['submit'])) {
        $ok = true;

        if (!isset($_POST['name']) || $_POST['name'] === '') {
            $ok = false;
        } else {
            $name = $_POST['name'];
        }

        if (!isset($_POST['gender']) || $_POST['gender'] === '') {
            $ok = false;
        }  else {
            $gender = $_POST['gender'];
        }


        if (!isset($_POST['color']) || $_POST['color'] === '') {
            $ok = false;
        } else {
            $color = $_POST['color'];
        }


        if ($ok) {
            $db = mysqli_connect('localhost', 'root', '', 'php');
            $sql = sprintf("UPDATE users SET name='%s', gender='%s', color='%s' WHERE id=%s", 
            mysqli_real_escape_string($db, $name),
            mysqli_real_escape_string($db, $gender),
            mysqli_real_escape_string($db, $color),
            $id);
            mysqli_query($db, $sql);
            echo '<p>User updated.</p>';
            mysqli_close($db);
        }

    } else {
        $db = mysqli_connect('localhost', 'root', '', 'php');
        $sql = sprintf('SELECT * FROM users WHERE id=%s', $id);
        $result = mysqli_query($db, $sql);
        foreach ($result as $row) {
            $name = $row['name'];
            $gender = $row['gender'];
            $color = $row['color'];
        }
        mysqli_close($db);
    }
?>
    <form method="post" action="">
    User Name: <input type="text" name="name" value="<?php
        echo htmlspecialchars($name); 
    ?>"><br>
    Gender:
        <input type="radio" name="gender" value="f" <?php 
        if ($gender === 'f') {
            echo ' checked';
        }
        ?>>female
        <input type="radio" name="gender" value="m" <?php 
        if ($gender === 'm') {
            echo ' checked';
        }
        ?>>male<br>
    Favorite color:
        <select name="color">
            <option value="">Please select</option>
            <option value="#f00" <?php 
            if ($color === '#f00') {
                echo ' selected';
            }
            ?>>red</option>
            <option value="#0f0" <?php 
            if ($color === '#0f0') {
                echo ' selected';
            }?>>green</option>
            <option value="#00f" <?php 
            if ($color === '#00f') {
                echo ' selected';
            }?>>blue</option>
        </select><br>
    <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>