<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <?php echo $this->tag->getTitle(); ?>
    <?php echo $this->assets->outputCss(); ?>
    <?php echo $this->assets->outputJs(); ?>
    </head>
    <body style="background: url('<?php echo $this->url->getStatic('public/img/admin/backgroud.png'); ?>'); margin: 0px;">
        <div>
            <?php echo $this->partial('head_menu'); ?>
            <?php echo $this->partial('left_menu'); ?>
            <div class="">
                <div style="background: #F7F7F7; min-height: 200px; margin: 40px 40px 0 245px; border: 3px solid #D0D2D1; padding: 20px;">
                     <?php echo $this->getContent(); ?> 
                </div>
            </div>
            <div class="clear"></div>
            <br />
            
        </div>
    </body>      
</html>