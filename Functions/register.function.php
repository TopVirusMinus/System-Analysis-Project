<?php
    require_once "../Classes/Files.class.php";
    //appends the post request's elements in a string (record)
    function createUser($attribs){
        $record = "";
        $ct = 0;

        //hashes password using md5 hash
        $attribs['Password'] = md5($attribs['Password']);

        //removes the last element of the array which is empty
        unset($attribs["register"]);

        //removes confirm-password because we are not validating passowrds in this project :p
        unset($attribs["Confirm-Password"]);

        //sorts the record data to start with the main attributes
        $record = "";
        $mainAttribs = new File("../Database/mainAttribs.txt", "~");
        $myfile = fopen($mainAttribs->getDestination(), "r+") or die("Unable to open file!");
        $line = fgets($myfile);
        $lineArr = explode($mainAttribs->getSeparator(),$line);
        //creates a string of record sorted by main attribs
        foreach($lineArr as $a){
            $record .= $attribs[$a]."~";
            unset($attribs[$a]);
        } 

        $record .= implode("~", $attribs);

        $userFile = new File("../Database/users.txt", "~");
        $userFile->addRecord($record);
        //echo $record;
    }
?>    