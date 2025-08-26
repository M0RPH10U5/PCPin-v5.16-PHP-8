<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML><HEAD>
<TITLE><?PHP ECHO $conf[title]?></TITLE>
<?PHP ECHO $css?>
</HEAD>
<BODY onload="document.loginform.login.focus(); document.loginform.login.select();">
<DIV align="center">
<IMG src="<?PHP ECHO IMAGEPATH?>/clearpixel.gif" width="1" height="150" border="0" alt="">
<TABLE class="dforeground" border="0" cellspacing="1" cellpadding="5">
  <FORM name="loginform" action="main.php" method="post">
    <INPUT type="hidden" name="include" value="2">
    <INPUT type="hidden" name="language" value="<?PHP ECHO $language?>">
    <INPUT type="hidden" name="register" value="">
    <INPUT type="hidden" name="lostpassword" value="">
    <INPUT type="hidden" name="admin" value="<?PHP ECHO $admin?>">
<?PHP
IF($errortext){
?>
    <TR valign="center">
      <TD class="error" colspan="2">
        <B><I><?PHP ECHO $errortext?></I></B>
      </TD>
    </TR>
<?PHP
}
?>
    <TR valign="center">
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["login"]?>:</B>
      </TD>
      <TD class="hforeground" align="left">
        <INPUT type="text" class="textinputs" name="login" value="<?PHP ECHO $login?>" maxlength="255">
      </TD>
    </TR>
    <TR valign="center">
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["password"]?>:</B>
<?PHP
IF($session->config->allow_guests){
?>
        <BR>(<?PHP ECHO $lng["registeredonly"]?>)
<?PHP
}
?>
      </TD>
      <TD class="hforeground" align="left">
        <INPUT type="password" class="textinputs" name="password" maxlength="<?PHP ECHO $session->config->password_length_max?>">
      </TD>
    </TR>
    <TR valign="center">
      <TD class="hforeground" align="center" colspan="2">
        <INPUT type="submit" class="buttons" value="<?PHP ECHO $lng["enter"]?>" onClicK="document.loginform.register.value=0; document.loginform.lostpassword.value=0">
      </TD>
    </TR>
    <TR valign="center">
      <TD class="hforeground" align="center" colspan="2">
        <INPUT type="button" class="buttons" value="<?PHP ECHO $lng["register"]?>" onClick="document.loginform.register.value=1; document.loginform.submit();">
        &nbsp;
        <INPUT type="button" class="buttons" value="<?PHP ECHO $lng["lostpassword"]?>" onClick="document.loginform.lostpassword.value=1; document.loginform.submit();">
      </TD>
    </TR>
  </FORM>
</TABLE>
<!-- Please don't remove next line. Thank You! -->
<a href="http://www.pcpin.com" style="font-size:10; color:#990000;" target="_blank">Powered by PCPIN.com</a>
</DIV>
</BODY>
</HTML>
