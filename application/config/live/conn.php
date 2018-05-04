<?php
$linkid = mysqli_connect('localhost','tslmarif_usr','job!@#123','tslmarif_jc2016');
var_dump(mysqli_connect_error());
echo '<br>'.mysqli_connect_errno();
$sql = "select * from user_tbl";
$query = mysqli_query($linkid, $sql);
var_dump($query);
$result = mysqli_fetch_array($query);
var_dump($result);
