<!DOCTYPE>
<html>
    <head>
        <title>PHP</title>
    </head>
    <body>
        <ul>
        <?php 
            $db = mysqli_connect('localhost', 'root', '', 'php');
            $sql = 'SELECT * FROM users';
            $result = mysqli_query($db, $sql);

            foreach ($result as $row) {
                printf("<li><span style='color: %s;'>%s (%s)</span><a href='update.php?id=%s'>edit</a></li>",
                    htmlspecialchars($row['color']),
                    htmlspecialchars($row['name']),
                    htmlspecialchars($row['gender']),
                    htmlspecialchars($row['id'])
                );
            }

            mysqli_close($db);
        ?>
            
        </ul>
    </body>
</html>