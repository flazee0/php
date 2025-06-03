<?php 
require dirname(__DIR__) . '/header.php'; 
?>

<form action="<?= htmlspecialchars(dirname($_SERVER['SCRIPT_NAME'])) ?>/article/<?= $article->getId() ?>/update" 
      method="post"
      class="article-update-form">

    <div class="mb-3">
        <label for="articleDate" class="form-label">Дата публикации</label>
        <input type="text" 
               class="form-control" 
               id="articleDate" 
               name="date" 
               value="<?= htmlspecialchars($article->getCreatedAt()) ?>">
    </div>

    <div class="mb-3">
        <label for="articleTitle" class="form-label">Заголовок</label>
        <input type="text" 
               class="form-control" 
               id="articleTitle" 
               name="title" 
               value="<?= htmlspecialchars($article->getTitle()) ?>">
    </div>

    <div class="mb-3">
        <label for="articleText" class="form-label">Текст статьи</label>
        <textarea class="form-control" 
                  id="articleText" 
                  rows="5" 
                  name="text"><?= htmlspecialchars($article->getText()) ?></textarea>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">
            Обновить статью
        </button>
    </div>
</form>

<?php 
require dirname(__DIR__) . '/footer.html'; 
?>