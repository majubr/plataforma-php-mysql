<?php include 'conexao.php' ?>

<?php  
// export.php

ini_set('default_charset', 'UTF-8');

if(isset($_POST["exportar"]))  
{  
    $conn = mysqli_connect("localhost", "root", "", "fauna");  
    mysqli_query($connect, "SET NAMES 'utf8'");
mysqli_query($connect, "SET CHARACTER SET utf8");

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=data.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('eventID', 'samplingProtocol', 'samplingEffort', 'sampleSizeValue', 'sampleSizeUnit', 'eventDate', 'eventRemarks', 'county', 'municipality', 'waterBody', 'locality', 'decimalLatitude', 'decimalLongitude', 'geodeticDatum'));  
    $query = "SELECT eventID, samplingProtocol, samplingEffort, sampleSizeValue, sampleSizeUnit, eventDate, eventRemarks, county, municipality, waterBody, locality, decimalLatitude, decimalLongitude, geodeticDatum from dw_mastofauna ORDER BY id DESC";  
    $result = mysqli_query($conn, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  
        // Convert row values to UTF-8 before exporting
        $row = array_map('utf8_encode', $row);
        
        fputcsv($output, $row);  
    }  
    fclose($output);  
}  
?>