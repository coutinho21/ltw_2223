<?php
  require_once('templates/common.php');
  outputHeader();
?>
    <section id="login">
      <h1>Login</h1>
      <form action="action_login.php" method="post">
        <label>
          Username <input type="text" name="username">
        </label>
        <label>
          Password <input type="password" name="password">
        </label>
        <button type="submit">Login</button>
      </form>
    </section>
<?php
  outputFooter();
?>
