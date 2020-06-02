<?php require_once ROOT. '/views/layouts/header.php';?>


    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-sm-offset-4 padding right">

                    <!--sign up form-->

                    <div class="signup-form">

                        <h2>Вход</h2>
                        <!-- <div class="alert alert-success"></div> -->

                        <?php if(isset($errors) && $errors): ?>
                            <div class="alert alert-danger">
                                <?php
                                    foreach($errors as $key => $errorMsg)
                                    {
                                        echo $errorMsg. "<br/>";
                                    }
                                ?>
                            </div>
                        <?php endif;?>

                        <form action="#" method="post">
                            <input type="email"    name="email"    placeholder="Email Address" value="<?php echo $email;?>"
                                   required/>
                            <input type="password" name="password" placeholder="Password"      value="<?php echo $password;?>"
                                   required/>
                            <input type="submit"   name="submit"   class="btn btn-default"     value="Вход"/>
                        </form>
                    </div>
                    <!--/sign up form-->


                    <br/>
                    <br/>
                </div>
            </div>
        </div>
        </div>
    </section>


<?php require_once ROOT. '/views/layouts/footer.php'?>