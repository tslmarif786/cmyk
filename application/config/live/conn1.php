<?php
$linkid = mysqli_connect('darpanprinters.com','tslmarif_usr','GA12ga($$)','tslmarif_jc2016');
//$linkid = mysqli_connect('darpanprinters.com','tslmarif_786','GA12ga($$)','tslmarif_JobCard2016');
var_dump(mysqli_connect_error());
echo '<br>'.mysqli_connect_errno();
$sql = "select * from admin_login";
$query = mysqli_query($linkid, $sql);
var_dump($query);
$result = mysqli_fetch_array($query);
var_dump($result);

