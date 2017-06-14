<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmedEmail;
use App\TransferBooking;
use App\Place;
use App\Blog;
use App\TransferName;
use App\Transfer;
use App\Car;
use App\Repositories\TransferRepository;
use App\Repositories\BlogRepository;
use App\Repositories\TransferNameRepository;
use App\Repositories\CarRepository;

class TransferBookingController extends Controller
{
    protected $transferRepo;
    protected $blogRepo;
    protected $transferNameRepo;
    protected $carRepo;

    public function __construct(
        TransferRepository $transferRepo,
        BlogRepository $blogRepo,
        TransferNameRepository $transferNameRepo,
        CarRepository $carRepo
    )
    {
        $this->transferRepo = $transferRepo;
        $this->blogRepo = $blogRepo;
        $this->transferNameRepo = $transferNameRepo;
        $this->carRepo = $carRepo;
    }

    /**
     * Show the form for creating a new resource.
     * @param string $name
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function bookForm(Request $request, $slug, $class)
    {
        $transferNames = $this->transferNameRepo->allT();
        $blogs = $this->blogRepo->footer();
        $car = $this->carRepo->getCarByClass($class);
        $transfer = $this->transferRepo->findSlug($slug);
        return view('/sites.transferBookings.bookForm', [
            'transfer' =>  $transfer,
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'car' => $car,
            'confirms' => $request->all()
        ]);
    }

    /**
     * Show the confirmed information.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function confirmation(Request $request)
    {
        $transferNames = $this->transferNameRepo->allT();
        $blogs = $this->blogRepo->footer();
        $transfer = $this->transferRepo->findById($request->id);
        return view('/sites.transferBookings.confirmation', [
            'transfer' =>  $transfer,
            'blogs' => $blogs,
            'transferNames' => $transferNames,
            'register' => $request->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function complete(Request $request)
    {
        if($request->ajax()) {
            $transferBooking = new TransferBooking;
            $input = $request->all();
            $result = $transferBooking->create($input);
            if($result->id) {
                Mail::to($request->email)
                ->bcc(env('MAIL_FROM_ADDRESS'))
                ->send(new ConfirmedEmail($input));
                if( count(Mail::failures()) > 0 ) {
                    echo 'check error';die;
                    foreach ($Mail::failures as $failure) {
                        echo $failure . '<br>';
                    } die;
                } else {
                    $data = [
                        'success' => true,
                        'message' => 'Thanks you for your confirmation, please check your email about transfered booking.'
                    ];
                    return response()->json($data);
                }
            } else {
                $data = [
                    'success' => true,
                    'message' => 'An error has occured during process, please try again.'
                ];
                return response()->json($data);
            }
        } else {
            echo '404 not found';
        }
    }

}
