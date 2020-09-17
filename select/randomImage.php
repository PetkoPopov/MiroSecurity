<?php

 session_start();
?>
<body bgcolor="#173245">


    <?php
    require_once '../PDOconnection/PDOConnection.php';
    
    
    
    
    ?>
    <a href="../index.php">GO HOME</a>
    <form method="post">
        <input type="submit" value="setImage" name="notRobot" style="background-color: #cc6600;width: 222px;height: 44px"/>
    </form>
    <?php
//    var_dump($_POST);die;
    
    if (isset($_POST["notRobot"])&&$_POST['notRobot']=="setImage") {
//        $notRobot = '../' . $_POST['notRobot'];
        
                $k=rand(0,count($all)-1);
                $_SESSION['k']=$k;
        
//                var_dump($all[$k]['pics']);
                $picAdress='../'.$all[$k]['pics'];
               
                     
        ?>
        <img src="<?= $picAdress ?>" alt="sorry no pic" width="360" height="180"/>

        <?php
    }
    
    ?><form id="2" method="post">
        <div>
            <a Докажи че не си робот :P>
        <?=$all[$_SESSION['k']]['question']?></a>
        <input type="text"name="myAnswer"/>
        </div>
        <input type="submit" value="IM NOT A F**** ROBOT" />
        
</form>
        <?php
        
        if(!empty($_POST['myAnswer'])){
            $k=$_SESSION['k'];
            $myAnswer=$_POST['myAnswer'];
            var_dump($myAnswer);
            echo '<br/>';
            var_dump($all[$k]['answer']);
            if($myAnswer==$all[$k]['answer']){
                echo "YOU ARE NOT A ROBOT <h1>CONTINUE</h1> ";
            }else{
                echo '<h1> YOU ARE A ROBOT GO HOME </h1>';
            }
        }
        
        ?>
          
        

</body>

