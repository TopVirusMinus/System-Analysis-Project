<?php
    Class File{
        private $destination = "";
        private $separator = "";

        public function __construct($destination, $separator)
        {
            $this->destination = $destination;
            $this->separator = $separator;
        }

        public function setDestination($destination)
        {
            $this->destination = $destination;
        }

        public function setSeparator($separator)
        {
            $this->separator = $separator;
        }

        public function getDestination()
        {
            return $this->destination;
        }

        public function getSeparator()
        {
            return $this->separator;
        }

        public function count()
        {
            return count(file($this->destination));
        }

        public function getIdRow($id)
        {
            if (!file_exists($this->destination) ) {
                return 0;
            }		
            $myfile = fopen($this->destination, "r+") or die("Unable to open file!");
            $LastId=0;
            while(!feof($myfile)) 
            {
                $newline= fgets($myfile);
                $ArrayLine=explode($this->separator,$newline);
                if (strval($ArrayLine[0]) == strval($id))
                {
                    fclose($myfile);
                    return $ArrayLine;	    
                }
             }
             return False;
        }

        public function getRowKeyword($keyWord){
            if (!file_exists($this->destination)) {
                return 0;
            }		
            
            $myfile = fopen($this->destination, "r+") or die("Unable to open file!");

            while(!feof($myfile)) 
            {
                //convert each record to array $newlineArr
                $newline=fgets($myfile);
                $newlineArr = explode($this->separator, $newline);

                //check if keyword exists in one of the $newlineArr cells
                foreach($newlineArr as $n){
                    //echo $n;
                    if($n == $keyWord){
                        return $newline;
                        fclose($myfile);
                    }
                
                }
            }
                fclose($myfile);
                return FALSE;
        }

        public function getAllRecords(){
            if (!file_exists($this->destination)) {
                return 0;
            }		
            $allKeywords = array();

            $myfile = fopen($this->destination, "a+") or die("Unable to open file!");
            while(!feof($myfile)) 
            {
                $line = fgets($myfile);
                $ArrayLine = explode($this->separator, $line);

                if(is_numeric($ArrayLine[0])){
                    array_push($allKeywords, $ArrayLine);    
                }
            }
            return $allKeywords;
        }

        public function addRecord($record, $addId = 1, $allowRepetition=1)
        {
            if (!file_exists($this->destination)) {
                return 0;
            }		
            
            $myfile = fopen($this->destination, "a+") or die("Unable to open file!");

            //convert file to array of lines
            if($addId == 1){
                $id = strval($this->getLastId() + 1)."~";
                $id .= $record;
                $record = $id;
            }
            // if($allowRepetition == 0){
            //     while(!feof($myfile)){
            //         $line= fgets($myfile);
            //         $Arrayline=explode($this->separator,$line);
            //         $record = explode($this->separator, $record);

            //         echo $Arrayline[0]." ".$record[0];
            //         if ($Arrayline[0] == $record[0]){
            //             return false;
            //         }
            //     }
            //     $record = implode($this->separator, $record);
            // }
            fwrite($myfile, $record."\r\n");
            fclose($myfile);
            return true;
            //echo $recordWithId; 
        }

        function getLastId()
        {
            
            if ( !file_exists($this->destination) ) {
                return 0;
            }		
            
            $myfile = fopen($this->destination, "r+") or die("Unable to open file!");
            $LastId=0;
            while(!feof($myfile)) 
            {
                $line= fgets($myfile);
                $ArrayLine=explode($this->separator,$line);
                
                if ($ArrayLine[0]!="")
                {
                    $LastId=$ArrayLine[0];	
                }
            }
            return (int)$LastId;	
        }

        function getAllKeyword($index, $keyWord)
        {
            $allKeywords = array();
            
            if ( !file_exists($this->destination) ) {
                return 0;
            }		
            
            $myfile = fopen($this->destination, "r+") or die("Unable to open file!");
            while(!feof($myfile)) 
            {
                $line= fgets($myfile);
                $ArrayLine=explode($this->separator,$line);

                if(strlen($line) == 0){
                    break;
                }

                if($index < count($ArrayLine) and $ArrayLine[$index] == $keyWord)
                {
                    array_push($allKeywords,$ArrayLine);    
                }
                
            }
            return $allKeywords;	
        }

        function deleteRecordbyId($id){
            if (!file_exists($this->destination) ) {
                return 0;
            }
            
            $myfile = fopen($this->destination, "r+") or die("Unable to open file!");
            
            while(!feof($myfile)) 
            {
                $line= fgets($myfile);
                $ArrayLine=explode($this->separator,$line);
                if (strval($ArrayLine[0]) == strval($id))
                {
                    $content = file_get_contents($this->destination);
                    $content = str_replace($line,"",$content);
                    file_put_contents($this->destination,$content);
                    fclose($myfile);
                    return true;
                }
            }
            return false;
        }
    }
?>