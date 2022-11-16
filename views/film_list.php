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
<link href="/css/app.css'" rel="stylesheet">
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
			<div class='col-md-4 col-12 mb-4'>
				<div class="card p-4">
					<form id="contact" action="" method="post"
						class=' form-group col-12'>

						<legend class="mt-1 ">Sort by :</legend>

						<div class="form-check">
							<input type="radio" class="form-check-input" name="sort"
								value="name_up"
								<?= !empty($_POST['sort'])&& $_POST['sort']=='name_up' ?'checked':''; ?>>
							<label class="form-check-label">Name(A-Z) </label>
						</div>
						<div class="form-check">
							<input type="radio" class="form-check-input" name="sort"
								value="name_down"
								<?= !empty($_POST['sort'])&& $_POST['sort']=='name_down' ?'checked':''; ?>>
							<label class="form-check-label">Name(Z-A)</label>
						</div>

						<div class="form-check">
							<input type="radio" class="form-check-input" name="sort"
								value="year"
								<?= !empty($_POST['sort'])&& $_POST['sort']=='year' ?'checked':''; ?>>
							<label class="form-check-label">Year</label>
						</div>

						<h5 class="text-center  mt-4">Found by</h5>

						<div class="row mb-3">
							<label for="email" class="col-md-3 col-form-label text-md-end">Film
								name</label>

							<div class="col-md-6">
								<input id="email" type="text" class="form-control " name="film"
									value="<?= !empty($_POST['film'])?$_POST['film']:''; ?>">

							</div>
						</div>
						<div class="row mb-3">
							<label for="email" class="col-md-3 col-form-label text-md-end">Actors</label>

							<div class="col-md-6">
								<input id="email" type="text" class="form-control " name="actor"
									value="<?= !empty($_POST['actor'])?$_POST['actor']:''; ?>">

							</div>
						</div>
						<div class="row mb-0">
							<div class="col-md-2 offset-md-4">
								<button type="submit" class="btn btn-primary  ">Find</button>

							</div>

						</div>
					</form>
				</div>
			</div>


			<div class=" col-md-8 col-12">
          <?php foreach($array as $key=>$value): ?>
            <div class="card mb-4">
					<div class="row">
						<div class="col-12 ">
							<div class="card-body">
								<h5 class="card-title text-center"><?= $value['name']; ?></h5>
								<h6 class="card-text  ">Year:<?= $value['year']; ?></h6>
								<h6 class="card-text  ">Format:<?= $value['format']; ?></h6>
								<h6 class="card-text  ">Actors:<?php foreach($value['actors'] as $actor): ?><?= $actor['name']; ?>, <?php endforeach; ?></h6>
								<div class="row">
									<div class="col-md-6 offset-md-3 ">
										<a type="button"
											href="../vendor/film_info.php?id=<?= $value['id']; ?>"
											class="btn btn-outline-primary mx-auto d-block">Show info </a>
									</div>
								</div>

							</div>

						</div>


					</div>


				</div>
         <?php endforeach; ?>
</div>
		</div>




		<script src="/assets/js/jquery-3.4.1.min.js"></script>
		<script src="/assets/js/main.js"></script>

</body>
</html>

