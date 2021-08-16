<div class="site-section">
      <div class="container">
        <div class="row mb-5 ">
          <div class="col-md-7 text-center mx-auto">
            <span class="subtitle-39293">Contact</span>
            <h2 class="serif">Get In Touch</h2>
          </div>
        </div>
       
        <div class="row">
          <div class="col-lg-8 mb-5" >
            <form action="#" method="post" class="contact_form">
               <input type="hidden" name="crfToken" value="<?php echo $crfToken;?>">

              <p class="alert alert-info shadow infoMSg backendFeedbackinfo reset"></p>
              <p class="alert alert-danger shadow ErrorMSg backendFeedbackinfo reset" style="display: none;"></p>
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" class="form-control" placeholder="Fullname" name="fullname">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Phone number" name="phoneNumber">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Email address" name="email">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <textarea name="message" id="" class="form-control" placeholder="Write your message." cols="30" rows="10" style="max-height: 200px; min-height: 200px;"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6 mr-auto">
                  <input type="hidden" name="submit_contact">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Message" name="submit_contact">
                  <div class="SubmitLoader contactLoader" style="margin-top:-40px; float:right; margin-right:10px; display: none;"></div>
                </div>
                 
              </div>
            </form>
          </div>
          <div class="col-lg-4 ml-auto">
            <div class="bg-white p-3 p-md-5">
              <h3 class="text-black mb-4">Contact Info</h3>
              <ul class="list-unstyled footer-link">
                <li class="d-block mb-3">
                  <span class="d-block text-black">Address:</span>
                  <span>34 Street Name, City Name Here, United States</span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span>+1 242 4942 290</span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span>info@yourdomain.com</span></li>
              </ul>
            </div>
          </div>
        </div>
        
      </div>
    </div> <!-- END .site-section -->

<script type="text/javascript">
$(document).ready(function(){
$(".contact_form").on("submit", (function(e){
e.preventDefault();
$(".sendHide").hide();
$(".contactLoader").show();
$(".sendingMsg").show();

$.ajaxSetup({
  headers:{
    "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")
  }
});

$.ajax({
url:'<?php echo APP_URI?>/contact/create',
method:'POST',
data:new FormData(this),
contentType:false,
processData:false,
success:function(data){
$(".sendHide").show();
$(".contactLoader").hide();
$(".sendingMsg").hide();
if(data == "Your message has been sent Successfully"){
  $('.infoMSg').show();
  $('.ErrorMSg').hide();
  $('.infoMSg').html(data);
$(".contact_form")[0].reset();
}
else{
  $('.infoMSg').hide();
  $('.ErrorMSg').show();
  $('.ErrorMSg').html(data);
}
}
})
}))
})


</script>