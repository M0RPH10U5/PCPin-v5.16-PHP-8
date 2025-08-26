<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<HTML><HEAD>
<?PHP ECHO $css?>
</HEAD><BODY>
<DIV align="center">
  <TABLE class="dforeground" border="0" width="90%" cellspacing="1" cellpadding="6">
    <FORM name="banform" action="main.php" method="post">
      <INPUT type="hidden" name="session_id" value="<?PHP ECHO $session_id?>">
      <INPUT type="hidden" name="include" value="<?PHP ECHO $include?>">
      <INPUT type="hidden" name="profile_user_id" value="<?PHP ECHO $profile_user_id?>">
      <INPUT type="hidden" name="do_ban" value="1">
      <TR>
        <TD class="hforeground">
          <B><?PHP ECHO $lng[ban]?></B>
        </TD>
      </TR>
      <TR>
        <TD class="hforeground">
          &nbsp;
        </TD>
      </TR>
      <TR>
        <TD class="hforeground">
<?PHP
IF($user->guest){
  // Guest's username cannot be banned
  $disabled="disabled";
  $checked="";
}ELSE{
  $disabled="";
  $checked="checked";
}
?>
          <INPUT type="checkbox" name="user_id" value="<?PHP ECHO $profile_user_id?>" <?PHP ECHO $checked?> <?PHP ECHO $disabled?>>
          &nbsp;
          <B><?PHP ECHO $lng["banuser"]?>: <?PHP ECHO $user->login?></B>
        </TD>
      </TR>
<?PHP
IF($user->ip){
?>
      <TR>
        <TD class="hforeground">
          <INPUT type="checkbox" name="ip" value="<?PHP ECHO $user->ip?>" checked>
          &nbsp;
          <B><?PHP ECHO $lng["banip"]?>: <?PHP ECHO $user->ip?></B>
        </TD>
      </TR>
<?PHP
}
?>
      <TR>
        <TD class="hforeground">
          &nbsp;
        </TD>
      </TR>
      <TR>
        <TD class="hforeground">
          <INPUT type="submit" class="buttons" value="<?PHP ECHO $lng["ban"]?>">
          &nbsp;
          <INPUT type="button" class="buttons" value="<?PHP ECHO $lng["cancel"]?>" onclick="window.location.href='main.php?session_id=<?PHP ECHO $session_id?>&include=11&ban=1'">
        </TD>
      </TR>
    </FORM>
  </TABLE>
</DIV>
</BODY>
</HTML>
