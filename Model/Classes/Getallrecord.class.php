<?php
    require_once ("IGetFromFile.interface.php");
    class getAllRecords implements IGetFromFile{
	function get($listpfparam) {
        if (!file_exists(trim($listpfparam[0]))) {
            return 0;
        }		
        $allKeywords = array();

        $myfile = fopen(trim($listpfparam[0]), "a+") or die("Unable to open file!");
        while(!feof($myfile)) 
        {
            $line = fgets($myfile);
            $ArrayLine = explode(trim($listpfparam[1]), $line);

            if(is_numeric(trim($ArrayLine[0]))){
                array_push($allKeywords, $ArrayLine);    
            }
        }
        foreach($allKeywords as $a){
            $a = array_map('trim', $a);
        }
        return $allKeywords;
	}
}
?>