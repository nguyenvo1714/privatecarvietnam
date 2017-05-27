<?php
	namespace App\Repositories;

	use App\Transfer;

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

		public function top()
		{
			$tops = $this->transfer->where('is_hot', 1)->limit(6)->get();
			$this->getTransferType($tops);
			return $tops;
		}

		public function dealList($discount_flg = 1)
		{
			return $this->transfer->where('is_discount', $discount_flg)->get();
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
			return $interests;
		}

		public function findTransfer($transfer_name_id, $place_id)
		{
			return $this->transfer->where('transfer_name_id', $transfer_name_id)
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
			$transfer->transfer_name = $transfer->transfer_name
									->where('transfer_names.id', $transfer->transfer_name_id)
									->first();
			$transfer->place = $transfer->place
							->where('places.id', $transfer->place_id)
							->first();
			return $transfer;
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
	}