<?php
require_once 'db_connect.php';
require_once 'menu.php';

$action = $_GET['action'] ?? 'view';
$sort = $_GET['sort'] ?? 'id';
$page = (int)($_GET['page'] ?? 1);

$content = '';
switch ($action) {
    case 'view':
        require_once 'viewer.php';
        $content = displayContacts($sort, $page);
        break;
    case 'add':
        require_once 'add.php';
        $content = displayAddForm();
        break;
    case 'edit':
        require_once 'edit.php';
        $content = displayEditForm();
        break;
    case 'delete':
        require_once 'delete.php';
        $content = displayDeleteList();
        break;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Записная книжка</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?= generateMenu($action, $sort) ?>
    <div class="content">
        <?= $content ?>
    </div>
</body>
</html>