<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<HTML><HEAD>
<?PHP ECHO $css?>
</HEAD>
<BODY>
<DIV align="center">
  <TABLE border="0" cellspacing="0" cellpadding="0" width="100%">
    <TR>
      <TD colspan="2">&nbsp;</TD>
    </TR>
    <TR>
      <TD width="20">&nbsp;</TD>
      <TD align="center">
        <INPUT type="button" class="buttons" value="<?PHP ECHO $lng["closewindow"]?>" onclick="parent.window.close();">
<?php
if(!empty($session->direct_login)){
?>
        <br /><br />
        <INPUT type="button" class="buttons" value="<?PHP ECHO $lng["logout"]?>" onclick="parent.window.document.location.href='main.php?include=9&session_id=<?PHP ECHO $session_id?>'">
<?php
}
?>
      </TD>
    </TR>
    <TR>
      <TD colspan="2">&nbsp;</TD>
    </TR>
    <TR>
      <TD colspan="2">&nbsp;</TD>
    </TR>
<?PHP
IF($user->level&1 || $user->level&4){
  // Chat
?>
    <TR>
      <TD colspan="2">
        <LI><B><?PHP ECHO $lng["chat"]?></B></LI>
      </TD>
    </TR>
<?PHP
  IF($user->level&1){
    // Chat statistics
?>
    <TR>
      <TD>&nbsp;</TD>
      <TD align="left">
        <A target="main" href="main.php?session_id=<?PHP ECHO $session_id?>&include=15"><?PHP ECHO $lng["statistics"]?></A>
      </TD>
    </TR>
<?PHP
  }
  IF($user->level&4){
    // Chat settings
?>
    <TR>
      <TD>&nbsp;</TD>
      <TD align="left">
        <A target="main" href="main.php?session_id=<?PHP ECHO $session_id?>&include=17"><?PHP ECHO $lng["settings"]?></A>
      </TD>
    </TR>
    <TR>
      <TD colspan="2">&nbsp;</TD>
    </TR>
<?PHP
  }
}
IF($user->level&2){
  // Chat design
?>
    <TR>
      <TD colspan="2">
        <LI><B><?PHP ECHO $lng["design"]?></B></LI>
      </TD>
    </TR>
    <TR>
      <TD>&nbsp;</TD>
      <TD align="left">
        <A target="main" href="main.php?session_id=<?PHP ECHO $session_id?>&include=16"><?PHP ECHO $lng["edit"]?></A>
      </TD>
    </TR>
<?PHP
  IF(EMPTY($cssurl->cssurl)){
?>
    <TR>
      <TD>&nbsp;</TD>
      <TD align="left">
        <A target="_blank" href="main.php?session_id=<?PHP ECHO $session_id?>&include=31">Export</A>
      </TD>
    </TR>
<?PHP
  }
?>
    <TR>
      <TD colspan="2">&nbsp;</TD>
    </TR>
<?PHP
}
IF($user->level&8 || $user->level&16 || $user->level&32){
  // Users
?>
    <TR>
      <TD colspan="2">
        <LI><B><?PHP ECHO $lng["users"]?></B></LI>
      </TD>
    </TR>
    <TR>
      <TD>&nbsp;</TD>
      <TD align="left">
        <A target="main" href="main.php?session_id=<?PHP ECHO $session_id?>&include=11&admin=1"><?PHP ECHO $lng["memberlist"]?></A>
      </TD>
    </TR>
<?PHP
  IF($user->level&8){
    // Edit users
?>
    <TR>
      <TD>&nbsp;</TD>
      <TD align="left">
        <A target="main" href="main.php?session_id=<?PHP ECHO $session_id?>&include=11&edit=1"><?PHP ECHO $lng["edit"]?></A>
      </TD>
    </TR>
<?PHP
  }
  IF($user->level&16){
    // Kick users
?>
    <TR>
      <TD>&nbsp;</TD>
      <TD align="left">
        <A target="main" href="main.php?session_id=<?PHP ECHO $session_id?>&include=11&kick=1"><?PHP ECHO $lng["kick"]?></A>
      </TD>
    </TR>
<?PHP
  }
  IF($user->level&32){
    // Ban users
?>
    <TR>
      <TD>&nbsp;</TD>
      <TD align="left">
        <A target="main" href="main.php?session_id=<?PHP ECHO $session_id?>&include=11&ban=1"><?PHP ECHO $lng["ban"]?></A>
      </TD>
    </TR>
    <TR>
      <TD>&nbsp;</TD>
      <TD align="left">
        <A target="main" href="main.php?include=20&list=1&session_id=<?PHP ECHO $session_id?>"><?PHP ECHO $lng["banlist"]?></A>
      </TD>
    </TR>
<?PHP
  }
}  
IF($user->level&64){
  // Global messages
?>
    <TR>
      <TD colspan="2">&nbsp;</TD>
    </TR>
    <TR>
      <TD colspan="2">
        <LI><B><?PHP ECHO $lng["globalmessages"]?></B></LI>
      </TD>
    </TR>
    <TR>
      <TD>&nbsp;</TD>
      <TD align="left">
        <A target="main" href="main.php?session_id=<?PHP ECHO $session_id?>&include=23"><?PHP ECHO $lng["post"]?></A>
      </TD>
  </TR>
<?PHP
}
IF($user->level&128){
  // Manage advertisement
?>
    <TR>
      <TD colspan="2">&nbsp;</TD>
    </TR>
    <TR>
      <TD colspan="2">
        <LI><B><?PHP ECHO $lng["advertisement"]?></B></LI>
      </TD>
    </TR>
    <TR>
      <TD>&nbsp;</TD>
      <TD align="left">
        <A target="main" href="main.php?session_id=<?PHP ECHO $session_id?>&include=25&add=1"><?PHP ECHO $lng["add"]?></A>
      </TD>
    </TR>
    <TR>
      <TD>&nbsp;</TD>
      <TD align="left">
        <A target="main" href="main.php?session_id=<?PHP ECHO $session_id?>&include=25&edit=1"><?PHP ECHO $lng["edit"]?></A>
      </TD>
    </TR>
<?PHP
}
IF($user->level&256){
  // Manage smilies
?>
    <TR>
      <TD colspan="2">&nbsp;</TD>
    </TR>
    <TR>
      <TD colspan="2">
        <LI><B><?PHP ECHO $lng["smilies"]?></B></LI>
      </TD>
    </TR>
    <TR>
      <TD>&nbsp;</TD>
      <TD align="left">
        <A target="main" href="main.php?session_id=<?PHP ECHO $session_id?>&include=26&add=1"><?PHP ECHO $lng["add"]?></A>
      </TD>
    </TR>
    <TR>
      <TD>&nbsp;</TD>
      <TD align="left">
        <A target="main" href="main.php?session_id=<?PHP ECHO $session_id?>&include=26&edit=1"><?PHP ECHO $lng["edit"]?></A>
      </TD>
    </TR>
<?PHP
}
IF($user->level&512){
  // Manage bad worsd
?>
    <TR>
      <TD colspan="2">&nbsp;</TD>
    </TR>
    <TR>
      <TD colspan="2">
        <LI><B><?PHP ECHO $lng["badwords"]?></B></LI>
      </TD>
    </TR>
    <TR>
      <TD>&nbsp;</TD>
      <TD align="left">
        <A target="main" href="main.php?session_id=<?PHP ECHO $session_id?>&include=28&add=1"><?PHP ECHO $lng["add"]?></A>
      </TD>
    </TR>
    <TR>
      <TD>&nbsp;</TD>
      <TD align="left">
        <A target="main" href="main.php?session_id=<?PHP ECHO $session_id?>&include=28&edit=1"><?PHP ECHO $lng["edit"]?></A>
      </TD>
    </TR>
<?PHP
}
IF($user->level&2048){
  // Manage rooms
?>
    <TR>
      <TD colspan="2">&nbsp;</TD>
    </TR>
    <TR>
      <TD colspan="2">
        <LI><B><?PHP ECHO $lng["rooms"]?></B></LI>
      </TD>
    </TR>
    <TR>
      <TD>&nbsp;</TD>
      <TD align="left">
        <A target="main" href="main.php?session_id=<?PHP ECHO $session_id?>&include=29&frame=main"><?PHP ECHO $lng["manage"]?></A>
      </TD>
    </TR>
<?PHP
}
?>
  </TABLE>
</DIV>
</BODY></HTML>