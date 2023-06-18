<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <!-- Bootstrap 4 -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
      <!-- Jquery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
      <!-- Material Symbols and Icons - Google Fonts -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <!-- Font awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- Custom -->
      <link rel="stylesheet" href="css/style_card.css">
      <link rel="stylesheet" href="css/style_sidebar.css">
   </head>
   <?php require_once "connect.php"?>
   <?php 
      if(isset($_GET['btn'])) {
      	$kw = $_GET['keyword'];
      	$movie_type = $_GET['genre'];
      	$country = $_GET['country'];
      	$year = $_GET['year'];
      } else {
      	$kw ="";
      	$movie_type = "";
      	$country = "";
      	$year = "";
      }
      $where = [];
      $sql_movie = "SELECT id, name, poster FROM movie";
      if(isset($kw) && !empty($kw)) {
      	$kw = mysqli_real_escape_string($conn, $kw);
      	$where[] = " name like '%$kw%'";
      }
      if(isset($movie_type) && !empty($movie_type)) {
      	$movie_type = $movie_type - 0;
      	if($movie_type>0)
      	$where[] = " genre_id = $movie_type ";
      }
      if(isset($country) && !empty($country) ) {
      	$country = $country - 0;
      	if($country>0)
      	$where[] = " country_id = $country ";
      }
      if(isset($year) && !empty($year)) {
      	$year = $year - 0;
      	if($year>0)
      	$where[] = " YEAR(release_date) = $year ";
      }
      if (!empty($where)) {
         $sql_movie = "SELECT id, MAX(name) AS name, MAX(poster) AS poster, MAX(YEAR(release_date)) AS release_year, MAX(country_id) AS country_id, MAX(genre_id) AS genre_id
         FROM movie INNER JOIN movie_genre ON movie_genre.movie_id = movie.id";
         $sql_movie .= " WHERE " . implode(' AND ', $where) . "Group by id";
      }
      $numberOfMovieEachPage = 28;
      $numberOfMovie = $conn->query($sql_movie)->num_rows;
      $numberOfPage = ceil($numberOfMovie / $numberOfMovieEachPage);
      $currentPage = 1;
      if (isset($_GET['currentPage'])) {
      	$currentPage = $_GET['currentPage'];
      }
      $numberOfOffsetMovie = ($currentPage - 1) * $numberOfMovieEachPage;
      $sql_movie.= " LIMIT $numberOfMovieEachPage OFFSET $numberOfOffsetMovie";			
      ?>
   <body>
      <?php require_once "navbar.php" ?>
      <div class="container">
         <div class="row">
            <div class="col-12">
               <form class="mt-4">
                  <div class="form-row">
                     <div class="col">
                        <div class="form-group d-flex flex-column align-items-center">
                           <label for="keyword">Từ khóa</label>
                           <input class="form-control" type="text" name="keyword" id="keyword" placeholder="Tên phim" value="<?= $kw ?>">
                        </div>
                     </div>
                     <?php
                        $sql = "SELECT * from genre";
                        $result = $conn->query($sql);
                        ?>
                     <div class="col">
                        <div class="form-group d-flex flex-column align-items-center">
                           <label for="genre">Thể loại</label>
                           <select class="form-control" id="genre" name="genre">
                              <option value="0">Chọn thể loại</option>
                              <?php foreach ($result as $row) {
                                 ?>
                              <option value="<?= $row['id']?>" <?php if ($row['id'] == $movie_type) { echo "selected"; } ?>> <?= $row['name'] ?></option>
                              <?php }
                                 ?>
                           </select>
                        </div>
                     </div>
                     <?php
                        $sql = "SELECT * from country";
                        $result = $conn->query($sql);
                        ?>
                     <div class="col">
                        <div class="form-group d-flex flex-column align-items-center">
                           <label for="country">Quốc gia</label>
                           <select class="form-control" id="country" name="country">
                              <option value="0">Chọn quốc gia</option>
                              <?php foreach ($result as $row) {
                                 ?>
                              <option value="<?= $row['id'] ?>"  <?php if ($row['id'] == $country) { echo "selected"; } ?>><?= $row['name'] ?></option>
                              <?php }
                                 ?>
                           </select>
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group d-flex flex-column align-items-center">
                           <label for="year">Năm</label>
                           <select class="form-control" id="year" name="year">
                              <option value="0">Chọn năm</option>
                              <?php
                                 $sql = "SELECT DISTINCT YEAR(release_date) from movie";
                                 $result = $conn->query($sql);
                                 ?>
                              <?php foreach ($result as $row) {
                                 ?>
                              <option value="<?= $row['YEAR(release_date)'] ?>" <?php if ($row['YEAR(release_date)'] == $year) { echo "selected"; } ?>><?= $row['YEAR(release_date)'] ?></option>
                              <?php }
                                 ?>
                           </select>
                        </div>
                     </div>
                     <div class="col align-self-end">
                        <button class="btn btn-primary mb-3 px-3" name ='btn'>Tìm kiếm</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-9 col-12">
               <div class="row">
                  <?php
                     $result_movie = $conn -> query($sql_movie);
                     if ($result_movie->num_rows == 0) {
                        echo "<h3>Không tìm thấy phim</h3>";
                     }
                     else {
                        foreach ($result_movie as $row) {
                     	$movie_id = $row['id'];
                     ?>
                  <?php require "card_movie.php" ?>
                  <?php }
                     }
                  ?>
               </div>
            </div>
            <div class="col-lg-3 d-none d-lg-block">
               <div class="row">
                  <?php require_once "sidebar.php"; ?>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12  mt-3">
               <nav aria-label="Page navigation example">
                  <ul class="pagination">
                     <li class="page-item <?php if ($currentPage == 1) {
                        echo "disabled";
                        } ?> ">
                        <a class="page-link " href="search_page.php?currentPage=<?= $currentPage - 1 ?>&keyword=<?=($kw) ?>&genre=<?= $movie_type ?>&country=<?= $country ?>&year=<?= $year?>&btn=" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                        </a>
                     </li>
                     <?php for ($i = 1; $i <= $numberOfPage; $i++) { ?>
                     <li class="page-item "><a class="page-link <?php if ($i == $currentPage) { echo "active";} ?>" href="search_page.php?currentPage=<?= $i ?>&keyword=<?=($kw) ?>&genre=<?= $movie_type ?>&country=<?= $country ?>&year=<?= $year?>&btn="><?= $i ?></a>
                        <?php } ?>
                     <li class="page-item <?php if ($currentPage == $numberOfPage) {
                        echo "disabled";
                        } ?>">
                        <a class="page-link" href="search_page.php?currentPage=<?= $currentPage + 1 ?>&keyword=<?=($kw) ?>&genre=<?= $movie_type ?>&country=<?= $country ?>&year=<?= $year?>&btn=" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                        </a>
                     </li>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
      <?php require_once "footer.html" ?>
      <script src="js/live_search.js"></script>
   </body>
</html>