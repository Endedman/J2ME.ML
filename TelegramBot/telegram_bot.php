<?php
error_reporting(0);
header('HTTP/1.0','404');
echo('эй, пошли отсюда!');
$data = json_decode(file_get_contents('php://input'), TRUE);
//пишем в файл лог сообщений
file_put_contents('file.txt', '$data: '.print_r($data, 1)."\n", FILE_APPEND);


$data = $data['callback_query'] ? $data['callback_query'] : $data['message'];
error_reporting(0);
$link = mysqli_connect("localhost", "j2me-tiers", "9X8q9D6r", "j2me_tier1");
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_errno() . mysqli_connect_error());
}
else {
    print("Соединение установлено успешно");
}
define('TOKEN', '5486082519:AAFxX9wJPn8BTq4RPoCuM9w45-_dQ1YorzQ');

$message = mb_strtolower(($data['text'] ? $data['text'] : $data['data']),'utf-8');


switch ($message) {
    case 'меню':
       $method = 'sendMessage';
		$send_data = [
			'text' => 'Меню',
			'reply_markup'  => [
				'resize_keyboard' => true,
				'replykeyboardremove' => true,
				'keyboard' => [
						[
							['text' => 'Наш сайт'],
							['text' => 'Администраторы'],
							['text' => 'Контакты'],
						],
						[
							['text' => 'Нововведения'],
							['text' => 'FAQ'],
                            ['text' => 'Пинг'],
						],
						[
                            ['text' => 'Кто пидор'],
							['text' => '🔙Назад'],
						],
					],
					"one_time_keyboard" => true 
				]
			];
    break;
    case '/help':
        $method = 'sendMessage';
		$send_data = [
			'text' => 'Меню',
			'reply_markup'  => [
				'resize_keyboard' => true,
				'replykeyboardremove' => true,
				'keyboard' => [
						[
							['text' => 'Наш сайт'],
							['text' => 'Администраторы'],
							['text' => 'Контакты'],
						],
						[
							['text' => 'Нововведения'],
							['text' => 'FAQ'],
                            				['text' => 'Пинг'],
						],
                        [
                            ['text' => 'Кто пидор'],
							['text' => '🔙Назад'],
						]
					],
					"one_time_keyboard" => true
				]
			];
    break;
    case '/start':
		$method = 'sendMessage';
		$send_data = [
			'text' => "Добро пожаловать в бота!\nМы предлагаем вам очень мало функций,\nно они есть!\nУслуги хостинга бота предоставляет renahost.ru",
			'reply_markup'  => [
				'resize_keyboard' => true,
				'replykeyboardremove' => true,
				'keyboard' => [
						[
							['text' => 'Меню'],
							['text' => 'Новости'],
							['text' => 'Политика конфиденциальности'],
						],
                        			[
							['text' => 'О системе'],
                        			]
					],
					"one_time_keyboard" => true
				]
			];
    break;
    case '/launch':
		$method = 'sendMessage';
		$send_data = [
			'text' => "Добро пожаловать в бота!\nМы предлагаем вам очень мало функций,\nно они есть!\nУслуги хостинга бота предоставляет renahost.ru",
			'reply_markup'  => [
				'resize_keyboard' => true,
				'replykeyboardremove' => true,
				'keyboard' => [
						[
							['text' => 'Меню'],
							['text' => 'Новости'],
							['text' => 'Политика конфиденциальности'],
						],
                        [
							['text' => 'О системе'],
                        ]
					],
					"one_time_keyboard" => true
				]
			];
    break;
	case 'test_image':
		$method = 'sendPhoto';
		$send_data = [
			'photo' => "http://j2me.ml/images/logo.png",
			];
	break;
	case 'новости':
        $method = 'sendMessage';
		$send_data = ['text' => "2022-08-12 - создание бота\n2022-08-15 - первая DDoS - атака на инфраструктуру J2ME PR LLC\n 2022-08-16-17 - Масштабная ДДОС-атака с трафиком 500Гбит/с\n 2022-08-18 - Установлен КФ\n2022-08-20 Все атаки прекратились"];
    break;
	case 'наш сайт':
        $method = 'sendMessage';
		$send_data = ['text' => 'http://j2me.ml'];
    break;
	case 'администраторы':
        $method = 'sendMessage';
		$send_data = ['text' => "@bza69299 - верстка сайта\n@endedman - администратор\n@symbian9 - дизайнер\n@id155 - хостер"];
    break;
	case 'контакты':
        $method = 'sendMessage';
        $parce_mode = 'markdown';
		$send_data = ['text' => "-------------\n@symbian9\n__KICQ:__ 362703\nemail: vano.dj(at)list.ru\n-------------\n@endedman\nKICQ: 280812739\nemail: hellendedman(at)gmail.com/internet.ru\n-------------\n@bza69299\nKICQ: \nemail: \n-------------\n@id155\nKICQ: \nemail: celestora(at)nuke.moscow"];
    break;
	case 'нововведения':
        $method = 'sendMessage';
		$send_data = ['text' => "2022-08-12\nТеперь есть телеграм-бот"];
    break;
	case 'faq':
        $method = 'sendMessage';
		$send_data = ['text' => "Почему у меня SSL_PROTOCOL_ERROR?\nВаш браузер несовместим с сайтом.Обновите его до последней возможной версии.\nБот откликается слишком долго! Что делать?\nОбратитесь к ```@endedman```\nЕще: http://j2me-chat.66ghz.com/ticket-frame"];
    break;
	case '/adminping':
        //пишем в файл лог сообщений
        file_put_contents('tester.txt', "User executed shell command.\n", FILE_APPEND);
        $method = 'sendMessage';
        $ping = shell_exec('timeout 0.1s ping j2me.ml');
        $send_data = ['text' => "Внимание, команда выполняется от рута. Вы можете повредить систему // Warn: you execute the command from root. You can destroy OS!\n".print_r($ping, 1)."\n"];
        $ping = 0;
    break;
	case '/adminuptime':
        //пишем в файл лог сообщений
        file_put_contents('tester.txt', "Внимание, команда выполняется от рута. Вы можете повредить систему // Warn: you execute the command from root. You can destroy OS!\n", FILE_APPEND);
        $method = 'sendMessage';
        $up = shell_exec('timeout 0.1s uptime');
        $send_data = ['text' => "Внимание, команда выполняется от рута. Вы можете повредить систему // Warn: you execute the command from root. You can destroy OS!\n".print_r($up, 1)."\n"];
        $up = 0;
    break;
	case '/admindf':
        //пишем в файл лог сообщений
        file_put_contents('tester.txt', "Внимание, команда выполняется от рута. Вы можете повредить систему // Warn: you execute the command from root. You can destroy OS!\n", FILE_APPEND);
        $method = 'sendMessage';
        $df = shell_exec('timeout 1s df -h');
        $send_data = ['text' => "Внимание, команда выполняется от рута. Вы можете повредить систему // Warn: you execute the command from root. You can destroy OS!\n".print_r($df, 1)."\n"];
        $df = 0;
    break;
	case 'политика конфиденциальности':
        $method = 'sendMessage';
		$send_data = ['text' => "Мы обещаем сохранность ваших данных и обязуемся <i>не передавать</i> их"];
    break;
	case 'пинг':
        $method = 'sendMessage';
		$send_data = ['text' => "ПОНГ\nКак правило, бот реагирует сразу же, если не так, обратитесь к администраторам."];
    break;
	case 'о системе':
        $method = 'sendMessage';
		$send_data = [
			'text' => "О системе",
			'reply_markup'  => [
			'replykeyboardremove' => true,
				'resize_keyboard' => true,
				'keyboard' => [
						[
							['text' => 'Общее'],
							['text' => 'Сертификат'],
							['text' => 'Политика конфиденциальности'],
						],
                        [
							['text' => '🔙Назад'],
						]
					],
					"one_time_keyboard" => true
				]
			];
    break;
	case 'общее':
        $method = 'sendMessage';
		$send_data = ['text' => "\nJ2ME bot 95\nOS: CentOS 7 core 5.4\nКонтролируется ISPManager \nАптайм:".print_r($up, 1)."\n"];
    break;
	case 'сертификат':
        $method = 'sendMessage';
		$send_data = ['text' => "Сертификат просрочится в Ноябрь, 10, 2022г"];
    break;
    case '🔙назад':
        $method = 'sendMessage';
        $send_data = [
			'text' => "Добро пожаловать в бота!\nМы предлагаем вам очень мало функций,\nно они есть!\nУслуги хостинга бота предоставляет renahost.ru",
			'reply_markup'  => [
				'resize_keyboard' => true,
				'replykeyboardremove' => true,
				'keyboard' => [
						[
							['text' => 'Меню'],
							['text' => 'Новости'],
							['text' => 'Политика конфиденциальности'],
						],
                        [
							['text' => 'О системе'],
							['text' => 'Кто же нас дудосил'],
                        ]
					],
					"one_time_keyboard" => true
				]
			];
    break;
//	default:
//		$method = 'sendMessage';
//		$send_data = [
//			'text' => "Добро пожаловать в бота!\nМы предлагаем вам очень мало функций,\nно они есть!",
//			'reply_markup'  => [
//				'resize_keyboard' => true,
//				'keyboard' => [
//						[
//							['text' => 'Меню'],
//							['text' => 'Новости'],
//						]
//					]
//				]
//			];
    case 'браки':
        $method = 'sendMessage';
        $send_data = [
			'text' => "Разрабатываем, ожидайте",
			'reply_markup'  => [
				'resize_keyboard' => true,
				'replykeyboardremove' => true,
				'keyboard' => [
						[
							['text' => 'Взять кого-то в брак'],
							['text' => 'С кем вы в браке'],
							['text' => 'Ваш Профиль'],
						],
                        [
							['text' => 'О программе Браки'],
                        ]
					],
					"one_time_keyboard" => true
				]
			];
    break;
	case 'о программе браки':
        $method = 'sendMessage';
		$descr = file_get_contents('http://j2me.ml/bot/mysqli.php');
		$send_data = ['text' => "Внимание, команда выполняется от рута. Вы можете повредить систему // Warn: you execute the command from root. You can destroy OS!\n". print_r($descr, 1)."\n"];
    break;
	case 'мне повезет':
        $method = 'sendMessage';
		$cube = rand(1,6);
		$send_data = ['text' => "Кубик - ваше число: \n". print_r($cube, 1)."\n"];
    break;
	case '':
        $method = 'sendMessage';
		$cube = rand(1,6);
		$send_data = ['text' => "Кубик - ваше число: \n". print_r($cube, 1)."\n"];
    break;
	case 'вступил(а) в группу':
        $method = 'sendMessage';
		$send_data = ['text' => "Новый чел пришел на пати. Поприветствуйте его!\n"];
    break;
	case 'теперь в группе':
        $method = 'sendMessage';
		$send_data = ['text' => "Человек вернулся обратно!\n"];
    break;
	case 'погода':
        $method = 'sendMessage';
		$weatherecho = file_get_contents('http://j2me.ml/bot/weathermodule.php');
		$send_data = ['text' => "Погода - СПб \n". print_r($weatherecho, 1)."\n"];
    break;
	case 'кто же нас дудосил':
        $method = 'sendMessage';
		$send_data = ['text' => "Овердорд!\nФИО: Кондрашов Данила Валерьевич\nДень рождения: 10.02.2004\nТелефон: +79098346159\nEmail: kondrashovdanila1@gmail.com"];
    break;
}

$send_data['chat_id'] = $data['chat'] ['id'];

$res = sendTelegram($method, $send_data);


function sendTelegram($method, $data, $headers = [])
{
	$curl = curl_init();
	curl_setopt_array($curl, [
		CURLOPT_POST => 1,
		CURLOPT_HEADER => 0,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => 'https://api.telegram.org/bot' . TOKEN . '/' . $method,
		CURLOPT_POSTFIELDS => json_encode($data),
		CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"))
	]);
	$result = curl_exec($curl);
	curl_close($curl);
	return (json_decode($result, 1) ? json_decode($result, 1) : $result);
}

?>
<html>
<head>
<style>
body {
background-image: url('screamer.jpg');
background-size: 100vw 100vh;
position: relative;
}
audio {
display: block;
}
.rar_warn {
width: 400px;
height: 200px;
background: #ccc;
position: absolute;
top: 50vh;
left: 50vw;
}
</style>
</head>
<body>
   <audio autoplay loop controls>
    <source src="winrar.ogg" type='audio/ogg; codecs=vorbis'>
   </audio>
<div class="rar_warn">
Внимание: установите разрешение на: "Звук: Разрешить!!!"
Копирайт <h2>Mamkin_Xakep</h2>
</div>
</body>
</html>
