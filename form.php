
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>PHP - Загрузка файлов на сервер своими руками</title>
        <style>
            #wrap{
                width:400px;
                height:100%;
                display:block;
                margin:0 auto;
            }
            h2{
                text-align:center;
            }
        </style>
    </head>
    <body>
        <div id="wrap">
            <h2>Демо: Загрузка файлов на сервер</h2>
            <form enctype="multipart/form-data" method="post" action="upload.php">
                <p>Загрузите ваши фотографии на сервер</p>
                <p><input type="file" name="files">
                <input type="submit" value="Отправить" name="upload"></p>
            </form>
        </div>
    </body>
</html>