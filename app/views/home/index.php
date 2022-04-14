<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- FONT -->
	<!-- INTER -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<!-- OSWALD -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
	<!-- ICON -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<!-- Style -->
	<link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
	<title>HOME</title>
</head>

<body>
   

	<div class="container" id="article">
		<header>
			<div class="title">
				<h1>SURVEY PERMINATAN UNTUK </h1>
				<h1>MAHASISWA TEKNIK KOMPUTER</h1>
			</div>
			<div class="nav">
				<div class="dropdown">
					<li class="dropbtn main" data-name="Software">Software<i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></li>

					<div class="dropitems level-1">
						<div class="arrow up"></div>
						<div class="items">
							<div class="dropright">
								<li class="dropbtn child top" data-name="Website">Website<i class="fa fa-angle-right"></i><i class="fa fa-angle-left"></i></li>

								<div class="dropitems level-2">
									<div class="arrow left"></div>
									<div class="items">
										<li class="dropbtn top" data-name="Frontend">Frontend</li>
										<li class="dropbtn" data-name="Backend">Backend</li>
										<li class="dropbtn bot" data-name="Fullstack">Fullstack</li>
									</div>
								</div>
							</div>

							<div class="dropright">
								<li class="dropbtn child bot" data-name="Mobile">Mobile<i class="fa fa-angle-right"></i><i class="fa fa-angle-left"></i></li>

								<div class="dropitems level-2">
									<div class="arrow left"></div>
									<div class="items">
										<li class="dropbtn top" data-name="IOS">IOS</li>
										<li class="dropbtn" data-name="Android">Android</li>
										<li class="dropbtn bot" data-name="Cross Platform">Cross Platform</li>
									</div>
								</div>
							</div>

						</div>
					</div>


				</div>

				<div class="dropdown">
					<li class="dropbtn main" data-name="Embedded">Embedded<i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></li>

					<div class="dropitems level-1">
						<div class="arrow up"></div>
						<div class="items">
							<li class="dropbtn top" data-name="Robotika">Robotika</li>
							<li class="dropbtn bot" data-name="IOT">IOT</li>
						</div>
					</div>
				</div>

				<div class="dropdown">
					<li class="dropbtn main" data-name="Jaringan">Jaringan<i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></li>

					<div class="dropitems level-1">
						<div class="arrow up"></div>
						<div class="items">
							<li class="dropbtn top" data-name="Network">Network</li>
							<li class="dropbtn bot" data-name="Cyber Security">Cyber Security</li>
						</div>
					</div>
				</div>

				<div class="dropdown">
					<li class="dropbtn main" data-name="Multimedia">Multimedia<i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></i></li>

					<div class="dropitems level-1">
						<div class="arrow up"></div>
						<div class="items">
							<li class="dropbtn top" data-name="Video">Video</li>
							<li class="dropbtn" data-name="Audio">Audio</li>
							<li class="dropbtn" data-name="Desain Grafis">Desain Grafis</li>
							<li class="dropbtn bot" data-name="UI-UX">UI/UX</li>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div class="body">
			<!-- AJAX ARTICLE.PHP -->
		</div>
	</div>

   <div id="black-bg"></div>
   <div class="container" id="survey">
		<div id="slideBtn">
			<button>
				<i class="fa fa-chevron-left show"></i>
				<i class="fa fa-chevron-right"></i>
				<h2>SURVEY</h2>
			</button>
		</div>
		<div class="body">
			<div class="layer-1">
            <h1>MASUKKAN NAMA ANDA</h1>
            <div class="layer-2">
               <div class="btn-box">
                  <input type="text" name="insert-name" placeholder="Masukkan Nama Anda..." >
               </div>
               <div class="btn-box">
                  <button data-nextpage="survey" class="nav btn">
                     <i class="fa fa-arrow-right"></i>
                     <!-- <i class="panah align-right">
                        <i class="buntut"></i>
                        <i class="kepala kanan"></i>
                     </i> -->
                  next
                  </button>
               </div>
            </div>
         </div>
		</div>
	</div>

   <div class="container" id="splash-screen">
		<div class="judul" id="title">
			<p>THE<br><span>PUNAKAWANS</span><hr></p>
		</div>	
	</div>

	<script type="module" src="<?= BASEURL; ?>/js/script.js"></script>
</body>

</html>