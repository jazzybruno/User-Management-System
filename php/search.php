<style>

*{
    font-family: 'Poppins', sans-serif;
}
table, th , td{
    border-bottom: 3px solid rgba(212, 229, 233, 0.808);
}

td{
    padding-left: 40px;
}
th{
    padding-left: 20px;
}
</style>
<form action="./search.php" method="GET">
      <label>Search by username</label><br><br>
      <input type="text" name="search" value="" /><br><br>
      <input type="submit" />
</form>
<?php

$server = "localhost";
$db_name = "db_mis_rca";
$user = "sugirayvan";
$pass = "GhostOfYvan";

$search = $_GET['search'];

$connect = mysqli_connect($server,$user,$pass,$db_name);

if($connect){
$query = "SELECT firstName,lastName,telephone,gender,nationality,username,email FROM mis_user WHERE username = '$search' ";
$action = mysqli_fetch_all(mysqli_query($connect,$query));

?>
<table border=1>
  <tr>
    <th>firstName</th>
    <th>lastName</th>
    <th>telephone</th>
    <th>gender</th>
    <th>nationality</th>
    <th>username</th>
    <th>email</th>
</tr>
<?php
for ($i=0;$i<count($action);$i++){
    echo "<tr>";
    for($a=0;$a<count($action[$i]);$a++){
        echo "<td>";
        print_r($action[$i][$a]);
        echo "</td>";
    }
    echo "</tr>";
}
?>
</table>
<?php
}
else{
    echo "Connection has not been successful"."<br>";
}
?>