<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href="../index.css"/>
  <title>PHP String</title>
</head>
<body>
<?php include '../../include/nav.php' ?>
<h1>PHP string</h1>
<article>
  <h2>내부에 markup, style 사용가능</h2>
  <p>single quote는 특수문자를 그대로 출력함.\n 그러나 html tag는 동작함</p>
  <p>echo "single quote는 특수문자를 해석해서 변환 후 출력함.\n";</p>
  <h2>string method </h2>
  <p>uppercase -> strtoupper($x);</p>
  <p>uppercase -> strtolower($x);</p>
  <p>uppercase -> str_replace("from", "to chanege", $x);</p>
  <p>substr, 음수가능 -> substr($x, from, countToGet);</p>
  <p>substr에서 한글은 mb_substr 로 해야함(한글은 3바이트)</p>
  <p>mb_substr은 php.ini에서 관련 extension을 활성화해야함</p>
  <h3>double quat에서 특수문자는 \\ 로 해야함 \\n, \\$ </h3>
  <p>nl2br($var); nl2br은 \n을 br tag로 변경 시켜줌</p>
  <p>str_replace("\n", "&lt;br /&gt;\n", $var) 과 같음</p>
<?php
$text = "<p>var content</p>";
echo ('("")괄호를 사용가능' . "<br>");
echo "a", "b", "   c   " .$text;
$mb_substr = mb_substr("한글을 가져오기", 1, 3);
echo "첫번째부터 3개(공백포함) -> ". $mb_substr;
$str = "<p>hello \n world";
$nlToBr = nl2br($str);
echo "<p> $nlToBr </p>";
?>
</article>
<h1>PHP regexp</h1>
  <article>
    <h3>preg_match($pattern, $string, $output_arr);</h3>
    <p>정규표현식에서 $output_arr 일치하는 부분을 배열로 반환함, 첫번째 것만 반환</p>
    <p>예시: $pattern = '/\d+/'; // 숫자에 해당하는 패턴</p>
    <p>$string = 'abc123def';</p> 
    <p>preg_match($pattern, $string, $output_arr);</p>
    <p>echo $output_arr[0]; // '123'이 출력됨</p>

    <h3>preg_match_all($pattern, $string, $output_arr);</h3>
    <p>모든 일치하는 부분을 찾음</p>
    <p>예시: $pattern = '/\d+/'; // 숫자에 해당하는 패턴</p>
    <p>$string = 'abc123def456';</p>
    <p>preg_match_all($pattern, $string, $output_arr);</p>   
    <p>echo implode(', ' , $output_arr[0]); // '123, 456'이 출력됨</p>
<?php
// set pcre.jit=0;
$pattern = '/\d{3}/'; // 숫자에 해당하는 패턴
// $pattern = '/\d+/'; // 숫자에 해당하는 패턴
$string = 'abc123def456999ghi78906';
preg_match($pattern, $string, $matche);
preg_match_all($pattern, $string, $matches);
?>
<div class="out">$pattern = '/\d{3}/'; $string = 'abc123def456999ghi78906';</div>
<div class="out"> preg_match: <?= $matche[0]  ?></div>
<div class="out">preg_match_all : <?= implode(', ' , $matches[0]) ?></div>

    <h3>preg_replace($pattern, $replacement, $string);</h3>
    <p>정규표현식에 일치하는 부분을 대체함</p>
    <p>예시: $pattern = '/\d+/'; // 숫자에 해당하는 패턴</p>
    <p>$replacement = 'X';</p>  
    <p>$string = 'abc123def';</p>
    <p>preg_replace($pattern, $replacement, $string);</p>
    <p>echo $string; // 'abcXdef'이 출력됨</p>

    <h3>preg_split($pattern, $string);</h3> 
    <p>정규표현식에 따라 문자열을 분할함</p>
    <p>예시: $pattern = '/\s+/'; // 공백에 해당하는 패턴</p>
    <p>$string = 'Hello World! This is PHP.';</p>
    <p>$result = preg_split($pattern, $string);</p>
    <p>echo implode(', ', $result); // 'Hello, World!, This, is, PHP.'이 출력됨</p>

    <h3>email match pattern</h3>
    <p>이메일 주소를 검증하는 정규표현식 예시:</p>
    <pre>$emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
$email = 'abc@codo.co.kr';
if (preg_match($emailPattern, $email)) {
    echo "유효한 이메일 주소입니다.";
} else {
    echo "유효하지 않은 이메일 주소입니다.";
}
</pre>
<pre>
$emailPattern = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/';
// $emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
$email = '거시기 abc@codo.co.kr 아무말이나, no@emial this is email@cc.cv; call me aco@cd.cn';

if (preg_match_all($emailPattern, $email, $matches)) {
    echo "유효한 이메일 주소입니다.";
    foreach($matches[0] as $validEmail) {
        echo "찾은 이메일: $validEmail";
    }   
} else {
    echo "유효하지 않은 이메일 주소입니다.";
}
</pre>
    <h3>전화번호 match pattern</h3>
    <p>전화번호를 검증하는 정규표현식 예시:</p>
    <pre>$phonePattern = '/^\d{2,3}-\d{3,4}-\d{4}$/';
$phone = '02-1234-5678';
if (preg_match($phonePattern, $phone)) {
    echo "유효한 전화번호입니다.";
} else {
    echo "유효하지 않은 전화번호입니다.";
}
</pre>
<?php
$phonePattern = '/^\d{2,3}-\d{3,4}-\d{4}$/';
$phone = '02-1234-5678';
if (preg_match($phonePattern, $phone)) {
    echo "유효한 전화번호입니다.";
} else {
    echo "유효하지 않은 전화번호입니다.";
}
?>
  </article>
</body>
</html>