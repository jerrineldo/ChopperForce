

<div class="main-loginpage">
<form action="" method="POST" name="login-form" class="login-form">
    <h1 class="login-form__mainheading">Login</h1>
    <span hidden class="login-form__errormessages">Invalid Credentials</span>
    <div class="login-form__inputfields">
      <label hidden>Username</label>
      <span><i class="fas fa-user"></i></span>
      <input type="text" placeholder="Username" id="login-form__username" autocomplete="off" name="login-form__password"/>
      <hr/>
    </div>
    <div class="login-form__inputfields">
      <span><i class="fas fa-user"></i></span>
      <label hidden>Password</label>
      <input type="password" placeholder="Password" id="login-form__password" name="login-form__password"/>
      <hr/>
    </div >
    <input type="submit" value="SIGN IN" class="login-form__submitbutton"/>
    <div class= "login-form__createLink">
      <a href="#" class="login-form__createAccount">Dont have an Account? Join Now</a>
    </div>   
 </form>
 </div>