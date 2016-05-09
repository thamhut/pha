<div role="main" class="ui-content" style="padding: 15%;">
    <h3>ĐĂNG KÝ</h3>
    <br />
     <?php if(!isset($done)){ ?>
     <form action="" method="post" enctype="multipart/form-data" id="frmRegister">
        {% if error['message'] is defined %}
            {{ '<div>' ~ error['message'] ~ '</div>' }}
        {% endif %}
        <label for="username">{{ lang._('fullname') }}&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span></label>
        {% set err = this.utils.getMessageError('fullname', error)?'error_input':'' %}
        {{ form.render('fullname', ['class':err]) }}
        
        {{ '<span class="error_put">' ~ this.utils.getMessageError('fullname', error) ~ '</span>' }} 
        
        
        <label for="txt-password">{{ lang._('username') }}&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span></label>
        {% set err = this.utils.getMessageError('username', error)?'error_input':'' %}
        {{ form.render('username', ['class':err]) }}
        
        {{ '<span class="error_put">' ~ this.utils.getMessageError('username', error) ~ '</span>' }}
        
        
        <label for="txt-password">{{ lang._('pass') }}&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span></label>
        {% set err = this.utils.getMessageError('password', error)?'error_input':'' %}
        {{ form.render('password', ['class':err]) }}
        {{ '<span class="error_put">' ~ this.utils.getMessageError('password', error) ~ '</span>' }}
        
        
        <label for="txt-password">{{ lang._('repass') }}&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span></label>
        {% set err = this.utils.getMessageError('repassword', error)?'error_input':'' %}
        {{ form.render('repassword', ['class':err]) }}
        {{ '<span class="error_put">' ~ this.utils.getMessageError('repassword', error) ~ '</span>' }}
        
        <label for="txt-password">{{ lang._('email') }}&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span></label>
        {% set err = this.utils.getMessageError('email', error)?'error_input':'' %}
        {{ form.render('email', ['class':err]) }}
        {{ '<span class="error_put">' ~ this.utils.getMessageError('email', error) ~ '</span>' }}
        
        
        <label for="txt-password">Facebook</label>
        {{ form.render('fb', ['class':err]) }}
        
        <label for="txt-password">Avata</label>
        <input id="file" type="file" name="avata[]" placeholder="chọn đường dẫn" />
        
        <label for="txt-password">Mã xác nhận&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span></label>
        <?php foreach($data['code'] as $item){ ?>
            <img width="12" src="<?php echo $this->url->get('').'public/xacnhancp/'.md5($this->utils->getRealIPAddress()).'/'.$item.'.png'; ?>" />
        <?php } ?>
        
        
        {% set err = this.utils.getMessageError('incode', error)?'error_input':'', key = data['key'] %}
        {{ form.render('incode', ['class':err]) }}
        {{ '<span class="error_put">' ~ this.utils.getMessageError('incode', error) ~ '</span>' }}
        <div style="display: none;">
             <input style="display: none !important;" hidden="" id="namecode" name="namecode" value="{{ data['key'] }}" />
        </div>
        <a onclick="register();" id="btn-submit" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5">Đăng ký</a>
        
    </form>
    <?php }else{echo '<h3><p style="color: #D15B00;padding-top: 50px;text-align: center;">Đăng kí thành công!</p></h3>';}?>
</div><!-- /content -->