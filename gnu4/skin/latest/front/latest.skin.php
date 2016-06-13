<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
//var_dump($list);

?>
<div id="performance" class="lastest-block">
  <h3><a href='<?=$g4['bbs_path']?>/board.php?bo_table=performance'><?=$board['bo_subject']?></a></h3>
  <?php
  if ($list) {
  ?>
  <a href="<?=$list[0]['href'];?>" style="margin-left: 10px; margin-bottom: 5px; width: 495px; height:180px; display: block; overflow: hidden;"><img src="<? echo $list[0]['file'][0]['path'].'/'.$list[0]['file'][0]['file'];?>" style="width: 495px;" alt="<?=$list[0]['subject'];?>" border="0" /></a>
  <?php
  } else {
  ?>
  <div style="margin:0; padding:0; margin-left: 10px; margin-bottom: 5px; width: 495px; height:180px; display: block; overflow: hidden; line-height:0.6; font-size: 80px; letter-spacing: -7px; text-align: right;">
    <span style="color:#fff; font-weight:normal; display:block; margin-top:30px;">comming soon!</span>
    <a href="/gnu4/bbs/board.php?bo_table=performance" style="font-size:11px; line-height:1; letter-spacing:0; z-index:10;">이전 공연 보러 가기</a>
  </div>
  <?php } ?>
</div>