# 콘텐츠 관리

## [첫 화면](https://visualtheater.kr/)

- 텍스트 수정: [_data/front.yml](https://github.com/mozo-works/ccotbbat/edit/gh-pages/_data/front.yml)
- 배너 이미지: [assets/images/banners/](https://github.com/mozo-works/ccot/tree/gh-pages/assets/images/banners)
  * 예시) bg-image: ```20170622/spain.jpg``` => [assets/images/banners/20170622/spain.jpg](https://visualtheater.kr/assets/images/banners/20170622/spain.jpg)
  * [assets/images/banners](https://github.com/mozo-works/ccot/tree/gh-pages/assets/images/banners)에 정리를 위해 날짜 형식으로 폴더 (20200514)를 만들고 이미지(test.jpg)를 업로드
  * 위의 텍스트 수정 링크에서 ```bg-image: 20200514/test.jpg``` 입력 및 저장

### [소개](https://visualtheater.kr/about/)

[수정 목록 화면](https://github.com/mozo-works/ccot/tree/gh-pages/about)

```
about/
about/visualtheater.md
about/method.md
about/people.md
about/history.md
about/index.md
about/why.md
about/features.md
```

### [작품](https://visualtheater.kr/works/)

[수정 목록 화면](https://github.com/mozo-works/ccot/tree/gh-pages/_works)

```
_works
_works/paper-man.md
_works/the-clothes-of-wolf.md
_works/poem-perfomance-tea.md
_works/the-diaper-man.md
_works/funeral-of-mother.md
_works/self-portrait.md
_works/stone-rolls.md
_works/wall.md
_works/masseur.md
_works/in-the-paint-dance.md
_works/from-the-shadow.md
```
[이미지 파일 위치](https://github.com/mozo-works/ccot/tree/gh-pages/assets/images/work)

```
./assets/images/work/paper
./assets/images/work/wall
./assets/images/work/masseur
./assets/images/work/shadow
./assets/images/work/bellybutton
./assets/images/work/wolf
./assets/images/work/tea
./assets/images/work/self
./assets/images/work/dance
./assets/images/work/diaper
./assets/images/work/stone
./assets/images/work/funeral
./assets/images/work/dream
```

#### 예시: 돌 구르다 수정!

- [수정 목록 화면](https://github.com/mozo-works/ccot/tree/gh-pages/_works)에서 stone-roll.md 파일 클릭 후 연필 아이콘을 클릭하거나
- [수정 바로가기](https://github.com/mozo-works/ccot/edit/gh-pages/_works/stone-rolls.md) 클릭

```
---
wid: 16
title: 돌, 구르다
description: '길거리에서 생활하는 #노숙자 사내. 그의 환영을 통해 드러나는 가정에 대한 그리움, 어린 시절에 대한 향수, 타인에 대한 절절한 목마름, 감춰진 로맨스와 열망들까지.'
img: stone
video:
  - kSVagYYc4BM
  - 8v3mvnWKzCY
featured_image: DSC0474.jpg
meta: |
  - 창작연도 : 2016
  - 형식구분 : 거리극 (일부 관객참여)
  - 창작, 연출 : 이철성
  - 공연자 : 이철성, 서상현, 김준봉, 박상현
  - 미술, 조연출 : 하소정
  - 음악 : 이정훈
  - 공연시간 : 50분
---
```

##### youtube 동영상 교체

```
video:
  - kSVagYYc4BM
  - 8v3mvnWKzCY
```

* https://www.youtube.com/watch?v=kSVagYYc4BM
* 위 URL 중 kSVagYYc4BM 이것만 교체하면 됨
* 주의! video: 줄 아래에는 반드시 스페이스 두 칸 띄고 - kSVagYYc4BM 이렇게 해야함

##### 이미지 교체

```
img: stone
```

* [assets/images/work/stone](https://github.com/mozo-works/ccot/tree/gh-pages/assets/images/work/stone) 여기에 돌 구리다 관련된 모든 이미지가 있음
* https://github.com/mozo-works/ccot/blob/gh-pages/assets/images/work/stone/11.jpg
* 삭제하려면 해당 파일을 클릭 후 휴지통 아이콘 클릭하면 삭제됨
* 교체하려면 파일명을 동일하게 11.jpg로 바꾼후에 업로드
* 파일명은 한글로 하면 브라우저에서 깨져서 안보일수도 있으니 반드시 숫자와 영문으로 교체 후 업로드
