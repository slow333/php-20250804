<?php
  session_start();
  // 세션 초기화
  if (!isset($_SESSION['todos'])) {
      $_SESSION['todos'] = [];
  }
  $message = '';
  // 할 일 추가
  if ($_SERVER['REQUEST_METHOD'] === 'POST' 
     && isset($_POST['save']) 
     && $_POST['save'] === 'add' && !empty($_POST['todo_text'])
  ) {
    $todo_text = htmlspecialchars(trim($_POST['todo_text']));
    if($todo_text !== ''){
      $_SESSION['todos'][] = [
        'id' => uniqid(),
        'text' => $todo_text,
        'completed' => false
      ];
      $message = '할 일이 추가되었습니다.';
    } else {
      $message = '할 일 내용을 입력해주세요.';
    }
  }
  // 할 일 삭제
  if ($_SERVER['REQUEST_METHOD'] === 'POST' 
    && isset($_POST['delete'])
    && !empty($_POST['todo_id'])
  ) {
    $todo_id = trim($_POST['todo_id']);
    foreach ($_SESSION['todos'] as $key => $todo) {
      if ($todo['id'] === $todo_id) {
        unset($_SESSION['todos'][$key]);
        $message = '할 일이 삭제되었습니다.';
        break;
      }
    }
  }
  // 모든 할 일 삭제
  if ($_SERVER['REQUEST_METHOD'] === 'POST' 
     && isset($_POST['delete_all'])
     && $_POST['delete_all'] === 'clear_all'
  ) {
    $_SESSION['todos'] = [];
    $message = '모든 할 일이 삭제되었습니다.';
  }
  // onclick toggle completed
  if ($_SERVER['REQUEST_METHOD'] === 'POST'
     && isset($_POST['toggle'])
     && !empty($_POST['todo_id'])
  ) {
    $todo_id = trim($_POST['todo_id']);
    foreach ($_SESSION['todos'] as $key => $todo) {
      if ($todo['id'] === $todo_id) {
        $_SESSION['todos'][$key]['completed'] = !$todo['completed'];
        $message = '할 일의 완료 상태가 변경되었습니다.';
        break;
      }
    }
  }
?>

<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP 세션 기반 할 일 관리</title>
  <link rel='stylesheet' href="/index.css"/>
  <link rel="stylesheet" href='/contents/app/todo.css'>
</head>
<body>
  <?php include '../../include/nav.php' ?>
  <div class="container">
    <h1>나의 할 일 목록</h1>
    <div class="message"><?= $message ?></div>
      <form action="/contents/app/todo-session.php" method="POST" class="row-space-between-items">
        <input type="text" name="todo_text" placeholder="새로운 할 일을 입력하세요" required>
        <button type="submit" name="save" value="add">추가</button>
      </form>
    <ul>
      <?php
      if (isset($_SESSION['todos']) && count($_SESSION['todos']) > 0) {
        foreach ($_SESSION['todos'] as $todo) {
          $completed_class = $todo['completed'] ? 'completed' : '';
      ?>
        <li class="todo-item <?= $completed_class ?> row-space-between-items" >
          <div class="todo-text"><?= $todo['text'] ?></div>
            <form action="/contents/app/todo-session.php" method="POST" class="toggle-form">
              <input type="hidden" name="todo_id" value="<?= $todo['id'] ?>">
              <button type="submit" name="toggle" value="toggle" class='submit-button'>
                <?= $todo['completed'] ? '미완료' : '완료' ?></button>
            </form>
            
            <form action="/contents/app/todo-session.php" method="POST" class="delete-form">
              <input type="hidden" name="todo_id" value="<?= $todo['id'] ?>">
              <button type="submit" name="delete" value="delete"  class='submit-button'>삭제</button>
            </form>
        </li>
      <?php
        }
      } else {
        echo '<li class="todo-item">할 일이 없습니다.</li>';
      }
      ?>
    </ul>

    <form action="#" method="POST" class="clear-all-form">
      <button type="submit" name="delete_all" value="clear_all">모든 할 일 삭제</button>
    </form>
	</div>
</body>
</html>