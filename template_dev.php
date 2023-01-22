<?php
$dbhost = 'localhost';
$dbuser = 'admin_default';
$dbpass = '';
$dbname = 'admin_default';
$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$dev=$_GET['dev'];
$rows = "SELECT * FROM devs WHERE id='$dev'";
$d = mysqli_query($link, $rows);
$row = mysqli_fetch_array($d, MYSQLI_ASSOC);
mysqli_free_result($d);

?>
<head>
	<title>J2ME Play</title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
	<meta charset="utf-8">
</head>
<body>
	<div class="headbar">
		<div class="header">
			<ol class="headlist">
				<li class="headlinks">
					<a class="headlink" id="headlink_1" href="http://168.119.140.238:40693">
						<span class="headlink_sup"></span>
						<div class="head_nopad">
							<span class="headlink_context">Main</span>
						</div>
					</a>
				</li>
				<li class="headlinks">
					<a class="headlink" id="headlink_1" href="http://168.119.140.238:40693">
						<span class="headlink_sup selected"></span>
						<div class="head_nopad">
							<span class="headlink_context">Store</span>
						</div>
					</a>
				</li>
				<li class="headlinks">
					<a class="headlink" id="headlink_1" href="http://168.119.140.238:40693">
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
					<a class="headlink" id="headlink_1" href="http://168.119.140.238:40693">
						<span class="headlink_sup"></span>
						<div class="head_nopad">
							<span class="headlink_context bold">Account management</span>
						</div>
					</a>
				</li>
				<li class="headlinks">
					<a class="headlink" id="headlink_1" href="http://168.119.140.238:40693">
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
			<a href="http://168.119.140.238:40693/">Больше</a>
			<div class="advert-bar-tip-container">
				<div class="advert-bar-tip"></div>
			</div>
		</div>
	</div>
	<div class="j2me-container">
		<div class="j2me">
<!-- 			<a href="http://168.119.140.238:40693/" class="play-inline-block">
				<div class="play-logo play-inline-block"></div>
			</a> -->
			<div class="search">
				<div class="search-container">
					<form action="search" method="get" id="search-box" class="search-type">
						<input id="search-text" type="text" autocomplete="off" class="form-text-box no-focus" placeholder="Search" name="search" value="" aria-haspopup="true">
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
						<a href="http://168.119.140.238:40693/" class="menu-bar-button-link first" style="user-select: none;">Каталог приложений<span href="/" class="down-arrow" style="user-select: none;"></span>
						</a>
						<ul class="menu-bar-child j2me-menu" role="menu" aria-haspopup="true" tabindex="-1" style="user-select: none; display: none;">
							<li class="menu-bar-item" role="menuitem" id=":1" style="user-select: none;">
								<div class="menu-bar-item-content" style="user-select: none;">
									<a href="http://168.119.140.238:40693/app" style="user-select: none;">Каталог</a>
								</div>
							</li>
						</ul>
					</li>
					<li class="menu-bar-button menu-bar-right" id=":2" style="user-select: none;">
						<a href="http://168.119.140.238:40693/app/my" class="menu-bar-button-link" style="user-select: none;">Мои приложения</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="frontend-app-block-container">
		<div class="frontend-app-block">
			<table class="layout-table">
				<colgroup>
					<col width="316">
					<col width="4">
					<col width="100%">
				</colgroup>
				<tbody>
					<tr>
						<td>
							<div class="doc-banner-container-header">
								<div class="page-banner-heading"></div>
								<div class="doc-banner-container">
									<table class="doc-banner-table">
										<tbody>
											<tr>
												<td class="doc-banner-title-container">
													<h1 class="doc-banner-title"><? print ($row["dev_name"]); ?></h1>
													<a href="http://168.119.140.238:40693?dev=<?php $row['dev_name'] ?>" class="doc-header-link"><? print ($row["dev_name"]); ?></a>
												</td>
											</tr>
										</tbody>
									</table>
									<table style="table-layout: fixed;">
										<tbody>
											<tr>
												<td style="width: 134px;">
													<div class="doc-banner-icon">
														<img src="<? print ($row["icon"]); ?>">
													</div>
												</td>
												<td class="doc-details-ratings-price" style="width: 222px;">
													<div class="" style=" display: flex;">
														<div class="ratings goog-inline-block" title="4,1 stars">
															<div class="goog-inline-block star SPRITE_star_on_dark"></div>
															<div class="goog-inline-block star SPRITE_star_on_dark"></div>
															<div class="goog-inline-block star SPRITE_star_on_dark"></div>
															<div class="goog-inline-block star SPRITE_star_on_dark"></div>
															<div class="goog-inline-block star SPRITE_star_off_dark"></div>
														</div><div class="goog-inline-block counter"><? print ($row["votes"]); ?></div>
													</div>
													<!-- <div class="buy-wrapper-container">
														<div class="buy-wrapper  buy-button-large">
															<div class="buy-border">
																<a class="buy-link buy-button goog-inline-block" href="<? print ($row["file"]); ?>">
																	<span class="buy-button-price">Установить<sup>Free</sup></span>
																	<span class="buy-offer default-offer" style="display: none;"></span>
																</a>
															</div>
														</div>
													</div> -->
												</td>
											</tr>
										</tbody>
									</table>
									<div class="clear"></div>
								</div>
							</div>
						</td>
						<td rowspan="4" class="gutter-column"></td>
						<td style="height: 348px;">
							<div class="doc-banner-image-container">
								<img src="<? print ($row["banner"]); ?>" alt="<? print ($row["dev_name"]); ?>" width="705">
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div id="footer">
		<a class="footer-link" href="http://168.119.140.238:40693/appaccount">Аккаунт-менеджемент</a>|
		<a class="footer-link">
			<select id="user-locale">
				<option value="en">&#x202A;Русский&#x202C;</option>
			</select>
		</a>|
		<a class="footer-link" href="http://168.119.140.238:40693/help-jstore">Помощь</a>|
		<br><br><img src="get-it-btn.png" width="230px"><br><br>
	</div>
	<div id="footer-tab-edge"></div>
	<div id="sub-footer">©2022 LibreShare
		<a class="sub-footer-link" href="http://168.119.140.238:40693/rules">Условия</a>
	 	<a class="sub-footer-link" href="http://168.119.140.238:40693/policy">Политика конфиденциальность</a>
	 	<a class="sub-footer-link" href="#">Yet Another Instance of LibrePlay</a>
	 </div>
</body>