<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<HTML>
<HEAD>
<SCRIPT type="text/javascript">
  function disablePass(){
    if(document.newroom.protect[0].checked){
      document.newroom.roompassword.disabled=true;
    }else{
      document.newroom.roompassword.disabled=false;
    }
  }
<?PHP
REQUIRE(SCRIPTPATH.'/badwords.js.php');
?>
  function checkRoomName(){
    if(replaceBadWords(document.newroom.roomname.value)!=document.newroom.roomname.value){
      return false;
    }else{
      return true;
    }
  }
</SCRIPT>
<?PHP ECHO $css?>
</HEAD>
<BODY onload="disablePass(); document.newroom.roomname.focus(); document.newroom.roomname.select();">
<DIV align="center">
  <IMG src="<?PHP ECHO IMAGEPATH?>/clearpixel.gif" width="1" height="50" border="0" alt="">
  <TABLE class="dforeground" border="0" cellspacing="1" cellpadding="6">
    <FORM name="newroom" action="main.php" method="post" enctype="multipart/form-data">
      <INPUT type="hidden" name="session_id" value="<?PHP ECHO $session_id?>">
      <INPUT type="hidden" name="include" value="<?PHP ECHO $include?>">
      <INPUT type="hidden" name="createroom" value="1">
      <INPUT type="hidden" name="admin_manage_rooms" value="<?PHP ECHO $admin_manage_rooms?>">
      <INPUT type="hidden" name="old_room_id" value="<?PHP ECHO $old_room_id?>">
      <INPUT type="hidden" name="frame" value="main">
      <TR valign="center">
        <TD class="hforeground" align="center" colspan="2">
          <B><?PHP ECHO $lng["createroom"]?></B>
        </TD>
      </TR>
<?PHP
IF($errortext){
?>
      <TR>
        <TD class="error" align="left" colspan="2">
          <B><I><?PHP ECHO $errortext?></I></B>
        </TD>
      </TR>
<?PHP
}
?>
      <TR>
        <TD class="hforeground" align="left">
          <B><?PHP ECHO $lng["roomname"]?>:</B>
        </TD>
        <TD class="hforeground" align="left">
          <INPUT type="text" class="textinputs" name="roomname" value="<?PHP ECHO $roomname?>" size="20" maxlength="64">
        </TD>
      </TR>
<?PHP
IF($session->config->max_roomimage_size){
?>
      <TR>
        <TD class="hforeground" align="left">
          <B><?PHP ECHO $lng["backgroundimage"]?>:</B>
        </TD>
        <TD class="hforeground" align="left">
          <INPUT type="file" name="bgimg">
        </TD>
      </TR>
<?PHP
}
?>
      <TR>
        <TD class="hforeground" align="center">
          <B><?PHP ECHO $lng["protectwithpass"]?>:</B>
        </TD>
        <TD class="hforeground" align="left">
          <INPUT type="radio" name="protect" value="0" <?PHP ECHO $protect_0_checked?> onclick="disablePass();">&nbsp;<?PHP ECHO $lng["no"]?>
          <BR>
          <INPUT type="radio" name="protect" value="1" <?PHP ECHO $protect_1_checked?> onclick="disablePass();">&nbsp;<?PHP ECHO $lng["yes"]?>
        </TD>
      </TR>
      <TR>
        <TD class="hforeground" align="left">
          <B><?PHP ECHO $lng["roompassword"]?>:</B>
        </TD>
        <TD class="hforeground" align="left">
          <INPUT type="password" class="textinputs" name="roompassword" size="12" maxlength="32">
        </TD>
      </TR>
      <TR>
        <TD colspan="2" class="hforeground" align="center">
          <INPUT type="submit" class="buttons" value="<?PHP ECHO $lng["createroom"]?>" onclick="return checkRoomName();">
<?PHP
IF(!$admin_manage_rooms){
?>
          &nbsp;
          <INPUT type="button" class="buttons" value="<?PHP ECHO $lng["cancel"]?>" onclick="parent.window.location.href='main.php?include=4&session_id=<?PHP ECHO $session_id?>&room_id=<?PHP ECHO $old_room_id?>'">
<?PHP
}
?>
        </TD>
      </TR>
    </FORM>
  </TABLE>
</DIV>
</BODY></HTML>