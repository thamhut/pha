<div class="box_container">
    <div class="banner_center">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- nhacsan_home -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:625px;height:105px"
             data-ad-client="ca-pub-3431173096387405"
             data-ad-slot="3717707573"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    
    <div class="title_cate">
        <h1 itemprop="name"><?php echo isset($data['lst_item_content'][0]['name'])?strtoupper(strip_tags($data['lst_item_content'][0]['name'])):'CHƯA CÓ NHẠC'; ?></h1>
    </div>
    <div class="item_box_content" style="border: 1px dashed rgb(72, 72, 72);">
        <div class="fillter_date"><a href="<?php echo $data['_url']; ?>" style="color: #fff;<?php echo $data['play']!='1'&&$data['like']!='1'&&$data['download']!='1'?'font-weight:bold;':''; ?>">Ngày đăng</a> | <a href="<?php echo $data['_url'].'?play=1'; ?>" style="color: #fff;<?php echo $data['play']=='1'?'font-weight:bold;':''; ?>">Lượt nghe</a> | <a href="<?php echo $data['_url'].'?like=1'; ?>" style="color: #fff;<?php echo $data['like']=='1'?'font-weight:bold;':''; ?>">Thích</a> | <a href="<?php echo $data['_url'].'?download=1'; ?>" style="color: #fff;<?php echo $data['download']=='1'?'font-weight:bold;':''; ?> ">Lượt tải</a></div>
        <div class="seperator-line3"></div>
        <div class="seperator-line4"></div>
        <br />
        <ul itemscope itemtype="http://schema.org/BreadcrumbList">
        <?php
        foreach($data['lst_item_content'] as $inonstop)
        {
        ?>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <img itemprop="itemListElement" alt="<?php echo strip_tags($inonstop['title']); ?>" src="/public/img/music_icon_title.png" style="float: left; margin: 2px 10px 0 0;" />
                <div style="float: left; width: 580px;">
                    <div class="title_item_music"><a itemprop="url" title="<?php echo strip_tags($inonstop['title']); ?>" target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($inonstop['title']).'_i'.$inonstop['id']).'.html'; ?>"><h3 itemprop="name"><?php echo strip_tags($inonstop['title']); ?></h3></div></a><div class="count_view"><img src="/public/img/icon_headphone.gif" style="vertical-align: sub; opacity: 0.7;" />&nbsp;<span><?php echo $inonstop['play']; ?> lượt</span></div>
                    <div class="clear"></div>
                    <p class="user_post">Đăng bởi: <a href="<?php echo $this->url->get('user').'/'.$this->utils->converToUrl($inonstop['username']).'_i'.$inonstop['id_user']; ?>"><?php echo strip_tags($inonstop['username']); ?></a> <img style="vertical-align: middle; margin: 0px 5px;" src="/public/img/arrow_right.png" /> <a href="<?php echo $this->url->get('category').'/'.$this->utils->converToUrl($inonstop['name']).'_i'.$inonstop['id_cate']; ?>"><?php echo strip_tags($inonstop['name']); ?></a>
                    &nbsp;
                    <?php
                    for($i=1; $i<=5; ++$i)
                    {
                        if($i<round($inonstop['point']/2))
                        {
                            echo '<img src="/public/img/choose_icon.png" />';
                        }
                        elseif($i==round($inonstop['point']/2) && $i%2==1)
                        {
                            echo '<img src="/public/img/mid_choose_icon.png" />';
                        }
                        else
                        {
                            echo '<img src="/public/img/dischoose_icon.png" />';
                        }
                    }
                    ?>
                    </p>
                </div>
                <div class="clear"></div>
            </li>
            
            <?php }?>
            <li>
                {{ partial('pagination') }} 
            </li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
{{ partial('right_menu') }} 