<?php
    require_once "../Classes/Files.class.php";
    //appends the post request's elements in a string (record)
    function createUser($attribs){
        foreach($attribs as $a){
            echo $a."<br>";
        }
        $mainAttribs = new File("../Database/mainAttribs.txt", "~");
        $users = new File("../Database/users.txt", "~");

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

        $record .= implode("~", $attribs);
        $users->addRecord($record);
    }
?>    