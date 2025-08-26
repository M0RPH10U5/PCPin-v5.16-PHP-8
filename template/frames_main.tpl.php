<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<HTML><HEAD>
<TITLE><?PHP ECHO $session->config->title?></TITLE>
<?PHP
/* Load JavaScript */
REQUIRE(SCRIPTPATH."/frames_main.js.php");
?>
</HEAD>
<FRAMESET rows="<?PHP ECHO $top_banner_height?>*<?PHP ECHO $bottom_banner_height?>" framespacing="0" frameborder="0" marginwidth="0" marginheight="0" onload="firstRun();">
  <?PHP ECHO $top_banner_code?>
  <FRAMESET cols="<?PHP ECHO $cols?>" framespacing="0" frameborder="0" marginwidth="0" marginheight="0">
<?PHP
IF(!$session->config->userlist_position){
?>
    <FRAME name="userlist" src="about:blank" scrolling="auto" noresize marginwidth="0" marginheight="0">
<?PHP
}
?>
    <FRAMESET rows="*,1,30,1,1,30" framespacing="0" frameborder="0" marginwidth="0" marginheight="0">
      <FRAME name="main" src="main.php?include=33&session_id=<?PHP ECHO $session_id?>" scrolling="auto" noresize marginwidth="0" marginheight="0">
      <FRAME name="sounds_frame" src="main.php?include=30&session_id=<?PHP ECHO $session_id?>" scrolling="no" noresize marginwidth="0" marginheight="0">
      <FRAME name="input" src="main.php?include=4&session_id=<?PHP ECHO $session_id?>&frame=i&t=1" scrolling="no" noresize marginwidth="0" marginheight="0">
      <FRAME name="dummyform" src="main.php?include=30&session_id=<?PHP ECHO $session_id?>" scrolling="no" noresize marginwidth="0" marginheight="0">
      <FRAME name="control" src="main.php?include=30&session_id=<?PHP ECHO $session_id?>" scrolling="no" noresize marginwidth="0" marginheight="0">
      <FRAME name="roomlist" src="main.php?include=30&session_id=<?PHP ECHO $session_id?>" scrolling="no" noresize marginwidth="0" marginheight="0">
    </FRAMESET>
<?PHP
IF($session->config->userlist_position){
?>
    <FRAME name="userlist" src="about:blank" scrolling="auto" noresize marginwidth="0" marginheight="0">
<?PHP
}
?>
  </FRAMESET>
  <?PHP ECHO $bottom_banner_code?>
</FRAMESET>
<NOFRAMES>
  Sorry, this chat needs a browser that understands framesets.
</NOFRAMES>
</HTML>