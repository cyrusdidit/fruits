<?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

<h1>Edit Fruit</h1>

<form method="POST">
    <!-- Hidden input to store the fruit ID -->
    <input type="hidden" name="id" value="<?= htmlspecialchars($fruit["ID"]) ?>">

    <label>
        <p>Name:</p>
        <!-- Keep the old name if validation fails -->
        <textarea name="name" required><?= htmlspecialchars($_POST['name'] ?? $fruit["name"]) ?></textarea>   
    </label>
    <br><br>
    <button type="submit">Update</button>
</form>

<!-- Show validation error if name is invalid -->
<?php if (!empty($errors["name"])): ?>
    <p style="color: red;"><?= $errors["name"] ?></p>
<?php endif; ?>

<?php require "views/components/footer.php"; ?>
