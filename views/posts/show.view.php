

<?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

<h1><?= htmlspecialchars($fruit["name"]) ?></h1> <!-- Avoid script -->

<!-- Edit link -->
<a href="edit?id=<?= $fruit["ID"] ?>" style="color:#a6c8ff; font-size:30px;">Edit</a>

<?php require "views/components/footer.php"; ?>
