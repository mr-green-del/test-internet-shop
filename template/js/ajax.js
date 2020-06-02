window.onload = function()
{
    addToCart();
    deleteFromCart();
};


function addToCart()
{
    addToCart = document.getElementsByClassName('addToCart');

    for(let i = 0; i < addToCart.length; i++)
    {
        addToCart[i].onclick = function()
        {
            ajaxRequest('/cart/addAjax/'+addToCart[i].id);
        };
    }
}

function deleteFromCart()
{
    deletedElement = document.getElementsByClassName('deleteFromCart');

    for(let i = 0; i < deletedElement.length; i++)
    {
        if(!deletedElement[i] === undefined) break;

        deletedElement[i].onclick = function()
        {
            ajaxRequest('/cart/deleteAjax/'+deletedElement[i].id);
            deletedRow = document.getElementById('productTableId-'+deletedElement[i].id).remove();

            deleteFromCart();
        };
    }
}

/**
 * Функция для соверщения ajax запросов
 *
 * @param filePath - путь к файлу который будет обрабатывать запрос
 */
function ajaxRequest(filePath)
{
    let myRequest = new XMLHttpRequest();

    myRequest.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            myFunction(this.responseText);
        }
    };

    myRequest.open("POST", filePath);
    myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    myRequest.send();

    function myFunction(data)
    {
        // Ответ приходит ввиде формата JSON, его нужно преобразовать в обьект
        dataObj = JSON.parse(data);

        for(let key in dataObj)
        {
            /*
             * Ключи в этом обьекте - это идетнтификаторы изменяемых элементов,
             * а значения это новое значение для этих элементов
             */
            let update = document.getElementById(key);

            if(update)
            {
                update.innerHTML = dataObj[key];
            }
        }
    }
}