<div class="box_container">
    <div style="margin: 20px auto 10px;width:665px;">
    </div>
    
    <div class="box_data">
        <div class="register">
        <?php if(!isset($done)){?>
            <form action="" method="post">
                <table width=100% class="input">
                <tr>
                    <td class="alignCenter"><h3><?php echo $lang->_('update_pass'); ?></h3></td>
                </tr>
                <tr>
                    <td class="alignLeft"><label><?php echo $lang->_('old_pass'); ?>:<span class="error_put">(*)</span></label></td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <?php $err = ($this->utils->getMessageError('oldPassword', $error) ? 'error_input' : ''); ?>
                        <?php echo $form->render('oldPassword', array('class' => $err)); ?>
                        <?php echo '<span class="error_put">' . $this->utils->getMessageError('oldPassword', $error) . '</span>'; ?>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft"><label><?php echo $lang->_('new_pass'); ?>:<span class="error_put">(*)</span></label></td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <?php $err = ($this->utils->getMessageError('password', $error) ? 'error_input' : ''); ?>
                        <?php echo $form->render('password', array('class' => $err)); ?>
                        <?php echo '<span class="error_put">' . $this->utils->getMessageError('password', $error) . '</span>'; ?>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft"><label><?php echo $lang->_('repassword'); ?>:<span class="error_put">(*)</span></label></td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <?php $err = ($this->utils->getMessageError('repassword', $error) ? 'error_input' : ''); ?>
                        <?php echo $form->render('repassword', array('class' => $err)); ?>
                        <?php echo '<span class="error_put">' . $this->utils->getMessageError('repassword', $error) . '</span>'; ?>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft" style="padding-bottom: 0 !important; margin-bottom: 0 !important;"><label><span class="ver_top"><?php echo $lang->_('input_code'); ?>: </span>
                    <?php foreach($data['code'] as $item){ ?>
                        <img width="15" src="<?php echo $this->url->get('').'public/xacnhancp/'.md5($this->utils->getRealIPAddress()).'/'.$item.'.png'; ?>" />
                    <?php } ?>
                    <span class="error_put ver_top">(*)</span>
                    </label></td>
                </tr>
                <tr>
                    <td class="alignLeft"><label><?php echo $lang->_('incode'); ?>:<span class="error_put">(*)</span></label></td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <?php $err = ($this->utils->getMessageError('incode', $error) ? 'error_input' : ''); $key = $data['key']; ?>
                        <?php echo $form->render('incode', array('class' => $err)); ?>
                        <?php echo '<span class="error_put">' . $this->utils->getMessageError('incode', $error) . '</span>'; ?>
                        <input hidden="" name="namecode" value="<?php echo $data['key']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft"></td>
                </tr>
                <tr>
                    <td class="alignLeft"><input type="submit" width="20px" name="submit" id="submit" value="<?php echo $lang->_('update'); ?>" /></td>
                </tr>
                </table>
            </form>
            <?php }else{?>
            <h3><p style="color: #D15B00;padding-top: 50px;text-align: center;"><?php echo $lang->_('update_success'); ?>!</p></h3>
            <?php } ?>
        </div>
    </div>
</div>

<script type="text/JavaScript">
    <?php if(isset($done)){ ?>
        setTimeout("location.href = '<?php echo $this->url->get(); ?>';",500);
    <?php }?>
</script>