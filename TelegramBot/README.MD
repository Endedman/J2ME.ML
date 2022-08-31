# Библиотеки и сам бот для t.me/JavaME_bot
Как пользоваться ботом:
- Идем в Google и ищем координаты вашего города (Latitude, Longitude)
- Записываем их (к примеру, широта = 59.45487 долгота = 30.46)
- openweathermap.com - регаемся и получаем API ключ.
- Составляем ссылку: https://api.openweathermap.org/data/2.5/weather?lat=59.93428&lon=30.18&appid=APIKEY&units=metric&mode=json
  - где:  
        - lat - широта  
        - lon - долгота  
        - appid - ваш API ключ  
        - units - меры измерения (градусы по Цельсию, Фаренгейту, Кельвину (не юзается))  
        - mode - метод вывода информации (не меняйте, иначе придется менять всю логику парсера)  
- меняем параметры в weathermodule.php и weathermodule_front.php на ваши (ищем строку $wthr = file_get_contents('https://api.openweathermap.org/data/2.5/weather?lat=59.93428&lon=30.18&appid=APIKEY&units=metric'); )
