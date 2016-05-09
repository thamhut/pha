<div data-role="header">
    <header data-theme="b" id="homeheader" data-role="header" style="" role="banner" class="ui-header ui-bar-a">
        <div style="top:0px;">
        <div style="float: left; overflow: hidden;margin:10px 0 0 10px; height: 20px;">
            <img src="{{ static_url() }}public/img/logo.png" height="100%" />
        </div>
        <div style="float: right; overflow: hidden;">
            <div style="width: 62px; height: 45px; vertical-align: middle; display: table-cell;">
                <span><a href="#cse-search-box" data-rel="popup" data-transition="slide"><img style="opacity: 0.8;" src="{{ static_url() }}public/img/icon_search.png" /></a>
                <a href="#popupMenu1" data-rel="popup" data-transition="slidedown"><img style="opacity: 0.8;"  src="{{ static_url() }}public/img/menu_icon.png" /></a></span>
            </div>
        </div>
        <div style="clear: both;"></div>
        </div>
    </header>
</div>
<div style="right: 10%;" data-role="popup" id="popupMenu1" >
        <ul data-role="listview">
            <?php
                foreach($lstcate as $k=>$icate)
                {
                    echo '<li><a data-ajax=\'false\' href="'.$this->url->get('category').'/'.$this->utils->converToUrl($icate['name']).'_i'.$icate['id'].'">'.strtoupper($icate['name']).'</a></li>';
                }
            ?>
            <li><a data-ajax='false' href="<?php echo $this->url->get('index/hot'); ?>">CHỌN LỌC</a></li>
            <li><a data-ajax='false' href="<?php echo $this->url->get('index/top')?>">NGHE NHIỀU</a></li>
            <?php
            if(isset($user['id'])){
                echo '<li><a data-ajax=\'false\' href="'.$this->url->get('logout').'">ĐĂNG XUẤT</a></li>';
            }
            ?>
		</ul>
</div>
    

<style type="text/css">
@import url(//www.google.com/cse/api/branding.css);
</style>
    <form data-theme="a" style="float: left;width: 215px;   border: none !important;background: transparent;" data-role="popup"  action="http://fightsportgroup.com/search" id="cse-search-box">
      <div>
        <input type="hidden" name="cx" value="partner-pub-3431173096387405:7816503170" />
        <input type="hidden" name="cof" value="FORID:10" />
        <input type="hidden" name="ie" value="UTF-8" />
        <input  type="search" name="q" size="32" />
      </div>
    </form>

<style>
#popupMenu1 h3 a{
}
#popupMenu1 ul li a{
}
</style>