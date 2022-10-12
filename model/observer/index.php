<?php

class observer
{
    public function actionIndex() 
    {
      $data['ViewRobMonitor'] =  $this->GetViewRobMonitor();      
      // Рендер главной страницы портала
      view::render('users','observer',$data);
        
    }
    
    
    public function GetViewRobMonitor()
    {
        try 
        {          
            
        $Temp = [];     
        $objPDO = new database();
        $db = $objPDO->getConnection();	

        $sql = ("SELECT * FROM FRobMon");  
        $result = $db->prepare($sql);        
        $result->execute();
        while ($row = $result->fetch()) 
        {             
            $Temp[] = 
                    [
                        "ИмяСервера"=> $row['NameServer'],
                        "ИмяРобота"=>$row['NameRobot'],
                        "ДатаВремя"=> $row['DataTime'],
                        "Message"=>$row['Message']
                    ];            
        }
        
        return $Temp;           
            
        } 
        catch (Exception $ex) 
        {
//            Kernel::logFile($ex->getMessage());
        }
        
        
    }
    
    
    
    
}

