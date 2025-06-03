<?php 
require dirname(__DIR__) . '/header.php';
?>

<section class="comment-edit-section">
    <h3 class="comment-edit-title">Редактировать комментарий</h3>
    
    <form action="<?= htmlspecialchars(dirname($_SERVER['SCRIPT_NAME'])) ?>/comments/<?= $comment->getID() ?>/update" 
          method="post" 
          class="comment-edit-form">
          
        <div class="mb-3">
            <label for="commentText" class="form-label">Измените текст комментария</label>
            <textarea class="form-control" 
                      id="commentText" 
                      rows="3" 
                      name="text"
                      aria-describedby="textHelp"><?= htmlspecialchars($comment->getText()) ?></textarea>
        </div>
        
        <button type="submit" 
                class="btn btn-primary submit-button">
            Сохранить изменения
        </button>
    </form>
</section>

<?php 
require dirname(__DIR__) . '/footer.html';
?>