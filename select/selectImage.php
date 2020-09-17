<?php
session_start();
?>
<body bgcolor="#173245">


    <?php
    require_once '../PDOconnection/PDOConnection.php';
?>
    <a href="../index.php">GO HOME</a>
    <form method="post">
        <select name="notRobot"style="width: 222px;height: 44px">
            <option value="32"></option>
            <?php
            foreach ($all as $k=>$singlePic) {
                ?>
                <option value="<?= $k ?>"><?= $singlePic['title'] ?></option>

                <?php
                echo '<br/>';
            }
            ?>
        </select>
        <input type="submit" value="setImage" style="background-color: #cc6600;width: 222px;height: 44px"/>
    </form>
    <?php
    if (!empty($_POST["notRobot"])) {
//        $notRobot = '../' . $_POST['notRobot'];
        $key=$_POST['notRobot'];
        $_SESSION['key']=$key;
//                var_dump($all[$k]['pics']);
                $picAdress='../'.$all[$key]['pics'];
        ?>
        <img src="<?= $picAdress ?>" alt="sorry no pic" width="360" height="180"/>

      <form id="2" method="post">
        Докажи че не си робот :P
        <?=$all[$key]['question']?>
        <input type="text"name="myAnswer"/>
        <input type="submit" />
        
</form>
        <?php
    }  
        if(!empty($_POST['myAnswer'])){
            $myAnswer=$_POST['myAnswer'];
            var_dump($myAnswer);
            echo '<br/>';
            $key=$_SESSION['key'];
            var_dump($all[$key]['answer']);
//            die;
            if($myAnswer==$all[$key]['answer']){
                echo "<h1>YOU ARE NOT A ROBOT</h1> ";
            }else{
                echo '<h1>YOU ARE A ROBOT GO HOME</h1>';
            }
        }
        
        ?>
          
        

</body>

