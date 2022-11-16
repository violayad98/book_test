<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<title>Films app</title>



<script type="text/javascript"
	src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
<script type="text/javascript"
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
	integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
	crossorigin="anonymous"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
	integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
	crossorigin="anonymous"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
	integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
	crossorigin="anonymous"></script>


<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito"
	rel="stylesheet">

<!-- Styles -->
<link href="/assets/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	<div class="container-fluid">
		<!--
    <div id="app">
-->
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
			<div class="container">
				<a class="navbar-brand" href="/vendor/film_list.php"> Films app
				</a>
				<button class="navbar-toggler" type="button"
					data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false"
					aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">

					<ul class="navbar-nav me-auto">

					</ul>


					<ul class="navbar-nav ms-auto">

						<?php if (!isset($_SESSION['user'])): ?>
						<li class="nav-item"><a class="nav-link"
							href="/views/login.php">Login</a></li>

						<li class="nav-item"><a class="nav-link"
							href="/views/register.php">Registration</a></li>

						<?php else: ?>
						<li class="nav-item"><a class="nav-link"
							href="/vendor/film_list.php">Film list</a></li>
						<li class="nav-item"><a class="nav-link"
							href="/views/add_film.php">Add film</a></li>
						<li class="nav-item"><a class="nav-link"
							href="/views/import_film.php">Import films</a></li>
						<li class="nav-item"><a class="nav-link"
							href="/vendor/logout.php">Exit</a></li>
						<?php endif; ?>


					</ul>
				</div>
			</div>
		</nav>

		<main class="py-4">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header text-center">Login</div>

						<div class="card-body">
							<form method="POST" action="/login.php">


								<div class="row mb-3">
									<label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

									<div class="col-md-6">
										<input id="email" type="email" class="form-control "
											name="email" value="" required autocomplete="email" autofocus>

									</div>
								</div>

								<div class="row mb-3">
									<label for="password"
										class="col-md-4 col-form-label text-md-end">Password</label>

									<div class="col-md-6">
										<input id="password" type="password" class="form-control"
											name="password" required autocomplete="current-password">


									</div>

								</div>
								<div class='message d0 text-center'></div>


								<div class="row mb-0">
									<div class="col-md-2 offset-md-5">
										<button type="submit" class="btn btn-primary login-btn ">
											Submit</button>

									</div>

								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		</main>
		<!--
    </div>
-->
	</div>


</body>
</html>
<script src="/assets/js/jquery-3.4.1.min.js"></script>
<script src="/assets/js/main.js"></script>
