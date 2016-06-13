<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<!-- 게시글 보기 시작 -->
<table width="<?=$width?>" align="center" cellpadding="0" cellspcing="0"><tr><td>

<!-- 링크 버튼 -->
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
              <td width="260" align="right"><span class="b_bg" style="word-break:break-all;"><span class="v2">게시일 : <?=substr($view[wr_datetime],2,14)?> | 작성자 : </span>
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
        // 파일 출력
        for ($i=0; $i<=count($view[file]); $i++) {
            if ($view[file][$i][view]) 
                echo $view[file][$i][view] . "<p>";
        }
        ?>
                <div id="ContentsLayer"> <span class="ct lh">
                  <?=$view[content];?>
                </span> </div>
                <?//echo $view[rich_content]; // {이미지:0} 과 같은 코드를 사용할 경우?>
                <!-- 테러 태그 방지용 -->
                </xml>
                </xmp>
                <a href=""></a><a href=''></a>
                <? if ($is_signature) { echo "<br>$signature<br><br>"; } // 서명 출력 ?>
                <table width="100%" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#ececec">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="8">
      <tr>
        <td bgcolor="#ebf3f3"><table width="100%" border="0" cellpadding="0" cellspacing="6" bgcolor="#f9fdfd">
            <tr>
              <td width="3" align="center"><span class="b_bg" style="word-break:break-all;">&nbsp;</span></td>
              <td>
			  <? 
// 분류의 사용여부를 체크하기 위해서 반드시 _common.php 파일 인클루드 전에 테이블명을 설정하세요 
if(!$bo_table) $bo_table = 'freeboard';  // 조회할 대상 게시판을 설정하세요. 

//include_once("./_common.php"); 

$g4[title] = ""; 
//include_once("./_head.php"); 

/* 
 * 지정 게시판에서 게시자가 작성한글과 코멘트 목록 조회하기 
 */ 
// 이름 설정 $member[mb_id]: ID, $member[mb_name] : 성명, $member[mb_nick] : 별명 
$name = "$view[name]"; 

//############################################################################# 
// 작성한 총 글수. 

$row = sql_fetch("select count(*) as cnt from $g4[write_prefix]$bo_table where mb_id='$write[mb_id]' and wr_is_comment = 0"); 
echo"<b>$name</b><font color=#FF6600><b> 님이 최근 등록한 게시글</font></b><br>"; 

$sql_query = "select * from $g4[write_prefix]$bo_table where mb_id='$write[mb_id]' and wr_is_comment = 0 order by wr_id desc limit 6"; //글 6개 조회 
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
// 작성한 총 코멘트 수. 
$row = sql_fetch("select count(*) as cnt from $g4[write_prefix]$bo_table where mb_id='$write[mb_id]' and wr_is_comment = 1"); 
echo"<br><b>$name</b><font color=#FF6600><b> 님이 최근 등록한 코멘트</font></b><br>"; 

$sql_query = "select * from $g4[write_prefix]$bo_table where mb_id='$write[mb_id]' and wr_is_comment = 1 order by wr_id desc limit 6"; //코멘트 6개 조회 

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
	<!--########### 이전글, 다음글 시작 ###############-->  
<? if (!$board[bo_use_list_view]) { ?>
<table width=100% align=center border=0 cellpadding=0 cellspacing=0>  
  <tr><td height=1 bgcolor=#D4CFC3></td></tr>  
  <tr><td height=2></td></tr>  
  <? if ($prev_href) { echo "<tr><td height=22> ▲ 이전글 : <a class='b1' href=\"$prev_href\"> $prev_wr_subject</a></td></tr>"; } ?>  
  <tr><td height=22> ■ 현재글 : <font color='#0066CC'><?=$view[subject]?></a></td></tr>  
  <? if ($next_href) { echo "<tr><td height=22> ▼ 다음글 : <a class='b1' href=\"$next_href\"> $next_wr_subject</a></td></tr>"; } ?>  
  <tr><td height=1 bgcolor=#D4CFC3></td></tr>  
</table>  
<? } ?>  
<!--########### 이전글, 다음글 끝 ###############--> 
	</td>
  </tr>
</table>
<?=$link_buttons?>
</td></tr></table>

<script language="JavaScript">
// HTML 로 넘어온 <img ... > 태그의 폭이 테이블폭보다 크다면 테이블폭을 적용한다.
function resize_image()
{
    var target = document.getElementsByName('target_resize_image[]');
    var image_width = parseInt('<?=$board[bo_image_width]?>');
    var image_height = 0;

    for(i=0; i<target.length; i++) { 
        // 원래 사이즈를 저장해 놓는다
        target[i].tmp_width  = target[i].width;
        target[i].tmp_height = target[i].height;
        // 이미지 폭이 테이블 폭보다 크다면 테이블폭에 맞춘다
        if(target[i].width > image_width) {
            image_height = parseFloat(target[i].width / target[i].height)
            target[i].width = image_width;
            target[i].height = parseInt(image_width / image_height);
        }
    }
}

window.onload = resize_image;
</script>
<!-- 게시글 보기 끝 -->
