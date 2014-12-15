<!DOCTYPE html>
<html lang="en">
  <head>
  </head>

  <body>
      <?php
          session_start();
          session_destroy();
          ?><script language="javascript">
                    document.location='guestBook.php';</script><?
      ?>
  </body>
</html>