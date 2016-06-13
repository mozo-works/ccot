<?php

function img($file, $alt, $id="") {
	$img = $_SERVER['DOCUMENT_ROOT'].'/img/'.$file;
	$img_info = @GetImageSize($img);
	$id = ($id) ? " id=\"".$id."\"" : "";
	list($w, $h, $type, $all) = $img_info;
	echo "<img src=\"/img/$file\" alt=\"$alt\"$id $all />";
}

function GET_Num($name)
{
  global $SET_use_float;
  return $SET_use_float?floatval($_GET[$name]):intval($_GET[$name]);
}

function GET_Str($name)
{
  return get_magic_quotes_gpc()?$_GET[$name]:addslashes($_GET[$name]);
}

function GET_Ori($name)
{
  return get_magic_quotes_gpc()?stripslashes($_GET[$name]):$_GET[$name];
}

function POST_Num($name)
{
  global $SET_use_float;
  return $SET_use_float?floatval($_POST[$name]):intval($_POST[$name]);
}

function POST_Str($name)
{
  return get_magic_quotes_gpc()?$_POST[$name]:addslashes($_POST[$name]);
}

function POST_Ori($name)
{
  return get_magic_quotes_gpc()?stripslashes($_POST[$name]):$_POST[$name];
}

?>