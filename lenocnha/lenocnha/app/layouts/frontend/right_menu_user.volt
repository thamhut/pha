<div class="div_menu_right">
    <div class="title_cate label_lstitem" style="padding-bottom:5px;">
        <img src="/public/img/information_icon.png" style="vertical-align: middle;"/>&nbsp;THÔNG TIN
    </div>
    
    <div class="div_top_music_box marT10">
        
        
        <div>
            <div class="dj_user">
                <div class="box_music_background"></div>
            </div>
            
            <div class="seperator-line1"></div>
            <div class="seperator-line2"></div>
            <div class="box_lst_info">
                <ul>
                    <li><div class="info_left"><img src="/public/img/upload_icon.png" style="opacity: 0.45;" />&nbsp;&nbsp;Bài đăng</div><div class="info_right"><?php echo isset($data['info']->num)?$data['info']->num:0; ?></div><div class="clear"></div></li>
                    <li><div class="info_left"><img src="/public/img/date_icon.png" style="" />&nbsp;&nbsp;Online</div><div class="info_right"><?php echo isset($data['info']->online_date)?date('H:i:s d/m/Y', strtotime($data['info']->online_date)):''; ?></div><div class="clear"></div></li>
                    <li><div class="info_left"><img src="/public/img/icon_like1.png" width="12px" style="opacity: 0.8;" />&nbsp;&nbsp;Thích</div><div class="info_right"><?php echo isset($data['info']->like)?$data['info']->like:''; ?></div><div class="clear"></div></li>
                    <li><div class="info_left"><img src="/public/img/icon_dislike.png" width="12px" style="opacity: 0.8;" />&nbsp;&nbsp;Không thích</div><div class="info_right"><?php echo isset($data['info']->dislike)?$data['info']->dislike:''; ?></div><div class="clear"></div></li>
                    <?php 
                    if(isset($session['id']) && isset($data['info']->id) && $session['id'] == $data['info']->id)
                    {
                    ?>
                    <li><div class=""><img src="/public/img/edit_icon.png" width="12px" />&nbsp;&nbsp;<a href="<?php echo $this->url->get('user/update?id=').$user['id']; ?>" style="color: #4194bb;">Thay đổi thông tin</a></div><div class="clear"></div></li>
                    <?php }
                    if(isset($session['group']) && $session['group'] == '2008'){
                    ?>
                    <li><div class=""><img src="/public/img/edit_icon.png" width="12px" />&nbsp;&nbsp;<a href="<?php echo $this->url->get('admin/manager'); ?>" style="color: #4194bb;">Quản lý nhạc</a></div><div class="clear"></div></li>
                    <li><div class=""><img src="/public/img/edit_icon.png" width="12px" />&nbsp;&nbsp;<a href="<?php echo $this->url->get('admin/manager/user'); ?>" style="color: #4194bb;">Quản lý thành viên</a></div><div class="clear"></div></li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
</div>
