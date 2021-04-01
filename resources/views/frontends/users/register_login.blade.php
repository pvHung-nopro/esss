<div class="row">
    <div class="col-sm-4 col-sm-offset-1">
        <div class="login-form"><!--login form-->
            <h2>Login to your account</h2>
            {{-- <div id="app">
               <login></login>
            </div> --}}

            <form action="{{route('login')}}" method="post">
                @csrf
                <input type="text" name="email" placeholder="email" >
                <p class="errors__">{{ $errors->first('email') }}</p>
                <input type="password" name="password" placeholder="password">
                <p class="errors__">{{ $errors->first('password') }}</p>
                <span>
                    <input type="checkbox" class="checkbox"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Giữ cho tôi đăng nhập
                </font></font></span>
                <button type="submit" class="btn btn-default"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đăng nhập</font></font></button>
            </form>

        </div><!--/login form-->
    </div>
    <div class="col-sm-1">
        <h2 class="or">OR</h2>
    </div>
    <div class="col-sm-4">
        <div class="signup-form"><!--sign up form-->
            <h2>New User Signup!</h2>
            {{-- <div id="register">
        <register></register>
            </div> --}}
            <form action="{{route('user.register')}}" method="post">
                @csrf
                <input type="text" name="name" placeholder="Tên">
                <p class="errors__">{{ $errors->first('name') }}</p>
                <input type="text" name="email" placeholder="Địa chỉ email">
                <p class="errors__">{{ $errors->first('email') }}</p>
                <input type="password" name="password" placeholder="Mật khẩu">
                <p class="errors__">{{ $errors->first('password') }}</p>
                <input type="password" name="password_confim" placeholder="Nhập lại mật khẩu">
                <p class="errors__">{{ $errors->first('password_confim') }}</p>
                <button type="submit" class="btn btn-default"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đăng ký</font></font></button>
            </form>

            </form>
        </div><!--/sign up form-->
    </div>
</div>


<style>
  .errors__{
    color: red;
    font-size: 13px;
  }
}
</style>

<script>



</script>
