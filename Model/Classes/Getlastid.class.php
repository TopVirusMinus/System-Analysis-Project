<?php
    require_once ("IGetFromFile.interface.php");
    class getLastId implements IGetFromFile{
	function get($listpfparam) {
        if ( !file_exists($listpfparam[0]) ) {
            return 0;
        }		
        
        $myfile = fopen($listpfparam[0], "r+") or die("Unable to open file!");
        $LastId=0;
        while(!feof($myfile)) 
        {
            $line= fgets($myfile);
            $ArrayLine=explode($listpfparam[1],$line);
            
            if ($ArrayLine[0]!="")
            {
                $LastId=$ArrayLine[0];	
            }
        }
        return (int)$LastId;
	}
}
?>