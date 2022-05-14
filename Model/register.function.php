<?php
    require_once "../Model/Classes/Files.class.php";
    
    //appends the post request's elements in a string (record)
    function createUser($attribs){
        foreach($attribs as $a){
            echo $a."<br>";
        }
        $mainAttribs = new File("../Database/mainAttribs.txt");
        $users = new File("../Database/users.txt");

        //hashes password using md5 hash
        $attribs['Password'] = md5($attribs['Password']);
        
        //removes the last element of the array which is empty
        unset($attribs["register"]);
        
        //removes confirm-password because we are not validating passwords in this project :p
        unset($attribs["Confirm-Password"]);
        print_r($attribs);

        //sorts the record data to start with the main attributes
        $record = "";
        $myfile = fopen($mainAttribs->getDestination(), "r+") or die("Unable to open file!");
        $newline = fgets($myfile);
        $lineArr = explode($mainAttribs->getSeparator(),$newline);
        //creates a string of record sorted by main attribs
        foreach($lineArr as $a){
            echo "<br>".$a."<br>";
            $record .= $attribs[$a]."~";
            unset($attribs[$a]);
        } 

        //convert attribs arr to string and add to users file
        $record .= implode("~", $attribs);
        $users->addRecord($record);
        $_POST["id"] = $users->getLastId();

        //get 2d array of mergable attributes for the current usertype
        $merger = new File("../Database/mergable-attribs.txt");
        $mergeArr = $merger->getAllKeyword(0,$_POST["u-type"]);
        print_r($mergeArr);

        foreach($mergeArr as $m){
            //open the file to merge into
            $mergeFile = new File($m[3]);
            //get first mergable attribute
            $firstMerge = $_POST[$m[1]];
            //get Second mergable attribute            
            $secondMerge = $_POST[$m[2]];
            //merge the 2 attribs into a string with the separator
            $record = $firstMerge.$merger->getSeparator().$secondMerge;
            echo "<br>".$record;

            $mergeFile->addRecord($record, 0);
        }
        header("location:../Controllers/login.control.php");
    }
?>