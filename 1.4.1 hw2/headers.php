<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Заголовки</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <img src="polylogo.png" alt="Московский Политех">
    <h1>Результат get_headers</h1>
  </header>

  <main>
    <?php
      $headers = get_headers("https://httpbin.org/post", 1);
      echo '<textarea readonly>';
      print_r($headers);
      echo '</textarea>';
    ?>
    
    <a href="index.php" class="page-link">Вернуться к форме</a>
  </main>

  <footer>Задание для самостоятельной работы</footer>
</body>
</html>