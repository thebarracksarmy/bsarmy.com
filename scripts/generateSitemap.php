<?php

// Generate sitemap from the root directory of the website
// Downloads it as sitemap.xml

$pages = [
	"/",
	"/DFAC/",
	"/login/",
	"/register/",
	"/docs/terms_conditions/"
];

$lastModified = [];
for ($i = 0; $i < count($pages); $i++) {
	$lastModified[$i] = date('Y-m-d\TH:i:s',filemtime($pages[$i]."index.php"));
}

$priority = [
	"1.0",
	"0.9",
	"0.8",
	"0.8",
	"0.7"
];

$start = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

$echo = "";

for ($i = 0; $i < count($pages); $i++) {

	$echo .= <<<EOT
	<url>
		<loc>https://bsarmy.com$pages[$i]</loc>
		<lastmod>$lastModified[$i]</lastmod>
		<priority>$priority[$i]</priority>
	</url>

EOT;
}

$end = "</urlset>";

header("Content-type: text/xml");
header("Content-Disposition: attachment; filename=\"sitemap.xml\"");
header("Pragma: no-cache");
header("Expires: 0");


echo $start.$echo.$end;

?>