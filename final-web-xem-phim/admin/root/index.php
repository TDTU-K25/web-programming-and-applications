<?php session_start(); ?>

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

	<style>
		.highcharts-figure,
		.highcharts-data-table table {
			min-width: 360px;
			max-width: 800px;
			margin: 1em auto;
		}

		.highcharts-data-table table {
			font-family: Verdana, sans-serif;
			border-collapse: collapse;
			border: 1px solid #ebebeb;
			margin: 10px auto;
			text-align: center;
			width: 100%;
			max-width: 500px;
		}

		.highcharts-data-table caption {
			padding: 1em 0;
			font-size: 1.2em;
			color: #555;
		}

		.highcharts-data-table th {
			font-weight: 600;
			padding: 0.5em;
		}

		.highcharts-data-table td,
		.highcharts-data-table th,
		.highcharts-data-table caption {
			padding: 0.5em;
		}

		.highcharts-data-table thead tr,
		.highcharts-data-table tr:nth-child(even) {
			background: #f8f8f8;
		}

		.highcharts-data-table tr:hover {
			background: #f1f7ff;
		}
	</style>

	<!-- Chart -->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>

<?php require_once "../../connect.php";
$numberOfDayToChart = 14;

$today = date_format(date_create(), 'd/m/Y');
$currentDay = date_format(date_create(), 'd');

$lastMonth = date("m", strtotime("-1 months"));
$numberOfDayInLastMonthToChart = $numberOfDayToChart - (int)$currentDay;
$numberOfDaysOfLastMonth = cal_days_in_month(CAL_GREGORIAN, (int)$lastMonth, date('Y'));
$startDayOfLastMonthToChart = $numberOfDaysOfLastMonth - $numberOfDayInLastMonthToChart;

$arr = [];
for ($i = $startDayOfLastMonthToChart + 1; $i <= $numberOfDaysOfLastMonth; $i++) {
	$key = $i . "/" . $lastMonth;
	$arr[$key] = 0;
}

for ($i = 1; $i <= $currentDay; $i++) {
	$key = $i . "/" . date('m');
	$arr[$key] = 0;
}

$sql = "SELECT DATE_FORMAT(created_at, '%d/%m'), COUNT(*) FROM user where role = 0 GROUP BY DATE_FORMAT(created_at, '%d/%m')";
$result_set = $conn->query($sql);
foreach ($result_set as $row) {
	$arr[$row["DATE_FORMAT(created_at, '%d/%m')"]] = (int)$row['COUNT(*)'];
}
$x_axis = array_keys($arr);
$y_axis = array_values($arr);
?>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2 p-0">
				<?php require_once "../sidebar.html" ?>
			</div>
			<div class="col-10">
			<?php require_once "../account_box.php" ?>
				<h4 class="mt-3">Homepage</h4>
				<figure class="highcharts-figure">
					<div id="container"></div>
				</figure>
			</div>
		</div>
	</div>
	<script>
		Highcharts.chart('container', {

			title: {
				text: 'Số lượng user đăng ký trong vòng 14 ngày gần đây',
				align: 'center'
			},

			yAxis: {
				title: {
					text: 'Số lượng'
				}
			},

			xAxis: {
				categories: <?php echo json_encode($x_axis); ?> // encode an indexed array into a JSON array
			},

			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'middle'
			},

			plotOptions: {
				series: {
					label: {
						connectorAllowed: false
					}
				}
			},

			series: [{
				name: 'User',
				data: <?php echo json_encode($y_axis); ?>
			}],

			responsive: {
				rules: [{
					condition: {
						maxWidth: 500
					},
					chartOptions: {
						legend: {
							layout: 'horizontal',
							align: 'center',
							verticalAlign: 'bottom'
						}
					}
				}]
			}

		});
	</script>
</body>

</html>