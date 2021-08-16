     // USING AJAX TO SELECT PARTICULAR COMPUTER CLASSIFICATION
                    function get_computer(computer_type){
                    if(computer_type.value==''){
                    document.getElementsByClassName('computer_classify')[0].innerHTML='';
                    return;
                    }
    

                    params = "computer_type="+ computer_type.value;
                    request = new XMLHttpRequest();
                    request.open("POST", "computer_classify.php", true);
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
                    request.onreadystatechange = function(){
                        if(this.readyState==4){
                            if(this.status==200){
                                if(this.responseText != null){
                                    document.getElementsByClassName('computer_classify')[0].innerHTML=this.responseText;
                                }
                            }
                        }
                    }

                    request.send(params);
                    }


 // USING AJAX TO SELECT PHONE REAR CAMERA SIZE
                    function showPhoneRearCamera(phone_model){
                    if(phone_model.value==''){
                    document.getElementsByClassName('phoneRearCamera')[0].innerHTML='';
                    return;
                    }
    

                    params = "phone_model="+ phone_model.value;
                    request = new XMLHttpRequest();
                    request.open("POST", "rear_camera.php", true);
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
                    request.onreadystatechange = function(){
                        if(this.readyState==4){
                            if(this.status==200){
                                if(this.responseText != null){
                                    document.getElementsByClassName('phoneRearCamera')[0].innerHTML=this.responseText;
                                }
                            }
                        }
                    }

                    request.send(params);
                    }


 // USING AJAX TO SELECT PHONE FRONT CAMERA SIZE
                    function showPhoneFrontCamera(phone_model){
                    if(phone_model.value==''){
                    document.getElementsByClassName('phoneFrontCamera')[0].innerHTML='';
                    return;
                    }
    

                    params = "phone_model="+ phone_model.value;
                    request = new XMLHttpRequest();
                    request.open("POST", "front_camera.php", true);
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
                    request.onreadystatechange = function(){
                        if(this.readyState==4){
                            if(this.status==200){
                                if(this.responseText != null){
                                    document.getElementsByClassName('phoneFrontCamera')[0].innerHTML=this.responseText;
                                }
                            }
                        }
                    }

                    request.send(params);
                    }


 // USING AJAX TO SELECT NUMBER OF SIM A PHONE CAN CARRY
                    function showPhoneNumberSim(phone_model){
                    if(phone_model.value==''){
                    document.getElementsByClassName('phoneNumberSim')[0].innerHTML='';
                    return;
                    }
    

                    params = "phone_model="+ phone_model.value;
                    request = new XMLHttpRequest();
                    request.open("POST", "sim_number.php", true);
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
                    request.onreadystatechange = function(){
                        if(this.readyState==4){
                            if(this.status==200){
                                if(this.responseText != null){
                                    document.getElementsByClassName('phoneNumberSim')[0].innerHTML=this.responseText;
                                }
                            }
                        }
                    }

                    request.send(params);
                    }


                    // USING AJAX TO SELECT  PHONE SIM TYPE
                    function showPhoneSimType(phone_model){
                    if(phone_model.value==''){
                    document.getElementsByClassName('phoneSimType')[0].innerHTML='';
                    return;
                    }
    

                    params = "phone_model="+ phone_model.value;
                    request = new XMLHttpRequest();
                    request.open("POST", "sim_type.php", true);
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
                    request.onreadystatechange = function(){
                        if(this.readyState==4){
                            if(this.status==200){
                                if(this.responseText != null){
                                    document.getElementsByClassName('phoneSimType')[0].innerHTML=this.responseText;
                                }
                            }
                        }
                    }

                    request.send(params);
                    }


                    // USING AJAX TO SELECT  BATTERY CAPACITY
                    function showPhoneBatteryCapacity(phone_model){
                    if(phone_model.value==''){
                    document.getElementsByClassName('phoneBatteryCapacity')[0].innerHTML='';
                    return;
                    }
    

                    params = "phone_model="+ phone_model.value;
                    request = new XMLHttpRequest();
                    request.open("POST", "battery_capacity.php", true);
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
                    request.onreadystatechange = function(){
                        if(this.readyState==4){
                            if(this.status==200){
                                if(this.responseText != null){
                                    document.getElementsByClassName('phoneBatteryCapacity')[0].innerHTML=this.responseText;
                                }
                            }
                        }
                    }

                    request.send(params);
                    }

                    // USING AJAX TO SELECT  BATTERY REMOVABLE
                    function showPhoneBatteryRemovable(phone_model){
                    if(phone_model.value==''){
                    document.getElementsByClassName('phoneBatteryRemovable')[0].innerHTML='';
                    return;
                    }
    

                    params = "phone_model="+ phone_model.value;
                    request = new XMLHttpRequest();
                    request.open("POST", "battery_removable.php", true);
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
                    request.onreadystatechange = function(){
                        if(this.readyState==4){
                            if(this.status==200){
                                if(this.responseText != null){
                                    document.getElementsByClassName('phoneBatteryRemovable')[0].innerHTML=this.responseText;
                                }
                            }
                        }
                    }

                    request.send(params);
                    }







            // USING AJAX TO SELECT TABLET REAR CAMERA SIZE
                    function showTabletRearCamera(tablet_model){
                    if(tablet_model.value==''){
                    document.getElementsByClassName('tabletRearCamera')[0].innerHTML='';
                    return;
                    }
    

                    params = "tablet_model="+ tablet_model.value;
                    request = new XMLHttpRequest();
                    request.open("POST", "rear_camera.php", true);
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
                    request.onreadystatechange = function(){
                        if(this.readyState==4){
                            if(this.status==200){
                                if(this.responseText != null){
                                    document.getElementsByClassName('tabletRearCamera')[0].innerHTML=this.responseText;
                                }
                            }
                        }
                    }

                    request.send(params);
                    }











 // USING AJAX TO SELECT TABLET FRONT CAMERA SIZE
                    function showTabletFrontCamera(tablet_model){
                    if(tablet_model.value==''){
                    document.getElementsByClassName('tabletFrontCamera')[0].innerHTML='';
                    return;
                    }
    

                    params = "tablet_model="+ tablet_model.value;
                    request = new XMLHttpRequest();
                    request.open("POST", "front_camera.php", true);
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
                    request.onreadystatechange = function(){
                        if(this.readyState==4){
                            if(this.status==200){
                                if(this.responseText != null){
                                    document.getElementsByClassName('tabletFrontCamera')[0].innerHTML=this.responseText;
                                }
                            }
                        }
                    }

                    request.send(params);
                    }






 // USING AJAX TO SELECT NUMBER OF SIM A TABLET CAN CARRY
                    function showTabletNumberSim(tablet_model){
                    if(tablet_model.value==''){
                    document.getElementsByClassName('tabletNumberSim')[0].innerHTML='';
                    return;
                    }
    

                    params = "tablet_model="+ tablet_model.value;
                    request = new XMLHttpRequest();
                    request.open("POST", "sim_number.php", true);
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
                    request.onreadystatechange = function(){
                        if(this.readyState==4){
                            if(this.status==200){
                                if(this.responseText != null){
                                    document.getElementsByClassName('tabletNumberSim')[0].innerHTML=this.responseText;
                                }
                            }
                        }
                    }

                    request.send(params);
                    }






 
                    // USING AJAX TO SELECT  PHONE SIM TYPE
                    function showTabletSimType(tablet_model){
                    if(tablet_model.value==''){
                    document.getElementsByClassName('tabletSimType')[0].innerHTML='';
                    return;
                    }
    

                    params = "tablet_model="+ tablet_model.value;
                    request = new XMLHttpRequest();
                    request.open("POST", "sim_type.php", true);
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
                    request.onreadystatechange = function(){
                        if(this.readyState==4){
                            if(this.status==200){
                                if(this.responseText != null){
                                    document.getElementsByClassName('tabletSimType')[0].innerHTML=this.responseText;
                                }
                            }
                        }
                    }

                    request.send(params);
                    }






                   




                    // USING AJAX TO SELECT  BATTERY CAPACITY
                    function showTabletBatteryCapacity(tablet_model){
                    if(tablet_model.value==''){
                    document.getElementsByClassName('tabletBatteryCapacity')[0].innerHTML='';
                    return;
                    }
    

                    params = "tablet_model="+ tablet_model.value;
                    request = new XMLHttpRequest();
                    request.open("POST", "battery_capacity.php", true);
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
                    request.onreadystatechange = function(){
                        if(this.readyState==4){
                            if(this.status==200){
                                if(this.responseText != null){
                                    document.getElementsByClassName('tabletBatteryCapacity')[0].innerHTML=this.responseText;
                                }
                            }
                        }
                    }

                    request.send(params);
                    }




                    // USING AJAX TO SELECT  BATTERY REMOVABLE
                    function showTabletBatteryRemovable(tablet_model){
                    if(tablet_model.value==''){
                    document.getElementsByClassName('tabletBatteryRemovable')[0].innerHTML='';
                    return;
                    }
    

                    params = "tablet_model="+ tablet_model.value;
                    request = new XMLHttpRequest();
                    request.open("POST", "battery_removable.php", true);
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
                    request.onreadystatechange = function(){
                        if(this.readyState==4){
                            if(this.status==200){
                                if(this.responseText != null){
                                    document.getElementsByClassName('tabletBatteryRemovable')[0].innerHTML=this.responseText;
                                }
                            }
                        }
                    }

                    request.send(params);
                    }





                    

    // Get the modal
var modal = document.getElementById('modalContain');

// Get the button that opens the modal
var btn = document.getElementById("modalTrigger");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closeModal")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
  }





// Get the modal
var modal2 = document.getElementById('modalContain2');

// Get the button that opens the modal
var btn2 = document.getElementById("modalTrigger2");

// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("closeModal2")[0];

// When the user clicks on the button, open the modal 
btn2.onclick = function() {
  modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span2.onclick = function() {
  modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
    else if (event.target == modal) {
    modal.style.display = "none";
  }

  else if (event.target == modal3) {
    modal3.style.display = "none";
  }

   else if (event.target == modal4) {
    modal4.style.display = "none";
  }

   else if (event.target == modal5) {
    modal5.style.display = "none";
  }

   else if (event.target == modal6) {
    modal6.style.display = "none";
  }

 else if (event.target == modal7) {
    modal7.style.display = "none";
  }

   else if (event.target == modal8) {
    modal8.style.display = "none";
  }

   else if (event.target == modal9) {
    modal9.style.display = "none";
  }

   else if (event.target == modal10) {
    modal10.style.display = "none";
  }
  
} 





// Get the modal
var modal3 = document.getElementById('modalContain3');

// Get the button that opens the modal
var btn3 = document.getElementById("modalTrigger3");

// Get the <span> element that closes the modal
var span3 = document.getElementsByClassName("closeModal3")[0];

// When the user clicks on the button, open the modal 
btn3.onclick = function() {
  modal3.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span3.onclick = function() {
  modal3.style.display = "none";
}


// Get the modal
var modal4 = document.getElementById('modalContain4');

// Get the button that opens the modal
var btn4 = document.getElementById("modalTrigger4");

// Get the <span> element that closes the modal
var span4 = document.getElementsByClassName("closeModal4")[0];

// When the user clicks on the button, open the modal 
btn4.onclick = function() {
  modal4.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span4.onclick = function() {
  modal4.style.display = "none";
}


// Get the modal
var modal5 = document.getElementById('modalContain5');

// Get the button that opens the modal
var btn5 = document.getElementById("modalTrigger5");

// Get the <span> element that closes the modal
var span5 = document.getElementsByClassName("closeModal5")[0];

// When the user clicks on the button, open the modal 
btn5.onclick = function() {
  modal5.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span5.onclick = function() {
  modal5.style.display = "none";
}



// Get the modal
var modal6 = document.getElementById('modalContain6');

// Get the button that opens the modal
var btn6 = document.getElementById("modalTrigger6");

// Get the <span> element that closes the modal
var span6 = document.getElementsByClassName("closeModal6")[0];

// When the user clicks on the button, open the modal 
btn6.onclick = function() {
  modal6.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span6.onclick = function() {
  modal6.style.display = "none";
}



// Get the modal
var modal7 = document.getElementById('modalContain7');

// Get the button that opens the modal
var btn7 = document.getElementById("modalTrigger7");

// Get the <span> element that closes the modal
var span7 = document.getElementsByClassName("closeModal7")[0];

// When the user clicks on the button, open the modal 
btn7.onclick = function() {
  modal7.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span7.onclick = function() {
  modal7.style.display = "none";
}



// Get the modal
var modal8 = document.getElementById('modalContain8');

// Get the button that opens the modal
var btn8 = document.getElementById("modalTrigger8");

// Get the <span> element that closes the modal
var span8 = document.getElementsByClassName("closeModal8")[0];

// When the user clicks on the button, open the modal 
btn8.onclick = function() {
  modal8.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span8.onclick = function() {
  modal8.style.display = "none";
}



// Get the modal
var modal9 = document.getElementById('modalContain9');

// Get the button that opens the modal
var btn9 = document.getElementById("modalTrigger9");

// Get the <span> element that closes the modal
var span9 = document.getElementsByClassName("closeModal9")[0];

// When the user clicks on the button, open the modal 
btn9.onclick = function() {
  modal9.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span9.onclick = function() {
  modal9.style.display = "none";
}



// Get the modal
var modal10 = document.getElementById('modalContain10');

// Get the button that opens the modal
var btn10 = document.getElementById("modalTrigger10");

// Get the <span> element that closes the modal
var span10 = document.getElementsByClassName("closeModal10")[0];

// When the user clicks on the button, open the modal 
btn10.onclick = function() {
  modal10.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span10.onclick = function() {
  modal10.style.display = "none";
}