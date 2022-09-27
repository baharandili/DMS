<div class="alert alert-success">
  <strong>Halo Selamat Datang</strong>,  <?php //echo $this->session->userdata('nama'); ?>.
</div>
<body>
<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">

<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="style.css">
<script type="text/javascript" src="chartjs/Chart.js"></script>

<center>
		<h2>Grafik Dokumen DMS</h2>
</center>


	<?php 
	include 'koneksi.php';
	?>

	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br/>
	<br/>

	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Branch", "Department", "Section", "Category", "Group", "Site location", "Picemail", "Document"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$branch = mysqli_query($koneksi,"SELECT * FROM branch");
					echo mysqli_num_rows($branch);
					?>, 
					<?php 
					$department = mysqli_query($koneksi,"SELECT * FROM department");
					echo mysqli_num_rows($department);
					?>, 
					<?php 
					$section = mysqli_query($koneksi,"SELECT * FROM section");
					echo mysqli_num_rows($section);
					?>, 
					<?php 
					$category = mysqli_query($koneksi,"SELECT * FROM category");
					echo mysqli_num_rows($category);
					?>, 
					<?php 
					$grp = mysqli_query($koneksi,"SELECT * FROM grp");
					echo mysqli_num_rows($grp);
					?>, 
					<?php 
					$sitelocation = mysqli_query($koneksi,"SELECT * FROM sitelocation");
					echo mysqli_num_rows($sitelocation);
					?>,
					<?php 
					$picemail = mysqli_query($koneksi,"SELECT * FROM picemail");
					echo mysqli_num_rows($picemail);
					?>, 
					<?php 
					$document = mysqli_query($koneksi,"SELECT * FROM document");
					echo mysqli_num_rows($document);
					?>, 
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(219, 19, 122, 0.2)',
					'rgba(180, 160, 430, 0.2)',
					'rgba(110, 210, 310, 0.2)',
					'rgba(245, 66, 0, 0.2)',
					

					],
					borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(219, 19, 122, 1)',
					'rgba(180, 160, 430, 1)',
					'rgba(110, 210, 310, 1)',
					'rgba(245, 66, 0, 1)',
			
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
