<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 

// ���ÿɼ����� ���� ����ġ�Ⱑ ���������� ����
$colspan = 8;
if ($is_category) $colspan++;
if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// ������ ���ٷ� ǥ�õǴ� ��� �� �ڵ带 ����� ������.
// <nobr style='display:block; overflow:hidden; width:000px;'>����</nobr>
?>

<link rel='stylesheet' type='text/css' href='<?=$board_skin_path?>/ms1021style.css'>

<!-- �Խ��� ��� ���� -->
<table width="<?=$width?>" align="center" cellpadding="0" cellspacing="0"><tr><td valign="top">

<!-- �з� ����Ʈ �ڽ�, �Խù� ���, ������ȭ�� ��ũ -->
<table width="100%" cellspacing="0" cellpadding="0">
<tr height="25">
    <? if ($is_category) { ?><form name="fcategory" method="get"><td width="50%"><select name=sca onchange="location='<?=$category_location?>'+this.value;" class=L_select><option value=''>��ü</option><?=$category_option?></select></td></form><? } ?>
    <td align="right">
        �Խù� <?=number_format($total_count)?>�� 
        <a href='<?=$rss_href?>'><img src='<?=$board_skin_path?>/img/rss.gif' border=0 align=absmiddle></a> 
        <? if ($admin_href) { ?><a href="<?=$admin_href?>"><img src="<?=$board_skin_path?>/img/admin.gif" title="������" border="0" align="absmiddle"></a><? } ?></td>
</tr>
<tr><td height=5></td></tr>
</table>

<table width="100%" cellspacing="0" cellpadding="0">
<tr><td height="2" bgcolor="#eac2d6"></td></tr>
</table>

<!-- ���� -->
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
    <td width="50" align="center" bgcolor="#fdeff6"><span class="L_title">��ȣ</span></td>
    <td width="10" align="center" bgcolor="#fdeff6"></td>
    <? if ($is_category) { ?><td width="70" align="center" bgcolor="#fdeff6"><span class="L_title">�з�</span></td><? } ?>
    <? if ($is_checkbox) { ?><td width="40" align="center" bgcolor="#fdeff6"><INPUT onclick="if (this.checked) all_checked(true); else all_checked(false);" type=checkbox></td><? } ?>
    <td align="center" bgcolor="#fdeff6"><span class="L_title">����</span></td>
    <td width="110" align="center" bgcolor="#fdeff6"><span class="L_title">�۾���</span></td>
    <td width="40" align="center" bgcolor="#fdeff6"><?=subject_sort_link('wr_datetime', $qstr2, 1)?><span class="L_title">��¥</span></a></td>
    <td width="40" align="center" bgcolor="#fdeff6"><?=subject_sort_link('wr_hit', $qstr2, 1)?><span class="L_title">��ȸ</span></a></td>
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

<!-- ��� -->
<? for ($i=0; $i<count($list); $i++) { ?>
<!-- <tr height="28" <? if ($list[$i][is_notice]) { echo "bgcolor='#F9FBFB'"; } else { echo " onmouseover=\"this.style.backgroundColor='#fdeff6';return true;\" onMouseOut=\"this.style.backgroundColor='';return true;\""; }?>>  -->
<tr height="28"> 
    <td width="4"></td>
    <td width="50" align="center">
        <? 
        if ($list[$i][is_notice]) // �������� 
            echo "<img src=\"$board_skin_path/img/notice_icon.gif\" width=30 height=16>";
        else if ($wr_id == $list[$i][wr_id]) // ������ġ
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
<? if (count($list) == 0) { echo "<tr><td colspan='$colspan' height=100 align=center>�Խù��� �����ϴ�.</td></tr>"; } ?>
</form>
</table>

<!-- ������ -->
<table width="100%" cellspacing="0" cellpadding="0">
<tr>
    <td height="37" align="center" background="<?=$board_skin_path?>/img/number_line.gif">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
            <td width="100%" align="center">
                <? if ($prev_part_href) { echo "<a href='$prev_part_href'><img src='$board_skin_path/img/search_prev.gif' width=50 height=20 border=0 align=absmiddle title='�����˻�'></a>"; } ?>
                <?
                // �⺻���� �Ѿ���� �������� �Ʒ��� ���� ��ȯ�Ͽ� �̹����ε� ����� �� �ֽ��ϴ�.
                //echo $write_pages;
                $write_pages = str_replace("ó��", "<img src='$board_skin_path/img/begin.gif' border='0' align='absmiddle' title='ó��'>", $write_pages);
                $write_pages = str_replace("����", "<img src='$board_skin_path/img/page_prev.gif' border='0' align='absmiddle' title='����'>", $write_pages);
                $write_pages = str_replace("����", "<img src='$board_skin_path/img/page_next.gif' border='0' align='absmiddle' title='����'>", $write_pages);
                $write_pages = str_replace("�ǳ�", "<img src='$board_skin_path/img/end.gif' border='0' align='absmiddle' title='�ǳ�'>", $write_pages);
                $write_pages = preg_replace("/<span>([0-9]*)<\/span>/", "<font style=\"font-family:����; font-size:9pt; color:#797979\">$1</font>", $write_pages);
                $write_pages = preg_replace("/<b>([0-9]*)<\/b>/", "<font style=\"font-family:����; font-size:9pt; color:orange;\">$1</font>", $write_pages);
                ?>
                <?=$write_pages?>
                <? if ($next_part_href) { echo "<a href='$next_part_href'><img src='$board_skin_path/img/search_next.gif' width=50 height=20 border=0 align=absmiddle title='�����˻�'></a>"; } ?>
            </td>
        </tr>
        </table></td>
</tr>
</table>

<!-- ��ư ��ũ -->
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
            <option value='wr_subject||wr_content'>����+����</option>
            <option value='wr_subject'>����</option>
            <option value='wr_content'>����</option>
            <option value='mb_id'>ȸ�����̵�</option>
            <option value='wr_name'>�̸�</option>
        </select>
        <INPUT maxLength=15 size=10 name=stx itemname="�˻���" required value="<?=$stx?>" class=L_input>
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
        alert(str + "�� �Խù��� �ϳ� �̻� �����ϼ���.");
        return false;
    }
    return true;
}

// ������ �Խù� ����
function select_delete()
{
    var f = document.fboardlist;

    str = "����";
    if (!check_confirm(str))
        return;

    if (!confirm("������ �Խù��� ���� "+str+" �Ͻðڽ��ϱ�?\n\n�ѹ� "+str+"�� �ڷ�� ������ �� �����ϴ�"))
        return;

    f.action = "./delete_all.php";
    f.submit();
}

// ������ �Խù� ���� �� �̵�
function select_copy(sw)
{
    var f = document.fboardlist;

    if (sw == "copy")
        str = "����";
    else
        str = "�̵�";
                       
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
<!-- �Խ��� ��� �� -->
