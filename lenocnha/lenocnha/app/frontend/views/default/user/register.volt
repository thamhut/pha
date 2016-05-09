<div class="box_container">
    <div class="title_cate">
        ĐĂNG KÝ THÀNH VIÊN
    </div>
    <div class="item_box_content">
        <div>
        <?php if(!isset($done)){ ?>
        <form action="" method="post" enctype="multipart/form-data" id="frmRegister">
            <fieldset>
                <legend>Hoàn thành thông tin</legend>
                <table>
                    <tbody>
                    {% if error['message'] is defined %}
                        {{ '<div>' ~ error['message'] ~ '</div>' }}
                    {% endif %}
                    <tr>
                        <td width=200>{{ lang._('fullname') }}</td>
                        <td>
                            {% set err = this.utils.getMessageError('fullname', error)?'error_input':'' %}
                            {{ form.render('fullname', ['class':err]) }}
                            &nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span>
                            {{ '<span class="error_put">' ~ this.utils.getMessageError('fullname', error) ~ '</span>' }}    
                        </td>
                    </tr>
                    <tr>
                        <td class="alignLeft"><label>{{ lang._('username') }}</label></td>
                        <td class="alignLeft"> 
                            {% set err = this.utils.getMessageError('username', error)?'error_input':'' %}
                            {{ form.render('username', ['class':err]) }}
                            &nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span>
                            {{ '<span class="error_put">' ~ this.utils.getMessageError('username', error) ~ '</span>' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="alignLeft"><label>{{ lang._('pass') }}</label></td>
                    
                        <td class="alignLeft">
                            {% set err = this.utils.getMessageError('password', error)?'error_input':'' %}
                            {{ form.render('password', ['class':err]) }}&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span>
                            {{ '<span class="error_put">' ~ this.utils.getMessageError('password', error) ~ '</span>' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="alignLeft"><label>{{ lang._('repass') }}</label></td>
                    
                        <td class="alignLeft">
                            {% set err = this.utils.getMessageError('repassword', error)?'error_input':'' %}
                            {{ form.render('repassword', ['class':err]) }}&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span>
                            {{ '<span class="error_put">' ~ this.utils.getMessageError('repassword', error) ~ '</span>' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="alignLeft"><label>{{ lang._('email') }}</label></td>
                    
                        <td class="alignLeft">
                            {% set err = this.utils.getMessageError('email', error)?'error_input':'' %}
                            {{ form.render('email', ['class':err]) }}&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span>
                            {{ '<span class="error_put">' ~ this.utils.getMessageError('email', error) ~ '</span>' }}
                        </td>
                    </tr>
                    <tr>
                        <td>Facebook</td>
                    
                        <td>{{ form.render('fb', ['class':err]) }}&nbsp;&nbsp;</td>
                    </tr>
                    
                    <tr>
                        <td>Avata</td>
                    
                        <td><input id="file" type="file" name="avata[]" placeholder="chọn đường dẫn" /></td>
                    </tr>
                    <tr>
                        <td class="alignLeft" style="padding-bottom: 0 !important; margin-bottom: 0 !important;"><label><span class="ver_top">{{ lang._('input_code') }}: </span> </label>
                        </td>
                        <td>
                        <?php foreach($data['code'] as $item){ ?>
                            <img width="12" src="<?php echo $this->url->get('').'public/xacnhancp/'.md5($this->utils->getRealIPAddress()).'/'.$item.'.png'; ?>" />
                        <?php } ?>
                        &nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="alignLeft">
                            {% set err = this.utils.getMessageError('incode', error)?'error_input':'', key = data['key'] %}
                            {{ form.render('incode', ['class':err]) }}
                            {{ '<span class="error_put">' ~ this.utils.getMessageError('incode', error) ~ '</span>' }}
                            <input hidden="" name="namecode" value="{{ data['key'] }}" />
                        </td>
                    </tr>
                    <tr>
                        <td class="alignLeft"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="alignLeft"><div class="button_div" onclick="register();">Đăng ký</div></td>
                    </tr>
                </tbody></table>
            </fieldset>
            <input type="submit" name="create" value="create" class="hidden" hidden="" />
            </form>
            <?php }else{echo '<h3><p style="color: #D15B00;padding-top: 50px;text-align: center;">Đăng kí thành công!</p></h3>';}?>
        </div>
        <div class="clear"></div>
    </div>
</div>
{{ partial('right_menu') }} 

<script>
    <?php if(isset($done)){ ?>
        setTimeout("location.href = '<?php echo $this->url->get('user/login'); ?>';",500);
    <?php }?>
</script>