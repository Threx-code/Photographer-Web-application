<?php
use Controller\Controller as Controller;
use Controller\Validator as Validator;
class Booking extends Controller{

	use Validator; 
	public function index(){
		
	}

	

	public function create(){
		$this->model("BookingModel");

		if(isset($_POST['post_book'])){
			$this->sanitizeString($_POST['post_book']);
			if($this->checkToken($_POST['crfToken'])){
				if($this->allNameChecker($_POST['fullname'], "Fullname")){
					if($this->phoneChecker($_POST['phoneNumber'], "Phone Number")){
						if($this->emailExpression($_POST['email_address'], "Email")){
							if($this->selectChecker($_POST['book_type'], "Select Booking Type")){
								if($this->otherOptions($_POST['book_type'], $_POST['other_book'], "Other")){
									if($this->dateOption($_POST['date'], "Date")){
										if($this->selectChecker($_POST['state'], "State")){
											if($this->selectChecker($_POST['lcda_name'], "LCDA")){
												if(!BookingModel::where('fullname', $_POST['fullname'])
												->where('phone_number', $_POST['phoneNumber'])
												->where('booking_email', $_POST['email_address'])
												->where('type_of_booking', $_POST['book_type'])
												->orwhere('type_of_booking', $_POST['other_book'])
												->where('booking_date', $_POST['date'])
												->where('state', $_POST['state'])
												->where('lcda', $_POST['lcda_name'])->count()){

													if(!empty($_POST['other_book'])){
														$_POST['book_type'] = $_POST['other_book'];
													}
													else{
														$_POST['book_type'] = $_POST['book_type'];
													}

													if(BookingModel::create([
														'fullname'=> $_POST['fullname'],
										        'phone_number'=> $_POST['phoneNumber'],
										        'booking_email'=> $_POST['email_address'],
										        'type_of_booking'=> $_POST['book_type'],
										        'booking_date'=>$_POST['date'],
										        'state'=>$_POST['state'],
        										'lcda'=>$_POST['lcda_name']
													])){
														echo "Booking Request Submitted Successfully";
													}
												}
												else{
													echo "Sorry you have a booking shceduled for this date";
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}




	public function checkBooking(){
		$this->model("BookingModel");
		if(isset($_POST['submit_info'])){

			$this->sanitizeString($_POST['submit_info']);
			if($this->checkToken($_POST["crfToken"])){
				if($this->phoneChecker($_POST['phone'])){
					$data = 
					BookingModel::where('phone_number', $_POST['phone'])->orderby('id', 'desc')->get();
					$details = json_decode($data);
					if(!empty($details)){

echo<<<_END
<header class="panel-heading" style="margin-left:-20px;">
Booking Details
</header>
<table class="table table-bordered table-advance table-hover" style="margin-left:-20px;">
 <tbody>
<tr>
<th> Fullname</th>
<th> Phone Number</th>
<th> Email</th>
<th> Type of Booking</th>
<th> Booking Date</th>
<th> State</th>
<th> LCDA</th>
<th> Date Created</th>
</tr>
_END;

foreach ($data as $value):
								
echo<<<_END
<tr>
<td>$value->fullname</td>
<td>$value->phone_number</td>
<td>$value->booking_email</td>
<td>$value->type_of_booking</td>
<td>$value->booking_date</td>
<td>$value->state</td>
<td>$value->lcda</td>
<td>$value->created_at</td>
</tr>
_END;

endforeach;

echo<<<_END
</tbody>
</table>
_END;

}
else{
	echo "Sorry there's no booking attached to this";
}
}
}
}
}




}
?>