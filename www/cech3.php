<?php 

$db_host = 'localhost';
$db_name = 'materials';
$db_username = 'root';
$db_table_to_show = 'cech3';


$connect_to_db = mysql_connect($db_host, $db_username)
or die("Could not connect: " . mysql_error());

mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());

$qr_result = mysql_query("select * from " . $db_table_to_show)
or die(mysql_error()); 
echo '<div class="panel panel-default katalog-head">';
echo '<h2>Список материалов в цехе 3:</h2>';
echo '</div>';
while($data = mysql_fetch_array($qr_result)){
	echo '<div class="katalog panel panel-default"><table class="lasttr">';
	echo '<tr>';
	echo '<td><h3><span id="id">' . $data['id'] . '</span>.<span id="Mat_name">' . $data['Mat_name'] . '</span></h3></td>';
	echo '</tr>';
	echo '<td>Цена :</td><td style="
	text-align: right;
	"><strong id="Cost">' . $data['Cost'] . '</strong>&nbspгрн.</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>В наличии :</td><td style="
	text-align: right;
	"><strong id="Count">' . $data['Count'] . '</strong>&nbspкг.</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>Дата :</td><td style="
	text-align: right;
	"><strong id="Date">' . $data['Date'] . '</strong></td>';
	echo '</tr>';
	echo '</table></div>';
}

mysql_close($connect_to_db);
?>