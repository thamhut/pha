<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
	<?php echo $this->partial('header'); ?>
    <body>
        <div>
            <?php echo $this->partial('head_menu'); ?>
            <div class="clear"></div>
            
            <div class="box_content">
                <div style="width: 1010px; margin: 0 auto;">
                    <?php echo $this->partial('menu'); ?>
                    <?php echo $this->getContent(); ?>    
                </div>
            </div>
            <div class="clear"></div>
            <br />
            <?php echo $this->partial('footer'); ?>
        </div>
    </body>      
</html>