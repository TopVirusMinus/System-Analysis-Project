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
                    echo $newline;	
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
            $id = strval($this->getLastId() + 1)."~";
            $id .= $record;
            $record = $id;
            
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
    }
?>