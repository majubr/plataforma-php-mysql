?php
	
	include "conexao.php"

	$id = $_GET['id'];

	$sql = "SELECT * FROM herpetofauna WHERE id  = $id";
                $buscar = mysqli_query($conn,$sql) ;

                while ($array =  mysqli_fetch_array($buscar)){

                    $especie = $array['especie'];
                    $latitude = $array['latitude'];
                    $longitude = $array['longitude'];

                
					$latitude = $_POST["latitude"];
					$longitude = $_POST["longitude"];
		

					<iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>&output=embed"></iframe>

		}
?>

