<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<HTML>
<HEAD>
<SCRIPT type="text/javascript">
<!--
  /**************************************************************************
  FUNCTION popColor
  ---------------------------------------------------------------------------
  Task:
    Open color selection window
  ---------------------------------------------------------------------------
  Parameters:
    name                  string            Name for the new window.
    width                 int               Window width in pixels.
    height                int               Window height in pixels.
  ---------------------------------------------------------------------------
  Return: --
  **************************************************************************/
  function popColor(fieldName){
    var width=307;
    var height=250;
    /* Vertical position of the new window */
    var top_pos=Math.round((screen.height-height)/2);
    /* Horizontal position of the new window */
    var left_pos=Math.round((screen.width-width)/2);
    /* Get element name */
    var elements_count=document.profileform.elements.length;
    var found=false;
    for(var i=0;!found&&i<elements_count;i++){
      if(document.profileform.elements[i].name==fieldName){
        found=true;
        /* Opening a new window */
        window.open("main.php?include=6&session_id=<?PHP ECHO $session_id?>&formname=profileform&element="+i, "colorbox", "fullscreen=no,toolbar=no,status=no,menubar=no,scrollbars=no,resizable=yes,directories=no,location=no,width="+width+",height="+height+",left="+left_pos+",top="+top_pos);
      }
    }
  }
-->
</SCRIPT>
<?PHP ECHO $css?>
</HEAD>
<BODY onload="window.focus();">
<DIV align="center">
  <TABLE class="dforeground" border="0" width="90%" cellspacing="1" cellpadding="6">
    <FORM name="profileform" action="main.php" method="post">
      <INPUT type="hidden" name="session_id" value="<?PHP ECHO $session_id?>">
      <INPUT type="hidden" name="include" value="<?PHP ECHO $include?>">
      <INPUT type="hidden" name="profile_user_id" value="<?PHP ECHO $profile_user_id?>">
      <INPUT type="hidden" name="update_profile" value="1">
      <TR>
        <TD class="hforeground" colspan="2" align="center">
          <B><?PHP ECHO STR_REPLACE("{USER}","<FONT color=\"#".$user->color."\">".$user->login."</FONT>",$lng["edituserprofile"])?></B>
        </TD>
      </TR>
<?PHP
IF($errortext){
?>
      <TR>
        <TD class="error" colspan="2" align="center">
          <B><?PHP ECHO $errortext?></B>
        </TD>
      </TR>
<?PHP
}
IF($session->config->enable_userphotos){
?>
      <TR valign="center">
        <TD class="hforeground" align="center">
          <A href="#" onclick="window.open('<?PHP ECHO IMAGEPATH?>/userphotos/<?PHP ECHO $user->photo?>','<?PHP ECHO $user->login?>');"><IMG src="<?PHP ECHO IMAGEPATH?>/userphotos/<?PHP ECHO $user->photo?>" title="<?PHP ECHO $user->login?>" height="160" border="0"></A>
        </TD>
        <TD class="hforeground" align="left">
          <INPUT type="button" class="buttons" onclick="window.location.href='main.php?session_id=<?PHP ECHO $session_id?>&include=22&back=<?PHP ECHO $include?>&profile_user_id=<?PHP ECHO $profile_user_id?>';" value="<?PHP ECHO $lng["change"]?>">
<?PHP
  IF($user->photo<>"nophoto.jpg"){
?>
          &nbsp;
          <INPUT type="button" class="buttons" onclick="window.location.href='main.php?session_id=<?PHP ECHO $session_id?>&include=<?PHP ECHO $include?>&delete_photo=1&profile_user_id=<?PHP ECHO $profile_user_id?>';" value="<?PHP ECHO $lng["delete"]?>">
<?PHP
  }
?>
        </TD>
      </TR>
<?PHP
}
?>
      <TR>
        <TD class="hforeground" align="left">
          <B><?PHP ECHO $lng["nicknamecolor"]?>:</B>
        </TD>
        <TD class="hforeground" align="left">
          <INPUT type="text" class="textinputs" name="color" value="#<?PHP ECHO $user->color?>" maxlength="7">
          <INPUT type="button" class="buttons" value="<?PHP ECHO $lng["color"]?>" onClick="popColor('color');">
        </TD>
      </TR>
      <TR>
        <TD class="hforeground" align="left">
          <B><?PHP ECHO $lng["realname"]?>:</B>
        </TD>
        <TD class="hforeground" align="left">
          <INPUT type="text" class="textinputs" name="name" value="<?PHP ECHO $user->name?>" size="20" maxlength="64">
        </TD>
      </TR>
      <TR>
        <TD class="hforeground" align="left">
          <B><?PHP ECHO $lng["sex"]?>:</B>
        </TD>
        <TD class="hforeground" align="left">
          <SELECT name="sex" class="selects">
            <OPTION value="m" <?PHP ECHO $selected_sex_m?>><?PHP ECHO $lng["male"]?>
            <OPTION value="f" <?PHP ECHO $selected_sex_f?>><?PHP ECHO $lng["female"]?>
          </SELECT>
        </TD>
      </TR>
      <TR>
        <TD class="hforeground" align="left">
          <B><?PHP ECHO $lng["email"]?>:</B>
        </TD>
        <TD class="hforeground" align="left">
          <INPUT type="text" class="textinputs" name="email" value="<?PHP ECHO $user->email?>" size="20" maxlength="64">
        </TD>
      </TR>
      <TR>
        <TD class="hforeground" align="left">
          <B><?PHP ECHO $lng["hideemail"]?>:</B>
        </TD>
        <TD class="hforeground" align="left">
          <SELECT name="hide_email" class="selects">
            <OPTION value="0" <?PHP ECHO $selected_hide_email_0?>><?PHP ECHO $lng["no"]?>
            <OPTION value="1" <?PHP ECHO $selected_hide_email_1?>><?PHP ECHO $lng["yes"]?>
          </SELECT>
        </TD>
      </TR>
      <TR>
        <TD class="hforeground" align="left">
          <B><?PHP ECHO $lng["age"]?>:</B>
        </TD>
        <TD class="hforeground" align="left">
          <INPUT type="text" class="textinputs" name="age" value="<?PHP ECHO $user->age?>" size="20" maxlength="3">
        </TD>
      </TR>
        <TR>
        <TD class="hforeground" align="left">
          <B><?PHP ECHO $lng["location"]?>:</B>
        </TD>
        <TD class="hforeground" align="left">
          <INPUT type="text" class="textinputs" name="location" value="<?PHP ECHO $user->location?>" size="20" maxlength="64">
        </TD>
      </TR>
      <TR>
        <TD class="hforeground" align="left">
          <B><?PHP ECHO $lng["about"]?>:</B>
        </TD>
          <TD class="hforeground" align="left">
            <TEXTAREA name="about" class="textinputs" cols="20" rows="5"><?PHP ECHO $user->about?></TEXTAREA>
        </TD>
      </TR>
<?PHP
IF($current_user->level&1024){
?>
      <TR>
        <TD class="hforeground" align="left">
          <B><?PHP ECHO $lng["privileges"]?>:</B>
        </TD>
        <TD class="hforeground" align="left">
          <TABLE class="dforeground" border="0" width="100%" cellspacing="1" cellpadding="6">
<?PHP
  $tr=0;
  FOR($i=0;$i<COUNT($privileges);$i++){
    IF(!$tr){
?>
            <TR>
<?PHP
    }
    IF($privileges[$i]){
?>
              <TD align="left">
                <INPUT type="checkbox" name="set_rights[<?PHP ECHO $privileges[$i][value]?>]" value="1" <?PHP ECHO $privileges[$i][checked]?>>
                &nbsp;<?PHP ECHO $privileges[$i][name]?>
              </TD>
<?PHP
    }ELSE{
?>
              <TD>&nbsp;</TD>
<?PHP
    }
    IF($tr){
      $tr=0;
?>
            </TR>
<?PHP
    }ELSE{
      $tr=1;
    }
  }
?>
          </TABLE>
        </TD>
      </TR>
<?PHP
}
?>
      <TR>
        <TD class="hforeground" colspan="2">
          &nbsp;
        </TD>
      </TR>
      <TR>
        <TD class="hforeground" colspan="2" align="center">
          <INPUT type="submit" class="buttons" value="<?PHP ECHO $lng["savechanges"]?>">
        </TD>
      </TR>
    </FORM>
  </TABLE>
</DIV>
</BODY>
</HTML>
