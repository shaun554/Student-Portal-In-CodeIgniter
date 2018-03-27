<?php
	
	try{
		$db = $_GET["db"];
		$conn = new PDO("mysql:host=localhost;dbname=$db;","root","root");
		$stmt = $conn->prepare("show tables;");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$table_names = array();
		for($i=0;$i<=count($result)-1;$i++){
			array_push($table_names, $result[$i]["Tables_in_$db"]);
		}
		$search_query = $_GET["query"];
		for($i=0;$i<=count($table_names)-1;$i++){
			$stmt = $conn->prepare("DESC ".$table_names[$i]);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$column_names = array();

			for($j=0;$j<=count($result)-1;$j++){
				array_push($column_names, $result[$j]["Field"]);
			}
			$get_query = "SELECT * FROM $table_names[$i] WHERE ";
			for($k=0;$k<=count($column_names)-2;$k++){
				$get_query .= $column_names[$k]." = '$search_query' OR ";
			}
			$get_query .= $column_names[count($column_names)-1]." = '$search_query' ;";
			$stmt = $conn->prepare($get_query);
			$stmt->execute();
			$result = $stmt->fetchAll();
			print_r($result);
		}
	}
	catch(PDOException $e){
		echo "Error";
	}

?>