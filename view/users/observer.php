<div class="row">
    <div class="col-lg-4 mb-4">
        <!-- Billing card 1-->
        <div class="mess h-100 border-start-lg border-start-success">
            <div class="mess-body">
                    <div class="small text-muted">КОЛ-ВО ВХОДЯЩИХ СООБЩЕНИЙ</div>
                    <div class="h3">2000</div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <!-- Billing card 1-->
        <div class="mess h-100 border-start-lg border-start-secondary">
            <div class="mess-body">
                    <div class="small text-muted">Current monthly bill</div>
                    <div class="h3">$20.00</div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <!-- Billing card 1-->
        <div class="mess h-100 border-start-lg border-start-primary">
            <div class="mess-body">
                    <div class="small text-muted">Current monthly bill</div>
                    <div class="h3">$20.00</div>
            </div>
        </div>
    </div>
</div>

<div class="row">  
    <div class="c77">
        <div class="c77-header">
            Мониторинг РОБОТОВ         
        </div>
        <div class="px-0">
             <?php foreach ($data['ViewRobMonitor'] as $value => $item):?>
            <!-- Payment method 1-->
            <div class="c77-body c77-flex justify-content-between align-items-center">
                <div class="c77-flex c77-item align-items-center">
                     <i class="fab c77-icons"></i>
                    <div class="ms-4">
                        <div class="small"><?php echo($item['ИмяСервера']); ?></div>
                        <div class="text-xs text-muted"><?php echo($item['ИмяРобота']); ?></div>
                    </div>
                </div>
                <div class="c77-data">
                    <div class="badge bg-light text-dark"><?php echo($item['ДатаВремя']); ?></div>
                </div>
                <?php if($item['Message'] == "Работаю"){ ?>  
                <div id="c77-status" class="ms-4 bg-success">
                   <span><?php echo($item['Message']); ?></span>
                </div>
                <?php } else { ?>
                <div id="c77-status" class="ms-4 bg-danger">
                   <span><?php echo($item['Message']); ?></span>
                </div>                
                <?php }?>
                
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>

<div class="row">
    
</div>