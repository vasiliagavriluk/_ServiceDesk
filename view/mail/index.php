<div class="mailbox">
        <div class="mailbox-toolbar">
            <div class="mailbox-toolbar-item"><span class="mailbox-toolbar-text">Mailboxes</span></div>
            <div class="mailbox-toolbar-item"><a href="email_inbox.html" class="mailbox-toolbar-link active">Inbox</a></div>
            <div class="mailbox-toolbar-item"><a href="email_inbox.html" class="mailbox-toolbar-link">Sent</a></div>
            <div class="mailbox-toolbar-item"><a href="email_inbox.html" class="mailbox-toolbar-link">Drafts (1)</a></div>
            <div class="mailbox-toolbar-item"><a href="email_inbox.html" class="mailbox-toolbar-link">Junk</a></div>
            <div class="mailbox-toolbar-item"><a href="email_compose.html" class="mailbox-toolbar-link text-white bg-white bg-opacity-15">New Message <i class="fa fa-pen fs-12px ms-1"></i></a></div>
        </div>
    <div class="mailbox-row">
        <div class="mailbox-body">
            <div class="mailbox-sidebar d-none d-lg-block">
                <div data-scrollbar="true" data-height="100%" data-skip-mobile="true" class="ps ps--active-y" style="height: 100%;" data-init="true">
                    
                    <?php foreach ($data['ViewEmail'] as $value => $item):?>
                    <div class="mailbox-list">
                        <div class="mailbox-list-item unread has-attachment" data-link="<?php echo($item['id']); ?>">
                            <div class="mailbox-message">
                                <a href="#" class="mailbox-list-item-link">
                                <div class="mailbox-sender">
                                    <span class="mailbox-sender-name"><?php echo($item['FromName']); ?></span>
                                    <span class="mailbox-time"><?php $array = explode(" ", $item['DateEmail']); echo($array['0']); ?></span>
                                </div>
                                <div class="mailbox-title"><?php echo($item['Subject']); ?></div>
                                <div class="mailbox-desc"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                    
                    
                    
                        
                </div>
            </div>
        </div>
    
        <div class="mailbox-content"></div>
    </div>

</div>
