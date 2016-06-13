<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<?
if ($w == "") {
	$title_msg = "게시물 작성";
 } else if ($w == "u") {
	$title_msg = "게시물 수정";
 } else {
	$title_msg = "게시물 답변";
}
?>

<!-- [참고] 옵션필드 --> 
<?// $board[bo_2] = "이미지 뷰설정" ?>
<!-- [참고] 옵션필드 끝 -->

<script language="JavaScript">
// 글자수 제한
var char_min = parseInt(<?=$write_min?>); // 최소
var char_max = parseInt(<?=$write_max?>); // 최대
</script>

<!-- 김선용 2005.4 - FF(불여우) 에서는 innerHTML 사용시 폼이 <table> 아래에 있으면 인식하지 못합니다. -->
<form name="fwrite" method="post" action="javascript:fwrite_check(document.fwrite);" enctype="multipart/form-data" autocomplete="off" style='margin:0px'>

<!-- //----{레이아웃 테이블 시작} -----------------------// -->
<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0>
<tr><td align=center>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td colspan=2 height="2" bgcolor="#94BAC0"></td></tr>

<input type=hidden name=null><!-- 삭제하지 마십시오. -->
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
    <td width="110" align="center" class="b_bg"><!--분류--//--><span class="b_tit">구분</span></td>
    <td width="" align="center" class="b_bg">&nbsp;<span class="b_tit"><?=$title_msg?></span></td>
</tr>


<? if ($is_name) { ?>
<tr height="28">
    <td align="center"><span class='b_tit2'>이름</span></td>
    <td style='padding-left:5px;'><INPUT class=ed maxLength=20 size=15 name=wr_name itemname="이름" required value="<?=$name?>"></td>
</tr>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
<? } ?>

<? if ($is_password) { ?>
<tr height="28">
    <td align="center"><span class='b_tit2'>패스워드</span></td>
    <td style='padding-left:5px;'><INPUT class=ed type=password maxLength=20 size=15 name=wr_password itemname="패스워드" <?=$password_required?>></td>
</tr>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
<? } ?>

<? if ($is_email) { ?>
<tr height="28">
    <td align="center"><span class='b_tit2'>이메일</span></td>
    <td style='padding-left:5px;'><INPUT class=ed maxLength=100 size=50 name=wr_email email itemname="이메일" value="<?=$email?>"></td>
</tr>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
<? } ?>

<!--
<? if ($is_homepage) { ?>
<tr height="28">

    <td align="center"><span class='b_tit2'>홈페이지</span></td>
    <td style='padding-left:5px;'><INPUT class=ed size=50 name=wr_homepage itemname="홈페이지" value="<?=$homepage?>"></td>
</tr>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
<? } ?>
-- -->

<tr height="28">

    <td align="center"><span class='b_tit2'>옵션</span></td>
    <td style='padding-left:5px;'>
        <? if ($is_notice) { ?><input type=checkbox name=notice value="1" <?=$notice_checked?>>공지&nbsp;<? } ?>
        <? if ($is_html) { ?><INPUT onclick="html_auto_br(this);" type=checkbox value="<?=$html_value?>" name="html" <?=$html_checked?>><span class=w_title>HTML</span>&nbsp;<? } ?>
        <? if ($is_secret) { ?><INPUT type=checkbox value="secret" name="secret" <?=$secret_checked?>><span class=w_title>비밀글</span>&nbsp;<? } ?>
        <INPUT type=checkbox value="mail" name="mail" <?=//$recv_email_checked?>>답변메일받기&nbsp;</td>
</tr>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>


<? if ($is_category) { ?>
<tr height="28">
    <td align="center"><span class='b_tit2'>분류</span></td>
    <td style='padding-left:5px;'><select name=ca_name required itemname="분류"><option value="">선택하세요<?=$category_option?></select></td>
</tr>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
<? } ?>


<tr height="28">
    <td align="center"><span class='b_tit2'>제목</span></td>
    <td style='padding-left:5px; padding-right:5px;'><INPUT class=ed style="width:100%;" name=wr_subject itemname="제목" required value="<?=$subject?>"></td>
</tr>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>

<tr>
    <td align="center"><span class='b_tit2'>내용</span></td>
    <td style='padding:5px;'>
        <table width=100% cellpadding=0 cellspacing=0>
        <tr>
            <td width=50% align=left valign=bottom>
                <SPAN style="CURSOR: pointer;" onclick="textarea_decrease('wr_content', 10);"><img src="<?=$board_skin_path?>/img/up.gif" width="16" height="16"></SPAN>
                <SPAN style="CURSOR: pointer;" onclick="textarea_original('wr_content', 10);"><img src="<?=$board_skin_path?>/img/start.gif" width="16" height="16"></SPAN>
                <SPAN style="CURSOR: pointer;" onclick="textarea_increase('wr_content', 10);"><img src="<?=$board_skin_path?>/img/down.gif" width="16" height="16"></SPAN></td>
            <td width=50% align=right><? if ($write_min || $write_max) { ?><span id=char_count></span>글자<?}?></td>
        </tr>
        </table>
        <TEXTAREA id=wr_content name=wr_content class=tx style='width:100%; word-break:break-all;' rows=10 itemname="내용" required 
        <? if ($write_min || $write_max) { ?>ONKEYUP="check_byte('wr_content', 'char_count');"<?}?>><?=$content?></TEXTAREA>
        <? if ($write_min || $write_max) { ?><script language="JavaScript"> check_byte('wr_content', 'char_count'); </script><?}?></td>
</tr>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>

<? if ($is_link) { ?>
<? for ($i=1; $i<=$g4[link_count]; $i++) { ?>
<tr height="28">
    <td align="center"><span class='b_tit2'>링크 #<?=$i?></span></td>
    <td style='padding-left:5px;'><INPUT type='text' class=ed size=50 name='wr_link<?=$i?>' itemname='링크 #<?=$i?>' value='<?=$write["wr_link{$i}"]?>'></td>
</tr>
<? } ?>
<? } ?>

<? if ($is_file) { ?>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
<tr height="28">
	<td align="center" valign="top">
		<table cellpadding=0 cellspacing=0><tr><td style=" PADDING-TOP:10px;" class='b_tit2'>파일 <span onclick="add_file();" style='cursor:pointer;'><img src="<?=$board_skin_path?>/img/f_plus.gif" width="16" height="16" align='absmiddle'></span> <span onclick="del_file();" style='cursor:pointer;'><img src="<?=$board_skin_path?>/img/f_minus.gif" width="16" height="16" align='absmiddle'></span></td></tr></table>
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

            objCell.innerHTML = "<input type='file' class=ed size=34 name='bf_file[]' title='파일 용량 <?=$upload_max_filesize?> 이하만 업로드 가능'>";
            if (delete_code)
                objCell.innerHTML += delete_code;
            else
            {
                <? if ($is_file_content) { ?>
                objCell.innerHTML += "<br><input type='text' class=ed size=50 name='bf_content[]' title='업로드 이미지 파일에 해당 되는 내용을 입력하세요.'>";
                <? } ?>
                ;
            }
        }

        <?=$file_script; //수정시에 필요한 스크립트?>

        function del_file()
        {
            // file_length 이하로는 필드가 삭제되지 않아야 합니다.
            var file_length = <?=(int)$file_length?>;
            var objTbl = document.getElementById("variableFiles");
            if (objTbl.rows.length - 1 > file_length)
                objTbl.deleteRow(objTbl.rows.length - 1);
        }
        </script></td>

</tr>

<!-- //-------- {여분 필드 사용} ---------------// -->
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
<tr height="28">
    <td align="center"><span class='b_tit2'>이미지뷰 설정</span></td>
    <td style='padding-left:5px;'>	
	 <select name='wr_2' class="box">
        <option value='1' <? if($write[wr_2] == '1') echo "selected"; ?>>기본설정</option>
        <option value='2' <? if($write[wr_2] == '2') echo "selected"; ?>>2개씩보기</option>
        <option value='3' <? if($write[wr_2] == '3') echo "selected"; ?>>3개씩보기</option>
        <option value='4' <? if($write[wr_2] == '4') echo "selected"; ?>>4개씩보기</option>
      </select>	
	&nbsp;* 여러개의 이미지를 등록할 경우에만 설정하세요
	</td>

</tr>
<!-- //-------- {여분 필드 사용 끝} -----------// -->

<? } ?>


<? if ($is_trackback) { ?>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
<tr height="28">
    <td align="center"><span class='b_tit2'>트랙백주소</span></td>
    <td style='padding-left:5px;'><INPUT class=ed size=50 name=wr_trackback itemname="트랙백" value="<?=$trackback?>">
        <? if ($w=="u") { ?><input type=checkbox name="re_trackback" value="1">핑 보냄<? } ?></td>
</tr>
<? } ?>

<? if ($is_norobot) { ?>
<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
<tr height="28">
    <td align="center"><span class='b_tit2'><?=$norobot_str?></span></td>
    <td style='padding-left:5px;'><INPUT class=ed type=input size=12 name=wr_key itemname="자동등록방지" required>&nbsp;&nbsp;* 왼쪽의 글자중 <FONT COLOR="red">빨간글자만</FONT> 순서대로 입력하세요.</td>
</tr>
<? } ?>

<tr><td colspan=2 height="1" bgcolor='#ebebeb'></td></tr>
</table>

<br>

  <!-- 버튼 table -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="100%" align="center" valign="top">
         <input type=image id="btn_submit" src="<?=$board_skin_path?>/img/btn_write.gif" border=0 accesskey='s'>&nbsp;
        <a href="./board.php?bo_table=<?=$bo_table?>"><img id="btn_list" src="<?=$board_skin_path?>/img/btn_list.gif" border=0></a></td>
	</tr>
  </table>

<!-- //----{레이아웃 테이블 끝} -----------------------// -->
</td></tr></table>
</form>


<script language="Javascript">

<?
// 관리자라면 분류 선택에 '공지' 옵션을 추가함
if ($is_admin) 
{
    echo "
    if (typeof(document.fwrite.ca_name) != 'undefined')
    {
        document.fwrite.ca_name.options.length += 1;
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].value = '공지';
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].text = '공지';
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
        result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
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
        alert("제목에 금지단어('"+s+"')가 포함되어있습니다");
        return;
    }

    if (s = word_filter_check(f.wr_content.value)) {
        alert("내용에 금지단어('"+s+"')가 포함되어있습니다");
        return;
    }

    if (char_min > 0 || char_max > 0)
    {
        var cnt = parseInt(document.getElementById('char_count').innerHTML);
        if (char_min > 0 && char_min > cnt)
        {
            alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
            return;
        } else if (char_max > 0 && char_max < cnt)
        {
            alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
            return;
        }
    }

    if (typeof(f.wr_key) != "undefined") {
        if (hex_md5(f.wr_key.value) != md5_norobot_key) {
            alert("자동등록방지용 빨간글자가 순서대로 입력되지 않았습니다.");
            f.wr_key.focus();
            return;
        }
    }

    f.action = "./write_update.php";
    f.submit();
}

</script>