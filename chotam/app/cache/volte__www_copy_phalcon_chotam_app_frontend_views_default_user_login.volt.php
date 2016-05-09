<div class="box_container">
    <div style="margin: 20px auto 10px;width:665px;">
    </div>
    
    <div class="box_data">
        <div class="register">
            <form action="" method="post">
                <table width=100% class="input">
                    <tr>
                        <td class="alignCenter"><h3><?php echo $lang->_('login'); ?></h3></td>
                    </tr>
                    <?php echo $errUser!=''?'<tr><td><p style="color:red;">'.$lang->_('err_login') .'</p><td></tr>':''; ?>
                    <tr>
                        <td class="alignLeft"><label><?php echo $lang->_('username'); ?>:</label></td>
                    </tr>
                    <tr>
                        <td class="alignLeft"><input value="" class="" type="text" width="100px" name="username" id="username" /></td>
                    </tr>
                    <tr>
                        <td class="alignLeft"><label><?php echo $lang->_('pass'); ?>: </label></td>
                    </tr>
                    <tr>
                        <td class="alignLeft"><input value="" type="password" class="" width="100px" name="password" id="password" /></td>
                    </tr>
                    <tr>
                        <td class="alignLeft"><input type="submit" width="20px" name="submit" id="submit" value="<?php echo $lang->_('login'); ?>" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
