<?php
    require_once "GetAllKeyword.php";
    require_once "Getallrecord.class.php";
    require_once "GetidRow.class.php";
    require_once "Getlastid.class.php";
    require_once "GetRowKeyword.class.php";
    Class File{
        protected $destination = "";
        protected $separator = "";
        protected $IGetFromFile;
        public function __construct($destination, $separator = "~")
        {
            $destination = trim($destination);
            $this->destination = $destination;
            $this->separator = $separator;
        }
        public function executeget(...$listofparam){
            array_unshift($listofparam,$this->destination,$this->separator);
            //print_r($listofparam);
            return $this->IGetFromFile->get($listofparam);
        }
        public function setIGetFromFile($GetFromFile){
            $this->IGetFromFile = $GetFromFile;
        }
        public function getGetFromFile(){
            return $this->IGetFromFile;
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
    

        // public function getIdRow($id)
        // {   
        //     $id = trim($id);
        //     if (!file_exists($this->destination) ) {
        //         return 0;
        //     }		
        //     $myfile = fopen($this->destination, "r+") or die("Unable to open file!");
        //     $LastId=0;
        //     while(!feof($myfile)) 
        //     {
        //         $newline= fgets($myfile);
        //         $ArrayLine=explode($this->separator,$newline);
        //         if (strval($ArrayLine[0]) == strval($id))
        //         {
        //             fclose($myfile);
        //             return $ArrayLine;	    
        //         }
        //      }
        //      return array();
        // }

        
        public function displayAllUserTable(){
            $this->setIGetFromFile(new GetAllKeyword());
            $allRecords = $this->executeget();
            $userObjArray = array();
            foreach($allRecords as $a){
                print_r($a);
                $this->setIGetFromFile(new GetidRow());
                $userRecord = $this->executeget($a[0]);
                if($userRecord[1] != 3){
                    $user = new Account($userRecord);
                    array_push($userObjArray, $user);
                }
            }

            //display the content in table
            for($i=0;$i<count($userObjArray);$i++)
            {
                echo '<tr><td>'.$userObjArray[$i]->getId().'</td><td>'.$userObjArray[$i]->getUserType().'</td><td>'.$userObjArray[$i]->getName().'</td><td>'.$userObjArray[$i]->getEmail().'</td><td>'.$userObjArray[$i]->getPass().'</td><td><a href="../Model/removeRecord.php?source=../Views/manageUsers.php&destination=../Database/users.txt&id='.$userObjArray[$i]->getId().'">Remove</a><td><a href="../Model/updateRecordFunction.php?id='.$userObjArray[$i]->getId().'">Update</a></td></tr>';
            }
            echo "</table>";
        }


        public function addRecord($record, $addId = 1, $allowRepetition=1)
        {
            $record = trim($record);
            if (!file_exists($this->destination)) {
                return 0;
            }		
            
            $myfile = fopen($this->destination, "a+") or die("Unable to open file!");

            //convert file to array of lines
            if($addId == 1){
                $this->setIGetFromFile(new Getlastid());
                $id = strval($this->executeget() + 1)."~";
                $id .= $record;
                $record = $id;
            }

            fwrite($myfile, $record."\r\n");
            fclose($myfile);
            return true;
            //echo $recordWithId; 
        }
        function drawtablefromfile($source, $destination)
        {
            $myfile=fopen($this->destination,"r+")or die ("unable to open the file!");
            $ctLine = 0;
            echo '<table border="2px">';
            while(!feof($myfile))
            {
                $line=fgets($myfile);
                $arrayline=explode($this->separator,$line);
                echo "<tr>";
                for($i=0;$i<count($arrayline);$i++)
                {
                    echo "<td>".$arrayline[$i]."</td>";
                }
                if( $ctLine < count($arrayline) - 1){
                    echo '<td><a href="../Model/removeRecord.php?source='.$source.'&destination='.$destination.'&index=0&id='.$arrayline[0].'">Remove</a></td>';
                    echo '<td><a href="../Views/updateRecordView.php?source='.$source.'&destination='.$destination.'&id='.$arrayline[0].'">Update</a></td>';
                    echo "</tr>";
                }
                
            }
            echo '<td><a href="../Views/addRecordView.php?source='.$source.'&destination='.$destination.'">Add</a></td>';
            echo '<br>';
            echo '<br>';
            fclose($myfile); 
            echo "</table>";
        }
        
        // function drawtablefromfile($source, $excludeRows, $index,$keyWord="", ...$CRUD)
        // {
        //     $source = trim($source);
        //     $myfile=fopen($this->destination,"r+")or die ("unable to open the file!");
        //     $ctLine = 0;
        //     echo '<table border=2px>';
        //     if($index == -1){
        //         while(!feof($myfile))
        //         {
        //             $line=fgets($myfile);
        //             $arrayline=explode($this->separator,$line);
        //             echo "<tr>";
        //             for($i=0;$i<count($arrayline);$i++)
        //             {
        //                 if(count($excludeRows) == 0){
        //                     echo "<td>".$arrayline[$i]."</td>";
        //                 }
        //                 else if(!in_array($i, $excludeRows)){
        //                     echo "<td>".$arrayline[$i]."</td>";
        //                 }
                        
        //             }
        //             if( $ctLine < count($arrayline) - 1){
        //                 if($remove == 1){
        //                     echo '<td><a href="../Model/removeRecord.php?source='.$source.'&destination='.$this->destination.'&index=0&id='.$arrayline[0].'">Remove</a></td>';
        //                 }
        //                 if($update == 1){
        //                     echo '<td><a href="../Views/updateRecordView.php?source='.$source.'&destination='.$this->destination.'&id='.$arrayline[0].'">Update</a></td>';
        //                 }
        //                 echo "</tr>";
        //             }
                    
        //         }
        //         echo "</table>";
        //     }
        //     else{
        //         $line=fgets($myfile);
        //         $arrayline=explode($this->separator,$line);
        //         $criteria = $this->getAllKeyword($index, $keyWord);
        //         print_r($criteria);
        //         print_r($arrayline);
                
        //         for($j = 0; $j < count($criteria[0]);$j++){
        //             if(!in_array($j, $excludeRows)){
        //                 echo "<td>".$arrayline[$j]."</td>";
        //             }
        //         }
        //         echo "</tr>";
        //         foreach($criteria as $c){
        //             for($j = 0; $j < count($c);$j++){
        //                 if(!in_array($j, $excludeRows)){
        //                     echo "<td>".$c[$j]."</td>";
        //                 }
        //             }
        //             echo "</tr>";
        //         }

        //     }
        //     if($add == 1){
        //         echo '<td><a href="../Views/addRecordView.php?source='.$source.'&destination='.$this->destination.'">Add</a></td>';
        //     }
        //     echo '<br>';
        //     echo '<br>';
        //     fclose($myfile); 
        // }
        
        function deleteRecordbyId($id){
            $id = trim($id);
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

        function updateRecord($id){
            $data = file('test.txt'); // reads an array of lines
            function replace_a_line($data) {
            if (stristr($data, 'thfn')) {
                return "2,sayed\n";
            }
            return $data;
            }
            $data = array_map('replace_a_line',$data);
            file_put_contents('test.txt', implode('', $data));
        }
        function deleteRecordbyKeyword($index, $keyword){
            $keyword = trim($keyword);

            if (!file_exists($this->destination) ) {
                return 0;
            }
            
            $myfile = fopen($this->destination, "r+") or die("Unable to open file!");
            
            while(!feof($myfile)) 
            {
                $line= fgets($myfile);
                $ArrayLine=explode($this->separator,$line);
                if ($ArrayLine[$index] == $keyword)
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