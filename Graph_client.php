<?php


 $fac_code= $_GET['fac_code'];
 $date1 = $_GET['date1'];
 $date2 = $_GET['date2'];

$datos = mysqli_connect('localhost', "root", "D1sjjDlvD0", "SM_usr10000");

$query = "SELECT TRF_DATE, COUNT(*) FROM TRAFFIC WHERE (TRF_FAC_CODE= " . $fac_code . " AND  (TRF_DATE BETWEEN  '" . $date1 . " 00:00:00' AND '" . $date2 . " 23:59:59')) GROUP BY SUBSTRING(TRF_DATE, 1, 10)";

$result = mysqli_query($datos, $query);

$n = 0;

echo "{\"Data\":[";

while ($fila = mysqli_fetch_row($result)){
   
    echo "{\"cant\":\"" . $fila[1] . "\",";
    echo "\"date\":\"" . substr($fila[0], 0, 10) . "\"}";


  if (mysqli_num_rows($result) -1 === $n){

  } else {

      echo ",";
  }
  
     $n = $n + 1;
};

echo "]}";



?>