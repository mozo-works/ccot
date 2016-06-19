<?php
$g4_path = $_SERVER['DOCUMENT_ROOT'].'/gnu4/';
include_once($g4_path.'common.php');

$work = sql_fetch(" select * from flower_works where id = $wk_id ");
$path = $_SERVER['DOCUMENT_ROOT']."/img/work/$work[img]/";
?>
<slideshow>
<?php
if (is_dir($path)) {
   if ($dh = opendir($path)) {
       while (($file = readdir($dh)) !== false) {
           if(strpos($file, '3') === 1 ){
?>
  <slide>
    <image url="http://<?=$_SERVER['HTTP_HOST']?>/img/work/<?=$work[img]?>/<?=$file?>" />
  </slide>
<?
       }
       }
       closedir($dh);
   }
}
?>
</slideshow>