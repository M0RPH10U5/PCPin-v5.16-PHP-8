<?PHP
// Load headers
REQUIRE(TEMPLATEPATH."/all_header.tpl.php");
?>
<HTML>
<HEAD>
<?PHP ECHO $css?>
<SCRIPT>
  window.opener.parent.smiliesOpened=true;
  var closedByOpener=false;
  var smilieTexts=Array();

  function closeThisWindow(){
    if(!closedByOpener){
      window.opener.parent.document.smiliesOpened=false;
      window.close();
    }
  }

  function closeByOpener(){
    closedByOpener=true;
    window.close();
  }

  function resizeWindow(){
    var tableWidth=0;
    var tableHeight=0;
    for(var i=0;i<<?PHP ECHO $rows_count?>;i++){
      var currentWidth=0;
      var currentHeight=0;
      for(var ii=0;ii<<?PHP ECHO $session->config->smiliesInRow?>;ii++){
        var imgID=i*<?PHP ECHO $session->config->smiliesInRow?>+ii;
        eval("var imgWidth=document.img_"+imgID+".width;");
        eval("var imgHeight=document.img_"+imgID+".height;");
        if(imgHeight>currentHeight){
          currentHeight=imgHeight;
        }
        currentWidth+=imgWidth;
      }
      tableHeight+=currentHeight;
      if(tableWidth<currentWidth){
        tableWidth=currentWidth;
      }
    }
    correct=<?PHP ECHO $cellspacing*($rows_count+2)+$cellpadding*($rows_count+1)*2+ROUND(($cellspacing*($rows_count+2)+$cellpadding*($rows_count+1)*2)/10)?>;
    window.resizeTo(tableWidth+100+correct,tableHeight+120+correct);
  }

</SCRIPT>
</HEAD>
<BODY onLoad="resizeWindow();" onUnload="closeThisWindow();">
<DIV align="center">
  <TABLE width="100%" border="0" cellspacing="<?PHP ECHO $cellspacing?>" cellpadding="<?PHP ECHO $cellpadding?>">
<?PHP
FOR($i=0;$i<$rows_count;$i++){
?>
    <TR valign="center">
<?PHP
  FOR($ii=0;$ii<$session->config->smiliesInRow;$ii++){
?>
      <TD align="center">
        <A href="" onclick="window.opener.parent.insertSmilieText(<?PHP ECHO $smilies_array[$i][$ii][id]?>); return false;"><IMG src="<?PHP ECHO $smilies_array[$i][$ii][image]?>" name="img_<?PHP ECHO $smilies_array[$i][$ii][nr]?>" border="0" alt=""></A>
      </TD>
<?PHP
  }
?>
    </TR>
<?PHP
}
?>
    <TR>
      <TD colspan="<?PHP ECHO $session->config->smiliesInRow?>">&nbsp;</TD>
    </TR>
    <TR>
      <TD align="center" colspan="<?PHP ECHO $session->config->smiliesInRow?>">
        <A href="" onclick="closeThisWindow(); return false;"><?PHP ECHO $lng["closewindow"]?></A>
      </TD>
    </TR>
  </TABLE>
</DIV>
</BODY></HTML>