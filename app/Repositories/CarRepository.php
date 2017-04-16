<?php
	namespace App\Repositories;

	use App\Car;
	use Illuminate\Support\Facades\DB;

	/**
	* 
	*/
	class CarRepository
	{
		public function all()
		{
			return Car::paginate();
		}

		public function getCarById($id)
		{
			return Car::findOrFail($id);
		}
	}
?>