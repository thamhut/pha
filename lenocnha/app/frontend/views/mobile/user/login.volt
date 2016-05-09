<div role="main" class="ui-content" style="padding: 15%;">
    <h3>ĐĂNG NHẬP</h3>
    <br />
    <form id="frmLogin" action="" method="post">
        <?php echo $errUser!=''?'<tr><td  colspan="2"><p style="color:red;">'.$lang->_('err_login') .'</p><td></tr>':''; ?>
        <label for="username">Tên đăng nhập</label>
        <input type="text" name="username" id="username" value="">
        <label for="txt-password">Mật khẩu</label>
        <input type="password" name="password" id="password" value="">
        <a onclick="login();" id="btn-submit" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5">Đăng nhập</a>
        <a href="<?php echo $this->url->get('user/register') ?>" id="btn-submit" class="ui-btn ui-btn-a ui-corner-all mc-top-margin-1-5">Đăng ký</a>
    </form>
</div><!-- /content -->