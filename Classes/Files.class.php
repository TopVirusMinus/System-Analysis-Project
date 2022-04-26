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

        public function addRecord($record, $addId = 1)
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
            fwrite($myfile, $record."\r\n");
            fclose($myfile);
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

                if($ArrayLine[$index] == $keyWord)
                {
                    array_push($allKeywords,$ArrayLine);    
                }
                
            }
            return $allKeywords;	
        }
    }

?>