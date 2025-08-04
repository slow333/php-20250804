<?php
  $file = $_FILES['file_upload'];
  $today = date('Y-m-d');
  $upload_folder = "../uploads/$today";
  if(isset($file) && $file['error'] == 0 ){
    // print_r($file);
    $tmp = $file['tmp_name']; //이름 주의 temp 아니고 tmp임
    $name = $file['name'];
    $type = $file['type'];
    if(!in_array($type, ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'])) {
      echo "<h5>지원하지 않는 파일 형식입니다: $type </h5>";
      exit;
    }
    $size = $file['size'];
    // $time = time();
    // $name = $time . '_' . $name; // 파일 이름에 타임스탬프 추가
    $uniqid = uniqid(); // 중복 방지 유일한 id를 반환함
    echo pathinfo($name);
    $ext = pathinfo($name, PATHINFO_EXTENSION); // 확장자를 반환함
    $uniq_name = $uniqid . '.' . $ext; // 유일한 이름으로
    if(!is_dir($upload_folder)){
      mkdir($upload_folder, 0777, true); // 디렉토리가 없으면 생성
    }
  }
  if(isset($tmp) && isset($uniq_name)){
    if(move_uploaded_file($tmp, "$upload_folder/$uniq_name")){
      echo "파일 업로드 성공: $uniq_name <br>";
    } else {
      echo "파일 업로드 실패: $tmp, $uniq_name, $type, $size <br>";
    }
  }  else {
    echo "파일 업로드 실패: 파일이 설정되지 않았거나 오류가 발생했습니다. <br>";
  }
  echo 'end of upload_file.php <br>';
  echo '<a href="../contents/php_fileupload.php">돌아가기</a>';
?>