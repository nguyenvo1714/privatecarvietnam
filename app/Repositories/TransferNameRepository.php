<?php
	namespace App\Repositories;

	use App\TransferName;
	use App\Pickup;
	use App\Place;
	use App\Type;

	/**
	* 
	*/
	class TransferNameRepository
	{
		protected $transfer_name;

		function __construct(TransferName $transfer_name)
		{
			$this->transfer_name = $transfer_name;
		}

		public function allT()
		{
			return $this->transfer_name->all();
		}

		public function allPi()
		{
			return Pickup::all();
		}

		public function allP()
		{
			return Place::all();
		}

		public function transferType($type_id, $limit)
		{
			return $this->transfer_name->where('type_id', $type_id)->limit($limit)->get();
		}

		public function paginate($type_id, $start, $perpage)
		{
			return $this->transfer_name->where('type_id', $type_id)
                                        ->orderBy('id', 'ASC')
                                        ->offset($start)
                                        ->limit($perpage)
                                        ->get();
		}

		public function findSlug($slug)
		{
			return $this->transfer_name->findBySlug($slug);
		}

		public function getTransferName($pickup)
		{
			return $this->transfer_name->where('name', ucwords($pickup))->first();
		}

		public function getPickUpName($pickup)
		{
			return Pickup::where('name', ucwords($pickup))->first();
		}

		public function getPlaceName($dropoff)
		{
			return Place::where('name', ucwords($dropoff))->first();
		}

		public function getType($type_id)
		{
			return Type::where('id', $type_id)->first();
		}

		public function count($type_id)
		{
			return $this->transfer_name->where('type_id', $type_id)->get()->count();
		}
	}