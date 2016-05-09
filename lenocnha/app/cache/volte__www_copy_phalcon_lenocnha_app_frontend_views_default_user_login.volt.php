<div class="box_container">
    <div class="title_cate">
        ĐĂNG NHẬP THÀNH VIÊN
    </div>
    <div class="item_box_content">
        <div>
        <form id="frmLogin" action="" method="post">
            <fieldset>
                <legend>Điền thông tin đăng nhập</legend>
                <table>
                    <?php echo $errUser!=''?'<tr><td  colspan="2"><p style="color:red;">'.$lang->_('err_login') .'</p><td></tr>':''; ?>
                    <tr>
                        <td width=200>Tên đăng nhập</td>
                        <td><input type="text" name="username" placeholder="Tên đăng nhập" />&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">*</span></td>
                    </tr>
                    <tr>
                        <td>Mật khẩu</td>
                        <td><input type="password" name="password" placeholder="Mật khẩu nhiều hơn 6 ký tự" />&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">*</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <input type="submit" id="login" name="login" value="login" class="hidden" /></td>
                        <td><div onclick="login();" class="button_div" style="width: 70px;">Đăng nhập</div></td>
                    </tr>
                </table>
            </fieldset>
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php echo $this->partial('right_menu'); ?> 