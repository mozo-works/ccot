<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ�
?>

<?
if ($w == "") {
	$title_msg = "�Խù� �ۼ�";
 } else if ($w == "u") {
	$title_msg = "�Խù� ����";
 } else {
	$title_msg = "�Խù� �亯";
}
?>

<!-- [����] �ɼ��ʵ� --> 
<?// $board[bo_2] = "�̹��� �伳��" ?>
<!-- [����] �ɼ��ʵ� �� -->

<script language="JavaScript">
// ���ڼ� ����
var char_min = parseInt(<?=$write_min?>); // �ּ�
var char_max = parseInt(<?=$write_max?>); // �ִ�
</script>

<!-- �輱�� 2005.4 - FF(�ҿ���) ������ innerHTML ���� ���� <table> �Ʒ��� ������ �ν����� ���մϴ�. -->
<form name="fwrite" method="post" action="javascript:fwrite_check(document.fwrite);" enctype="multipart/form-data" autocomplete="off" style='margin:0px'>

<!-- //----{���̾ƿ� ���̺� ����} -----------------------// -->
<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0>
<tr><td align=center>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td colspan=2 height="2" bgcolor="#94BAC0"></td></tr>

<input type=hidden name=null><!-- �������� ���ʽÿ�. -->
<input type=hidden name=w        value="<?=$w?>">
<input type=hidden name=bo_table value="<?=$bo_table?>">
<input type=hidden name=wr_id    value="<?=$wr_id?>">
<input type=hidden name=sfl      value="<?=$sfl?>">
<input type=hidden name=stx      value="<?=$stx?>">
<input type=hidden name=spt      value="<?=$spt?>">
<input type=hidden name=sst      value="<?=$sst?>">
<input type=hidden name=sod      value="<?=$sod?>">
<input type=hidden name=page     value="<?=$page?>">
<tr height="30">
    <td width="110" align="center" class="b_bg"><!--�з�--//--><span class="b_tit">����</span></td>
    <td width="" align="center" class="b_bg">&nbsp;<span class="b_tit"><?=$title_msg?></span></td>
</tr>


<? if ($is_name) { ?>
<tr height="28">
    <td align="center"><span class='b_tit2'>�̸�</span></td>
    <td style='padding-left:5px;'><INPUT class=ed maxLength=20 size=15 name=wr_name itemname="�̸�" required value="<?=$name?>"></td>
</tr>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
<? } ?>

<? if ($is_password) { ?>
<tr height="28">
    <td align="center"><span class='b_tit2'>�н�����</span></td>
    <td style='padding-left:5px;'><INPUT class=ed type=password maxLength=20 size=15 name=wr_password itemname="�н�����" <?=$password_required?>></td>
</tr>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
<? } ?>

<? if ($is_email) { ?>
<tr height="28">
    <td align="center"><span class='b_tit2'>�̸���</span></td>
    <td style='padding-left:5px;'><INPUT class=ed maxLength=100 size=50 name=wr_email email itemname="�̸���" value="<?=$email?>"></td>
</tr>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
<? } ?>

<!--
<? if ($is_homepage) { ?>
<tr height="28">

    <td align="center"><span class='b_tit2'>Ȩ������</span></td>
    <td style='padding-left:5px;'><INPUT class=ed size=50 name=wr_homepage itemname="Ȩ������" value="<?=$homepage?>"></td>
</tr>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
<? } ?>
-- -->

<tr height="28">

    <td align="center"><span class='b_tit2'>�ɼ�</span></td>
    <td style='padding-left:5px;'>
        <? if ($is_notice) { ?><input type=checkbox name=notice value="1" <?=$notice_checked?>>����&nbsp;<? } ?>
        <? if ($is_html) { ?><INPUT onclick="html_auto_br(this);" type=checkbox value="<?=$html_value?>" name="html" <?=$html_checked?>><span class=w_title>HTML</span>&nbsp;<? } ?>
        <? if ($is_secret) { ?><INPUT type=checkbox value="secret" name="secret" <?=$secret_checked?>><span class=w_title>��б�</span>&nbsp;<? } ?>
        <INPUT type=checkbox value="mail" name="mail" <?=//$recv_email_checked?>>�亯���Ϲޱ�&nbsp;</td>
</tr>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>


<? if ($is_category) { ?>
<tr height="28">
    <td align="center"><span class='b_tit2'>�з�</span></td>
    <td style='padding-left:5px;'><select name=ca_name required itemname="�з�"><option value="">�����ϼ���<?=$category_option?></select></td>
</tr>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
<? } ?>


<tr height="28">
    <td align="center"><span class='b_tit2'>����</span></td>
    <td style='padding-left:5px; padding-right:5px;'><INPUT class=ed style="width:100%;" name=wr_subject itemname="����" required value="<?=$subject?>"></td>
</tr>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>

<tr>
    <td align="center"><span class='b_tit2'>����</span></td>
    <td style='padding:5px;'>
        <table width=100% cellpadding=0 cellspacing=0>
        <tr>
            <td width=50% align=left valign=bottom>
                <SPAN style="CURSOR: pointer;" onclick="textarea_decrease('wr_content', 10);"><img src="<?=$board_skin_path?>/img/up.gif" width="16" height="16"></SPAN>
                <SPAN style="CURSOR: pointer;" onclick="textarea_original('wr_content', 10);"><img src="<?=$board_skin_path?>/img/start.gif" width="16" height="16"></SPAN>
                <SPAN style="CURSOR: pointer;" onclick="textarea_increase('wr_content', 10);"><img src="<?=$board_skin_path?>/img/down.gif" width="16" height="16"></SPAN></td>
            <td width=50% align=right><? if ($write_min || $write_max) { ?><span id=char_count></span>����<?}?></td>
        </tr>
        </table>
        <TEXTAREA id=wr_content name=wr_content class=tx style='width:100%; word-break:break-all;' rows=10 itemname="����" required 
        <? if ($write_min || $write_max) { ?>ONKEYUP="check_byte('wr_content', 'char_count');"<?}?>><?=$content?></TEXTAREA>
        <? if ($write_min || $write_max) { ?><script language="JavaScript"> check_byte('wr_content', 'char_count'); </script><?}?></td>
</tr>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>

<? if ($is_link) { ?>
<? for ($i=1; $i<=$g4[link_count]; $i++) { ?>
<tr height="28">
    <td align="center"><span class='b_tit2'>��ũ #<?=$i?></span></td>
    <td style='padding-left:5px;'><INPUT type='text' class=ed size=50 name='wr_link<?=$i?>' itemname='��ũ #<?=$i?>' value='<?=$write["wr_link{$i}"]?>'></td>
</tr>
<? } ?>
<? } ?>

<? if ($is_file) { ?>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
<tr height="28">
	<td align="center" valign="top">
		<table cellpadding=0 cellspacing=0><tr><td style=" PADDING-TOP:10px;" class='b_tit2'>���� <span onclick="add_file();" style='cursor:pointer;'><img src="<?=$board_skin_path?>/img/f_plus.gif" width="16" height="16" align='absmiddle'></span> <span onclick="del_file();" style='cursor:pointer;'><img src="<?=$board_skin_path?>/img/f_minus.gif" width="16" height="16" align='absmiddle'></span></td></tr></table>
		</td>

    <td style='padding-left:5px;'><table id="variableFiles" cellpadding=0 cellspacing=0></table><?// print_r2($file); ?>
        <script language="JavaScript">
        function add_file(delete_code)
        {
            var objTbl;
            var objRow;
            var objCell;
            if (document.getElementById)
                objTbl = document.getElementById("variableFiles");
            else
                objTbl = document.all["variableFiles"];

            objRow = objTbl.insertRow(objTbl.rows.length);
            objCell = objRow.insertCell(0);

            objCell.innerHTML = "<input type='file' class=ed size=34 name='bf_file[]' title='���� �뷮 <?=$upload_max_filesize?> ���ϸ� ���ε� ����'>";
            if (delete_code)
                objCell.innerHTML += delete_code;
            else
            {
                <? if ($is_file_content) { ?>
                objCell.innerHTML += "<br><input type='text' class=ed size=50 name='bf_content[]' title='���ε� �̹��� ���Ͽ� �ش� �Ǵ� ������ �Է��ϼ���.'>";
                <? } ?>
                ;
            }
        }

        <?=$file_script; //�����ÿ� �ʿ��� ��ũ��Ʈ?>

        function del_file()
        {
            // file_length ���Ϸδ� �ʵ尡 �������� �ʾƾ� �մϴ�.
            var file_length = <?=(int)$file_length?>;
            var objTbl = document.getElementById("variableFiles");
            if (objTbl.rows.length - 1 > file_length)
                objTbl.deleteRow(objTbl.rows.length - 1);
        }
        </script></td>

</tr>

<!-- //-------- {���� �ʵ� ���} ---------------// -->
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
<tr height="28">
    <td align="center"><span class='b_tit2'>�̹����� ����</span></td>
    <td style='padding-left:5px;'>	
	 <select name='wr_2' class="box">
        <option value='1' <? if($write[wr_2] == '1') echo "selected"; ?>>�⺻����</option>
        <option value='2' <? if($write[wr_2] == '2') echo "selected"; ?>>2��������</option>
        <option value='3' <? if($write[wr_2] == '3') echo "selected"; ?>>3��������</option>
        <option value='4' <? if($write[wr_2] == '4') echo "selected"; ?>>4��������</option>
      </select>	
	&nbsp;* �������� �̹����� ����� ��쿡�� �����ϼ���
	</td>

</tr>
<!-- //-------- {���� �ʵ� ��� ��} -----------// -->

<? } ?>


<? if ($is_trackback) { ?>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
<tr height="28">
    <td align="center"><span class='b_tit2'>Ʈ�����ּ�</span></td>
    <td style='padding-left:5px;'><INPUT class=ed size=50 name=wr_trackback itemname="Ʈ����" value="<?=$trackback?>">
        <? if ($w=="u") { ?><input type=checkbox name="re_trackback" value="1">�� ����<? } ?></td>
</tr>
<? } ?>

<? if ($is_norobot) { ?>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
<tr height="28">
    <td align="center"><span class='b_tit2'><?=$norobot_str?></span></td>
    <td style='padding-left:5px;'><INPUT class=ed type=input size=12 name=wr_key itemname="�ڵ���Ϲ���" required>&nbsp;&nbsp;* ������ ������ <FONT COLOR="red">�������ڸ�</FONT> ������� �Է��ϼ���.</td>
</tr>
<? } ?>

<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
</table>

<br>

  <!-- ��ư table -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="100%" align="center" valign="top">
         <input type=image id="btn_submit" src="<?=$board_skin_path?>/img/btn_write.gif" border=0 accesskey='s'>&nbsp;
        <a href="./board.php?bo_table=<?=$bo_table?>"><img id="btn_list" src="<?=$board_skin_path?>/img/btn_list.gif" border=0></a></td>
	</tr>
  </table>

<!-- //----{���̾ƿ� ���̺� ��} -----------------------// -->
</td></tr></table>
</form>


<script language="Javascript">

<?
// �����ڶ�� �з� ���ÿ� '����' �ɼ��� �߰���
if ($is_admin) 
{
    echo "
    if (typeof(document.fwrite.ca_name) != 'undefined')
    {
        document.fwrite.ca_name.options.length += 1;
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].value = '����';
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].text = '����';
    }";
} 
?>

with (document.fwrite) {
    if (typeof(wr_name) != "undefined")
        wr_name.focus();
    else if (typeof(wr_subject) != "undefined")
        wr_subject.focus();
    else if (typeof(wr_content) != "undefined")
        wr_content.focus();

    if (typeof(ca_name) != "undefined")
        if (w.value == "u")
            ca_name.value = "<?=$write[ca_name]?>";
}

function html_auto_br(obj)
{
    if (obj.checked) {
        result = confirm("�ڵ� �ٹٲ��� �Ͻðڽ��ϱ�?\n\n�ڵ� �ٹٲ��� �Խù� ������ �ٹٲ� ����<br>�±׷� ��ȯ�ϴ� ����Դϴ�.");
        if (result)
            obj.value = "html2";
        else
            obj.value = "html1";
    }
    else
        obj.value = "";
}

function fwrite_check(f)
{
    var s = "";
    if (s = word_filter_check(f.wr_subject.value)) {
        alert("���� �����ܾ�('"+s+"')�� ���ԵǾ��ֽ��ϴ�");
        return;
    }

    if (s = word_filter_check(f.wr_content.value)) {
        alert("���뿡 �����ܾ�('"+s+"')�� ���ԵǾ��ֽ��ϴ�");
        return;
    }

    if (char_min > 0 || char_max > 0)
    {
        var cnt = parseInt(document.getElementById('char_count').innerHTML);
        if (char_min > 0 && char_min > cnt)
        {
            alert("������ "+char_min+"���� �̻� ���ž� �մϴ�.");
            return;
        } else if (char_max > 0 && char_max < cnt)
        {
            alert("������ "+char_max+"���� ���Ϸ� ���ž� �մϴ�.");
            return;
        }
    }

    if (typeof(f.wr_key) != "undefined") {
        if (hex_md5(f.wr_key.value) != md5_norobot_key) {
            alert("�ڵ���Ϲ����� �������ڰ� ������� �Էµ��� �ʾҽ��ϴ�.");
            f.wr_key.focus();
            return;
        }
    }

    f.action = "./write_update.php";
    f.submit();
}

</script>