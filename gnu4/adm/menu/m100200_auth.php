<?
preg_match("/m([0-9]{3})([0-9]{3})_[^\/]*.php$/", __FILE__, $m);
sub_menu($m, "관리권한설정", "{$g4[admin_path]}/auth_list.php");
?>