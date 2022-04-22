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
            //checks if $keyword exists inside the string->newline else return false
            while(!feof($myfile)) 
            {
                $newline=fgets($myfile);

                //returns the location of $keyword inside the string -> $newline
                $i=strpos($newline, $keyWord);
                
                if ($i>=0 && $i !=null)
                {
                    //echo $keyWord."####".$newline;
                    fclose($myfile);	
                    return $newline;
                }
            }
            fclose($myfile);	
            return FALSE;
    }

        public function addRecord($record)
        {
            if (!file_exists($this->destination)) {
                return 0;
            }		
            $myfile = fopen($this->destination, "a+") or die("Unable to open file!");

            //convert file to array of lines
            $fileArr = file($this->destination);
            $lastLine = $fileArr[count($fileArr) - 1];
            $lastLineArr = explode("~", $lastLine);
            $id = (int)$lastLineArr[0] + 1;
            
            $recordWithId = $id.$this->separator.$record;
            fwrite($myfile, $recordWithId."\r\n");
            fclose($myfile);
            //echo $recordWithId; 
        }
    }
?>