
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Đăng ký</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<body>
    
<div class="container">
  <div class="row">
    <h2>Đăng ký tài khoản</h2> 
        
    <form class="form-horizontal"  method="post">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Họ tên</label>  
  <div class="col-md-4">
  <input  name="ten" placeholder="Họ tên của bạn" class="form-control input-md" required="" type="text">
  <span class="help-block"> </span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Email</label>  
  <div class="col-md-4">
  <input  name="email" placeholder="Email của bạn" class="form-control input-md" required="" type="email">
  <span class="help-block"> </span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Mật khẩu</label>  
  <div class="col-md-4">
  <input  name="password" placeholder="Mật khẩu đăng nhập" class="form-control input-md" required="" minlength="6" maxlength="25" type="password">
  <span class="help-block"> </span>  
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Số điện thoại</label>  
  <div class="col-md-4">
  <input  name="dienthoai" placeholder="Số điện thoại" class="form-control input-md" required=""  maxlength="11" pattern="[0][0-9]{9,10}" type="tel">
  <span class="help-block"> </span>  
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Địa chỉ</label>  
  <div class="col-md-4">
  <input  name="diachi" placeholder="Địa chỉ" class="form-control input-md" required="" type="text">
  <span class="help-block"> </span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Số thành viên trong gia đình</label>  
  <div class="col-md-4">
  <input name="number" min="1" step="1" class="form-control input-md" required="" type="number">
  <span class="help-block"> </span>  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Sở thích</label>  
  <div class="col-md-4">
  <textarea  name="sothich"  row=7 class="form-control" placeholder="Sở thích" ></textarea>
  <span class="help-block"> </span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"> </label>
  <div class="col-md-4">
    <input name="submit" type="submit" value="Đăng ký" class="btn btn-primary">
  </div>
</div>

</fieldset>
</form>
  
  </div>
</div>
</body>
</html>
