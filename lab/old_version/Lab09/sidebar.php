<h1 class="my-4">Shop Name</h1>
<div class="list-group">
	<?php
	$result_set = $conn->query("SELECT * from category");
	while ($row = $result_set->fetch_assoc()) {
	?>
		<a href="shop.php?category=<?= $row['name'] ?>" class="list-group-item"><?= $row['name'] ?></a>
	<?php } ?>
</div>