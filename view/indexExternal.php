<div class="container">
        <div class="row">
            <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
                <div class="panel border bg-white">
                    <div class="panel-heading">
                        <h3 class="pt-3 font-weight-bold">Login</h3>
                    </div>
                    <div class="panel-body p-3">
                        <!-- Login Form -->
                        <form action="phpCon/formHandler.php" method="post">
                            <div class="form-group py-2">
                                <div class="input-field"> 
                                    <span class="far fa-user p-2"></span> 
                                    <input type="text" name="username" placeholder="Username" required> 
                                </div>
                            </div>
                            <div class="form-group py-1 pb-2">
                                <div class="input-field"> 
                                    <span class="fas fa-lock px-2"></span> 
                                    <input type="password" name="password" placeholder="Enter your Password" required> 
                                </div>
                            </div>
                            <div class="form-inline"> 
                                <input type="checkbox" name="remember" id="remember"> 
                                <label for="remember" class="text-muted">Remember me</label> 
                                <a href="#" id="forgot" class="font-weight-bold">Forgot password?</a> 
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
                            <div class="text-center pt-4 text-muted">Don't have an account? <a href="#">Sign up</a></div>
                        </form>
                    </div>
                    <!-- Error Message -->
                    <div class="mx-3 my-2 py-2 bordert">
                        <?php
                        if (isset($_GET['error'])) {
                            $error = $_GET['error'];

                            switch ($error) {
                                case 'no_rows':
                                    $error_message = "Please check your credentials.";
                                    break;

                                default:
                                    $error_message = "An unknown error occurred.";
                                    break;
                            }
                        } else {
                            $error_message = "";
                        }
                        ?>
                        <p class="text-danger text-center"><?php echo $error_message; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>