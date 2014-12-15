<!DOCTYPE html>
<html lang="en">
  <head>
  </head>

  <body>
      <?php
            $host = "mysql.idhostinger.com";
            $user = "u942256480_cirul";
            $pass = "dorksider1994";
            $db = "u942256480_tamu";
            $con = mysql_connect($host,$user,$pass);
            mysql_select_db($db,$con);
            if( !$con ){
                ?><script language="javascript">alert("Gagal Koneksi Database MySql !!")</script><?
                die('Could not connect: ' . mysql_error());
            }
            
            
            //mysql_close($con);
        ?>
  </body>
</html>