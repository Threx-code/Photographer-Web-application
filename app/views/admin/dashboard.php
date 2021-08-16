<?php
require_once "admin_header.php";  
require_once "adminmenu.php";
?>

<!-- header button -->
<header class="panel-heading tab-bg-info">
<ul class="nav nav-tabs">
<li class="">
<a data-toggle="tab" href="#booking" class="clickTab">
Bookings
</a>
</li>

<li class="">
<a data-toggle="tab" href="#uploadImage">
Upload New Image
</a>
</li>

<li class="">
<a data-toggle="tab" href="#postedImages">
Manage Posted Images
</a>
</li>

<li class="">
<a data-toggle="tab" href="#approveAdmin">
Admin
</a>
</li>

<li class="">
<a data-toggle="tab" href="#checkBooking">
Check Booking
</a>
</li>


<li>
<a data-toggle="tab" href="#contactUs">
Contact Us
</a>
</li>
<li class="">
<a data-toggle="tab" href="#profileImage">
<i class="icon-envelope"></i>
Profile Image
</a>
</li>

<li class="">
<a data-toggle="tab" href="#settings">
Settings
</a>
</li>
</ul>
</header>
<div class="panel-body" style="border:none;">
<div class="tab-content">

<!-- necessary files for each header will be displayed here -->
<?php

/*this file handles the bookings display*/
require_once "bookings_view.php";
/*this file handles the bookings display*/

/*this file handles the profile image uploading display*/
require_once "imageUpload_view.php";
/*this file handles the profile image uploading display*/

/*this file handles the posting of new images display*/
require_once "post_new_image_view.php";
/*this file handles the posting of new images display*/

/*this file handles the booking search display*/
require_once "manage_posted_image.php";
/*this file handles the booking search display*/

/*this file handles the approve admin display*/
require_once "approve_admin_view.php";
/*this file handles the approve admin display*/

/*this file handles the booking search display*/
require_once "booking_serarch_view.php";
/*this file handles the booking search display*/

/*this file handles the contact us display*/
require_once "contact_us_view.php";
/*this file handles the contact us display*/

/*this file handles the contact us display*/
require_once "setting.php";
/*this file handles the contact us display*/


?>
<!-- necessary files for each header will be displayed here -->

</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$(".clickTab").click();
	})
</script>

<?php 
require_once "login_signup_bottom.php"; 
require_once "admin_footer.php"; 

?>