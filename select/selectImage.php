
<body bgcolor="#173245">
    
    
<?php
require_once '../PDOconnection/PDOConnection.php';
$query = "SELECT * FROM `pictures` ";
$stmt = $pdo->query($query);
$all = $stmt->fetchAll();
?>
    <a href="../index.php">GO HOME</a>
<form method="post">
    <select name="notRobot">
        <option value="32"></option>
        <?php
        foreach ($all as $singlePic) {
            ?>
            <option value="<?= $singlePic['pics'] ?>"><?= $singlePic['title'] ?></option>

            <?php
            echo '<br/>';
        }
        ?>
    </select>
    <input type="submit"/>
</form>
            <?php
            if(!empty($_POST["notRobot"])){
                $notRobot='../'.$_POST['notRobot'];
//                var_dump($notRobot);
                ?>
    <img src="<?=$notRobot?>" alt="sorry no pic" width="360" height="180"/>

<?php
            }
    if(isset($notRobot)){
         echo "<br/>";
        echo "<br/>NOT ROBOT";
    }    
?>
    
</body>

