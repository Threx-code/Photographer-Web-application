<div class="site-section">
      <div class="container">

        <div class="row mb-5 ">
          <div class="col-md-7 text-center mx-auto">
            <span class="subtitle-39293">My Works</span>
            <h2 class="serif">See My Works</h2>
          </div>
        </div>
       
        <div id="posts" class="row no-gutter">
          <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href=" <?php echo(APP_URI) ?>/images/img_1.jpg" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src=" <?php echo(APP_URI) ?>/images/img_1.jpg">
            </a>
          </div>
          <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href=" <?php echo(APP_URI) ?>/images/img_2.jpg" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src=" <?php echo(APP_URI) ?>/images/img_2.jpg">
            </a>
          </div>

          <div class="item brand col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href=" <?php echo(APP_URI) ?>/images/img_3.jpg" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src=" <?php echo(APP_URI) ?>/images/img_3.jpg">
            </a>
          </div>

          <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href=" <?php echo(APP_URI) ?>/images/img_4.jpg" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src=" <?php echo(APP_URI) ?>/images/img_4.jpg">
            </a>
          </div>

          <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href=" <?php echo(APP_URI) ?>/images/img_5.jpg" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src=" <?php echo(APP_URI) ?>/images/img_5.jpg">
            </a>
          </div>

          <div class="item brand col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href=" <?php echo(APP_URI) ?>/images/img_6.jpg" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src=" <?php echo(APP_URI) ?>/images/img_6.jpg">
            </a>
          </div>

          <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href=" <?php echo(APP_URI) ?>/images/img_1.jpg" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src=" <?php echo(APP_URI) ?>/images/img_1.jpg">
            </a>
          </div>

          <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href=" <?php echo(APP_URI) ?>/images/img_2.jpg" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src=" <?php echo(APP_URI) ?>/images/img_2.jpg">
            </a>
          </div>

          <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href=" <?php echo(APP_URI) ?>/images/img_3.jpg" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src=" <?php echo(APP_URI) ?>/images/img_3.jpg">
            </a>
          </div>

          <div class="item brand col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href=" <?php echo(APP_URI) ?>/images/img_4.jpg" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src=" <?php echo(APP_URI) ?>/images/img_4.jpg">
            </a>
          </div>

          <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href=" <?php echo(APP_URI) ?>/images/img_5.jpg" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src=" <?php echo(APP_URI) ?>/images/img_5.jpg">
            </a>
          </div>

          <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href=" <?php echo(APP_URI) ?>/images/img_6.jpg" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src=" <?php echo(APP_URI) ?>/images/img_6.jpg">
            </a>
          </div>


        </div>
      </div>
    </div> <!-- END .site-section -->



    <script type="text/javascript">
  var Max = false;
  var start = 0;
  var limit = 6;

  $(document).ready(function(){
    getData();
   /* $(window).scroll(function(){
    if($(window).scrollTop()>=$('.postContainer').offset().top + $(".postContainer").outerHeight()-window.innerHeight){
      //$(".LoaderDiv").show();
      getData();
      
    }
    });*/

    function getData(){
      if(Max)
        return
      $.ajax({
        url:"mywork/loadMyWork",
        method:"POST",
        type:"text",
        data:{
          getData:1,
          start:start,
          limit:limit
        },
        success:function(data){
          if(data == Max || data == 0){
            Max = true;
          }
          else{
            $(".addPost").append(data);
            start+=limit;
          }
        }
      });
    }
  })

</script>

<div class="site-section">
      <div class="container ">

        <div class="row mb-5 addPost">
          <div class="col-md-7 text-center mx-auto">
            <span class="subtitle-39293">My Works</span>
            <h2 class="serif">See My Works</h2>
          </div>
        </div>
       <div class="postContainer">


       
        </div>
      </div>
    </div> <!-- END .site-section -->