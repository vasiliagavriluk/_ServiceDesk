<?php
 /**
 * Example Implementation of PSR-0
 *
 * @param $className
 */

 class ldap {

     function __construct() {
        
    }
    
    public function LDAPLogin($server = "", $domain = "", $admin = "", $password = "")
    {   
        try 
        {
            if(!($ldap = ldap_connect("ldap://".$server))) return false;
            ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
            ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
            $ldapbind = @ldap_bind($ldap, $admin."@".$domain, $password);
            $dc = explode(".", $domain);
            $base_dn = "";
            foreach($dc as $_dc) $base_dn .= "dc=".$_dc.",";
            $base_dn = substr($base_dn, 0, -1);
            $sr=@ldap_search($ldap, $base_dn, "(&(objectClass=user)(objectCategory=person)(|(mail=*)(telephonenumber=*))(!(userAccountControl:1.2.840.113556.1.4.803:=2)))", array("cn", "dn", "memberof", "mail", "department", "title"));
            if(!($info = @ldap_get_entries($ldap, $sr)))return false;
            
            for($i = 0; $i < $info["count"]; $i++)
            {
                $users["name"] = $info[$i]["cn"][0];
                $users["mail"] = $info[$i]["mail"][0];
                $users["department"] = $info[$i]["department"][0];
                $users["title"] = $info[$i]["title"][0];
            }

            return $users;
        }
        catch (Exception $ex) 
        {
           return($ex->getMessage());
           //Kernel::logFile($ex->getMessage()); 
        }
    }

}
