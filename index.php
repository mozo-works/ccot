<?php
$g4_path = "gnu4";
include_once("./gnu4/common.php");

include_once("{$g4['path']}/lib/latest.lib.php");
$g4['title'] = "환영합니다";
include_once("_head.php");

?>

<div id="contents">
  <div id="index-header">
    <div id="performance">
      <div id="current-performance">
        <img src="/img/flower/banner-201606-large.jpg" alt="2016년 6월 마사지사 공연">
        <h2 class="text-center">2016년 6월 18, 19일 저녁 7시</h2>
        <h2 class="text-center"><a href="http://map.naver.com/local/siteview.nhn?code=11622409" target="_blank">대학로 마로니에 공원 (아르코 미술관 앞)</a></h2>
      </div>
    </div>
  </div>
  <div id="node">
    <br style="clear: both;" />
    <?php echo latest("basic", 'inquiry', 5, 100); ?>
    <?php echo latest("basic", 'press', 5, 100); ?>
    <?php echo latest("basic", 'talk', 5, 100); ?>
    <br style="clear: both;" />
  </div>
</div>

<?php
  include_once("./gnu4/_tail.php");
?>
