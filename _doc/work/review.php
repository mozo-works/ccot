<?php
// 파일명 : review.php
// 각 작품별 작품평 보여주기!
$g4_path = $_SERVER['DOCUMENT_ROOT'].'/gnu4/';
include_once($g4_path.'common.php');

$clean = array();
$mysql = array();
$pm_header = ''; // 공연에 대한 설문 소개글

if (ctype_alnum($_GET['wk_id'])) {
  $clean['wk_id'] = $_GET['wk_id'];
}

switch ($clean['wk_id']) {
  case '6' : // 어머니의 장례식
    $pm_header = '2004년 아룽구지 극장에서 관객 여러분께 여쭤봤습니다. 이 작품 중 가상 인상적인 부분은?';
    display('6', $pm_header);
    break;
    
  case '12' : // 자화상
    $pm_header = '자화상 비평';
    display('12', $pm_header);
    break;

  default :
    break;
}

function display($wk_id, $pm_header) {
  global $connect_db;
  $html = '';
  $pm_header = '<h3>'. $pm_header . '</h3>';
  
  // sql 이스케이프
  $mysql['wk_id'] = mysql_real_escape_string($wk_id, $connect_db);
  $result = mysql_query('SELECT comments FROM flower_reviews WHERE w_id = '.$mysql['wk_id']);
  $numrow = mysql_num_rows($result);

  if ($numrow !==0) {
    // 질의 결과 html로 저장
    $html = '<div id="text">';
    $html .= $pm_header;
    while ($row = mysql_fetch_array($result)) {
       $html .= "<p>{$row['comments']}</p>\n";
    }
    $html .= '</div>';
  }

  // 출력
  echo $html;
}

?>