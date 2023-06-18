<div class="col-lg-3 col-md-4 col-6 mt-3">
	<a href="detail_page.php?id=<?= $movie_id ?>">
		<div class="card">
			<img class="card-img-top" src="<?php if (str_starts_with($row['poster'], 'https')) { echo $row['poster']; } 
			else { echo "images/poster/" . $row['poster']; }	?>" alt="Card image">
			<div class="card-img-overlay p-0 d-flex flex-column justify-content-end">
				<?php if (isset($_SESSION['id'])) {
					$user_id = $_SESSION['id'];
					?>
					<i data-id="<?= $row['id'] ?>" class="fa-solid fa-bookmark position-absolute" style="top: -8px; right: 0; font-size: 30px; color: <?php
								if ($conn->query("SELECT * FROM bookmark where movie_id = $movie_id and user_id = $user_id")->num_rows != 0) { echo 'yellow;'; } else { echo 'blue;';} ?>"></i>
				<?php } ?>
				<div style="background-color: rgba(0,0,0,0.5);">
					<h6 class="card-title text-uppercase mb-0 text-truncate" style="color:orange;"><?= $row['name'] ?></h6>
					<p class="card-text text-white text-truncate"><?= $row['name'] ?></p>
				</div>
			</div>
		</div>
	</a>
</div>