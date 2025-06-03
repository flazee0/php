<?php
function generateMenu($activeItem = 'view', $sort = 'id') {
    $items = [
        'view' => 'Просмотр',
        'add' => 'Добавление',
        'edit' => 'Редактирование',
        'delete' => 'Удаление'
    ];
    
    $menu = <<<HTML
    <nav>
        <ul class="main-menu">
HTML;

    foreach ($items as $key => $title) {
        $class = ($key == $activeItem) ? 'active' : '';
        $menu .= <<<HTML
            <li><a href="index.php?action={$key}" class="{$class}">{$title}</a></li>
HTML;
    }
    $menu .= '</ul>';

    if ($activeItem == 'view') {
        $sorts = [
            'id' => 'По порядку',
            'last_name' => 'По фамилии',
            'birth_date' => 'По дате'
        ];
        $menu .= '<ul class="sub-menu">';
        foreach ($sorts as $key => $title) {
            $class = ($key == $sort) ? 'active' : '';
            $menu .= <<<HTML
                <li><a href="index.php?action=view&sort={$key}" class="{$class}">{$title}</a></li>
HTML;
        }
        $menu .= '</ul>';
    }
    $menu .= '</nav>';
    return $menu;
}
?>