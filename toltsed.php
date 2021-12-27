<?php
  header('Content-Type: text/html; charset=utf-8');
  $servername = "localhost";
  $username = "abelbodi_proba";
  $password = "86f7e437faa5a7fce15d1ddcb9eaeaea377667b8";
  $dbname = "abelbodi_proba";
  //$charset = "utf8";

  $conn = new mysqli($servername, $username, $password, $dbname);
  

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";

  echo $_POST['cim'];
  echo $_POST['kep'];
  //echo $_POST['szoveg'];
  echo date('Y-m-d');
  echo "\n";

  $sql = "INSERT INTO esemenyek (title, date, kep, szoveg) VALUES (N'".$_POST['cim']."','".date('Y-m-d')."','".$_POST['kep']."',N'".$_POST['szoveg']."');";
  echo $sql;
  if ($conn->query($sql) === TRUE) {
    echo "Jók vagyunk főni!";
  } else {
    echo "Ajjaj :( :" . $conn->error;
  }

  $conn->close();
?>