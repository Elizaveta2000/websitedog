<?php
require_once 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="profile.css">
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
</body>
</html>
<br><br>

<?php
$id = $_POST['login'];
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
WHERE id_name.id = $id";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
$result = '';
foreach ($data as $elem) : ?>
  <div class="coupon">
    <div class="container">
      <h3><?= $elem['name']; ?></h3>
    </div>
    <img class="imgbd" src=" dogs/<?= $elem['img']; ?>.jpg" width="400px">
    <div class="container" style="background-color:white">
      <p><?= $elem['description']; ?></p>
    </div>
    <div class="container">
      <p>Год рождения: <?= $elem['age']; ?> <span class="promo">Пол: <?= $elem['sex']; ?></span></p>
      <p class="expire">Размер: <?= $elem['size']; ?></p>
      <p class="expire"> Цвет<?= $elem['colors']; ?></p>
      <br>
    </div>
  </div>
<? endforeach; ?>
