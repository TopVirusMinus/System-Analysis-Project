<?php
    require_once ("IGetFromFile.interface.php");
    class getRowKeyword implements IGetFromFile{
	function get($listpfparam) {
        $keyWord = trim($listpfparam[2]);
        $index = -1;
        print_r($listpfparam);
        if (!file_exists($listpfparam[0])) {
            return 0;
        }		
        
        $myfile = fopen($listpfparam[0], "r+") or die("Unable to open file!");

        while(!feof($myfile)) 
        {
            //convert each record to array $newlineArr
            $newline=fgets($myfile);
            $newlineArr = explode($listpfparam[1], $newline);

            //check if keyword exists in one of the $newlineArr cells
            if($index == -1){
                foreach($newlineArr as $n){
                //echo $n;
                    if($n == $keyWord){
                        fclose($myfile);
                        return $newlineArr;
                    }
                }
            }
            else{
                if($newlineArr[$index] == $keyWord){
                    fclose($myfile);
                    return $newlineArr;
                }
            }
            
        }
            fclose($myfile);
            return FALSE;
    }
}
?>