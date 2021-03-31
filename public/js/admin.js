var path = window.location;
var get = path.search.split('&');
var mod = []
$(document).ready(function() {
    get = path.search.split('&');
    /*Добавление строки в таблице*/
    $('body').on('click','#add_row',function(){        
        $('th[scope=col]').each(function(){
            mod.push($(this).text().toLowerCase().replace(" ","_"));
        })        
        getAJAX(mod);
    })
	/*боковая панель*/
    $('#sidebar-collaps').click(function() {
        $('#sidebar').toggleClass('sidebar-active sidebar');
        $("#sidebar-collaps > span").toggleClass('rotate no-rotate');
    })
    /////
    /*редактор таблицы и отправка данных в соответствующий JSON*/    
    $('table').on('click','td[contenteditable = true]',function() {
        oldtext = $(this).text().trim();        
    });
    /*редактор таблицы и отправка данных в соответствующий JSON*/    
    $('#save').on('click',function() {
        if ($('#name').val()) {
            set = $('#name').val();
            ajax(set)
        }        
    });

    $('table').on('blur keyup','td[contenteditable = true]',function(e) {

        text = $(this).text().trim();

         /*запрещаем перенос строки*/
        if(e.keyCode === 13) {
            e.preventDefault();            
        }

        /*если нет атрибута data-day то настройки такие, иначе...*/
        if (!$(this).attr('data-day')&&!$(this).attr('data-ktp')) {            
            set = $(this).siblings('th').text() + '/' + ($(this).index()-1);
        } else if ($(this).attr('data-ktp')) {
            set = $(this).attr('data-ktp');            
        } else {
            set = $(this).attr('data-day');
        }
        /*проверяем наличие изменений в ячейке*/
        if (oldtext != text) {
            setJSON(text,set,$(this));            
            if (text.length == 0) {
                $(this).removeClass();
            }
        }
    });    

    /*
    *отправка ajax запроса
    */
    function ajax(set='',element='') {    
        $.ajax({
            type: "POST",
            url: path.protocol + '//' + path.hostname + ':' + path.port + path.pathname + get + '\n',
            data: {ajax_set:set},
            success: function(data) {
            console.log(data)                
                alertMsg(data, 'success');
            },
            error: function() {
                alert('Не удача');
            }
        });        
    };
    /*
    *перезапись JSON файла
    */
    function setJSON(text, set='',element) {    
        $.ajax({
            type: "POST",
            url: path.protocol + '//' + path.hostname + ':' + path.port + path.pathname + get + '\n',
            data: {ajax_data:text,ajax_set:set},
            success: function(data) {
                data = (data.toString() === "NaN" ) ? 0 : $(element).attr('class', data);
                alertMsg('Успешная запись - ' + text + '!', 'success');
            },
            error: function() {
                alert('Не удача');
            }
        });        
    };
    /////
    /*
    * Отправка AJAX запроса
    */
    function getAJAX(mod, set, element="#content"){

        $.ajax({
            type: "POST",
            url: path.protocol + '//' + path.hostname + ':' + path.port + path.pathname + get + '\n',
            data: {mod, ajax_set:set},
            success: function(data) {                
                $(element).html(data);
                alertMsg('Успешная запись - в базу!', 'success');
            },
            error: function() {
                alert('Не удача');
            }
        });
    }
    /*
    * Вывод оповещения
    */   
    function alertMsg(msg = 'Сообщение', alert){
        $('#message').html('<div class="alert alert-' + alert + '">' + msg + '</div>').show(3000);
        setTimeout(function(){
          $('#message').empty();
        }, 3000);   
    }

    

})