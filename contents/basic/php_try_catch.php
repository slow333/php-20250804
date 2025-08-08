<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href="/index.css"/>
  <title>PHP try catch</title>
</head>
<body>
<?php include '../../include/nav.php' ?>

<h1>PHP try catch</h1>
<article>
  <h3>try { } catch(Exception $e) { } finally { }</h3>
<?php
function divide ($a, $b) {
  return $a / $b;
}
  try {
    // 예외가 발생할 수 있는 코드
    $a = 10;
    $b = 0;
    if($b == 0) {
      throw new Exception("0으로 나눌 수 없습니다."); // 예외 발생
    }
    divide(R1, $b); // 0으로 나누기, 예외 발생
  } catch (Exception $e) {
    // 예외가 발생했을 때 실행되는 코드
      echo "예외가 발생했습니다: " . $e->getMessage(). "<br>";
  } finally {
    // 예외 발생 여부와 관계없이 항상 실행되는 코드
    echo " finally 블록이 실행되었습니다.<br>";
  } 
  $filename = '../data.txt';
  try {
    // 파일을 읽는 코드
    if (!file_exists($filename)) {
      throw new Exception("파일이 존재하지 않습니다.");
    }
    $content = file_get_contents($filename);
    echo $content;
  } catch (Exception $e) {
    // 파일이 없을 때 예외 처리
    echo "예외가 발생했습니다: " . $e->getMessage();
  } finally {
    // 파일 읽기 시도 후 항상 실행되는 코드
    echo "<br>파일 읽기 시도가 완료되었습니다.";
  }
?>
</article>
</body>
</html>
