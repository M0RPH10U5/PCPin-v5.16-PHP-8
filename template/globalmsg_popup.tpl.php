<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<HTML><HEAD>
<?PHP ECHO $css?>
<TITLE><?PHP ECHO STR_REPLACE("{USER}",$sender->login,$lng["globalmessageby"])?></TITLE>
</HEAD>
<BODY>
<DIV align="center">
  <B><?PHP ECHO STR_REPLACE("{USER}",$sender->login,$lng["globalmessageby"])?></B>
  <BR>
</DIV>
<BR>
<?PHP ECHO NL2BR($message['body'])?>
<BR><BR>
<DIV align="center">
  <A href="" onclick="window.close(); return false;"><?PHP ECHO $lng["closewindow"]?></A>
</DIV>
</BODY>
</HTML>