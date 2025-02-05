
<?php require "views/components/header.php"; //gets html code thats from doctype to <body> ?>
<?php require "views/components/navbar.php"; //gets html code for navbar ?>


<h1>Blog</h1>

<form>
<input name='search_query' value='<?= $_GET["search_query"] ?? "" ?>'/>
<button>Search!</button>
</form>

<?php if (count($posts) == 0){ ?>
 <p>No results hoe</p>
<?php } ?>


<ul>
<?php foreach($posts as $post){ ?>
    <li><a href="show?id=<?= $post["ID"] ?>"> <?= htmlspecialchars($post["content"]) ?> </a> </li> 
    <?php } ?> 
</ul>


<?php require "views/components/footer.php"; //gets html code thats from doctype to </body> ?>