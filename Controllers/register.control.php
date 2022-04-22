<?php
    /* includes header.php that contains header tags and edits its title */
    $title = "Register";
    require_once "../Views/header.php";
?>

<form action="register.control.php" method="post">
        <?php
            //includes file class
            require_once "../Classes/Files.class.php";

            //file 'f' that points to user-type file, with a separator '~'
            $f = new File("../Database/user-type.txt","~");

            //loops until i == file-line-size
            for($i = 1; $i < $f->count();$i++){

                //gets an array of user-type with the id 'i'
                // e.g [1, student] for i = 1, [2, teacher] for i == 2
                $line = $f->getIdRow($i);

                /* creates a button with name 'user-type' & value "id of the user" and
                   the content of the button is the name of the user */

                if($line[0] != 3){ //doesn't display a button for admin 
                    echo '<button type="submit" name="user-type" value="'.$line[0].'">'.$line[1].'</button>';
                }
            }
        ?>
        <br>
        <br>
</form>

<form action="register.control.php" method="post">
    <?php
        $f = new File("../Database/user-login-attribs-perms.txt","~");
        
        //checks if we clicked on a button (in the first form)
        if(isset($_POST['user-type'])){
            //puts the content of signup-main.php in a form <see cref="DoSomething" />
            require_once "../Views/signup-main.php";
            //$line = array of specific attributes per user
            $line = $f->getIdRow($_POST['user-type']);
            if($line){
                for($i = 2; $i<count($line); $i++){
                    //generate input fields with the attribute name and type from the text file
                    echo '<input required type="'.$line[1].'" placeholder='.'"Enter '.$line[$i].'"'.'name="'.$line[$i].'"'.'id=""><br><br>';
                }
            }
            echo '<input type="hidden" name = "u-type" value ='.'"'.$_POST['user-type'].'" />';
        }
    ?>
    <!-- registeration submit button -->
    <button type="submit" name="register">Register</button>
</form>

<?php
    //when register button is pressed creating user function is called
    if(isset($_POST["register"])){
        require_once "../Functions/register.function.php";
        createUser($_POST);
    }
?>

<br>
<br>
<br>
<span>Have an account?</span>
<a href="login.control.php">Sign in</a></body>

<?php
    //includes footer and body, html closed tags
    require_once "../Views/footer.php";
?>