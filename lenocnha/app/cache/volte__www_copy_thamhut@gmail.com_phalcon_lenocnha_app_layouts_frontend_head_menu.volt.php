<div id="header">
	<div>
        <div id="left_top_menu" class="font_a">
            <ul>
                <li>
                    <a href="<?php echo $this->url->getStatic(''); ?>">TRANG CHỦ</a>
                </li>
                <li>
                    <a href="<?php echo $this->url->getStatic('user/register'); ?>">ĐĂNG KÝ</a>
                </li>
                <li>
                    <a href="<?php echo $this->url->get('user/login?url=').urlencode($this->utils->getCurrentPageURL()) ?>">ĐĂNG NHẬP</a>
                </li>
                <li>
                    <a href="<?php echo $this->url->getStatic('article'); ?>">TẢI NHẠC</a>
                </li>
            </ul>
        </div>
        <div id="right_top_menu">
            <ul>
                <li><img src="/public/img/fb_icon_head.png" width="25px" /></li>
                <li><img src="/public/img/tw_icon_head.png" width="25px" /></li>
            </ul>
        </div>
    </div>
	 
</div>
<div class="clear"></div>
<br />
<div style="width: 1160px;margin:0 auto;">
    <a href="<?php echo $this->url->getStatic(); ?>"><div class="logo"></div></a>
    <div class="top_ads">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- nhacsan_top -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:470px;height:65px"
             data-ad-client="ca-pub-3431173096387405"
             data-ad-slot="1270441975"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</div>
<div class="clear"></div>

<div class="menu1 font_a">
    <ul>
        <?php
        foreach($lstcate as $k=>$icate)
        {
            if($k!=0)
            echo '|<li><a href="'.$this->url->get('category').'/'.$this->utils->converToUrl($icate['name']).'_i'.$icate['id'].'">'.strtoupper($icate['name']).'</a></li>';
            else
            echo '<li><a href="'.$this->url->get('category').'/'.$this->utils->converToUrl($icate['name']).'_i'.$icate['id'].'">'.strtoupper($icate['name']).'</a></li>';
        }
        ?>
        <li style="display: inline-block; float: right; color: #f5a218 !important;">
            <img src="/public/img/user-icon.png"> &nbsp;Hi <b><?php if(isset($user['id'])) echo '<a href="'.$this->url->get('user').'/'.$user['username'].'_i'.$user['id'].'">'.$user['username'].'</a> | <a href="'.$this->url->get('logout').'" >Thoát</a>';else echo 'Khách' ?></b>
        </li>
    </ul>
    <div class="clear"></div>
</div>
<div class="border_menu_bottom">

</div>
<div class="clear"></div>