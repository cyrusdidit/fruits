<html lang="en">
<head>
</head>
<body>


<h1 class='HeaderC'>Categories</h1>

<form>
<input name='search_query' value='<?= $_GET["search_query"] ?? "" ?>'/>
<button>Search!</button>
</form>

<ul>
<?php foreach($categories as $category){ ?>
    <li> <?= $category['category_name' ] ?> </li> 
<?php } ?>
</ul>



</body>