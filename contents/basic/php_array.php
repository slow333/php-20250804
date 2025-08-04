<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href="/index.css"/>
  <title>Array</title>
</head>
<body>
<?php include '../../include/nav.php' ?>
  <article>
    <h1>PHP Array Functions</h1>
    <p>PHP에서 배열은 데이터를 저장하고 조작하는 데 사용되는 중요한 데이터 구조입니다. PHP는 배열을 다루기 위한 다양한 함수들을 제공합니다.</p>
    
    <h3>배열 생성</h3>
    <pre>$array = array(1, 2, 3); // 구식 방법
$array = [1, 2, 3]; // 최신 방법
$array[0];
$array_with_key = ['key'=> 'value', 'name'=>'kim', 'address'=>'daejeon'];
$array_with_key['keyName'];
<?php
$array = [1, 2, 3]; // 최신 방법
$array_with_key = ['key'=> 'value', 'name'=>'kim', 'address'=>'daejeon'];
?></pre>
    <div class="out"><?= $array[0] ?></div>
    <div class="out"><?= $array_with_key['name'] ?></div>
    <h3>배열 길이</h3>
    <pre>count($array); // 배열의 요소 개수 반환</pre>
    <h3>배열 추가 삭제 </h3>
    <pre>array_push($array, 4); // 배열의 끝에 요소 추가
array_pop($array); // 배열의 마지막 요소 제거
array_shift($array); // 배열의 첫 번째 요소 제거
array_unshift($array, 0); // 배열의 앞에 요소 추가</pre>
    <h3>unset($arr['key']);</h3>
    <p>To remove a variable from memory, a specific element from an array, an object reference.</p>
    <pre>unset($var['key']);</pre>
    <h3>배열 병합</h3>
    <pre>$array1 = [1, 2];
$array2 = [3, 4];
$merged = array_merge($array1, $array2); // 두 배열을 병합</pre>
    <h3>배열 정렬</h3>
    <pre>sort($array); // 오름차순 정렬
rsort($array); // 내림차순 정렬
asort($array); // 값 기준 정렬 (키 유지)
ksort($array); // 키 기준 정렬
arsort($array); // 값 기준 내림차순 정렬 (키 유지)
krsort($array); // 키 기준 내림차순 정렬</pre>
    <h3>배열 검색</h3>
    <pre>in_array($value, $array); // 배열에 값이 있는지 확인
array_search($value, $array); // 배열에서 값의 키를 반환</pre>
    <h3>배열 필터링</h3>
    <pre>$filtered = array_filter($array, function($value) {
    return $value > 2; // 2보다 큰 값만 필터링
});</pre>
    <h3>배열 순회</h3>
    <pre>foreach ($array as $key => $value) {
    echo "키: $key, 값: $value\n"; // 배열의 각 요소를 순회
}</pre>
    <h3>배열 변환</h3>
    <pre>$keys = array_keys($array); // 배열의 키를 반환
$values = array_values($array); // 배열의 값을 반환
$flipped = array_flip($array); // 키와 값을 뒤집음</pre>
    <h3>배열 분할</h3>
    <pre>$chunks = array_chunk($array, 2); // 배열을 2개씩 분할
// 결과: [[1, 2], [3, 4]]
$spliced = array_splice($array, 1, 2); // 배열의 일부를 제거하고 반환
// 결과: [2, 3] (원본 배열은 [1, 4])</pre>
    <h3>배열 비교</h3>
    <pre>$array1 = [1, 2, 3];
$array2 = [1, 2, 3];
($array1 == $array2) ? "두 배열은 같습니다.": "두 배열은 다릅니다.";</pre>
    <h3>배열 변환</h3>
    <pre>$json = json_encode($array); // 배열을 JSON 문자열로 변환
$arrayFromJson = json_decode($json, true); // JSON 문자열을 배열로 변환
// true를 두 번째 인자로 주면 연관 배열로 변환</pre>
    <h3>배열 중복 제거</h3>
    <pre>$uniqueArray = array_unique($array); // 배열에서 중복된 값을 제거</pre>

    <h3>string to array</h3>
    <pre>$string = "apple,banana,orange";
$arrayFromString = explode(',', $string); // 문자열을 배열로 변환
// 결과: ['apple', 'banana', 'orange']
$joinedString = implode(',', $arrayFromString); // 배열을 문자열로 변환
// 결과: "apple,banana,orange"</pre>
    <div class="out"><?= implode(', ', $arrayFromString) ?></div>
  </article>
</body>
</html>