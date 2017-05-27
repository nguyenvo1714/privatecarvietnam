<?php
	namespace App\Repositories;

	use App\Car;

	/**
	* 
	*/
	class CarRepository
	{
		protected $car;

		public function __construct(Car $car)
		{
			$this->car = $car;
		}

		public function getCarByClass($class)
		{
			return $this->car->where('cars.class', $class)->first();
		}
	}
?>