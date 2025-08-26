<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<HTML><HEAD>
<SCRIPT>
  var allowed=true;
  function autoComplete(){
    if(allowed){
      var charsCount=document.badwordform.word.value.length;
      if(charsCount){
        document.badwordform.replacement.value=document.badwordform.word.value.substr(0,1);
      }
      for(var i=1;i<charsCount;i++){
        document.badwordform.replacement.value+="*";
      }
      document.badwordform.replacement.select();
    }
    return true;
  }
</SCRIPT>
<?PHP ECHO $css?>
</HEAD><BODY>
<DIV align="center">
  <TABLE class="dforeground" border="0" cellspacing="1" cellpadding="6">
    <FORM name="badwordform" action="main.php" method="post">
      <INPUT type="hidden" name="session_id" value="<?PHP ECHO $session_id?>">
      <INPUT type="hidden" name="include" value="<?PHP ECHO $include?>">
      <INPUT type="hidden" name="badword_id" value="<?PHP ECHO $badword_id?>">
      <INPUT type="hidden" name="add" value="<?PHP ECHO $add?>">
      <INPUT type="hidden" name="edit" value="<?PHP ECHO $edit?>">
      <INPUT type="hidden" name="submitted" value="1">
      <TR>
        <TD class="hforeground" colspan="2" align="center">
          <B><?PHP ECHO $lng["addbadword"]?></B>
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
          <B><?PHP ECHO $lng["badword"]?>:</B>
        </TD>
        <TD class="hforeground" align="left">
          <INPUT type="text" class="textinputs" name="word" value="<?PHP ECHO $word?>" size="10" maxlength="255" onChange="autoComplete();">
        </TD>
      </TR>
      <TR>
        <TD class="hforeground" align="left">
          <B><?PHP ECHO $lng["replacement"]?>:</B>
        </TD>
        <TD class="hforeground" align="left">
          <INPUT type="text" class="textinputs" name="replacement" value="<?PHP ECHO $replacement?>" size="10" maxlength="255" onKeyDown="allowed=false; return true;">
        </TD>
      </TR>
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
