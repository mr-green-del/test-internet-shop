<?php require_once ROOT. '/views/layouts/header.php';?>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-sm-offset-4 padding right">

                    <!--sign up form-->

                    <div class="signup-form">

                        <h2>Обратная связь</h2>
                        <p>Есть вопрос?</p>

                        <?php if(isset($errors) && $errors): ?>
                            <div class="alert alert-danger">
                                <?php
                                foreach($errors as $key => $errorMsg)
                                {
                                    echo $errorMsg. "<br/>";
                                }
                                ?>
                            </div>
                        <?php elseif(isset($errors) && $result): ?>
                            <div class="alert alert-success">Письмо отправлено</div>
                        <?php endif;?>

                        <form action="#" method="post">
                            <input type="email"    name="email"    placeholder="Email Address" value="<?php echo $email;?>"
                                   required/>
                            <textarea name="message"  cols="60" rows="5" placeholder="Enter your message"><?php echo $message;?></textarea>
                            <br>
                            <br>
                            <input type="submit" name="submit" class="btn btn-default" value="Отправить письмо"/>
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