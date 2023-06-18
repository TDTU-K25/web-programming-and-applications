<h5 class="col-12 text-danger text-center">Top phim hot trong tuần</h5>
<ul class="list-group col-12 p-0">
	<?php
	$sql = "SELECT * FROM movie order by popularity desc LIMIT 4, 5";
	$result = $conn->query($sql);
	?>
	<?php foreach ($result as $row) {
		$movie_id = $row['id'];
	?>
		<li class="list-group-item p-1">
			<a href="detail_page.php?id=<?= $row['id'] ?>" class="text-decoration-none">
				<div class="d-flex flex-row align-items-center">
					<img class="" src="<?php if (str_starts_with($row['poster'], 'https')) {
											echo $row['poster'];
										} else {
											echo "images/" . $row['poster'];
										} ?>" alt="Card image" style="height: 100px;">
					<div class="ml-3">
						<h6 class="mb-1 text-primary"><?= $row['name'] ?></h6>
						<p class="mb-1 text-secondary" style="font-size: smaller;"><?= $row['popularity'] * 1000 ?> lượt xem</p>
						<div>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
						</div>
					</div>
				</div>
			</a>
		</li>
	<?php } ?>
</ul>