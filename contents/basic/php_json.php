<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href="/index.css"/>
  <title>PHP JSON</title>
</head>
<body>
<?php include '../../include/nav.php' ?>

<h1>PHP JSON</h1>
<article>
  <h3>json_decode(json); object를 반환함</h3>
<pre>
$json = '{"name": "tom klancy", "age":77, "address":{ "street": "avenue", "city": "vancuber"}}';
$obj = json_decode($json);
print_r($obj);
</pre>
  <h3>json_encode(object OR array); json을 반환함</h3>
<pre>
$array = ['name' => 'tom klancy', 'age' => 77, 'address' => ['street' => 'avenue', 'city' => 'vancouver']];
$json = json_encode($array);  
print_r($json);

class Address {
  public $street = 'avenue';
  public $city = 'vancouver';
}
class Person {
  public $name = 'tom klancy';
  public $age= 77;
  public function __construct() {
    $this->address = new Address();
  }
}
$newPerson = new Person();
$jsonPerson = json_encode($newPerson, JSON_PRETTY_PRINT);  
print_r($jsonPerson);
</pre>
  <h3>object를 array로 변환 : (array) $obj;</h3>
  <pre>function objToArray($obj){
  return json_decode(json_encode($obj), true);
}
  $array = objToArray($obj);  
  print_r($array);  
</pre>
  <h3>array를 object로 변환 : (object) $array;</h3>
  <pre>function arrayToObj($array){
  return json_decode(json_encode($array));
  }</pre>
</article>
</body>
</html>
