
<?php require "views/components/header.php"; //gets html code thats from doctype to <body> ?>
<?php require "views/components/navbar.php"; //gets html code for navbar ?>


<h1>FRUITS</h1>

<form>
<input name='search_query' value='<?= $_GET["search_query"] ?? "" ?>'/>
<button>Search</button>
</form>

<?php if (count($fruits) == 0){ ?>
 <p>No results hoe</p>
<?php } ?>


<ul>
<?php foreach($fruits as $fruit){ ?>
    <li><a href="show?id=<?= $fruit["ID"] ?>"> <?= htmlspecialchars($fruit["name"]) ?> </a> </li> 
    <?php } ?> 
</ul>


<?php require "views/components/footer.php"; //gets html code thats from doctype to </body> ?>