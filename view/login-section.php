<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b> Đăng nhập</b> <span class="caret"></span></a>
  <ul id="login-dp" class="dropdown-menu">
    Login via
    <div class="social-buttons">
      <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
      <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
    </div>                
    or
    <li>
      <div class="row">
        <div class="col-md-12">
          <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8" id="login-nav">
            <div class="form-group">
              <label class="sr-only" for="email">Email</label>
              <input type="email" class="form-control" name="email"  id="email" placeholder="Email address" required>
              </div>
              <div class="form-group">
                <label class="sr-only" for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <div class="help-block text-right"><a href="">Quên mật khẩu ?</a></div>
                </div>
                <div class="form-group">
                  <button type="submit" name="login" class="btn btn-primary btn-block">Đăng nhập</button>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox">Ghi nhớ
                    </label>
                </div>
          </form>
        </div>
        <div class="bottom text-center">
            Chưa có tài khoản ?<a href=".?view=register"><b>Đăng ký </b></a>
        </div>
      </div>                    
    </li>
  </ul>
</li>
<!-- handle customer login -->
<?php
if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])) {
    $email = ($_POST['email']);
    $password = $_POST['password'];
    (new controller\CustomerController)->login($email, $password);
}
?>