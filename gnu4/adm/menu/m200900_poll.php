<?
preg_match("/m([0-9]{3})([0-9]{3})_[^\/]*.php$/", __FILE__, $m);
sub_menu($m, "투표관리", "{$g4[admin_path]}/poll_list.php");
?>