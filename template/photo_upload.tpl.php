<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<HTML><HEAD>
<?PHP ECHO $css?>
</HEAD>
<BODY onload="window.focus();">
<DIV align="center">
  <TABLE class="dforeground" border="0" width="100%" cellspacing="1" cellpadding="6">
    <FORM name="photo_upload" action="main.php" method="post" enctype="multipart/form-data">
      <INPUT type="hidden" name="session_id" value="<?PHP ECHO $session_id?>">
      <INPUT type="hidden" name="include" value="<?PHP ECHO $include?>">
      <INPUT type="hidden" name="back" value="<?PHP ECHO $back?>">
      <INPUT type="hidden" name="profile_user_id" value="<?PHP ECHO $profile_user_id?>">
      <INPUT type="hidden" name="submitted" value="1">
      <TR>
        <TD class="hforeground" align="center">
          <B><?PHP ECHO $lng["photoupload"]?></B>
        </TD>
      </TR>
<?PHP
IF($errortext){
?>
      <TR>
        <TD class="error" align="center">
          <B><?PHP ECHO $errortext?></B>
        </TD>
      </TR>
<?PHP
}
?>
      <TR>
        <TD class="hforeground" align="center">
          <INPUT type="file" name="photo">
        </TD>
      </TR>
      <TR>
        <TD class="hforeground" colspan="2" align="center">
          <INPUT type="submit" class="buttons" value="Save changes">
          &nbsp;
          <INPUT type="button" class="buttons" value="<?PHP ECHO $lng["cancel"]?>" onclick="window.location.href='main.php?session_id=<?PHP ECHO $session_id?>&include=<?PHP ECHO $back?>&profile_user_id=<?PHP ECHO $profile_user_id?>';">
        </TD>
      </TR>
    </FORM>
  </TABLE>
</DIV>
</BODY>
</HTML>
