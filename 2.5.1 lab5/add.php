<?php
function displayAddForm() {
    $message = '';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            global $pdo;
            $stmt = $pdo->prepare("INSERT INTO contacts 
                (last_name, first_name, middle_name, gender, birth_date, phone, address, email, comment) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
            $stmt->execute([
                $_POST['last_name'],
                $_POST['first_name'],
                $_POST['middle_name'],
                $_POST['gender'],
                $_POST['birth_date'],
                $_POST['phone'],
                $_POST['address'],
                $_POST['email'],
                $_POST['comment']
            ]);
            
            $message = '<p class="success">Запись добавлена</p>';
        } catch (PDOException $e) {
            $message = '<p class="error">Ошибка: ' . $e->getMessage() . '</p>';
        }
    }

    return <<<HTML
    <div class="form-container">
        {$message}
        <form method="POST">
            <div class="form-group">
                <label>Фамилия*:</label>
                <input type="text" name="last_name" required>
            </div>
            <div class="form-group">
                <label>Имя*:</label>
                <input type="text" name="first_name" required>
            </div>
            <div class="form-group">
                <label>Отчество:</label>
                <input type="text" name="middle_name">
            </div>
            <div class="form-group">
                <label>Пол*:</label>
                <select name="gender" required>
                    <option value="male">Мужской</option>
                    <option value="female">Женский</option>
                </select>
            </div>
            <div class="form-group">
                <label>Дата рождения*:</label>
                <input type="date" name="birth_date" required>
            </div>
            <div class="form-group">
                <label>Телефон*:</label>
                <input type="tel" name="phone" required>
            </div>
            <div class="form-group">
                <label>Адрес:</label>
                <textarea name="address"></textarea>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email">
            </div>
            <div class="form-group">
                <label>Комментарий:</label>
                <textarea name="comment"></textarea>
            </div>
            <button type="submit">Добавить</button>
        </form>
    </div>
HTML;
}
?>