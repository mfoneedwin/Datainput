<?php
	$user = 'root';
    $dbname = 'database';
    $pass = 'meiyi124';
    $host = 'localhost';
    $dns = '';
    $pdo = '';


    $dns = sprintf('mysql:host=%s;dbname=%s',$host,$dbname);
        $pdo = new PDO($dns,$user,$pass);
        $products= array();
        $sql = 'SELECT * FROM `student`';
        $stm = $pdo -> prepare($sql);
        $stm->execute();
        while($row = $stm->fetch(PDO::FETCH_ASSOC)){
            $products[] = $row;
        }
        // $this->pdo = null;	


	// $conectError = 'Sorry there\'s a conection error. Plaese check your database name';
	// mysql_connect('localhost','root','') or die($conectError);
	// mysql_select_db('database') or die($conectError);

	// $data = array();
	// $query = mysql_query("SELECT * FROM `student`");
	// while ($row = mysql_fetch_assoc($query)) {
	// 	$data [] = $row;		
	// }	
	

	print_r($products);
