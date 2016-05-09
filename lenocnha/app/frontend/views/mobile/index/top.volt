<div role="main" class="ui-content" style="padding: 10% 0;" data-theme="a">
     <br />
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- quangcao6 -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-3431173096387405"
         data-ad-slot="2631174779"
         data-ad-format="auto"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <ul data-role="listview" style="padding: 0 5%;">
        <li data-role="list-divider" style="padding-top: 15px; padding-bottom: 15px;">Nghe nhiều</li>
    </ul>
    <br /><br />
    <div data-role="tabs" id="tabs">
        <div data-role="navbar" style="padding: 0 5%;">
            <ul>
                <li><a href="#week" data-ajax="false">Tuần</a></li>
                <li><a href="#month" data-ajax="false">Tháng</a></li>
                <li><a href="#year" data-ajax="false">Năm</a></li>
            </ul>
        </div><!-- /navbar -->
        <br />
        <div id="week" class="ui-body-d ui-content">
            <ul data-role="listview" style="padding: 0 5%;">
                
                <?php
                 $i = 0;
                    foreach($top_music_1 as $inonstop)
                    {
                         $i++;
                    ?>
                    <li>
                    <div class="<?php if($i==1)echo 'top1';if($i==2)echo 'top2';if($i==3)echo 'top3'; ?>" style="margin: 25px 0px 0 0;float:left;height: 18px; width: 18px; border-radius: 9px; background: none repeat scroll 0% 0% rgb(95, 95, 95); text-align: center;"><?php echo $i; ?></div>
                    <a title="<?php echo strip_tags($inonstop['title']); ?>" data-ajax='false' href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($inonstop['title']).'_i'.$inonstop['id']).'.html'; ?>">
                    <?php echo strip_tags($inonstop['title']); ?>
                    <p><img src="/public/img/icon_headphone.gif" style="vertical-align: sub; opacity: 0.7;" />&nbsp;<span><?php echo $inonstop['play']; ?> lượt</span></p>
                    </a></li>
                <?php }?>
            </ul>
        </div>
        
        <div id="month" class="ui-body-d ui-content">
            <ul data-role="listview" style="padding: 0 5%;">
                <?php
                 $i = 0;
                    foreach($top_music_2 as $inonstop)
                    {
                         $i++;
                    ?>
                    <li>
                    <div class="<?php if($i==1)echo 'top1';if($i==2)echo 'top2';if($i==3)echo 'top3'; ?>" style="margin: 25px 0px 0 0;float:left;height: 18px; width: 18px; border-radius: 9px; background: none repeat scroll 0% 0% rgb(95, 95, 95); text-align: center;"><?php echo $i; ?></div>
                    <a title="<?php echo strip_tags($inonstop['title']); ?>" data-ajax='false' href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($inonstop['title']).'_i'.$inonstop['id']).'.html'; ?>">
                    <?php echo strip_tags($inonstop['title']); ?>
                    <p><img src="/public/img/icon_headphone.gif" style="vertical-align: sub; opacity: 0.7;" />&nbsp;<span><?php echo $inonstop['play']; ?> lượt</span></p>
                    </a></li>
                <?php }?>
            </ul>
        </div>
        
        <div id="year" class="ui-body-d ui-content">
            <ul data-role="listview" style="padding: 0 5%;">
                <?php
                 $i = 0;
                    foreach($top_music_3 as $inonstop)
                    {
                         $i++;
                    ?>
                    <li>
                    <div class="<?php if($i==1)echo 'top1';if($i==2)echo 'top2';if($i==3)echo 'top3'; ?>" style="margin: 25px 0px 0 0;float:left;height: 18px; width: 18px; border-radius: 9px; background: none repeat scroll 0% 0% rgb(95, 95, 95); text-align: center;"><?php echo $i; ?></div>
                    <a title="<?php echo strip_tags($inonstop['title']); ?>" data-ajax='false' href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($inonstop['title']).'_i'.$inonstop['id']).'.html'; ?>">
                    <?php echo strip_tags($inonstop['title']); ?>
                    <p><img src="/public/img/icon_headphone.gif" style="vertical-align: sub; opacity: 0.7;" />&nbsp;<span><?php echo $inonstop['play']; ?> lượt</span></p>
                    </a></li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>