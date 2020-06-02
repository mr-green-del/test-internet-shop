<?php require_once ROOT. '/views/layouts/header_admin.php';?>

    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4" style="">
                <form action="#" method="post">
                    <h4>Вы действительно хотите удалить эту категорию?</h4>
                    <div class="">
                        <button name="submit" class="btn bt-default btn-danger">Да</button>
                        <a href="/admin/category" class="btn bt-default btn-success">Нет</a>
                    </div>

                </form>
            </div>

        </div>
    </div>

<?php require_once ROOT. '/views/layouts/footer.php';?>
