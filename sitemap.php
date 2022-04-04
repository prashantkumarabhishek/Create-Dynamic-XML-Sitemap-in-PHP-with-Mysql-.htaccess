<?php
include("connection.php");
//suppose your website is example.com
$website_domain="https://www.example.com";

// Sitemap Setting for XML result
header("Content-Type: application/xml; charset=utf-8"); 
echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; 
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' .PHP_EOL; 
 
function urlElement($url) {
echo '<url>'.PHP_EOL; 
echo '<loc>'.$url.'</loc>'. PHP_EOL; 
echo '<changefreq>weekly</changefreq>'.PHP_EOL; 
echo '</url>'.PHP_EOL;
}
//

$sql = "SELECT * FROM url_list";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $url= $website_domain. "/" . $row["url"];
	  urlElement($url);  
  }
} else {
  echo "0 results";
}
$conn->close();

echo '</urlset>'; 
?>
  