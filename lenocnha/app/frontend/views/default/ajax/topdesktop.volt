<div id="video1">
    <div class="fillter_date"><a style="text-decoration: underline;" onclick="show_video('1',this);">Tuần</a> | <a onclick="show_video('2',this);">Tháng</a> | <a onclick="show_video('3',this);">Năm</a></div>
    <div id="1_video_box" class="video_box ">
        <?php
        $i=0;
        foreach($top_video_1 as $ihot)
        {
           $i++;
        ?>
            <div id="item_lst_right">
                <a title="<?php echo $ihot['title']; ?>" target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($ihot['title']).'_i'.$ihot['id']).'.html'; ?>">
                    <img alt="<?php echo $ihot['title']; ?>" src="<?php echo $ihot['poster']; ?>" style="height: 70px; width: 70px;">
                </a>
                <div  style="float: right; width: 170px;">
                    <h3 style="font-size: 11px; height: 50px; overflow: hidden;"><a title="<?php echo $ihot['title']; ?>" target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($ihot['title']).'_i'.$ihot['id']).'.html'; ?>"><?php echo $ihot['title']; ?></a></h3>
                    <p style="font-size: 10px;">Lượt xem: <?php echo $ihot['play']; ?></p>
                </div>
                <div class="clear"></div>
            </div>

        <?php
        }
        ?>
    </div>
</div>

<div id="video2">
    <div id="2_video_box" class="video_box hidden">
        <?php
        $i=0;
        foreach($top_video_2 as $ihot)
        {
           $i++;
        ?>
            <div id="item_lst_right">
                <a title="<?php echo $ihot['title']; ?>" target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($ihot['title']).'_i'.$ihot['id']).'.html'; ?>">
                    <img alt="<?php echo $ihot['title']; ?>" src="<?php echo $ihot['poster']; ?>" style="height: 70px; width: 70px;">
                </a>
                <div  style="float: right; width: 170px;">
                    <h3 style="font-size: 11px; height: 50px; overflow: hidden;"><a title="<?php echo $ihot['title']; ?>" target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($ihot['title']).'_i'.$ihot['id']).'.html'; ?>"><?php echo $ihot['title']; ?></a></h3>
                    <p style="font-size: 10px;">Lượt xem: <?php echo $ihot['play']; ?></p>
                </div>
                <div class="clear"></div>
            </div>

        <?php
        }
        ?>
    </div>
</div>


<div id="video3">
    <div id="3_video_box" class="video_box hidden">
        <?php
        $i=0;
        foreach($top_video_3 as $ihot)
        {
           $i++;
        ?>
            <div id="item_lst_right">
                <a title="<?php echo $ihot['title']; ?>" target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($ihot['title']).'_i'.$ihot['id']).'.html'; ?>">
                    <img alt="<?php echo $ihot['title']; ?>" src="<?php echo $ihot['poster']; ?>" style="height: 70px; width: 70px;">
                </a>
                <div  style="float: right; width: 170px;">
                    <h3 style="font-size: 11px; height: 50px; overflow: hidden;"><a title="<?php echo $ihot['title']; ?>" target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($ihot['title']).'_i'.$ihot['id']).'.html'; ?>"><?php echo $ihot['title']; ?></a></h3>
                    <p style="font-size: 10px;">Lượt xem: <?php echo $ihot['play']; ?></p>
                </div>
                <div class="clear"></div>
            </div>

        <?php
        }
        ?>
    </div>
</div>