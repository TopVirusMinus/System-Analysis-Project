<?php
    require_once ("IGetFromFile.interface.php");
    class getAllRecords implements IGetFromFile{
	function get($listpfparam) {
        if (!file_exists($listpfparam[0])) {
            return 0;
        }		
        $allKeywords = array();

        $myfile = fopen($listpfparam[0], "a+") or die("Unable to open file!");
        while(!feof($myfile)) 
        {
            $line = fgets($myfile);
            $ArrayLine = explode($listpfparam[1], $line);

            if(is_numeric($ArrayLine[0])){
                array_push($allKeywords, $ArrayLine);    
            }
        }
        return $allKeywords;
	}
}
?>