<?php include 'conexao.php' ?>
<?php

$sql = "SELECT * FROM herpetofauna";
$busca = mysqli_query($conn, $sql);

while ($array =  mysqli_fetch_array($busca)) {

	$latitude = $array['latitude'];
	$longitude = $array['longitude'];



?>
	<iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>&output=embed"></iframe>


<?php
}
?>