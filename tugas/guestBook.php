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
          if( !session_is_registered('username') ){ ?>
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
          <?php }else{ ?>
              <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"><?echo "Hi! $username "?><strong class="caret"></strong></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Logout</a></li>
                    </ul>
                </li>
          <?php } ?>
          <!-- <li class="dropdown">
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
           <li class="dropdown">
               <a class="dropdown-toggle" href="#" data-toggle="dropdown"><?echo "Hi! $username "?><strong class="caret"></strong></a>
               <ul class="dropdown-menu" role="menu">
                   <li><a href="#">Logout</a></li>
               </ul>
           </li> -->
        </ul>
        <h3 class="text-muted">CHOERUL AFIFANTO</h3>
      </div>
        
        <form action="proses.php" method="post" name="tamu" >
        <table id="tamu" class="table">
          <tr>
            <td><label for="nama">Nama</label></td>
            <td><input name="nama" autocomplete="off" size="35" maxlength="50" type="text"></td>
          </tr>   
          <tr>
            <td><label for="email">Email</label></td>
            <td><input name="email" size="35" maxlength="30" type="email" required></td>
          </tr>      
          <tr>
            <td><label for="web">Website</label></td>
            <td><input name="web" size="35" maxlength="35" type="url"></td>
          </tr>   
          <tr>
            <td><label for="komentar">Komentar</label></td>
            <td><textarea cols="50" name="komentar" rows="10" ></textarea></td>
          </tr>   
          <tr>
            <td>&nbsp;</td>
            <td><input name="Submit" value="Kirim" type="submit" ></td>
          </tr> 
        </table>
       </form>
      
      <br><br>
      <div class="row">
         <div class="container">
             <h4>DAFTAR PROJECT LAINNYA</h4>
         </div>
         <div class="list-group">
             <a href="tugasJavascript.html" class="list-group-item">[Javascript] Ganti Warna & Perkalian</a>
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