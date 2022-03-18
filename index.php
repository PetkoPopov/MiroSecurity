<?php session_start();?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MIRO SECURITY MODEL</title>
    </head>
    <body bgcolor="#aa5509">
        <form method="post" enctype="multipart/form-data">
            <div>
                <input type="file" name="security" style="background-color: aquamarine"/>
            <p>ЗАДАЙ ЗАГЛАВИЕ:<input type="text" name="title"/></p>
            <p>ЗАДАЙ ВЪПРОС:<input type="text" name="question"/></p>
            <p>ЗАДАЙ ОТГОВОР:
                <input type="text" name="answer"/></p>
            <input type="submit" value="ДОБАВИ" style="width: 144px;background-color: cyan"/>
            </div>
        </form>
        <?php
        require_once './PDOconnection/PDOConnection.php';
        define('DATA_DIR', __DIR__ . '/pictures/');
//        var_dump(__DIR__);
if(isset($_POST['title'])){
    $title=$_POST['title'];
}else{
    echo "no titile";
}
if(isset($_POST['question'])){
    $question=$_POST['question'];
}else{
    echo "n question"; 
}
if(isset($_POST['answer'])){
    $answer=$_POST['answer'];
}else{
     
}
        if (!empty($_POST)) {
            
            $tmpName = $_FILES['security']['tmp_name'];
            $name = $_FILES['security']['name'];
            $unique = uniqid();
            $avatarName = $unique . '_' . $name; //сглобяв уникалмно име на нашия файл 
//        var_dump($avatarName);
            $avatarPath = DATA_DIR . $avatarName; // създваме пътя където ще стои нашия файл
            if (move_uploaded_file($tmpName, $avatarPath)) {
                $img = "pictures/$avatarName";
   ?>
                <img src="<?php echo $img ?>" width="366" height="180" alt="no pics"/>

                <?php
            }
        }

        $query = "INSERT INTO `pictures` ( `pics`,`title`,`question`,answer) VALUES (:pics,:title,:question,:answer)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":pics", $img);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":question", $question);
        $stmt->bindParam(":answer", $answer);
        $stmt->execute();

?>
                <div>
                <a href="select/selectImage.php">GO TO SELECT IMAGE</a>
                <p></p>
             
                   <a href="select/randomImage.php">GO TO RANDOM IMAGE</a>
                   <p>   <a href="select/allImages.php">GO TO VIEW ALL IMAGE</a></p>
                </div>
                </body>
</html>
