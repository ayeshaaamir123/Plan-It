<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#"><b>Plan It</b></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
		aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="login.php">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="aboutus.php">About</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="contactus.php">Contact Us</a>
			</li>
            

		</ul>
		<div class="nav-item" style=" margin-left:50rem">
			<form method="POST" action="logout.php">
				    <button type="submit" class="btn">Logout</button>
                </form>
		</div>
	</div>
</nav>