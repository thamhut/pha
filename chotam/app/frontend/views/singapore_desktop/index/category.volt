<div class="box_container_new">
    <div class="div_box_container_left">
    <div class="topmenu_new">
        <ul>
            <li><a href="/">{{ lang._('Home') }}</a></li>
            <s class="arrow_left_gray"></s>
            <li><a href="<?php
            $name = $id_cate = '';
            if($data['category_data']['id'] == 0)
            {
                 $name =  $data['category_data']['name'];
                 $id_cate = $data['category_data']['id_level'];
            }
            else
            {
                 foreach($category_data as $item)
                {
                    if($item->id_level == $data['category_data']['id'])
                    {
                        $name = $item->name;
                        $id_cate = $item->id_level;
                    }
                }
            }
            echo $this->url->get('category').'/'.$this->utils->converToUrl($name).'_i'.$id_cate; ?>"><?= isset($name)?$name:''; ?></a></li>
            <?php 
            if(isset($data['category_data']['name']) && $data['category_data']['name'] != '' && $data['category_data']['id'] != '0')
            {
                echo $data['category_data']['name']!=''?'<s class="arrow_left_gray"></s><li class="pad8" id=""><a href="'.$this->url->get('category').'/'.$this->utils->converToUrl($name.'-'.$data['category_data']['name']).'_i'.$data['id'].'">'.$data['category_data']['name'].'</a></li>':'';
            }
            ?>
        </ul>
    </div>
    <div id="cate_level_new">
    <?php
        echo '<a href="'.$this->url->get('category').'/'.$this->utils->converToUrl($name).'_i'.$id_cate.'" class="repadL ';
        echo 0 == $data['category_data']['id']?'currCate':'';
        echo'">'.$lang->_('all').'</a>';
        foreach($category_data as $item)
        {
            if($id_cate == $item->id)
            {
                echo ' |<a href="'.$this->url->get('category').'/'.$this->utils->converToUrl($name.'-'.$item->name).'_i'.$item->id_level.'"  class="';
                echo $data['category_data']['id_level'] == $item->id_level?'currCate':'';
                echo '">'.$item->name.'</a>';
            }
        }
    ?>
    
    </div>
    <script type="text/javascript"><!--
    google_ad_client = "ca-pub-3431173096387405";
    /* quangcao4 */
    google_ad_slot = "5954049172";
    google_ad_width = 728;
    google_ad_height = 90;
    //-->
    </script>
    <script type="text/javascript"
    src="//pagead2.googlesyndication.com/pagead/show_ads.js">
    </script>

    <div class="box_data_new">
        <ul>
            <li class="li_title">
                <div>{{ lang._('new_post') }}</div>
            </li>
            <?php 
            $i = 0;
            foreach($data['lst_item_content'] as $itemContent)
            {
                if($i==10)
                {
            ?>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- giuatrang -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:728px;height:160px"
                 data-ad-client="ca-pub-3431173096387405"
                 data-ad-slot="9797196771"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            <?php 
                }
                $i++;
            ?>
            <li onmousemove="mymousemove(this);" onmouseout="mymouseout(this);">
                <div class="div_box_img_title_info">
                    <div class="div_img"><img alt="<?php echo $this->utils->enhtml($itemContent['title']); ?>" src="<?php if($this->utils->explode_first($itemContent['img'], ',')) echo $this->utils->explode_first($itemContent['img'], ','); else echo $this->url->get().'public/img/noimg.png';?>" width="90" height="90" /></div>
                    <div class="div_box_title">
                        <a target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($itemContent['title']).'_i'.$itemContent['id'].'.html'); ?>">
                            <h3><?php echo $this->utils->enhtml($itemContent['title']); ?></h3>
                        </a>
                        <span></span>
                    </div>
                    <h5>
                        <span><s></s><?php
                        $subdate = $this->utils->subdate(date("Y-m-d H:i:s"), $itemContent['date']);
                        if($subdate['d'] != 0)
                        {
                            echo $subdate['d'].' '.$lang->_("prev_d").'.';
                        }
                        else if($subdate['h'] != 0)
                        {
                            echo $subdate['h'].' '.$lang->_("prev_h").'.';
                        }
                        else if($subdate['i'] != 0)
                        {
                            echo $subdate['i'].' '.$lang->_("prev_i").'.';
                        }
                        else
                        {
                            echo date('d-m-Y', strtotime($itemContent['date']));
                        }
                     ?></span>
                        <span><s2></s2><?php echo 'Nationwide'; ?></span>
                        <a target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($itemContent['title']).'_i'.$itemContent['id']).'.html'; ?>">{{ lang._('continiu') }} ...</a>
                    </h5>
                </div>
            </li>
            <?php }?>
            <li>
                {{ partial('pagination') }} 
            </li>
        </ul>
    </div>
    </div>
    
    <div class="div_box_container_right">
        {{ partial('right_menu') }} 
        <script type="text/javascript"><!--
        google_ad_client = "ca-pub-3431173096387405";
        /* quangcao5 */
        google_ad_slot = "7980682374";
        google_ad_width = 250;
        google_ad_height = 250;
        //-->
        </script>
        <script type="text/javascript"
        src="//pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
        <div style="height: 20px;"></div>
        <div class="div_lst_cate div_lst_news_hot">
            <ul>
                <li class="li_title">{{ lang._('hot_posts') }}</li>
                <?php 
                foreach($data['content_hot'] as $icontent)
                {
                ?>
                <li><div style="float: left; width: 50px;"><img src="<?php 
                $img = '/public/img/noimg.png';
                if(isset($icontent->img))
                {
                    $img1 = explode(',',$icontent->img);
                    if(isset($img1[0])&&$img1[0]!='')
                    {
                        $img = $img1[0];
                    }
                }
                echo $img;
                ?>" style="vertical-align: middle; margin-right: 5px; max-width: 50px; max-height: 50px;"></div><div style="float: right; width: 182px; margin-top: -5px;"><a target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($icontent->title).'_i'.$icontent->id).'.html'; ?>"><?php echo $this->utils->enhtml($icontent->title);?></a></div><div class="clear"></div></li>
                <?php }?>
            </ul>
        </div>
    </div>
    
    <div class="clear"></div>
</div>

<script>
    
</script>
<style>
.vip_items{text-align: center; width: 100px; height: 110px; float: left; padding: 10px 10px 5px; overflow: hidden;}
.vip_items a{color: rgb(102, 102, 102);}
.vip_items a:hover{color: #f60!important;}
</style>