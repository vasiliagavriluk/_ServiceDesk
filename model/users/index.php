<?php

class users
{

    public function actionIndex() 
    {
      // Рендер главной страницы портала
      view::render('users','index');        
    }
    
    public function actionClose()
    {
        unset($_SESSION['user']);
        header ('Location: /'); 
        //view::render('login','index');  
        
    }
    
    public function actionProfile()
    {
        view::render('users','profile');  
        
    }
    
    
    
    

}
