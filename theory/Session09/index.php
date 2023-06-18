<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script>
		$(document).ready(function() {

			// Get classes
			fetch('class_service.php')
				.then(response => response.json())
				.then(json => json.data)
				.then(render_class_options)

			function render_class_options(classes) {
				let options = '';
				classes.forEach(function(c) {
					let option = `<option value="${c.id}">${c.name}</option>`;
					options += option;
				})
				$('select').append(options);
			}


			let tbody = $('tbody')

			function get_students() {
				fetch('service.php')
					.then(response => response.json())
					.then(json => {
						tbody.find('tr').remove();

						let students = json.data;

						students.forEach(render_tr)
					})
			}

			get_students()

			function render_tr(student) {
				let tr = `<tr>
					<td>${student.id}</td>
					<td>${student.name}</td>
					<td>${student.yob}</td>
					<td>${student.class_name}</td>
					<td>
						<button href="" class="update btn-success" data-id=${student.id}>
							<i class="fa-solid fa-pen-to-square"></i>
						</button>
						<button href="" class="delete btn-danger" data-id=${student.id}>
							<i class="fa-solid fa-trash"></i>
						</button>
					</td>
				</tr>`;
				tbody.append(tr);
			}

			// Insert
			$('#addBtn').click(function(event) {
				let student = {
					name: $("input[name='name']").val(),
					yob: $("input[name='yob']").val(),
					class_id: $("select").val(),
				}
				fetch('service.php', {
						method: 'post',
						header: {
							'Content-Type': 'application/json'
						},
						body: JSON.stringify(student)
					})
					.then(response => response.json())
					.then(json => {
						if (json.success === 'true') {
							fetch('service.php' + "?id=" + json.insert_id)
								.then(response => response.json())
								.then(json => json.data)
								.then(render_tr)
						}
					})
			})

			// Delete
			// Note: Assign the event handler to elements before the elements are rendered => The elements are not assigned the event handler
			// The code below fix this 
			// bubble event
			$('tbody').on('click', '.delete', (function(event) {
				let id = $(this).data('id');
				fetch('service.php' + '?id=' + id, {
						method: 'delete'
					})
					.then(response => response.json())
					.then(json => {
						if (json.success === 'true') {
							$(this).closest('tr').remove();
						}
					})
			}))

			// Update
			$('#updateBtn').prop('disabled', 'true')

			$('tbody').on('click', '.update', (function(event) {
				let info = $(this).closest('tr').find('td')
				let id = $(this).data('id')
				let name = info[1].innerText
				let yob = info[2].innerText
				let c = info[3].innerText

				$("option").each(function() {
					if ($(this).text() === c) {
						$(this).prop('selected', true);
						return false; // break
					}
				});

				$("input[name='name']").val(name)
				$("input[name='yob']").val(yob)
				$("input[name='class_id']").val(c)

				$('#addBtn').prop('disabled', true)
				$('#updateBtn').prop('disabled', false)

				$('#updateBtn').data('id', id);
			}))

			$('#updateBtn').click(function(event) {
				let name = $("input[name='name']").val()
				let yob = $("input[name='yob']").val()
				let class_id = $("select").val()
				fetch('service.php', {
						method: 'put',
						body: JSON.stringify({
							id: $(this).data('id'),
							name: name,
							yob: yob,
							class_id: class_id
						})
					})
					.then(response => response.json())
					.then(json => {
						if (json.success === 'true') {
							let info = tbody.find(`.update[data-id=${$(this).data('id')}]`).closest('tr').find('td')
							info[1].innerText = name
							info[2].innerText = yob
							$("option").each(function() {
								if ($(this).attr('value') === class_id) {
									$(this).prop('selected', true);
									info[3].innerText = $(this).text()
									return false; // break
								}
							});
						}
					})

				$('#addBtn').prop('disabled', false)
				$(this).prop('disabled', true)
			})

			// Search
			$("input[type='search']").keyup(function(event) {
				console.log()
				fetch('service.php' + "?keyword=" + $(this).val())
					.then(response => response.json())
					.then(json => json.data)
					.then(students => {
						tbody.find('tr').remove();
						students.forEach(function(student) {
							render_tr(student)
						})
					})
			})
		})
	</script>
</head>

<body>
	<div class="w-25 mx-auto mt-3">
		<div class="">
			<label for="">Name</label>
			<input type="text" class="form-control" name="name">
		</div>
		<div class="form-group">
			<label for="">Year of birth</label>
			<input type="date" name="yob" id="" class="form-control">
		</div>
		<div class="form-group">
			<label for="">Class</label>
			<select name="class_id" id="" class="form-control">
			</select>
		</div>
		<button type="button" id="addBtn" class="btn btn-primary">Add</button>
		<button type="button" id="updateBtn" class="btn btn-success">Update</button>
	</div>

	<div class="w-25 mx-auto mt-5">
		<input type="search" name="keyword" id="" class="form-control" placeholder="Tìm kiếm theo tên">
	</div>
	<table class="table mt-5">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Year of birth</th>
				<th>Class</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>

		</tbody>
	</table>
</body>

</html>