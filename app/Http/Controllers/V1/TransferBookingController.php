<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmedEmail;
use App\Mail\MailBooking;
use App\TransferBooking;
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

    protected $rules = [
        'price' => 'required',
        'passenger' => 'required|numeric',
        'pickup_address' => 'required',
        'departure_date' => 'required|date',
        'departure_time' => 'required',
        'dropoff_address' => 'required',
        'name' => 'required',
        'surname' => 'required',
        'email' => 'required|email',
    ];


    /**
     * Show the form for creating a new resource.
     * @param string $name
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function bookForm(Request $request, $slug)
    {
        $price = base64_decode($request->token);
        $transferNames = $this->transferNameRepo->allT();
        $blogs = $this->blogRepo->footer();
        $transfer = $this->transferRepo->findSlug($slug);
        if ($transfer->is_discount == 1) {
            foreach ($transfer->cars as $car) {
                $car->price = $car->price - ($car->price * $transfer->discount_value) / 100;
            }
        }
        $selected = $this->transferRepo->selected($transfer, $price);
        return view('/sites.transferBookings.bookForm', [
            'transfer' =>  $transfer,
            'selected' => $selected,
            'blogs' => $blogs,
            'transferNames' => $transferNames,
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
        $this->validate($request, $this->rules);
        if ($request->departure_date < date('Y-m-d')) {
            $error = ['departure_date' => 'Departure date must be greater than or equal current date!'];
                return redirect()->back()
                        ->with($error);
        }
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
                if ( count(Mail::failures()) > 0 ) {
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

    public function mailBooking(Request $request)
    {
        if ($request->ajax()) {
            $input = $request->all();
            Mail::to('nguyenvo1714@gmail.com')
            ->send(new MailBooking($input));
            if (count(Mail::failures()) > 0) {
                $data = [
                    'success' => false,
                    'message' => 'An error has occured during process, please try again.'
                ];
            } else {
                $data = [
                    'success' => true,
                    'message' => 'Thanks you for your booking.'
                ];
            }
            return response()->json($data);
        } else {
            echo 'You are not allowed to access.';die;
        }
    }

}
