<?php 

echo <<<EOT


	<header>
		
		<div class="navbar navbar-dark bg-dark-green shadow-sm">
			<div class="container">
				<a href="#" class="navbar-brand d-flex align-items-center">
					<img src="/assets/icons/logo.png" alt="bsarmy.com" height="80px" width="215">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
					aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
		</div>
		<div class="collapse bg-dark-green" id="navbarHeader">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-md-7 py-4">
						<h4 class="text-white">About</h4>
						
					</div>
					<div class="col-sm-4 offset-md-1 py-4">
						<h4 class="text-white">Contact</h4>
							<button class="btn btn-outline-light-tan" id="emailbutton">Email</button>
							<script>
								button = document.getElementById("emailbutton");
								// console.log(btoa("mailto:emailhehenoscammers"));
								// Decode the email address and set the href to it
								// This is to prevent bots from scraping the email address
								button.addEventListener("click", function() {
									window.location.href = atob("bWFpbHRvOmhpQGJzYXJteS5jb20=");
								});
							</script>
							<a href="/contact/" class="btn btn-light-tan disabled" id="contactButton" disabled>Contact Form</a>
							<!-- Below this is account related links -->
						<hr>
						<a href="/login/" class="btn btn-outline-light-tan">Login</a>
						<a href="/register/" class="btn btn-light-tan">Sign Up</a>

					</div>
					<div class="col-sm-4 offset-md-1 py-4">
						<!-- This is where the offset navbar will go when activated -->
					</div>
				</div>
			</div>
		</div>
	</header>

	EOT;




?>