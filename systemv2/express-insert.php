<!DOCTYPE html>
<?php include "../db_conexion.php"   ?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MFTSYS | Mayan Fantasy Tours <?php echo $VAR_VERSION ?></title>     

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->




<link href="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css" rel="stylesheet">



</head>

<body style="width:100% !important; border:0px solid green">

            <?php
            $VAR_NUM = time();

                   $VAR_CONSEC =   consecutivo($_POST["txtdate1"]);



                $sql="insert into _transfers (num,date1, time1,name,adul,agen,vuel1,tipo,oper,noec,plac,orig1,dest1,consec)
                    values
                ('".$VAR_NUM."','".$_POST["txtdate1"]."','".$_POST["txttime1"]."','".$_POST["txtname"]."',
                ".$_POST["txtadult"].",'".$_POST["txtagen"]."','".$_POST["txtvuel1"]."','".$_POST["txttipo"]."',
                '".$_POST["txtoper"]."',
                '".$_POST["txtnoec"]."',
                '".$_POST["txtplac"]."',
                '".$_POST["txtorig1"]."',
                '".$_POST["txtdest1"]."',
                '".$VAR_CONSEC."'
                )  ";

              // echo $sql;

               adoexecute($sql);

               $sql="select max(id) as total from _transfers";
               $rs = adoopenrecordset($sql);
               $rstemp = mysql_fetch_array($rs);


             ?>
           <form method="post" action="express.php">
            <div class="row" style="width:99%; margin:auto; border:0px solid red;text-align:center">
                  <h1 style="text-align:center">Servicio Generado <br># </h1>
                  <hr>
                  <div style="text-align:center;border:0px solid pink">
                    <button style="width:100%" id="guardar" type="submit" class="btn btn-primary btn-lg btn-block" >AGREGAR OTRO SERVICIO</button>
                  </div>
            </div>
            </form>

    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->


</body>


<script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
<script>
      $("#paso1").show();
      $("#paso2").hide();
      $("#paso3").hide();
      $("#paso4").hide();


</script>

</html>
