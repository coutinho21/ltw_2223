<?php
  require_once('templates/common.php');
  outputHeader();
?>
    <section id="register">
      <h1>Register</h1>
      <form>
        <label>
          Username <input type="text" name="username">
        </label>
        <label>
          E-mail <input type="email" name="email">
        </label>
        <label>
          Password <input type="password" name="password">
        </label>
        <button formaction="#" formmethod="post">Register</button>
      </form>
    </section>
<?php
  outputFooter();
?>