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
            mysql_select_db($db,$con) or die(mysql_error());
            if( !$con ){
                ?><script language="javascript">alert("Gagal Koneksi Database MySql !!")</script><?
                die('Could not connect: ' . mysql_error());
            }
            
            if ( isset($_POST['login']) ){
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                $sql = mysql_query("SELECT * FROM user WHERE username='$username' &&
                password='$password'");
                $num = mysql_num_rows($sql);
                if($num==1) {
                // login benar //
                    $_SESSION['user'] = $username;
                    $_SESSION['passwd'] = $password;
                    ?><script language="javascript">alert('Selamat, Login Anda Sukses!!');
                    document.location='guestBook.php'</script><?
                } else {
                    ?><script language="javascript">document.location='guestBook.php'</script><?
                }
                
            }
            //mysql_close($con);
        ?>
  </body>
</html>