<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href="../index.css"/>
  <title>PHP Form, Filter</title>
</head>
<body>
  <?php include '../../include/nav.php' ?>
  <h1>PHP Form, Filter</h1>
  <h3>filter</h3>
  <h3>PHP에서 제공하는 filter_var() 함수를 사용하여 입력값을 필터링할 수 있습니다.</h3>
  <p>이메일 필터링: filter_var($var, FILTER_SANITIZE_EMAIL);</p>
  <p>숫자 필터링: filter_var($var, FILTER_SANITIZE_NUMBER_INT);</p>
  <p>URL 필터링: filter_var($var, FILTER_SANITIZE_URL);</p>
  <h4>값 검증: filter_var($var, FILTER_VALIDATE_EMAIL) : boolean; 처럼 사용 가능</h4>
  <pre><code>
<?php include '../include/nav.php' ?>
  <h1>PHP Form, Filter</h1>
  <form action="php_form-filter.php">
    <label for="name">이름:</label>
    <input type="text" id="name" name="name" >
    <br>
    <label for="email">이메일:</label>
    <input type="email" id="email" name="email" >
    <br>
    <label for="age">나이:</label>
    <input type="number" id="age" name="age" >
    <br>
    <label for="memo">memo:</label>
    <textarea id="memo" name="memo" rows='4' cols='20'></textarea>
    <br>
    <button type="submit" style='margin-left: 2rem; font-size: 1.8rem;'>제출</button>
  </form>
<?php
  $name = $_GET['name'] ?? '이름 없음';
  // $name = htmlspecialchars($_GET['name']) ?? '이름 없음';
  $email = $_GET['email'] ?? '이메일 없음';
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  $age = filter_var($_GET['age'], FILTER_SANITIZE_NUMBER_INT) ?? '나이 없음';
  $memo = filter_var($_GET['memo'], FILTER_SANITIZE_STRING) ?? '메모 없음';
  $memo2 = filter_var($_GET['memo'], FILTER_SANITIZE_SPECIAL_CHARS);
?>
<h3>제출된 데이터:</h3>
 <h5>이름 : <?= $name ?></h5> 
 <h5>이메일 : <?= $email ?></h5> 
 <h5>AGE : <?=  $age ?></h5> 
 <h5>memo : <?=  $memo ?></h5> 
 <h5>memo2 : <?=  $memo2 ?></h5> 
</body>
</html>