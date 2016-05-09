<div class="box_container_new">
    <div class="div_box_container_left">
    <div class="topmenu_new">
        <ul itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" ><a itemprop="url" href="/"><?php echo $lang->_('Home'); ?></a></li>
            <s class="arrow_left_gray"></s>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a title="<?= isset($name)?$name:''; ?>" itemprop="url" href="<?php
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
                echo $data['category_data']['name']!=''?'<s class="arrow_left_gray"></s><li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="pad8" id=""><a title="'.$data['category_data']['name'].'" itemprop="url" href="'.$this->url->get('category').'/'.$this->utils->converToUrl($name.'-'.$data['category_data']['name']).'_i'.$data['id'].'">'.$data['category_data']['name'].'</a></li>':'';
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
    <div style="" class="fillter_box" id="news_nav_filter">
        <input type="text" hidden="" alt="<?php echo $this->utils->converToUrl($name); ?>" id="idcate" value="<?php echo $id_cate; ?>" />
        <?php if($data['category_data']['id_level']!=1&&$data['category_data']['id_level']!=80){ ?>
        <div class="gia_tien">
            <label>Giá tiền</label><input class="input_keyword" type="text" id="gia_tu" <?php echo $data['filter'][6]!=0?'value="'.$data['filter'][6].'"':''; ?> name="gia_tu" placeholder="Tối thiểu" /><input class="input_keyword" type="text" name="gia_den" <?php echo $data['filter'][7]!=0?'value="'.$data['filter'][7].'"':''; ?> id="gia_den" placeholder="Tối đa" /><input class="input_search" onclick="fillter();" type="button" name="" value="Tìm" />
        </div>
        <?php }?>
        
        <ul>
            <li>
                <select id="cung_cau" onchange="fillter();"><option <?php echo $data['filter'][0]==0?'selected':''; ?> value="0">Cung cầu</option><option <?php echo $data['filter'][0]==1?'selected':''; ?> value="1">Cung</option><option <?php echo $data['filter'][0]==2?'selected':''; ?> value="2">Cầu</option></select>
            </li>
            <li>
                <select id="nguoi_dang" onchange="fillter();"><option <?php echo $data['filter'][1]==0?'selected':''; ?> value="0">Loại người đăng</option><option <?php echo $data['filter'][1]==1?'selected':''; ?> value="1">Cá nhân</option><option <?php echo $data['filter'][1]==2?'selected':''; ?> value="2">Doanh nghiệp</option></select>
            </li>
            
            <?php if($data['category_data']['id_level']==1){ ?>
            <li>
                <select id="muc_luong" onchange="fillter();">
                    <option <?php echo $data['filter'][2]==0?'selected':''; ?> value="0">Mức lương</option>
                    <option <?php echo $data['filter'][2]==1?'selected':''; ?> value="1">Dưới 3 triệu</option>
                    <option <?php echo $data['filter'][2]==2?'selected':''; ?> value="2">3 đến 5 triệu</option>
                    <option <?php echo $data['filter'][2]==3?'selected':''; ?> value="3">5 đến 7 triệu</option>
                    <option <?php echo $data['filter'][2]==4?'selected':''; ?> value="4">7 đến 10 triệu</option>
                    <option <?php echo $data['filter'][2]==5?'selected':''; ?> value="5">10 đến 15 triệu</option>
                    <option <?php echo $data['filter'][2]==6?'selected':''; ?>value="6">15 đến 20 triệu</option>
                    <option <?php echo $data['filter'][2]==7?'selected':''; ?>value="7">20 đến 30 triệu</option>
                    <option <?php echo $data['filter'][2]==8?'selected':''; ?>value="8">Trên 30 triệu</option>
                </select>
            </li>
            <li>
                <select id="kinh_nghiem" onchange="fillter();">
                    <option <?php echo $data['filter'][3]==0?'selected':''; ?> value="0">Kinh nghiệm</option>
                    <option <?php echo $data['filter'][3]==1?'selected':''; ?> value="1">Dưới 1 năm</option>
                    <option <?php echo $data['filter'][3]==2?'selected':''; ?> value="2">1 năm</option>
                    <option <?php echo $data['filter'][3]==3?'selected':''; ?> value="3">2 năm</option>
                    <option <?php echo $data['filter'][3]==4?'selected':''; ?> value="4">3 năm</option>
                    <option <?php echo $data['filter'][3]==5?'selected':''; ?> value="5">4 năm</option>
                    <option <?php echo $data['filter'][3]==6?'selected':''; ?> value="6">5 năm</option>
                    <option <?php echo $data['filter'][3]==7?'selected':''; ?> value="7">Trên 5 năm</option>
                </select>
            </li>
            <?php }?>
            
            <?php if($data['category_data']['id_level']==18 || $data['category_data']['id_level']==26 || 
            $data['category_data']['id_level']==37 || $data['category_data']['id_level']==45 || $data['category_data']['id_level']==52
            || $data['category_data']['id_level']==59|| $data['category_data']['id_level']==65){ ?>
            <li>
                <select id="tinh_trang" onchange="fillter();"><option <?php echo $data['filter'][4]==0?'selected':''; ?> value="0">Tình trạng</option><option <?php echo $data['filter'][4]==1?'selected':''; ?> value="1">Cũ</option><option <?php echo $data['filter'][4]==2?'selected':''; ?> value="2">Mới</option></select>
            </li>
            <?php }?>
            
            <?php if($data['category_data']['id_level']==13){ ?>
            <li>
                <select id="dien_tich" onchange="fillter();">
                    <option <?php echo $data['filter'][5]==0?'selected':''; ?> value="0">Diện tích</option>
                    <option <?php echo $data['filter'][5]==1?'selected':''; ?> value="1">Dưới 50m2</option>
                    <option <?php echo $data['filter'][5]==2?'selected':''; ?> value="2">50 đến 70m2</option>
                    <option <?php echo $data['filter'][5]==3?'selected':''; ?> value="3">70 đến 100m2</option>
                    <option <?php echo $data['filter'][5]==4?'selected':''; ?> value="4">100 đến 150m2</option>
                    <option <?php echo $data['filter'][5]==5?'selected':''; ?> value="5">150 đến 200m2</option>
                    <option <?php echo $data['filter'][5]==6?'selected':''; ?> value="6">200 đến 300m2</option>
                    <option <?php echo $data['filter'][5]==7?'selected':''; ?> value="7">300 đến 500m2</option>
                    <option <?php echo $data['filter'][5]==8?'selected':''; ?> value="8">500 đến 1500m2</option>
                    <option <?php echo $data['filter'][5]==9?'selected':''; ?> value="9">1500 đến 2000m2</option>
                    <option <?php echo $data['filter'][5]==10?'selected':''; ?> value="10">Trên 2000m2</option>
                </select>
            </li>
            <?php }?>
            
            <?php if($data['category_data']['id_level']==18){ ?>
            <li>
                <select id="kieu_dang" onchange="fillter();">
                    <option <?php echo $data['filter'][8]==0?'selected':''; ?> value="0">Kiểu dáng</option>
                    <option <?php echo $data['filter'][8]==1?'selected':''; ?> value="1">Kiểu xoay</option>
                    <option <?php echo $data['filter'][8]==2?'selected':''; ?> value="2">Kiểu đứng</option>
                    <option <?php echo $data['filter'][8]==3?'selected':''; ?> value="3">Nắp gập</option>
                    <option <?php echo $data['filter'][8]==4?'selected':''; ?> value="4">Cảm ứng</option>
                    <option <?php echo $data['filter'][8]==5?'selected':''; ?> value="5">Nắp trượt</option>
                </select>
            </li>
            <?php }?>
            
            <?php if($data['category_data']['id_level']==52){ ?>
            <li>
                <select id="xuat_xu" onchange="fillter();">
                    <option <?php echo $data['filter'][9]==0?'selected':''; ?> value="0">Xuất xứ</option>
                    <option <?php echo $data['filter'][9]==1?'selected':''; ?> value="1">Lắp ráp trong nước</option>
                    <option <?php echo $data['filter'][9]==2?'selected':''; ?> value="2">Nhật Bản</option>
                    <option <?php echo $data['filter'][9]==3?'selected':''; ?> value="3">Hàn Quốc</option>
                    <option <?php echo $data['filter'][9]==4?'selected':''; ?> value="4">Trung Quốc</option>
                    <option <?php echo $data['filter'][9]==5?'selected':''; ?> value="5">Mỹ</option>
                </select>
            </li>
            <li>
                <select id="hang_san_xuat" onchange="fillter();">
                    <option <?php echo $data['filter'][10]==0?'selected':''; ?> value="0">Hãng sản xuất</option>
                    <?php if($id == 52 || $id == 55){ ?>
                        <option <?php echo $data['filter'][10]==2?'selected':''; ?> value="2">Yamaha</option>
                        <option <?php echo $data['filter'][10]==3?'selected':''; ?> value="3">Piaggio</option>
                        <option <?php echo $data['filter'][10]==4?'selected':''; ?> value="4">SYM</option>
                    <?php }?>
                    <?php if($id == 52 || $id == 53 || $id == 54){ ?>
                        <option <?php echo $data['filter'][10]==5?'selected':''; ?> value="5">Nissan</option>
                        <option <?php echo $data['filter'][10]==6?'selected':''; ?> value="6">Toyota</option>
                        <option <?php echo $data['filter'][10]==7?'selected':''; ?> value="7">Mercedes-Benz</option>
                        <option <?php echo $data['filter'][10]==8?'selected':''; ?> value="8">Mazda</option>
                        <option <?php echo $data['filter'][10]==9?'selected':''; ?> value="9">KIA</option>
                        <option <?php echo $data['filter'][10]==10?'selected':''; ?> value="10">Isuzu</option>
                        <option <?php echo $data['filter'][10]==11?'selected':''; ?> value="11">Hyundai</option>
                        <option <?php echo $data['filter'][10]==12?'selected':''; ?> value="12">GM Daewoo</option>
                        <option <?php echo $data['filter'][10]==13?'selected':''; ?> value="13">Ford</option>
                        <option <?php echo $data['filter'][10]==14?'selected':''; ?> value="14">FIAT</option>
                        <option <?php echo $data['filter'][10]==15?'selected':''; ?> value="15">BMW</option>
                        <option <?php echo $data['filter'][10]==16?'selected':''; ?> value="16">Honda</option>
                        <option <?php echo $data['filter'][10]==17?'selected':''; ?>value="17">Suzuki</option>
                    <?php }?>
                </select>
            </li>
            <?php }?>
            
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
    
    <div class="box_data_new" style="min-height: 10px;">
      <div style="padding: 15px; background: url(&quot;/public/img/background.png&quot;) repeat scroll 0px 0px transparent; border-bottom: 1px solid rgb(212, 212, 212); font-size: 14px; font-weight: bold; color: rgb(48, 147, 43);">
        Tin vip
      </div>
          <div id="loadvip">
            <div class="vip_items">
            <a href="http://chotam.info/detail/chung-cu-dong-do-106-hoang-quoc-viet--su-lua-chon-tinh-te-gia-chi-22trm2--------gia---22000000_i132439.html">
              <img width="65" height="65" src="http://raovat.com/resize_image.php?f=upload/raovat/raovat_raovat_bds378621.jpg&h=600&w=535" style="vertical-align: top; max-height: 65px; max-width: 65px;" alt="Chung cư Đông Đô 106 hoàng quốc việt – sự lựa chọn tinh tế, giá chỉ 22tr/m2 - Giá : 22,000,000 .">
                <h1 style="font-size: 12px; margin: 5px 0px 0px;">Chung cư Đông Đô 106 hoàng quốc việt – sự lựa chọn tinh tế, giá chỉ 22tr/m2 - Giá : 22,000,000.</h1>
            </a>
            </div>
            
            <div class="vip_items">
            <a href="http://chotam.info/detail/gia-kia-sorento-2014-kia-new-sorento-2014-gia-kia-sorento-gia-tot-nhat-tphcm--------gia---970000000_i132395.html">
              <img width="65" height="65" src="http://enbac10.vcmedia.vn/thumb_wl/250/i:up_new/2014/03/10/item/776076/139443939437075962/Gia-Kia-SORENTO-2014-KIA-New-Sorento-2014-gia-Kia-Sorento-gia-tot-nhat-TP-HCM-1.jpg" style="vertical-align: top; max-height: 65px; max-width: 65px;" alt="Giá Kia SORENTO 2014, KIA New Sorento 2014, giá Kia Sorento giá tốt nhất TP.HCM - Giá : 970000000 ">
                <h1 style="font-size: 12px; margin: 5px 0px 0px;">Giá Kia SORENTO 2014, KIA New Sorento 2014, giá Kia Sorento giá tốt nhất TP.HCM - Giá : 970000000 </h1>
            </a>
            </div>
            
            <div hidden="" id="abc">
                
            </div>
            
          </div>
          <div class="clear"></div>
            <br>
            <div style="float:right"><a>Xem tin vip...&nbsp;&nbsp;&nbsp;</a></div>
            <br><br>
            <div class="clear"></div>
        </div>
    
    <div class="box_data_new">
        <ul>
            <li class="li_title">
                <div><?php echo $lang->_('new_post'); ?></div>
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
                        <span><?php 
                            $string = $itemContent['content'];
                            echo $this->utils->getcontentlst($string);
                         ?></span>
                    </div>
                    <h5>
                        <span><s1></s1><?= $itemContent['view']?$itemContent['view']:0; ?></span>
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
                        <a target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($itemContent['title']).'_i'.$itemContent['id']).'.html'; ?>"><?php echo $lang->_('continiu'); ?> ...</a>
                    </h5>
                </div>
            </li>
            <?php }?>
            <li>
                <?php echo $this->partial('pagination'); ?> 
            </li>
        </ul>
    </div>
    </div>
    
    <div class="div_box_container_right">
        <?php echo $this->partial('right_menu'); ?> 
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
                <li class="li_title"><?php echo $lang->_('hot_posts'); ?></li>
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