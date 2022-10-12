<?php

class oktell {

    function __construct() {
        
    }
    
    public function actionIndex()
    {
      //  $data['TitleMess'] = $this->mssql_log();
        
        view::render('users','oktell');           
    }
    
    public function mssql_log()
    {
        
        try 
        {          
            
        $Temp = [];     
        $objPDO = new database();
        $db = $objPDO->getMSSQLConnection();	

        $sql = file_get_contents('temp/logi.sql');
        
        $result = $db->prepare($sql);             
        $result->execute();
        $row = $result->fetchAll();
        
        
//        while ($row = $result->fetchAll()) 
//        {             
//            $Temp[] = 
//                    [
//                        "DATABASE_NAME"=> $row['DATABASE_NAME'],
//                        "LOGICAL_NAME"=>$row['LOGICAL_NAME'],
//                        "FILE_SIZE_MB"=> $row['FILE_SIZE_MB'],
//                        "SPACE_USED_MB"=>$row['SPACE_USED_MB'],
//                        "FREE_SPACE_MB"=>$row['FREE_SPACE_MB']
//                    ];            
//        }
        
        return $row;
        
        
            
        } 
        catch (Exception $ex) 
        {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        
        
    }
    

}

