<?php require_once ROOT. '/views/layouts/header.php';?>

    <section>
        <div class="container">
            <div class="row">

                <?php require_once ROOT. "/views/layouts/cabinet_sections.php";?>

                <div class="col-sm-4 col-sm-offset-2 padding right">
                    <!--sign up form-->
                    <div class="signup-form">

                        <h2>Редактирование данных</h2>
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
                        <?php elseif(isset($errors) && $result): ?>
                            <div class="alert alert-success">Изменения сохранены</div>
                        <?php endif; ?>

                        <form action="#" method="post">
                            <input type="text"    name="name"    placeholder="Email Address" value="<?php echo $name;?>"
                                   />
                            <input type="email"    name="email"    placeholder="Email Address" value="<?php echo $email;?>"
                                   />
                            <input type="password" name="old_password" placeholder="Old password" value=""
                                   required/>
                            <input type="password" name="new_password" placeholder="New password"      value="<?php echo $newPassword;?>"
                                   />
                            <input type="submit"   name="submit"   class="btn btn-default"     value="Сохранить"/>
                        </form>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
        </div>
        </div>
    </section>







<?php require_once ROOT. '/views/layouts/footer.php'?>