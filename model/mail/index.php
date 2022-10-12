<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
declare(strict_types=1);

class mail {
    
   // use PhpImap\Exceptions\ConnectionException;
   // use PhpImap\Mailbox;
    
    function __construct() {
       // $this->EmailRead();
    }
    
    public function actionIndex() 
    {

        $this->EmailRead(); //запуск загрузки сообщений
        
        $data['ViewEmail'] =  $this->GetViewEmail();      
        // Рендер главной страницы портала
        view::render('mail','index',$data);        
    }
    
    public function GetViewEmail()
    {
        try 
        {          
            
        $Temp = [];     
        $objPDO = new database();
        $db = $objPDO->getConnection();	

        $sql = ("SELECT * FROM FEmail");  
        $result = $db->prepare($sql);        
        $result->execute();
        while ($row = $result->fetch()) 
        {             
            $Temp[] = 
                    [
                        "id"=> $row['ID'],
                        "FromName"=>$row['FromName'],
                        "Subject"=> $row['Subject'],
                        "DateEmail"=>$row['DateEmail']
                    ];            
        }
        
        return $Temp;           
            
        } 
        catch (Exception $ex) 
        {
//            Kernel::logFile($ex->getMessage());
        }
        
    }
    
    public function actionEmail_detail() 
    {
      $data['ViewEmail_detail'] =  $this->GetViewEmail_detail($_POST['id']);
      // Рендер страницы
      view::render('mail','email_detail',$data);        
    }
    
    public function GetViewEmail_detail($id)
    {
        try 
        {          
            
        $Temp = [];     
        $objPDO = new database();
        $db = $objPDO->getConnection();	

        $sql = ("SELECT * FROM `FEmail` WHERE `ID` = :ID");  
        $result = $db->prepare($sql);
        $result->bindParam(':ID',       $id,  PDO::PARAM_STR);
        $result->execute();
        while ($row = $result->fetch()) 
        {       
            
            $Message = $this->RenameCID($row['IDEmail'],$row['Message']);
            $Temp[] = 
                    [
                        "id"=> $row['ID'],
                        "FromAddress"=> $row['FromAddress'],                        
                        "FromName"=>$row['FromName'],
                        "Subject"=> $row['Subject'],
                        "DateEmail"=> $row['DateEmail'],
                        "Message"=> $Message
                        
                    ];            
        }
        
        return $Temp;           
            
        } 
        catch (Exception $ex) 
        {
//            Kernel::logFile($ex->getMessage());
        }
        
    }
    
    
    public function  RenameCID($IDEmail, $Message)
    {
        $objPDO = new database();
        $db = $objPDO->getConnection();	

        $sql = ("SELECT * FROM `FEmail_attach` WHERE `IDEmail` = :IDEmail");  
        $result = $db->prepare($sql);
        $result->bindParam(':IDEmail',       $IDEmail,  PDO::PARAM_STR);
        $result->execute();
        while ($row = $result->fetch()) 
        {         
            $Message = str_replace('cid:'.$row['ContentId'], 'data:image;base64,'.base64_encode($row['Data']) , $Message);
            // удаляет только теги <html>
            $Message = str_ireplace('<html>', '', str_ireplace('</html>', '', $Message));
            
        }
        
        return $Message;
        

    }

    





    //////////////////////////////////////
    public function EmailRead()
    {
         try 
            {
             
                        
            $Config = parse_ini_file(PathList::GetPath(PathList::FILE_PATH_CONFIG)."config.ini", true);	
            $hostname   = $Config['IMAP']['hostname'];
            $username   = $Config['IMAP']['username'];
            $password   = $Config['IMAP']['password'];
            
            $mailbox = new PhpImap\Mailbox(
                $hostname, // IMAP server and mailbox folder
                $username, // Username for the before configured mailbox
                $password // Password for the before configured username
            );
            
            // Если вы не определили кодировку сервера (кодировку) в 'new Mailbox()', вы можете изменить ее в любое время.
            $mailbox->setServerEncoding('US-ASCII');

            try {
                $mail_ids = $mailbox->searchMailbox('ALL');
            } catch (ConnectionException $ex) {
                exit('IMAP connection failed: '.$ex->getMessage());
            } catch (Exception $ex) {
                exit('An error occured: '.$ex->getMessage());
            }
            
            
            
            foreach ($mail_ids as $mail_id) 
                {
                $objPDO = new database();
                $db = $objPDO->getConnection(); 
                $sql = ("INSERT INTO FEmail (FromName, FromAddress, ToAddress, Subject, Message, IDEmail, DateEmail, Attach) VALUES (:FromName, :FromAddress, :ToAddress, :Subject, :Message, :IDEmail, :DateEmail, :Attach)");			                
                $result = $db->prepare($sql);
                
                $email = $mailbox->getMail(
                    $mail_id, // ID письма, которое вы хотите получить
                    TRUE // false НЕ отмечайте электронные письма как просмотренные (необязательно)
                );
                
                $IDEmail = $this->clear_quotes($email->messageId);
                $FromName = $email->fromName ?? $email->fromAddress;
                $Date = date('Y-m-d H:i:s',strtotime($email->date));
                $Attach = $email->hasAttachments();
                
                $result->bindParam(':IDEmail',     $IDEmail,                                    PDO::PARAM_STR); //Id сообщения                
                $result->bindParam(':FromName',    $FromName,                                   PDO::PARAM_STR);
                $result->bindParam(':FromAddress', $email->fromAddress,                         PDO::PARAM_STR);
                $result->bindParam(':ToAddress',   $email->toString,                            PDO::PARAM_STR);
                $result->bindParam(':Subject',     $email->subject,                             PDO::PARAM_STR);               
                $result->bindParam(':DateEmail',   $Date,                                       PDO::PARAM_STR);
                $result->bindParam(':Attach',      $Attach,                                     PDO::PARAM_STR); //проверка на вложения (1 есть 0 нет)
                
                //Посчет кол-ва вложений  echo \count($email->getAttachments())." attachements\n";
                                    
                $contentId = '';    
                // Сохранение вложения по одному
                if (!$mailbox->getAttachmentsIgnore()) 
                    {   
                        $attachments = $email->getAttachments();
                        foreach ($attachments as $attachment) 
                            {   
                                $sizeInBytes = $this->convert_bytes($attachment->sizeInBytes);    
                                if ($attachment->contentId){$contentId = $attachment->contentId;}else {$contentId = '';}
                                $Data = $attachment->getContents();
                                
                                
                                $AttPDO = new database();
                                $AttDB = $AttPDO->getConnection(); 
                                $AttSql = ("INSERT INTO FEmail_attach (IDEmail, SubType, Filename, SizeBytes, ContentId, Data) VALUES (:IDEmail, :SubType, :Filename, :SizeBytes, :ContentId, :Data)");			                
                                $AttResult = $AttDB->prepare($AttSql); 
                                $AttResult->bindParam(':IDEmail',       $IDEmail,                                      PDO::PARAM_STR); //Id сообщения
                                $AttResult->bindParam(':SubType',       $attachment->subtype,                          PDO::PARAM_STR); //Тип файла
                                $AttResult->bindParam(':Filename',      $attachment->name,                             PDO::PARAM_STR); //Имя файла
                                $AttResult->bindParam(':SizeBytes',     $sizeInBytes,                                  PDO::PARAM_STR); //Размер файла Мб    
                                $AttResult->bindParam(':ContentId',     $contentId,                                    PDO::PARAM_STR); //вложение добавлинное в тело сообщения
                                $AttResult->bindParam(':Data',          $Data,                                         PDO::PARAM_STR); //сам файл Data 
                                $AttResult->execute();
                                // $contentId = 'cid:'.$attachment->contentId;  
                            }
                    }
                    
                    
                    
                if ($email->textHtml) 
                    {
                   // $textHtml = str_replace((string) $contentId, '',  $email->textHtml);
                    //$textHtml = strip_tags(trim($email->textHtml));
                    $textHtml = $email->textHtml;
                    
                    
                    $result->bindParam(':Message', $textHtml , PDO::PARAM_STR);
                    
                } else {
                  //  $textPlain = str_replace((string) $contentId, '',  $email->textPlain);
                    $textPlain = strip_tags(trim($email->textPlain));
                    $result->bindParam(':Message', $textPlain ,   PDO::PARAM_STR);
                }
                
                $result->execute();

                if (!empty($email->autoSubmitted)) {
                    // Отметить письмо как "прочитанное"/"прочитанное"
                    $mailbox->markMailAsRead($mail_id);
                }

                if (!empty($email_content->precedence)) {
                    // Отметить письмо как "прочитанное"/"прочитанное"
                    $mailbox->markMailAsRead($mail_id);
                }
                
                $mailbox->deleteMail($mail_id);
            }

            $mailbox->disconnect();
            
            
            
        }
        catch (Exception $ex)
        {
            var_dump($ex->getMessage());                    
        }
    }
    
    
    
    public function convert_bytes($size)
    {
            $i = 0;
            while (floor($size / 1024) > 0) {
                    ++$i;
                    $size /= 1024;
            }

            $size = str_replace('.', ',', round($size, 1));
            switch ($i) {
                    case 0: return $size .= ' байт';
                    case 1: return $size .= ' КБ';
                    case 2: return $size .= ' МБ';
            }
    }
    
    
    public function clear_quotes($text)
    {
        return trim($text, '< >');
    }

    public function Repeal($fromAddress)
	{ 
            switch ( $fromAddress ) 
                {
                    case 'backup@turne-trans.ru':		
                        return 'false';	
                    break;
                
                    case 'crm@turne-trans.ru':		
                        return 'false';	
                    break;      
                
                    case 'zakaz@turne-trans.ru':		
                        return 'false';	
                    break;  
                
                    case 'support@ufs-online.ru':		
                        return 'false';	
                    break;  
                
                    default:					
                        return 'true';  	
                    break;

                }
            
        }
    
    
    
    
    
    
    
    
    
}

