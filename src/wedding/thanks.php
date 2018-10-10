<?php

include_once 'include/layout.inc';

commonHeader( 'RSVP Online' );

?>

<div class="container">
  <div class="content">
    <h2>Your RSVP has been delivered</h2>
    <p class="font-size-14">Thanks for getting back to us.<br><br>

<?php
if($_REQUEST['rsvp'] == 'yes') {
?>

    We will see you at Merchiston Castle on Saturday 24th August!</p>

<?php
} else {
?>

   We are sorry to hear you can't make it. But don't worry, we will save you a piece of cake!</p>

<?php
}
?>

  </div>
</div>
<br>

<?php
commonFooter();

?>
