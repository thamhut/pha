<div class="box_container_new">
<div class="div_box_container_left">
    
    <div class="topmenu_new">
        <ul itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" href="/">{{ lang._('Home') }}</a></li>
            <s class="arrow_left_gray"></s>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" ><?php echo $this->utils->enhtml($data['data_content']->title); ?></a></li>
        </ul>
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
            {{ lang._('vip') }}
      </div>
      <div id="loadvip">
        <div class="vip_items">
        <a href="http://chotam.info/detail/kiem-tien-bang-rut-gon-link-voi-adfly-phan-1_i276574.html">
          <img width="65" height="65" src="http://chotam.info/uploads/images/2015/09/36b6d4280a531954b87eeefefdfc867d.jpeg" style="vertical-align: top; max-height: 65px; max-width: 65px;" alt="Chung cư Đông Đô 106 hoàng quốc việt – sự lựa chọn tinh tế, giá chỉ 22tr/m2 - Giá : 22,000,000 .">
            <h1 style="font-size: 12px; margin: 5px 0px 0px;">Kiếm tiền bằng rút gọn link với adf.ly (Phần 1)</h1>
        </a>
        </div>
        
        <div class="vip_items">
        <a href="http://chotam.info/detail/huong-dan-kiem-tien-tren-mang-bang-spam-link_i279341.html">
          <img width="65" height="65" src="http://chotam.info/uploads/images/2015/09/907f698e5df7209b1ebeedd785738867.jpeg" style="vertical-align: top; max-height: 65px; max-width: 65px;" alt="Giá Kia SORENTO 2014, KIA New Sorento 2014, giá Kia Sorento giá tốt nhất TP.HCM - Giá : 970000000 ">
            <h1 style="font-size: 12px; margin: 5px 0px 0px;">Hướng dẫn kiếm tiền trên mạng bằng spam link</h1>
        </a>
        </div>
      </div>
      <div class="clear"></div>
        <br>
        <div style="float:right"><a>{{ lang._('view_vip') }}...&nbsp;&nbsp;&nbsp;</a></div>
        <br><br>
        <div class="clear"></div>
    </div>
    
    <div class="box_data_new">
        <div id="title_new" class="wordbreak"><h2 itemprop="name"><?php echo $this->utils->enhtml($data['data_content']->title); ?></h2></div>
        <div style="float:right; border-width: 0 !important; border-style: none !important; margin-top: 5px;">
            <div class="fb-share-button" data-href="{{ 'http://' ~ _SERVER['SERVER_NAME'] ~ _SERVER['REDIRECT_URL'] }}" ></div>
            <!-- Đặt thẻ này vào nơi bạn muốn nút chia sẻ kết xuất. -->
            <div class="g-plus" data-action="share" data-annotation="none"></div>
            
            <!-- Đặt thẻ này sau thẻ chia sẻ cuối cùng. -->
            <script type="text/javascript">
              window.___gcfg = {lang: 'vi'};
            
              (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/platform.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
              })();
            </script>
        </div>
        <div id="data_news" class="line_bottom_new">
            <table width=75%>
                <tr>
                    <td width=180>{{ lang._('user_post') }}:</td>
                    <td width=350></td>
                    <td width=90>{{ lang._('date_post') }}:</td>
                    <td width=200>
                        {% set subdate = this.utils.subdate(date("Y-m-d H:i:s"), data_content.date) %}
                        {% if subdate['d'] != 0 %}
                        
                            {{ subdate['d'] ~ ' ' ~ lang._("prev_d") ~ '.' }}
                        
                        {% elseif subdate['h'] != 0 %}
                        
                            {{ subdate['h'] ~ ' ' ~ lang._("prev_h") ~ '.' }}
                        
                        {% elseif subdate['i'] != 0 %}
                        
                            {{ subdate['i'] ~ ' ' ~ lang._("prev_i") ~ '.' }}
                        
                        {% else %}
                        
                            <?php echo date('d-m-Y', strtotime($data_content->date)); ?>
                        
                        {% endif %}
                     </td>
                </tr>
                <tr>
                    <td>{{ lang._('local') }}</td>
                    <td><?php echo $this->utils->getCity($data['data_content']->city); ?></td>
                    <td>Email:</td>
                    <td><?php 
                    $lienlac = explode(',', $data['data_content']->lienlac);
                    echo isset($lienlac[1])?$this->utils->enhtml($lienlac[1]):''; ?></td>
                </tr>
                <tr>
                    <td>SĐT:</td>
                    <td><?php echo isset($lienlac[0])?$this->utils->enhtml($lienlac[0]):''; ?></td>
                    <td>YIM/Skype:</td>
                    <td><?php echo isset($lienlac[2])?$this->utils->enhtml($lienlac[2]):''; ?> /  <?php echo isset($lienlac[3])?$this->utils->enhtml($lienlac[3]):''; ?></td>
                </tr>
            </table>
            
            <?php
                $checkuser = 0;
                if(isset($user) && $user && $user['id'] == $data['data_content']->id_user){ 
                $checkuser = 1;
             ?>
            <div>
                <ul>
                    <li class="borderB">
                        <a title="{{ lang._('edit') }}" href="<?php echo $this->url->get('news/update/').$data['data_content']->id; ?>">{{ lang._('edit') }}</a>
                    </li>
                    <li><a title="{{ lang._('delete') }}" href="<?php echo $this->url->get('news/delete/').$data['data_content']->id; ?>" onclick="return deleted_news();">{{ lang._('delete') }}</a></li>
                </ul>
            </div>
            <?php }?>
        </div>
        <?php 
        $img_first = $this->utils->explode_first($data['data_content']->img, ',');
        if($img_first){ 
        $content['img'] = explode(',', $data['data_content']->img);    
        ?>
        <div id="image">
            <div id='showimage'><img itemprop="image" class="poiter" alt="<?php $this->utils->enhtml($data['data_content']->title); ?> 1" onclick="show_album('<?php echo $img_first;  ?>');" src="<?php echo $img_first;  ?>" style="max-width: 390px; max-height: 305px;" /></div>
            <div style=" position:absolute; bottom: 0; left:5px" class="padT10">
                <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" id="1" style="border: 1px solid ;"><img itemprop="image" class="poiter" onclick="show_album('<?php echo isset($img_first)?($img_first!=''?$img_first:$this->url->get().'public/img/noimage.png'):$this->url->get().'public/img/noimage.png'; ?>');" src="<?php echo isset($img_first)?($img_first!=''?$img_first:$this->url->get().'public/img/noimage.png'):$this->url->get().'public/img/noimage.png';  ?>" width="50px" height="50px" /></li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" id="2"><img itemprop="image" class="poiter" onclick="show_album('<?php echo isset($content['img'][1])?($content['img'][1]!=''?$content['img'][1]:$this->url->get().'public/img/noimage.png'):$this->url->get().'public/img/noimage.png'; ?>');" src="<?php echo isset($content['img'][1])?($content['img'][1]!=''?$content['img'][1]:$this->url->get().'public/img/noimage.png'):$this->url->get().'public/img/noimage.png';  ?>" width="50px" height="50px" /></li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" id="3"><img itemprop="image" class="poiter" onclick="show_album('<?php echo isset($content['img'][2])?($content['img'][2]!=''?$content['img'][2]:$this->url->get().'public/img/noimage.png'):$this->url->get().'public/img/noimage.png'; ?>');" src="<?php echo isset($content['img'][2])?($content['img'][2]!=''?$content['img'][2]:$this->url->get().'public/img/noimage.png'):$this->url->get().'public/img/noimage.png';  ?>" width="50px" height="50px" /></li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" id="4"><img itemprop="image" class="poiter" onclick="show_album('<?php echo isset($content['img'][3])?($content['img'][3]!=''?$content['img'][3]:$this->url->get().'public/img/noimage.png'):$this->url->get().'public/img/noimage.png'; ?>');" src="<?php echo isset($content['img'][3])?($content['img'][3]!=''?$content['img'][3]:$this->url->get().'public/img/noimage.png'):$this->url->get().'public/img/noimage.png';  ?>" width="50px" height="50px" /></li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" id="5"><img itemprop="image" class="poiter" onclick="show_album('<?php echo isset($content['img'][4])?($content['img'][4]!=''?$content['img'][4]:$this->url->get().'public/img/noimage.png'):$this->url->get().'public/img/noimage.png'; ?>');" src="<?php echo isset($content['img'][4])?($content['img'][4]!=''?$content['img'][4]:$this->url->get().'public/img/noimage.png'):$this->url->get().'public/img/noimage.png';  ?>" width="50px" height="50px" /></li>
                </ul>
            </div>
        </div>
        <?php }?>
        <div id="des_new" class="padT10 padB10">
            <b class="error_put">{{ lang._('warning_post') }}.</b>
            <br />
            <?php
            if($data['data_content']->warning==1)
            {
                echo '<b class="error_put">'.$lang->_('report').'.</b>';
            }
            ?>
            <h3>{{ lang._('content') }}:</h3>
            <!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- noidung -->
            <!--<ins class="adsbygoogle"
                 style="display:inline-block;width:468px;height:15px"
                 data-ad-client="ca-pub-3431173096387405"
                 data-ad-slot="6871621978"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script> -->
            <div class="padT5" itemprop="description">
                <br>
                <!--<div class="padT5" style="overflow: hidden;">
                    <script type="text/javascript">
                    var var1 = "728";
                    var var2 = "90";
                    var var3 = "728x90";
                    var var4 = "11232";
                    var var5 = "c291b01517f3e6797c774c306591cc32";
                    </script><script type="text/javascript" src="//cdn.adshexa.com/show_ads.php"></script>
                </div> -->
                <br>
                <?php echo $data['data_content']->content; ?>
			     <br><br>
               <!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- quangcao8 -->
                <!--<ins class="adsbygoogle"
                     style="display:inline-block;width:680px;height:80px"
                     data-ad-client="ca-pub-3431173096387405"
                     data-ad-slot="4256548373"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script> -->
            </div>
            <div class="clear"></div>
            <div id="div_control">
                <span id="span_rank" title="Xếp hạng">Thứ <?= $data['rank']; ?></span>
                <span id="span_gotop" title="Lên top" onclick="gotop('<?php echo ($data['data_content']->id); ?>', '<?= $checkuser?>', '<?php echo ($data['data_content']->id_user); ?>');"></span>
                <span class="warning" onclick="warning_report('<?php echo ($data['data_content']->id); ?>');">Báo lừa đảo</span>
                <span id="span_govip" title="Lên VIP" onclick="govip('<?php echo ($data['data_content']->id); ?>', '<?= $checkuser?>', '<?php echo ($data['data_content']->id_user); ?>');"></span>
                <span style="float: right; " <?php if($data['data_content']->id_user == '2' || $data['data_content']->id_user == '1') echo 'hidden=""'; ?>><a href="<?php echo $this->url->get('user/mynews').'/'.$data['data_content']->id_user; ?>"><img style="margin-right: 5px;" src="<?php echo $this->url->get('public/img/icon_arrow_right.gif'); ?>" />Các tin rao vặt đã đăng</a></span>
            </div>
            <?php if($data['data_content']->id_user!=2){ ?>
            <div class="div_comment_fb">
                <div data-width="680" data-numposts="10" class="fb-comments" data-href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REDIRECT_URL']; ?>" data-numposts="5" data-colorscheme="light"></div>
            </div>
            <?php } ?>
        </div>
        </div>
        
        <div class="box_data_new">
        <ul itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="li_title">
                <div>{{ lang._('same_post') }}</div>
            </li>
            <?php 
            foreach($data['content_in_cate']->items as $itemContent)
            {
                $img_first = $this->utils->explode_first($itemContent['img'], ',');
            ?>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" onmousemove="mymousemove(this);" onmouseout="mymouseout(this);">
                <div class="div_box_img_title_info">
                    <div class="div_img"><img itemprop="image" alt="<?php echo $this->utils->enhtml($itemContent['title']); ?>" src="<?php if(isset($img_first) && $img_first!='')echo $img_first; else echo $this->url->get().'public/img/noimg.png';?>" width="90" height="90" /></div>
                    <div class="div_box_title">
                        <a itemprop="url" title="<?php echo $this->utils->enhtml($itemContent['title']); ?>" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($itemContent['title']).'_i'.$itemContent['id'].'.html'); ?>">
                            <h3 itemprop="name"><?php echo $this->utils->enhtml($itemContent['title']); ?></h3>
                        </a>
                        <span itemprop="description"></span>
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
                            echo $subdate['d'].' '.$lang->_("prev_i").'.';
                        }
                        else
                        {
                            echo date('d-m-Y', strtotime(($itemContent['date'])));
                        }
                     ?></span>
                        <span><s2></s2><?php echo $this->utils->getCity($itemContent['city']); ?></span>
                        <a title="<?php echo $this->utils->enhtml($itemContent['title']); ?>" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($itemContent['title']).'_i'.$itemContent['id']); ?>">Xem tiếp ...</a>
                    </h5>
                </div>
            </li>
            <?php }?>
        </ul>
    </div>
    </div>

     
    <!--<div id="fb-root" style="width:680px !important;"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>  -->
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
            <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="li_title">{{ lang._('hot_post') }}</li>
                <?php 
                foreach($data['content_hot'] as $icontent)
                {
                ?>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><div style="float: left; width: 50px;"><img itemprop="image" src="<?php
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
                ?>" style="vertical-align: middle; margin-right: 5px; max-width: 50px; max-height: 50px;" alt="<?php echo $this->utils->enhtml($icontent->title);?>"></div>
                <div style="float: right; width: 182px; margin-top: -5px;">
                <a itemprop="url" target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($icontent->title).'_i'.$icontent->id).'.html'; ?>"><?php echo $this->utils->enhtml($icontent->title);?></a></div><div class="clear"></div></li>
                <?php }?>
            </ul>
        </div>
        
    </div>
    <div class="clear"></div>
    
</div>

<script>
    $(".remove_checkname").remove();
    
    $("#image div ul li").hover(function(e)
    {
        $("#showimage").html(this.innerHTML);
        $("#showimage img").removeAttr('width');
        $("#showimage img").removeAttr('height');
        $("#image div ul li").css('border','1px solid #EEE');
        $(this).css('border','1px solid');
        $("#showimage img").css("max-width","390px");
        $("#showimage img").css("max-height","305px");
    });
    
    
</script>

<style>
.vip_items{text-align: center; width: 100px; height: 110px; float: left; padding: 10px 10px 5px; overflow: hidden;}
.vip_items a{color: rgb(102, 102, 102);}
.vip_items a:hover{color: #f60!important;}
</style>