<?php include "db_.php"   ?>
<?php


$sql="select * from _tarifas where
      tar_agen = '".$_GET["agen"]."' and
      tar_pick = '".$_GET["pick"]."' and
      tar_drop = '".$_GET["drop"]."' and
      tar_serv = '".$_GET["serv"]."' and
      tar_paxd <= '".$_GET["pax"]."' and
      tar_paxa >= '".$_GET["pax"]."' and

      tar_vehi = '".$_GET["vehi"]."'
      ; ";

//echo $sql;


$rs = adoopenrecordset($sql);
$rstemp = mysql_fetch_array($rs);
echo    0+$rstemp["tar_tari"];





?>