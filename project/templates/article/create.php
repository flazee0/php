<?php 
require dirname(__DIR__) . '/header.php'; 
?>

<div class="form-container">
    <form action="<?= htmlspecialchars(dirname($_SERVER['SCRIPT_NAME'])) ?>/article/store" 
          method="post"
          class="article-form">
        
        <div class="mb-3">
            <label for="date" class="form-label">Дата публикации</label>
            <input type="date" 
                   class="form-control" 
                   id="date" 
                   name="date">
        </div>
        
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок статьи</label>
            <input type="text" 
                   class="form-control" 
                   id="title" 
                   name="title">
        </div>
        
        <div class="mb-3">
            <label for="text" class="form-label">Текст статьи</label>
            <textarea class="form-control" 
                      id="text" 
                      rows="3" 
                      name="text"></textarea>
        </div>
        
        <button type="submit" 
                class="btn btn-primary">
            Сохранить статью
        </button>
    </form>
</div>

<?php 
require dirname(__DIR__) . '/footer.html'; 
?>