<?php
    require_once ("IGetFromFile.interface.php");
    class getAllKeyword implements IGetFromFile{
	function get($listofparam) {
        $keyWord = trim($listofparam[3]);
        $listofparam[2] = trim($listofparam[2]);
        $allKeywords = array();
        
        if ( !file_exists($listofparam[0]) ) {
            return 0;
        }		
        
        $myfile = fopen($listofparam[0], "r+") or die("Unable to open file!");
        while(!feof($myfile)) 
        {
            $line= fgets($myfile);
            $ArrayLine=explode($listofparam[1],$line);

            if(strlen($line) == 0){
                break;
            }
            
            if($listofparam[2] < count($ArrayLine) and trim($ArrayLine[$listofparam[2]]) == trim($keyWord))
            {
                array_push($allKeywords,$ArrayLine);    
            }
        }
        return $allKeywords;
	}
}
?>