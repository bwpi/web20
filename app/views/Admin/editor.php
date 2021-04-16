<?php

function typeIcons($type) {
    $types = [
        'x-empty' => '<i class="bi bi-file-earmark-text p-0"></i>',
        'json' => '<i class="bi bi-file-binary p-0"></i>'
    ];
    if($types[$type]) return $types[$type];
}



function renderFiles($dataset, $in = '') {    
    echo '<ul class="ml-3 list-group p-1">';
    foreach ($dataset as $key => $value) {        
        if(gettype($value) !== 'array'){
            $v = explode('/', $value);            
            $t = typeIcons($v[2]);            
            echo "<li class='list-group-item text-info'>
                    <a class='btn btn-info p-1' href='?path={$in}/{$v[0]}'>
                    {$t} {$v[0]}
                    </a>
                    <div class='d-inline-block text-muted m-0 p-0'>
                        <small>Последнее изменение: {$v[5]}</small>
                        <small>Файл создан: {$v[4]}</small>
                    </div>
                  </li>";
        } else {
            echo "<li class='list-group-item bg-warning'>";
            echo "<div class='h6'><i class='mr-1 fa fa-folder-open' aria-hidden='true'></i>{$key}</div>";
            renderFiles($value, $in . '/' . $key);
            echo "</li>";
        }
    }
    echo '</ul>';
}

?>
<div class="h3">Редактор данных системы</div>
<div class="h4 text-center">Обзор файлов <i class="mr-1 fa fa-sitemap" aria-hidden="true"></i></div>
<?php renderFiles($dataset);?>