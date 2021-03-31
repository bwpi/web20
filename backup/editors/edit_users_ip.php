<?php 
 $fil="admin.txt"; 
//ïðîâåðÿþ ñóùåñòâîâàíèå ôàéëà 
 if(!file_exists($fil)) 
 { 
// åñëè, ôàéë íå ñóùåñòâóåò, òî ñîçäàþ åãî 
  $fp=fopen($fil,"w"); 
   
  fclose($fp); 
 } 
 else{ 
// èíà÷å, åñëè, ôàéë ñóùåñòâóåò, òî çàïèñûâàþ âñ¸ ñîäåðæèìîå â ïåðåìåííóþ $a 
   $a=file_get_contents("admin.txt"); 
      } 
 ?> 
 <form action="../editors/edit_ip.php" method="post">
 <label for='exampleFormControlTextarea1'>Редактирование файла admin.txt</label>
 <textarea class="form-control bg-transparent text-warning" type=text rows=20 cols=80 name='b'><?php echo $a;?></textarea> 
 <button type="submit" class="btn btn-primary m-2">Сохранить</button> 
 </form>



