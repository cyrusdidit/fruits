<?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

<h1>Create Post! X3</h1>

<form method="POST"> 
    <label>
        <p>Content:</p>
        <textarea name="content" required><?= htmlspecialchars($_POST['content'] ?? '') ?></textarea>   
    </label>
    <br>
    <br>
    <button type="submit">Submit</button>
</form>

    <?php if (!empty($errors["content"])): ?>
        <p style="color: red;"><?= $errors["content"] ?></p>
    <?php endif; ?>

<?php require "views/components/footer.php"; ?>
