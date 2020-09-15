<?php
require_once '../PDOconnection/PDOConnection.php';
$query = "SELECT * FROM `pictures` ";
$stmt = $pdo->query($query);
$all = $stmt->fetchAll();
?>
<form method="post">
    <select name="notRobot">
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
                var_dump($notRobot);
                ?>
    <img src="<?=$notRobot?>" alt="sorry no pic" width="360" height="180"/>

<?php
            }
        



