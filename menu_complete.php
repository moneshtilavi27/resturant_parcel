<?php
    include("dbcon.php");
   
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $conn->query("SELECT * FROM  item WHERE itmnam LIKE '%".$searchTerm."%'");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['itmnam'];
    }
    
    //return json data
    echo json_encode($data);
?>