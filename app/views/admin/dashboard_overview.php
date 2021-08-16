<?php
/*Dashboard*/
$url = APP_URI."/dashboard";
if($url."/dashboard"){
$boardName ="Dashboard";
}

/*deposit*/
elseif($url."/deposit"){
$boardName ="Deposit Accounts";

/*this dynamically changes the content of the button for which modal to click*/
$uploadModalToggle ="data-toggle='modal' data-target='#depositUModal'";
$uploadName ="depositUModal";
$fileUrl = APP_URI."/system/core/deposit_account_file.php";
}
/*loan*/
elseif($url."/loan"){
$boardName ="Loan Accounts";
/*this dynamically changes the content of the button for which modal to click*/
$uploadModalToggle ="data-toggle='modal' data-target='#loanUModal'";
$uploadName ="loanUModal";
$fileUrl =  APP_URI."/system/core/loan_account_file.php"; 
}


/*fixed deposit*/
elseif("/fixed_deposit"){
$boardName ="Fixed Deposit Accounts";
/*this dynamically changes the content of the button for which modal to click*/
$uploadModalToggle ="data-toggle='modal' data-target='#fixeddepositUModal'";
$uploadName ="fixeddepositUModal";
$fileUrl = APP_URI."/system/core/fixeddeposit_account_file.php";
}


/*download*/
elseif($url."/download"){
$boardName ="Download";
$downloadModalToggle ="data-toggle='modal' data-target='#downloadDModal'";
$downloadName = "downloadDModal"; 
}


/*setting*/
elseif($url."/setting"){
$boardName ="Setting"; 
}                    

?>
<!--overview start-->
<div class="row">
<div class="col-lg-12">
<h3 class="page-header"> 

<?php
echo $boardName;
?>


            </h3>
            <ol class="breadcrumb">
              <li><a href="<?php echo APP_URI?>/dashboard">Home</a></li>

<li>
  <i>
<?php
echo $boardName;
?>          
</i>
</li>
<?php

?>
</ol>
</div>
</div>