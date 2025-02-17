<?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

<h1>Add a fruit! X3</h1>

<form method="POST"> 
    <label>
        <p>Name:</p>
        <textarea name="name" required><?= htmlspecialchars($_POST['name'] ?? '') ?></textarea>   
    </label>
    <br>
    <br>
    <button type="submit">Submit</button>
</form>


    <?php if (!empty($errors["name"])): ?>
        <p style="color: red;"><?= $errors["name"] ?></p>
    <?php endif; ?>

<?php require "views/components/footer.php"; ?>
