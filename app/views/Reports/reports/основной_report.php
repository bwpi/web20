<form action="reports" method="POST">
    <div class="form-group">
      <label id="fio" for="fio">ФИО учителя</label>
      <select class="form-control" id="fio" name="fio">
        <?php foreach ($teachers as $key => $value):?>
          <option value="<?= $key?>"><?= $value['name']?></option>
        <?php endforeach;?>
      </select>    
      <small id="fio" class="form-text text-muted">ФИО учителя</small>
    </div>
    <div class="form-group">
      <label for="subject">Предмет</label>
      <select class="form-control" id="subject" name="subject">
        <?php foreach ($subjects as $key => $value):?>
          <option value="<?= $key?>"><?= $value?></option>
        <?php endforeach;?>
      </select>    
      <small id="subject" class="form-text text-muted">Выберите свой Предмет</small>
    </div>
    <div class="form-group">
      <label for="number">Всего обучающихся по предмету</label>
      <input type="text" class="form-control" id="number" name="number" placeholder="Всего обучающихся по предмету">
      <small id="number" class="form-text text-muted">Всего обучающихся по предмету</small>
    </div>
    <div class="form-group">
      <label for="number5">Обучающихся на 5</label>
      <input type="text" class="form-control" id="number5" name="number5" placeholder="Обучающихся на 5">
      <small id="number5" class="form-text text-muted">Обучающихся на 5</small>
    </div>
    <div class="form-group">
      <label for="number4">Обучающихся на 4</label>
      <input type="text" class="form-control" id="number4" name="number4" placeholder="Обучающихся на 4">
      <small id="number4" class="form-text text-muted">Обучающихся на 4</small>
    </div>
    <div class="form-group">
      <label for="number3">Обучающихся на 3</label>
      <input type="text" class="form-control" id="number3" name="number3" placeholder="Обучающихся на 3">
      <small id="number3" class="form-text text-muted">Обучающихся на 3</small>
    </div>
    <div class="form-group">
      <label for="number2">Не успевающие</label>
      <input type="text" class="form-control" id="number2" name="number2" placeholder="Не успевающие" value="0">
      <small id="number2" class="form-text text-muted">Не успевающие</small>
    </div>
    <div class="form-group">
      <label for="number0">Не аттестовано</label>
      <input type="text" class="form-control" id="number0" name="number0" placeholder="Не аттестовано" value="0">
      <small id="number0" class="form-text text-muted">Не аттестовано</small>
    </div>
    <div class="form-group">
      <label for="percent">Процент выполнения программы</label>
      <input type="text" class="form-control" id="percent" name="percent" placeholder="Процент выполнения программы" value="100">
      <small id="percent" class="form-text text-muted">Процент выполнения программы</small>
    </div>
    <div class="form-group">
      <label for="quarter">Выберите период</label>
      <select class="form-control" id="quarter" name="quarter">
        <option value="1">1 четверть</option>
        <option value="2">2 четверть</option>
        <option value="3">3 четверть</option>
        <option value="4">4 четверть</option>
        <option value="year">Год</option>
      </select>
    </div>
    <div class="form-group">
      <label for="comment">Комментарий к отчету</label>
      <input type="text" class="form-control" id="comment" name="comment" placeholder="Комментарий к отчету">
      <small id="comment" class="form-text text-muted">ФИО учеников с неатестацией, не успевающие и другие причины</small>
    </div>
    <button type="submit" id="submit" class="btn btn-primary">Сформировать отчет для печати</button>
</form>