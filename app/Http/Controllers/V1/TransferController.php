<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactInfo;
use App\Repositories\TransferRepository;
use App\Repositories\BlogRepository;
use App\Repositories\TransferNameRepository;

class TransferController extends Controller
{
    protected $transferRepo;
    protected $blogRepo;
    protected $transferNameRepo;

    public function __construct(
        TransferRepository $transferRepo,
        BlogRepository $blogRepo,
        TransferNameRepository $transferNameRepo
    )
    {
        $this->transferRepo = $transferRepo;
        $this->blogRepo = $blogRepo;
        $this->transferNameRepo = $transferNameRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transfers = $this->transferRepo->top(4);
        $perpage = 6;
        $total_pages = (int)ceil($this->transferRepo->totalHot() / $perpage);
        $dealTransfers = $this->transferRepo->deal();
        $blogs = $this->blogRepo->footer();
        $transferNames = $this->transferNameRepo->allT();
        $pick_ups = $this->transferNameRepo->allPi();
        $places = $this->transferNameRepo->allP();
        return view('/sites.index', [
            'transfers' => $transfers,
            'dealTransfers' => $dealTransfers,
            'blogs' => $blogs,
            'pick_ups' => $pick_ups,
            'transferNames' => $transferNames,
            'places' => $places,
            'total_pages' => $total_pages,
            'perpage' => $perpage,
        ]);
    }

    public function getPickup (Request $request)
    {
        if($request->ajax()) {
            var_dump($request);die;
            $term = $request->keyword;

        }
    }

    public function topAjax(Request $request)
    {
        if($request->ajax()) {
            $start = $request->page * $request->perpage;
            $tops = $this->transferRepo->topAjax($request->is_hot, $start, $request->perpage);
            if($tops->count() > 0) {
                $response = [
                    'success' => true,
                    'data' => $tops
                ];
                return response()->json($response);
            } else {
                $response = [
                    'success' => false,
                    'data' => '404 not found'
                ];
                return response()->json($response);
            }
        } else {
            $response = [
                'success' => false,
                'data' => '404 not found'
            ];
            return response()->json($response);
        }
    }

    /**
     * Display contact form.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $blogs = $this->blogRepo->footer();
        $transferNames = $this->transferNameRepo->allT();
        $pick_ups = $this->transferNameRepo->allPi();
        $places = $this->transferNameRepo->allP();
        return view('/sites.transfers.contact', [
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'pick_ups' => $pick_ups,
            'places' => $places
        ]);
    }

    /**
     * Send a contac info to admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendContact(Request $request)
    {
        if($request->ajax()) {
            $input = $request->all();
            Mail::to(env('MAIL_FROM_ADDRESS'))
                ->send(new ContactInfo($input));
                if( count(Mail::failures()) > 0 ) {
                    echo 'check error';die;
                    foreach ($Mail::failures as $failure) {
                        echo $failure . '<br>';
                    } die;
                } else {
                    $data = [
                        'success' => true,
                        'message' => 'Thanks you for your contact, we will response you soon.'
                    ];
                    return response()->json($data);
                }
        } else {
            $data = [
                'success' => false,
                'message' => 'An error has occured during process, please try again.'
            ];
            return response()->json($data);
        }
    }

    /**
     * Show the record of private transfer.
     *
     * @return \Illuminate\Http\Response
     */
    public function privateTransfer()
    {
        $blogs = $this->blogRepo->footer();
        $transferNames = $this->transferNameRepo->allT();
        $pick_ups = $this->transferNameRepo->allPi();
        $places = $this->transferNameRepo->allP();
        $perpage = 4;
        $type = 4;
        $total_pages = (int)ceil($this->transferNameRepo->count($type) / $perpage);
        $privateTransfers = $this->transferNameRepo->transferType($type, 4);
        $interestTransfers = $this->transferRepo->interest(4);
        return view('/sites.transfers.privateTransfers', [
            'privateTransfers' => $privateTransfers,
            'total_pages' => $total_pages,
            'perpage' => $perpage,
            'type' => $type,
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'pick_ups' => $pick_ups,
            'places' => $places,
            'interestTransfers' => $interestTransfers
        ]);
    }

    public function transferAjax(Request $request)
    {
        if($request->ajax()) {
            $start = $request->page * $request->perpage;
            $transfers = $this->transferNameRepo->paginate($request->type_id, $start, $request->perpage);
            if($transfers->count() > 0) {
                $response = [
                    'success' => true,
                    'data' => $transfers
                ];
                return response()->json($response);
            } else {
                $response = [
                    'success' => false,
                    'data' => '404 not found'
                ];
                return response()->json($response);
            }
        } else {
            $response = [
                'success' => false,
                'data' => '404 not found'
            ];
            return response()->json($response);
        }
    }

    /**
     * Show the info of airport transfer.
     *
     * @return \Illuminate\Http\Response
     */
    public function airportTransfer()
    {
        $blogs = $this->blogRepo->footer();
        $transferNames = $this->transferNameRepo->allT();
        $pick_ups = $this->transferNameRepo->allPi();
        $places = $this->transferNameRepo->allP();
        $perpage = 4;
        $type = 3;
        $total_pages = (int)ceil($this->transferNameRepo->count($type) / $perpage);
        $airportTransfers = $this->transferNameRepo->transferType($type, 4);
        $interestTransfers = $this->transferRepo->interest(4);
        return view('/sites.transfers.airportTransfers', [
            'airportTransfers' => $airportTransfers,
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'pick_ups' => $pick_ups,
            'places' => $places,
            'total_pages' => $total_pages,
            'perpage' => $perpage,
            'type' => $type,
            'interestTransfers' => $interestTransfers
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $name,
     * @param  int $type_id,
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function viewTransfer($slug)
    {
        $blogs = $this->blogRepo->footer();
        $transferNames = $this->transferNameRepo->allT();
        $pick_ups = $this->transferNameRepo->allPi();
        $places = $this->transferNameRepo->allP();
        $interestTransfers = $this->transferRepo->interest(4);
        $transfer_name = $this->transferNameRepo->findSlug($slug);
        $transfers = $this->transferRepo->getTransfer(6, $transfer_name->id);
        $perpage = 6;
        $total_pages = (int)ceil($this->transferRepo->count($transfer_name->id) / $perpage);
        return view('/sites.transfers.viewTransfers', [
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'pick_ups' => $pick_ups,
            'places' => $places,
            'interestTransfers' => $interestTransfers,
            'transfers' => $transfers,
            'name' => $slug,
            'transfer_name' => $transfer_name,
            'perpage' => $perpage,
            'total_pages' => $total_pages,
        ]);
    }

    public function viewTransferAjax(Request $request)
    {
        if($request->ajax()) {
            $start = $request->page * $request->perpage;
            $transfers = $this->transferRepo->paginate($request->transfer_name_id, $start, $request->perpage);
            if($transfers->count() > 0) {
                $response = [
                    'success' => true,
                    'data' => $transfers
                ];
                return response()->json($response);
            } else {
                $response = [
                    'success' => false,
                    'data' => '404 not found'
                ];
                return response()->json($response);
            }
        } else {
            $response = [
                'success' => false,
                'data' => '404 not found'
            ];
            return response()->json($response);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string $name,
     * @param  int $type_id,
     * @param  int $id,
     * @return \Illuminate\Http\Response
     */
    public function viewAirportTransfer($slug)
    {
        $blogs = $this->blogRepo->footer();
        $transferNames = $this->transferNameRepo->allT();
        $pick_ups = $this->transferNameRepo->allPi();
        $places = $this->transferNameRepo->allP();
        $interestTransfers = $this->transferRepo->interest(4);
        $transfer_name = $this->transferNameRepo->findSlug($slug);
        $transfers = $this->transferRepo->getTransfer(6, $transfer_name->id);
        $perpage = 6;
        $total_pages = (int)ceil($this->transferRepo->count($transfer_name->id) / $perpage);
        return view('/sites.transfers.viewAirportTransfers', [
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'pick_ups' => $pick_ups,
            'places' => $places,
            'interestTransfers' => $interestTransfers,
            'transfers' => $transfers,
            'name' => $slug,
            'transfer_name' => $transfer_name,
            'perpage' => $perpage,
            'total_pages' => $total_pages,
        ]);
    }

    /**
     * View detail the specified resource.
     *
     * @param  string  $name
     * @param  string  $transferName_id
     * @param  string  $title
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailTransfer($slug)
    {
        $blogs = $this->blogRepo->footer();
        $transferNames = $this->transferNameRepo->allT();
        $pick_ups = $this->transferNameRepo->allPi();
        $places = $this->transferNameRepo->allP();
        $interestTransfers = $this->transferRepo->interest(4);
        $transfer = $this->transferRepo->findSlug($slug);
        $relates = $this->transferRepo->relate($slug, 4);
        return view('/sites.transfers.detailTransfer', [
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'pick_ups' => $pick_ups,
            'places' => $places,
            'interestTransfers' => $interestTransfers,
            'transfer' => $transfer,
            'name' => $slug,
            'relates' => $relates
        ]);
    }

    /**
     * View detail the specified resource.
     *
     * @param  string  $name
     * @param  string  $transferName_id
     * @param  string  $title
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailAirportTransfer($slug)
    {
        $blogs = $this->blogRepo->footer();
        $transferNames = $this->transferNameRepo->allT();
        $places = $this->transferNameRepo->allP();
        $interestTransfers = $this->transferRepo->interest(4);
        $transfer = $this->transferRepo->findSlug($slug);
        $relates = $this->transferRepo->relate($slug, 4);
        return view('/sites.transfers.detailAirportTransfer', [
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'places' => $places,
            'interestTransfers' => $interestTransfers,
            'transfer' => $transfer,
            'name' => $slug,
            'relates' => $relates
        ]);
    }

    /**
     * Find a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function findTransfer(Request $request)
    {
        if($request->ajax()) {
            $pick_up = $this->transferNameRepo->getPickUpName($request->pickup);
            var_dump($pick_up);die;
            $place = $this->transferNameRepo->getPlaceName($request->dropoff);
            $transfer = $this->transferRepo->findTransfer($pick_up->id, $place->id);
            if($transfer) {
                $type = $this->transferNameRepo->getType($transfer->type_id)->slug;
                $response = [
                    'success' => true,
                    'type' => $type,
                    'slug' => $transfer->slug
                ];
                return response()->json($response);
            } else {
                $response = [
                    'success' => false,
                    'data' => '404 not found'
                ];
                return response()->json($response);
            }
        } else {
            $response = [
                'success' => false,
                'data' => '404 not found'
            ];
            return response()->json($response);
        }
    }

    public function deal()
    {
        $deals = $this->transferRepo->dealList(1, 6);
        $blogs = $this->blogRepo->footer();
        $transferNames = $this->transferNameRepo->allT();
        $pick_ups = $this->transferNameRepo->allPi();
        $places = $this->transferNameRepo->allP();
        return view('/sites.transfers.deal', [
            'deals' => $deals,
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'pick_ups' => $pick_ups,
            'places' => $places
        ]);
    }
}
