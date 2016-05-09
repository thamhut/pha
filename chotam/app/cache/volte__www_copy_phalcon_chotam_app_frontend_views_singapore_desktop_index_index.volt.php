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
    	   <div class="items" style="left: -1980px;">
           <?php foreach ($content_data as $key => $value) { ?>
               <div><a href='<?php echo $this->url->get('detail/' . $this->utils->converToUrl($value['title'])) . '_i' . $value['id'] . '.html'; ?>'>
                    <img src='<?php echo ($this->utils->explode_first($value['img'], ',') != null ? $this->utils->explode_first($value['img'], ',') : '/public/img/noimg.png'); ?>' />
                    <h4 style="padding: 3px 40px;color:#08c"><?php echo $this->utils->gettitle($value['title']); ?>...</h4>
               </a></div>
           <?php } ?>
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
                    <ul>
                        <li class="li_title" style="text-align: left;padding-left:10px;"><img style="vertical-align: middle;" width="28px" src="http://chotam.info/public/img/stuff-for-sale.png" />
                            <a href="<?php echo $this->url->getStatic('category/stuff-for-sale_i1'); ?>" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Stuff for sale</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==1)
                            {
                                echo ' <li class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a href="'.$this->url->get('category').'/stuff-for-sale-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img src="http://chotam.info/public/img/icon_parrow_right.gif" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul>
                        <li class="li_title" style="text-align: left;padding-left:10px;"><img style="vertical-align: middle;" width="28px" src="http://chotam.info/public/img/jobs.png" />
                            <a href="<?php echo $this->url->getStatic('category/jobs_i69'); ?>" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Jobs</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==69)
                            {
                                echo ' <li class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a href="'.$this->url->get('category').'/jobs-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img src="http://chotam.info/public/img/icon_parrow_right.gif" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            
            <div style="float: left; width:250px;">
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul>
                        <li class="li_title" style="text-align: left;padding-left:10px;"><img style="vertical-align: middle;" width="28px" src="http://chotam.info/public/img/property.png" />
                            <a href="<?php echo $this->url->getStatic('category/property_i49'); ?>" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Property</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==49)
                            {
                                echo ' <li class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a href="'.$this->url->get('category').'/property-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img src="http://chotam.info/public/img/icon_parrow_right.gif" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul>
                        <li class="li_title" style="text-align: left;padding-left:10px;"><img style="vertical-align: middle;" width="28px" src="http://chotam.info/public/img/home-furnishing.png" />
                            <a href="<?php echo $this->url->getStatic('category/home-furnishing_i33'); ?>" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Home Furnishing</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==33)
                            {
                                echo ' <li class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a href="'.$this->url->get('category').'/home-furnishing-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img src="http://chotam.info/public/img/icon_parrow_right.gif" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul>
                        <li class="li_title" style="text-align: left;padding-left:10px;"><img style="vertical-align: middle;" width="28px" src="http://chotam.info/public/img/vehicles.png" />
                            <a href="<?php echo $this->url->getStatic('category/vehicles_i59'); ?>" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Vehicles</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==59)
                            {
                                echo ' <li class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a href="'.$this->url->get('category').'/vehicles-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img src="http://chotam.info/public/img/icon_parrow_right.gif" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul>
                        <li class="li_title" style="text-align: left;padding-left:10px;"><img style="vertical-align: middle;" width="28px" src="http://chotam.info/public/img/community.png" />
                            <a href="<?php echo $this->url->getStatic('category/community_i118'); ?>" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Community</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==118)
                            {
                                echo ' <li class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a href="'.$this->url->get('category').'/community-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img src="http://chotam.info/public/img/icon_parrow_right.gif" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                
                
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul>
                        <li class="li_title" style="text-align: left;padding-left:10px;"><img style="vertical-align: middle;" width="28px" src="http://chotam.info/public/img/petspet-care.png" />
                            <a href="<?php echo $this->url->getStatic('category/pets-pet-care_i103'); ?>" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Pets/Pet Care</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==103)
                            {
                                echo ' <li class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a href="'.$this->url->get('category').'/pets-pet-care-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img src="http://chotam.info/public/img/icon_parrow_right.gif" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                
            </div>
            
            <div style="float: left; width:250px;">
                
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul>
                        <li class="li_title" style="text-align: left;padding-left:10px;"><img style="vertical-align: middle;" width="28px" src="http://chotam.info/public/img/entertainment--events.png" />
                            <a href="<?php echo $this->url->getStatic('category/entertainment-events_i129'); ?>" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Entertainment & Events</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==129)
                            {
                                echo ' <li class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a href="'.$this->url->get('category').'/entertainment-events-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img src="http://chotam.info/public/img/icon_parrow_right.gif" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                
            </div>
            
            <div style="float: left; width:250px;">
                
               
               <div style="padding:0px; height:auto;" class="item_profile">
                    <ul>
                        <li class="li_title" style="text-align: left;padding-left:10px;"><img style="vertical-align: middle;" width="28px" src="http://chotam.info/public/img/services.png" />
                            <a href="<?php echo $this->url->getStatic('category/services_i135'); ?>" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Services</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==135)
                            {
                                echo ' <li class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a href="'.$this->url->get('category').'/services-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img src="http://chotam.info/public/img/icon_parrow_right.gif" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul>
                        <li class="li_title" style="text-align: left;padding-left:10px;"><img style="vertical-align: middle;" width="28px" src="http://chotam.info/public/img/travel.png" />
                            <a href="<?php echo $this->url->getStatic('category/travel_i153'); ?>" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Travel</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==153)
                            {
                                echo ' <li class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a href="'.$this->url->get('category').'/travel-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img src="http://chotam.info/public/img/icon_parrow_right.gif" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                
                
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul>
                        <li class="li_title" style="text-align: left;padding-left:10px;"><img style="vertical-align: middle;" width="28px" src="http://chotam.info/public/img/clothesbeauty.png" />
                            <a href="<?php echo $this->url->getStatic('category/clothes-beauty_i38'); ?>" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Clothes/Beauty</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==38)
                            {
                                echo ' <li class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a href="'.$this->url->get('category').'/clothes-beauty-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img src="http://chotam.info/public/img/icon_parrow_right.gif" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                
                <div style="padding:0px; height:auto;" class="item_profile">
                    <ul>
                        <li class="li_title" style="text-align: left;padding-left:10px;"><img style="vertical-align: middle;" width="28px" src="http://chotam.info/public/img/electronics.png" />
                            <a href="<?php echo $this->url->getStatic('category/electronics_i25'); ?>" style="color: rgb(0, 136, 204); font-weight: bold; font-size: 14px; padding-left: 5px;">Electronics</a>
                        </li>
                        <br />
                         <?php
                        foreach($category_data as $item)
                        {
                            if($item['id']==25)
                            {
                                echo ' <li class="reborB padB5" style="text-align: left;padding:0 0 5px 20px;">';
                                echo '<a href="'.$this->url->get('category').'/electronics-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">';
                                echo '<img src="http://chotam.info/public/img/icon_parrow_right.gif" />&nbsp;&nbsp;&nbsp;'.$item['name'].'</a></li>';
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
    
    <div class="div_box_container_right" style="margin-top: -90px;">
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
            var c ='<ul><li class="li_title">Hot News</li>';
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