<!DOCTYPE html>
<html lang="">
  <head>
    <title></title>
    <style type="text/css">
      ul{
        display: flex;
        flex-direction: row;
        list-style-type: none;
      }
      li{
        border-style: solid;
        border-color: blue;
        border-radius: 10px;
        padding: 23px;
        margin: 10px;
      }
      li.ez{
        background-color: orange;
      }
    </style>
  </head>
  <body onload="betolt()">
    <h1>Itt van a főblokk</h1>
    <div>Ebbe a divbe jönnek majd a szarok, remélhetőleg
    <?php
      $servername = "localhost";
      $username = "abelbodi_proba";
      $password = "86f7e437faa5a7fce15d1ddcb9eaeaea377667b8";
      $dbname = "abelbodi_proba";

      $conn = new mysqli($servername, $username, $password, $dbname);
      
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      echo "<h3 id='lenyeg'>".$_GET["p"]."</h3>";
      echo "Connected - árvíztűrő tükörfúrógép - successfully";
      mysqli_set_charset($conn,"utf8");
      $alma = $_GET["p"];
      $alma = $alma*4;
      $kicsi = $alma-3;
      $sql = "SELECT title, szoveg FROM esemenyek WHERE uid BETWEEN ".$kicsi." AND ".$alma;
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<h1>Title: " . $row["title"]. "</h1><br>szoveg:" . $row["szoveg"]. "<br>";
        }
      } else {
        echo "0 results";
      }

      $conn->close();
    ?>
    </div>
      <ul>
        <li onclick="lepos(this)">1</li>
        <li onclick="lepos(this)">2</li>
        <li onclick="lepos(this)">3</li>
        <li onclick="lepos(this)">4</li>
      </ul>
    <script type="text/javascript">
      function betolt(){
        var pagenum = <?php echo $_GET["p"]; ?>;
        document.getElementsByTagName("li")[pagenum-1].classList.add("ez");
      }

      function lepos(kilep){
        //var pagenum = window.location.hash.slice(1);
        //console.log(pagenum);
        var pagenum = <?php echo $_GET["p"]; ?>;
        //kilep.classList.add("ez");
        if (pagenum != "" && pagenum != kilep.innerText) {
          //document.getElementsByTagName("li")[pagenum-1].classList.remove("ez");

          ujloc = "https://abelbodis.hu/test/muti.php?p="+kilep.innerText;
          window.location.replace(ujloc);
        }
        
        //var hanyadikoldal = <?php echo $_GET["p"]; ?>;
        //var $_GET = <?php echo json_encode($_GET); ?>;
        //alert($_GET.p);
        //window.location.hash = kilep.innerText;
      }
    </script>
  </body>
</html>
