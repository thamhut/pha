<script type="text/javascript" src="<?php echo $this->url->getStatic(); ?>public/js/tiny_mce.js"></script>
<div class="box_container">
    <div style="margin: 20px auto 10px;width:665px;">
    </div>
    <div id="input_data_new" class="register" >
        <h3><?php echo $lang->_('input_news'); ?></h3>
        <?php if (isset($error['message'])) { ?>
        <?php echo '<span  style="color: red;">' . $error['message'] . '</span>'; ?>
        <?php } ?>
        <form action="" method="post" enctype="multipart/form-data">
            <table id="tb_news">
                <tr>
                    <td> 
                        <label><?php echo $lang->_('cate_title'); ?>: <span class="error_put">(*)</span></label>
                    <td>
                </tr>
                
                <tr>
                    <td>
                        <?php $err = ($this->utils->getMessageError('id_category', $error) ? 'error_input' : ''); ?>
                        <?php echo $form->render('id_category', array('onchange' => 'selectCate("id_category")', 'name' => 'id_category', 'class' => $err)); ?>
                        <?php echo '<span class="error_put">' . $this->utils->getMessageError('id_category', $error) . '</span>'; ?>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label><?php echo $lang->_('title_news'); ?>: <span class="error_put">(*)</span></label>
                    <td>
                </tr>
                <tr>
                    <td>
                        <?php $err = ($this->utils->getMessageError('title', $error) ? 'error_input' : ''); ?>
                        <?php echo $form->render('title', array('class' => $err)); ?>
                        <?php echo '<span class="error_put">' . $this->utils->getMessageError('title', $error) . '</span>'; ?>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label><?php echo $lang->_('content_news'); ?>:</label>
                    <td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form->render('content'); ?>
                    </td>
                </tr>
                
                <tr><td></td></tr>
                
                <tr>
                    <td><label><?php echo $lang->_('select_img'); ?>: <span style="font-size: 11px;">(<?php echo $lang->_('max_select'); ?>.)</span></label></td>
                </tr>
                <tr class="tr_choise_img" id="div_choise_img-1-tr">
                    <td>
                        <div><?php echo $form->render('img', array('class' => 'div_choise_img', 'id' => 'div_choise_img-1', 'onchange' => 'abc(this)', 'name' => 'img[]')); ?></div>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label><?php echo $lang->_('select_city'); ?>:</label>
                    <td>
                </tr>
                
                <tr>
                    <td>
                         <?php echo $form->render('city'); ?>
                    </td>
                </tr>
                
                <tr><td><h3 class="padT10 padB5" style="border-top: 1px solid #DCDCDC;"><?php echo $lang->_('lang_extend'); ?></h3></td></tr>
                
            </table>
            
            <table id="tb_news">
                <tr class="tr_gia_tien"><td><label><?php echo $lang->_('giatien_placeholder'); ?></label></td></tr>
                <tr class="tr_gia_tien"><td>
                    <?php echo $form->render('gia_tien'); ?>
                    <span>VNĐ</span>
                </td></tr>
                
                <tr><td>
                    <div class="fillter_box rebor" id="news_nav_filter">
                        <ul>
                            <li class="li_cung_cau">
                                  <?php echo $form->render('cung_cau'); ?>
                            </li>
                            <li class="nguoi_dang">
                                <?php echo $form->render('nguoi_dang'); ?>
                            </li>
                            <li class="muc_luong">
                                <?php echo $form->render('muc_luong'); ?>
                            </li>
                            <li class="kinh_nghiem">
                                <?php echo $form->render('kinh_nghiem'); ?>
                            </li>
                            
                            <li class="tinh_trang">
                                <?php echo $form->render('tinh_trang'); ?>
                            </li>
                            
                            <li class="dien_tich">
                                <?php echo $form->render('dien_tich'); ?>
                            </li>
                            
                            <li class="kieu_dang">
                                <?php echo $form->render('kieu_dang'); ?>
                            </li>
                            
                            <li class="xuat_xu">
                                <?php echo $form->render('xuat_xu'); ?>
                            </li>
                            <li class="hang_san_xuat">
                                <?php echo $form->render('hang_san_xuat'); ?>
                            </li>
                        </ul>
                    </div>
                </td></tr>
                <tr><td><h3 class="padT10 padB5" style="border-top: 1px solid #DCDCDC;">Thông tin liên hệ</h3></td></tr>
            </table>
            
            <table  id="tb_lienhe">
                 <tr>
                    <td><label>SĐT liên hệ:</label></td><td style="padding-left:26px !important;"><label>Email liên hệ:</label></td>
                </tr>
                
                <tr>
                    <td><?php echo $form->render('sdt'); ?></td><td style="padding-left:26px !important;"><?php echo $form->render('email'); ?></td>
                </tr>
                
                
                <tr>
                    <td><label>Yahoo liên hệ:</label></td><td style="padding-left:26px !important;"><label>Skype liên hệ:</label></td>
                </tr>
                
                <tr>
                    <td><?php echo $form->render('yahoo'); ?></td><td style="padding-left:26px !important;"><?php echo $form->render('skype'); ?></td>
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
                
            </table>
            
            <input type="submit" name="submit" value="Đăng tin" class="submit_dangtin" />
        </form>
    </div>
    <div id="danhgia">
        <h3>Chào mừng bạn đã tham gia chợ rao vặt của chúng tôi.</h3>
        <h4>Website của chúng tôi đang trong quá trình phát triển.</h4>
        <h4>Rất mong được sự giúp đỡ ủng hộ của các bạn.</h4>
        <h4>Xin bớt chút thời gian gửi ý kiến đóng góp tới thamhut@gmail.com để website phát triển tốt hơn.</h4>
        <h4>Chúng tôi xin chân thành cảm ơn!</h4>
        
  			<br>
  			<h3>Giúp tin đăng được nhiều người tìm thấy trên google</h3>
        <h4>1. Tiêu đề: Không quá dài hoặc quá ngắn loại bỏ những ký tự đặc biệt, chọn những cụm từ hay được tìm kiếm.</h4>
        <h4>2. Nội dung: Nội dung đăng không được quá ngắn, tránh viết không dấu, nên hướng tới những từ khóa chính</h4>
        <h4>3. Hãy chia sẻ tin đăng của bạn lên các mạng xã hội như <b>facebook</b> hoặc <b>google+</b></h4>
        <h4>4. <b>Chú ý: </b>Tránh đăng tin trùng nội dung, hãy sử dụng chức năng lên top ở cuối bài đăng để làm mới lại tin đăng.</h4>
        <h4>Chúc các bạn thành công.</h4>
    </div>
</div>

<script>
    selectCate('id_category');
    $("#content").css('width','620px');
    tinyMCE.init({
		// General options
        selector:"textarea#content",
		theme : "advanced",
		skin : "default",
		//plugins : "lists,pagebreak,style,layer,table,advhr,emotions,iespell,preview,contextmenu,paste,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontselect",
		theme_advanced_buttons2 : "bullist,numlist,|,,,,,,,forecolor,backcolor,fontsizeselect",

		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
        width:580,
        height:300,
	});
    tinyMCE.remove('div');
</script>