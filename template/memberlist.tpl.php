<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<HTML><HEAD>
<TITLE><?PHP ECHO $lng['memberlist']?></TITLE>
<?PHP ECHO $css?>
</HEAD><BODY onload="window.focus();">
<?PHP
IF($total_pages>1){
  FOR($i=1; $i<=$total_pages; $i++){
    IF($i==$page){
      ECHO "&nbsp;&nbsp;<b>$i</b>";
    }ELSE{
?>
&nbsp;&nbsp;<a href="main.php?include=11&session_id=<?PHP ECHO $session_id?>&amp;page=<?PHP ECHO $i?>&amp;orderby=<?PHP ECHO $orderby?>&amp;edit=<?PHP ECHO $edit?>&amp;kick=<?PHP ECHO $kick?>&amp;ban=<?PHP ECHO $ban?>"><b><?PHP ECHO $i?></b></a>
<?PHP
    }
  }
?>
<?PHP
}
?>
<DIV align="center">
  <TABLE class="dforeground" border="0" cellspacing="1" cellpadding="6" width="100%">
    <TR valign="center">
      <TD class="hforeground" align="left">
        <A href="main.php?session_id=<?PHP ECHO $session_id?>&orderby=us.login ASC&include=<?PHP ECHO $include?>&edit=<?PHP ECHO $edit?>&kick=<?PHP ECHO $kick?>&ban=<?PHP ECHO $ban?>&admin=<?PHP ECHO $admin?>"><?PHP ECHO $lng["username"]?></A>
      </TD>
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["status"]?></B>
      </TD>
      <TD class="hforeground">&nbsp;</TD>
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["realname"]?></B>
      </TD>
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["email"]?></B>
      </TD>
      <TD class="hforeground" align="left">
        <A href="main.php?session_id=<?PHP ECHO $session_id?>&orderby=us.joined ASC,us.login ASC&include=<?PHP ECHO $include?>&edit=<?PHP ECHO $edit?>&kick=<?PHP ECHO $kick?>&ban=<?PHP ECHO $ban?>&admin=<?PHP ECHO $admin?>"><?PHP ECHO $lng["joined"]?></A>
      </TD>
      <TD class="hforeground" align="left">
        <A href="main.php?session_id=<?PHP ECHO $session_id?>&orderby=us.last_login ASC,us.login ASC&include=<?PHP ECHO $include?>&edit=<?PHP ECHO $edit?>&kick=<?PHP ECHO $kick?>&ban=<?PHP ECHO $ban?>&admin=<?PHP ECHO $admin?>"><B>Last login</B></A>
      </TD>
    </TR>
<?PHP
FOR($i=0;$i<$userlist_count;$i++){
  // Get user's session ID
  $session2=NEW session($session->getUsersSession($userlist[$i][id]));
  // IP address
  IF($show_ip){
    IF($session2->ip){
      $ip=" [<A href=\"\" class=\"links\" onClick=\"window.open('http://network-tools.com/default.asp?prog=trace&Netnic=whois.arin.net&host=".$session2->ip."', 'whois', 'width=800, height=600, resizable=yes, scrollbars=yes'); return false;\">".$session2->ip."</A>]";
    }ELSE{
      $ip="[?]";
    }
  }ELSE{
    $ip="";
  }
?>
    <TR>
      <TD class="hforeground" align="left">
        <FONT color="#<?PHP ECHO $userlist[$i][color]?>"><?PHP ECHO $userlist[$i][login]?></FONT>
      </TD>
<?PHP
  IF($userlist[$i]['online']&&!$session2->kicked){
?>
      <TD class="hforeground" align="left">
        <B><?PHP ECHO $lng["online"]?></B> <?PHP ECHO $ip?>
      </TD>
<?PHP
  }ELSE{
?>
      <TD class="hforeground">
        &nbsp;
      </TD>
<?PHP
  }
  IF($edit){
?>
      <TD class="hforeground" align="center">
<?PHP
    IF($session->user_id<>$userlist[$i]['id'] && $userlist[$i]['level']<131071){
?>
        <INPUT type="button" class="buttons" value="<?PHP ECHO $lng["edit"]?>" onclick="window.location.href='main.php?session_id=<?PHP ECHO $session_id?>&include=18&profile_user_id=<?PHP ECHO $userlist[$i][id]?>';">
        <INPUT type="button" class="buttons" value="<?PHP ECHO $lng["delete"]?>" onclick="if(confirm('<?PHP ECHO STR_REPLACE("'","\\'",STR_REPLACE("{USER}",$userlist[$i][login],$lng["confirmdeleteuser"]))?>')){window.location.href='main.php?session_id=<?PHP ECHO $session_id?>&include=18&profile_user_id=<?PHP ECHO $userlist[$i][id]?>&delete=1';}">
<?PHP
    }ELSE{
?>
        &nbsp;
<?PHP
    }
?>
      </TD>
<?PHP
  }ELSEIF($kick&&$userlist[$i]['online'] && $userlist[$i]['id']<>$session->user_id && $userlist[$i]['level']<131071){
    IF(!$session2->kicked){
?>
      <TD class="hforeground" align="center">
        <INPUT type="button" class="buttons" value="<?PHP ECHO $lng["kick"]?>" onclick="if(confirm('<?PHP ECHO STR_REPLACE("'","\\'",STR_REPLACE("{USER}",$userlist[$i][login],$lng["confirmkickuser"]))?>')){window.location.href='main.php?session_id=<?PHP ECHO $session_id?>&include=19&profile_user_id=<?PHP ECHO $userlist[$i][id]?>';}">
        <BR>
        <INPUT type="button" class="buttons" value="<?PHP ECHO $lng["ban"]?>" onclick="window.location.href='main.php?session_id=<?PHP ECHO $session_id?>&include=20&profile_user_id=<?PHP ECHO $userlist[$i][id]?>';">
      </TD>
<?PHP
    }ELSE{
?>
      <TD class="hforeground">&nbsp;</TD>
<?PHP
    }
  }ELSEIF($ban && $userlist[$i]['id']<>$session->user_id && $userlist[$i]['level']<131071){
?>
      <TD class="hforeground" align="center">
        <INPUT type="button" class="buttons" value="<?PHP ECHO $lng["ban"]?>" onclick="window.location.href='main.php?session_id=<?PHP ECHO $session_id?>&include=20&profile_user_id=<?PHP ECHO $userlist[$i][id]?>';">
      </TD>
<?PHP
  }ELSEIF(!$admin&&$userlist[$i][online]&&$session->getUsersRoom($userlist[$i][id])>0&&$session->room_id>0&&$session->room_id<>$session->getUsersRoom($userlist[$i][id])){
?>
      <TD class="hforeground" align="center">
        <A href="" onClick="window.open('main.php?session_id=<?PHP ECHO $session_id?>&include=12&user_id=<?PHP ECHO $userlist[$i][id]?>','invitation_<?PHP ECHO $userlist[$i][id]?>','width=300,height=200'); return false;"><?PHP ECHO $lng["invite"]?></A>
        <BR>
        <A href="" onClick="window.open('main.php?session_id=<?PHP ECHO $session_id?>&include=5&profile_user_id=<?PHP ECHO $userlist[$i][id]?>','pr<?PHP ECHO $userlist[$i][id]?>','width=500,height=500,top=1,resizable=yes,scrollbars=yes'); return false;"><?PHP ECHO $lng["profile"]?></A>
      </TD>
<?PHP
  }ELSE{
?>
      <TD class="hforeground" align="center">
        <A href="" onClick="window.open('main.php?session_id=<?PHP ECHO $session_id?>&include=5&profile_user_id=<?PHP ECHO $userlist[$i][id]?>','pr<?PHP ECHO $userlist[$i][id]?>','width=500,height=500,top=1,resizable=yes,scrollbars=yes'); return false;"><?PHP ECHO $lng["profile"]?></A>
      </TD>
<?PHP
  }
?>
      <TD class="hforeground" align="left">
        <?PHP ECHO $userlist[$i][name]?>
      </TD>
<?PHP
  IF(!$userlist[$i][hide_email]||$edit&&$current_user->level&8){
?>
      <TD class="hforeground" align="left">
        <?PHP ECHO $userlist[$i][email]?>
      </TD>
<?PHP
  }ELSE{
?>
      <TD class="hforeground">&nbsp;</TD>
<?PHP
  }
?>
      <TD class="hforeground" align="left">
        <?PHP ECHO common::convertDateFromTimestamp($session,$userlist[$i][joined])?>
      </TD>
      <TD class="hforeground" align="left">
<?PHP
  IF($userlist[$i][last_login]>'0000-00-00 00:00:00'){
    ECHO common::convertDateFromTimestamp($session,$userlist[$i][last_login]);
  }ELSE{
    ECHO '--';
  }
?>
      </TD>
    </TR>
<?PHP
}
?>
  </TABLE>
</DIV>
<?PHP
IF($total_pages>1){
  FOR($i=1; $i<=$total_pages; $i++){
    IF($i==$page){
      ECHO "&nbsp;&nbsp;<b>$i</b>";
    }ELSE{
?>
&nbsp;&nbsp;<a href="main.php?include=11&session_id=<?PHP ECHO $session_id?>&amp;page=<?PHP ECHO $i?>&amp;orderby=<?PHP ECHO $orderby?>&amp;edit=<?PHP ECHO $edit?>&amp;kick=<?PHP ECHO $kick?>&amp;ban=<?PHP ECHO $ban?>"><b><?PHP ECHO $i?></b></a>
<?PHP
    }
  }
?>
<?PHP
}
?>
</BODY></HTML>