<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<HTML><HEAD>
<TITLE><?PHP ECHO $session->config->title?></TITLE>
<?PHP ECHO $css?>
</HEAD>
<BODY>
<DIV align="center">
  <TABLE class="dforeground" border="0" cellspacing="1" cellpadding="6">
<?PHP
IF($password_changed){
?>
    <FORM name="profileform" action="main.php" method="post">
      <INPUT type="hidden" name="language" value="<?PHP ECHO $language?>">
      <TR>
        <TD class="hforeground" colspan="2" align="center">
          <B><?PHP ECHO $lng["passchanged"]?></B>
        </TD>
      </TR>
      <TR>
        <TD class="hforeground" colspan="2" align="center">
          <INPUT type="submit" class="buttons" value="<?PHP ECHO $lng["ok"]?>">
        </TD>
      </TR>
<?PHP
}ELSE{
?>
      <TR>
        <TD colspan="2" class="hforeground" align="center">
          <B><?PHP ECHO $lng["accountactivation"]?></B>
        </TD>
      </TR>
<?PHP
  IF(IS_ARRAY($errortext)){
    FOR($i=0;$i<COUNT($errortext);$i++){
?>
      <TR>
        <TD colspan="2" class="error" align="left">
          <B><?PHP ECHO $errortext[$i]?></B>
        </TD>
      </TR>
<?PHP
    }
  }
?>
    <FORM name="profileform" action="main.php" method="post">
      <INPUT type="hidden" name="language" value="<?PHP ECHO $language?>">
      <INPUT type="hidden" name="include" value="2">
      <INPUT type="hidden" name="confirm" value="1">
      <INPUT type="hidden" name="a" value="<?PHP ECHO $a?>">
      <INPUT type="hidden" name="id" value="<?PHP ECHO $id?>">
      <INPUT type="hidden" name="type" value="<?PHP ECHO $type?>">
      <INPUT type="hidden" name="submitted" value="1">
      <TR>
        <TD class="hforeground" align="left">
          <B><?PHP ECHO $lng["newpass"]?>:</B>
        </TD>
        <TD class="hforeground" align="left">
          <INPUT type="password" class="textinputs" name="new_password_1" maxlength="<?PHP ECHO $session->config->password_length_max?>">
        </TD>
      </TR>
      <TR>
        <TD class="hforeground" align="left">
          <B><?PHP ECHO $lng["newpassagain"]?>:</B>
        </TD>
        <TD class="hforeground" align="left">
          <INPUT type="password" class="textinputs" name="new_password_2" maxlength="<?PHP ECHO $session->config->password_length_max?>">
        </TD>
      </TR>
      <TR>
        <TD class="hforeground" colspan="2" align="center">
          <INPUT type="submit" class="buttons" value="<?PHP ECHO $lng["savechanges"]?>">
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
