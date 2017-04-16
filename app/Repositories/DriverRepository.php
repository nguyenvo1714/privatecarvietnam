<?php
	namespace App\Repositories;

	use App\Driver;
	use Illuminate\Support\Facades\DB;

	/**
	* 
	*/
	class DriverRepository
	{
		public function all()
		{
			return Driver::paginate();
		}

		public function getDriverById($id)
		{
			return Driver::findOrFail($id);
		}
	}
?>