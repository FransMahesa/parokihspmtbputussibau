<?php include'header.php'; 

error_reporting(0);
$id = base64_decode($_GET["id"]);
$sqlku = mysqli_query($konek,"SELECT * FROM tbl_blog WHERE kode='$id'");
$data  = mysqli_fetch_array($sqlku);

?>
<head>
<title>HSPMTB - <?php echo $data['judul']; ?></title>
<link rel="stylesheet" type="text/css" href="styles/news.css">
<link rel="stylesheet" type="text/css" href="styles/news_responsive.css">
</head>
<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="img/gambar/juduln.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<h3> <?php echo $data['judul']; ?></h3>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- News -->


	<div class="news">
		<div class="container">
			<div class="row">
				
				<!-- News Posts -->
				<div class="col-lg-8">
					<div class="news_posts">
						
						<!-- News Post -->


					

						<div class="news_post">
							<div class="news_image">
								<p>Tanggal Posting : <?php echo $data['tgl_posting']; ?> Post : <?php echo $data['user']; ?></p>
								<img src="img/blog/<?php echo $data['gambar']; ?>" alt="">
							
							</div>
							<p> <?php echo $data['konten']; ?></p>
						</div>

					

					</div>
				</div>

				<!-- Sidebar -->
				<div class="col-lg-4">
					<div class="sidebar">

						<!-- Search -->
						<div class="sidebar_search">
							<form action="#" id="sidebar_search_form" class="sidebar_search_form">
								<input type="text" class="search_input" placeholder="Search" required="required">
								<button class="search_button"><img src="images/search.png" alt=""></button>
							</form>
						</div>

						<!-- Categories -->
						<div class="sidebar_categories sidebar_section">
							<div class="sidebar_section_title">
								<div class="sidebar_title">LIST</div>
							</div>
							<ul>
								<?php
						           $qry = mysqli_query($konek,"SELECT * FROM tbl_blog where kode order by tgl_posting desc limit 100");
						           while ($data=mysqli_fetch_assoc($qry)) {
						          ?>

								<li><a href="news_detail.php?id=<?php echo base64_encode($data['kode']); ?>">#. <?php echo $data['judul']; ?></a></li>
								<?php } ?>
							</ul>
						</div>
						<!-- Archives -->
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include'footer.php'; ?>