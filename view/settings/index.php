<div class="scrollbar p-10">
        <div class="mb-5">
            <h4><i class="pl-10 far fa-user fa-fw"></i>Общий</h4>
            <div class="box list-group list-group-flush">
                <div id="LastName" class="list-group-item d-flex align-items-center">
                    <div class="flex-1 text-break">
                        <div  class="name-edit">Фамилия Имя</div>
                        <div class="text-white text-opacity-50"><?php echo($_SESSION['UserFIO']);?></div>
                    </div>
                    <div class="w-100px">
                        <a href="#" data-bs-toggle="modal" data-name="LastName" class="btn btn-outline-default w-100px">Edit</a>
                    </div>
                </div>

                <div id="Name_user" class="list-group-item d-flex align-items-center">
                    <div class="flex-1 text-break">
                        <div  class="name-edit">Имя пользователя:</div>
                        <div class="text-white text-opacity-50">@seantheme</div>
                    </div>
                    <div>
                        <a href="#" data-bs-toggle="modal" data-name="Name_user" class="btn btn-outline-default w-100px">Edit</a>
                    </div>
                </div>
                
                <div id="Phone" class="list-group-item d-flex align-items-center">
                    <div class="flex-1 text-break">
                        <div  class="name-edit">Phone</div>
                        <div class="text-white text-opacity-50">+1-202-555-0183</div>
                    </div>
                    <div>
                        <a href="#" data-bs-toggle="modal" data-name="Phone" class="btn btn-outline-default w-100px">Edit</a>
                    </div>
                </div>
                
                <div id="Email_address" class="list-group-item d-flex align-items-center">
                    <div class="flex-1 text-break">
                        <div  class="name-edit">Email address</div>
                        <div class="text-white text-opacity-50">support@seantheme.com</div>
                    </div>
                    <div>
                        <a href="#" data-bs-toggle="modal" data-name="Email_address" class="btn btn-outline-default w-100px">Edit</a>
                    </div>
                </div>
                
                <div id="Password" class="list-group-item d-flex align-items-center">
                    <div class="flex-1 text-break">
                        <div class="name-edit">Password</div>
                    </div>
                    <div>
                        <a href="#" data-bs-toggle="modal" data-name="Password"  class="btn btn-outline-default w-100px">Edit</a>
                    </div>
                </div>
                
                
                
                
                
            </div>
        </div>
        
        <div id="notifications" class="mb-5">
            <h4 class="name-edit"><i class="pl-10 far fa-bell"></i>Уведомления</h4>
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex align-items-center">
                        <div class="flex-1 text-break">
                            <div class="text-white text-opacity-50">
                                Enabled
                            </div>
                        </div>
                    <div>
                        <a href="#" data-bs-toggle="modal" data-name="notifications" class="btn btn-outline-default w-100px">Edit</a>
                    </div>
                    </div>
                </div>
        </div>
    
        <div id="languages" class="mb-5">
            <h4 class="name-edit"><i class="pl-10 far fa-language"></i>Язык</h4>
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex align-items-center">
                        <div class="flex-1 text-break">
                            <div class="text-white text-opacity-50">
                                 Русский
                            </div>
                        </div>
                    <div>
                        <a href="#" data-bs-toggle="modal" data-name="languages" class="btn btn-outline-default w-100px">Edit</a>
                    </div>
                    </div>
                </div>
        </div>
    
    
    
    
    
        <div id="resetSettings" class="mb-5">
            <h4><i class="pl-10 fa fa-redo fa-fw text-theme"></i>Сбросить настройки</h4>
            <div class="list-group list-group-flush">
                <div class="list-group-item d-flex align-items-center">
                    <div class="flex-1 text-break">
                        <div class="text-white text-opacity-50">
                        Это действие очистит и сбросит все текущие настройки.
                        </div>
                    </div>
                    <div>
                    <a href="#" class="btn btn-outline-default w-100px">Reset</a>
                    </div>
                </div>
            </div>
        </div>
    
    
    
    
    
    
</div>



<div class="modal-overlay">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3 form-name">
                <label class="form-label">Name</label>
                <input class="form-control" placeholder="First" value="Sean">
            </div>
        </div>
        <div class="modal-footer">
            <a type="button" class="btn btn-outline-default modal-close " data-bs-dismiss="modal">Close</a>
            <button type="button" class="btn btn-outline-theme">Save changes</button>
        </div>
        </div>
    </div>
 
</div>