    <div id="trailer">
      <div style="width:280px; min-height: 350px; float: left; margin: 0 0px 10px 10px; line-height:180%; font-size: 11px; color:#ffffff; text-align:left;"><?echo $xhtml = $wiki->transform($work[story], "Xhtml");?></div>
<?php
// 파일명 : trailer.php
// 각 작품별 동영상 보여주기!

$g4_path = $_SERVER['DOCUMENT_ROOT'].'/gnu4/';
include_once($g4_path.'common.php');

$clean = array();
$wk_id = isset($_GET['wk_id']) ? (int) $_GET['wk_id'] : '';

if($wk_id) {
  $data = sql_fetch(" select video from flower_works where id = $wk_id ");
  if ($data['video'] != '00000000000') {
    $clean['video'] = $data['video'];
?>
      <object style="width:425px; height: 350px; margin-top: 5px; margin-right: 10px;">
        <param name="movie" value="http://www.youtube.com/v/<?php echo $clean['video']; ?>&;ap=%2526fmt%3D18">
        <embed src="http://www.youtube.com/v/<?php echo $clean['video']; ?>&;ap=%2526fmt%3D18" type="application/x-shockwave-flash" width="425" height="350"> </embed>
      </object>
<?php
  } else {
?>
      <div style="width:425px; height: 350px; margin-top: 5px; margin-right: 10px;">
        <p style="text-align: center;">
        <?php
          if($lang !== 'en') {
            echo '준비중입니다.';
          }
          else {
            echo 'Comming soon.';
          }
        ?>
        </p>
      </div>
<?php
  }
}
?>
      <br style="clear:both" />
    </div>
