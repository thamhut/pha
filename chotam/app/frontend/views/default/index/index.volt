<script type="text/javascript">
  $(document).ready(function() {
    $("select.special-flexselect").flexselect({ hideDropdownOnEmptyInput: true });
    //$("select.flexselect").flexselect();
    //$("input:text:enabled:first").focus();
    $("#city").change(function(){
       $("span.address_select").html($("#city_flexselect").val());
       $("#city1").val($("#city").val());
       search_partner('city', $("#city").val());
    });
    
  });
</script>
<script>
$(function() {
	$("#scrollable").scrollable({
		size: 1,
		circular: true		
	}).navigator().autoscroll({
		autoplay: true,
		interval: 3000
	}); 	

});
$(function() {
	$("#scrollable_img").scrollable({
		size: 1,
		circular: true		
	}).navigator().autoscroll({
		autoplay: true,
		interval: 3000
	}); 	

});
</script>
<div class="box_container_new">
    <div id="add_top">
        <!-- root element for scrollable -->
        <div class="div_browse div_browse_left" style=""><a class="prev browse2 left"></a></div>
    	<div class="scrollable" id="scrollable">   
    	   <!-- root element for the items -->
    	   <div itemtype="http://schema.org/ItemList" class="items" style="left: -1980px;">
           {% for key,value in content_data %}
               <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
               <a itemprop="url" href='{{ this.url.get("detail/" ~ this.utils.converToUrl(value["title"])) ~ "_i" ~ value["id"] ~ ".html" }}'>
                    <img itemprop="image" src='{{ this.utils.explode_first(value["img"], ",") != null ? this.utils.explode_first(value["img"], ",") : "/public/img/noimg.png" }}' />
                    <h4 itemprop="name" style="padding: 3px 40px;color:#08c">{{ this.utils.gettitle(value["title"]) }}...</h4>
               </a></div>
           {% endfor %}
           </div>
           
    	</div>
    	 <!-- "next page" action -->
         <div class="div_browse div_browse_right"><a class="next browse2 right"></a></div>
    </div>
    <div class="clear"></div>
    <br />
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
    
    <div class="div_box_container_left" >
    
        <div class="box_data_new rebor rebackground" style="width:760px;">
            
            
            <div id="append_partner">
                
            <div style="float: left; width:250px;">
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="li_title" style="text-align: left;padding-left:10px;">
                            <img itemprop="image" style="vertical-align: middle;" width="28px" src="{{ static_url('public/img/tin-rao-viec-lam.png') }}" />
                            <a itemprop="url" href="{{ this.url.get('category/viec-lam_i1') }}" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Việc làm</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==1)
                            {
                                echo ' <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a itemprop="url" title="'.$item['name'].'" href="'.$this->url->get('category').'/viec-lam-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img itemprop="image" alt="'.$item['name'].'" src="'.$this->url->get("/public/img/icon_parrow_right.gif").'" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="li_title" style="text-align: left;padding-left:10px;">
                            <img itemprop="image" alt="Bất động sản" style="vertical-align: middle;" width="28px" src="{{ static_url('public/img/tin-rao-bat-dong-san.png') }}" />
                            <a itemprop="url" title="Bất động sản" href="{{ this.url.get('category/bat-dong-san_i13') }}" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Bất động sản</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==13)
                            {
                                echo ' <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a itemprop="url" title="'.$item['name'].'" href="'.$this->url->get('category').'/bat-dong-san-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img itemprop="image" alt="'.$item['name'].'" src="'.$this->url->get("/public/img/icon_parrow_right.gif").'" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="li_title" style="text-align: left;padding-left:10px;">
                            <img itemprop="image" alt="Điện thoại" style="vertical-align: middle;" width="28px" src="{{ static_url('public/img/tin-rao-dien-thoai.png') }}" />
                            <a itemprop="url" title="Điện thoại" href="{{ this.url.get('category/dien-thoai_i18') }}" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Điện thoại</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==18)
                            {
                                echo ' <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a itemprop="url" title="'.$item['name'].'" href="'.$this->url->get('category').'/dien-thoai-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img itemprop="image" alt="'.$item['name'].'" src="'.$this->url->get("/public/img/icon_parrow_right.gif").'" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="li_title" style="text-align: left;padding-left:10px;">
                            <img itemprop="image" alt="Sim thẻ" style="vertical-align: middle;" width="28px" src="{{ static_url('public/img/tin-rao-sim-the.png') }}" />
                            <a itemprop="url" title="Sim thẻ" href="{{ this.url.get('category/sim-the_i72') }}" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Sim thẻ</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==72)
                            {
                                echo ' <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a itemprop="url" title="'.$item['name'].'" href="'.$this->url->get('category').'/sim-the-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img itemprop="image" alt="'.$item['name'].'" src="'.$this->url->get("/public/img/icon_parrow_right.gif").'" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            
            <div style="float: left; width:250px;">
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="li_title" style="text-align: left;padding-left:10px;">
                            <img itemprop="image" alt="Mua bán" style="vertical-align: middle;" width="28px" src="{{ static_url('public/img/mua-ban-chung.png') }}" />
                            <a itemprop="url" title="Mua bán" href="{{ this.url.get('category/mua-ban_i26') }}" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Mua bán</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==26)
                            {
                                echo ' <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a itemprop="url" title="'.$item['name'].'" href="'.$this->url->get('category').'/mua-ban-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img itemprop="image" alt="'.$item['name'].'" src="'.$this->url->get("/public/img/icon_parrow_right.gif").'" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="li_title" style="text-align: left;padding-left:10px;">
                            <img itemprop="image" alt="Điện tử gia dụng" style="vertical-align: middle;" width="28px" src="{{ static_url('public/img/dien-tu-gia-dung.png') }}" />
                            <a itemprop="url" title="Điện tử gia dụng" href="{{ this.url.get('category/dien-tu-gia-dung_i37') }}" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Điện tử gia dụng</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==26)
                            {
                                echo ' <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a itemprop="url" title="'.$item['name'].'" href="'.$this->url->get('category').'/dien-tu-gia-dung-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img itemprop="image" alt="'.$item['name'].'" src="'.$this->url->get("/public/img/icon_parrow_right.gif").'" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="li_title" style="text-align: left;padding-left:10px;">
                            <img itemprop="image" alt="Máy tính" style="vertical-align: middle;" width="28px" src="{{ static_url('public/img/may-tinh-phan-mem.png') }}" />
                            <a itemprop="url" title="Máy tính" href="{{ this.url.get('category/may-tinh_i45') }}" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Máy tính</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==45)
                            {
                                echo ' <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a itemprop="url" title="'.$item['name'].'" href="'.$this->url->get('category').'/may-tinh-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img itemprop="image" alt="'.$item['name'].'" src="'.$this->url->get("/public/img/icon_parrow_right.gif").'" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="li_title" style="text-align: left;padding-left:10px;">
                            <img itemprop="image" alt="THời trang mỹ phẩm" style="vertical-align: middle;" width="28px" src="{{ static_url('public/img/thoi-trang---my-pham.png') }}" />
                            <a itemprop="url" title="Thời trang mỹ phẩm" href="{{ this.url.get('category/thoi-trang-my-pham_i59') }}" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Thời trang - mỹ phẩm</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==59)
                            {
                                echo ' <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a itemprop="url" title="'.$item['name'].'" href="'.$this->url->get('category').'/thoi-trang-my-pham-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img itemprop="image" alt="'.$item['name'].'" src="'.$this->url->get("/public/img/icon_parrow_right.gif").'" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            
            <div style="float: left; width:250px;">
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="li_title" style="text-align: left;padding-left:10px;">
                            <img itemprop="image" alt="Phương tiện đi lại" style="vertical-align: middle;" width="28px" src="{{ static_url('public/img/phuong-tien-di-lai.png') }}" />
                            <a itemprop="url" title="Phương tiện đi lại" href="{{ this.url.get('category/phuong-tien-di-lai_i52') }}" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Phương tiện đi lại</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==52)
                            {
                                echo ' <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a itemprop="url" title="'.$item['name'].'" href="'.$this->url->get('category').'/phuong-tien-di-lai-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img itemprop="image" alt="'.$item['name'].'" src="'.$this->url->get("/public/img/icon_parrow_right.gif").'" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="li_title" style="text-align: left;padding-left:10px;">
                            <img itemprop="image" alt="Mẹ và bé" style="vertical-align: middle;" width="28px" src="{{ static_url('public/img/tin-rao-me-va-be.png') }}" />
                            <a itemprop="url" title="Mẹ và bé" href="{{ this.url.get('category/me-va-be_i65') }}" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Mẹ và bé</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==65)
                            {
                                echo ' <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a itemprop="url" title="'.$item['name'].'" href="'.$this->url->get('category').'/me-va-be-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img itemprop="image" alt="'.$item['name'].'" src="'.$this->url->get("/public/img/icon_parrow_right.gif").'" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                
            </div>
            
            <div style="float: left; width:250px;">
                
               
               <div style="padding:0px; height:auto;" class="item_profile">
                    <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="li_title" style="text-align: left;padding-left:10px;">
                            <img itemprop="image" alt="Dịch vụ" style="vertical-align: middle;" width="28px" src="{{ static_url('public/img/tin-rao-dich-vu.png') }}" />
                            <a itemprop="url" title="Dịch vụ" href="{{ this.url.get('category/dich-vu_i80') }}" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Dịch vụ</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==80)
                            {
                                echo ' <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a itemprop="url" title="'.$item['name'].'" href="'.$this->url->get('category').'/dich-vu-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img itemprop="image" alt="'.$item['name'].'" src="'.$this->url->get("/public/img/icon_parrow_right.gif").'" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
            
           
            </div>
            <div class="clear"></div>
        </div>
    </div>
    
    <div class="div_box_container_right" style="margin-top: 20px;">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- quangcao5 -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:260px;height:260px"
             data-ad-client="ca-pub-3431173096387405"
             data-ad-slot="7980682374"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <div style="height: 20px;"></div>
        <div id="load_hot_news" class="div_lst_cate div_lst_news_hot">

        </div>
        
    </div> 
    <div class="clear"></div>
</div>
<script>
$.ajax({
    type: "POST",
    url: BASE_URL+"index/load_hot_news",
    data: { },
    success:function( msg ) {
        if(msg!='')
        {
            var arr = JSON.parse(msg);
            var c ='<ul><li class="li_title">Các tin nổi bật</li>';
            for(var i = 0; i<arr.length; ++i)
            {
                var img = arr[i]['img']?arr[i]['img']:'';
                img = img.split(',');img = img[0]?img[0]:'';
                if(img=='')
                {
                    img = "/public/img/noimg.png";
                }
                c += '<li><div style="float: left; width: 50px;"><img src="'+img+'" style="vertical-align: middle; margin-right: 5px; max-width: 50px; max-height: 50px;"></div><div style="float: right; width: 182px; margin-top: -5px;"><a href="'+arr[i]['url']+'.html">'+arr[i]['title']+'</a></div><div class="clear"></div></li>';  
            }
            c += '</ul>';
            $('#load_hot_news').html(c);
        }
    }
});
</script>