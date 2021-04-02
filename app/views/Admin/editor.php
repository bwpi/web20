<?php
function renderFiles($dataset) {
    echo '<ul class="ml-3 list-group">';
    foreach ($dataset as $key => $value) {
        if (gettype($key) !== 'integer') {
            echo '<div class="h6"><i class="fa fa-folder-open" aria-hidden="true"></i> ' . $key . '</div>';
        }
        if ($dataset[$key]) {
            if(gettype($value) !== 'array') {
                echo '<li class="list-group-item"><i class="fa fa-file-text" aria-hidden="true"></i> ' . $value['file'] . '</li>';                
            } else {
                renderFiles($value); 
            }
        }
           
    }
    echo '</ul>';
}
// function renderFiles1($dataset) {
//     foreach ($dataset as $key => $value) {
//         if ($dataset[$key]) {                    
//             echo '<ul class="ml-5 list-group">';
//                 if (gettype($key) !== 'integer') {
//                     echo  '<li class="list-group-item">' . $key . '</li>';
//                 }
//                 if(gettype($value) === 'array') {
//                     renderFiles1($value);
//                 } else {
//                     echo '<li class="list-group-item">' . $value[0] . '</li>';
//                 }
//             echo '</ul>';
//         }        
//     }
// }
?>
<div class="h3">Редактор данных системы</div>
<div class="h4 text-center">Обзор файлов <i class="fa fa-sitemap" aria-hidden="true"></i></div>
<?php renderFiles($dataset);?>
