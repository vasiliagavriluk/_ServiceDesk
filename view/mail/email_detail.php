<?php foreach ($data['ViewEmail_detail'] as $value => $item):?>
    <div class="mailbox-detail-header">
        <div class="d-flex">
            <img src="img/users/149071.png" alt="" width="80" class="rounded-circle">
            
            <div class="flex-fill ms-3">
                
                <div class="d-flex align-items-center">
                    <div class="flex-1">
                        <div class="fw-600"><?php echo($item['FromName']);?></div>
                        <div class="fw-600"><h4><?php echo($item['FromAddress']);?></h4></div>
                        <div class="fs-13px">
                            <h3><?php echo($item['Subject']);?></h3>
                        </div>
                    </div>
                    
                    
                    
                    
                    <?php                                     
                    $array = explode(" ", $item['DateEmail']);                    
                    ?>
                    
                    
                    
                    
                    <div class="fs-12px text-white text-opacity-50 text-lg-end mt-lg-0 mt-3">
                        
                        <div class="btn-edit-email">
                            <a href="#" class="text-white text-opacity-50 text-decoration-none me-3"><i class="fa fa-fw fa-redo"></i></a>
                            <a href="#" class="text-white text-opacity-50 text-decoration-none"><i class="fa fa-fw fa-trash"></i></a>
                        </div>
                        
                        
                        <?php  echo($array['0']);?><span class="d-none d-lg-inline"><br></span><?php  echo($array['1']);?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mailbox-detail-content">
        <div class="mailbox-detail-body">
            <?php
                
                $Message = explode("<br>", $item['Message']);
            
            
            echo implode("<br>", $Message);;?>
        </div>
    </div>
<?php endforeach;?>


