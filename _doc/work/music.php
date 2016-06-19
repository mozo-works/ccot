  <div id="node">
<?php
// 파일명 : music.php
// 작품id를 받아서 각각의 배경음악에 대한 데이터를 뿌려준다.

  switch($wk_id){
  case 1 :
    echo <<<ESO
    <ol>
      <li>슈베르트 가곡 ‘La Pastorella(양치기 소년)’</li>
      <li>해금산조-지영희류</li>
      <li>김영동 불교 명상 음악 ‘법고’</li>
    </ol>
ESO;
    break;

  case 6 :
    echo <<<EFO
    <ol>
      <li>김진영의 보이스 ‘아이고’</li>
      <li>가야금 산조-박상근류</li>
    </ol>
EFO;
    break;

  case 2 :
    echo <<<EDO
    <ol>
      <li>쇼팽의 녹턴 중</li>
      <li>쇼팽의 녹턴 중</li>
    </ol>
EDO;
    break;

  case 5 :
    echo <<<EBO
    <ol>
      <li>호주 원주민 악기 ‘디주리두’</li>
    </ol>
EBO;
    break;
  }

?>
  </div>