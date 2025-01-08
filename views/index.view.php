<html lang="en">
<head>
</head>
<body>


<h1>Blog</h1>

<form>
<input name='search_query' value='<?= $_GET["search_query"] ?? "" ?>'/>
<button>Search!</button>
</form>

<ul>
<?php foreach($posts as $post){ ?>
    <li> <?= $post['content' ] ?> </li> 
<?php } ?>
</ul>



</body>