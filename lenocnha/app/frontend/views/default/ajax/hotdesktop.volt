<div id="hottop">
    <?php
    $i=0;
    foreach($hot_music as $ihot)
    {
       $i++;
    ?>
        <div id="item_lst_right">
            <div class="<?php if($i==1)echo 'top1';if($i==2)echo 'top2';if($i==3)echo 'top3'; ?>" style="margin: 5px 10px 0 0;float:left;height: 18px; width: 18px; border-radius: 9px; background: none repeat scroll 0% 0% rgb(95, 95, 95); text-align: center;"><?php echo $i; ?></div>
            <div  style="float: left; width: 200px;">
                <a title="<?php echo $ihot['title']; ?>" target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($ihot['title']).'_i'.$ihot['id']).'.html'; ?>"><h3 style="font-size: 11px; max-height: 35px; overflow: hidden;"><?php echo $ihot['title']; ?></h3></a>
                <p style="font-size: 10px;">Lượt xem: <?php echo $ihot['play']; ?></p>
            </div>
            <div class="clear"></div>
        </div>

    <?php
    }
    ?>
</div>