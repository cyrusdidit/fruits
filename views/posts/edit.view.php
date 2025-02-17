<?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

<h1>Edit Post</h1>

<form method="POST"> 
    <!-- Hidden input to store the post ID -->
    <input type="hidden" name="id" value="<?= htmlspecialchars($post["ID"]) ?>">

    <label>
        <p>Content:</p>
        <!-- Keep the old content if validation fails -->
        <textarea name="name" required><?= htmlspecialchars($_POST['content'] ?? $post["content"]) ?></textarea>   
    </label>
    <br><br>
    <button type="submit">Update</button>
</form>

<!-- Show validation error if content is too long -->
<?php if (!empty($errors["content"])): ?>
    <p style="color: red;"><?= $errors["content"] ?></p>
<?php endif; ?>

<?php require "views/components/footer.php"; ?>
