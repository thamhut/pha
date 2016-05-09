<div class="div_menu_right">
    <div class="title_cate label_lstitem" style="padding-bottom:5px;">
        <img src="/public/img/information_icon.png" style="vertical-align: middle;"/>&nbsp;THÔNG TIN
    </div>
    
    <div class="div_top_music_box marT10">
        
        <div>
            <div class="dj_user">
                <img src="/public/img/users.png" width="125px" />
                <p><a style="color: #eaedf6;" href="<?php echo $this->url->get('user').'/'.$this->utils->converToUrl($music->username).'_i'.$music->id_user; ?>"><?php echo isset($music->username)?$music->username:''; ?></a></p>
            </div>
            
            <div class="seperator-line1"></div>
            <div class="seperator-line2"></div>
            <div class="box_lst_info">
                <ul>
                    <li><div class="info_left"><img src="/public/img/icon-play-button.png" />&nbsp;&nbsp;Lượt nghe</div><div class="info_right"><?php echo isset($music->play)?$music->play:0; ?></div><div class="clear"></div></li>
                    
                    <li><div class="info_left"><img src="/public/img/icon-download.png" style="opacity: 0.45;" />&nbsp;&nbsp;Lượt tải</div><div class="info_right"><?php echo isset($music->download)?$music->download:0; ?></div><div class="clear"></div></li>
                    <li><div class="info_left"><img src="/public/img/date_icon.png" style="" />&nbsp;&nbsp;Ngày đăng</div><div class="info_right"><?php echo isset($music->date)?date('d/m/Y', strtotime($music->date)):0; ?></div><div class="clear"></div></li>
                    <li><div class="info_left"><img src="/public/img/icon_like1.png" width="12px" style="opacity: 0.8;" />&nbsp;&nbsp;Thích</div><div class="info_right"><?php echo isset($music->_like)?$music->_like:0; ?></div><div class="clear"></div></li>
                    <li><div class="info_left"><img src="/public/img/icon_dislike.png" width="12px" style="opacity: 0.8;" />&nbsp;&nbsp;Không thích</div><div class="info_right"><?php echo isset($music->dislike)?$music->dislike:0; ?></div><div class="clear"></div></li>
                    <li><div class="info_left">Bình chọn&nbsp;
                    <?php
                    for($i=1; $i<=5; ++$i)
                    {
                        if($i<round($music->point/2))
                        {
                            echo '<img width="10px" src="/public/img/choose_icon.png" />';
                        }
                        elseif($i==round($music->point/2) && $i%2==1)
                        {
                            echo '<img width="10px" src="/public/img/mid_choose_icon.png" />';
                        }
                        else
                        {
                            echo '<img width="10px" src="/public/img/dischoose_icon.png" />';
                        }
                    }
                    ?>
                    </div><div class="info_right"><?php echo $music->count_choose; ?></div><div class="clear"></div></li>
                    <li><div class="info_left"><img src="/public/img/category_icon.png" style="opacity: 0.5;" />&nbsp;&nbsp;<a  style="color: #eaedf6;" href="<?php echo $this->url->get('category').'/'.$this->utils->converToUrl($music->category->name).'_i'.$music->id_cate; ?>"><?php echo isset($music->category->name)?strtoupper($music->category->name):''; ?></a></div><div class="info_right"></div><div class="clear"></div></li>
                    <?php 
                    if(isset($user['id']) && $user['id'] == $music->id_user)
                    {
                    ?>
                    <li><div class=""><img src="/public/img/edit_icon.png" width="12px" />&nbsp;&nbsp;<a href="<?php echo $this->url->get('article/edit?id=').$music->id; ?>" style="color: #4194bb;">Thay đổi thông tin</a></div><div class="clear"></div></li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
    
    <br />
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <div class="fb-like-box" data-href="https://www.facebook.com/pages/H%E1%BB%99i-Thanh-Ni%C3%AAn-Bay-V%C3%AC-Nh%E1%BA%A1c-S%C3%A0n-Lan-Man-Nh%E1%BA%A1c-Nonstop-Stop-C%C3%B9ng-Nh%E1%BA%A1c-Dj/1405309099768590" data-width="250px" data-colorscheme="dark" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
    
    <div class="div_top_music_box marT10">
        <ul class="navbar_ul">
            <li onclick="show_right_box('1', this,'video');" class="current poiter">Video DJ</li>
            <li onclick="show_right_box('2', this,'hot');" class="poiter">Chọn lọc</li>
            <li onclick="show_right_box('3', this,'music');" class="poiter">Nghe nhiều</li>
        </ul>
        
        <div class="box_item_right_menu" id="1_box_right"></div>
        
        <div class="box_item_right_menu hidden" id="2_box_right"></div>
        
        <div class="box_item_right_menu hidden" id="3_box_right"></div>
        
    </div>
    
</div>     