<?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

<h1>Create Post! X3</h1>

<form method="POST"> 

    <label>
        <p>Content:</p>
        
        <textarea name="content" required></textarea>
    </label>
    <br>
    <br>
    <button type="submit">Submit</button>
</form>

<?php require "views/components/footer.php"; ?>
