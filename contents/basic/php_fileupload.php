<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href="/index.css"/>
  <title>PHP intro</title>
</head>
<body>
<?php include '../../include/nav.php' ?>
  <h1>Form file upload</h1>
  <article>
    <p>form 에서 <code>enctype="multipart/form-data"</code> 속성 필요</p>
    <p>업로드된 파일은 <code>$file = $_FILES['file_upload']</code> 배열을 통해 접근할 수 있습니다.</p>
    <p><code>include/upload_file.php</code></p>
    <pre>$file = $_FILES['file_upload'];
echo $file['error'] != 0 ? '파일 업로드 실패' : '파일 업로드 성공';    </pre>
    <h3>아래 폼을 사용하여 파일을 업로드해 보세요.</h3>
    <form action="../include/upload_file.php" method='post' enctype='multipart/form-data'>
      <input type="file" name='file_upload'>
      <button type='submit'>파일 올리기</button>
    </form>
    <h3>uniqid, filename 다루기</h3>
    <h4>파일 이름에 타임스탬프를 추가하여 중복을 방지할 수 있습니다.</h4>
    <pre>$time = time();
$name = $time . '_' . $name; // 파일 이름에 타임스탬프 추가</pre>
    <h4>uniqid(); 와 pathinfo($name,PATHINFO_EXTENSION);를 사용 유일한 파일 이름 생성 </h4>
    <pre>$uniqid = uniqid('up_', true); // 'up_+ uniqid 를 갖는 유일한 id를 반환함
  $ext = pathinfo($name, PATHINFO_EXTENSION); // 확장자를 반환함
  $uniq_name = $uniqid . '.' . $ext; // 유일한 이름으로</pre>
    <h3>upload folder가 없는 경우 폴더 생성:날짜별 폴더 생성</h3>
    <h4>mkdir 수행시 777권한을 갖는 폴더 내에서 실행해야함</h4>
  <pre>$today = date('Y-m-d');
$upload_folder = "../uploads/$today"; // 여기서 uploads 폴더는 777 권한을 갖는 폴더여야 합니다.
if(!is_dir($upload_folder)){
  mkdir($upload_folder, 0777, true); 
} // 디렉토리가 없으면 생성</pre>
    <h3>특정 타입의 파일만 허락, in_array(대상arr, 원하는 종류 array);</h3>
    <pre>$type = $_FILES['input_name_value']['type'];
      if(!in_array($type, ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'])) {
  echo "지원하지 않는 파일 형식입니다: $type &lt;br>";
  exit;
}</pre>
  <h3>$_FILES['userfile']['error']로 검증할때 숫자 또는 constant 사용</h3>
  <pre>$phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'exceeds the upload_max_filesize directive in php.ini',
    2 => 'exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);</pre>
<pre>UPLOAD_ERR_OK (Value: 0)
UPLOAD_ERR_INI_SIZE (Value: 1)
UPLOAD_ERR_FORM_SIZE (Value: 2)
UPLOAD_ERR_PARTIAL (Value: 3)
UPLOAD_ERR_NO_FILE (Value: 4)
UPLOAD_ERR_NO_TMP_DIR (Value: 6)
UPLOAD_ERR_CANT_WRITE (Value: 7)
UPLOAD_ERR_EXTENSION (Value: 8)</pre>
  </article>

</body>
</html>