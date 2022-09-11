<?php
require_once "Settings_DB.php";
//Получение количества записей таблицы заказов
$select_all = $db->prepare("SELECT * FROM `Orders_tbl`");
$select_all->execute();
$all_data = $select_all->fetchAll(PDO::FETCH_ASSOC);
$rec = count($all_data);

function print_table($data) { //Функция отрисовки таблицы
?>
<table class="table table-striped table-sm" id="table">
    <thead>
      <tr>
        <th scope="col">id заказа</th>
        <th scope="col">ФИО/Название компании</th>
        <th scope="col">Email</th>
        <th scope="col">Номер телефона</th>
        <th scope="col">Город</th>
        <th scope="col">Адрес</th>
        <th scope="col">Номер договора</th>
        <th scope="col">Количество воды</th>
        <th scope="col">Сдаваемая тара</th>
        <th scope="col">Комментарий</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($data as $row):
        ?>
        <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['ph_number']; ?></td>
        <td><?php echo $row['city']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['agreement']; ?></td>
        <td><?php echo $row['amount_water']; ?></td>
        <td><?php echo $row['tare_quantity']; ?></td>
        <td><?php echo $row['comment']; ?></td>
        </tr>
       <?php
       endforeach;
       ?>
    </tbody>
  </table>
  <?php
}

if(isset($_POST["counter"])){  //возрат количества страниц
  $step = $_POST["newstep"];
  if ($rec % $step){
  echo intDiv($rec, $step) + 1;
} else{
  echo intDiv($rec, $step);
}
}

if(isset($_POST["print"])){ //отрисовка таблицы
  $step = $_POST["newstep"];
  $current_page = $_POST["newcurrent_page"] * $step;

  $sth = $db->prepare("SELECT * FROM `Orders_tbl` LIMIT $current_page, $step");
  $sth->execute();
  $data_result = $sth->fetchAll(PDO::FETCH_ASSOC);
  echo print_table($data_result, $current_page, $step);
}


?>
