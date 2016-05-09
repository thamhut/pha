<div class="left_menu">
    <div class="item_menu_left font_a">
        <ul>
            <li class="label_lstitem"><img src="/public/img/music_icon.png" />&nbsp;&nbsp;DANH MỤC</li>
            <?php
            foreach($lstcate as $icate){
            ?>
            <li><img src="/public/img/arrow_right_left_menu.png" />&nbsp;&nbsp;&nbsp;
                <a href="<?php echo $this->url->get('category').'/'.$this->utils->converToUrl($icate['name']).'_i'.$icate['id']; ?>" title="<?php echo $icate['name']; ?>">
                    <?php echo strtoupper($icate['name']); ?>
                </a>
            </li>
            
            <div class="seperator-line1"></div>
            <div class="seperator-line2"></div>
            <?php
            }
            ?>
            <?php
            if(isset($user['id']))
            {
            ?>
            <li><img src="/public/img/arrow_right_left_menu.png" />&nbsp;&nbsp;&nbsp;
                <a href="<?php echo $this->url->get(''); ?>" title="My Playlist">
                    MY PLAYLIST
                </a>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>
    
    <div class="text-center marT20">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- nhacsan_left -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:170px;height:170px"
             data-ad-client="ca-pub-3431173096387405"
             data-ad-slot="8287507976"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    
    
    <div class="item_menu_left marT20">
        <ul>
            <li class="label_lstitem"><img src="/public/img/music_icon.png" />&nbsp;&nbsp;CHIA SẺ</li>
        </ul>
        <div class="marT10">
            <div class="inline-block">
                <a onclick="return popitup('https://www.facebook.com/sharer/sharer.php?app_id=309437425817038&u=http://lenocnha.com&display=popup&ref=plugin')" href="https://www.facebook.com/sharer/sharer.php?app_id=309437425817038&u=http://lenocnha.com&display=popup&ref=plugin">
                    <div class='icon_fb'></div>
                </a>
            </div>
            
            
            <div class="inline-block">
                <a href="https://plus.google.com/share?url={http://lenocnha.com}" onclick="javascript:window.open(this.href,
              '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img
              src="https://www.gstatic.com/images/icons/gplus-32.png" alt="Share on Google+"/></a>
            </div>
            
            <div class="inline-block">
                <a onclick="return popitup('https://twitter.com/intent/tweet?original_referer=https%3A%2F%2Fabout.twitter.com%2Fresources%2Fbuttons&text=Twitter%20Buttons%20|%20About&tw_p=tweetbutton&url=http://lenocnha.com')" href="https://twitter.com/intent/tweet?original_referer=https%3A%2F%2Fabout.twitter.com%2Fresources%2Fbuttons&text=Twitter%20Buttons%20|%20About&tw_p=tweetbutton&url=http://lenocnha.com">
                    <div class='icon_tw'></div>
                </a>
            </div>
        </div>
    </div>
    
    <div class="item_menu_left marT20">
        <ul>
            <li class="label_lstitem"><img src="/public/img/music_icon.png" />&nbsp;&nbsp;TOP THÀNH VIÊN</li>
            <?php
            foreach($topuser as $k=>$iuser){
            ?>
            <li><img src="/public/img/arrow_right_left_menu.png" />&nbsp;&nbsp;&nbsp;
                <a style="<?php echo $k==0?'color:#e05e12':'';echo $k==1?'color:green':'';echo $k==2?'color:cornflowerblue':''; ?>" href="<?= '/user/member_i'.$iuser['id_user']; ?>" title="<?php echo $iuser['username']; ?>">
                    <?php echo ($iuser['username']); ?>
                </a>
            </li>
            <div class="seperator-line1"></div>
            <div class="seperator-line2"></div>
            <?php
            }
            ?>
            
        </ul>
    </div>
</div>
