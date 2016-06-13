<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
/*
$latest_skin_path
*/

$arr = get_defined_vars();
//var_dump($arr);
?>


<div id="<?php echo $bo_table?>" class="lastest-block">
  <h3><a href='<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>'><?=$board[bo_subject]?></a></h3>
<?php
if (count($list) !== 0) {
?>
  <ul class="posts">
<?php
  for ($i=0; $i<count($list); $i++) {
    echo "<li>".$list[$i]['icon_reply'] . " ";
    echo "<a href='{$list[$i]['href']}'>";
    if ($list[$i]['is_notice'])
    echo "{$list[$i]['subject']}";
    else
    echo "{$list[$i]['subject']}";
    echo "</a>";

    if ($list[$i]['comment_cnt'])
    echo " <a href=\"{$list[$i]['comment_href']}\"><span style='font-family:돋움; font-size:8pt; color:#9A9A9A;'>{$list[$i]['comment_cnt']}</span></a>";

    // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
    // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

    echo " " . $list[$i]['icon_new'];
    echo "</li>";
}
  echo "</ul>\n";
} else {
?>
  <p>게시물이 없습니다.</p>
<?php
}
?>
</div>