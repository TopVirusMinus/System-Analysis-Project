<?php
    session_start();
    if (empty($_SESSION)){
        echo "You need to login to view the dashboard! <br>";
        echo '<a href="login.control.php">Login</a>';
        exit;
    }

    $title = "Dashboard";
    require "../Views/header.php";
    echo '<a href="../Model/dologout.php">Log out</a>'
?>

<br>
<?php
    require_once $_SESSION["classLocation"];
    require_once "../Model/Classes/Files.class.php";
    require_once "../Views/permissionLinkView.php";
    //print_r($_SESSION);


    $UserObj = new $_SESSION["className"]($_SESSION["record"]);

    
    echo '<br>'.'<h2 style="color: #3C1FFF">Hello '.$UserObj->getName().'</h2><br>';


    $permissions = new File("../Database/permissions.txt");
    $permissions->setIGetFromFile(new GetAllKeyword());
    $permArr = $permissions->executeget(0,$UserObj->getUserType());
    
    echo "<br>";
    generateLinks($permArr);
?>

<?php
    require "../Views/footer.php";
?>