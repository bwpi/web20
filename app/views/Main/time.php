<div class="h3">Расписание звонков</div>
<table class="table table-responsive table-hover table-bordered table-dark shadow-lg" id="time">
  <thead>
    <tr><th scope="col">#</th><th scope="col">Начало урока</th><th scope="col">Конец урока</th><th scope="col">Перемена</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($array as $key => $value):?>
      <tr><th scope="row"><?=$key?></th>
        <?php foreach ($value as $item) :?>
          <td><?=$item;?></td>
        <?php endforeach;?>
      </tr>
    <?php endforeach;?>
  </tbody>
</table>