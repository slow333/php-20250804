<nav id="nav">
  <ul style="list-style:none; margin:0; padding:0; display:flex; gap:10px;">
    <li style="position:relative;">
      <a href="/index.php">BASIC</a>
      <ul class="inner-ul">
        <li><a href="/contents/basic/php_datatype.php">Datatype</a></li>
        <li><a href="/contents/basic/php_string-preg.php">String, preg</a></li>
        <li><a href="/contents/basic/php_form-filter.php">Form, filter</a></li>
        <li><a href="/contents/basic/php_fileupload.php">Form File Upload</a></li>
        <li><a href="/contents/basic/php_array.php">Array</a></li>
        <li><a href="/contents/basic/php_json.php">JSON</a></li>
        <li><a href="/contents/basic/php_file.php">file_get/put_contents</a></li>
        <li><a href="/contents/basic/php_try_catch.php">try catch</a></li>
      </ul>
    </li>
    <li style="position:relative;">
      <a href="/contents/session/index.php">Session</a>
      <ul class="inner-ul">
        <li><a href="/contents/session/login.php">Login</a></li>
        <li><a href="/contents/session/logout.php">Logout</a></li>
      </ul>
    </li>
    <li style="position:relative;">
      <a href="/contents/callback/php_callback.php">Callback</a>
      <ul class="inner-ul">
        <li><a href="/contents/callback/php_callback.php">PHP Callback</a></li>
        <li><a href="/contents/callback/php_promise.php">PHP Promise</a></li>
        <li><a href="/contents/callback/php_async.php">PHP Async</a></li>
      </ul>
    </li>
    <li style="position:relative;">
      <a href="/contents/app/todo-session.php">App</a>
      <ul class="inner-ul">
        <li><a href="/contents/app/todo-session.php">Todo</a></li>
      </ul>
    </li>
  </ul>
</nav>
<style>
#nav { 
  display: flex; 
  gap: 1rem; 
  margin-left: 2rem;
}
.inner-ul { 
  display: none; 
  position: absolute; left: 0; top: 100%; 
  list-style: none; 
  margin: 0; padding: 0; 
}

a:visited, a:link { 
  color: #000; 
  text-decoration: none;
}
#nav ul li {
  border: 1px solid hsla(19, 100%, 57%, 0.30);
}
#nav ul li ul li { 
  width: 180px; 
  margin: 0; 
  padding: 0;  
  border: none;
}
#nav ul li a { 
  text-decoration: none; 
  padding: 6px 12px; 
  display: block; 
  border: 1px solid hsla(17, 6%, 21%, 0.30);
}
#nav ul li ul a { 
  display: block; 
  padding: 6px 16px; 
  background: #f9f9f9; 
  /* border: none; */
  border-radius: 0;
  margin:0;
}
#nav ul li ul a:hover { 
  background: #e0e0e0; 
}
#nav ul li:hover > a { 
  background: #f0f0f0; 
  color: #000; 
}
</style>
<script>
document.querySelectorAll('#nav ul > li').forEach(function(item) {
  item.addEventListener('mouseover', function() {
    const submenu = this.querySelector('ul');
    if (submenu) {
      submenu.style.display = 'block';
    }
  });
  item.addEventListener('mouseout', function() {
    const submenu = this.querySelector('ul');
    if (submenu) {
      submenu.style.display = 'none';
    }
  });
});
</script>