<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE  ?>  </title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/notifications.css"  type="text/css"/>
    
    <script src="https://code.jquery.com/jquery-3.6.0.js" type="text/javascript"></script>
    <script src="js/notifications.js" type="text/javascript"></script>
    <script src="js/my.js" type="text/javascript" type="text/javascript"></script>
    
    <!-- OKTELL -->
    <link rel="stylesheet" href="css/oktell-panel.css" />
    <script type='text/javascript' charset='utf-8' src='js/oktell/oktell.js'></script>
    <script type='text/javascript' charset='utf-8' src='js/oktell/oktell-voice.js'></script>
    <script type='text/javascript' charset='utf-8' src='js/oktell/oktell-panel.js'></script>
    <!-- END OKTELL -->
    
    
    
 </head>
 <!-- END HEAD -->
 <body>
    <div class="nav_top">   
          <div class="nav_logo">
              <a href="/" class="logo">
                  <img src="img/logo.png" alt="Logo"/>
                  <div class="nav_logo-text">
                      <?php echo TITLE  ?>
                  </div>
              </a>            
          </div>
        <div class="nav_list">
          <div class="nav_search">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search..." id="top-search">
                    <button class="btn-search input-group-text" type="submit">
                        <i class="search-icon"></i>
                    </button>
                </div>
          </div>
          <div class="nav_icon">
                <button class="input-group-text" type="submit">
                        <i class="noti-icon"></i>
                </button>
          </div>
            <div class="nav_user">
                <div class="menu-item dropdown dropdown-mobile-full">
                    <button class="dropdown-menu-btn" type="submit">
                        <img src="img/users/user2-160x160.jpg" alt="user-image" class="rounded-circle">                
                        <span class="nav_user-name">
                            <?php echo($_SESSION['UserFIO']);?> <i class="chevron-down"></i> 
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
     
     <div class="dropdown-menu" data-bs-popper="static">
        <a class="dropdown-item" href="#" data-link="users/profile">PROFILE <i class="bi bi-person-circle ms-auto text-theme fs-16px my-n1"></i></a>
        <a class="dropdown-item" href="#" data-link="settings">SETTINGS <i class="bi bi-gear ms-auto text-theme fs-16px my-n1"></i></a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="users/close">LOGOUT <i class="bi bi-toggle-off ms-auto text-theme fs-16px my-n1"></i></a>
    </div>   
     
     
    
    <div class="menu-left">
       <div class="menu-left-header">Навигация</div>
       
       <div class="menu-left-item" >
          <a href="#" class="menu-link" data-link="observer" >
               <span class="menu-icon"><i class="bi bi-bar-chart"></i></span>
               <span class="menu-text">Мониторинг</span>
          </a>
       </div>

       <div class="menu-left-item">
          <a href="#" class="menu-link" data-link="mail">
               <span class="menu-icon"><i class="bi bi-email"></i></span>
               <span class="menu-text">Почта</span>
          </a>
       </div>
       
       
       
       
       
       
       
       
    </div> 
     
     
     
     


    

         


        
        
       
        

            
            
            