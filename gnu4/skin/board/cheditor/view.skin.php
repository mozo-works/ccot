<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<!-- 게시글 보기 시작 -->
<table width="<?=$width?>" align="center" cellpadding="0" cellspcing="0"><tr><td>

<!-- 링크 버튼 -->
<? 
ob_start(); 
?>
<table width='100%' cellpadding=0 cellspacing=0>
<tr height=35>
    <td width=75%>
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
        <? if ($move_href) { echo "<a href=\"$move_href\"><img src='$board_skin_path/img/btn_move.gif' border='0' align='absmiddle'></a> "; } ?>
    </td>
    <td width=25% align=right>
        <? if ($prev_href) { echo "<a href=\"$prev_href\" title=\"$prev_wr_subject\"><img src='$board_skin_path/img/btn_prev.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
        <? if ($next_href) { echo "<a href=\"$next_href\" title=\"$next_wr_subject\"><img src='$board_skin_path/img/btn_next.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
    </td>
</tr>
</table>
<?
$link_buttons = ob_get_contents();
ob_end_flush();
?>

<table width="100%" cellspacing="0" cellpadding="0">
<tr><td height=2 bgcolor=#B0ADF5></td></tr> 
<tr><td height=30 bgcolor=#F8F8F9 style="padding:5 0 5 0;">&nbsp;&nbsp;<strong><? if ($is_category) { echo ($category_name ? "[$view[ca_name]] " : ""); } ?><?=$view[subject]?></strong></td></tr>
<tr><td height=30>&nbsp;&nbsp;<font color=#7A8FDB>글쓴이</font> : <?=$view[name]?><? if ($is_ip_view) { echo "&nbsp;($ip)"; } ?>&nbsp;&nbsp;&nbsp;&nbsp;
       <font color=#7A8FDB>날짜</font> : <?=substr($view[wr_datetime],2,14)?>&nbsp;&nbsp;&nbsp;&nbsp;
       <font color=#7A8FDB>조회</font> : <?=$view[wr_hit]?>&nbsp;&nbsp;&nbsp;&nbsp;
       <? if ($is_good) { ?><font color=#7A8FDB>추천</font> : <?=$view[wr_good]?>&nbsp;&nbsp;&nbsp;&nbsp;<?}?>
       <? if ($is_nogood) { ?><font color=#7A8FDB>비추천</font> : <?=$view[wr_nogood]?>&nbsp;&nbsp;&nbsp;&nbsp;<?}?></td></tr>
<tr><td height=1 bgcolor=#E7E7E7></td></tr>

<? if ($trackback_url) { ?>
<tr><td height=30>&nbsp;&nbsp;트랙백 주소 : <a href="javascript:clipboard_trackback('<?=$trackback_url?>');" style="letter-spacing:0;" title='이 글을 소개할 때는 이 주소를 사용하세요'><?=$trackback_url?></a>
<script language="JavaScript">
function clipboard_trackback(str) 
{
    if (g4_is_gecko)
        prompt("이 글의 고유주소입니다. Ctrl+C를 눌러 복사하세요.", str);
    else if (g4_is_ie) {
        window.clipboardData.setData("Text", str);
        alert("트랙백 주소가 복사되었습니다.\n\n<?=$trackback_url?>");
    }
}
</script></td></tr>
<?}?>

<?
// 가변 파일
$cnt = 0;
for ($i=0; $i<count($view[file]); $i++) 
{
    if ($view[file][$i][source] && !$view[file][$i][view]) 
    {
        $cnt++;
        echo "<tr><td height=22>&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_file.gif' align=absmiddle> <a href='{$view[file][$i][href]}' title='{$view[file][$i][content]}'><strong>{$view[file][$i][source]}</strong> ({$view[file][$i][size]}), Down : {$view[file][$i][download]}, {$view[file][$i][datetime]}</a></td></tr>";
    }
}

// 링크
$cnt = 0;
for ($i=1; $i<=$g4[link_count]; $i++) 
{
    if ($view[link][$i]) 
    {
        $cnt++;
        $link = cut_str($view[link][$i], 70);
        echo "<tr><td height=22>&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_link.gif' align=absmiddle> <a href='{$view[link_href][$i]}' target=_blank><strong>{$link}</strong> ({$view[link_hit][$i]})</a></td></tr>";
    }
}
?>

<tr><td height=1 bgcolor=#E7E7E7></td></tr>
<tr> 
    <td height="150" style='word-break:break-all; padding:10px;' bgcolor=#F8F8F9>
        <? 
        // 파일 출력
        for ($i=0; $i<=count($view[file]); $i++) {
            if ($view[file][$i][view]) 
                echo $view[file][$i][view] . "<p>";
        }
        ?>

        <span class="ct lh"><?=$view[content];?></span>

        
<!-- ↓ 이 코드는 삭제하셔도 좋습니다. -->
<?/*?>
<br><br><br>
<script type="text/javascript"><!--
google_ad_client = "pub-2822305545668489";
google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
google_ad_type = "text";
google_ad_channel ="";
google_color_border = "000000";
google_color_bg = "F0F0F0";
google_color_link = "0000FF";
google_color_url = "008000";
google_color_text = "000000";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><br><br><span style='font-size:8pt; font-family:돋움; color:silver;'>광고 수입은 그누보드의 호스팅 비용으로 사용합니다. (새창 : Shift + 링크 클릭)</span><br>
<?*/?>
<!-- ↑ 이 코드는 삭제하셔도 좋습니다. -->
        
        
        <?//echo $view[rich_content]; // {이미지:0} 과 같은 코드를 사용할 경우?>
        <!-- 테러 태그 방지용 --></xml></xmp><a href=""></a><a href=''></a>
        
        <? if ($is_signature) { echo "<br>$signature<br><br>"; } // 서명 출력 ?></td>
</tr>
</table><br>

<?
include_once("./view_comment.php");
?>

<?=$link_buttons?>

</td></tr></table><br>

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
