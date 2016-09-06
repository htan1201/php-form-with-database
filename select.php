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
                printf("<li><span style='color: %s;'>%s (%s)</span></li>",
                    htmlspecialchars($row['color']),
                    htmlspecialchars($row['name']),
                    htmlspecialchars($row['gender'])
                );
            }

            mysqli_close($db);
        ?>
            
        </ul>
    </body>
</html>