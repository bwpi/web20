<div class="inner">
    <nav class="navbar navbar-expand-md navbar-dark bg-transparent shadow-lg" id="nav">
        <a class="navbar-brand" href="<?=HTTP_HOST;?>"><img src="<?=HTTP_HOST;?>img/bg1.png" alt="Админка" width="30em"
                class="icons"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03"
            aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample03">
            <ul class="navbar-nav mr-auto adms">
                <a href="http://seo.gsosh-gari.ru" target="_blank" class="nav-link btn bg-transparent">СЭО<img
                        src="<?=HTTP_HOST;?>img/logo_0.png" alt="СЭО МКОУ ГСОШ" width="30em" class="icons"></a>
                <?php if($rules !== 'study'):?>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle btn bg-transparent" href="#" id="dropdown1"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <font style="vertical-align: inherit;">РИС-ы</font>
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="dropdown1">
                        <div class="btn-group-vertical btn-block" role="group" aria-label="СТАТГРАД">
                            <a href="https://support.gia66.ru/" target="_blank" class="btn btn-danger">Поддержка
                                ГИА</a>
                            <a href="http://192.168.16.24" target="_blank" class="btn btn-danger adms sup">РИС</a>
                            <a href="http://192.168.16.50" target="_blank" class="btn btn-danger adms sup">Сервер
                                статистики</a>
                            <a href="http://ikt.gia66.ru" target="_blank" class="btn btn-danger adms sup">Сервер
                                ИКТ</a>
                            <a href="http://video.gia66.ru" target="_blank" class="btn btn-danger adms sup">Сервер
                                Видео</a>
                            <a href="https://vpr.statgrad.org/" target="_blank" class="btn btn-success">ВПР
                                СТАТГРАД</a>
                            <a href="https://statgrad.org/" target="_blank" class="btn btn-info">СТАТГРАД</a>
                            <a href="http://kais.irro.ru/" target="_blank" class="btn btn-light">КАИС ИРРО</a>
                            <a href="https://monitoring.abbyy.ru/" target="_blank" class="btn btn-warning">Abbyy
                                monitoring</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown active sup">
                    <a class="nav-link dropdown-toggle btn btm-circle bg-transparent" href="#" id="dropdown2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <font style="vertical-align: inherit;"><img src="<?=HTTP_HOST;?>img/cons.png" alt="Веб-админки"
                                width="20em"></font>
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="dropdown2">
                        <div class="btn-group-vertical btn-block">
                            <a href="https://192.168.1.29:10000" target="_blank" class="btn btn-danger"
                                data-toggle="tooltip" data-placement="right"
                                title="Веб-мин консоль на центральный сервер gsoshcu">Центральный сервер</a>
                            <a href="http://ics.gsosh-gari.ru:81" target="_blank" class="btn btn-danger"
                                data-toggle="tooltip" data-placement="right"
                                title="Веб-админ консоль на контент-фильтре icscu">Контент-фильтр</a>
                            <a href="http://192.168.1.9:10000" target="_blank" class="btn btn-warning"
                                data-toggle="tooltip" data-placement="right"
                                title="Веб-админ консоль на центральный сервер webcu">Веб-сервер</a>
                            <a href="http://192.168.1.29/virtualbox" target="_blank" class="btn btn-dark"
                                data-toggle="tooltip" data-placement="right"
                                title="Веб-админ консоль на виртуальный сервер gsoshcu">VirtualBox_g</a>
                            <a href="http://192.168.1.9" target="_blank" class="btn btn-primary" data-toggle="tooltip"
                                data-placement="right"
                                title="Веб-админ консоль на виртулаьный сервер webcu">VirtualBox_w</a><br>
                            <a href="http://192.168.1.3:9080" target="_blank" class="btn btn-info" data-toggle="tooltip"
                                data-placement="right">ЦУ Др.Веб</a>
                            <a href="http://192.168.1.4:5280/admin" target="_blank" class="btn btn-info"
                                data-toggle="tooltip" data-placement="right">ЦУ Jabber</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown active sup">
                    <a class="nav-link dropdown-toggle btn bg-transparent" href="#" id="dropdown3"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <font style="vertical-align: inherit;"><img src="<?=HTTP_HOST;?>img/routers.png" alt="Роутеры"
                                width="20em"></font>
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="dropdown3">
                        <div class="btn-group-vertical btn-block">
                            <a class="btn btn-danger" target="_blank" href="http://192.168.1.100">
                                <font style="vertical-align: inherit;">Модем</font>
                            </a>
                            <a class="btn btn-danger" target="_blank" href="http://10.10.0.241">
                                <font style="vertical-align: inherit;">1-й Этаж</font>
                            </a>
                            <a class="btn btn-danger" href="#">
                                <font style="vertical-align: inherit;">2-й Этаж</font>
                            </a>
                            <a class="btn btn-danger" target="_blank" href="http://10.10.0.244">
                                <font style="vertical-align: inherit;">3-й Этаж</font>
                            </a>
                        </div>
                    </div>
                </li>
                <?php endif;?>

                <?php if($rules !== 'study'):?>
                <li class="nav-item dropdown active sup">
                    <a class="nav-link dropdown-toggle btn bg-transparent" href="#" id="dropdown4"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <font style="vertical-align: inherit;">Настройки</font>
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="dropdown4">
                        <div class="btn-group-vertical btn-block">
                            <a class="nav-link btn btn-transparent" data-toggle="modal" data-target="#calend">
                                <font style="vertical-align: inherit;">Календарь</font>
                            </a>
                            <a class="nav-link btn btn-transparent rassp1" data-toggle="modal" data-target="#ras">
                                <font style="vertical-align: inherit;">Расписание</font>
                            </a>
                            <a class="nav-link btn btn-transparent historyAPI report" id="report" href="/reports">
                                <font style="vertical-align: inherit;">Отчеты</font>
                            </a>
                            <a class="nav-link btn btn-transparent bg-setting">
                                <font style="vertical-align: inherit;">Настройки</font>
                            </a>
                            <a class="nav-link btn btn-transparent" href="/reports">
                                <font style="vertical-align: inherit;">Отчеты</font>
                            </a>
                        </div>
                    </div>
                </li>
                <a class="nav-link btn btn-transparent" href="/admin">
                    <font style="vertical-align: inherit;">Настройки</font>
                </a>
                <?php endif;?>
            </ul>
            <ul class="navbar-nav mr-auto user">
                <a href="http://seo.gsosh-gari.ru" target="_blank" class="btn bg-transparent">СЭО<img
                        src="<?=HTTP_HOST;?>img/logo_0.png" alt="СЭО МКОУ ГСОШ" width="30em"
                        class="icons shadow-sm"></a>
                <a class="nav-link btn btn-transparent" target="_blank" href="http://robotlandia.ru/abc5/index.htm">
                    <font style="vertical-align: inherit;">Scratch 2</font>
                </a>
                <a class="nav-link btn btn-transparent" target="_blank" href="https://scratch.mit.edu">
                    <font style="vertical-align: inherit;">Scratch 3</font>
                </a>
                <a class="nav-link btn btn-transparent" data-toggle="modal" data-target="#calend">
                    <font style="vertical-align: inherit;">Календарь</font>
                </a>
                <a class="nav-link btn btn-transparent rassp1" data-toggle="modal" data-target="#ras">
                    <font style="vertical-align: inherit;">Расписание</font>
                </a>
            </ul>
        </div>
        <h6><?=$user_ip[0]?> <span class="badge bg-secondary"><?=$user_ip[1]?></span></h6>

        <form class="mx-1 form-horizontal navi_dash search" role="form" action="https://yandex.ru/search/" role="search"
            aria-label="Поиск в интернете">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Поиск Яндекса" autocomplete="off" autocorrect="off"
                    autocapitalize="off" spellcheck="false" aria-autocomplete="list" aria-label="Запрос" id="text"
                    maxlength="400" name="text" autofocus>
                <div class="input-group-append">
                    <button class="btn btn-success" data-bem="{&quot;button&quot;:{}}" tabindex="-1" role="button"
                        type="submit">Поиск</button>
                </div>
            </div>
        </form>
        <div>
            <?php if (isset($_COOKIE['login'])):?>
            <a class="btn btn-white" href="/login/logout">
                <i class="fas fa-sign-out-alt text-light"></i>
            </a>
            <?php else :?>
            <a class="btn btn-white" href="/login">
                <i class="fas fa-user text-light"></i>
            </a>
            <?php endif;?>
        </div>
    </nav>

    <!-- Button trigger modal -->
    <!-- Календарь -->
    <div class="modal fade" id="calend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="cal_modal">
                    <?php include WWW . 'cal.php';?>
                </div>
            </div>
        </div>
    </div>
    <!-- Рассписание -->
    <div class="modal fade bd-example-modal-lg" id="ras" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body rassp_modal">
                    ...
                </div>
            </div>
        </div>
    </div>