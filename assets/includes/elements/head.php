<?php


if(!isset($title)) { $title = "BSArmy"; }
if(!isset($description)) { $description = "The Barracks Army - Improving the barracks one little thing at a time."; }
if(!isset($image)) { $image = "https://bsarmy.com/assets/images/bsarmy.com_og-image.jpeg"; }
if(!isset($url)) { $url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; }
if(!isset($type)) { $type = "website"; }


// These variables aren't found in this file, but are defined before including this file on each page
echo <<<EOT
	<!-- Meta tags -->
	<!-- Cache version is used to force the browser to reload the page when the cache version changes,
	though it probably doesn't matter all that much because Cloudflare does its own caching for us -->
	<meta name="cache-version" content="$cacheVersion">

	<!-- Required by Bootstrap (https://getbootstrap.com/docs/5.3/getting-started/introduction/) -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content='$description'>
	<title>$title</title>

	<!-- Open Graph (https://ogp.me/) -->
	<meta property="og:title" content="$title" />
	<meta property="og:url" content="$url" />
	<meta property="og:type" content="$type" />
	<meta property="og:description" content='$description' />
	<meta property="og:locale" content="en_US" />
	<meta property="og:image" content="$image" />
	<meta property="og:image:secure_url" content="$image" />

	EOT;

	if($_SERVER['SERVER_NAME'] == "bsarmy.com") {
	echo <<<EOT
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-TRJJPB1GC1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-TRJJPB1GC1');
	</script>
	EOT;
	}

	echo <<<EOT

	

	<!-- PWA (https://web.dev/progressive-web-apps/) -->
	<link rel="manifest" href="/manifest.json">
	<script src="/service-worker.js"></script>


	<!-- Bootstrap (https://getbootstrap.com) -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="preload stylesheet" 
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" as="style">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
		integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
		crossorigin="anonymous" defer async as="script"> </script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
		crossorigin="anonymous" defer async as="script"></script>
		

		
	<!-- htmx (https://htmx.org/)-->
	<script src="https://unpkg.com/htmx.org@1.9.5"></script>

	<!-- Project CSS -->
	<link rel="preload stylesheet" href="/assets/css/fonts.css?$cacheVersion" as="style">
	<link rel="preload stylesheet" href="/assets/css/normalize.css?$cacheVersion" as="style">
	<link rel="preload stylesheet" href="/assets/css/style.css?$cacheVersion" as="style">
	
	<!-- Project JS -->
	<script src="/assets/js/script.js?$cacheVersion"></script>

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="57x57" href="/assets/icons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/assets/icons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/assets/icons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/assets/icons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/assets/icons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/assets/icons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/assets/icons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/assets/icons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="/assets/icons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/assets/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/assets/icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16x16.png">


	<!-- For Microsoft Edge -->
	<meta name="msapplication-TileColor" content="#f9d3c1">
	<meta name="msapplication-TileImage" content="/assets/icons/ms-icon-144x144.png">
	<meta name="theme-color" content="#20493c">


	<!-- FontAwesome 6.2.0 CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
		integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	
	<!-- (Optional) Use CSS or JS implementation -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
		integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>

EOT;

