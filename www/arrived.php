<?php 

$db_host = 'localhost';
$db_name = 'materials';
$db_username = 'root';
$db_table_to_show = 'arrived';


$connect_to_db = mysql_connect($db_host, $db_username)
or die("Could not connect: " . mysql_error());

mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());

echo '<div class="panel panel-default">
<form id="form" method="post" >
  <table class="lasttr">';
   echo '<tr>';
   echo '<td><h2>Добавление материалов</h2></td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td>Номер :</td><td style="
   text-align: right;
   "><input type="text" id="id" name="id" ></td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td>Название :</td><td style="
   text-align: right;
   "><input type="text" id="Mat_name" name="Mat_name" ></td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td>Количество :</td><td style="
   text-align: right;
   "><input type="text" id="Count" name="Count" ></td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td>Стоимость :</td><td style="
   text-align: right;
   "><input type="text" id="Cost" name="Cost" ></td>';
   echo '</tr>';
   echo '<tr>';
   echo '<td>
   <select class="selectpicker">
    <option>Склад</option>
    <option>Цех 1</option>
    <option>Цех 2</option>
    <option>Цех 3</option>
</select>
</td>';
echo '<td><button type="button" class="btn btn-success addMat" style="float: right">Добавить</button></td>';
echo '</tr>';
echo '</table></form></div>';

mysql_close($connect_to_db);
?>