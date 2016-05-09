<div class="div_menu_right">
    <div class="div_search_box">
        <style type="text/css">
        @import url(//www.google.com/cse/api/branding.css);
        </style>
        <div class="cse-branding-bottom" style="color:#000000">
          <div class="cse-branding-form">
            <form action="http://lenocnha.com/search" id="cse-search-box">
              <div>
                <input type="hidden" name="cx" value="partner-pub-3431173096387405:7816503170" />
                <input type="hidden" name="cof" value="FORID:10" />
                <input type="hidden" name="ie" value="UTF-8" />
                <input type="text" name="q" size="32" />
                <input class="search_icon" style="background: url('/public/img/search_icon.png') no-repeat;" type="submit" name="sa" value="" />
              </div>
            </form>
          </div>
        </div>

        <!--<div class="search_icon"><img src="/public/img/search_icon.png" /></div>-->
    </div>
    
    <div class="div_top_music_box marT10">
        <ul class="navbar_ul">
            <li onclick="show_right_box('1', this);" class="current poiter">Video DJ</li>
            <li onclick="show_right_box('2', this);" class="poiter">Chọn lọc</li>
            <li onclick="show_right_box('3', this);" class="poiter">Nghe nhiều</li>
        </ul>
        
        <div class="box_item_right_menu" id="1_box_right">
            <div class="fillter_date"><a style="text-decoration: underline;" onclick="show_video('1',this);">Tuần</a> | <a onclick="show_video('2',this);">Tháng</a> | <a onclick="show_video('3',this);">Năm</a></div>
            <div id="1_video_box" class="video_box ">
                <?php
                $i=0;
                foreach($top_video_1 as $ihot)
                {
                   $i++; 
                ?>
                    <div id="item_lst_right">
                        <a title="<?php echo $ihot['title']; ?>" target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($ihot['title']).'_i'.$ihot['id']); ?>">
                            <img alt="<?php echo $ihot['title']; ?>" src="<?php echo $ihot['poster']; ?>" style="height: 70px; width: 70px;">
                        </a>
                        <div  style="float: right; width: 170px;">
                            <h3 style="font-size: 11px; height: 50px; overflow: hidden;"><a title="<?php echo $ihot['title']; ?>" target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($ihot['title']).'_i'.$ihot['id']); ?>"><?php echo $ihot['title']; ?></a></h3>
                            <p style="font-size: 10px;">Lượt xem: <?php echo $ihot['play']; ?></p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                <?php
                }
                ?>
            </div>
            
            <div id="2_video_box" class="video_box hidden">
                <?php
                $i=0;
                foreach($top_video_2 as $ihot)
                {
                   $i++; 
                ?>
                    <div id="item_lst_right">
                        <a title="<?php echo $ihot['title']; ?>" target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($ihot['title']).'_i'.$ihot['id']); ?>">
                            <img alt="<?php echo $ihot['title']; ?>" src="<?php echo $ihot['poster']; ?>" style="height: 70px; width: 70px;">
                        </a>
                        <div  style="float: right; width: 170px;">
                            <h3 style="font-size: 11px; height: 50px; overflow: hidden;"><a title="<?php echo $ihot['title']; ?>" target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($ihot['title']).'_i'.$ihot['id']); ?>"><?php echo $ihot['title']; ?></a></h3>
                            <p style="font-size: 10px;">Lượt xem: <?php echo $ihot['play']; ?></p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                <?php
                }
                ?>
            </div>
            
            <div id="3_video_box" class="video_box hidden">
                <?php
                $i=0;
                foreach($top_video_3 as $ihot)
                {
                   $i++; 
                ?>
                    <div id="item_lst_right">
                        <a title="<?php echo $ihot['title']; ?>" target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($ihot['title']).'_i'.$ihot['id']); ?>">
                            <img alt="<?php echo $ihot['title']; ?>" src="<?php echo $ihot['poster']; ?>" style="height: 70px; width: 70px;">
                        </a>
                        <div  style="float: right; width: 170px;">
                            <h3 style="font-size: 11px; height: 50px; overflow: hidden;"><a title="<?php echo $ihot['title']; ?>" target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($ihot['title']).'_i'.$ihot['id']); ?>"><?php echo $ihot['title']; ?></a></h3>
                            <p style="font-size: 10px;">Lượt xem: <?php echo $ihot['play']; ?></p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                <?php
                }
                ?>
            </div>
            
        </div>
        
        <div class="box_item_right_menu hidden" id="2_box_right">
            <?php
            $i=0;
            foreach($hot_music as $ihot)
            {
               $i++; 
            ?>
                <div id="item_lst_right">
                    <div class="<?php if($i==1)echo 'top1';if($i==2)echo 'top2';if($i==3)echo 'top3'; ?>" style="margin: 5px 10px 0 0;float:left;height: 18px; width: 18px; border-radius: 9px; background: none repeat scroll 0% 0% rgb(95, 95, 95); text-align: center;"><?php echo $i; ?></div>
                    <div  style="float: left; width: 200px;">
                        <a title="<?php echo $ihot['title']; ?>" target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($ihot['title']).'_i'.$ihot['id']); ?>"><h3 style="font-size: 11px; max-height: 35px; overflow: hidden;"><?php echo $ihot['title']; ?></h3></a>
                        <p style="font-size: 10px;">Lượt xem: <?php echo $ihot['play']; ?></p>
                    </div>
                    <div class="clear"></div>
                </div>
                
            <?php
            }
            ?>
            
        </div>
        
        <div class="box_item_right_menu hidden" id="3_box_right">
            <div class="fillter_date"><a style="text-decoration: underline;" onclick="show_hot('1',this);">Tuần</a> | <a onclick="show_hot('2',this);">Tháng</a> | <a onclick="show_hot('3',this);">Năm</a></div>
            <div id="1_hot_box" class="hot_box ">
            <?php
            $i = 0;
            foreach($top_music_1 as $itop)
            {
                $i++;
            ?>
                <div id="item_lst_right">
                    <div class="<?php if($i==1)echo 'top1';if($i==2)echo 'top2';if($i==3)echo 'top3'; ?>" style="margin: 5px 10px 0 0;float:left;height: 18px; width: 18px; border-radius: 9px; background: none repeat scroll 0% 0% rgb(95, 95, 95); text-align: center;"><?php echo $i; ?></div>
                    <div  style="float: left; width: 200px;">
                        <a title="<?php echo $itop['title']; ?>" target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($itop['title']).'_i'.$itop['id']); ?>"><h3 style="font-size: 11px; max-height: 35px; overflow: hidden;"><?php echo $itop['title']; ?></h3></a>
                        <p style="font-size: 10px;">Lượt xem: <?php echo $itop['play']; ?></p>
                    </div>
                    <div class="clear"></div>
                </div>
            <?php
            }
            ?>
            </div>
            <div id="2_hot_box" class="hot_box hidden">
            <?php
            $i = 0;
            foreach($top_music_2 as $itop)
            {
                $i++;
            ?>
                <div id="item_lst_right">
                    <div class="<?php if($i==1)echo 'top1';if($i==2)echo 'top2';if($i==3)echo 'top3'; ?>" style="margin: 5px 10px 0 0;float:left;height: 18px; width: 18px; border-radius: 9px; background: none repeat scroll 0% 0% rgb(95, 95, 95); text-align: center;"><?php echo $i; ?></div>
                    <div  style="float: left; width: 200px;">
                        <a title="<?php echo $itop['title']; ?>" target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($itop['title']).'_i'.$itop['id']); ?>"><h3 style="font-size: 11px; max-height: 35px; overflow: hidden;"><?php echo $itop['title']; ?></h3></a>
                        <p style="font-size: 10px;">Lượt xem: <?php echo $itop['play']; ?></p>
                    </div>
                    <div class="clear"></div>
                </div>
            <?php
            }
            ?>
            </div>
            <div id="3_hot_box" class="hot_box hidden">
            <?php
            $i = 0;
            foreach($top_music_3 as $itop)
            {
                $i++;
            ?>
                <div id="item_lst_right">
                    <div class="<?php if($i==1)echo 'top1';if($i==2)echo 'top2';if($i==3)echo 'top3'; ?>" style="margin: 5px 10px 0 0;float:left;height: 18px; width: 18px; border-radius: 9px; background: none repeat scroll 0% 0% rgb(95, 95, 95); text-align: center;"><?php echo $i; ?></div>
                    <div  style="float: left; width: 200px;">
                        <a title="<?php echo $itop['title']; ?>" target="_blank" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($itop['title']).'_i'.$itop['id']); ?>"><h3 style="font-size: 11px; max-height: 35px; overflow: hidden;"><?php echo $itop['title']; ?></h3></a>
                        <p style="font-size: 10px;">Lượt xem: <?php echo $itop['play']; ?></p>
                    </div>
                    <div class="clear"></div>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
        
    </div>
    <br />
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <div class="fb-like-box" data-href="https://www.facebook.com/pages/H%E1%BB%99i-Thanh-Ni%C3%AAn-Bay-V%C3%AC-Nh%E1%BA%A1c-S%C3%A0n-Lan-Man-Nh%E1%BA%A1c-Nonstop-Stop-C%C3%B9ng-Nh%E1%BA%A1c-Dj/1405309099768590" data-width="250px" data-colorscheme="dark" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
</div>