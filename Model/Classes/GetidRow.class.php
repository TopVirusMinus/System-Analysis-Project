<?php
    require_once ("IGetFromFile.interface.php");
    class getIdRow implements IGetFromFile {
	function get($listofparam) {
        $id = trim($listofparam[2]);
            if (!file_exists($listofparam[0]) ) {
                return 0;
            }		
            $myfile = fopen($listofparam[0], "r+") or die("Unable to open file!");
            $LastId=0;
            while(!feof($myfile)) 
            {
                $newline= fgets($myfile);
                $ArrayLine=explode($listofparam[1],$newline);
                if (strval($ArrayLine[0]) == strval($id))
                {
                    fclose($myfile);
                    return $ArrayLine;	    
                }
            }
            return False;
	}
}
?>