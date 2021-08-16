<style type="text/css">
/*skopos technologies*/

  .inputDiv{
    border-radius: 5px;
    margin-top: 10px;
  }
  .inputHeight{
    height: 45px !important;
    color: #555;
    border-radius: 0px;
    border-color: #ccc;
  }

  .inputHeight:hover,
  .inputHeight:focus,
  .inputHeight:active{
  -webkit-transition-duration: 500ms;
  transition-duration: 500ms;
  border:2px solid #17a2b8;
  border-radius: 5px;
  -webkit-box-shadow:1px 1px 5px 2px rgba(0, 0, 0, 0.2);
  -o-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
  -ms-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
}

.SubmitbuttonDiv{
    text-align:center; 
    cursor:pointer; 
    border-radius:20px; 
    border:1px 
    solid #17a2b8; 
    width: 75%;
    margin-left:25%;
}

.SubmitbuttonDiv:hover,
.SubmitbuttonDiv:focus,
.SubmitbuttonDiv:active{
  -webkit-transition-duration: 500ms;
  transition-duration: 500ms;
  border:2px solid #17a2b8;
  border-radius: 5px;
  -webkit-box-shadow:1px 1px 5px 2px rgba(0, 0, 0, 0.2);
  -o-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
  -ms-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
}

  .btnSubmit{
    font-weight: bold; 
    height: 45px; 
    border:none; 
    background-color: 
    transparent; 
    cursor: pointer;
  }

  label{
    color:#000;
    width: 25%; 
    margin-top: 10px;
  }

  .inputHeight{
    width: 75%; 
  }



  .showAccountOption, .showAccountOption2, .showAccountOption3{
    display: none;
  }

.SubmitLoader{
border:5px solid #fff!important;
border-top: 5px solid #ffa37b!important;
border-radius: 50%!important;
width: 30px!important;
height: 30px!important;
animation: spin 1s linear infinite!important;s
margin:0% auto;
margin-top:10px;
        
}

@keyframes spin{
0%{transform: rotate(0deg);}
100%{transform: rotate(360deg);
}
}

.modalMainBackground{
  background-color: #f2f2f2 !important;
  z-index: 10001;
}

.applicationTitle{
  text-align: center;
  width: 100%;
}

.topCloseBtn{
  font-size: 50px;
}

@media only screen 
and (max-width: 576px){
  .changeDialog{
  width: 95%;
  margin:0px auto;
}
.backendFeedbackinfo{
  width: 95%; 
}

.formContainer{
  width: 95%;
  margin:0px auto;
}
.inputLabel{ 
  margin-top: 5px;
}

label{
    font-size: 12px;
  }
}


@media only screen 
and (min-width: 576px)
and (max-width: 768px){
  .changeDialog{
  width: 90%;
  margin:0px auto;
}
.backendFeedbackinfo{
  width: 90%; 
}

.formContainer{
  width: 90%;
  margin:0px auto;
}
.inputLabel{ 
  margin-top: 5px;
}

label{
    font-size: 12px;
  }
}




@media only screen 
and (min-width: 768px)
and (max-width: 992px){
  .changeDialog{
  width: 90%;
  margin:0px auto;
}
.backendFeedbackinfo{
  width: 80%; 
}

.formContainer{
  width: 80%;
  margin:0px auto;
}
.inputLabel{
  width: 25%; 
  position: relative; 
  margin-top: 15px;
}

label{
    font-size: 12px;
  }
}



@media only screen 
and (min-width: 992px){
  .changeDialog{
  width: 90%;
  margin:0px auto;
}
.backendFeedbackinfo{
  width: 70%;
}

.formContainer{
  width: 70%;
  margin:0px auto;
}
.inputLabel{
  width: 25%; 
  position: relative; 
  margin-top: 15px;
}
label{
    font-size: 14px;
  }
}



@media only screen 
and (min-width: 1200px){
  .changeDialog{
  width:90%;
  margin:0px auto;
}
.backendFeedbackinfo{
  width: 60%; 
}
.formContainer{
  width: 60%;
  margin:0px auto;
}
.inputLabel{
  width: 25%; 
  position: relative; 
  margin-top: 15px;
}
label{
    font-size: 14px;
  }
}

.backendFeedbackinfo{
  margin:20px auto; 
  height: 60px; 
  border-radius: 0px; 
  display: none;
  text-align: center;
}

.closeModalButtonDown{
  text-align:center; 
  cursor:pointer; 
  border-radius:20px; 
  border:1px solid #17a2b8; 
  width: 100px;
}

.btnDownClose{
  font-weight: bold; 
  height: 40px; 
  border:none; 
  background-color: 
  transparent; cursor: pointer;
}


.closeModalButtonDown:hover,
.closeModalButtonDown:focus,
.closeModalButtonDown:active{
  -webkit-transition-duration: 500ms;
  transition-duration: 500ms;
  border:2px solid #17a2b8;
  border-radius: 5px;
  -webkit-box-shadow:1px 1px 5px 2px rgba(0, 0, 0, 0.2);
  -o-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
  -ms-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
}


.ajaxError{
  margin-left: 25%; 
  color: red; 
  text-align: center;
  margin-top: 10px;
  display: none;
}

.float-shapes, {
  position: relative;
}


.float-shapes:before {
  position: absolute;
  content: url(../public/images/rectangle.png);
  left: -16%;
  top: 0;
  -webkit-animation: rotation 9s infinite linear;
          animation: rotation 9s infinite linear;
}

@media (min-width: 768px) {
  .float-shapes:before {
    left: 0px;
    top: 190px;
  }
}

@media (min-width: 992px) {
  .float-shapes:before {
    left: 34px;
    top: 116px;
  }
}

.float-shapes:after {
  position: absolute;
  content: url(../public/images/oval.png);
  right: 0;
  top: 414px;
  -webkit-animation: rotation 9s infinite linear;
          animation: rotation 9s infinite linear;
}

@media (min-width: 768px) {
  .float-shapes:after {
    right: 18px;
    top: 560px;
  }
}

@media (min-width: 992px) {
  .float-shapes:after {
    right: 25px;
    top: 414px;
  }
}

@-webkit-keyframes rotation {
  from {
    -webkit-transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(359deg);
  }
}

</style>

<script type="text/javascript">
     /*reseting the form*/
  $(document).ready(function(){
    $(".formReset").click(function(){
      $(".allFormReset")[0].reset();
       $(".inputHeight").val("");
      $(".reset").hide();
      
    });
  })
</script>