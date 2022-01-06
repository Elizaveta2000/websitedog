<?php
require_once 'db.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="prim.css">
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
  <br><br>
  <div class="about">
    <h2>Все эти собаки когда-то были бездомными, отловлены на территории города Пскова и ищут дом. Собаки имеют чип — вживленную под кожу капсулу с 12-ти значным кодом, «привязывающую» собаку к ее владельцу. Взрослые животные кастрированы. Собаки отдаются по договору. При оформлении договора нам понадобится ваш паспорт. Щенки отдаются только при условии обязательной и бесплатной кастрации по достижении возраста. Мы оставляем за собой право отказать Вам отдать животное, без объяснения причин.
    </h2>
  </div>
  <br><br>
</body>

</html>

<?
$query = "SELECT * FROM dog_list_id
       LEFT JOIN id_age ON (id_age.id = dog_list_id.id_age)
       LEFT JOIN id_name ON (id_name.id_name = dog_list_id.id_name)
       LEFT JOIN id_img ON (id_img.id = dog_list_id.id_img)
       LEFT JOIN id_sex ON (id_sex.id_sex = dog_list_id.id_sex)
       LEFT JOIN id_size ON (id_size.id_size = dog_list_id.id_size)
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
          <input name="" type="submit" value="CLICK">
        </form>

      </div>
    </div>
  </div>




<? endforeach; ?>