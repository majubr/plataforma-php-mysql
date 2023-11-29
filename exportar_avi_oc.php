<?php include 'conexao.php' ?>
<?php  
      //export.php  
 if(isset($_POST["exportar"]))  
 {  
    
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('id', 'eventID', 'occurrenceID', 'basisOfRecord', 'scientificName', 'kingdom', 'phylum', 'class', 'order_', 'family', 'taxonRank', 'identificationQualifier', 'recordedBy', 'individualCount', 'sex', 'lifeStage', 'reproductiveCondition', 'preparations', 'occurrenceRemarks'));  
      $query = "SELECT * from dw_oc_avifauna ORDER BY id DESC";  
      $result = mysqli_query($conn, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?> 