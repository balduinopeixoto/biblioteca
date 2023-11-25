<?php

function conectar(){// declaramos a funcção cadastrar

$usuario="root";
$senha="root";
$host="mysql:host=localhost;dbname=biblioteca";
try{

$utf=array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8');
$conexao=new PDO($host,$usuario,$senha,$utf);
return $conexao;

}catch(PDOException $e){
	echo $e;
}


}


?>