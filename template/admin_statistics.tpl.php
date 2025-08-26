<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<HTML><BODY>
<HEAD>
<?PHP ECHO $css?>
</HEAD>
<DIV align="center">
  <B><?PHP ECHO $lng["chatstatistics"]?></B>
  <BR><BR>
  <TABLE class="dforeground" border="0" cellspacing="1" cellpadding="6" width="90%">
    <TR valign="center">
      <TD class="hforeground" colspan="2" align="center">
        <B><?PHP ECHO $lng["users"]?></B>
      </TD>
    </TR>
    <TR valign="center">
      <TD class="hforeground" align="left">
        <?PHP ECHO $lng["registeredusers"]?>:
      </TD>
      <TD class="hforeground" width="40" align="right">
        <?PHP ECHO $registered_users_count?>
      </TD>
    </TR>
    <TR valign="center">
      <TD class="hforeground" align="left">
        <?PHP ECHO $lng["registeredusersonline"]?>:
      </TD>
      <TD class="hforeground" align="right">
        <?PHP ECHO $registered_users_online_count?>
      </TD>
    </TR>
    <TR valign="center">
      <TD class="hforeground" align="left">
        <?PHP ECHO $lng["guestsonline"]?>:
      </TD>
      <TD class="hforeground" align="right">
        <?PHP ECHO $guests_count?>
      </TD>
    </TR>
    <TR valign="center">
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["totalusersonline"]?>:</B>
      </TD>
      <TD class="hforeground" align="right">
        <B><?PHP ECHO $total_users_online_count?></B>
      </TD>
    </TR>
  </TABLE>
  <BR><BR>
  <TABLE class="dforegroud" border="0" cellspacing="1" cellpadding="6" width="90%">
    <TR valign="center">
      <TD class="hforeground" colspan="2" align="center">
        <B><?PHP ECHO $lng["rooms"]?></B>
      </TD>
    </TR>
    <TR valign="center">
      <TD class="hforeground" align="left">
        <?PHP ECHO $lng["mainroomsnopass"]?>:
      </TD>
      <TD class="hforeground" width="40" align="right">
        <?PHP ECHO $main_rooms_no_pass_count?>
      </TD>
    </TR>
    <TR valign="center">
      <TD class="hforeground" align="left">
        <?PHP ECHO $lng["mainroomspass"]?>:
      </TD>
      <TD class="hforeground" align="right">
        <?PHP ECHO $main_rooms_pass_count?>
      </TD>
    </TR>
    <TR valign="center">
      <TD class="hforeground" align="left">
        <?PHP ECHO $lng["userroomsnopass"]?>:
      </TD>
      <TD class="hforeground" align="right">
        <?PHP ECHO $user_rooms_no_pass_count?>
      </TD>
    </TR>
    <TR valign="center">
      <TD class="hforeground" align="left">
        <?PHP ECHO $lng["userroomspass"]?>:
      </TD>
      <TD class="hforeground" align="right">
        <?PHP ECHO $user_rooms_pass_count?>
      </TD>
    </TR>
    <TR valign="center">
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["totalrooms"]?>:</B>
      </TD>
      <TD class="hforeground" align="right">
        <B><?PHP ECHO $total_rooms_count?></B>
      </TD>
    </TR>
  </TABLE>
<?PHP
IF($need_optimization){
?>
  <BR><BR>
  <TABLE class="dforeground" border="0" cellspacing="1" cellpadding="6" width="90%">
    <FORM action="main.php" method="post">
      <INPUT type="hidden" name="session_id" value="<?PHP ECHO $session_id?>">
      <INPUT type="hidden" name="include" value="<?PHP ECHO $include?>">
      <INPUT type="hidden" name="optimize_db" value="1">
      <TR>
        <TD class="hforeground" align="center">
          <INPUT type="submit" class="buttons" value="<?PHP ECHO $lng["optimizedatabase"]?>">
        </TD>
      </TR>
    </FORM>
  </TABLE>
<?PHP
}
?>
</DIV>
</BODY>
</HTML>
