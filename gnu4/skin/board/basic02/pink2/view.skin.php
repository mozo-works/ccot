<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 
?>

<link rel='stylesheet' type='text/css' href='<?=$board_skin_path?>/ms1021style.css'>

<!-- �Խñ� ���� ���� -->
<table width="<?=$width?>" align="center" cellpadding="0" cellspcing="0"><tr><td>

<!-- ��ũ ��ư -->
<? 
ob_start(); 
?>
<table width='100%' cellpadding=0 cellspacing=0>
<tr height=35>
    <td width=75%>
        <? if ($search_href) { echo "<a href=\"$search_href\"><img src='$board_skin_path/img/search_list.gif' border='0' align='absmiddle'></a> "; } ?>
        <? echo "<a href=\"$list_href\"><img src='$board_skin_path/img/list.gif' border='0' align='absmiddle'></a> "; ?>

        <? if ($write_href) { echo "<a href=\"$write_href\"><img src='$board_skin_path/img/write.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($reply_href) { echo "<a href=\"$reply_href\"><img src='$board_skin_path/img/reply.gif' border='0' align='absmiddle'></a> "; } ?>

        <? if ($update_href) { echo "<a href=\"$update_href\"><img src='$board_skin_path/img/modify.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($delete_href) { echo "<a href=\"$delete_href\"><img src='$board_skin_path/img/delete.gif' border='0' align='absmiddle'></a> "; } ?>

        <? if ($good_href) { echo "<a href=\"$good_href\" target='hiddenframe'><img src='$board_skin_path/img/good.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($nogood_href) { echo "<a href=\"$nogood_href\" target='hiddenframe'><img src='$board_skin_path/img/nogood.gif' border='0' align='absmiddle'></a> "; } ?>

        <? if ($scrap_href) { echo "<a href=\"javascript:;\" onclick=\"win_scrap('./scrap_popin.php?bo_table=$bo_table&wr_id=$wr_id');\"><img src='$board_skin_path/img/scrap.gif' border='0' align='absmiddle'></a> "; } ?>

        <? if ($copy_href) { echo "<a href=\"$copy_href\"><img src='$board_skin_path/img/copy.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($move_href) { echo "<a href=\"$move_href\"><img src='$board_skin_path/img/move.gif' border='0' align='absmiddle'></a> "; } ?>
    </td>
    <td width=25% align=right>
        <? if ($prev_href) { echo "<a href=\"$prev_href\" title=\"$prev_wr_subject\"><img src='$board_skin_path/img/prev.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
        <? if ($next_href) { echo "<a href=\"$next_href\" title=\"$next_wr_subject\"><img src='$board_skin_path/img/next.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
    </td>
</tr>
</table>
<?
$link_buttons = ob_get_contents();
ob_end_flush();
?>


<table style='border:1px solid #E4E4E4;' width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="100" height="33" align="center" bgcolor="#ffeffc">����</td>
					<td width="10"></td>
					<td align="left" style='word-break:break-all;'><span class=V_category><? if ($is_category) { echo ($category_name ? "[$view[ca_name]] " : ""); } ?></span><span class=V_subject><?=$view[subject]?></span></td>
					<td width="100" align="right">
						<font color="#727272"><span class=V_hit>��ȸ&nbsp;:&nbsp;<?=$view[wr_hit]?></span>
					<td width="4"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr><td bgcolor="#E4E4E4" height="1"></td></tr>
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="100" height="33" align="center" bgcolor="#ffeffc"><span class=V_name>�۾���</span></td>
					<td width="10"></td>
					<td><?=$view[name]?><span class=V_ip><? if ($is_ip_view) { echo "&nbsp;($ip)"; } ?></span></td>
					<td width="160" align="center">
						<? if ($is_good) echo "<span class=V_good>��õ&nbsp;:&nbsp;$view[wr_good]</span>";?>
						<? if ($is_nogood) echo "<span class=V_nogood>&nbsp;&nbsp;����õ&nbsp;:&nbsp;$view[wr_nogood]</span>";?>
					<td width="130" height="33" align="right"><span class=V_date>�� ¥&nbsp;:&nbsp;<?=substr($view[wr_datetime],2,14)?></span></td>
					<td width="4"></td>
				</tr>
			</table>
		</td>
	</tr>
<?
// ���� ����
$cnt = 0;
for ($i=0; $i<count($view[file]); $i++) {
    if ($view[file][$i][source] && !$view[file][$i][view]) {
        $cnt++;
        echo <<<HEREDOC

	<tr><td bgcolor="#E4E4E4" height="1"></td></tr>
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="100" height="33" align="center" bgcolor="#FAFAFA"><span class=V_file>����</span></td>
					<td width="10"></td>
					<td>
						<a href='{$view[file][$i][href]}' title='{$view[file][$i][content]}'><span class=V_file>{$view[file][$i][source]}</span> <span class=V_fileinfo>({$view[file][$i][size]}), Down:{$view[file][$i][download]}, {$view[file][$i][datetime]}</span></a>
					</td>
					<td width="4"></td>
				</tr>
			</table>
		</td>
	</tr>

HEREDOC;
    }
}

// ��ũ
$cnt = 0;
for ($i=1; $i<=$g4[link_count]; $i++) {
    if ($view[link][$i]) {
        $cnt++;
        $link = cut_str($view[link][$i], 70);
        echo <<<HEREDOC

	<tr><td bgcolor="#E4E4E4" height="1"></td></tr>
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="100" height="33" align="center" bgcolor="#FAFAFA"><span class=V_link>��ũ</span></td>
					<td width="10"></td>
					<td>
						<a href="{$view[link_href][$i]}" target="_blank"><span class=V_link>{$link}</span></a> <span class=V_date>({$view[link_hit][$i]})</span>
					</td>
					<td width="4"></td>
				</tr>
			</table>
		</td>
	</tr>

HEREDOC;
    }
}
?>
<? if ($trackback_url) { ?>
	<tr><td bgcolor="#E4E4E4" height="1"></td></tr>
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td height="33" align="right">
	<span class=V_trackback>Ʈ���� �ּ�</span>
	<a href="javascript:clipboard_trackback('<?=$trackback_url?>');" style="letter-spacing:0;" title='�� ���� �Ұ��� ���� �� �ּҸ� ����ϼ���'><span class=V_trackback_url><?=$trackback_url?></span></a>
	<script language="JavaScript">
	function clipboard_trackback(str) {
		if (g4_is_gecko)
			prompt("�� ���� �����ּ��Դϴ�. Ctrl+C�� ���� �����ϼ���.", str);
		else if (g4_is_ie) {
			window.clipboardData.setData("Text", str);
			alert("Ʈ���� �ּҰ� ����Ǿ����ϴ�.\n\n<?=$trackback_url?>");
		}
		}
	</script>
					</td>
					<td width="4"></td>
				</tr>
			</table>
		</td>
	</tr>
<? } ?>
</table>

<table border="0" cellspacing="0" cellpadding="0">
	<tr><td height="5"></td></tr>
</table>

<table style='border:1px solid #E4E4E4;' width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> 
    <td height="150" valign="top" style='word-break:break-all; padding:10px;'>
        <? 
        // ���� ���
        for ($i=0; $i<=count($view[file]); $i++) {
            if ($view[file][$i][view]) 
                echo $view[file][$i][view] . "<p>";
        }
        ?>

        <span class="V_content"><?=$view[content];?></span>
        <?//echo $view[rich_content]; // {�̹���:0} �� ���� �ڵ带 ����� ���?>
        <!-- �׷� �±� ������ --></xml></xmp><a href=""></a><a href=''></a></td>
</tr>

<? if ($is_signature) { ?>
<tr>
	<td>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td style='word-break:break-all; padding:10px;'><span class=V_signature><?=$signature?></span></td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td width="100%" height="10"></td>
</tr>
<? } ?>
</table>

<?
include_once("./view_comment.php");
?>

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

function file_download(link, file)
{
<? if ($board[bo_download_point] < 0) { ?>if (confirm("'"+file+"' ������ �ٿ�ε� �Ͻø� ����Ʈ�� ����(<?=number_format($board[bo_download_point])?>��)�˴ϴ�.\n\n����Ʈ�� �Խù��� �ѹ��� �����Ǹ� ������ �ٽ� �ٿ�ε� �ϼŵ� �ߺ��Ͽ� �������� �ʽ��ϴ�.\n\n�׷��� �ٿ�ε� �Ͻðڽ��ϱ�?"))<?}?>
document.location.href = link;
}
</script>
<!-- �Խñ� ���� �� -->
