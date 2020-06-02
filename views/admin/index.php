<?php require_once ROOT. '/views/layouts/header_admin.php';?>


    <div class="container">
        <div class="row">
            <br>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="active">Админпанель</li>
                </ol>
            </div>

            <h2 style="color: #FE980F;">Привет, Администратор.</h2>
            <br>
            <br>
            <p><a href="/admin/product">Управление товарами</a></p>
            <p><a href="/admin/category">Управление категориями</a></p>
            <p><a href="/admin/order">Управление заказами</a></p>
            <p><a href="/admin/blog">Управление блогом</a></p>
            <br>
            <p><a href="/cabinet/">Вернуться в кабинет</a></p>
        </div>

    </div>


<?php require_once ROOT. '/views/layouts/footer.php';?>