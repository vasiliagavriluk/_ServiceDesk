<?php

// start the timer for the page parse time log
  define('PAGE_PARSE_START_TIME', microtime(true));
  
  
  define('TITLE', 'Турне-Транс | ServiceDesk');
  define('LOGO', 'img/logo_aut.png');
  
  

//set utf by default  
  header('Content-type: text/html; charset=utf-8');

//check if user logged
    $allowed_modules = array(
        'users/login',
        'users/guest_login',
        'users/restore_password',
        'users/ldap_login',
        'users/signature_login',
        'users/photo',        
        'ext/public/form',
        'ext/public/check',
        'ext/public/form_inactive',
        'dashboard/vpic',  		
        'ext/telephony/save_call',
        'dashboard/select2_json',
        'dashboard/select2_ml_json',
        'export/xml',
        'export/file',
        'users/2step_verification',
        'users/login_by_phone',
        'dashboard/ajax_request',
        'subentity/form',
        'ext/map_reports/public',
        'dashboard/token_error',        
        'social_login/google',
        'social_login/vkontakte',
        'social_login/yandex',
        'social_login/facebook',
        'social_login/linkedin',
        'social_login/twitter',  
        'social_login/steam',
        'feeders/rss',
        'feeders/ical',
    );
 
/*
      $app_user = array(
          'id'=>$user['id'],          
          'group_id'=>(int)$user['field_6'],
          'group_name'=> $user['group_name'],
          'client_id'=> $user['client_id'],
          'multiple_access_groups' => $user['multiple_access_groups'], 
          'name'=> users::output_heading_from_item($user),
          'username'=>$user['field_12'],
          'email'=>$user['field_9'],
          'is_email_verified'=> $user['is_email_verified'],
          'photo'=>$photo,
          'language'=>$user['field_13'],
          'skin'=>$user['field_14'],
          'fields'=> $user,
                        ); 
 * 
 */

  
              