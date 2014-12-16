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
    
    <!-- Javascript external files -->
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
            <table class="table">
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
                    <td colspan="2"><label for="komentar" style="width: 500px; word-wrap: break-word;"><? echo $row['Komentar']; ?></label></td>
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
            <table class="table table-striped">
            <tbody id="tamu" style="display: table-row-group">
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
                    <td><label for="komentar" style="width: 500px; word-wrap: break-word;"><? echo $row['Komentar']; ?></label></td>
                  </tr>
                  <tr>
                    <td><label for="jawaban">Jawaban</label></td>
                    <td><label for="komentar" style="width: 500px; word-wrap: break-word;"><? echo $row['Jawaban']; ?></label></td>
                  </tr>
                  <tr><th></th><th></th></tr>
            <? } ?>
            </tbody>
            </table>
            <div class="col-md-12 text-center">
            <ul class="pagination pagination-lg pager" id="myPager"></ul>
            </div>
      
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
    <!-- PAGINATION JS -->
    <script type="text/javascript">
        $.fn.pageMe = function(opts){
        var $this = this,
            defaults = {
                perPage: 24,
                showPrevNext: false,
                hidePageNumbers: false
            },
            settings = $.extend(defaults, opts);

        var listElement = $this;
        var perPage = settings.perPage; 
        var children = listElement.children();
        var pager = $('.pager');

        if (typeof settings.childSelector!="undefined") {
            children = listElement.find(settings.childSelector);
        }

        if (typeof settings.pagerSelector!="undefined") {
            pager = $(settings.pagerSelector);
        }

        var numItems = children.size();
        var numPages = Math.ceil(numItems/perPage);

        pager.data("curr",0);

        if (settings.showPrevNext){
            $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
        }

        var curr = 0;
        while(numPages > curr && (settings.hidePageNumbers==false)){
            $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
            curr++;
        }

        if (settings.showPrevNext){
            $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
        }

        pager.find('.page_link:first').addClass('active');
        pager.find('.prev_link').hide();
        if (numPages<=1) {
            pager.find('.next_link').hide();
        }
            pager.children().eq(1).addClass("active");

        children.hide();
        children.slice(0, perPage).show();

        pager.find('li .page_link').click(function(){
            var clickedPage = $(this).html().valueOf()-1;
            goTo(clickedPage,perPage);
            return false;
        });
        pager.find('li .prev_link').click(function(){
            previous();
            return false;
        });
        pager.find('li .next_link').click(function(){
            next();
            return false;
        });

        function previous(){
            var goToPage = parseInt(pager.data("curr")) - 1;
            goTo(goToPage);
        }

        function next(){
            goToPage = parseInt(pager.data("curr")) + 1;
            goTo(goToPage);
        }

        function goTo(page){
            var startAt = page * perPage,
                endOn = startAt + perPage;

            children.css('display','none').slice(startAt, endOn).show();

            if (page>=1) {
                pager.find('.prev_link').show();
            }
            else {
                pager.find('.prev_link').hide();
            }

            if (page<(numPages-1)) {
                pager.find('.next_link').show();
            }
            else {
                pager.find('.next_link').hide();
            }

            pager.data("curr",page);
            pager.children().removeClass("active");
            pager.children().eq(page+1).addClass("active");

        }
    };

    $(document).ready(function(){

      $('#tamu').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:24});

    });
    </script>
  </body>
</html>