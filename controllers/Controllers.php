<?php

namespace Controllers;
use \Interop\Container\ContainerInterface as ContainerInterface;

Class Controllers{
	protected $ci;
	public function __construct(ContainerInterface $ci) {
		try {
			$this->ci = $ci;
		}catch (customException $e) {
			echo $e->errorMessage();
		}
	}

}
