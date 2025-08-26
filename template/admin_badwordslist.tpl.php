<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<HTML><HEAD>
<?PHP ECHO $css?>
</HEAD>
<DIV align="center">
<TABLE class="dforeground" border="0" cellspacing="1" cellpadding="6">
  <TR valign="center">
    <TD class="hforeground" align="center" colspan="3">
      <B><?PHP ECHO $lng["badwords"]?></B>
    </TD>
  </TR>
<?PHP
IF($badwords_count){
?>
    <TR valign="center">
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["badword"]?></B>
      </TD>
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["replacement"]?></B>
      </TD>
      <TD class="hforeground">
        &nbsp;
      </TD>
    </TR>
<?PHP
  FOR($i=0;$i<$badwords_count;$i++){
?>
    <TR valign="center">
      <TD class="hforeground" align="left">
        <?PHP ECHO $badwords[$i][word]?>
      </TD>
      <TD class="hforeground" align="left">
        <?PHP ECHO $badwords[$i][replacement]?>
      </TD>
      <TD class="hforeground" align="center">
        <A href="main.php?session_id=<?PHP ECHO $session_id?>&include=<?PHP ECHO $include?>&edit=1&badword_id=<?PHP ECHO $badwords[$i][id]?>"><?PHP ECHO $lng["edit"]?></A>
        &nbsp;
        <A href="main.php?session_id=<?PHP ECHO $session_id?>&include=<?PHP ECHO $include?>&edit=1&delete=1&badword_id=<?PHP ECHO $badwords[$i][id]?>"><?PHP ECHO $lng["delete"]?></A>
      </TD>
    </TR>
<?PHP
  }
?>
  </TABLE>
  <BR><BR>
<?PHP
}ELSE{
?>
  <TABLE class="dforeground" width="90%" border="0" cellspacing="1" cellpadding="6">
    <TR>
      <TD class="error" align="left">
        <B><I><?PHP ECHO $lng["nobadwordsfound"]?></I></B>
      </TD>
    </TR>
  </TABLE>
<?PHP
}
?>
</DIV>
</BODY>
</HTML>
