<?php
require('connection.php');
require('functions.php');
?>


<!DOCTYPE php>


<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Udema a modern educational site template">
    <meta name="author" content="Ansonika">
    <title>UDEMA | Modern Educational site template</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">
	<link href="css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

    <title>Udema</title>
</head>
<body>
<header class="header menu_2">
		<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->
		<div id="logo">
			<a href="index.php"><img src="img/logo.png" width="149" height="42" data-retina="true" alt=""></a>
		</div>
		<ul id="top_menu">

		 <?php if(isset($_SESSION['USER_LOGIN'])){
                                            
                                            echo	'
			<li><a href="#0" class="search-overlay-menu-btn">Search</a></li>
			<li class="hidden_tablet"><a href="admission.php" class="btn_1 rounded">Admission</a></li>';
                                            
										}else{
										echo	'<li><a href="login.php" class="login">Login</a></li>
			<li><a href="#0" class="search-overlay-menu-btn">Search</a></li>
			<li class="hidden_tablet"><a href="admission.php" class="btn_1 rounded">Admission</a></li>';
										}
										?>		
			
		</ul>
		<!-- /top_menu -->
		<a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a>
		<nav id="menu" class="main-menu">
			<ul>
				<li><span><a href="index.php">Home</a></span>
					<!-- <ul>
						<li><a href="index.php">Home version 1</a></li>
						<li><a href="index-2.php">Home version 2</a></li>
						<li><a href="index-6.php">Home version 3</a></li>
						<li><a href="index-3.php">Home version 4</a></li>
						<li><a href="index-4.php">Home version 5</a></li>
						<li><a href="index-5.php">With Cookie bar (EU law)</a></li>
					</ul> -->
				</li>
				<li><span><a href="courses-grid.php">Courses</a></span>
				
					<!-- <ul>
						<li><a href="courses-grid.php">Courses grid</a></li>
						<li><a href="courses-grid-sidebar.php">Courses grid sidebar</a></li>
						<li><a href="courses-list.php">Courses list</a></li>
						<li><a href="courses-list-sidebar.php">Courses list sidebar</a></li>
						<li><a href="course-detail.php">Course detail</a></li>
                        <li><a href="course-detail-2.php">Course detail working form</a></li>
						<li><a href="admission.php">Admission wizard</a></li>
						<li><a href="teacher-detail.php">Teacher detail</a></li>
					</ul> -->
				</li>
				<li>
				<?php if(isset($_SESSION['USER_LOGIN'])){?>
				
				<span><a href="#">Hi, <?php echo $_SESSION['USER_NAME']?></a></span>
				
					<ul>
						<li><a href="profile.php">Profile</a></li>
						<li><a href="logout.php">Logout</a></li>
						<!-- <li><a href="courses-list.php">Courses list</a></li>
						<li><a href="courses-list-sidebar.php">Courses list sidebar</a></li>
						<li><a href="course-detail.php">Course detail</a></li>
                        <li><a href="course-detail-2.php">Course detail working form</a></li>
						<li><a href="admission.php">Admission wizard</a></li>
						<li><a href="teacher-detail.php">Teacher detail</a></li> -->
					</ul>
					<?php } ?>
				</li>
								
				<!-- <li><span><a href="#0">Pages</a></span>
					<ul>
						<li><a href="#0">Menu 2</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="blog.php">Blog</a></li>
						<li><a href="login.php">Login</a></li>
						<li><a href="register.php">Register</a></li>
						<li><a href="contacts.php">Contacts</a></li>
						<li><a href="404.php">404 page</a></li>
						<li><a href="agenda-calendar.php">Agenda Calendar</a></li>
						<li><a href="faq.php">Faq</a></li>
						<li><a href="help.php">Help</a></li>
					</ul>
				</li> -->
				<!-- <li><span><a href="#0">Extra Pages</a></span>
					<ul>
						<li><a href="media-gallery.php">Media gallery</a></li>
						<li><a href="cart-1.php">Cart page 1</a></li>
						<li><a href="cart-2.php">Cart page 2</a></li>
						<li><a href="cart-3.php">Cart page 3</a></li>
						<li><a href="pricing-tables.php">Responsive pricing tables</a></li>
						<li><a href="coming_soon/index.php">Coming soon</a></li>
						<li><a href="icon-pack-1.php">Icon pack 1</a></li>
						<li><a href="icon-pack-2.php">Icon pack 2</a></li>
						<li><a href="icon-pack-3.php">Icon pack 3</a></li>
						<li><a href="icon-pack-4.php">Icon pack 4</a></li>
					</ul>
				</li> -->
				<!-- <li><span><a href="#0">Buy template</a></span></li> -->
			</ul>
		</nav>
		<!-- Search Menu -->
		<div class="search-overlay-menu">
			<span class="search-overlay-close"><span class="closebt"><i class="ti-close"></i></span></span>
			<!-- <form role="search" id="searchform" method="get" action="search.php"> -->
			<form method="get" action="search.php">
				<input value="" name="str" type="search" placeholder="Search..." />
				<button type="submit"><i class="icon_search"></i>
				</button>
			</form>
		</div><!-- End Search Menu -->
	</header>
    
</body>
</php>