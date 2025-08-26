<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML><HEAD>
<TITLE><?PHP ECHO $session->config->title?></TITLE>
<?PHP ECHO $css?>
</HEAD>
<BODY onload="document.loginform.submit_button.focus();">
<DIV align="center">
  <IMG src="<?PHP ECHO IMAGEPATH?>/clearpixel.gif" width="1" height="150" border="0" alt="">
  <TABLE class="dforeground" border="0" cellspacing="1" cellpadding="6">
    <FORM name="loginform" action="main.php" method="post">
      <INPUT type="hidden" name="admin" value="<?PHP ECHO $admin?>">
      <TR>
        <TD class="hforeground">
          Choose your language:
          <SELECT name="language" class="selects">
<?PHP
FOREACH($lng_array AS $lng_filename){
  $selected=($lng_filename==$language)? 'selected' : '';
?>
            <OPTION value="<?PHP ECHO SUBSTR($lng_filename, 0, -8)?>" <?PHP ECHO $selected?>><?PHP ECHO UCFIRST(SUBSTR($lng_filename, 0, -8))?></OPTION>
<?PHP
}
?>
          </SELECT>
        </TD>
      </TR>
      <TR>
        <TD class="hforeground" align="center">
          <INPUT type="submit" name="submit_button" class="buttons" style="width:50px" value="GO">
        </TD>
      </TR>
    </FORM>
  </TABLE>
</DIV>
</BODY>
</HTML>
