<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="./index.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to nginx!</title>
</head>
<body>
<?php include './include/nav.php' ?>
<h1>Welcome to PHP on Apache2 server</h1>
<article>
  <h3>기본 적으로 cgi로 동작하고, 작성은 shell script와 동일함.</h3>
  <h3>문법은 javascript, java 섞여 있음</h3>
  <p>안녕하세요 <?php echo 'php에서 나오는 내용!!~~'; ?></p>
  <?php    $color = 'red';  ?>
  <div class="out">my favorit color <? $color ?> 변수 $color 로 부터 값을 가져옮</div>
  <h4>. 은 텍스트 +와 같음</h4>
  <h4>""는 변수를 정의가능하고, ''내부에 있는 $는 일반 텍스트로 인식함</h4>
  <?php 
   echo 'comment는 // 로 함 php 주석은 보이지 않음 <br>';
   echo '<h3>여러줄 주석은 /*   */ 로 처리함</h3>';
  ?>
  <p>echo 내부에 html tag를 넣으면 수행됨.</p>
  <h3>include</h3>
  <h4>마치 react component처럼 처리됨</h4>
  <p>include, require 두 종류가 있으며 require는 fatal error로 처리됨</p>
  <p>include_once, require_once 하면 같은 파일 이름은 한번만 불러옴</p>
  <pre>include './path/to/file.php'</pre>
  <h3>변수</h3>
  <h4>변수는 $로 시작하고 대소문자를 구분함</h4>
  <h4>전역변수를 함수내부에서 사용할려면 global $x 처럼 사용해야함</h4>
  <h4>static 변수: 함수 내에서 static $x = 0; 처럼 사용</h4>
  <p>static 변수는 함수 수행시 초기화되지 않고 이전 값을 유지함(메모리에 로드됨)</p>
  <p>함수 내에서 static이 없이 선언한 변수는 함수 실행시 마다 초기화됨</p>
  <h4>변수를 인자로 전달 가능</h4>
  <h4>함수내에서 global 변수를 직접 사용하려면 $GLOBALS['varName']; 하면됨</h4>
  <h5>=========== output =====================</h5>
  <?php 
      $x = 0;
      function increase() {
        global $x;
        $x++;
        echo $x .PHP_EOL ."<br/>";
      }
      increase();
      increase();
      // static variable
      function varTest() {
        static $count = 0;
        $count++;
        echo $count .PHP_EOL  ."<br/>";
      }
      varTest();
      varTest();
      // argument
      function greeting($a) {
        echo "안녕하세요 " .$a .PHP_EOL ."<br/>";
      }
      $이름 = "김시작";
      greeting($이름);
      // super global
      function show() {
        echo $GLOBALS['x'] .PHP_EOL ."<br/>";
      }
      show();
      ?>
    <h5>=========== output =====================</h5>
</article>
  </body>
</html>
