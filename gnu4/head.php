<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// 사용자 화면 상단과 좌측을 담당하는 페이지입니다.
// 상단, 좌측 화면을 꾸미려면 이 파일을 수정합니다.
include_once("head.sub.php");

$lang = ($lang == 'ko') ? '' : $lang;

//한글일 경우
if($lang !== "en")	{
?>

  <div id="misc">
  <?php if (!$is_member) { ?>
  <!-- 로그인 이전 -->
    <a href="/gnu4/bbs/login.php?url=<?=$urlencode?>">로그인</a>&nbsp;|&nbsp;
    <a href="/gnu4/bbs/register.php">회원가입</a>&nbsp;|&nbsp;
    <a href="/doc/contact.html">연락처</a>&nbsp;|&nbsp;
  <?php } else { ?>
  <!-- 로그인 이후 -->
  <?php
  if($is_admin == "super") {
  ?>
    <a href="<?=$g4['admin_path']?>">설정</a>&nbsp;|&nbsp;
    <a href="<?=$g4['admin_path']?>/phpMyAdmin">MySql</a>&nbsp;|&nbsp;
    <a href="http://www.google.com/analytics/ko-KR/">구글 분석</a>&nbsp;|&nbsp;
  <?php
  }
  ?>
    <a href="/gnu4/bbs/logout.php?url=<?=$urlencode?>">로그아웃</a>&nbsp;|&nbsp;
    <a href="/gnu4/bbs/member_confirm.php?url=register_form.php">정보수정</a>&nbsp;|&nbsp;
    <a href="/doc/contact.html">연락처</a>&nbsp;|&nbsp;
  <?php } ?>
    <a href="/doc/en/flower.html">english</a>
  </div>

  <div id="header">
    <h1><a title="return to home page" accesskey="1" href="/"><?php img("/template/logo.png","Visual theater compnay, 꽃")?></a></h1>
    <ul>
      <li id="menu_f"><a title="단체 소개" href="/doc/flower.html">꽃</a></li>
      <li id="menu_w"><a title="작품 소개" href="/doc/works.html">작품</a></li>
      <li id="menu_p"><a title="공연 연보,일정" href="/gnu4/bbs/board.php?bo_table=performance">공연</a></li>
      <li id="menu_v"><a title="교육" href="http://ccotbbat.com/program">교육</a></li>
      <li id="menu_i"><a title="예매/문의" href="/gnu4/bbs/board.php?bo_table=inquiry">예매</a></li>
      <li id="menu_s"><a title="언론자료" href="/gnu4/bbs/board.php?bo_table=press">언론자료</a></li>
      <li id="menu_t"><a title="게시판" href="/gnu4/bbs/board.php?bo_table=talk">게시판</a></li>
    </ul>
  </div>
  <div id="contents">
<?
} else {
?>
  <div id="misc">
    <a href="/doc/en/contact.html">contact</a>&nbsp;|&nbsp;
    <a href="/">Korean</a>
  </div>
  <div id="header">
    <h1><a title="return to home page" accesskey="1" href="/doc/en/flower.html"><?php img("/template/logo.png","The Visual theater compnay, CCOT")?></a></h1>
    <ul>
      <li id="menu_f"><a title="Introduction" href="/doc/en/flower.html">CCOT</a></li>
      <li id="menu_w"><a title="About our works" href="/doc/en/works.html">Works</a></li>
      <!--
      <li id="menu_c"><a title="Bulletin Board" href="/gnu4/bbs/board.php?bo_table=en_temp&lang=en">Community</a></li>
      -->
    </ul>
  </div>
  <div id="contents">
<?
}
?>