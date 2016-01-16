<?php
/*
=============================================================================
DLE-Faker
=============================================================================
Автор:   ПафНутиЙ
URL:     http://pafnuty.name/
twitter: https://twitter.com/pafnuty_name
google+: http://gplus.to/pafnuty
email:   pafnuty10@gmail.com
=============================================================================
 */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (!defined('DATALIFEENGINE') || !defined('LOGGED_IN')) {
	die('Hacking attempt!');
}

if (!$user_group[$member_id['user_group']]['admin_addnews']) {
	msg("error", $lang['index_denied'], $lang['index_denied']);
}

echoheader('<i class="icon-coffee"></i> DLE-Faker', 'Модуль для заполнения БД тестовыми данными');

?>
<style>
	.faker-number,
	.faker-medium {
		width: 60px;
		margin-right: 10px;
	}
	.faker-medium {
		width: 80px;
	}
	.faker-form-group {
		border-bottom: solid 1px #d5d5d5;
		padding-bottom: 15px;
		font-size: 14px;
	}
	.faker-form-group:last-child {
		border-bottom: 0;
		padding-bottom: 0;
		margin-bottom: 0;
	}
	.faker-form-group .control-label {
		font-size: 14px;
	}
	.faker-form-group .radio input[type="radio"] {
		margin-top: 3px;
	}
	.icheckbox_flat-aero + label,
	.iradio_flat-aero + label {
		font-size: 14px;
		cursor: pointer;
	}
	.dle-pre {
		max-height: none;
		font-family: Menlo, Monaco, Consolas, "Courier New", monospace;
		white-space: pre-wrap;
	}

</style>
<form method="post" class="form-horizontal">
	<div class="box">
		<div class="box-header">
			<div class="title">Добавить новости</div>
		</div>
		<div class="box-content">
			<div class="row box-section">
				<div class="form-group faker-form-group">
					<label class="control-label col-md-3">
						Кол-во новостей
					</label>
					<div class="col-md-9">
						<input type="number" name="news[count]" value="<?php echo getVal('news.count', '5') ?>">
					</div>
				</div>

				<div class="form-group faker-form-group">
					<label class="control-label col-md-3">
						Дата
					</label>
					<div class="col-md-9">
						от: <input type="date" class="faker-date" name="news[date][from]" value="<?php echo getVal('news.date.from', date('Y-m-d', time() - 2592000)) ?>">
						до: <input type="date" class="faker-date" name="news[date][to]" value="<?php echo getVal('news.date.to', date('Y-m-d', time())) ?>">
					</div>
				</div>

				<div class="form-group faker-form-group">
					<label class="control-label col-md-3">
						Длина заголовка
					</label>
					<div class="col-md-9">
						от: <input type="number" class="faker-number" name="news[title][from]" value="<?php echo getVal('news.title.from', '15') ?>">
						до: <input type="number" class="faker-number" name="news[title][to]" value="<?php echo getVal('news.title.to', '100') ?>">
					</div>
				</div>

				<div class="form-group faker-form-group">
					<label class="control-label col-md-3">
						Длина краткой новости
					</label>
					<div class="col-md-5">
						от: <input type="number" class="faker-number" name="news[short_story][from]" value="<?php echo getVal('news.short_story.from', '140') ?>">
						до: <input type="number" class="faker-number" name="news[short_story][to]" value="<?php echo getVal('news.short_story.to', '500') ?>">
					</div>
					<div class="col-md-4">
						кол-во картинок: <input type="number" class="faker-number" name="news[short_story][images][count]" value="<?php echo getVal('news.short_story.images.count', '0') ?>">
					</div>
				</div>
				<div class="form-group faker-form-group">
					<label class="control-label col-md-3">
						Картинки для краткой новости
					</label>
					<div class="col-md-5">
						от: <input type="text" class="faker-medium" name="news[short_story][images][from]" value="<?php echo getVal('news.short_story.images.from', '200x200') ?>">
						до: <input type="text" class="faker-medium" name="news[short_story][images][to]" value="<?php echo getVal('news.short_story.images.to', '500x500') ?>">
					</div>
					<div class="col-md-4">
						тематика картинок:
						<select name="news[short_story][images][section]" class="uniform" style="min-width: 150px;">
							<option value="">любая</option>
							<option <?php if (getVal('news.short_story.images.section') == 'abstract'): ?>selected<?php endif?> value="abstract">abstract</option>
							<option <?php if (getVal('news.short_story.images.section') == 'animals'): ?>selected<?php endif?> value="animals">animals</option>
							<option <?php if (getVal('news.short_story.images.section') == 'business'): ?>selected<?php endif?> value="business">business</option>
							<option <?php if (getVal('news.short_story.images.section') == 'cats'): ?>selected<?php endif?> value="cats">cats</option>
							<option <?php if (getVal('news.short_story.images.section') == 'city'): ?>selected<?php endif?> value="city">city</option>
							<option <?php if (getVal('news.short_story.images.section') == 'food'): ?>selected<?php endif?> value="food">food</option>
							<option <?php if (getVal('news.short_story.images.section') == 'nightlife'): ?>selected<?php endif?> value="nightlife">nightlife</option>
							<option <?php if (getVal('news.short_story.images.section') == 'fashion'): ?>selected<?php endif?> value="fashion">fashion</option>
							<option <?php if (getVal('news.short_story.images.section') == 'people'): ?>selected<?php endif?> value="people">people</option>
							<option <?php if (getVal('news.short_story.images.section') == 'nature'): ?>selected<?php endif?> value="nature">nature</option>
							<option <?php if (getVal('news.short_story.images.section') == 'sports'): ?>selected<?php endif?> value="sports">sports</option>
							<option <?php if (getVal('news.short_story.images.section') == 'technics'): ?>selected<?php endif?> value="technics">technics</option>
							<option <?php if (getVal('news.short_story.images.section') == 'transport'): ?>selected<?php endif?> value="transport">transport</option>
						</select>
					</div>
				</div>

				<div class="form-group faker-form-group">
					<label class="control-label col-md-3">
						Длина полной новости
					</label>
					<div class="col-md-5">
						от: <input type="number" class="faker-number" name="news[full_story][from]" value="<?php echo getVal('news.full_story.to', '600') ?>">
						до: <input type="number" class="faker-number" name="news[full_story][to]" value="<?php echo getVal('news.full_story.to', '1500') ?>">
					</div>
					<div class="col-md-4">
						кол-во картинок: <input type="number" class="faker-number" name="news[full_story][images][count]" value="<?php echo getVal('news.full_story.images.count', '0') ?>">
					</div>
				</div>

				<div class="form-group faker-form-group">
					<label class="control-label col-md-3">
						Картинки для полной новости
					</label>
					<div class="col-md-5">
						от: <input type="text" class="faker-medium" name="news[full_story][images][from]" value="<?php echo getVal('news.full_story.images.from', '500x500') ?>">
						до: <input type="text" class="faker-medium" name="news[full_story][images][to]" value="<?php echo getVal('news.full_story.images.to', '700x500') ?>">
					</div>
					<div class="col-md-4">
						тематика картинок:
						<select name="news[full_story][images][section]" class="uniform" style="min-width: 150px;">
							<option value="">любая</option>
							<option <?php if (getVal('news.full_story.images.section') == 'abstract'): ?>selected<?php endif?> value="abstract">abstract</option>
							<option <?php if (getVal('news.full_story.images.section') == 'animals'): ?>selected<?php endif?> value="animals">animals</option>
							<option <?php if (getVal('news.full_story.images.section') == 'business'): ?>selected<?php endif?> value="business">business</option>
							<option <?php if (getVal('news.full_story.images.section') == 'cats'): ?>selected<?php endif?> value="cats">cats</option>
							<option <?php if (getVal('news.full_story.images.section') == 'city'): ?>selected<?php endif?> value="city">city</option>
							<option <?php if (getVal('news.full_story.images.section') == 'food'): ?>selected<?php endif?> value="food">food</option>
							<option <?php if (getVal('news.full_story.images.section') == 'nightlife'): ?>selected<?php endif?> value="nightlife">nightlife</option>
							<option <?php if (getVal('news.full_story.images.section') == 'fashion'): ?>selected<?php endif?> value="fashion">fashion</option>
							<option <?php if (getVal('news.full_story.images.section') == 'people'): ?>selected<?php endif?> value="people">people</option>
							<option <?php if (getVal('news.full_story.images.section') == 'nature'): ?>selected<?php endif?> value="nature">nature</option>
							<option <?php if (getVal('news.full_story.images.section') == 'sports'): ?>selected<?php endif?> value="sports">sports</option>
							<option <?php if (getVal('news.full_story.images.section') == 'technics'): ?>selected<?php endif?> value="technics">technics</option>
							<option <?php if (getVal('news.full_story.images.section') == 'transport'): ?>selected<?php endif?> value="transport">transport</option>
						</select>
					</div>
				</div>

				<div class="form-group faker-form-group">
					<label class="control-label col-md-3">
						Автор новости
					</label>
					<div class="col-md-9">

						<div>
							<input class="icheck" type="radio" name="news[author]" id="na_1" value="exist" <?php if (getVal('news.author') == 'exist' || getVal('news.author', '00') == '00'): ?> checked<?php endif;?>> <label for="na_1">брать случайного автора из БД</label>
						</div>
						<div>
							<input class="icheck" type="radio" name="news[author]" id="na_2" value="new" <?php if (getVal('news.author') == 'new'): ?> checked<?php endif;?>> <label for="na_2">создать случайного автора для каждой новости</label>
						</div>
					</div>
				</div>

				<div class="form-group faker-form-group">
					<label class="control-label col-md-3">
						Категория
					</label>
					<div class="col-md-9">
						<select data-placeholder="Выберите категорию ..." name="news[category][]" id="category" class="categoryselect" <?php if ($config['allow_multi_category']): ?>multiple<?php endif?> style="width:100%;max-width:350px;">
							<?php $selecedCats = (isset($_POST['news']['category'])) ? $_POST['news']['category'] : 0;?>
							<?php echo CategoryNewsSelection($selecedCats, 0); ?>
						</select>
					</div>
				</div>

				<div class="form-group faker-form-group">
					<label class="control-label col-md-3">
						&nbsp;
					</label>
					<div class="col-md-9">
						<input class="icheck" type="checkbox" id="showresult" name="showresult" value="1" <?php if (getVal('showresult')): ?> checked<?php endif;?>><label for="showresult">Выводить результат работы</label>
					</div>
				</div>

				<div class="form-group faker-form-group">
					<label class="control-label col-md-3">
						&nbsp;
					</label>
					<div class="col-md-9">
						<input type="hidden" name="mod" value="faker">
						<input type="hidden" name="user_hash" value="<?php echo $dle_login_hash ?>">
						<input type="submit" name="add" class="btn btn-lg btn-green" value="Добавить">
						<!-- <input type="submit" name="preview" class="btn btn-lg btn-black" value="Посмотреть"> -->
						<a href="<?php echo $config['admin_path'] ?>?mod=faker" class="btn btn-lg btn-default">Сбросить настройки</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<script>
	jQuery(document).ready(function($) {
		$('.categoryselect').chosen({
			allow_single_deselect: true,
			no_results_text: 'Ничего не найдено',
		});
	});
</script>
<?php
if (isset($_POST['add'])) {
	if ($_REQUEST['user_hash'] == '' or $_REQUEST['user_hash'] != $dle_login_hash) {
		die('Hacking attempt! User not found');
	}

	$statistics      = array();
	$microtimerStart = microtime(true);

	if (function_exists("memory_get_usage")) {
		$memoryStart = memory_get_usage();
	}

	include ENGINE_DIR . '/modules/faker/classes/faker/autoload.php';

	include ENGINE_DIR . '/modules/faker/classes/SafeMySQL.php';

	$SafeMySQL = SafeMySQL::getInstanse(array(
		'host'    => DBHOST,
		'user'    => DBUSER,
		'pass'    => DBPASS,
		'db'      => DBNAME,
		'charset' => COLLATE,
	));

	$faker    = Faker\Factory::create('ru_RU');
	$postNews = $_POST['news'];
	$arFaker  = array();
	$maxImg   = explode('x', $config['max_image']);
	if (count($maxImg) == 1) {
		$maxImg[1] = $maxImg[0];
	}
	$dateBegin = $postNews['date']['from'];

	for ($ii = 0; $ii < $postNews['count']; $ii++) {

		$dateTime  = $faker->dateTimeBetween($dateBegin, $postNews['date']['to']);
		$dateBegin = $dateTime->format('Y-m-d H:i:s');

		$author = getAuthor($faker, $postNews['author']);

		$title       = $faker->realText($faker->numberBetween($postNews['title']['to'], $postNews['title']['from']));
		$shortText   = $faker->realText($faker->numberBetween($postNews['short_story']['to'], $postNews['short_story']['from']));
		$fullText    = $faker->realText($faker->numberBetween($postNews['full_story']['to'], $postNews['full_story']['from']));
		$shortImages = $fullImages = $shortImagesSql = $fullImagesSql = array();

		if ($postNews['short_story']['images']['count'] > 0 || $postNews['full_story']['images']['count'] > 0) {
			include_once ENGINE_DIR . '/classes/thumb.class.php';
			$dir      = ROOT_DIR . '/uploads/posts/' . $dateTime->format('Y-m');
			$thumbDir = $dir . '/thumbs';

			if (!is_dir($dir)) {
				@mkdir($dir, 0777);
				@chmod($dir, 0777);
				@mkdir($thumbDir, 0777);
				@chmod($thumbDir, 0777);
			}

			// Генерим картинки для краткой новости
			if ($postNews['short_story']['images']['count'] > 0) {
				$arImgFrom = explode('x', $postNews['short_story']['images']['from']);
				$arImgTo   = explode('x', $postNews['short_story']['images']['to']);

				if (count($arImgFrom) == 1) {
					$arImgFrom[1] = $arImgFrom[0];
				}
				if (count($arImgTo) == 1) {
					$arImgTo[1] = $arImgTo[0];
				}
				for ($i = 0; $i < $postNews['short_story']['images']['count']; $i++) {
					$width       = $faker->numberBetween($arImgFrom[0], $arImgTo[0]);
					$height      = $faker->numberBetween($arImgFrom[1], $arImgTo[1]);
					$getImg      = $faker->image($dir, $width, $height, $postNews['short_story']['images']['section']);
					$imgName     = basename($getImg);
					$imgUrl      = $config['http_home_url'] . 'uploads/posts/' . $dateTime->format('Y-m') . '/' . $imgName;
					$imgThumbUrl = $config['http_home_url'] . 'uploads/posts/' . $dateTime->format('Y-m') . '/thumbs/' . $imgName;

					$imgHtml = '<!--dle_image_begin:' . $imgUrl . '|--><img src="' . $imgUrl . '" alt="' . $title . '" title="' . $title . '" /><!--dle_image_end-->';

					if ($width > $maxImg[0] || $height > $maxImg[1]) {
						$thumb = new thumbnail($getImg);

						if ($thumb->size_auto($config['max_image'])) {

							$thumb->jpeg_quality($config['jpeg_quality']);
							$thumb->save($thumbDir . '/' . $imgName);

							@chmod($thumbDir . '/' . $imgName, 0666);

							$imgHtml = '<!--TBegin:' . $imgUrl . '|--><a href="' . $imgUrl . '" rel="highslide" class="highslide"><img src="' . $imgThumbUrl . '" alt="' . $title . '" title="' . $title . '" /></a><!--TEnd-->';
						}
					}

					$shortImages[]    = $imgHtml;
					$shortImagesSql[] = $dateTime->format('Y-m') . '/' . $imgName;
				}
			}
			// Генерим картинки для полной новости.
			// Да, тут дублирование кода, да, это не хорошо...
			if ($postNews['full_story']['images']['count'] > 0) {

				$arFullImgFrom = explode('x', $postNews['full_story']['images']['from']);
				$arFullImgTo   = explode('x', $postNews['full_story']['images']['to']);

				if (count($arFullImgFrom) == 1) {
					$arFullImgFrom[1] = $arFullImgFrom[0];
				}
				if (count($arFullImgTo) == 1) {
					$arFullImgTo[1] = $arFullImgTo[0];
				}

				for ($i = 0; $i < $postNews['full_story']['images']['count']; $i++) {
					$width       = $faker->numberBetween($arFullImgFrom[0], $arFullImgTo[0]);
					$height      = $faker->numberBetween($arFullImgFrom[1], $arFullImgTo[1]);
					$getImg      = $faker->image($dir, $width, $height, $postNews['full_story']['images']['section']);
					$imgName     = basename($getImg);
					$imgUrl      = $config['http_home_url'] . 'uploads/posts/' . $dateTime->format('Y-m') . '/' . $imgName;
					$imgThumbUrl = $config['http_home_url'] . 'uploads/posts/' . $dateTime->format('Y-m') . '/thumbs/' . $imgName;

					$imgHtml = '<!--dle_image_begin:' . $imgUrl . '|--><img src="' . $imgUrl . '" alt="' . $title . '" title="' . $title . '" /><!--dle_image_end-->';

					if ($width > $maxImg[0] || $height > $maxImg[1]) {
						$thumb = new thumbnail($getImg);

						if ($thumb->size_auto($config['max_image'])) {

							$thumb->jpeg_quality($config['jpeg_quality']);
							$thumb->save($thumbDir . '/' . $imgName);

							@chmod($thumbDir . '/' . $imgName, 0666);

							$imgHtml = '<!--TBegin:' . $imgUrl . '|--><a href="' . $imgUrl . '" rel="highslide" class="highslide"><img src="' . $imgThumbUrl . '" alt="' . $title . '" title="' . $title . '" /></a><!--TEnd-->';
						}
					}

					$fullImages[]    = $imgHtml;
					$fullImagesSql[] = $dateTime->format('Y-m') . '/' . $imgName;
				}
			}

		}

		$arFaker[$ii]['autor']       = $author['name'];
		$arFaker[$ii]['date']        = $dateTime->format('Y-m-d H:i:s');
		$arFaker[$ii]['title']       = $title;
		$arFaker[$ii]['alt_name']    = totranslit(stripslashes($arFaker[$ii]['title']), true, false);
		$arFaker[$ii]['short_story'] = getNewsText($shortText, $shortImages);

		$arFaker[$ii]['full_story'] = getNewsText($fullText, $fullImages);
		// $arFaker[$ii]['xfields']     = '';
		// $arFaker[$ii]['descr']       = '';
		// $arFaker[$ii]['keywords']    = '';
		$arFaker[$ii]['category'] = (isset($postNews['category'])) ? implode(',', $postNews['category']) : '';
		// $arFaker[$ii]['comm_num']    = '';
		$arFaker[$ii]['allow_comm'] = 1;
		$arFaker[$ii]['allow_main'] = 1;
		// $arFaker[$ii]['tags']        = '';
		$arFaker[$ii]['approve'] = 1;

		$arDbIns = array();

		foreach ($arFaker[$ii] as $key => $value) {
			$arDbIns[] = $key . '=' . $SafeMySQL->parse('?s', $value);
		}
		$dbIns = implode(', ', $arDbIns);

		$SafeMySQL->query('INSERT INTO ' . PREFIX . '_post SET ?p', $dbIns);

		$curId = $SafeMySQL->insertId();

		$db->query("INSERT INTO " . PREFIX . "_post_extras (news_id, allow_rate, votes, user_id) VALUES('{$curId}', '1', '0','{$author['user_id']}')");

		$allImages = array_merge($shortImagesSql, $fullImagesSql);

		if (count($allImages) > 0) {
			$strImages  = implode('|||', $allImages);
			$added_time = time();

			$db->query("INSERT INTO " . PREFIX . "_images (images, author, news_id, date) values ('{$strImages}', '{$author['name']}', '{$curId}', '{$added_time}')");
		}

		$db->query("UPDATE " . USERPREFIX . "_users set news_num=news_num+1 where user_id='{$author['user_id']}'");

	}
	clear_cache();

	$statistics[] = 'Новости добавлены за: ' . round((microtime(true) - $microtimerStart), 6) . ' c.';
	if (function_exists("memory_get_usage")) {
		$statistics[] = 'Расход памяти: ' . round((memory_get_usage() - $memoryStart) / (1024 * 1024), 2) . ' Мб.';
	}

	echo '<div style="margin: 30px 0;" class="alert">' . implode('<br>', $statistics) . '</div>';

	if (isset($_POST['showresult'])) {
		foreach ($arFaker as $fakerItem) {
			echo "<pre class='dle-pre'>";
			print_r($fakerItem);
			echo "</pre>";
		}
	}
}
?>