<?php

include_once 'include/layout.inc';

commonHeader( 'RSVP Online' );

?>

<link rel="stylesheet" href="include/rsvp.css" type="text/css">

<div class="container">
  <div class="control-group font-size-14">Please RSVP by August 3rd 2013</div>
  <div class="clear"></div>
  <form id="rsvpform" name="rsvpform" method="post" action="process-rsvp.php">
    <div class="control-group">
      <div class="label-column">
        <label class="font-size-14" for="guest1">Name</label>
      </div>
      <div class="control-column">
        <div class="controls width">
          <input id="guest1" name="guest1" type="text" size="40" value="" onkeyup="validateGuest($('#guest1'))" onblur="validateGuest($('#guest1'))" />
        </div>
        <div class="status"></div>
      </div>
    </div>
    <div class="clear"></div>
    <div class="control-group">
      <div class="label-column">
        <label class="font-size-14" for="email">Email</label>
      </div>
      <div class="control-column">
        <div class="controls width">
          <input id="email" name="email" type="text" size="40" value="" onkeyup="validateEmail($('#email'))" onblur="validateEmail($('#email'))" />
        </div>
        <div class="status"></div>
      </div>
    </div>
    <div class="clear"></div>
    <div class="control-group">
      <div class="label-column">
        <label class="font-size-14" for="guestcount">Replying on behalf of</label>
      </div>
      <div class="control-column">
        <div class="controls width">
          <select id="guestcount" name="guestcount" onchange="guestCountChanged();">
            <option value="1" selected>Yourself only</option>
            <option value="2">Yourself + 1 other invited guest</option>
            <option value="3">Yourself + 2 other invited guests</option>
            <option value="4">Yourself + 3 other invited guests</option>
            <option value="5">Yourself + 4 other invited guests</option>
          </select>
        </div>
      </div>
    </div>
    <div class="clear"></div>
    <div class="control-group hide">
      <div class="label-column">
        <label class="font-size-14" for="guest2">Name of guest</label>
      </div>
      <div class="control-column">
        <div class="controls width">
          <input id="guest2" name="guest2" type="text" size="40" value="" onkeyup="validateGuest($('#guest2'))" onblur="validateGuest($('#guest2'))" />
        </div>
        <div class="status"></div>
      </div>
    </div>
    <div class="clear"></div>
    <div class="control-group hide">
      <div class="label-column">
        <label class="font-size-14" for="guest3">Name of guest</label>
      </div>
      <div class="control-column">
        <div class="controls width">
          <input id="guest3" name="guest3" type="text" size="40" value="" onkeyup="validateGuest($('#guest3'))" onblur="validateGuest($('#guest3'))" />
        </div>
        <div class="status"></div>
      </div>
    </div>
    <div class="clear"></div>
    <div class="control-group hide">
      <div class="label-column">
        <label class="font-size-14" for="guest4">Name of guest</label>
      </div>
      <div class="control-column">
        <div class="controls width">
          <input id="guest4" name="guest4" type="text" size="40" value="" onkeyup="validateGuest($('#guest4'))" onblur="validateGuest($('#guest4'))" />
        </div>
        <div class="status"></div>
      </div>
    </div>
    <div class="clear"></div>
    <div class="control-group hide">
      <div class="label-column">
        <label class="font-size-14" for="guest5">Name of guest</label>
      </div>
      <div class="control-column">
        <div class="controls width">
          <input id="guest5" name="guest5" type="text" size="40" value="" onkeyup="validateGuest($('#guest5'))" onblur="validateGuest($('#guest5'))" />
        </div>
        <div class="status"></div>
      </div>
    </div>
    <div class="clear"></div>
    <div class="control-group">
      <div class="label-column">
        <label class="font-size-14" for="yesorno">RSVP</label>
      </div>
      <div class="control-column">
        <div class="controls width">
          <div><input id="rsvpyes" type="radio" name="yesorno" value="yes" onclick="ableToAttend();"><span id="rsvpspan1" class="font-size-14">I</span><span class="font-size-14"> will be able to attend</span></input></div>
          <div><input id="rsvpno" type="radio" name="yesorno" value="no" onclick="notAbleToAttend();"><span id="rsvpspan2" class="font-size-14">I</span><span class="font-size-14"> will not be able to attend</span></input></div>
        </div>
        <div class="status"></div>
      </div>
    </div>
    <div class="clear"></div>
    <div class="control-group">
      <div class="label-column">
        <label class="font-size-14" for="requirements">Please note any special requirements<br>(e.g dietary, not drinking etc.)</label>
      </div>
      <div class="control-column">
        <div class="controls width">
          <textarea id="requirements" class="box1" name="requirements"></textarea>
        </div>
      </div>
    </div>
    <div class="clear"></div>
    <div class="control-group">
      <div class="label-column">
        <label class="font-size-14" for="message">Message for David and Sarah</label>
      </div>
      <div class="control-column">
        <div class="controls width">
          <textarea id="message" class="box2" name="message"></textarea>
        </div>
      </div>
    </div>
    <div class="clear"></div>
    <div class="control-group">
      <div class="label-column"></div>
      <div class="control-column">
        <div class="controls">
          <input id="rsvp" type="button" onclick="checkForm();" value="Send RSVP" />
        </div>
        <div class="oops font-size-12 error-text hide">
          <p><b>Something's not quite right...<br>Check the items in red.</b></p>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </form>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js">
</script>

<script>

function validateGuest(element) {
    if(element.val() == "") {
        element.parent().removeClass('valid').addClass('error');
        return false;
    } else {
        element.parent().removeClass('error').addClass('valid');
        validateForm();
        return true;
    }
}

function validateEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(email.val()) || email.val() == "") {
        $('#email').parent().removeClass('valid').addClass('error');
        return false;
    } else {
        $('#email').parent().removeClass('error').addClass('valid');
        validateForm();
        return true;
    }
}

function validateRsvp() {
    if(typeof $("#rsvpform input[name='yesorno']:checked").val() === "undefined") {
        $("#rsvpyes").parent().parent().removeClass('valid').addClass('error');
        return false;
    } else {
        $("#rsvpyes").parent().parent().removeClass('error').addClass('valid');
        validateForm();
        return true;
    }
}

function ableToAttend() {
    $('#requirements').parents('.control-group').show();
    $("#rsvpyes").parent().parent().removeClass('error').addClass('valid');
    validateForm();
}

function notAbleToAttend() {
    $('#requirements').parents('.control-group').hide();
    $("#rsvpyes").parent().parent().removeClass('error').addClass('valid');
    validateForm();
}

function validateForm() {
    if($('.error').length == 0) {
        $('.oops').hide();
    }
}

function guestCountChanged() {
    var count = $('#guestcount').prop('selectedIndex');
    if(count == 0) {
        $('#rsvpspan1,#rsvpspan2').text('I');
    } else {
        $('#rsvpspan1,#rsvpspan2').text('We');
    }
    for(var i = 0; i < 4; ++i) {
        if(i < count) {
            $('#guest' + (i + 2)).parents('.control-group').show();
        } else {
            $('#guest' + (i + 2)).parents('.control-group').hide();
            $('#guest' + (i + 2)).parent().removeClass('error').removeClass('valid');
        }
    }
}

function checkForm() {
    var error = false;

    error |= !validateGuest($('#guest1'));

    error |= !validateEmail($('#email'));

    var count = $('#guestcount').prop('selectedIndex');
    if(count > 0) {
        for(var i = 0; i < count; ++i) {
            error |= !validateGuest($('#guest' + (i + 2)));
        }
    }

    error |= !validateRsvp();

    if(!error) {
        $('.oops').hide();
        document.rsvpform.submit();
    } else {
        $('.oops').show();
    }

    return;
}

</script>

<?php

commonFooter();

?>
