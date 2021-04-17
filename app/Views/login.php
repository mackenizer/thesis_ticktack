<img src="/assets/images/wave.png" class="wave">
<div class="container">
    <div class="img">
        <img src="/assets/images/bg.svg" alt="">
    </div>
    <div class="login-container pt-0">
        <form action="/" method="post">
            <img class="text-center mx-auto d-block" width="100%" height="300px" src="/assets/images/loggo.jpg" alt="">
           
            
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
            
          

            <!-- <a href="" class="forgot text-decoration-none">Forgot Password?</a> -->
            <?php if(isset($validation)): ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php if(session()->get('error')): ?>
                    <div class="alert alert-danger text-center mt-2" role="alert">
                        <?= session()->get('error') ?>
                    </div>
               
                <?php endif; ?>
            <!-- <select class="form-select mt-3" aria-label=".form-select-sm example" name="role">
                <option selected>Login As</option>
                <option value="student">Student</option>
                <option value="adviser">Adviser</option>
                
            </select> -->
            
            <input type="submit" class="btn" value="Login">
            
            <a href="/register" class="signup  text-decoration-none">Don't have account yet?</a>

        </form>
    </div>

    
</div>


<script>

</script>