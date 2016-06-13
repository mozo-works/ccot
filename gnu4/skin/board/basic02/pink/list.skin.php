<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 8;
if ($is_category) $colspan++;
if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// 제목이 두줄로 표시되는 경우 이 코드를 사용해 보세요.
// <nobr style='display:block; overflow:hidden; width:000px;'>제목</nobr>
?>

<link rel='stylesheet' type='text/css' href='<?=$board_skin_path?>/ms1021style.css'>

<!-- 게시판 목록 시작 -->
<table width="<?=$width?>" align="center" cellpadding="0" cellspacing="0"><tr><td valign="top">

<!-- 분류 셀렉트 박스, 게시물 몇건, 관리자화면 링크 -->
<table width="100%" cellspacing="0" cellpadding="0">
<tr height="25">
    <? if ($is_category) { ?><form name="fcategory" method="get"><td width="50%"><select name=sca onchange="location='<?=$category_location?>'+this.value;" class=L_select><option value=''>전체</option><?=$category_option?></select></td></form><? } ?>
    <td align="right">
        게시물 <?=number_format($total_count)?>건 
        <a href='<?=$rss_href?>'><img src='<?=$board_skin_path?>/img/rss.gif' border=0 align=absmiddle></a> 
        <? if ($admin_href) { ?><a href="<?=$admin_href?>"><img src="<?=$board_skin_path?>/img/admin.gif" title="관리자" border="0" align="absmiddle"></a><? } ?></td>
</tr>
<tr><td height=5></td></tr>
</table>

<table width="100%" cellspacing="0" cellpadding="0">
<tr><td height="2" bgcolor="#eac2d6"></td></tr>
</table>

<!-- 제목 -->
<table width="100%" cellspacing="0" cellpadding="0">
<form name="fboardlist" method="post">
<input type="hidden" name="bo_table" value="<?=$bo_table?>">
<input type="hidden" name="sfl"  value="<?=$sfl?>">
<input type="hidden" name="stx"  value="<?=$stx?>">
<input type="hidden" name="spt"  value="<?=$spt?>">
<input type="hidden" name="page" value="<?=$page?>">
<input type="hidden" name="sw"   value="">
<tr> 
    <td width="4" height="28" bgcolor="#fdeff6"></td>
    <td width="50" align="center" bgcolor="#fdeff6"><span class="L_title">번호</span></td>
    <td width="10" align="center" bgcolor="#fdeff6"></td>
    <? if ($is_category) { ?><td width="70" align="center" bgcolor="#fdeff6"><span class="L_title">분류</span></td><? } ?>
    <? if ($is_checkbox) { ?><td width="40" align="center" bgcolor="#fdeff6"><INPUT onclick="if (this.checked) all_checked(true); else all_checked(false);" type=checkbox></td><? } ?>
    <td align="center" bgcolor="#fdeff6"><span class="L_title">제목</span></td>
    <td width="110" align="center" bgcolor="#fdeff6"><span class="L_title">글쓴이</span></td>
    <td width="40" align="center" bgcolor="#fdeff6"><?=subject_sort_link('wr_datetime', $qstr2, 1)?><span class="L_title">날짜</span></a></td>
    <td width="40" align="center" bgcolor="#fdeff6"><?=subject_sort_link('wr_hit', $qstr2, 1)?><span class="L_title">조회</span></a></td>
    <td width="4" bgcolor="#fdeff6"></td>
</tr>

<tr> 
    <td width="4" height="1" bgcolor="#eac2d6"></td>
    <td width="50" bgcolor="#eac2d6"></td>
    <td width="10" bgcolor="#eac2d6"></td>
    <? if ($is_category) { ?><td width="70" bgcolor="#eac2d6"></td><? } ?>
    <? if ($is_checkbox) { ?><td width="40" bgcolor="#eac2d6"></td><? } ?>
    <td bgcolor="#eac2d6"></td>
    <td width="110" bgcolor="#eac2d6"></td>
    <td width="40" bgcolor="#eac2d6"></td>
    <td width="40" bgcolor="#eac2d6"></td>
    <td width="4" bgcolor="#eac2d6"></td>
</tr>

<!-- 목록 -->
<? for ($i=0; $i<count($list); $i++) { ?>
<!-- <tr height="28" <? if ($list[$i][is_notice]) { echo "bgcolor='#F9FBFB'"; } else { echo " onmouseover=\"this.style.backgroundColor='#fdeff6';return true;\" onMouseOut=\"this.style.backgroundColor='';return true;\""; }?>>  -->
<tr height="28"> 
    <td width="4"></td>
    <td width="50" align="center">
        <? 
        if ($list[$i][is_notice]) // 공지사항 
            echo "<img src=\"$board_skin_path/img/notice_icon.gif\" width=30 height=16>";
        else if ($wr_id == $list[$i][wr_id]) // 현재위치
            echo "<font color='#2C8CB9'>{$list[$i][num]}";
        else
            echo "<span class='L_num'>{$list[$i][num]}</span>";
        ?></td>
    <td width="10"></td>
    <? if ($is_category) { ?><td width="70" align="center"><a href="<?=$list[$i][ca_name_href]?>"><span class=L_category><?=$list[$i][ca_name]?></span></a></td><? } ?>
    <? if ($is_checkbox) { ?><td width="40" align="center"><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"></td><? } ?>
    <td style='word-break:break-all; padding:5 0 5px;'>
        <? 
        echo $nobr_begin;
        echo $list[$i][reply];
        echo $list[$i][icon_reply];
        echo "<a href='{$list[$i][href]}'>";
        if ($list[$i][is_notice])
            echo "<font color='#2C8CB9'>{$list[$i][subject]}</font>";
        else
            echo "{$list[$i][subject]}";
        echo "</a>";

        if ($list[$i][comment_cnt])
            echo " <a href=\"{$list[$i][comment_href]}\"><span class='L_comment_cnt'>{$list[$i][comment_cnt]}</span></a>";

        // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
        // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

	echo " " . $list[$i][icon_new];
	echo " " . $list[$i][icon_file];
	echo " " . $list[$i][icon_link];
	echo " " . $list[$i][icon_hot];
	echo " " . $list[$i][icon_secret];
	echo $nobr_end;
        ?></td>
    <td width="110" align="center" style='padding:5 0 5px;'><?=$list[$i][name]?></td>
    <td width="40" align="center" class="L_date"><?=$list[$i][datetime2]?></td>
    <td width="40" align="center" class="L_hit"><?=$list[$i][wr_hit]?></td>
    <td width="4"></td>
</tr>
<tr>
    <td colspan="<?=$colspan?>" height="1" bgcolor="#EEEEEE"></td>
</tr>
<? } ?>
<? if (count($list) == 0) { echo "<tr><td colspan='$colspan' height=100 align=center>게시물이 없습니다.</td></tr>"; } ?>
</form>
</table>

<!-- 페이지 -->
<table width="100%" cellspacing="0" cellpadding="0">
<tr>
    <td height="37" align="center" background="<?=$board_skin_path?>/img/number_line.gif">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
            <td width="100%" align="center">
                <? if ($prev_part_href) { echo "<a href='$prev_part_href'><img src='$board_skin_path/img/search_prev.gif' width=50 height=20 border=0 align=absmiddle title='이전검색'></a>"; } ?>
                <?
                // 기본으로 넘어오는 페이지를 아래와 같이 변환하여 이미지로도 출력할 수 있습니다.
                //echo $write_pages;
                $write_pages = str_replace("처음", "<img src='$board_skin_path/img/begin.gif' border='0' align='absmiddle' title='처음'>", $write_pages);
                $write_pages = str_replace("이전", "<img src='$board_skin_path/img/page_prev.gif' border='0' align='absmiddle' title='이전'>", $write_pages);
                $write_pages = str_replace("다음", "<img src='$board_skin_path/img/page_next.gif' border='0' align='absmiddle' title='다음'>", $write_pages);
                $write_pages = str_replace("맨끝", "<img src='$board_skin_path/img/end.gif' border='0' align='absmiddle' title='맨끝'>", $write_pages);
                $write_pages = preg_replace("/<span>([0-9]*)<\/span>/", "<font style=\"font-family:돋움; font-size:9pt; color:#797979\">$1</font>", $write_pages);
                $write_pages = preg_replace("/<b>([0-9]*)<\/b>/", "<font style=\"font-family:돋움; font-size:9pt; color:orange;\">$1</font>", $write_pages);
                ?>
                <?=$write_pages?>
                <? if ($next_part_href) { echo "<a href='$next_part_href'><img src='$board_skin_path/img/search_next.gif' width=50 height=20 border=0 align=absmiddle title='다음검색'></a>"; } ?>
            </td>
        </tr>
        </table></td>
</tr>
</table>

<!-- 버튼 링크 -->
<table width="100%" cellspacing="0" cellpadding="0">
<tr> 
    <td width="50%" height="40">
        <? if ($list_href) { ?><a href="<?=$list_href?>"><img src="<?=$board_skin_path?>/img/list.gif" border="0"></a><? } ?>
        <? if ($write_href) { ?><a href="<?=$write_href?>"><img src="<?=$board_skin_path?>/img/write.gif" border="0"></a><? } ?>
        <? if ($is_checkbox) { ?>
            <a href="javascript:select_delete();"><img src="<?=$board_skin_path?>/img/delete.gif" border="0"></a>
            <a href="javascript:select_copy('copy');"><img src="<?=$board_skin_path?>/img/copy.gif" border="0"></a>
            <a href="javascript:select_copy('move');"><img src="<?=$board_skin_path?>/img/move.gif" border="0"></a>
        <? } ?>
    </td>
    <form name=fsearch method=get>
    <input type=hidden name=bo_table value="<?=$bo_table?>">
    <input type=hidden name=sca      value="<?=$sca?>">
    <td width="50%" align="right">
        <select name=sfl class=L_select>
            <option value='wr_subject||wr_content'>제목+내용</option>
            <option value='wr_subject'>제목</option>
            <option value='wr_content'>내용</option>
            <option value='mb_id'>회원아이디</option>
            <option value='wr_name'>이름</option>
        </select>
        <INPUT maxLength=15 size=10 name=stx itemname="검색어" required value="<?=$stx?>" class=L_input>
        <SELECT name=sop class="L_select">
            <OPTION value=and>And</OPTION>
            <OPTION value=or>Or</OPTION>
        </SELECT>
    </td>
    <td width="10%" align="center">&nbsp;<INPUT type=image width="45" height="18" src="<?=$board_skin_path?>/img/search.gif" align=absmiddle border=0></td>
    </form>
</tr>
</table>

</td></tr></table>

<script language="JavaScript">
if ("<?=$sca?>") document.fcategory.sca.value = "<?=$sca?>";
if ("<?=$stx?>") {
    document.fsearch.sfl.value = "<?=$sfl?>";
    document.fsearch.sop.value = "<?=$sop?>";
}
</script>

<? if ($is_checkbox) { ?>
<script language="JavaScript">
function all_checked(sw)
{
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function check_confirm(str)
{
    var f = document.fboardlist;
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(str + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }
    return true;
}

// 선택한 게시물 삭제
function select_delete()
{
    var f = document.fboardlist;

    str = "삭제";
    if (!check_confirm(str))
        return;

    if (!confirm("선택한 게시물을 정말 "+str+" 하시겠습니까?\n\n한번 "+str+"한 자료는 복구할 수 없습니다"))
        return;

    f.action = "./delete_all.php";
    f.submit();
}

// 선택한 게시물 복사 및 이동
function select_copy(sw)
{
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";
                       
    if (!check_confirm(str))
        return;

    var sub_win = window.open("", "move", "left=50, top=50, width=396, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<? } ?>
<!-- 게시판 목록 끝 -->
