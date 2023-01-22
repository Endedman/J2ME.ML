
<?php
    /**
    * Скрипт загрузки файлов
    * Site: https://bezramok-tlt.ru
    * PHP загрузка файлов на сервер
    */
    
    //Устанавливаем кодировку и вывод всех ошибок
    header('Content-Type: text/html; charset=UTF-8');
    
    //Каталог загрузки картинок
    $uploadDir = 'images';
    
    //Вывод ошибок
    $err = array();
    
    //Коды ошибок загрузки файла
    $errUpload = array( 
                         0 => 'Ошибок не возникло, файл был успешно загружен на сервер. ', 
                         1 => 'Размер принятого файла превысил максимально допустимый размер, который задан директивой upload_max_filesize конфигурационного файла php.ini.', 
                         2 => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE, указанное в HTML-форме.', 
                         3 => 'Загружаемый файл был получен только частично.', 
                         4 => 'Файл не был загружен.', 
                         6 => 'Отсутствует временная папка. Добавлено в PHP 4.3.10 и PHP 5.0.3.' 
                      ); 
                      
    //Определяем типы файлов для загрузки
    $fileTypes = array(
                         'jpg' => 'image/jpeg',
                         'png' => 'image/png',
                         'jar' => 'application/octet-stream'
                        );
                        
            

    
    //Если нажата кнопка загрузить
    if(isset($_POST['upload']))
    {
        //Проверяем пустые данные или нет
        if(!empty($_FILES))
        {
            //Проверяем на ошибки
            if($_FILES['files']['error'] > 0)
                $err[] = $errUpload[$_FILES['files']['error']];
                
            //Проверям тип файла для загрузки
            if(!in_array($_FILES['files']['type'], $fileTypes))
                $err[] = 'Данный тип файла <b>'. $_FILES['files']['type'] .'</b> не подходит для загрузки!';
            
            //Если нет ошибок то грузим файл
            if(empty($err))
            {
                $type = pathinfo($_FILES['files']['name']);
                $name = $uploadDir .'/'. uniqid('files_') .'.'. $type['extension'];
                move_uploaded_file($_FILES['files']['tmp_name'],$name);
                
                //Сбрасываем POST параметры
                header('Location: http://'. $_SERVER['HTTP_HOST'] .'/jstore2/upload.php?name='. $name);
                exit;
            }
            else
                echo implode('<br>', $err);
        }

    }
    
    //Сообщение об успешной загрузке файла на сервер
    if(isset($_GET['name']))
        echo '<h1>Файл <font color="red">'. htmlentities($_GET['name']) .'</font> успешно загружен!</h1>'; 
        
    //Выводим картинки из каталога
    $imgDir = array_values(array_diff(scandir($uploadDir), array('..', '.')));
    
    for($i = 0; $i < count($imgDir); $i++)
    {
        if($i % 2 == 0)
            echo '<br>'."\n";
        
        echo '<a href="'. $uploadDir .'/'. $imgDir[$i] .'">'.$imgDir[$i].'</a>'."<br><hr>";
    }
    
    echo '<br /><br />'."\n";
    echo '<a href="http://'. $_SERVER['HTTP_HOST'] .'" 
            title="http://'. $_SERVER['HTTP_HOST'] .'">
            http://'. $_SERVER['HTTP_HOST'] .'  </a>';

?>