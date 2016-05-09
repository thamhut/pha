<script type="text/javascript" src="<?php echo $this->url->get()?>public/js/tiny_mce.js"></script>
<div class="box_container">
    <div class="title_cate">
        ĐĂNG BÀI
    </div>
    <div class="item_box_content">
        <div>
        <?php if(!isset($done)){ ?>
            <fieldset>
                <legend>Quy định đăng bài</legend>
                <div style="line-height: 25px;height:240px;overflow: auto;">
                    1. Tên bài hát phải GHI HOA CHỮ CÁI ĐẦU TIÊN của mỗi từ và có dạng:<br />
                    <span style="font-weight: normal;">Nonstop - Tên Bài Hát - DJ Mix (In The Mix, Remix,....v)<br />
                    Ví dụ 1:   Nonstop - Bay Lên Đi Anh Em - DJ Tuấn Anh In The Mix<br />
                    Ví dụ 2:   Nonstop - Việt Mix - Hồ Quang Hiếu Collection - DJ Đạt 09 Mix<br />
                    Ví dụ 3:   Sơn Tùng M-TP - Nắng Ấm Xa Dần - Ver 2 - DJ KJock Ft Minh Ly Remix<br />
                    </span>
                    2. Những link ở các trang web và có dạng sau mới được chấp nhận:<br />
                    <span style="font-weight: normal;">- http://www3.zippyshare.com/v/30582985/file.html<br />
                    - https://www.youtube.com/watch?v=NdP9kNnrjPo<br />
                    </span>
                    3. Không lấy link có tên của web khác.<br />
                    4. Gõ đúng tên bài hát cần đăng , ko dùng từ ngữ thô tục , bậy bạ...<br />
                    5. Chọn đúng thể loại trùng với bài hát đó.<br />
                     
                    NẾU BÀI CỦA BẠN KHÔNG ĐÚNG VỚI NHỮNG QUY ĐỊNH Ở TRÊN,<br />
                    CHÚNG TÔI CÓ QUYỀN XÓA THẲNG TAY MÀ KHÔNG CẦN BÁO TRƯỚC !<br />
                </div>
            </fieldset>
            
            <form id="postarticle" action="" method="post">
            <fieldset class="box_upload">
                <legend>Điền thông tin bài viết</legend>
                <table>
                    <tbody>
                    <tr>
                        <td width=150>{{ lang._('title') }}&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span></td>
                        <td>
                            {% set err = this.utils.getMessageError('title', error)?'error_input':'' %}
                            {{ form.render('title', ['class':err]) }}
                            {{ '<span class="error_put">' ~ this.utils.getMessageError('title', error) ~ '</span>' }}
                        </td>
                    </tr>
                    <tr>
                        <td>Link nhạc&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span></td>
                        <td>
                            {% set err = this.utils.getMessageError('link', error)?'error_input':'' %}
                            {{ form.render('link', ['class':err]) }}
                            {{ '<span class="error_put">' ~ this.utils.getMessageError('link', error) ~ '</span>' }}
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Thể loại&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span></td>
                        <td>
                            {% set err = this.utils.getMessageError('category', error)?'error_input':'' %}
                            {{ form.render('category', ['class':err]) }}
                            {{ '<span class="error_put">' ~ this.utils.getMessageError('category', error) ~ '</span>' }}
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Mô tả&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span></td>
                        <td>
                            {% set err = this.utils.getMessageError('content', error)?'error_input':'' %}
                            {{ form.render('content', ['class':err]) }}
                            {{ '<span class="error_put">' ~ this.utils.getMessageError('content', error) ~ '</span>' }}
                        </td>
                    </tr>
                    
                     <tr>
                        <td>Mã xác nhận&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span></td>
                        <td>
                        <?php foreach($data['code'] as $item){ ?>
                            <img width="12" src="<?php echo $this->url->get('').'public/xacnhancp/'.md5($this->utils->getRealIPAddress()).'/'.$item.'.png'; ?>" />
                        <?php } ?>
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
                        <td></td>
                        <td><div class="button_div" onclick="postarticle();" style="width: 70px;">Cập nhật</div></td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td style="font-weight: normal;"><span style="color: rgb(255, 208, 82);">(*)</span> Thông tin bắt buộc phải điền</td>
                    </tr>
                    
                </tbody></table>
            </fieldset>
            </form>
            <?php }else{echo '<h3><p style="color: #D15B00;padding-top: 50px;text-align: center;">Cập nhật thành công. Xin cảm ơn!</p></h3>';}?>
        </div>
        <div class="clear"></div>
    </div>
</div>
{{ partial('right_menu') }} 

<script>

    tinyMCE.init({
    	// General options
        selector:"textarea",
    	theme : "advanced",
    	skin : "default",
    	
    	// Theme options
    	theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,",
    
    	theme_advanced_toolbar_location : "top",
    	theme_advanced_toolbar_align : "left",
    	theme_advanced_statusbar_location : "bottom",
        width:365,
        height:250,
    });
    
    
    <?php if(isset($done)){ ?>
        setTimeout("location.href = '<?php echo $this->url->get('user').'/member_i'.$session['id']; ?>';",500);
    <?php }?>

</script>