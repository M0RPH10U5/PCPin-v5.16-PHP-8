<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<HTML><HEAD>
<?PHP ECHO $css?>

<SCRIPT>
  function checkAdvertisement(advertisementHTML){
    advertisementHTML=advertisementHTML.split("|_/CR_|").join("\r");
    advertisementHTML=advertisementHTML.split("|_/LF_|").join("\n");
    advertisementWindow=window.open("about:blank", "advertisement_test", "fullscreen=no, toolbar=no, status=no, menubar=no, scrollbars=auto, resizable=yes, directories=no, width=600, height=400");
    advertisementWindow.window.document.open();
    advertisementWindow.window.document.write(advertisementHTML);
    advertisementWindow.window.document.close();
    advertisementWindow.window.focus();
  }
</SCRIPT>
</HEAD>
<BODY>
<DIV align="center">
  <TABLE class="dforeground" width="90%" border="0" cellspacing="1" cellpadding="6">
    <TR>
      <TD class="hforeground" align="center" colspan="2">
        <B><?PHP ECHO $lng["advertisements"]?></B>
      </TD>
    </TR>
  </TABLE>
  <BR><BR>
<?PHP
IF($advertisements_count){
  FOR($i=0;$i<$advertisements_count;$i++){
?>
  <TABLE class="dforeground" width="90%" border="0" cellspacing="1" cellpadding="6">
    <TR>
      <TD class="hforeground" align="left" colspan="2">
        <?PHP ECHO HTMLENTITIES($advertisements[$i][text])?>
      </TD>
    </TR>
    <TR>
      <TD class="hforeground" align="left" width="50%">
        <B><?PHP ECHO $lng["start"]?>:</B>
      </TD>
      <TD class="hforeground" align="left" width="50%">
        <?PHP ECHO common::convertDateFromTimestamp(&$session,$advertisements[$i][start])?>
      </TD>
    </TR>
    <TR>
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["stop"]?>:</B>
      </TD>
      <TD class="hforeground" align="left">
        <?PHP ECHO common::convertDateFromTimestamp(&$session,$advertisements[$i][stop])?>
      </TD>
    </TR>
    <TR>
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["period"]?>:</B>
      </TD>
      <TD class="hforeground" align="left">
        <?PHP ECHO $advertisements[$i][period]?>&nbsp;<?PHP ECHO $lng["minutes"]?>
      </TD>
    </TR>
    <TR>
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["minimumusersinroom"]?>:</B>
      </TD>
      <TD class="hforeground" align="left">
        <?PHP ECHO $advertisements[$i][min_roomusers]?>&nbsp;<?PHP ECHO $lng["userssmall"]?>
      </TD>
    </TR>
    <TR>
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["alsoshowinprivaterooms"]?>:</B>
      </TD>
      <TD class="hforeground" align="left">
        <?PHP ECHO STR_REPLACE("0",$lng["no"],STR_REPLACE("1",$lng["yes"],$advertisements[$i][show_private]))?>
      </TD>
    </TR>
    <TR>
      <TD class="hforeground" align="center" colspan="2">
        <A href="#" onclick="checkAdvertisement('<?PHP ECHO STR_REPLACE("\n","|_/LF_|",STR_REPLACE("\r","|_/CR_|",HTMLENTITIES($advertisements[$i][text])))?>');"><?PHP ECHO $lng["check"]?></A>
        &nbsp;
        <A href="main.php?session_id=<?PHP ECHO $session_id?>&include=<?PHP ECHO $include?>&edit=1&advertisement_id=<?PHP ECHO $advertisements[$i][id]?>"><?PHP ECHO $lng["edit"]?></A>
        &nbsp;
        <A href="main.php?session_id=<?PHP ECHO $session_id?>&include=<?PHP ECHO $include?>&edit=1&delete=1&advertisement_id=<?PHP ECHO $advertisements[$i][id]?>"><?PHP ECHO $lng["delete"]?></A>
      </TD>
    </TR>
  </TABLE>
  <BR><BR>
<?PHP
  }
}ELSE{
?>
  <TABLE class="dforeground" width="90%" border="0" cellspacing="0" cellpadding="6">
    <TR>
      <TD class="error">
        <B><I><?PHP ECHO $lng["noadvertisementsfound"]?></I></B>
      </TD>
    </TR>
  </TABLE>
<?PHP
}
?>
</DIV>
</BODY>
</HTML>
