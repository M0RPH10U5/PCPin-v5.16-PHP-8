<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<HTML><HEAD>
<title><?PHP ECHO htmlspecialchars(STR_REPLACE('{USER}',$user->login,$lng["viewuserprofile"]))?></title>
<?PHP ECHO $css?>
</HEAD>
<BODY onload="focus()">
<DIV align="center">
  <TABLE class="dforeground" border="0" width="100%" cellspacing="1" cellpadding="6">
    <TR>
      <TD class="hforeground" align="center" colspan="2">
        <B><?PHP ECHO STR_REPLACE("{USER}","<FONT color=\"#".htmlspecialchars($user->color)."\">".$user->login."</FONT>",$lng["viewuserprofile"])?></B>
      </TD>
    </TR>
<?PHP
IF($session->config->enable_userphotos){
?>
    <TR valign="center">
      <TD class="hforeground" align="center" colspan="2">
        <A href="<?PHP ECHO IMAGEPATH."/userphotos/{$user->photo}"?>" target="<?PHP ECHO $user->login?>_photo"><IMG src="<?PHP ECHO IMAGEPATH."/userphotos/{$user->photo}"?>" title="<?PHP ECHO htmlspecialchars($user->login)?>" height="160" border="0"></A>
      </TD>
    </TR>
<?PHP
}
?>
    <TR>
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["realname"]?>:</B>
      </TD>
      <TD class="hforeground" align="left">
        <?PHP ECHO htmlspecialchars($user->name)?>
      </TD>
    </TR>
    <TR>
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["sex"]?>:</B>
      </TD>
      <TD class="hforeground" align="left">
<?PHP
IF($user->sex){
?>
        <IMG src="<?PHP ECHO IMAGEPATH?>/sex_<?PHP ECHO htmlspecialchars($user->sex)?>.gif" border="0" alt="">
<?PHP
}ELSE{
?>
        <IMG src="<?PHP ECHO IMAGEPATH?>/clearpixel.gif" width="0" height="0" border="0" alt="">
<?PHP
}
?>
      </TD>
    </TR>
    <TR>
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["email"]?>:</B>
      </TD>
      <TD class="hforeground" align="left">
<?PHP
IF($user->hide_email){
?>
        &nbsp;
<?PHP
}ELSE{
?>
        <?PHP ECHO htmlspecialchars($user->email)?>
<?PHP
}
?>
      </TD>
    </TR>
    <TR>
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["age"]?>:</B>
      </TD>
      <TD class="hforeground" align="left">
        <?PHP ECHO htmlspecialchars($user->age)?>
      </TD>
    </TR>
    <TR>
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["location"]?>:</B>
      </TD>
      <TD class="hforeground" align="left">
        <?PHP ECHO htmlspecialchars($user->location)?>
      </TD>
    </TR>
    <TR>
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["about"]?>:</B>
      </TD>
      <TD class="hforeground" align="left">
        <?PHP ECHO NL2BR(htmlspecialchars($user->about))?>
      </TD>
    </TR>
    <TR>
      <TD class="hforeground" colspan="2">&nbsp;</TD>
    </TR>
    <TR>
      <TD class="hforeground" colspan="2" align="center">
        <INPUT type="button" class="buttons" value="<?PHP ECHO $lng["closewindow"]?>" onclick="window.close();">
      </TD>
    </TR>
  </TABLE>
</DIV>
</BODY>
</HTML>