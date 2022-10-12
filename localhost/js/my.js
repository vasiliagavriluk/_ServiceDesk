!function() {
    $(function() {
        const myNotification =  window.createNotification
        ({
            // close on click
            closeOnClick: true,
            // displays close button
            displayCloseButton: false,
            // nfc-top-left
            // nfc-top-right
            // nfc-bottom-right
            // nfc-bottom-left
            positionClass: 'nfc-bottom-right',
            // callback
            onclick: false,
            // timeout in milliseconds
            showDuration: 3500,
            // success, info, warning, error, and none
            theme: 'success'

        });
        
        function a() {
            
            };
        function b() //автообновление каждую минуту мониторинга
            {
            $.ajax({
              type: "POST",
              url: "/observer",
              success: function(data) 
                    {   
                        $('#content').empty();
                        $('#content').html(data);                        
                    }
                    });
            };
/*         setTimeout(function() //после 5 мин удаление сессии и перезапупуск страницы
            {
              $.ajax({
              type: "POST",
              url: "/users/close",
              success: function() 
                    {   
                        location.reload();
                    }
                    });
            },1000*60*5); */
            
        function c() {
            };
        function d() {
            };
            
            
            
        
        $('body').on('click','.modal-close',function() //email_detal
        {
            
        });    
            
        //Ссылки в левом меню        
        $(".menu-link").on("click", function() 
            {
                var tab  = $(this).data("link");                 
                $.ajax({
                    type: "POST",
                    url: "/"+tab,
                    success: function(data) 
                    {   
                        $('#content').empty();
                        $('#content').html(data);  
                        
                        myNotification({ 
                            title: 'Title',
                            message: 'Notification Message' 
                        });
                    }
                });
            });
        
        $(".dropdown-item").on("click", function() 
            {
                var tab  = $(this).data("link");                 
                $.ajax({
                    type: "POST",
                    url: "/"+tab,
                    success: function(data) 
                    {   
                        $('#content').empty();
                        $('#content').html(data);  
                        
                        myNotification({ 
                            title: 'Title',
                            message: 'Notification Message' 
                        });
                    }
                });
            });
            
            
        $('body').on('click','.mailbox-list-item',function() //email_detal
        {
                var id  = $(this).data("link");  
                $('.mailbox-list-item').removeClass('active');
                $(this).toggleClass('active');
                $.ajax({
                    type: "POST",
                    url: "/mail/email_detail",
                    data: {
                            id: $(this).data("link")
                          },
                    success: function(data) 
                    {  
                        
                        $('.mailbox-content').empty();
                        $('.mailbox-content').html(data); 
                    }
                });
        });



        $('body').on('click','a[data-bs-toggle="modal"]',function() //email_detal
        {
           var name = $(this).data('name');

           var name_edit = $(this).closest('#'+name).find('.name-edit').text();           

            console.log(name_edit);


/*            $('.modal-title').empty();
           $('.modal-title').html(name);  */





          //  $('.modal-overlay').addClass("modal-overlay_visible");            
        });

        $('body').on('click','.modal-close',function()
        {
            $(".modal-overlay").removeClass("modal-overlay_visible");
        });
           





        

        
        
        
            
        $(".dropdown-menu-btn").on("click", function() 
        {
            var display = $('.dropdown-menu').css('display');
            if (display == 'none'){ $('.dropdown-menu').css('display','block');  
            } else {$('.dropdown-menu').css('display','none');  }
        });
        
        $(document).mouseup( function(e){ // событие клика по веб-документу
		var div = $( ".dropdown-menu" ); // тут указываем ID элемента
		if ( !div.is(e.target) // если клик был не по нашему блоку
		    && div.has(e.target).length === 0 ) { // и не по его дочерним элементам
			div.hide(); // скрываем его
		}
	});
        
        
        
        
            
        a,b();
       // setTimeout("window.location.href='/';",86400);
        
        
        
        
        function GetTodayDate() {
            var tdate = new Date();
            var dd = tdate.getHours(); //yields day
            var MM = tdate.getMinutes(); //yields month
            var yyyy = tdate.getMilliseconds(); //yields year
            var currentDate= dd + "-" +(MM) + "-" + yyyy;

            return currentDate;
         }
        


         
         
         
         
         
         
    });
}();
