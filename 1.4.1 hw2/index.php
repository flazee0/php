<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Форма обратной связи</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <img src="polylogo.png" alt="Московский Политех">
    <h1>Форма обратной связи</h1>
  </header>

  <main>
    <form action="https://httpbin.org/post" method="POST">
      <input type="text" name="name" placeholder="Имя пользователя" required><br>
      <input type="email" name="email" placeholder="E-mail пользователя" required><br>
      
      <select name="type" required>
        <option value="" disabled selected>Тип обращения</option>
        <option value="complaint">Жалоба</option>
        <option value="suggestion">Предложение</option>
        <option value="thanks">Благодарность</option>
      </select><br>
      
      <textarea name="message" placeholder="Текст обращения" required></textarea><br>
      
      <div class="checkboxes">
        <span>Вариант ответа:</span>
        <label><input type="checkbox" name="reply[]" value="sms"> SMS</label>
        <label><input type="checkbox" name="reply[]" value="email"> E-mail</label>
      </div><br>
      
      <button type="submit">Отправить</button>
    </form>
    
    <a href="headers.php" class="page-link">Перейти к заголовкам</a>
  </main>

  <footer>Задание для самостоятельной работы</footer>
</body>
</html>