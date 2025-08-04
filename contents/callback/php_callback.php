<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href="/index.css"/>
  <title>PHP Callback</title>
</head>
<body>
<?php include '../../include/nav.php' ?>
<h1>PHP Callback</h1>
<article>
  <h4>What is a Callback?</h4>
  <p>함수 argumenent로 함수를 받는 함수</p>
  <pre>function($callback, $arg){
    echoe $callback($arg); 
  }</pre>
  <h4>Example</h4>
  <p>함수의 인자로 함수를 전달하는 예제입니다.</p>
  <pre>
function greet($name) {
    return "Hello, " . $name . "br";
}
function executeCallback($callback, $name) {
    return $callback($name);
}
echo executeCallback('greet', 'World'); // Outputs: Hello, World
echo executeCallback(function($name) {
    return "Hi, " . $name;
}, 'PHP'); // Outputs: Hi, PHP
</pre>
  <h3>callback 사용함수</h3>
  <p>array_map(callback, args); </p>
  <p>array_filter(arr, callback); </p>
  <p>array_reduce(array, callback,initial);</p>
  <p>usort(array, callback(a, b){ return a <=> b; })</p>
  <h4>Using Callbacks with array_map(callback, args)</h4>
  <p>배열의 각 요소에 함수를 적용하는 예제입니다.</p>
  <pre>
$numbers = [1, 2, 3, 4, 5];
$squared = array_map(function($num) {
    return $num * $num;
}, $numbers);
echo "Squared numbers: " . implode(", ", $squared) . "br"; 
// Outputs: Squared numbers: 1, 4, 9, 16, 25
// 2개의 배열을 받는 예제
$names = ['Alice', 'Bob', 'Charlie'];
$lastNames = ['Smith', 'Johnson', 'Brown'];
$fullNames = array_map(function($first, $last) {
    return $first . " " . $last;
}, $names, $lastNames);
echo "Full names: " . implode(", ", $fullNames) . "br"; //
</pre>
  <h4>Using Callbacks with array_filter(callback, args)</h4>
  <p>배열에서 조건에 맞는 요소만 필터링하는 예제입니다.</p>
  <pre>
$numbers = [1, 2, 3, 4, 5];
$evenNumbers = array_filter($numbers, function($num) {
    return $num % 2 === 0;
});
echo "Even numbers: " . implode(", ", $evenNumbers) . "l-b"; 
// Outputs: Even numbers: 2, 4
</pre>
  <h4>Using Callbacks with array_reduce(callback, initial_value, args)</h4>
  <p>배열의 모든 요소를 하나의 값으로 축약하는 예제입니다.</p>
  <pre>
$numbers = [1, 2, 3, 4, 5];
$sum = array_reduce($numbers, function($carry, $num) {
    return $carry + $num;
}, 0);
echo "Sum of numbers: " . $sum . ""; // Outputs: Sum of numbers: 15
</pre>
  <h4>Using Callbacks with usort(array, callback)</h4>
  <p>배열을 사용자 정의 기준으로 정렬하는 예제입니다.</p>
  <pre>
$people = [
    ['name' => 'Alice', 'age' => 30],
    ['name' => 'Bob', 'age' => 25],
    ['name' => 'Charlie', 'age' => 35]
];
usort($people, function($a, $b) {
    return $a['age'] <=> $b['age']; // // a가 적으면 -1, 같으면 0, 크면 1
});
foreach ($people as $person) {
    echo $person['name'] . " is " . $person['age'] . " years old.";
}
// Outputs: Alice is 30 years old. Bob is 25 years old. Charlie is 35 years old.
</pre>
<?php
$people = [
    ['name' => 'Alice', 'age' => 30],
    ['name' => 'Bob', 'age' => 25],
    ['name' => 'Charlie', 'age' => 35]
];
usort($people, function($a, $b) {
    return $a['age'] <=> $b['age']; // a가 적으면 -1, 같으면 0, 크면 1
});
foreach ($people as $person) {
    echo $person['name'] . " is " . $person['age'] . " years old.<br>";
}
echo "3 <=> 2: " . (3 <=> 2) . "<br>"; // Outputs: 1
echo "2 <=> 2: " . (2 <=> 2) . "<br>"; // Outputs: 0
echo "1 <=> 2: " . (1 <=> 2) . "<br>"; // Outputs: -1
?>
</article>
</body>
</html>
