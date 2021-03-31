<div class="col-sm-4">
    <div class="h6">Обучающие ресурсы</div>
    <div class="btn-group-vertical btn-block shadow-lg">
        <?php foreach ($menu[6] as $key => $value):?>
        <a class="<?=$value['classes']?>" target="<?=$value['target']?>" href="<?=$value['href']?>">
            <font style="vertical-align: inherit;"><?=$value['title']?></font>
        </a>
        <?php endforeach;?>
    </div>
</div>
<div class="col-sm-4">
    <div class="h6">Оффициальные сайты</div>
    <div class="btn-group-vertical btn-block shadow-lg">
        <?php foreach ($menu[7] as $key => $value):?>
        <a class="<?=$value['classes']?>" target="<?=$value['target']?>" href="<?=$value['href']?>">
            <font style="vertical-align: inherit;"><?=$value['title']?></font>
        </a>
        <?php endforeach;?>
    </div>
</div>
<div class="col-sm-4">
    <div class="h6">Системы обучения и подготовки</div>
    <div class="btn-group-vertical btn-block shadow-lg">
        <?php foreach ($menu[8] as $key => $value):?>
        <a class="<?=$value['classes']?>" target="<?=$value['target']?>" href="<?=$value['href']?>">
            <font style="vertical-align: inherit;"><?=$value['title']?></font>
        </a>
        <?php endforeach;?>
    </div>
</div>