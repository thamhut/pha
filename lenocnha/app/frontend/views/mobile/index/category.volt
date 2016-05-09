<div role="main" class="" data-theme="a">
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
    <ul data-role="listview" >
        <li data-role="list-divider" style="padding-top: 15px; padding-bottom: 15px;"><?php echo isset($data['lst_item_content'][0]['name'])?strtoupper(strip_tags($data['lst_item_content'][0]['name'])):'CHƯA CÓ NHẠC'; ?></li>
    </ul>
    <div data-role="navbar">
        <ul>
            <li><a data-ajax='false' data-icon="clock" href="<?php echo $data['_url']; ?>" class="<?php echo $data['play']!='1'&&$data['_like']!='1'&&$data['download']!='1'?'ui-btn-active':''; ?>">Ngày đăng</a></li>
            <li><a data-ajax='false' data-icon="audio" href="<?php echo $data['_url'].'?play=1'; ?>" class="<?php echo $data['play']=='1'?'ui-btn-active':''; ?>">Lượt nghe</a></li>
            <li><a data-ajax='false' data-icon="heart" href="<?php echo $data['_url'].'?like=1'; ?>" class="<?php echo $data['_like']=='1'?'ui-btn-active':''; ?>">Thích</a></li>
            <li><a data-ajax='false' data-icon="arrow-d" href="<?php echo $data['_url'].'?download=1'; ?>" class="<?php echo $data['download']=='1'?'ui-btn-active':''; ?>">Lượt tải</a></li>
        </ul>
    </div><!-- /navbar -->
    <ul data-role="listview" itemscope itemtype="http://schema.org/BreadcrumbList">
    <?php
        foreach($data['lst_item_content'] as $inonstop)
        {
        ?>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="name" title="<?php echo strip_tags($inonstop['title']); ?>" data-ajax='false' href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($inonstop['title']).'_i'.$inonstop['id']).'.html'; ?>">
        <img style="top: 5px; height:100%;" alt="<?php echo strip_tags($inonstop['title']); ?>"  src="<?php echo ($inonstop['poster']&&$inonstop['poster']!='')?$inonstop['poster']:'/public/img/video_icon.jpg'; ?>"  />
        <?php echo strip_tags($inonstop['title']); ?>
        <p>Đăng bởi: <?php echo strip_tags($inonstop['username']); ?> <img style="vertical-align: middle; margin: 0px 5px;" src="/public/img/arrow_right.png" /> <?php echo strip_tags($inonstop['name']); ?></p>
        <p><img src="/public/img/icon_headphone.gif" style="vertical-align: sub; opacity: 0.7;" />&nbsp;<span><?php echo $inonstop['play']; ?> lượt</span></p>
        </a></li>
    <?php }?>
</ul>
</div>
<script>
$(function() {
    $(window).scroll(function() {
       if($(window).scrollTop() + $(window).height() == $(document).height()) {
           window.location = '<?php echo $data['url'].'&page='.($data['page']+1); ?>';
       }
    });
});
</script>