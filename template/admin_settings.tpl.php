<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<HTML>
<HEAD>
<?PHP ECHO $css?>
</HEAD>
<BODY>
<DIV align="center">
  <TABLE class="dforeground" border="0" cellspacing="1" cellpadding="6" width="90%">
    <FORM name="config" action="main.php" method="post">
      <INPUT type="hidden" name="include" value="<?PHP ECHO $include?>">
      <INPUT type="hidden" name="session_id" value="<?PHP ECHO $session_id?>">
      <INPUT type="hidden" name="settings_submitted" value="1">
      <TR>
        <TD class="hforeground" colspan="3" align="center">
          <B><?PHP ECHO $lng["settings"]?></B>
        </TD>
      </TR>
<?PHP
FOR($i=0;$i<$config_count;$i++){
?>
      <TR valign="top">
        <TD class="hforeground" align="center">
          <B><?PHP ECHO $i+1?></B>
        </TD>
        <TD class="hforeground" align="left" width="50%">
          <?PHP ECHO $config[$i]["description"]?>
        </TD>
<?PHP
  IF($config[$i]["choices"]){
    IF($config[$i]["choices"]=="<color>"){
?>
        <TD class="hforeground" align="left">
          <INPUT type="text" class="textinputs" name="configuration[<?PHP ECHO $config[$i]["name"]?>]" value="<?PHP ECHO $config[$i]["value"]?>" size="6" maxlength="7">
        </TD>
<?PHP
    }ELSEIF($config[$i]["choices"]=="<text>"){
?>
        <TD class="hforeground" align="left">
          <TEXTAREA rows="8" cols="36" class="textinputs" name="configuration[<?PHP ECHO $config[$i]["name"]?>]"><?PHP ECHO $config[$i]["value"]?></TEXTAREA>
        </TD>
<?PHP
    }ELSEIF($config[$i]["choices"]=="<lng>"){
?>
        <TD class="hforeground" align="left">
          <SELECT name="configuration[<?PHP ECHO $config[$i]["name"]?>]" class="selects">
            <OPTION value=""></OPTION>
<?PHP
      FOR($ii=0;$ii<COUNT($lng_array);$ii++){
        IF($config[$i]["value"]==$lng_array[$ii]){
          $selected="selected";
        }ELSE{
          $selected="";
        }
?>
            <OPTION value="<?PHP ECHO $lng_array[$ii]?>" <?PHP ECHO $selected?>><?PHP ECHO UCFIRST($lng_array[$ii])?></OPTION>
<?PHP
      }
?>
          </SELECT>
        </TD>
<?PHP
    }ELSEIF($config[$i]["choices"]=="<rooms>"){
      $room=NEW room();
      $room->listRooms($session, 0, '', 0);
?>
        <TD class="hforeground" align="left">
          <SELECT name="configuration[<?PHP ECHO $config[$i]["name"]?>]" class="selects">
            <OPTION value=""></OPTION>
<?PHP
      FOR($ii=0;$ii<COUNT($room->roomlist);$ii++){
        IF($config[$i]["value"]==$room->roomlist[$ii]['id']){
          $selected="selected";
        }ELSE{
          $selected="";
        }
?>
            <OPTION value="<?PHP ECHO $room->roomlist[$ii]['id']?>" <?PHP ECHO $selected?>><?PHP ECHO $room->roomlist[$ii]['name']?></OPTION>
<?PHP
      }
?>
          </SELECT>
        </TD>
<?PHP
    }ELSE{
      $choices=EXPLODE("|",$config[$i]["choices"]);
?>
        <TD class="hforeground" align="left">
          <SELECT name="configuration[<?PHP ECHO $config[$i]["name"]?>]" class="selects">
<?PHP
      FOR($ii=0;$ii<COUNT($choices);$ii++){
        $one_choice=EXPLODE("=",$choices[$ii]);
        IF($config[$i]["value"]==$one_choice[0]){
          $selected="selected";
        }ELSE{
          $selected="";
        }
?>
            <OPTION value="<?PHP ECHO $one_choice[0]?>" <?PHP ECHO $selected?>><?PHP ECHO $one_choice[1]?></OPTION>
<?PHP
      }
?>
          </SELECT>
        </TD>
<?PHP
    }
  }ELSE{
?>
        <TD class="hforeground" align="left">
          <INPUT type="text" class="textinputs" name="configuration[<?PHP ECHO $config[$i]["name"]?>]" value="<?PHP ECHO $config[$i]["value"]?>" size="32" maxlength="64">
        </TD>
<?PHP
  }
?>
      </TR>
<?PHP
}
?>
      <TR>
        <TD class="hforeground" colspan="3" align="center">
          <INPUT type="submit" class="buttons" value="<?PHP ECHO $lng["savechanges"]?>">
          &nbsp;
          <INPUT type="reset" class="buttons" value="<?PHP ECHO $lng["resetform"]?>">
          &nbsp;
        </TD>
      </TR>
    </FORM>
  </TABLE>
</DIV>
</BODY></HTML>