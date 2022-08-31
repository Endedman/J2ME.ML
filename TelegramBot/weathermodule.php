<?php
$wthr = file_get_contents('https://api.openweathermap.org/data/2.5/weather?lat=59.93428&lon=30.18&appid=APIKEY&units=metric');
$decoded_wthr = json_decode($wthr, true);
$main = $decoded_wthr['main'];
$weather = $decoded_wthr['weather'];
foreach($weather as $wth) {
}
echo "\nТемпература: " . $main['temp'] . " градусов\n";
if ($wth['description'] == 'clear sky') {
	echo '☀️Безоблачно';
} else if ($wth['description'] == 'few clouds') {
	echo '⛅️Малооблачно';
} else if ($wth['description'] == 'scattered clouds') {
	echo '☁️Облачно';
} else if ($wth['description'] == 'broken clouds') {
	echo '☁️Сильная облачность';
} else if ($wth['description'] == 'overcast clouds') {
	echo '☁️Пасмурная облачность';
} else if ($wth['description'] == 'shower rain') {
	echo '🌧Сильный дождь*';
} else if ($wth['description'] == 'heavy intensity shower rain') {
	echo '🌧Сильный дождь*';	
} else if ($wth['description'] == 'ragged shower rain') {
	echo '🌧Сильный дождь*';	
} else if ($wth['description'] == 'light intensity drizzle') {
	echo '🌧Сильный дождь*';
} else if ($wth['description'] == 'drizzle') {
	echo '🌧Сильный дождь*';
} else if ($wth['description'] == 'heavy intensity drizzle') {
	echo '🌧Сильный дождь*';
} else if ($wth['description'] == 'light intensity drizzle rain') {
	echo '🌧Сильный дождь*';
} else if ($wth['description'] == 'drizzle rain') {
	echo '🌧Сильный дождь*';
} else if ($wth['description'] == 'heavy intensity drizzle rain') {
	echo '🌧Сильный дождь*';
} else if ($wth['description'] == 'shower rain and drizzle') {
	echo '🌧Сильный дождь*';
} else if ($wth['description'] == 'heavy shower rain and drizzle') {
	echo '🌧Сильный дождь*';
} else if ($wth['description'] == 'shower drizzle') {
	echo '🌧Сильный дождь*';
} else if ($wth['description'] == 'light intensity shower rain') {
	echo '🌧Сильный дождь*';
} else if ($wth['description'] == 'rain') {
	echo '🌧Обычный дождь';
} else if ($wth['description'] == 'light rain') {
	echo '🌧Обычный дождь';
} else if ($wth['description'] == 'moderate rain') {
	echo '🌧Обычный дождь';
} else if ($wth['description'] == 'heavy intensity rain') {
	echo '🌧Обычный дождь';
} else if ($wth['description'] == 'very heavy rain') {
	echo '🌧Обычный дождь';
} else if ($wth['description'] == 'extreme rain') {
	echo '🌧Обычный дождь';
} else if ($wth['description'] == 'light rain') {
	echo '🌦Легкий дождь';
} else if ($wth['description'] == 'thundershorm') {
	echo '⛈Гроза';
} else if ($wth['description'] == 'thunderstorm with light rain') {
	echo '⛈Гроза';
} else if ($wth['description'] == 'thunderstorm with rain') {
	echo '⛈Гроза';
} else if ($wth['description'] == 'thunderstorm with heavy rain') {
	echo '⛈Гроза';
} else if ($wth['description'] == 'light thunderstorm') {
	echo '⛈Гроза';
} else if ($wth['description'] == 'heavy thunderstorm') {
	echo '⛈Гроза';
} else if ($wth['description'] == 'ragged thunderstorm') {
	echo '⛈Гроза';
} else if ($wth['description'] == 'thunderstorm with light drizzle') {
	echo '⛈Гроза';
} else if ($wth['description'] == 'thunderstorm with drizzle') {
	echo '⛈Гроза';
} else if ($wth['description'] == 'thunderstorm with heavy drizzle') {
	echo '⛈Гроза';
} else if ($wth['description'] == 'snow') {
	echo '❄️Снег';
} else if ($wth['description'] == 'light snow') {
	echo '❄️Снег';
} else if ($wth['description'] == 'heavy snow') {
	echo '❄️Снег';
} else if ($wth['description'] == 'sleet') {
	echo '❄️Снег';
} else if ($wth['description'] == 'light shower sleet') {
	echo '❄️Снег';
} else if ($wth['description'] == 'shower sleet') {
	echo '❄️Снег';
} else if ($wth['description'] == 'light rain and snow') {
	echo '❄️Снег';
} else if ($wth['description'] == 'rain and snow') {
	echo '❄️Снег';
} else if ($wth['description'] == 'light shower snow') {
	echo '❄️Снег';
} else if ($wth['description'] == 'heavy shower snow') {
	echo '❄️Снег';
} else if ($wth['description'] == 'shower snow') {
	echo '❄️Снег';
} else if ($wth['description'] == 'freeze rain') {
	echo '❄️Снег';
} else if ($wth['description'] == 'mist') {
	echo '🌁Туманно';
}
/* echo "\nКак чувствуется (версия OpenWeather): " . $main['feels_like'] . " градусов";
echo "\nМинимальная температура: " . $main['temp_min'] . " градусов";
echo "\nМаксимальная температура: " . $main['temp_max'] . " градусов";
echo "\nВлажность: " . $main['humidity'] . " процентов";
echo "\nДавление: " . $main['pressure'] . " мм рт ст";
echo "\nhttps://api.openweathermap.org/data/2.5/weather?lat=59.93428&lon=30.18"; */
?>
