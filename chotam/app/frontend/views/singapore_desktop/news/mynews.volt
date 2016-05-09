<div class="box_container_new">
    <div class="div_box_container_left">
    <div class="topmenu_new">
        <ul>
            <li><a href="/">{{ lang._('Home') }}</a></li>
            <s class="arrow_left_gray"></s>
            <li><a href="{{ this.url.get('news/mynews') }}">{{ lang._('my_news') }}</a></li>
        </ul>
    </div>
    
     <div id="cate_level_new">
        <div style="" class="fillter_box" id="news_nav_filter">
            
            <ul>
                <li>
                    <select id="danh_muc" onchange="fillter_mynews();">
                        <option <?php echo $data['category']==0?'selected':''; ?> value="0">{{ lang._('cate_title') }}</option>
                        {% for k, v in cateSelect %}
                            <optgroup label="{{ k }}">
                                {% for k1, v1 in v %}
                                    {% set select = data['category'] == k1 ? "selected" : "" %}
                                    {{ '<option ' ~ select ~ ' value="' ~ k1 ~ '" >' ~ v1~ '</option>' }}
                                {% endfor %}
                            </optgroup>
                        {% endfor %}
                    </select>
                </li>
            </ul>
        </div>
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
                <div>{{ lang._('my_post') }}</div>
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
                        <span><s2></s2><?php echo $this->utils->getCity($itemContent['city']); ?></span>
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