<?php require_once 'partials/header.php' ?>

<div class="login-page">
    <h1>Register Account</h1>
  <div class="form">
    <form class="register-form" action="inc/controller.php" method="post">
      <input name="user_name" type="text" placeholder="name"/>
      <input name="user_email" type="text" placeholder="email address"/>
      <input name="user_pass" type="password" placeholder="password"/>
      <input name="action" value="register" type="hidden"/>
      <button>create</button>
      <p class="message">Already registered? <a href="login.php">Sign In</a></p>
    </form>
  </div>
</div>

<?php require_once 'partials/footer.php' ?>