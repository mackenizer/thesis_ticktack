 <img src="/assets/images/wave.png" class="wave">
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="text-center pb-5"></br>
                <h1>Create Account</h1>
                <span>Already have account?  <a href="/" class="text-decoration-none">Login here</a></span>
                </div>
                
                <div class="d-flex justify-content-center">
                <form action="/register" method="post">
                    <div class="form-row my-4">
                        <div class="col-md-12 mb-2">
                    
                           <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" value="<?= set_value('firstname')?>">
                           
                        </div>
                        <div class="col-md-12 mb-2">
                           
                           <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" value="<?= set_value('lastname')?>">
                           
                        </div>
                        <div class="col-md-12 mb-2">
                           
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?= set_value('email')?>">
                        </div>
                        <div class="col-md-12 mb-2">
                          
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="col-md-12 mb-2">
                           
                            <input type="password" name="repass" id="repass" class="form-control" placeholder="Confirm Password">
                        </div>
                        <div class="col-md-12 mb-4">
                        <!-- <select class="form-control" id="inlineFormCustomSelectPref" name="role">
                       
                            <option value="adviser">Adviser</option>
                            <option value="student">Student</option>
                            

                        </select> -->
                        <select class="form-select" aria-label="Default select example" name="role">
                            <option value="adviser">Adviser</option>
                            <option value="student">Student</option>
                        </select>
                         </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="agreement" id="agreement" class="form-check-input" required>
                            <label for="agreement" class="form-check-label">I agree <a href="#" class="text-decoration-none">term, condition and policy</a></label>
                        </div>

                        <?php if(isset($validation)): ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        

                        <div class="submit-btn text-center my-5">
                            <button type="submit" class="btn">Register</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>

        </div>
    </div>