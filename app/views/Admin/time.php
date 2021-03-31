<div class="h3 text-center">Расписание звонков</div>
<table class="table table-responsive table-hover table-bordered table-dark shadow-lg">
  <thead>
    <tr><th scope="col">#</th><th scope="col">Начало урока</th><th scope="col">Конец урока</th><th scope="col">Перемена</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($array as $key => $value):?>
      <tr><th scope="row"><?=$key?></th>
        <?php foreach ($value as $item) :?>
          <td contenteditable="true"><?=$item;?></td>
        <?php endforeach;?>
      </tr>
    <?php endforeach;?>      
  </tbody>
</table>