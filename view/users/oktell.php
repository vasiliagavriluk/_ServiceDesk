<?php var_dump("oktell"); ?>
<script src="js/oktell/oktell.js" type="text/javascript"></script>

<p class="user">Дмитрий Е. 103
	<span class="userPhone" data-phone="103"></span>
</p>
<p class="user">Алексей В. 101
	<span class="userPhone" data-phone="101"></span>
</p>



<p class="oktell-status"></p>

<script type="text/javascript">
	$(function(){
		$('.userPhone').oktellButton()
	});
</script>








<script type="text/javascript">
	$(function(){

		// Пример подключения к серверу Oktell при помощи oktell.js
		// дополнительные параметры подключения смотрите в документации oktell.js
		oktell.connect({
			url: ['192.168.1.55'], // ip-адрес вашего сервера Oktell
			login: 'It_Tech_All', // необходимо подставить логин текущего пользователя
			oktellVoice: true, // используем веб-телефон Oktell-voice.js
			password: 'p600bu2017', // необходимо подставить пароль пользователя
			callback: function(data) {
				if ( data.result ) {
					// успешное подключение
                                        $('.oktell-status').html(data);    
                                        
                                        
				}
			}
		});

		// Пример инициализации oktell-panel.js
		$.oktellPanel({
			// указаны значения по умолчанию
			oktell: window.oktell, // можно задать ссылку на объект Oktell.js
			oktellVoice: window.oktellVoice, // можно задать ссылку на объект Oktell-voice.js
			dynamic: false, // если true, то панель не скрывается для окна шириной больше 1200px;
					// если false, то панель скрывается для любой ширины окна
			position: 'right', // положение панели, возможные варианты 'right' и 'left'
			ringtone: 'path/to/ringtone.mp3', // путь до мелодии вызова
			debug: false, // логирование в консоль
			lang: 'ru', // язык панели, также поддерживаются английский 'en' и чешский 'cz'
			showAvatar: false, // показывать аватары пользователей в списке
			hideOnDisconnect: true, // скрывать панель при разрывае соединения с сервером Oktell
			useNotifies: false, // показывать webkit уведомления при входящем вызове
			container: false, // DOMElement или jQuery элемент, который нужно использовать как контейнер.
			useSticky: true, // использовать залипающие заголовки;
					// на мобильных устройствах и при использовании контейнера (параметр container)
					// не используются.
			useNativeScroll: false, // использовать нативный скролл для списка.
					// на мобильных устройствах и при использовании контейнера (параметр container)
					// всегда используется нативный скролл.
			withoutPermissionsPopup: false, // не использовать попап для запросов доступа к микрофону
			withoutCallPopup: false, // не использовать попап для входящих вызовов
			withoutError: false // не показывать ошибки соединения с сервером Oktell
		});
	});
</script>