<script>
    jQuery(document).ready(function($) {

      $('#banner-fade').bjqs({
        height      : 245,
        width       : 750,
        animduration    : 2000,      // length of transition
        animspeed       : 5500,
        responsive  : true
      });
      $(".bjqs-controls").remove();
      $(".h-centered").remove();

    });
</script>

<div class="box_container">
    
    <div class="clear"></div>
    <div class="box_data remarT" >
        <div style="margin: 10px auto;width: 200px;">
        <?php
            echo '<input type="text" hidden="" value="'.rand().'" />';
            echo '<h3>Mã số tin '.rand().'</h3><br>';
            ?>
        <?php echo 'Not exist!'; ?></div>
    </div>
</div>