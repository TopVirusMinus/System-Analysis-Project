<?php
    require_once ("IGetFromFile.interface.php");
    class getLastId implements IGetFromFile{

    function get($listpfparam) {
        if ( !file_exists($listpfparam[0]) ) {
            return -1;
        }


        $myfile = fopen(trim($listpfparam[0]), "r+") or die("Unable to open file!");
        $max = 0;

        while(!feof($myfile)) 
        {
            $line= fgets($myfile);
            $ArrayLine=explode(trim($listpfparam[1]),$line);
            $max = max($ArrayLine[0], $max);
        }
        return (int)$max;
    }
}
?>