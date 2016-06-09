<?php 

$db_host = 'localhost';
$db_name = 'materials';
$db_username = 'root';
$db_table_to_show = 'history';


$connect_to_db = mysql_connect($db_host, $db_username)
or die("Could not connect: " . mysql_error());

mysql_select_db($db_name, $connect_to_db)
or die("Could not select DB: " . mysql_error());

$qr_result = mysql_query("select * from history")
or die(mysql_error());
echo '<div class="panel panel-default">';
echo '<h2>История :</h2>';
while($data = mysql_fetch_array($qr_result)){ 

  echo '
  <table class="lasttr">';
    echo '<tr>';
    echo '<td>' . $data['Mat_name'] . '(' . $data['Count'] . '&nbspкг.) прибыл в ' . $data['Store_name'] . '</td><td style="
    text-align: right;
    "><span>' . $data['Date'] . '</span></td>';
    echo '</tr>';
    echo '</table>';
}
echo '</div>';
mysql_close($connect_to_db);
?>