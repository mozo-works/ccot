<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 
?>

<!-- �Խñ� ���� ���� -->
<table width="<?=$width?>" align="center" cellpadding="0" cellspcing="0"><tr><td>

<!-- ��ũ ��ư -->
<? 
ob_start(); 
?>
<table width='96%' align="center" cellpadding=0 cellspacing=0>
<tr height=35>
    <td>
        <? if ($search_href) { echo "<a href=\"$search_href\"><img src='$board_skin_path/img/btn_search_list.gif' border='0' align='absmiddle'></a> "; } ?>
        <? echo "<a href=\"$list_href\"><img src='$board_skin_path/img/btn_list.gif' border='0' align='absmiddle'></a> "; ?>

        <? if ($write_href) { echo "<a href=\"$write_href\"><img src='$board_skin_path/img/btn_write.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($reply_href) { echo "<a href=\"$reply_href\"><img src='$board_skin_path/img/btn_reply.gif' border='0' align='absmiddle'></a> "; } ?>

        <? if ($update_href) { echo "<a href=\"$update_href\"><img src='$board_skin_path/img/btn_update.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($delete_href) { echo "<a href=\"$delete_href\"><img src='$board_skin_path/img/btn_delete.gif' border='0' align='absmiddle'></a> "; } ?>

        <? if ($good_href) { echo "<a href=\"$good_href\" target='hiddenframe'><img src='$board_skin_path/img/btn_good.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($nogood_href) { echo "<a href=\"$nogood_href\" target='hiddenframe'><img src='$board_skin_path/img/btn_nogood.gif' border='0' align='absmiddle'></a> "; } ?>

        <? if ($scrap_href) { echo "<a href=\"javascript:;\" onclick=\"win_scrap('./scrap_popin.php?bo_table=$bo_table&wr_id=$wr_id');\"><img src='$board_skin_path/img/btn_scrap.gif' border='0' align='absmiddle'></a> "; } ?>

        <? if ($copy_href) { echo "<a href=\"$copy_href\"><img src='$board_skin_path/img/btn_copy.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($move_href) { echo "<a href=\"$move_href\"><img src='$board_skin_path/img/btn_move.gif' border='0' align='absmiddle'></a> "; } ?>    </td>
    <td align=right>
        <? if ($prev_href) { echo "<a href=\"$prev_href\" title=\"$prev_wr_subject\"><img src='$board_skin_path/img/btn_prev.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
        <? if ($next_href) { echo "<a href=\"$next_href\" title=\"$next_wr_subject\"><img src='$board_skin_path/img/btn_next.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>    </td>
</tr>
</table>
<?
$link_buttons = ob_get_contents();
ob_end_flush();
?>

<table width="100%" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#ececec">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="8">
      <tr>
        <td bgcolor="#ebf3f3"><table width="100%" border="0" cellpadding="0" cellspacing="6" bgcolor="#f9fdfd">
            <tr>
              <td align="center"><span class="b_bg" style="word-break:break-all;">&nbsp;<b><font color="#ff6600" size="3">
                <? if ($is_category) { echo ($category_name ? "[$view[ca_name]] " : ""); } ?>
                <?=$view[subject]?>
              </font></b></span></td>
              <td width="260" align="right"><span class="b_bg" style="word-break:break-all;"><span class="v2">�Խ��� : <?=substr($view[wr_datetime],2,14)?> | �ۼ��� : </span>
    <?=$view[name]?></span></td>
            </tr>
          </table></td>
      </tr>
    </table>
      </td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellpadding="1" cellspacing="0" bgcolor="#ececec">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="8">
      <tr>
        <td bgcolor="#F7F7F7"><table width="100%" border="0" cellpadding="0" cellspacing="6" bgcolor="#FFFFFF">
            <tr>
              <td><? 
        // ���� ���
        for ($i=0; $i<=count($view[file]); $i++) {
            if ($view[file][$i][view]) 
                echo $view[file][$i][view] . "<p>";
        }
        ?>
                <div id="ContentsLayer"> <span class="ct lh">
                  <?=$view[content];?>
                </span> </div>
                <?//echo $view[rich_content]; // {�̹���:0} �� ���� �ڵ带 ����� ���?>
                <!-- �׷� �±� ������ -->
                </xml>
                </xmp>
                <a href=""></a><a href=''></a>
                <? if ($is_signature) { echo "<br>$signature<br><br>"; } // ���� ��� ?>
                <table width="100%" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#ececec">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="8">
      <tr>
        <td bgcolor="#ebf3f3"><table width="100%" border="0" cellpadding="0" cellspacing="6" bgcolor="#f9fdfd">
            <tr>
              <td width="3" align="center"><span class="b_bg" style="word-break:break-all;">&nbsp;</span></td>
              <td>
			  <? 
// �з��� ��뿩�θ� üũ�ϱ� ���ؼ� �ݵ�� _common.php ���� ��Ŭ��� ���� ���̺���� �����ϼ��� 
if(!$bo_table) $bo_table = 'freeboard';  // ��ȸ�� ��� �Խ����� �����ϼ���. 

//include_once("./_common.php"); 

$g4[title] = ""; 
//include_once("./_head.php"); 

/* 
 * ���� �Խ��ǿ��� �Խ��ڰ� �ۼ��ѱ۰� �ڸ�Ʈ ��� ��ȸ�ϱ� 
 */ 
// �̸� ���� $member[mb_id]: ID, $member[mb_name] : ����, $member[mb_nick] : ���� 
$name = "$view[name]"; 

//############################################################################# 
// �ۼ��� �� �ۼ�. 

$row = sql_fetch("select count(*) as cnt from $g4[write_prefix]$bo_table where mb_id='$write[mb_id]' and wr_is_comment = 0"); 
echo"<b>$name</b><font color=#FF6600><b> ���� �ֱ� ����� �Խñ�</font></b><br>"; 

$sql_query = "select * from $g4[write_prefix]$bo_table where mb_id='$write[mb_id]' and wr_is_comment = 0 order by wr_id desc limit 6"; //�� 6�� ��ȸ 
$result = sql_query($sql_query); 

while($row=mysql_fetch_array($result)) { 
$tmp = strip_tags(stripslashes($row[wr_subject])); 
$tmp = cut_str($tmp,50); 
echo "<li> "; 
if($board[bo_use_category]) echo "<font color=#999999>[$row[ca_name]]</font>"; 
echo "<a href='$g4[bbs_path]/board.php?bo_table=$bo_table&wr_id=$row[wr_id]'>&nbsp;$tmp</a> <font color=#999999>(".date('Y/m/d', strtotime($row[wr_datetime])).")</font><br>"; 

} 
sql_free_result($result); 

//############################################################################# 
// �ۼ��� �� �ڸ�Ʈ ��. 
$row = sql_fetch("select count(*) as cnt from $g4[write_prefix]$bo_table where mb_id='$write[mb_id]' and wr_is_comment = 1"); 
echo"<br><b>$name</b><font color=#FF6600><b> ���� �ֱ� ����� �ڸ�Ʈ</font></b><br>"; 

$sql_query = "select * from $g4[write_prefix]$bo_table where mb_id='$write[mb_id]' and wr_is_comment = 1 order by wr_id desc limit 6"; //�ڸ�Ʈ 6�� ��ȸ 

$result = sql_query($sql_query); 

while($row=mysql_fetch_array($result)) { 
$tmp = strip_tags(stripslashes($row[wr_content])); 
$tmp = cut_str($tmp,50); 
echo "<li> "; 
echo "<a href='$g4[bbs_path]/board.php?bo_table=$bo_table&wr_id=$row[wr_parent]#c_{$row[wr_id]}'>&nbsp;$tmp</a> <font color=#999999>(".date('Y/m/d', strtotime($row[wr_datetime])).")</font><br>"; 

} 
sql_free_result($result); 

?>
</td>
            </tr>
          </table></td>
      </tr>
    </table>
      </td>
  </tr>
</table>


</td>
            </tr>
          </table></td>
      </tr>
    </table>
      </td>
  </tr>
</table>
<br>
<?
include_once("./view_comment.php");
?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
	<!--########### ������, ������ ���� ###############-->  
<? if (!$board[bo_use_list_view]) { ?>
<table width=100% align=center border=0 cellpadding=0 cellspacing=0>  
  <tr><td height=1 bgcolor=#D4CFC3></td></tr>  
  <tr><td height=2></td></tr>  
  <? if ($prev_href) { echo "<tr><td height=22> �� ������ : <a class='b1' href=\"$prev_href\"> $prev_wr_subject</a></td></tr>"; } ?>  
  <tr><td height=22> �� ����� : <font color='#0066CC'><?=$view[subject]?></a></td></tr>  
  <? if ($next_href) { echo "<tr><td height=22> �� ������ : <a class='b1' href=\"$next_href\"> $next_wr_subject</a></td></tr>"; } ?>  
  <tr><td height=1 bgcolor=#D4CFC3></td></tr>  
</table>  
<? } ?>  
<!--########### ������, ������ �� ###############--> 
	</td>
  </tr>
</table>
<?=$link_buttons?>
</td></tr></table>

<script language="JavaScript">
// HTML �� �Ѿ�� <img ... > �±��� ���� ���̺������� ũ�ٸ� ���̺����� �����Ѵ�.
function resize_image()
{
    var target = document.getElementsByName('target_resize_image[]');
    var image_width = parseInt('<?=$board[bo_image_width]?>');
    var image_height = 0;

    for(i=0; i<target.length; i++) { 
        // ���� ����� ������ ���´�
        target[i].tmp_width  = target[i].width;
        target[i].tmp_height = target[i].height;
        // �̹��� ���� ���̺� ������ ũ�ٸ� ���̺����� �����
        if(target[i].width > image_width) {
            image_height = parseFloat(target[i].width / target[i].height)
            target[i].width = image_width;
            target[i].height = parseInt(image_width / image_height);
        }
    }
}

window.onload = resize_image;
</script>
<!-- �Խñ� ���� �� -->
