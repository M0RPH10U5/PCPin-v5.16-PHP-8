<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<HTML><HEAD>
<?PHP ECHO $css?>
</HEAD><BODY>
<DIV align="center">
  <TABLE class="dforeground" border="0" cellspacing="1" cellpadding="6">
    <FORM name="smilieform" action="main.php" method="post" enctype="multipart/form-data">
      <INPUT type="hidden" name="session_id" value="<?PHP ECHO $session_id?>">
      <INPUT type="hidden" name="include" value="<?PHP ECHO $include?>">
      <INPUT type="hidden" name="smilie_id" value="<?PHP ECHO $smilie_id?>">
      <INPUT type="hidden" name="add" value="<?PHP ECHO $add?>">
      <INPUT type="hidden" name="edit" value="<?PHP ECHO $edit?>">
      <INPUT type="hidden" name="submitted" value="1">
      <TR>
        <TD class="hforeground" colspan="2" align="center">
          <B><?PHP ECHO $lng["addsmilie"]?></B>
        </TD>
      </TR>
<?PHP
IF(IS_ARRAY($error)){
  FOR($i=0;$i<COUNT($error);$i++){
?>
      <TR>
        <TD class="error" colspan="2" align="left">
          <B><I><?PHP ECHO $error[$i]?></I></B>
        </TD>
      </TR>
<?PHP
  }
}
?>
      <TR>
        <TD class="hforeground" align="left">
          <B><?PHP ECHO $lng["textequivalent"]?>:</B>
        </TD>
        <TD class="hforeground" align="left">
          <INPUT type="text" class="textinputs" name="text" value="<?PHP ECHO $text?>" size="5" maxlength="64">
        </TD>
      </TR>
<?PHP
IF(!$edit){
?>
      <TR>
        <TD class="hforeground" align="left">
          <B><?PHP ECHO $lng["smilieimage"]?>:</B>
        </TD>
        <TD class="hforeground" align="left">
          <INPUT type="file" name="smiliefile">
        </TD>
      </TR>
<?PHP
}
?>
      <TR>
        <TD class="hforeground" colspan="2" align="center">
          <INPUT type="submit" class="buttons" value="<?PHP ECHO $lng["save"]?>">
        </TD>
      </TR>
    </FORM>
  </TABLE>
</DIV>
</BODY>
</HTML>
