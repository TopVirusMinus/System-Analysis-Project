<?php
    require_once ("IGetFromFile.interface.php");
    class getAllKeyword implements IGetFromFile{
	function get($listofparam) {
        $keyWord = trim($listofparam[3]);
        $listofparam[2] = trim($listofparam[2]);
        $allKeywords = array();
        
        if ( !file_exists(trim($listofparam[0])) ) {
            return 0;
        }		
        
        $myfile = fopen(trim($listofparam[0]), "r+") or die("Unable to open file!");
        while(!feof($myfile)) 
        {
            $line= fgets($myfile);
            $ArrayLine=explode(trim($listofparam[1]),$line);

            if(strlen($line) == 0){
                break;
            }
            
            if($listofparam[2] < count($ArrayLine) and trim($ArrayLine[$listofparam[2]]) == trim($keyWord))
            {
                array_push($allKeywords,$ArrayLine);    
            }
        }
        foreach($allKeywords as $a){
            $a = array_map('trim', $a);
        }
        return $allKeywords;
	}
}
?>