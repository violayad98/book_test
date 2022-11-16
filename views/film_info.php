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
				<a class="navbar-brand" href="/vendor/film_list.php"> Films app </a>
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

						<li class="nav-item"><a class="nav-link" href="/vendor/logout.php">Exit</a>
						</li>
                       <?php endif; ?>

                
            </ul>
				</div>
			</div>
		</nav>

		<div class=' py-4 row'>



			<div class=" col-md-8 offset-md-2 col-12">

				<div class="card mb-4">
					<div class="row">
						<div class="col-12 ">
							<div class="card-body">
								<h5 class="card-title text-center"><?= $film->name; ?></h5>
								<h6 class="card-text  ">Year:<?= $film->year; ?></h6>
								<h6 class="card-text  ">Format:<?= $film->format; ?></h6>
								<h6 class="card-text  ">Actors:<?php foreach($film->actors as $actor): ?><?= $actor['name']; ?>, <?php endforeach; ?></h6>
 <?php if ($_SESSION['user']['id']==$film->user_id): ?>
								<div class="row">
									<div class="col-md-6 offset-md-3 ">
										<a type="button"
											href="../vendor/delete_film.php?id=<?= $film->id; ?>"
											class="btn btn-outline-danger mx-auto d-block">Delete film </a>
									</div>
								</div>
							<?php endif; ?>	
							</div>

						</div>


					</div>


				</div>
			</div>
		</div>




		<script src="/assets/js/jquery-3.4.1.min.js"></script>
		<script src="/assets/js/main.js"></script>

</body>
</html>

