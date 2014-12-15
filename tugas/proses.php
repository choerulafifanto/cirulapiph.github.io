<!DOCTYPE html>
<html lang="en">
  <head>
  </head>

  <body>
      <?php session_start();
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
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['password'] = $_POST['password'];
                    
                    ?><script language="javascript">alert('Selamat, Login Anda Sukses!!');
                    document.location='adminPehape.php';</script><?
                } else {
                    ?><script language="javascript">alert('Maaf, username dan password salah!!');
                    document.location='guestBook.php';</script><?
                }   
            }
            
            if( isset($_POST['submit']) ){
                $nama = $_POST['nama'];
                $email = $_POST['email'];
                $web = $_POST['web'];
                $komentar = $_POST['komentar'];
                
                
                $sql = "INSERT INTO bukuTamu (Nama,Email,Website,Komentar,isApproved) "
                                . "VALUES ('$nama','$email','$web','$komentar','NO')";
                $hasil=mysql_query($sql,$con) or die('Error: ' . mysql_error());
                ?><script language="javascript">alert('Terima kasih, komentar anda akan segera kami tanggapi');
                    document.location='guestBook.php';</script><?
            }
            
            if( isset($_POST['jawab']) && isset($_GET['id_tamu'])){
                $id_tamu = $_GET['id_tamu'];
                $jawaban = $_POST['jawaban'];
                
                $sql = "UPDATE bukuTamu SET Jawaban='$jawaban', isApproved='YES' WHERE id_tamu='$id_tamu'";
                $hasil=mysql_query($sql,$con) or die('Error: ' . mysql_error());
                ?><script language="javascript">alert('Buku Tamu telah dimoderasi');
                    document.location='adminPehape.php';</script><?
            }
            
            if( isset($_POST['hapus']) && isset($_GET['id_tamu'])){
                $id_tamu = $_GET['id_tamu'];
                
                $sql = "DELETE FROM bukuTamu WHERE id_tamu='$id_tamu'";
                $hasil=mysql_query($sql,$con) or die('Error: ' . mysql_error());
                ?><script language="javascript">alert('Komentar telah dihapus');
                    document.location='adminPehape.php';</script><?
            }
            //mysql_close($con);
        ?>
  </body>
</html>