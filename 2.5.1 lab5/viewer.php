<?php
function displayContacts($sort = 'id', $page = 1) {
    global $pdo;
    $perPage = 10;
    $offset = ($page - 1) * $perPage;

    $total = $pdo->query("SELECT COUNT(*) FROM contacts")->fetchColumn();
    $pages = ceil($total / $perPage);

    $allowedSorts = ['id', 'last_name', 'birth_date'];
    $sort = in_array($sort, $allowedSorts) ? $sort : 'id';

    $stmt = $pdo->prepare("SELECT * FROM contacts ORDER BY $sort LIMIT :offset, :perPage");
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);
    $stmt->execute();
    $contacts = $stmt->fetchAll();

    $html = <<<HTML
    <table class="contacts-table">
        <tr>
            <th>ID</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Телефон</th>
            <th>Email</th>
            <th>Дата рождения</th>
            <th>Адрес</th>
            <th>Комментарий</th>
        </tr>
HTML;

    foreach ($contacts as $contact) {
        $html .= <<<HTML
        <tr>
            <td>{$contact['id']}</td>
            <td>{$contact['last_name']}</td>
            <td>{$contact['first_name']}</td>
            <td>{$contact['middle_name']}</td>
            <td>{$contact['phone']}</td>
            <td>{$contact['email']}</td>
            <td>{$contact['birth_date']}</td>
            <td>{$contact['address']}</td>
            <td>{$contact['comment']}</td>
        </tr>
HTML;
    }
    $html .= '</table>';

    if ($pages > 1) {
        $html .= '<div class="pagination">';
        for ($i = 1; $i <= $pages; $i++) {
            $active = ($i == $page) ? 'active' : '';
            $html .= sprintf(
                '<a href="index.php?action=view&sort=%s&page=%d" class="%s">%d</a>',
                $sort,
                $i,
                $active,
                $i
            );
        }
        $html .= '</div>';
    }

    return $html;
}
?>