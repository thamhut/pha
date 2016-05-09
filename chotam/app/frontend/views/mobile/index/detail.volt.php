<div role="main" class="ui-content" data-theme="b">
    <div>
        <div>
            <div style="text-align: center;">
            <div style="background: url(http://cdn.m.husqvarna.net/App_Themes/hq/carousel-button.png) no-repeat scroll 0 0 #fff;border-color: #fff;box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
            border-radius: 21px;border-style: solid;border-width: 2px;cursor: pointer;height: 37px;position: absolute;top: 150px;width: 37px;
            "></div>
            <?php 
                $img_first = $this->utils->explode_first($data['data_content']->img, ',');
                if($img_first)
                $content['img'] = explode(',', $data['data_content']->img);    
            ?>
            <img id="img_1" alt="<?= $this->utils->enhtml($data['data_content']->title) ?>"  src="<?php echo isset($img_first)&&$img_first!=''?$img_first:'/public/img/noimg.png';  ?>" style="max-width: 200px; max-height: 200px; width: 200px; height:200px;" /> 
            <div style="background: url(http://cdn.m.husqvarna.net/App_Themes/hq/carousel-button.png) no-repeat scroll 0 0 #fff;border-color: #fff;box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
            border-radius: 21px;border-style: solid;border-width: 2px;cursor: pointer;height: 37px;position: absolute;top: 150px;width: 37px;background-position: -37px 0;right:15px;
            "></div>
            </div>
            <div data-role="tabs" id="tabs">
              <div data-role="navbar">
                <ul>
                  <li><a href="#one" data-ajax="false">Nội dung</a></li>
                  <li><a href="#two" data-ajax="false">Liên hệ</a></li>
                  <li><a href="#ba" data-ajax="false">Hành động</a></li>
                </ul>
              </div>
              <div id="one" class="ui-body-d ui-content">
                <h1><?= $this->utils->enhtml($data['data_content']->title) ?></h1>
                <div id="des_new" class="padT10 padB10">
                    <b style="color: red;">Hãy cảnh báo nếu tin này là lừa đảo.</b>
                    <br />
                    <?php
                    if($data['data_content']->warning==1)
                    {
                        echo '<b style="color: red;">Tin này được người dùng báo lừa đảo, các bạn cần tìm hiểu kĩ.</b>';
                    }
                    ?>
                    <h3 style="">Nội dung đăng:</h3>
                    
                    <div class="padT5">
                        <?php echo ($data['data_content']->content); ?>
                    </div>
                </div>
              </div>
              <div id="two" class="ui-body-d ui-content">
                <ul data-role="listview" class="ui-content" style="text-align: center!important;">
                    <li style="text-align: center!important;"><span><img src="/public/img/date1.png" width="12" />&nbsp;&nbsp;<?php
                        $subdate = $this->utils->subdate(date("Y-m-d H:i:s"), $data['data_content']->date);
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
                            echo date('d-m-Y', strtotime($data['data_content']->date));
                        }
                        $lienlac = explode(',', $data['data_content']->lienlac);
                     ?></span></li>
                    <li style="text-align: center!important;"><span><img src="/public/img/city1.png" width="12" />&nbsp;&nbsp;<?php echo $this->utils->getCity($data['data_content']->city); ?></span></li>
                    <li style="text-align: center!important;"><span><img src="/public/img/email.gif" width="12" />&nbsp;&nbsp;<?php echo $lienlac[1]; ?></span></li>
                    <li style="text-align: center!important;"><span><img src="/public/img/mobile_icon.png" width="12" />&nbsp;&nbsp;<?php echo $lienlac[0]; ?></span></li>
                    <li style="text-align: center!important;"><span><img src="/public/img/skype_icon.jpg" width="12" />&nbsp;&nbsp;<?php echo isset($lienlac[3])?$lienlac[3]:''; ?></span></li>
                </ul>
              </div>
              
              <div id="ba" class="ui-body-d ui-content">
                <ul data-role="listview" class="ui-content" style="text-align: center!important;">
                    <li style="text-align: center!important;"><a data-ajax="false" class="warning" onclick="warning_report('<?php echo ($data['data_content']->id); ?>');" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-right ui-icon-alert" href="" ><span><img src="/public/img/warning.png" width="12" />&nbsp;&nbsp;Báo lừa đảo</span></a></li>
                    
                    <li style="text-align: center!important;"><a data-ajax="false" id="span_rank" title="Xếp hạng" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-right ui-icon-star" href="" ><span><img src="/public/img/rank.png" width="12" />&nbsp;&nbsp;Thứ <?= $data['rank'];  ?></span></a></li>
                    <?php
                    $user = isset($user)?$user:'';
                    $checkuser = 0;
                     if(isset($user['id']) && $user['id'] == $data['data_content']->id_user){ 
                        $checkuser = 1;
                        ?>
                    <li style="text-align: center!important;"><a data-ajax="false" id="span_gotop" title="Lên top" onclick="gotop('<?php echo ($data['data_content']->id); ?>', '<?= $checkuser?>', '<?php echo ($data['data_content']->id_user); ?>');" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-right ui-icon-arrow-u" href="" ><span><img src="/public/img/gotop.png" width="12" />&nbsp;&nbsp;Lên top</span></a></li>
                    <li style="text-align: center!important;"><a data-ajax="false" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-right ui-icon-star" title="xóa" href="<?php echo $this->url->get('news/delete/').$data['data_content']->id; ?>" onclick="return deleted_news();" ><span><img src="/public/img/rank.png" width="12" />&nbsp;&nbsp;Xóa tin</span></a></li>
                    <li style="text-align: center!important;"><a data-ajax="false" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-right ui-icon-star" title="sửa tin" href="<?php echo $this->url->get('news/update/').$data['data_content']->id; ?>" ><span><img src="/public/img/rank.png" width="12" />&nbsp;&nbsp;Sửa tin</span></a></li>
                    <?php }?>
                </ul>
              </div>
            </div>
    </div>
    <h3> Tin rao cùng chuyên mục</h3>

    <ul data-role="listview" data-filter="true">
        <?php 
        foreach($data['content_in_cate']->items as $itemContent)
        {
            $img_first = $this->utils->explode_first($itemContent['img'], ',');
        ?>
        <li><a data-ajax="false" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($itemContent['title']).'_i'.$itemContent['id']).'.html'; ?>">
            <img alt="<?php echo $this->utils->enhtml($itemContent['title']); ?>" src="<?php if(isset($img_first) && $img_first!='')echo $img_first; else echo $this->url->get().'public/img/noimg.png';?>" width="90" height="90" />
            <h3><?php echo $this->utils->enhtml($itemContent['title']); ?></h3>
            <h6><?php 
                $string = $itemContent['content'];
                echo $this->utils->getcontentlst($string);
             ?></h6>
             <h6><s style='vertical-align: middle;background: url("/public/img/mdate.png") no-repeat scroll 0 0 transparent;display: inline-block;height: 0;margin-right: 3px;overflow: hidden;padding-top: 13px;width: 16px;'></s><?php
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
         ?></h6>
        </a></li>
        <?php
        } 
        ?>

    </ul>
</div>