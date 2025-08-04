<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href="/index.css"/>
  <title>PHP Datatype</title>
</head>
<body>
<?php include '../../include/nav.php' ?>
<h1>PHP Datatype</h1>
<article>
  <h3>datatype에는 string, Integer, float, boolean, array, object, null</h3>
  <h3>var_dump(var); 변수의 타입(바이트크기)을 보여줌</h3>
  <h2>ARRY</h2>
  <h3>$arr = [2,3,4,];</h3>
  <h3>array에 key, value 정의 : $arrKeyValue = ['name'=>'hong', 'age'=>55,];</h3>
  <h3>array에 key, value 추가 : $arrKeyValue['address'] = 'seoul';</h3>
  <?php
  $arrKeyValue = ['name'=>'hong', 'age'=>55,];
  echo $arrKeyValue['name'].'<br>';
  $arrKeyValue['address'] = '대전시 서구 둔산로292';
  echo $arrKeyValue['address'];
  ?>
  <h2>Object</h2>
  <h3>Object는 class를 통해 정의함</h3>
  <h3>class Car { public $color; public $model; }</h3>
  <p>instance 생성: $myCar = new Car();</p>
  <p>객체 생성: $myCar->color = "red" </p>
  <p>사용: $myCar->color </p>
  <h3>type casting to string (string)$var, to integer (int)$var</h3>
<?php
$x = "안녕"; $y=33;
var_dump($x, $y);

$arr = [2,3,4,];
echo "<p>".'ARRAY => $arr[2]'."</p>" .PHP_EOL;
echo "<p>$arr[2]</p>" .PHP_EOL;
class Car { public $color; public $model; }
$myCar = new Car();
$myCar->color = "green";
echo 'my car 색상은 ' .$myCar->color;
?>
</article>
</body>
</html>
