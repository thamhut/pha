<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
	<?php echo $this->partial('header'); ?>
    <body>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        
          ga('create', 'UA-49239398-1', 'chotam.info');
          ga('send', 'pageview');
          
        </script>
        <div data-role="page" data-theme="a">
            <?php echo $this->partial('head_menu'); ?> 
            <?php echo $this->getContent(); ?>
            <?php echo $this->partial('footer'); ?>
        </div>
    </body>      
</html>