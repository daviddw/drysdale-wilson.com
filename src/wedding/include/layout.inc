<?php

# commonheader()
#
#

function commonHeader($title="") {

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
 <title><?php if ($title) echo "$title";?></title>
 <link rel="stylesheet" type="text/css" href="include/common.css" />
 <link rel="shortcut icon" href="/favicon.ico" />
<?php echo (isset($PBASE) ? ' <base href="' . $PBASE . '" />' : ''); ?>
<body bgcolor="#ffffff" text="#000000"
     link="#000099" alink="#0000ff" vlink="#000099">
<div class="border">
  <div class="main-menu">
    <div>
      <div></div>
      <div>
        <div>
          <div class="font-size-24 burgundy-text"><a class="burgundy-text" href=".">David and Sarah's Wedding</a></div>
          <div class="font-size-14 burgundy-text">Saturday 24th August 2013</div>
          <div><hr /></div>
        </div>
        <div class="menu-container">
          <ul class="menu">
            <li class="menu-item <?php if($title == "Ceremony and Reception") echo "selected"; ?>">
              <a class="font-size-12" href="ceremonyandreception.php">CEREMONY AND RECEPTION</a>
            </li>
            <li class="menu-item <?php if($title == "Evening Reception") echo "selected"; ?>">
              <a class="font-size-12" href="eveningreception.php">EVENING RECEPTION</a>
            </li>
            <li class="menu-item <?php if($title == "Wedding Party") echo "selected"; ?>">
              <a class="font-size-12" href="wedding-party.php">WEDDING PARTY</a>
            </li>
            <li class="menu-item <?php if($title == "RSVP Online") echo "selected"; ?>">
              <a class="font-size-12" href="rsvp.php">RSVP ONLINE</a>
            </li>
            <li class="menu-item <?php if($title == "Photographs") echo "selected"; ?>">
              <a class="font-size-12" href="photographs.php">PHOTOGRAPHS</a>
            </li>
          </ul>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
<?php
}


# commonfooter()
#
#

function commonFooter() {
           
?>
  <div class="footer">
    <div class="float-left burgundy-text"><small><?php echo '&copy; Drysdale-Wilson 2013.' ?></small></div>
    <div class="footer-right float-right burgundy-text"><small>Last updated: <?php echo gmdate( "D, d M Y H:i:s \G\M\T.", getlastmod() ); ?></small></div>
  </div>
</div>
</body>
</html>
<?php
}
?>
