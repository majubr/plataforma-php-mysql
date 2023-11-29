<?php include 'conexao.php' ?>
<?php
include 'conexao.php';

ini_set('default_charset', 'UTF-8');

if(isset($_POST["exportar"]))  
{
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=data.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('eventID', 'samplingProtocol', 'samplingEffort', 'sampleSizeValue', 'sampleSizeUnit', 'eventDate', 'eventRemarks', 'county', 'municipality', 'waterBody', 'locality', 'decimalLatitude', 'decimalLongitude', 'geodeticDatum'));  
    $query = "SELECT eventID, samplingProtocol, samplingEffort, sampleSizeValue, sampleSizeUnit, eventDate, eventRemarks, county, municipality, waterBody, locality, decimalLatitude, decimalLongitude, geodeticDatum FROM dw_herpetofauna ORDER BY id DESC";  
    $result = $conn->query($query);
    while($row = $result->fetch(PDO::FETCH_ASSOC))  
    {  
        // Convert row values to UTF-8 before exporting
        $row = array_map('utf8_encode', $row);
        
        fputcsv($output, $row);  
    }  
    fclose($output);  
}  
?>
