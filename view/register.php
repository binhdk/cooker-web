<div class="container">
  <div class="row">
    <h2>Đăng ký tài khoản</h2> 
    <div class="col-sm-8">
    <form class="form-horizontal"  method="post">
      <fieldset>

      <!-- Text input-->
        <div class="form-group">
          <label class="col-sm-2 control-label" for="name">Họ tên</label>  
          <div class="col-sm-6">
          <input  name="name" placeholder="" class="form-control input-md" required="" type="text">
          <span class="help-block"> </span>  
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-sm-2 control-label" for="textinput">Email</label>  
          <div class="col-sm-6">
          <input  name="email" placeholder="Ví dụ: abc@gmail.com" class="form-control input-md" required="" type="email">
          <span class="help-block"> </span>  
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-sm-2 control-label" for="password">Mật khẩu</label>  
          <div class="col-sm-6">
          <input  name="password" placeholder="Mật khẩu đăng nhập" class="form-control input-md" required="" minlength="6" maxlength="25" type="password">
          <span class="help-block"> </span>  
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label" for="tel">Số điện thoại</label>  
          <div class="col-sm-6">
          <input  name="tel" placeholder="Ví dụ: 0943124698" class="form-control input-md" required=""  maxlength="11" pattern="[0][0-9]{9,10}" type="tel">
          <span class="help-block"> </span>  
          </div>
        </div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-sm-2 control-label" for="submit"> </label>
          <div class="col-sm-6">
            <input name="submit" type="submit" value="Đăng ký" class="btn btn-primary">
          </div>
        </div>

      </fieldset>
    </form>
    </div>

    <div class="col-sm-4 vertical-line">
      fdfd
    </div>
    
  </div>
</div>
