<?php
function displayDeleteList() {
    global $pdo;
    $message = '';

    if (isset($_GET['delete_id'])) {
        try {
            $stmt = $pdo->prepare("SELECT last_name FROM contacts WHERE id = ?");
            $stmt->execute([$_GET['delete_id']]);
            $contact = $stmt->fetch();
            
            $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = ?");
            $stmt->execute([$_GET['delete_id']]);
            
            $message = '<p class="success">Запись ' . htmlspecialchars($contact['last_name']) . ' удалена</p>';
        } catch (PDOException $e) {
            $message = '<p class="error">Ошибка: ' . $e->getMessage() . '</p>';
        }
    }

    $contacts = $pdo->query("SELECT id, last_name, first_name FROM contacts ORDER BY last_name, first_name")
                   ->fetchAll();

    $html = <<<HTML
    <div class="delete-container">
        {$message}
HTML;
    
    if (!empty($contacts)) {
        $html .= '<div class="contact-list">';
        foreach ($contacts as $contact) {
            $html .= sprintf(
                '<a href="index.php?action=delete&delete_id=%d">%s %s</a>',
                $contact['id'],
                htmlspecialchars($contact['last_name']),
                htmlspecialchars($contact['first_name'])
            );
        }
        $html .= '</div>';
    } else {
        $html .= '<p>Нет записей для удаления</p>';
    }
    $html .= '</div>';
    return $html;
}
?>