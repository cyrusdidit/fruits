
<?php require "components/header.php"; //gets html code thats from doctype to <body> ?>
<?php require "components/navbar.php"; //gets html code for navbar ?>


<h1>Categories</h1>

<form>
<input name='search_query' value='<?= $_GET["search_query"] ?? "" ?>'/>
<button>Search!</button>
</form>

<ul>
<?php foreach($categories as $category){ ?>
    <li> <?= $category['category_name' ] ?> </li> 
<?php } ?>
</ul>



<?php require "components/footer.php"; //gets html code thats from doctype to </body> ?>