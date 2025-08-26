<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML><HEAD>
<TITLE><?PHP ECHO $conf[title]?></TITLE>
<?PHP ECHO $css?>
</HEAD>
<BODY>
<DIV align="center">
  <IMG src="<?PHP ECHO IMAGEPATH?>/clearpixel.gif" width="1" height="150" border="0" alt="">
  <TABLE class="dforeground" border="0" cellspacing="1" cellpadding="5">
<?PHP
IF($user_saved){
?>
  <FORM name="loginform" action="main.php" method="post">
    <INPUT type="hidden" name="language" value="<?PHP ECHO $language?>">
    <TR valign="center">
      <TD class="hforeground" colspan="2" align="center">
        <B>
          <?PHP ECHO $lng["registrationsuccessfull"]?>
          <BR>
          <?PHP ECHO $lng["confirmemailsent"]?>
        </B>
      </TD>
    </TR>
    <TR valign="center">
      <TD class="hforeground" align="center" colspan="2">
        <INPUT type="submit" class="buttons" value="<?PHP ECHO $lng["ok"]?>">
      </TD>
    </TR>
<?PHP
}ELSE{
?>
    <TR valign="center">
      <TD class="hforeground" colspan="2" align="center">
        <B><?PHP ECHO $lng["registration"]?></B>
      </TD>
    </TR>
<?PHP
  IF(IS_ARRAY($errortext)){
    FOR($i=0;$i<COUNT($errortext);$i++){
?>
    <TR valign="center">
      <TD class="error" colspan="2">
        <B><?PHP ECHO $errortext[$i]?></B>
      </TD>
    </TR>
<?PHP
    }
  }
?>
  <FORM name="loginform" action="main.php" method="post" onload="document.loginform.login.focus(); document.loginform.login.select();">
    <INPUT type="hidden" name="include" value="2">
    <INPUT type="hidden" name="language" value="<?PHP ECHO $language?>">
    <INPUT type="hidden" name="register" value="1">
    <INPUT type="hidden" name="submitted" value="1">
    <TR valign="center">
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["login"]?>: *</B>
      </TD>
      <TD class="hforeground" align="left">
        <INPUT type="text" class="textinputs" name="login" value="<?PHP ECHO $login?>" maxlength="<?PHP ECHO $session->config->login_length_max?>">
      </TD>
    </TR>
    <TR valign="center">
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["email"]?>: *</B>
      </TD>
      <TD class="hforeground" align="left">
        <INPUT type="text" class="textinputs" name="email" value="<?PHP ECHO $email?>" maxlength="255">
      </TD>
    </TR>
<?PHP
  IF(!$session->config->require_activation){
?>
    <TR>
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["password"]?>: *</B>
      </TD>
      <TD class="hforeground" align="left">
        <INPUT type="password" class="textinputs" name="new_password_1" size="10" maxlength="<?PHP ECHO $session->config->password_length_max?>">
      </TD>
    </TR>
    <TR>
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["confirmpass"]?>: *</B>
      </TD>
      <TD class="hforeground" align="left">
        <INPUT type="password" class="textinputs" name="new_password_2" size="10" maxlength="<?PHP ECHO $session->config->password_length_max?>">
      </TD>
    </TR>
<?PHP
  }
?>
    <TR valign="center">
      <TD class="hforeground" align="center" colspan="2">
        <INPUT type="submit" class="buttons" value="<?PHP ECHO $lng["register"]?>">
        &nbsp;
        <INPUT type="button" class="buttons" value="<?PHP ECHO $lng["cancel"]?>" onClick="document.loginform.submitted.value=''; document.loginform.register.value=''; document.loginform.login.value=''; document.loginform.submit();">
      </TD>
    </TR>
<?PHP
}
?>
  </FORM>
</TABLE>
</DIV>
</BODY>
</HTML>
