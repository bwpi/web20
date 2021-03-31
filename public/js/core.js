// Проверка ниличия Хеша
if (window.location.hash) scroll(0, 0);
// Таймаут прокрутки страницы до Хеша
setTimeout(function() { scroll(0, 0); }, 1);
//Переменные
const url = location.protocol + '//' + location.host;
let size = $('header').height();

$(function() {

    var path = window.location;
    /*console.log(    
    path.href + '\n' +           // the full path
    path.protocol + '\n' +       // http:
    path.hostname + '\n' +       // site.com
    path.port + '\n' +           // 81
    path.pathname + '\n' +       // /path/page
    path.search + '\n' +         // ?a=1&b=2
    path.hash                    // #hash
    );*/

    /*if (path.href == path.protocol + '//' + path.hostname + ':' + path.port + '/shop') {        
        window.location =  path.protocol + '//' + path.hostname + ':' + path.port + '/shop?shop_arr=' + localStorage.shop;
    }*/
    //Объекты
    $('body').scrollspy({ target: '#sidebar' });
    $('#loginModal').modal('show');

    //Функции
    $('div.btn-nav').click(function() {
        id = $(this).next('.mark').attr('id');
        $('html, body').animate({
            scrollTop: $('#' + id).offset().top + 'px'
        }, 1000, 'swing');
    })


    function Collapse() {
        $('.coll').click(function() {
            $(this).children('div').toggleClass('no-coll-rotate coll-rotate');
        })

    };

    Collapse();

    function loadImg() {
        $('img[data-src]').each(function() {
            img = $(this);
            img.attr('src', img.attr('data-src'));
            img.removeAttr('data-src');
        })
    };

    function sbarLink(ajax) {
        ajaxLoad = ajax;
        $.ajax({
            type: "POST",
            url: path.protocol + '//' + path.hostname + ':' + path.port + '/category',
            data: { ajaxLoad },
            success: function(data) {
                $('.carouselWorks, #about, #contacts, .btn-nav').remove();
                $('#content').html(data);
                $('img[data-src]').each(function() {
                    dataSrc = $(this).attr('data-src');
                    $(this).attr('src', dataSrc).removeAttr('data-src');
                })
            },
            error: function() {
                alert('Не удача');
            }
        });
        history.pushState(null, null, ajax);
    }
    $('body').on('click', '.sbar-link', function(e) {
        ajax = $(this).attr('href');
        $('title').text($(this).text().replace('/', ' / '));
        sbarLink(ajax);
        e.preventDefault();
    });

    //Пересчет количества товаров в корзине
    function shopNum() {
        $('.shop_num').text(arr.length);
    }
    //Добавление номера заказа в базе
    function Shop() {
        $('body').on('click', '.add', function() {
            arr.push($(this).attr('id'));
            localStorage.shop = Array.from(new Set(arr)).join(',');
            shopNum();
        })
        if (localStorage.shop == undefined || localStorage.shop == '') {
            arr = [];
            $('.shop_num').text('0');
        } else {
            arr = localStorage.shop.split(',');
            shopNum();
        } //delete localStorage.shop;
    }

    function removeShop() {
        $('button.removeCard').click(function() {
            id_tag = $(this).attr('data-target'),
                position = arr.indexOf(id_tag);
            if (~position) arr.splice(position, 1);
            if (arr.length == 0) {
                history.pushState('', document.title, window.location.pathname);
                window.location.reload();
                delete localStorage.shop;
            }
            localStorage.shop = arr;
            $(this).parent().parent().remove();
            shopNum();
            history.pushState('', document.title, window.location.pathname);
        })
    }

    function sideBar() {
        $('#sidebarCollapse').click(function() {
            $(this).find('div').toggleClass('rotate no-rotate');
            $('.sidebar').toggleClass('d-none');
            $('#sidebar').toggleClass('active');
        })
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });
    }
    $('.sidebar .nav-link').click(function() {
        $('#sidebarCollapse').find('div').toggleClass('rotate no-rotate');
        $('.sidebar').toggleClass('d-none');
        $('#sidebar').toggleClass('active');
    })

    // Функция навигации по якорям    
    $('.ajaxLoad').on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top + 'px'
        }, 1000, 'swing');
    });

    $('.item_card').on('click', function(e) {
        e.preventDefault();
        history.pushState('', document.title, window.location.pathname);
        let id = $(this).attr('id');
        window.location = '/card?id=' + id;
    });

    //Условия
    // Прокрутка только если есть Хеш
    if (window.location.hash) {

        // Прокрутка страницы
        $('html, body').animate({
            scrollTop: $(window.location.hash).offset().top - 96 + 'px'
        }, 1000, 'swing');
        history.pushState('', document.title, window.location.pathname); //Очистка хеша урл адреса    
    }
    $('#upPage').click(function() {
        $('html, body').animate({
            scrollTop: 0 + 'px'
        }, 500, 'swing');
        //window.location.hash = '';
    })
    $('.nav-link .theme').click(() => {
        window.location.reload();
    })

    Shop();
    removeShop();
    sideBar();
    loadImg();

    $('.shop_num').on('click', function() {
        if (path.pathname != '/shop') {
            window.location = path.protocol + '//' + path.hostname + ':' + path.port;
        }
        if (localStorage.shop == undefined || localStorage.shop == '') {
            $('.card').remove();
        } else {
            window.location = '/shop?shop_arr=' + localStorage.shop;
        }

    });

    $(window).scroll(function() {
        if ($(this).scrollTop() >= 400) {
            $('#upPage').removeClass('d-none');
        } else {
            $('#upPage').addClass('d-none');
        }
    });

    function shopping() {
        let set = 0;
        $('h6.card-text').each(function() {
            set = set + parseInt($(this).text(), 10) * parseInt($(this).siblings('input').val());
        })
        $('#price').val(set);
    };

    function reprice() {
        $('input').blur(function() {
            val = $(this).val();
            shopping();
        });
    };

    function payShop() {
        $('#shop').click(function() {
            fio = $('#fio').val();
            mail = $('#email').val();
            phone = $('#phone').val();
            text = $('#text').val();
            ar = [];
            $('h6.card-text').each(function() {
                set = parseInt($(this).siblings('input').val());
                ar.push(set);
            })
            $.ajax({
                type: "POST",
                url: path.protocol + '//' + path.hostname + ':' + path.port + '/shop/shopping',
                data: { one: arr, two: ar, mail, phone, text, fio },
                success: function(data) {
                    $('#success').text(data);
                },
                error: function() {
                    alert('Не удача');
                }
            });
            $(this).remove();
        })
    };

    $('.up').click(function() {
        val = parseInt($(this).parent().prev('input').val()) + 1;
        $(this).parent().prev('input').val(val);
        console.log(val);
        shopping();
    });
    $('.down').click(function() {
        if (parseInt($(this).parent().prev('input').val()) > 1) {
            val = parseInt($(this).parent().prev('input').val()) - 1;
            $(this).parent().prev('input').val(val);
            console.log(val);
            shopping();
        }
    });
    shopping();
    reprice();
    payShop();

})