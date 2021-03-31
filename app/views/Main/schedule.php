<div class="h3 text-center" id="title">Расписание занятий в кабинете физики</div>
  <table class="table table-responsive table-hover table-bordered table-dark shadow-lg" id="schedule">
    <thead>
      <tr>
        <th scope="col">#</th>
        <?php foreach ($array as $key_day_en => $day):?>
            <?php foreach ($day as $key_day_ru => $schad):?>
                <th scope="col"><?=$key_day_ru?></th>
            <?php endforeach;?>
        <?php endforeach;?>
        </tr>
    </thead>    
    <tbody>
        <?php for ($i=1; $i <= 8; $i++):?>
            <tr>
            <th scope="row"><?=$i;?></th>
            <?php foreach ($array as $key_day_en => $day):?>
                <?php foreach ($day as $key_day_ru => $schad):?>
                    <?php
                    	$text = $array[$key_day_en][$key_day_ru][$i];                    	
                    	$object = trim(preg_replace("/[\d]/", "", $text));
                    	$style = (array_key_exists($object, $objects)) ? $objects[$object] : '';
                    ?>
                    <td class="<?=$style?>" data-day="<?="$key_day_en/$key_day_ru/$i";?>"><?=$text;?></td>                        
                <?php endforeach;?>            
            <?php endforeach;?> 
            </tr>      
        <?php endfor;?>
    </tbody>
  </table>