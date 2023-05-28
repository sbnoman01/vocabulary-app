<?php 
$_get_resCode = $_GET['rescode'] ?? 0;
require_once 'partials/header.php' ?>


<div class="login-page">
    <h1>Login Account</h1>
  <div class="form">
    <form class="login-form"  action="inc/controller.php" method="post">
      <input name="login_email" type="text" placeholder="username"/>
      <input name="login_pass" type="password" placeholder="password"/>
      <input name="action" value="login" type="hidden"/>
      <p><?php echo getResponseMessage($_get_resCode); ?></p>
      <button>login</button>
      <p class="message">Not registered? <a href="register.php">Create an account</a></p>
    </form>
  </div>
</div>

<?php require_once 'partials/footer.php' ?>