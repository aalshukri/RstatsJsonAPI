<?php
// RInterface object
class ProductXY{
 
	// private 
	private $rScript = "productxy.r";


	// constructor
	public function __construct()
	{}
 
	// product x y 
	public function product($x,$y)
	{
		$cmd = "Rscript ".dirname(__FILE__)."/".$this->rScript." $x $y";
		$output = shell_exec($cmd);
	
		$z = explode(" ", $output)[1];

		return $z;
	}
}

