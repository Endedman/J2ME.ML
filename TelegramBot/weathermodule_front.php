<?php
$wthr = file_get_contents('https://api.openweathermap.org/data/2.5/weather?lat=59.93428&lon=30.18&appid=7ae1fa5a576d279da31a474fdc41c036&units=metric');
$decoded_wthr = json_decode($wthr, true);
$main = $decoded_wthr['main'];
$weather = $decoded_wthr['weather'];
echo "\n<br>Температура: <font class='temp'>" . $main['temp'] . "</font> градусов<br>";
foreach($weather as $wth) {
}
if ($wth['description'] == 'clear sky') {
	echo '<img src="//j2me.ml/images/sunny.png" align="center" /><br>Безоблачно';
} else if ($wth['description'] == 'few clouds') {
	echo '<img src="//j2me.ml/images/few_clouds.png" align="center" /><br>Малооблачно';
} else if ($wth['description'] == 'scattered clouds') {
	echo '<img src="//j2me.ml/images/scattered_clouds.png" align="center" /><br>Облачно';
} else if ($wth['description'] == 'broken clouds') {
	echo '<img src="//j2me.ml/images/broken_clouds.png" align="center" /><br>Сильная облачность';
} else if ($wth['description'] == 'overcast clouds') {
	echo '<img src="//j2me.ml/images/broken_clouds.png" align="center" /><br>Пасмурная облачность';
} else if ($wth['description'] == 'light intensity shower rain') {
	echo '<img src="//j2me.ml/images/snower_rain.png" align="center" /><br>Сильный дождь*';
} else if ($wth['description'] == 'shower rain') {
	echo '<img src="//j2me.ml/images/snower_rain.png" align="center" /><br>Сильный дождь*';
} else if ($wth['description'] == 'rain') {
	echo '<img src="//j2me.ml/images/rain.png" align="center" /><br>Обычный дождь';
} else if ($wth['description'] == 'light rain') {
	echo '<img src="//j2me.ml/images/rain.png" align="center" /><br>Легкий дождь';
} else if ($wth['description'] == 'thundershorm') {
	echo '<img src="//j2me.ml/images/thunderstorm.png" align="center" /><br>Гроза';
} else if ($wth['description'] == 'snow') {
	echo '<img src="//j2me.ml/images/snow.png" align="center" /><br>Снег';
} else if ($wth['description'] == 'mist') {
	echo '<img src="//j2me.ml/images/mist.png" align="center" /><br>Туманно';
}
if ($wth['description'] == 'clear sky') {
	echo '<img src="//j2me.ml/images/sunny.png" align="center" /><br>Безоблачно';
} else if ($wth['description'] == 'few clouds') {
	echo '<img src="//j2me.ml/images/few_clouds.png" align="center" /><br>Малооблачно';
} else if ($wth['description'] == 'scattered clouds') {
	echo '<img src="//j2me.ml/images/scattered_clouds.png" align="center" /><br>Облачно';
} else if ($wth['description'] == 'broken clouds') {
	echo '<img src="//j2me.ml/images/broken_clouds.png" align="center" /><br>Сильная облачность';
} else if ($wth['description'] == 'overcast clouds') {
	echo '<img src="//j2me.ml/images/broken_clouds.png" align="center" /><br>Пасмурная облачность';
} else if ($wth['description'] == 'shower rain') {
	echo '<img src="//j2me.ml/images/snower_rain.png" align="center" /><br>Сильный дождь*';
} else if ($wth['description'] == 'heavy intensity shower rain') {
	echo '<img src="//j2me.ml/images/snower_rain.png" align="center" /><br>Сильный дождь*';	
} else if ($wth['description'] == 'ragged shower rain') {
	echo '<img src="//j2me.ml/images/snower_rain.png" align="center" /><br>Сильный дождь*';	
} else if ($wth['description'] == 'light intensity drizzle') {
	echo '<img src="//j2me.ml/images/snower_rain.png" align="center" /><br>Сильный дождь*';
} else if ($wth['description'] == 'drizzle') {
	echo '<img src="//j2me.ml/images/snower_rain.png" align="center" /><br>Сильный дождь*';
} else if ($wth['description'] == 'heavy intensity drizzle') {
	echo '<img src="//j2me.ml/images/snower_rain.png" align="center" /><br>Сильный дождь*';
} else if ($wth['description'] == 'light intensity drizzle rain') {
	echo '<img src="//j2me.ml/images/snower_rain.png" align="center" /><br>Сильный дождь*';
} else if ($wth['description'] == 'drizzle rain') {
	echo '<img src="//j2me.ml/images/snower_rain.png" align="center" /><br>Сильный дождь*';
} else if ($wth['description'] == 'heavy intensity drizzle rain') {
	echo '<img src="//j2me.ml/images/snower_rain.png" align="center" /><br>Сильный дождь*';
} else if ($wth['description'] == 'shower rain and drizzle') {
	echo '<img src="//j2me.ml/images/snower_rain.png" align="center" /><br>Сильный дождь*';
} else if ($wth['description'] == 'heavy shower rain and drizzle') {
	echo '<img src="//j2me.ml/images/snower_rain.png" align="center" /><br>Сильный дождь*';
} else if ($wth['description'] == 'shower drizzle') {
	echo '<img src="//j2me.ml/images/snower_rain.png" align="center" /><br>Сильный дождь*';
} else if ($wth['description'] == 'light intensity shower rain') {
/* 	echo '<img src="//j2me.ml/images/snower_rain.png" align="center" /><br>Сильный дождь*'; */
} else if ($wth['description'] == 'rain') {
	echo '<img src="//j2me.ml/images/rain.png" align="center" /><br>Обычный дождь';
} else if ($wth['description'] == 'light rain') {
	echo '<img src="//j2me.ml/images/rain.png" align="center" /><br>Обычный дождь';
} else if ($wth['description'] == 'moderate rain') {
	echo '<img src="//j2me.ml/images/rain.png" align="center" /><br>Обычный дождь';
} else if ($wth['description'] == 'heavy intensity rain') {
	echo '<img src="//j2me.ml/images/rain.png" align="center" /><br>Обычный дождь';
} else if ($wth['description'] == 'very heavy rain') {
	echo '<img src="//j2me.ml/images/rain.png" align="center" /><br>Обычный дождь';
} else if ($wth['description'] == 'extreme rain') {
	echo '<img src="//j2me.ml/images/rain.png" align="center" /><br>Обычный дождь';
} else if ($wth['description'] == 'light rain') {
	echo '<img src="//j2me.ml/images/rain.png" align="center" /><br>Обычный дождь';
} else if ($wth['description'] == 'thundershorm') {
	echo '<img src="//j2me.ml/images/thunderstorm.png" align="center" /><br>Гроза';
} else if ($wth['description'] == 'thunderstorm with light rain') {
	echo '<img src="//j2me.ml/images/thunderstorm.png" align="center" /><br>Гроза';
} else if ($wth['description'] == 'thunderstorm with rain') {
	echo '<img src="//j2me.ml/images/thunderstorm.png" align="center" /><br>Гроза';
} else if ($wth['description'] == 'thunderstorm with heavy rain') {
	echo '<img src="//j2me.ml/images/thunderstorm.png" align="center" /><br>Гроза';
} else if ($wth['description'] == 'light thunderstorm') {
	echo '<img src="//j2me.ml/images/thunderstorm.png" align="center" /><br>Гроза';
} else if ($wth['description'] == 'heavy thunderstorm') {
	echo '<img src="//j2me.ml/images/thunderstorm.png" align="center" /><br>Гроза';
} else if ($wth['description'] == 'ragged thunderstorm') {
	echo '<img src="//j2me.ml/images/thunderstorm.png" align="center" /><br>Гроза';
} else if ($wth['description'] == 'thunderstorm with light drizzle') {
	echo '<img src="//j2me.ml/images/thunderstorm.png" align="center" /><br>Гроза';
} else if ($wth['description'] == 'thunderstorm with drizzle') {
	echo '<img src="//j2me.ml/images/thunderstorm.png" align="center" /><br>Гроза';
} else if ($wth['description'] == 'thunderstorm with heavy drizzle') {
	echo '<img src="//j2me.ml/images/thunderstorm.png" align="center" /><br>Гроза';
} else if ($wth['description'] == 'snow') {
	echo '<img src="//j2me.ml/images/snow.png" align="center" /><br>Снег';
} else if ($wth['description'] == 'light snow') {
	echo '<img src="//j2me.ml/images/snow.png" align="center" /><br>Снег';
} else if ($wth['description'] == 'heavy snow') {
	echo '<img src="//j2me.ml/images/snow.png" align="center" /><br>Снег';
} else if ($wth['description'] == 'sleet') {
	echo '<img src="//j2me.ml/images/snow.png" align="center" /><br>Снег';
} else if ($wth['description'] == 'light shower sleet') {
	echo '<img src="//j2me.ml/images/snow.png" align="center" /><br>Снег';
} else if ($wth['description'] == 'shower sleet') {
	echo '<img src="//j2me.ml/images/snow.png" align="center" /><br>Снег';
} else if ($wth['description'] == 'light rain and snow') {
	echo '<img src="//j2me.ml/images/snow.png" align="center" /><br>Снег';
} else if ($wth['description'] == 'rain and snow') {
	echo '<img src="//j2me.ml/images/snow.png" align="center" /><br>Снег';
} else if ($wth['description'] == 'light shower snow') {
	echo '<img src="//j2me.ml/images/snow.png" align="center" /><br>Снег';
} else if ($wth['description'] == 'heavy shower snow') {
	echo '<img src="//j2me.ml/images/snow.png" align="center" /><br>Снег';
} else if ($wth['description'] == 'shower snow') {
	echo '<img src="//j2me.ml/images/snow.png" align="center" /><br>Снег';
} else if ($wth['description'] == 'freeze rain') {
	echo '<img src="//j2me.ml/images/snow.png" align="center" /><br>Снег';
} else if ($wth['description'] == 'mist') {
	echo '<img src="//j2me.ml/images/mist.png" align="center" /><br>Туманно';
}
/* echo "\n<br>Состояние: " . $weather_d['description'] . " -<br>"; */
?>