<a class="btn btn-info btn-block giaMenu sup" target="_blank" data-toggle="collapse" href="#giaMenu" role="button"
    aria-expanded="false" aria-controls="collapseExample">
    <font style="vertical-align: inherit;">ГИА</font>
</a>
<div class="ga btn-block collapse p-2" id="giaMenu">
    <div class="h3">Меню экзаменов 2019</div>
    <div class="h4">ОГЭ</div>
    <div class="btn-group-vertical btn-block shadow-lg">
        <?php foreach ($menu[2] as $key => $value):?>
        <a class="<?=$value['classes']?> gia historyAPI" id="<?=$value['href']?>" href="<?=$value['href']?>.html">
            <font style="vertical-align: inherit;"><?=$value['title']?></font>
        </a>
        <?php endforeach;?>
    </div>
    <div class="h4">ЕГЭ</div>
    <div class="btn-group-vertical btn-block shadow-lg">
        <?php foreach ($menu[3] as $key => $value):?>
        <a class="<?=$value['classes']?> ege historyAPI" id="<?=$value['href']?>" href="<?=$value['href']?>.html">
            <font style="vertical-align: inherit;"><?=$value['title']?></font>
        </a>
        <?php endforeach;?>
    </div>
</div>
<div class="work">
    <div class="h3">Рабочая панель</div>
    <div class="btn-group-vertical btn-block shadow-lg">
        <a class="btn btn-info kt" id="5_ktp_inf" data-toggle="collapse" href="#ktpMenu" role="button"
            aria-expanded="false" aria-controls="collapseExample">Календарно-тематический план</a>
        <div class="ktp btn-block collapse p-2" id="ktpMenu">
            <div class="h3">КТП Информатика</div>
            <div class="btn-group-vertical btn-block shadow-lg">
                <?php foreach ($menu[0] as $key => $value):?>
                <a class="<?=$value['classes']?> kt historyAPI" id="<?=$value['href']?>"
                    href="<?=$value['href']?>.html">
                    <font style="vertical-align: inherit;"><?=$value['title']?></font>
                </a>
                <?php endforeach;?>
            </div>
            <div class="h3">КТП Физика</div>
            <div class="btn-group-vertical btn-block shadow-lg">
                <?php foreach ($menu[1] as $key => $value):?>
                <a class="<?=$value['classes']?> kt historyAPI" id="<?=$value['href']?>"
                    href="<?=$value['href']?>.html">
                    <font style="vertical-align: inherit;"><?=$value['title']?></font>
                </a>
                <?php endforeach;?>
            </div>
        </div>
        <?php foreach ($menu[4] as $key => $value):?>
        <a class="<?=$value['classes']?>" target="<?=$value['target']?>" href="<?=$value['href']?>">
            <font style="vertical-align: inherit;"><?=$value['title']?></font>
        </a>
        <?php endforeach;?>
    </div>
    <?php if ($rules == 'admin'):?>
        <div class="h3">Рабочие ссылки</div>
        <div class="btn-group-vertical btn-block shadow-lg">
            <?php foreach ($menu[5] as $key => $value):?>
            <a class="<?=$value['classes']?>" target="<?=$value['target']?>" href="<?=$value['href']?>">
                <font style="vertical-align: inherit;"><?=$value['title']?></font>
            </a>
            <?php endforeach;?>
        </div>
    <?php endif;?>
</div>