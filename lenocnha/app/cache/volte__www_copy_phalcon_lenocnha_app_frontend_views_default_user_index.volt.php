<div class="box_container">
    <div class="div_top_music_box title_cate" style="margin: 5px 0 6px;font-weight: bold;">
        THÔNG TIN THÀNH VIÊN
    </div>
    <div class="item_box_content padT30">
        <ul>
            <li>
                <div style="float: left;margin-right: 25px; text-align: center;padding-top:15px;">
                    <img src="<?php echo isset($data['info']->avata)?$data['info']->avata:'/public/img/users.png'; ?>" width="140px" height="140px" />
                    <br />
                    <p style="font-weight: bold;margin-top: 10px;"><?php echo isset($data['info']->username)?$data['info']->username:''; ?></p>
                </div>
                <div class="box_user_info">
                    <ul>
                        <li>
                            <div><img src="/public/img/user-icon.png" />&nbsp;&nbsp;Họ và tên:</div><div><?php echo isset($data['info']->fullname)?$data['info']->fullname:''; ?></div>
                        </li>
                        <div class="clear"></div>
                        <li>
                            <div><img src="/public/img/icon_email.gif" />&nbsp;&nbsp;Email:</div><div><?php echo isset($data['info']->email)?$data['info']->email:''; ?></div>
                        </li>
                        <div class="clear"></div>
                        <li>
                            <div><img src="/public/img/date_icon.png" />&nbsp;&nbsp;Tham gia:</div><div><?php echo isset($data['info']->insert_date)?$data['info']->insert_date:''; ?></div>
                        </li>
                        <div class="clear"></div>
                        <li>
                            <div><img src="/public/img/icon_sex.png" />&nbsp;&nbsp;Giới tính:</div>
                            <div><?php 
                            if($data['info']->sex == '2')
                            {echo 'Không xác định';}
                            elseif($data['info']->sex == '1') 
                            {echo 'Nam';} 
                            else {echo 'Nữ';} ?></div>
                        </li>
                        <div class="clear"></div>
                        <li>
                            <div><img src="/public/img/fb_icon_tiny.gif" />&nbsp;&nbsp;Facebook:</div><div><?php echo isset($data['info']->fb)?$data['info']->fb:''; ?></div>
                        </li>
                        <div class="clear"></div>
                    </ul>
                </div>
                <div class="clear"></div>
                <br />
                <div class="box_user_music marT20">
                    <div class="div_top_music_box" style="margin: 0px 0px 2px;font-weight: bold;">
                        <ul class="navbar_ul">
                            
                            <li class="poiter <?php echo ($data['play']!='1'&&$data['_like']!='1')?'current':''; ?>" onclick="fillter('date','<?php echo $data['url']; ?>');"><img style="background: #212121; vertical-align: sub;" src="/public/img/date_icon.png" />&nbsp;&nbsp;Ngày đăng</li>
                            <li onclick="fillter('play','<?php echo $data['url']; ?>');" class="<?php echo ($data['play']=='1')?'current':''; ?> poiter"><img style="background: #212121; vertical-align: sub;" src="/public/img/icon-play-button.png" />&nbsp;&nbsp;Lượt nghe</li>
                            <li class="poiter <?php echo ($data['_like']=='1')?'current':''; ?>" onclick="fillter('_like','<?php echo $data['url']; ?>');"><img style="background: #212121; vertical-align: sub;" src="/public/img/icon_like1.png" />&nbsp;&nbsp;Lượt thích</li>
                            <?php if($data['info']->id == $session['id']){ ?>
                            <li style="padding: 0px; float: right;">
                                <select id="action_user" onchange="if(_active()) action_user();" style="background: none repeat scroll 0px 0px rgb(33, 33, 33); color: rgb(234, 237, 246); border: medium none; font-weight: bold; padding: 6px 14px; font-size:11px;">
                                    <option value="0">Thao tác</option>
                                    <option value="1">Xóa</option>
                                </select>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="clear"></div>
                    <form id="frmAction" action="<?php echo $this->url->get('article/action?url=').urlencode($this->utils->getCurrentPageURL()); ?>" method="post">
                    <div class="item_box_content" style="border: none;">
                        <ul>
                             <?php
                                foreach($data['lst_item_content'] as $inonstop)
                                {
                                ?>
                                <li>
                                    <?php
                                        if($inonstop['id_user'] == $session['id'])
                                        {
                                            echo '<input type="checkbox" id="_'.$inonstop['id'].'" name="select['.$inonstop['id'].']" style="float: left; margin: 3px 8px 0px 0px;"/>';
                                        }
                                        else
                                        {
                                            echo '<img src="/public/img/music_icon_title.png" style="float: left; margin: 2px 10px 0 0;" />';
                                        }
                                    ?>
                                    
                                    <div style="float: left; width: 550px;">
                                        <div class="title_item_music"><a  target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($inonstop['title']).'_i'.$inonstop['id']).'.html'; ?>"><h3><?php echo $inonstop['title']; ?></h3></div></a>
                                        
                                        <div class="clear"></div>
                                        <p class="user_post">
                                            <img style="vertical-align: sub;" src="/public/img/icon_like1.png" />&nbsp;<?php echo $inonstop['_like']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<img src="/public/img/icon_headphone.gif" style="vertical-align: sub; opacity: 0.7;" /><span> &nbsp;<?php echo $inonstop['play']; ?> &nbsp;lượt</span>
                                        </p>
                                    </div>
                                    <?php
                                        if($inonstop['id_user'] == $session['id'])
                                        {
                                            echo '<a href="'.$this->url->get('article/edit?id=').$inonstop['id'].'"><img title="Sửa" style="float: left;" src="/public/img/edit_music.png"></a>';
                                        }
                                    ?>
                                    
                                    <div class="clear"></div>
                                </li>
                                <?php
                                }
                                ?>
                                <li>
                    				<?php echo $this->partial('pagination'); ?> 
                                </li>
                        </ul>
                    </div>
                    </form>
                </div>
            </li>
            
            <li>
                
            </li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<?php echo $this->partial('right_menu_user'); ?> 