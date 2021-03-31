var path = window.location;

const url = location.protocol + '//' + location.host + '/'; //Адрес хоста/путь до корневого каталога
href = path.pathname;
var a;

$(document).ready(function() {

    /*
     * Выбор временного интервала
     */
    // ajax_time = 'данные';

    // var array_time = $.ajax({
    //     type: "POST",
    //     url: url + href,
    //     data: { ajax_time },
    //     cache: false,
    //     global: false,
    //     async: false,
    //     success: function(data){            
    //         return data;
    //     },
    //     error: function(){
    //     	console.log('error');
    //     }        
    // }).responseText;

    // var now = new Date();
    // actual_time = now.getHours()*60 + now.getMinutes()
    // var array_in = JSON.parse(array_time);    
    // for (var i = 1; i < 9; ++i) {
    //     var before_time = array_in[i][0].split('-')[0]*60 + Number.parseInt(array_in[i][0].split('-')[1]);
    //     var after_time = array_in[i][1].split('-')[0]*60 + Number.parseInt(array_in[i][1].split('-')[1]) + Number.parseInt(array_in[i][2]);        
    //     if ((actual_time >= before_time) && (actual_time <= after_time)) {
    //         a = i;
    //         $("table#time tr:eq(" + a + ")").addClass('bg-info');
    //     }        
    // }
})