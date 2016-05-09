<?php $data_content = $data['data_content']; ?>  
<?php if ($data_content->last > $data_content->current) { ?>
<script>
$(document).ready(function () {
    $(window).scroll(function() { 
       if($(window).scrollTop() + $(window).height() == $(document).height()) {
               var url = "<?php echo $data['url']; ?>&page=<?php echo $data_content->current + 1; ?>";
               window.location = url;
       }
    });
});
</script> 
<?php } ?>