<?php
class login {

    function __construct() {
        

        
    }
    
    public function actionIndex() 
    {
         // Рендер главной страницы портала
            view::render('login','index');        
        
    }
    
    
    public function actionAut() 
    {
        $UserFIO  = $_POST['login'];
        $UserPass = $_POST['password'];
        $ldapserver = "192.168.2.7";  //"ldaps://server.domain.com";
        $ldapdomen = "turne.local"; 
        
        try 
        {           

            echo json_encode($this->AutMySQL($UserFIO,$UserPass)); 



           /*  if(!($ldap = ldap_connect("ldap://".$ldapserver))) 
            {
                print_r('error');
                
                //echo json_encode($this->AutMySQL($UserFIO,$UserPass)); 
            }
            else
            {
                $ldap = new ldap();            
                $user = $ldap->LDAPLogin($ldapserver, $ldapdomen , $UserFIO, $UserPass);
                if ($user) 
                    {
                        $_SESSION['user'] = $this->md5pass($user['name'].$UserFIO.$UserPass);                
                        $_SESSION['UserFIO'] = $user['name'];
                        $_SESSION['UserEmail'] =$user['mail'];
                        $array = ['Error'=>'false','Text'=>'users'];   
                    }
                    else
                    {
                        $array = ['Error'=>'true','Text'=>'Вы ввели неправильный логин/пароль']; 
                    }
                
                    echo json_encode($array);
            } */

        } 
        catch (Exception $ex) 
        {
           echo($ex->getMessage());
           //Kernel::logFile($ex->getMessage()); 
        }
    }

    function AutMySQL($UserFIO,$UserPass)
    {
        try 
        {     
            $UserPass = $this->md5pass($UserPass);
            $Temp = [];     
            $objPDO = new database();
            $db = $objPDO->getConnection();	
            $sql = ("SELECT * FROM FSecurite WHERE UserLogin = :UserLogin AND UserPass = :UserPass");  
            $result = $db->prepare($sql);
            $result->bindParam(':UserLogin',       $UserFIO,   PDO::PARAM_STR);
            $result->bindParam(':UserPass',        $UserPass,  PDO::PARAM_STR);
            $result->execute();            
            $user = $result->fetch();
            
            if ($user) 
            {
                $_SESSION['user'] = $this->md5pass($user['id'].$UserFIO.$UserPass);                
                $_SESSION['UserFIO'] = $user['UserFIO'];
                $_SESSION['UserPrava'] = $user['UserPrava'];
                $_SESSION['UserPhote'] =$user['UserPhote'];
                $_SESSION['UserEmail'] =$user['UserEmail'];
                

                $array = ['Error'=>'false','Text'=>'users'];                 
            }
            else
            {
                $array = ['Error'=>'true','Text'=>'Вы ввели неправильный логин/пароль']; 
            }     
            
            return $array;
            
        } 
        catch (Exception $ex) 
        {
            return ($ex->getMessage());
        }



    }
    
    function md5pass($pass)
    {
            $password = $pass;            // Сам пароль
            $hash = md5($password);            // Хешируем первоначальный пароль
            $salt = "yaWqtdnS9FITVOkZMhTXSGqOVM6cnRL1DkJ";            // Соль
            $saltedHash = md5($hash . $salt); // Складываем старый хеш с солью и пропускаем через функцию md5()
            return $saltedHash;
    }
    
    function isGuest()
        {
            if (isset($_SESSION['user'])) 
            {
                return false;
            }
            else {                     
                 return true;                
            }
        }
    
    

}
