</section>
</div>
</div>
<!-- page end-->        
</section>
</section>
<!--main content end-->
</section>
<!-- container section start -->


  <script src="<?php echo $admin_js1 ?>"></script>
  <script src="<?php echo $admin_jss ?>"></script>
  <script src="<?php echo $admin_js2 ?>"></script>
  <script src="<?php echo $admin_js3 ?>"></script>
  <script src="<?php echo $admin_js4 ?>"></script>
  <script src="<?php echo $admin_js5 ?>"></script>
  <script src="<?php echo $admin_js6 ?>"></script>
  <script src="<?php echo $admin_js7 ?>"></script>
  <script src="<?php echo $admin_js8 ?>"></script>
  <script src="<?php echo $admin_js9 ?>"></script>
  <script src="<?php echo $admin_js10 ?>"></script>
  <script src="<?php echo $admin_js11 ?>"></script>
  <script src="<?php echo $admin_js12 ?>"></script>
  <script src="<?php echo $admin_js13 ?>"></script>
  <script src="<?php echo $admin_js14 ?>"></script>
  <script src="<?php echo $admin_js15 ?>"></script>
  <script src="<?php echo $admin_js16 ?>"></script>
  <script src="<?php echo $admin_js17 ?>"></script>
  <script src="<?php echo $admin_js18 ?>"></script>
  <script src="<?php echo $admin_js19 ?>"></script>
  <script src="<?php echo $admin_js20 ?>"></script>
  <script src="<?php echo $admin_js21 ?>"></script>
  <script src="<?php echo $admin_js22 ?>"></script>
  <script src="<?php echo $admin_js23 ?>"></script>
  <script src="<?php echo $admin_js24 ?>"></script>
  <script src="<?php echo $admin_js25 ?>"></script>
  <script src="<?php echo $admin_js26 ?>"></script>
  <script src="<?php echo $admin_js27 ?>"></script>
  <script src="<?php echo $admin_js28 ?>"></script>

    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>

</html>
