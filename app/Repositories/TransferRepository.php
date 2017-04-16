<?php
	namespace App\Repositories;

	// use App\Transfer;
	use Illuminate\Support\Facades\DB;

	/**
	* 
	*/
	class TransferRepository
	{
		
		protected $selectRaw = 'transfers.*,blogs.title, blogs.content, blogs.author,  types.name as type, places.name as target';

		public function getTransferById($id)
		{
			$transfer = DB::table('transfers')->select(DB::raw($this->selectRaw))
		    	->leftJoin('blogs', 'transfers.blog_id', '=', 'blogs.id')
		    	->leftJoin('types', 'transfers.type_id', '=', 'types.id')
		    	->leftJoin('places', 'transfers.place_id', '=', 'places.id')
		    	->where('transfers.id', $id)->first();
		    return $transfer;
		}
		public function getTransfers()
		{
			
			$transfers = DB::table('transfers')->select(DB::raw($this->selectRaw))
		    	->leftJoin('blogs', 'transfers.blog_id', '=', 'blogs.id')
		    	->leftJoin('types', 'transfers.type_id', '=', 'types.id')
		    	->leftJoin('places', 'transfers.place_id', '=', 'places.id')
		    	->paginate();
		    return $transfers;
		}
	}
?>