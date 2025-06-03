<?php
function displayEditForm() {
    global $pdo;
    $contactId = $_GET['id'] ?? null;
    $message = '';

    $contacts = $pdo->query("SELECT id, last_name, first_name FROM contacts ORDER BY last_name, first_name")
                   ->fetchAll();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        try {
            $stmt = $pdo->prepare("UPDATE contacts SET 
                last_name = ?, first_name = ?, middle_name = ?, gender = ?, birth_date = ?,
                phone = ?, address = ?, email = ?, comment = ? WHERE id = ?");
            
            $stmt->execute([
                $_POST['last_name'] ?? '',
                $_POST['first_name'] ?? '',
                $_POST['middle_name'] ?? '',
                $_POST['gender'] ?? 'male',
                $_POST['birth_date'] ?? '',
                $_POST['phone'] ?? '',
                $_POST['address'] ?? '',
                $_POST['email'] ?? '',
                $_POST['comment'] ?? '',
                $_POST['id']
            ]);
            
            $message = '<p class="success">Запись обновлена</p>';
            $contactId = $_POST['id'];
        } catch (PDOException $e) {
            $message = '<p class="error">Ошибка обновления: ' . $e->getMessage() . '</p>';
        }
    }

    $currentContact = null;
    if ($contactId) {
        $stmt = $pdo->prepare("SELECT * FROM contacts WHERE id = ?");
        $stmt->execute([$contactId]);
        $currentContact = $stmt->fetch();
    } elseif (!empty($contacts)) {
        $contactId = $contacts[0]['id'];
        $currentContact = $pdo->query("SELECT * FROM contacts WHERE id = $contactId")->fetch();
    }

    $html = '<div class="edit-container">';
    $html .= $message;
    
    $html .= '<div class="contact-list">';
    foreach ($contacts as $contact) {
        $class = ($contact['id'] == $contactId) ? 'class="active"' : '';
        $html .= sprintf(
            '<a %s href="index.php?action=edit&id=%d">%s %s</a>',
            $class,
            $contact['id'],
            htmlspecialchars($contact['last_name']),
            htmlspecialchars($contact['first_name'])
        );
    }
    $html .= '</div>';

    if ($currentContact) {
        $gender = $currentContact['gender'] ?? 'male';
        $maleSelected = ($gender === 'male') ? 'selected' : '';
        $femaleSelected = ($gender === 'female') ? 'selected' : '';

        $html .= <<<HTML
        <form method="POST">
            <input type="hidden" name="id" value="{$currentContact['id']}">
            
            <div class="form-group">
                <label>Фамилия:</label>
                <input type="text" name="last_name" value="{$currentContact['last_name']}" required>
            </div>
            
            <div class="form-group">
                <label>Имя:</label>
                <input type="text" name="first_name" value="{$currentContact['first_name']}" required>
            </div>
            
            <div class="form-group">
                <label>Отчество:</label>
                <input type="text" name="middle_name" value="{$currentContact['middle_name']}">
            </div>
            
            <div class="form-group">
                <label>Пол:</label>
                <select name="gender" required>
                    <option value="male" {$maleSelected}>Мужской</option>
                    <option value="female" {$femaleSelected}>Женский</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Дата рождения:</label>
                <input type="date" name="birth_date" value="{$currentContact['birth_date']}" required>
            </div>
            
            <div class="form-group">
                <label>Телефон:</label>
                <input type="tel" name="phone" value="{$currentContact['phone']}" required>
            </div>
            
            <div class="form-group">
                <label>Адрес:</label>
                <textarea name="address">{$currentContact['address']}</textarea>
            </div>
            
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="{$currentContact['email']}">
            </div>
            
            <div class="form-group">
                <label>Комментарий:</label>
                <textarea name="comment">{$currentContact['comment']}</textarea>
            </div>
            
            <button type="submit">Сохранить</button>
        </form>
HTML;
    } else {
        $html .= '<p>Нет контактов для редактирования</p>';
    }
    
    $html .= '</div>';
    return $html;
}
?>