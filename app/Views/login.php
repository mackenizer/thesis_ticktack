<img src="/assets/images/wave.png" class="wave">
<div class="container">
    <div class="img">
        <img src="/assets/images/bg.svg" alt="">
    </div>
    <div class="login-container">
        <form action="/" method="post">
            <img class="avatar" src="/assets/images/avatar.svg" alt="">
            <h2>TickTack</h2>
            <p>Build a project with your team.</p>
            <?php if(session()->get('success')): ?>
                    <div class="alert alert-success text-center" role="alert">
                        <?= session()->get('success') ?>
                    </div>
               
                <?php endif; ?>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                   
                    <h5>Email</h5>
                    
                    <input type="text" name="email" class="input" placeholder="Email" value="<?= set_value('email')?>" required>
                    
                </div>
            </div>
            <div class="input-div two">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    
                    <h5>Password</h5>
                  
                    <input type="password" name="password" class="input" placeholder="Password" required>
                </div>
            </div>
            
          

            <a href="" class="forgot">Forgot Password?</a>
            <?php if(isset($validation)): ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                        <?php endif; ?>
            
            <input type="submit" class="btn" value="Login">
            
            <a href="/register" class="signup">Don't have account yet?</a>

        </form>
    </div>

    
</div>