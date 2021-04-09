<?php

function renderFiles($dataset) {    
    echo '<ul class="ml-3 list-group p-1">';
    foreach ($dataset as $key => $value) {
        if(gettype($value) !== 'array'){            
            echo "<li class='list-group-item text-info'><a class='btn btn-info' href='{$value}'><i class='mr-1 fa fa-file-text' aria-hidden='true'></i>{$value}</a></li>";
        } else {            
            echo "<li class='list-group-item'>";
            echo "<div class='h5'><i class='mr-1 fa fa-folder-open' aria-hidden='true'></i>{$key}</div>";
            renderFiles($value);
            echo "</li>";
        }
    }
    echo '</ul>';
}

?>
<div class="h3">Редактор данных системы</div>
<div class="h4 text-center">Обзор файлов <i class="mr-1 fa fa-sitemap" aria-hidden="true"></i></div>
<?php renderFiles($dataset);?>