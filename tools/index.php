<?php
$dbhost = 'localhost';
$dbuser = 'endedman';
$dbpass = '';
$dbname = 'jstore2';
$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$rows = "SELECT * FROM apps WHERE section='tools'";
$d = mysqli_query($link, $rows);
$row = mysqli_fetch_array($d, MYSQLI_ASSOC);
mysqli_free_result($d);
?>
<html>
<head>
	<title>Утилиты - J2ME Play</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta charset="utf-8">
</head>
<body>
	<div class="headbar">
		<div class="header">
			<ol class="headlist">
				<li class="headlinks">
					<a class="headlink" id="headlink_1" href="http://j2me.ml">
						<span class="headlink_sup"></span>
						<div class="head_nopad">
							<span class="headlink_context">Main</span>
						</div>
					</a>
				</li>
				<li class="headlinks">
					<a class="headlink" id="headlink_1" href="http://j2me.ml">
						<span class="headlink_sup selected"></span>
						<div class="head_nopad">
							<span class="headlink_context">Store</span>
						</div>
					</a>
				</li>
				<li class="headlinks">
					<a class="headlink" id="headlink_1" href="http://javame_ch.t.me">
						<span class="headlink_sup"></span>
						<div class="head_nopad">
							<span class="headlink_context">Telegram</span>
						</div>
					</a>
				</li>
			</ol>
		</div>
		<div class="head_doact">
			<ol class="headlist">
				<li class="headlinks">
					<a class="headlink" id="headlink_1" href="http://j2me.ml">
						<span class="headlink_sup"></span>
						<div class="head_nopad">
							<span class="headlink_context bold">Account management</span>
						</div>
					</a>
				</li>
				<li class="headlinks">
					<a class="headlink" id="headlink_1" href="http://j2me.ml">
						<span class="headlink_sup"></span>
						<div class="head_nopad head_nopad_icon">
							<span class="head_icon"></span>
						</div>
					</a>
				</li>
			</ol>
		</div>
	</div>
	<div class="advert-container">
		<div class="advert">
			Представляем <b>J2ME Play</b> 
			<a href="http://j2me.ml/">Больше</a>
			<div class="advert-bar-tip-container">
				<div class="advert-bar-tip"></div>
			</div>
		</div>
	</div>
	<div class="j2me-container">
		<div class="j2me">
<!-- 			<a href="http://j2me.ml/" class="play-inline-block">
				<div class="play-logo play-inline-block"></div>
			</a> -->
			<div class="search">
				<div class="search-container">
					<form action="search" method="get" id="search-box" class="search-type">
						<input id="search-text" type="text" autocomplete="off" class="form-text-box no-focus" placeholder="Search" name="q" value="" aria-haspopup="true">
						<input id="search-button" type="submit" class="no-focus search-button" tabindex="-1" value="">
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="menu-container">
		<div class="menu">
			<div class="menu-wrapper">
				<ul class="menu-bar" id="menu-bar" role="menubar" style="user-select: none;" aria-activedescendant="">
					<li class="menu-bar-button menu-bar-left highlight" id=":0" style="user-select: none;">
						<a href="http://j2me.ml/" class="menu-bar-button-link first" style="user-select: none;">Каталог приложений<span href="/" class="down-arrow" style="user-select: none;"></span>
						</a>
						<ul class="menu-bar-child j2me-menu" role="menu" aria-haspopup="true" tabindex="-1" style="user-select: none; display: none;">
							<li class="menu-bar-item" role="menuitem" id=":1" style="user-select: none;">
								<div class="menu-bar-item-content" style="user-select: none;">
									<a href="http://j2me.ml/app" style="user-select: none;">Каталог</a>
								</div>
							</li>
						</ul>
					</li>
					<li class="menu-bar-button menu-bar-right" id=":2" style="user-select: none;">
						<a href="http://j2me.ml/app/my" class="menu-bar-button-link" style="user-select: none;">Мои приложения</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="home-container">
		<div class="home">
			<table class="home-table">
				<colgroup>
					<col width="316">
					<col width="4">
					<col width="100%">
				</colgroup>
				<tbody>
					<tr>
						<td>
							<div class="tabbed-panel-header tabBar-wrapper">
								<ul id="categories" class="tabbed-panel-header-wrapper">
									<li class="tab j2me-inline-block tab-selected">
										<span class="tab-text">Категории</span>
									</li>
								</ul>
							</div>
						</td>
						<td rowspan="5" class="gutter-column"></td>
						<td>
							<div class="tabbed-panel-header tabBar-wrapper">
								<ul id="featured-lists" class="tabbed-panel-header-wrapper">
									<li class="tab j2me-inline-block tab-selected">
										<span class="tab-text">Популярное</span>
									</li>
									<li class="tab j2me-inline-block">
										<span class="tab-text">Топ платных</span>
									</li>
									<li class="tab j2me-inline-block">
										<span class="tab-text">Топ бесплатных</span>
									</li>
									<li class="tab j2me-inline-block">
										<span class="tab-text">Топ флагманских приложений</span>
									</li>
								</ul>
							</div>
						</td>
					</tr>
					<td class="content-cell" rowspan="4">
						<div id="tab-body-categories">
							<div class="tabbed-panel-tab">
								<div id="categories-tab-1" class="category-nav padded-content">
									<ul class="category-list"><li class="category-item ">
										<a href="http://j2me.ml/games">Игры</a>
										<span class="more-arrow">›</span>
										<ul class="category-sublist">
											<li class="category-subitem ">
												<a href="http://j2me.ml/arcade">Аркады</a>
												<span class="more-arrow">›</span>
											</li>
											<li class="category-subitem ">
												<a href="http://j2me.ml/casual">Казуальные</a>
												<span class="more-arrow">›</span>
											</li>
											<li class="category-subitem ">
												<a href="http://j2me.ml/wallpaper">Обои</a>
												<span class="more-arrow">›</span>
											</li>
											<li class="category-subitem ">
												<a href="http://j2me.ml/racing">Гонки</a>
												<span class="more-arrow">›</span>
											</li>
											<li class="category-subitem ">
												<a href="http://j2me.ml/widgets">Виджеты</a>
												<span class="more-arrow">›</span>
											</li>
										</ul>
									</li>
									<li class="category-item ">
										<a href="http://j2me.ml/apps">Приложения</a>
										<span class="more-arrow">›</span>
										<ul class="category-sublist">
											<li class="category-subitem ">
												<a href="http://j2me.ml/communicate">Связь с близкими</a>
												<span class="more-arrow">›</span>
											</li>
											<li class="category-subitem ">
												<a href="http://j2me.ml/media">Медиа</a>
												<span class="more-arrow">›</span>
											</li>
											<li class="category-subitem ">
												<a href="http://j2me.ml/music">Музыка</a>
												<span class="more-arrow">›</span>
											</li>
											<li class="category-subitem ">
												<a href="http://j2me.ml/perso">Персонализация</a>
												<span class="more-arrow">›</span>
											</li>
											<li class="category-subitem ">
												<a href="http://j2me.ml/photography">Фотография</a>
												<span class="more-arrow">›</span>
											</li>
											<li class="category-subitem ">
												<a href="http://j2me.ml/social">Социальные сети</a>
												<span class="more-arrow">›</span>
											</li>
											<li class="category-subitem ">
												<a href="http://j2me.ml/tools">Инструменты</a>
												<span class="more-arrow">›</span>
											</li>
											<li class="category-subitem ">
												<a href="http://j2me.ml/weather">Погода</a>
												<span class="more-arrow">›</span>
											</li>
											<li class="category-subitem ">
												<a href="http://j2me.ml/widgets">Виджеты</a>
												<span class="more-arrow">›</span>
											</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</td>
				<td class="content-cell">
					<div id="tab-body-featured-lists">
						<div class="tabbed-panel-tab">
							<div class="padded-browse-carousel" data-analyticsid="featured-apps">
								<div class="carousel-mini">
									<div class="carousel-pages">
										<div class="carousel-pages-wrapper" data-analyticsid="featured-apps">
											<div class="carousel-page">
												<div class="j2me-inline-block" style="display: flex;">
													<?
													$rows = "SELECT * FROM apps where section='tools'";
													$d = mysqli_query($link, $rows);
													while($row=mysqli_fetch_array($d))
													{	
														echo "
														
															<div class='snippet snippet-tall'>
																<div class='thumbnail-wrapper j2me-inline-block'>
																	<a href='http://j2me.ml/?id=$row[id]' class='thumbnail'>
																		<img src=$row[icon] alt=$row[app_name]>
																	</a>
																</div>
																<div class='details'>
																	<a class='title' title='$row[app_name]' href='http://j2me.ml/?id=$row[id]'>$row[app_name]</a>
																	<span class='attribution'>
																		<a href='http://j2me.ml/?dev=$row[id]'>$row[dev_name]</a>
																	</span>
																</div>
																<div class='buy-wrapper j2me-inline-block'>
																	<div class='buy-border'>
																		<a class='buy-link buy-button j2me-inline-block' href='/?id=$row[id]'>
																			<span class='buy-button-price' id='mobi.opera.mobi'>Установить</span>
																		</a>
																</div>
																</div>
															</div>
														
														";
													}
												?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<a class="carousel-more-link" href="http://j2me.ml/app/all">Еще <span class="more-arrow">›</span>
								</a>
								<div class="carousel-pagination"></div>
							</div>
						</div>
					</td>
				</tbody>
			</table>
		</div>
	</div>
	<div id="footer">
		<a class="footer-link" href="http://j2me.ml/appaccount">Аккаунт-менеджемент</a>|
		<a class="footer-link">
			<select id="user-locale">
				<option value="ru">&#x202A;Русский&#x202C;</option>
			</select>
		</a>|
		<a class="footer-link" href="http://j2me.ml/help-jstore">Помощь</a>|
	</div>
	<div id="footer-tab-edge"></div>
	<div id="sub-footer">©2022 LibreShare
		<a class="sub-footer-link" href="http://j2me.ml/rules">Условия</a>
	 	<a class="sub-footer-link" href="http://j2me.ml/policy">Политика конфиденциальности</a>
	 </div>
</body>