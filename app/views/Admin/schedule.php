<form method="get">
    <div class="list-group">    
        <?php foreach ($files_uploaded as $key => $value):?>
            <?php $value = str_replace('.json', '', $value);?>
            <?php ($_GET['id']===$value) ? $active = 'active' : $active = '';?>
            <button type="submit" name="id" class="list-group-item list-group-item-action <?=$active?>" value="<?=$value?>"><?=$value?></button>
        <?php endforeach;?>
    </div>
</form>

<div class="h3 text-center" id="title">Расписание занятий в кабинете информатики</div>
<div class="table-responsive-xl">
    <table class="table table-hover table-bordered table-dark shadow-lg" id="schedule">
        <thead>
          <tr>
            <th scope="col">#</th>
            <?php foreach ($data as $key_day_en => $day):?>
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
                    <?php foreach ($data as $key_day_en => $day):?>
                        <?php foreach ($day as $key_day_ru => $schedule):?>
                            <?php $text = $data[$key_day_en][$key_day_ru][$i];?>
                            <td class="p-0" data-day="<?="$key_day_en/$key_day_ru/$i";?>">
                                <table class="table table-borderless m-0">    	                        	
		                        	<?php foreach ($text as $key => $value):?>
		                        		<?php                                                
		                        			(intval($value) != 0) ? $object = (intval($value) > 8) ? $object = 'fiz' : $object = 'inf' : $object = $value;
		                        			$styles = (array_key_exists($object, $objects)) ? $objects[$object] : '';                                                
			                            ?>
                                        <?php if (count($value)==2):?>
                                            <tr>
                                                <?php foreach ($value as $k => $v):?>
                                                    <?php
                                                        (intval($v) != 0) ? $object = (intval($v) > 8) ? $object = 'fiz' : $object = 'inf' : $object = $v;
                                                        $styles = (array_key_exists($object, $objects)) ? $objects[$object] : '';                                                
                                                    ?>
                                                    <td class="<?=$styles?>" data-day="<?="$key_day_en/$key_day_ru/$i/$key/$k";?>"><?=$v?></td>
                                                <?php endforeach;?>
                                            </tr>
                                        <?php else:?>                                                
		                        		    <td class="<?=$styles?>" data-day="<?="$key_day_en/$key_day_ru/$i/$key";?>"><?=$value?></td>
                                        <?php endif;?>
		                        	<?php endforeach;?>
	                        	</table>                            	
                            </td>                        
                        <?php endforeach;?>            
                    <?php endforeach;?> 
                </tr>      
            <?php endfor;?>
        </tbody>
      </table>
</div>