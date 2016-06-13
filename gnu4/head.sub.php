<?
// 이 파일은 새로운 파일 생성시 반드시 포함되어야 함
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$begin_time = get_microtime();

if (!$g4['title'])
    $g4['title'] = $config['cf_title'];

// 쪽지를 받았나?
if ($member['mb_memo_call']) {
    $mb = get_member($member[mb_memo_call], "mb_nick");
    sql_query(" update {$g4[member_table]} set mb_memo_call = '' where mb_id = '$member[mb_id]' ");

    alert($mb[mb_nick]."님으로부터 쪽지가 전달되었습니다.", $_SERVER[REQUEST_URI]);
}

// 현재 접속자
//$lo_location = get_text($g4[title]);
//$lo_location = $g4[title];
// 게시판 제목에 ' 포함되면 오류 발생
$lo_location = addslashes($g4['title']);
if (!$lo_location)
    $lo_location = $_SERVER['REQUEST_URI'];
//$lo_url = $g4[url] . $_SERVER['REQUEST_URI'];
$lo_url = $_SERVER['REQUEST_URI'];
if (strstr($lo_url, "/$g4[admin]/") || $is_admin == "super") $lo_url = "";

// 자바스크립트에서 go(-1) 함수를 쓰면 폼값이 사라질때 해당 폼의 상단에 사용하면
// 캐쉬의 내용을 가져옴. 완전한지는 검증되지 않음
header("Content-Type: text/html; charset=$g4[charset]");
$gmnow = gmdate("D, d M Y H:i:s") . " GMT";
header("Expires: 0"); // rfc2616 - Section 14.21
header("Last-Modified: " . $gmnow);
header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: pre-check=0, post-check=0, max-age=0"); // HTTP/1.1
header("Pragma: no-cache"); // HTTP/1.0
/*
// 만료된 페이지로 사용하시는 경우
header("Cache-Control: no-cache"); // HTTP/1.1
header("Expires: 0"); // rfc2616 - Section 14.21
header("Pragma: no-cache"); // HTTP/1.0
*/

// 입력, 출력 구분
$clean = array();
$mysql= array();
$html = array();

// 언어 분기
$lang = ($lang) ? $lang : "ko";

// 메뉴별 css 클래스명 할당
// 게시판 존재 여부 검사

if($_GET['bo_table']) {
  $mysql['bo_table'] = mysql_real_escape_string(trim($_GET['bo_table']));
  $row = sql_fetch("SELECT bo_table FROM $g4[board_table] WHERE bo_table = '{$mysql['bo_table']}'");
}

// 존재하는 게시판명일 경우 그대로 할당
if ($row['bo_table']) {
  $html['class'] = $clean['bo_table'] = $_GET['bo_table'];
} else {
  $html['class'] =  basename($_SERVER['SCRIPT_FILENAME'], '.html');
}

if($html['class'] == 'notice') {
  $html['class'] = 'talk';
}
if($html['class'] == 'index.php') {
  $html['class'] = 'front';
}

$html['class'] = " class=\"{$html['class']}\"";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=$lang?>" lang="<?=$lang?>" dir="ltr">
<head>
  <meta name="Author" content="mozolady" />
  <meta name="Subject" content="<?=$Subject?>" />
  <meta name="keywords" content="<?=$Keywords?>" />
<? if(!$member['mb_id']) {?>
  <meta name="robots" content="index, follow" />
<? } ?>
  <meta http-equiv="Content-Type" content="text/html; charset=<?=$g4['charset']?>" />
  <title>Visual theater company, 꽃 > <?=$g4['title']?></title>
  <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
  <link rel="stylesheet" href="/gnu4/style.css" type="text/css" media="all" />
<? if (!strpos($_SERVER['SCRIPT_FILENAME'], 'adm')) { ?>
  <link rel="stylesheet" href="/css/mozolady.css" type="text/css" media="all" />
  <link rel="stylesheet" href="/css/niftyCorners.css" type="text/css" media="all" />
<? } ?>
<? if(isset($tabtastic)) {?>
  <link rel="stylesheet" href="/css/tabtastic.css" type="text/css" media="all" />
<? } ?>
  <script src="<?=$g4['path']?>/js/common.js" type="text/javascript"></script>
<? if(isset($tabtastic)) {?>
  <script src="<?=$g4['path']?>/js/addclasskillclass.js" type="text/javascript"></script>
  <script src="<?=$g4['path']?>/js/attachevent.js" type="text/javascript"></script>
  <script src="<?=$g4['path']?>/js/addcss.js" type="text/javascript"></script>
  <script src="<?=$g4['path']?>/js/tabtastic.js" type="text/javascript"></script>
<? } ?>
  <script type="text/javascript">
  // <![CDATA[
    // 자바스크립트에서 사용하는 전역변수 선언
    var g4_path      = "<?=$g4['path']?>";
    var g4_bbs       = "<?=$g4['bbs']?>";
    var g4_bbs_img   = "<?=$g4['bbs_img']?>";
    var g4_url       = "<?=$g4['url']?>";
    var g4_is_member = "<?=$is_member?>";
    var g4_is_admin  = "<?=$is_admin?>";
    var g4_bo_table  = "<?=isset($bo_table)?$bo_table:'';?>";
    var g4_sca       = "<?=isset($sca)?$sca:'';?>";
    var g4_charset   = "<?=$g4['charset']?>";
    var g4_cookie_domain = "<?=$g4['cookie_domain']?>";
    var g4_is_gecko  = navigator.userAgent.toLowerCase().indexOf("gecko") != -1;
    var g4_is_ie     = navigator.userAgent.toLowerCase().indexOf("msie") != -1;
    <? if ($is_admin) { echo "var g4_admin = '{$g4['admin']}';\n"; } ?>
  // ]]>
  </script>
</head>
<body<?=$html['class']?><?=isset($g4['body_script']) ? ' '.$g4['body_script'] : "";?>>
<a name="g4_head"></a>