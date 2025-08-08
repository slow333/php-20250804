<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href="/index.css"/>
  <title>PHP file</title>
</head>
<body>
<?php include '../../include/nav.php' ?>

<h1>PHP file</h1>
<article>
  <h3>file_get_contents(url OR /path/to/file)</h3>
  <h5>받는 파일을 해석해서 보여줌(html, javascript를 넣어주면 실행됨)</h5>
  <h5>url을 넣어주면 그대로 화면을 보여줌</h5>
  <h3>file_put_contents(생성하는파일, 내용);</h3>
  <h5>내용은 텍스트 형태이거나 php 내부에서 선언된 내용(memory loaded)이어야함</h5>
  <h5>file_put_contents(생성하는파일, 내용, FILE_APPEND ); 내용을 추가함</h5>
  <p>생성하는 파일 위치는 권한 777이 있어야함</p>
  <h4>file_exists(파일경로); 파일이 존재하는지 확인</h4>
  <h4>is_file(파일경로); 파일인지 확인</h4>
</article>
</body>
</html>
