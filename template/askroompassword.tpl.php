<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML><HEAD>
<TITLE><?PHP ECHO $conf[title]?></TITLE>
<?PHP ECHO $css?>
</HEAD>
<BODY onload="document.loginform.t.focus();">
<DIV align="center">
  <TABLE class="dforeground" border="0" cellspacing="1" cellpadding="6">
    <FORM name="loginform" action="main.php" method="post" target="_parent">
      <INPUT type="hidden" name="include" value="<?PHP ECHO $include?>">
      <INPUT type="hidden" name="session_id" value="<?PHP ECHO $session_id?>">
      <INPUT type="hidden" name="m" value="<?PHP ECHO $m?>">
      <INPUT type="hidden" name="u" value="<?PHP ECHO $u?>">
      <INPUT type="hidden" name="x" value="<?PHP ECHO $x?>">
      <INPUT type="hidden" name="submitted" value="1">
      <TR>
        <TD class="hforeground" align="center">
          <B><?PHP ECHO STR_REPLACE("{ROOM}",$roomname,$lng["enterroompassword"])?></B>
        </TD>
      </TR>
<?PHP
IF($errortext){
?>
      <TR>
        <TD class="error" align="center">
          <B><I><?PHP ECHO $errortext?></I></B>
        </TD>
      </TR>
<?PHP
}
?>
      <TR>
        <TD class="hforeground" align="center">
          <INPUT type="password" class="textinputs" name="t" size="12" maxlength="32">
          &nbsp;<INPUT type="submit" class="buttons" value="<?PHP ECHO $lng["go"]?>">
        </TD>
      </TR>
      <TR>
        <TD align="center" class="hforeground">
          <INPUT type="button" class="buttons" value="<?PHP ECHO $lng["cancel"]?>" onclick="parent.window.location.href='main.php?session_id=<?PHP ECHO $session_id?>&include=<?PHP ECHO $x?>&room_id=<?PHP ECHO $u?>';">
        </TD>
      </TR>
    </FORM>
  </TABLE>
</DIV>
</BODY>
</HTML>
