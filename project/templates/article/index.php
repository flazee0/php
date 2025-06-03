<?php require dirname(__DIR__) . '/header.php'; ?>

<div class="articles-table-container">
    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th scope="col">№</th>
                <th scope="col">Дата</th>
                <th scope="col">Название</th>
                <th scope="col">Текст</th>
                <th scope="col">Автор</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $index => $article): ?>
                <tr class="article-row">
                    <th scope="row"><?= $index + 1 ?></th>
                    <td><?= htmlspecialchars($article->getCreatedAt()) ?></td>
                    <td>
                        <a href="<?= htmlspecialchars(dirname($_SERVER['SCRIPT_NAME'])) ?>/article/<?= $article->getID() ?>"
                           class="article-link">
                            <?= htmlspecialchars($article->getTitle()) ?>
                        </a>
                    </td>
                    <td><?= htmlspecialchars($article->getText()) ?></td>
                    <td><?= htmlspecialchars($article->getAuthorId()->getNickname()) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>