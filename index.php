
<html>
    <head>
        <meta charset="UTF-8">
        <title>MIRO SECURITY MODEL</title>
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="security"/>
            <p>ЗАДАЙ ЗАГЛАВИЕ:<input type="text" name="title"/></p>
            <input type="submit"/>

        </form>
        <?php
        require_once './PDOconnection/PDOConnection.php';
        define('DATA_DIR', __DIR__ . '/pictures/');
//        var_dump(__DIR__);


        if (isset($_POST)) {
//            echo "<pre>";
//            var_dump($_FILES);
//            echo"</pre>";
            $title=$_POST['title'];
            $tmpName = $_FILES['security']['tmp_name'];
            $name = $_FILES['security']['name'];
            $unique = uniqid();
            $avatarName = $unique . '_' . $name; //сглобяв уникалмно име на нашия файл 
//        var_dump($avatarName);
            $avatarPath = DATA_DIR . $avatarName; // създваме пътя където ще стои нашия файл
            if (move_uploaded_file($tmpName, $avatarPath)) {
                $img = "pictures/$avatarName";

//            var_dump($img);
//            echo "<br/>";
//            var_dump("pictures/5f60bdc460a0c_Screenshot (15).png");
                ?>
                <img src="<?php echo $img ?>" width="366" height="180" alt="no pics"/>

                <?php
            }
        }

        $query = "INSERT INTO `pictures` ( `pics`,`title`) VALUES (:pics,:title)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":pics", $img);
        $stmt->bindParam(":title", $title);
        $stmt->execute();

?>
                <a href="select/selectImage.php">GO TO SELECT IMAGE</a>
    </body>
</html>
