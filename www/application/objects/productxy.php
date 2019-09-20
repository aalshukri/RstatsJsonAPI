<?php
// RInterface object
class ProductXY{
 
	// private 
	private $rScript = "productxy.r";


	// constructor
	public function __construct()
	{}
 
	// emailExists
	public function product($x,$y)
	{
		$cmd = "Rscript ".dirname(__FILE__)."/".$this->rScript." $x $y";
	
		//exec($cmd,$output,$return_var);
		$output = shell_exec($cmd);
		//$output = shell_exec("Rscript /var/www/html/application/objects/productxy.r 10 20 2>$1");
		//$output = shell_exec("Rscript /var/www/html/application/objects/productxy.r 10 20");

		//print_r($cmd);
		//echo"\n";
		//print_r($output);
		//echo"\n";
		//print_r($return_var);
		//echo"\n";
	
		$z = explode(" ", $output)[1];

		return $z;
	}
}

