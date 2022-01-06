<?php
require_once 'DB.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="filters.css">
</head>
<body>
  <br>
  <!-- Верхняя навигация -->
  <div class="topnav">

    <!-- Ссылка по центру -->
    <div class="topnav-centered">
      <a href="index.php" class="active">Главная</a>
    </div>

    <!-- Ссылки с выравниванием по левому краю (по умолчанию) -->
    <a href="#news">Новости</a>
    <a href="#contact">Контакты</a>

    <!-- Ссылки с выравниванием по правому краю -->
    <div class="topnav-right">
      <a href="filters_dog.php">Поиск</a>
      <a href="#about">Про нас</a>
    </div>

  </div>
  <h1>Фильтры:</h1>
  <form action="filters_dog.php" method="GET">
    <div class="form_radio_btn">
      <p>Пол:</p>
      <input id=checkbox_1 type="radio" name="sex" value=" AND id_sex.id_sex > 0" checked>
      <label for="checkbox_1">ЛЮБОЙ</label>
    </div>
    <div class="form_radio_btn">
      <input id=checkbox_2 type="radio" name="sex" value="AND id_sex.id_sex = 1">
      <label for="checkbox_2">СУКА</label>
    </div>
    <div class="form_radio_btn">
      <input id=checkbox_3 type="radio" name="sex" value="AND id_sex.id_sex = 2">
      <label for="checkbox_3">КОБЕЛЬ </label>
    </div>
    <br>
    <div class="form_radio_btn">
      <p>Возраст:</p>
      <input id=checkbox_4 type="radio" name="id_age" value="AND id_age.id > 0" checked>
      <label for="checkbox_4">ЛЮБОЙ</label>
    </div>
    <div class="form_radio_btn">
      <input id=checkbox_5 type="radio" name="id_age" value="AND id_age.id > 19 ">
      <label for="checkbox_5">До 3-х лет</label>
    </div>
    <div class="form_radio_btn">
      <input id=checkbox_6 type="radio" name="id_age" value="AND id_age.id > 16 AND id_age.id < 20">
      <label for="checkbox_6">От 3-х до 5-ти </label>
    </div>
    <div class="form_radio_btn">
      <input id=checkbox_7 type="radio" name="id_age" value="AND id_age.id < 17">
      <label for="checkbox_7">От 5-ти </label>
    </div>
    <br>
    <div class="form_radio_btn">
      <p>Размер:</p>
      <input id=checkbox_8 type="radio" name="id_size" value="AND id_size.id_size > 0" checked>
      <label for="checkbox_8">ЛЮБОЙ</label>
    </div>
    <div class="form_radio_btn">
      <input id=checkbox_10 type="radio" name="id_size" value="AND id_size.id_size = 2">
      <label for="checkbox_10">Маленький (5-10 кг, 30-40 см)</label>
    </div>
    <div class="form_radio_btn">
      <input id=checkbox_11 type="radio" name="id_size" value="AND id_size.id_size = 3">
      <label for="checkbox_11">Средний (10-20 кг, 40-56 см)</label>
    </div>
    <div class="form_radio_btn">
      <input id=checkbox_12 type="radio" name="id_size" value="AND id_size.id_size = 4">
      <label for="checkbox_12">Большой (20-30 кг, 56-65 см)</label>
    </div>
    <br><br>
    <div class="form_radio_btn">
      <p>Цвет:</p>
      <input id=checkbox_13 type="radio" name="id_colorOne" value="AND color_name_text.colors LIKE '%%'" checked>
      <label for="checkbox_13">ЛЮБОЙ</label>
    </div>
    <div class="form_radio_btn">
      <input id=checkbox_14 type="radio" name="id_colorOne" value="AND color_name_text.colors LIKE '%Чёрный%'">
      <label for="checkbox_14">Чёрный</label>
    </div>
    <div class="form_radio_btn">
      <input id=checkbox_15 type="radio" name="id_colorOne" value="AND color_name_text.colors LIKE '%Коричневый%'">
      <label for="checkbox_15">Коричневый</label>
    </div>
    <div class="form_radio_btn">
      <input id=checkbox_16 type="radio" name="id_colorOne" value="AND color_name_text.colors LIKE '%Серый%'">
      <label for="checkbox_16">Серый</label>
    </div>
    <div class="form_radio_btn">
      <input id=checkbox_17 type="radio" name="id_colorOne" value="AND color_name_text.colors LIKE '%Белый%'">
      <label for="checkbox_17">Белый</label>
    </div>
    <div class="form_radio_btn">
      <input id=checkbox_18 type="radio" name="id_colorOne" value="AND color_name_text.colors LIKE '%Жёлтый%'">
      <label for="checkbox_18">Жёлтый</label>
    </div>
    <div class="form_radio_btn">
      <input id=checkbox_19 type="radio" name="id_colorOne" value="AND color_name_text.colors LIKE '%Рыжий%'">
      <label for="checkbox_19">Рыжий</label>
    </div>
    <br>
    <br>
    <input class="button_sub" type="submit" value="Найти" checked>
    <br><br><br>
  </form>
</body>
</html>

<?php
$sex = $_GET['sex'];
$age = $_GET['id_age'];
$size = $_GET['id_size'];
$colorOne = $_GET['id_colorOne'];
?>

<?
$query = "SELECT * FROM dog_list_id
      LEFT JOIN id_age ON (id_age.id = dog_list_id.id_age)
       LEFT JOIN id_name ON (id_name.id_name = dog_list_id.id_name)
       LEFT JOIN id_img ON (id_img.id = dog_list_id.id_img)
       LEFT JOIN id_sex ON (id_sex.id_sex = dog_list_id.id_sex)
       LEFT JOIN id_size ON (id_size.id_size = dog_list_id.id_size)
       LEFT JOIN id_description ON (id_description.id = dog_list_id.id_description)
       LEFT JOIN color_name_text ON (color_name_text.id_colors = dog_list_id.id_color)
WHERE dog_list_id.id > 0 $sex  $age  $size  $colorOne 
       ";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
$result = '';
foreach ($data as $elem) : ?>

  <div class="image-wrapper">
    <div class="media">
      <div class="overlay"></div>
      <img src=" dogs/<?= $elem['img']; ?>.jpg" width="200px">

      <div class="image-details">
        <h4><?= $elem['name']; ?></h4>

        <p>Год рождения: <?= $elem['age']; ?></p>
        <p>Пол: <?= $elem['sex']; ?></p>
        <p>Размер: <?= $elem['size']; ?></p>

        <form method="post" action="profile_dog.php">
          <input type="radio" name="login" value="<?= $elem['id']; ?>" checked>
          <input class="button_click" name="" type="submit" value="Подробнее">
        </form>
      </div>
    </div>
  </div>
<? endforeach; ?>
