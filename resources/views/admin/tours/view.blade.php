@extends('admin.layout.app')
@section('content')
	<div class="page-title">
        <div class="col-md-6 left-title">
            <h3>Tour</h3>
        </div>
        <div class="col-md-6 right-title">right title</div>
    </div>
    <div class="clearfix"></div>
    <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $tour->name }}</h2>
                    <div class="clearfix"></div>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="no-border">Tour type</td>
                            <td class="no-border">
                                {{ $tour->type_id->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>Tour name</td>
                            <td>{{ $tour->name }}</td>
                        </tr>
                        <tr>
                            <td>Interval</td>
                            <td>{{ $tour->interval }}</td>
                        </tr>
                        <tr>
                            <td>Start date</td>
                            <td>{{ $tour->startDate }}</td>
                        </tr>
                        <tr>
                            <td>End Date</td>
                            <td>{{ $tour->endDate }}</td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>{{ $tour->price }}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{ $tour->description }}</td>
                        </tr>
                        <tr>
                            <td>Tour program</td>
                            <td>{!! $tour->program !!}</td>
                        </tr>
                        <tr>
                            <td>Blog</td>
                            <td>{{ $tour->blog_id->title }}</td>
                        </tr>
                        <tr>
                            <td>Is discount</td>
                            <td>{{ $tour->isDiscount }}</td>
                        </tr>
                        <tr>
                            <td>Discount value</td>
                            <td>{{ $tour->discountValue }}</td>
                        </tr>
                        <tr>
                            <td>Created at</td>
                            <td>{{ $tour->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Updated at</td>
                            <td>{{ $tour->updated_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    <div id="enquirypopup" class="modal fade in" role="dialog">
        <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content row">
                <div class="modal-header custom-modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Enquire Now</h4>
                </div>
                <div class="modal-body">
                    <form name="info_form" class="form-inline" action="#" method="post">
                        <div class="form-group col-sm-12">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                        </div>
                        <div class="form-group col-sm-12">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group col-sm-12">
                            <input type="text" class="form-control" name="checkin" id="cheeckin" placeholder="Check-In Date">
                        </div>
                        <div class="form-group col-sm-12">
                            <input type="text" class="form-control" name="checkout" id="cheeckout" placeholder="Check-Out Date">
                        </div>
                        <div class="form-group col-sm-12">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone">
                        </div>
                        
                        <div class="form-group col-sm-12">
                            <textarea class="form-control" id="msg" name="msg" rows="4" placeholder="Enter Message"></textarea>
                        </div>
                        <div class="form-group col-sm-12">
                            <button type="submit" class="btn btn-default pull-right">Submit</button>
                        </div>
                    </form>
                </div>
                
            </div>
            
        </div>
    </div>
@endsection