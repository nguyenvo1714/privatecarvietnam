<?php
	namespace App\Repositories;

	use App\Transfer;
	use App\Pickup;
	use App\Place;
	use App\BookingCar;
	use App\Type;
	use DB;

	/**
	* 
	*/
	class TransferRepository
	{
		protected $transfer;

		public function __construct(Transfer $transfer)
		{
			$this->transfer = $transfer;
		}

		public function top($limit)
		{
			$tops = $this->transfer->where('is_hot', 1)->limit($limit)->get();
			$this->getTransferType($tops);
			$this->chop_content($tops);
			return $tops;
		}

		public function dealList($discount_flg = 1, $limit)
		{
			return $this->transfer->where('is_discount', $discount_flg)->paginate($limit);
		}

		public function topAjax($is_hot, $start, $perpage)
		{
			$tops = $this->transfer->where('is_hot', $is_hot)
									->orderBy('id', 'ASC')
                                    ->offset($start)
                                    ->limit($perpage)
                                    ->get();
            $this->getTransferType($tops);
            return $tops;
		}

		public function search_pickup($term)
		{
			return Pickup::where('name', 'LIKE', $term . '%')->get();
		}

		public function search_dropoff($term)
		{
			return Place::where('name', 'LIKE', $term . '%')->get();
		}

		public function totalHot($is_hot = 1)
		{
			return $this->transfer->where('is_hot', 1)->get()->count();

		}

		public function deal()
		{
			$deals = $this->transfer->where('is_discount', 1)->get();
			$this->getTransferType($deals);
			return $deals;
		}

		public function interest($limit, $is_hot = 1)
		{
			$interests = $this->transfer->where('is_hot', $is_hot)->limit($limit)->get();
			$this->getTransferType($interests);
			return $interests;
		}

		public function best_sell($limit)
		{
			$transfers = DB::table('booking_cars')
						->select(DB::raw('
							COUNT(booking_cars.id) as num,
							transfers.slug,
							transfers.type_id,
							transfers.title,
							transfers.duration,
							transfers.image_thumb
						'))
						->leftJoin('transfers', 'booking_cars.transfer_id', '=', 'transfers.id')
						->where('booking_cars.del_flg', '=', 0)
						->groupBy(DB::raw('
							transfers.slug,
							transfers.type_id,
							transfers.title,
							transfers.duration,
							transfers.image_thumb
						'))
						->havingRaw('COUNT(booking_cars.id) > 0')
						->orderBy(DB::raw('num'), 'desc')
						->limit($limit)
						->get();
			foreach ($transfers as $transfer) {
				$transfer->type = Type::where('id', $transfer->type_id)->first();
			}
			return $transfers;
		}

		public function relate($slug, $limit)
		{
			$transfer = $this->findSlug($slug);
			return $this->transfer->where('transfer_name_id', $transfer->transfer_name_id)
								->where('slug', '<>', $slug)
								->orderBy('id', 'desc')
								->limit($limit)
								->get();
		}

		public function getTransfer($limit, $transfer_name_id)
		{
			$interests = $this->transfer->where('transfer_name_id', $transfer_name_id)
										->limit($limit)
										->get();
			$this->getTransferType($interests);
			$this->chop_content($interests);
			return $interests;
		}

		public function findTransfer($pick_up_id, $place_id)
		{
			return  $this->transfer->where('pick_up_id', $pick_up_id)
								->where('place_id', $place_id)
								->first();
		}

		public function findById($id)
		{
			$transfer =  $this->transfer->find($id);
			$transfer->transfer_name = $transfer->transfer_name
									->where('transfer_names.id', $transfer->transfer_name_id)
									->first();
			$transfer->place = $transfer->place
							->where('places.id', $transfer->place_id)
							->first();
			return $transfer;
		}

		public function paginate($transfer_name_id, $start, $perpage)
		{
			$transfers = $this->transfer->where('transfer_name_id', $transfer_name_id)
                                        ->orderBy('id', 'ASC')
                                        ->offset($start)
                                        ->limit($perpage)
                                        ->get();
            $this->getTransferType($transfers);
            return $transfers;
		}

		public function findSlug($slug)
		{
			$transfer = $this->transfer->findBySlug($slug);
			if (! empty($transfer)) {
				$transfer->transfer_name = $transfer->transfer_name
									->where('transfer_names.id', $transfer->transfer_name_id)
									->first();
				$transfer->place = $transfer->place
								->where('places.id', $transfer->place_id)
								->first();
			}
			return $transfer;
		}

		public function selected($transfer, $price)
		{
			$selected = '';
			foreach ($transfer->cars as $car) {
				if($car->price == $price) {
					$selected = $car->price;
				}
			}
			return $selected;
		}

		public function count($transfer_name_id)
		{
			return $this->transfer->where('transfer_name_id', $transfer_name_id)->get()->count();
		}

		public function getTransferType($transfers)
	    {
	        foreach ($transfers as $transfer) {
	            $transfer->type = $transfer->type->where('id', $transfer->type_id)->first();
	        }
	    }

		public function crop_description($transfers)
		{
			foreach ($transfers as $transfer) {
				$transfer->description = substr($transfer->description, 0, 130) . '...';
			}
		}

		public function chop_content($transfers)
		{
			foreach ($transfers as $transfer) {
				$transfer->description = implode(' ', array_slice(explode(' ', $transfer->description), 0, 25));
			}
		}
	}