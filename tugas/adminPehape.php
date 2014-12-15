<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="../images/circle.png">

    <title>PHP</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/jumbotron-narrow.css" rel="stylesheet">
    <link href="../css/carousel.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <div class="header">
        <ul id="navi" class="nav nav-pills pull-right" role="tablist">
          <li role="presentation"><a href="home.html">Home</a></li>
          <li role="presentation"><a href="#">About</a></li>
          <li role="presentation"><a href="#">Contact</a></li>
          <!-- <script> yangMana(); </script> -->
          <?php session_start();
          include 'conn.php';
          //session_destroy();
          if( isset( $_SESSION['username'] )){
              ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"><?echo 'Hi! '.$_SESSION['username']; ?><strong class="caret"></strong></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
          <?php }else{ ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
                    <div class="dropdown-menu" style="padding: 15px;">
                        <form method="post" action="proses.php" accept-charset="UTF-8">
                                <input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" name="username">
                                <input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
                                <input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
                                <label class="string optional" for="user_remember_me"> Remember me</label>
                                <input class="btn btn-primary btn-block" type="submit" name="login" id="sign-in" value="Sign In">
                        </form>
                    </div>
                </li>
          <?php } ?>
        </ul>
        <h3 class="text-muted">CHOERUL AFIFANTO</h3>
      </div>
        
        <!-- WAITING LIST-->
        <?php 
            $query=mysql_query("SELECT * FROM bukuTamu WHERE isApproved='NO'"); ?>
            <h4>KOMENTAR BELUM DIMODERASI</h4>
            <? while($row=mysql_fetch_array($query)){ ?>
            <form action="proses.php?id_tamu=<? echo $row['id_tamu']?>" method="post" name="tamu" >
            <table id="tamu" class="table">
                  <tr>
                    <td><label for="nama">Nama</label></td>
                    <td colspan="2"><label for="nama" name="nama"><? echo $row['Nama'];?></label></td>
                  </tr>   
                  <tr>
                    <td><label for="email">Email</label></td>
                    <td colspan="2"><label for="email"><? echo $row['Email'];?></label></td>
                  </tr>      
                  <tr>
                    <td><label for="web">Website</label></td>
                    <td colspan="2"><label for="web"><? echo $row['Website']; ?></label></td>
                  </tr>   
                  <tr>
                    <td><label for="komentar">Komentar</label></td>
                    <td colspan="2"><label for="komentar"><? echo $row['Komentar']; ?></label></td>
                  </tr>
                  <tr>
                    <td><label for="jawaban">Jawaban</label></td>
                    <td colspan="2"><textarea cols="50" name="jawaban" rows="10" ></textarea></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><input name="jawab" value="Jawab" type="submit"></td>
                    <td><input name="hapus" value="Hapus" type="submit"</td>
                  </tr> 
            </table>
            </form>
            <? } ?>
            
      
      <!-- APPROVED LIST-->
      <?php 
            $query=mysql_query("SELECT * FROM bukuTamu WHERE isApproved='YES'"); ?>
            <h4>KOMENTAR TERMODERASI</h4>
            <table id="tamu" class="table table-striped">
            <? while($row=mysql_fetch_array($query)){ ?>    
                  <tr>
                    <td><label for="nama">Nama</label></td>
                    <td><label for="nama" name="nama"><? echo $row['Nama'];?></label></td>
                  </tr>   
                  <tr>
                    <td><label for="email">Email</label></td>
                    <td><label for="email"><? echo $row['Email'];?></label></td>
                  </tr>      
                  <tr>
                    <td><label for="web">Website</label></td>
                    <td><label for="web"><? echo $row['Website']; ?></label></td>
                  </tr>   
                  <tr>
                    <td><label for="komentar">Komentar</label></td>
                    <td><label for="komentar"><? echo $row['Komentar']; ?></label></td>
                  </tr>
                  <tr>
                    <td><label for="jawaban">Jawaban</label></td>
                    <td><label for="komentar"><? echo $row['Jawaban']; ?></label></td>
                  </tr>
                  <tr><th></th><th></th></tr>
            <? } ?>
            </table>
      
      <br><br>
      <div class="row">
         <div class="container">
             <h4>DAFTAR PROJECT LAINNYA</h4>
         </div>
         <div class="list-group">
             <a href="tugasJavascript.php" class="list-group-item">[Javascript] Ganti Warna & Perkalian</a>
             <a href="guestBook.php" class="list-group-item active">[PHP] Buku Tamu </a>
         </div>
      </div>
      

      <div class="footer">
          <p>&copy; Choerul Afifanto<br><i>12.7077 - 3KS2</i></p>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>