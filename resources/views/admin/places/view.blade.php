@extends('admin.layout.app')
@section('content')
	<div class="page-title">
        <div class="col-md-6 left-title">
            <h3>Place</h3>
        </div>
        <div class="col-md-6 right-title">right title</div>
    </div>
    <div class="clearfix"></div>
    <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $place->name }}</h2>
                    <div class="clearfix"></div>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{ $place->name }}</td>
                            <td>&nbsp;</td>
                        </tr>
                        <!-- <tr>
                            <td>Is hot</td>
                            <td>{{ $place->isHot }}</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Is New</td>
                            <td>{{ $place->isNew }}</td>
                            <td>&nbsp;</td>
                        </tr> -->
                        <tr>
                            <td>Create at</td>
                            <td>{{ $place->created_at }}</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Update at</td>
                            <td>{{ $place->updated_at }}</td>
                            <td>&nbsp;</td>
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