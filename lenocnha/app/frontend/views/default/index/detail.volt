<div class="box_container">
    <div class="title_cate">
        <h3 style="font-size: 14px; padding: 0 10px; color: #b6b9c2 !important;" itemprop="name"><b><?php echo isset($music->title)?(strip_tags($music->title)):''; ?></b></h3>
    </div>
    <div class="item_box_content">
        <div>
            <div class="box_radio">
                <div class="bar_control">
                    <!--<audio controls>
                      <source src="<?php echo $music->url; ?>">
                    </audio>-->
                    <?php
                    if(strrpos($music->url,'zippyshare.com')!=false)
                    {
                        $link = explode('www', $music->url);
                        $link = explode('/file.html', $link[1]);
                        $link = explode('.zippyshare.com/v/', $link[0]);
                    ?>

                    <script type="text/javascript">var zippywww="<?php echo $link[0]; ?>";var zippyfile="<?php echo $link[1]; ?>";var zippytext="#000000";var zippyback="#313131";var zippyplay="#292726";var zippywidth=610;var zippyauto=true;var zippyvol=80;var zippywave = "#000000";var zippyborder = "#414141";</script><script type="text/javascript" src="http://api.zippyshare.com/api/embed_new.js"></script>
                     <?php
                    }
                    else if(strrpos($music->url,'youtube.com')!=false){
                    ?>
                    <script src="<?php echo $this->url->get().'public/js' ?>/jwplayer.js" ></script>
                    <script src="<?php echo $this->url->get().'public/js' ?>/jwplayer.html5.js" ></script>
                    <div id="myElement"></div>

                    <script>
                        jwplayer("myElement").setup({
                             'flashplayer': '<?php echo $this->url->get().'public/js' ?>/jwplayer.flash.swf',
                            'controlbar': 'bottom',
                            'file': '<?php echo $music->url; ?>',
                            'width': 610,
                            'height': 300
                        });
                    </script>
                    <?php }
			else{ ?>
				<audio controls>
                      		<source src="<?php echo $music->url; ?>">
                    		</audio>
		    <?php }
		    ?>

                </div>
            </div>
            <div class="box_action" style="margin: 10px 0px 0px; border-bottom: 1px solid rgb(81, 81, 81); padding: 10px 0px;">
                <span class="spanaction" id="playlist"><img style="vertical-align: sub;" src="/public/img/icon_plus.png">&nbsp;&nbsp;ThÃªm playlist</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="spanaction" id="share"><img style="vertical-align: sub;" src="/public/img/icon-share.png">&nbsp;&nbsp;Chia sáº»</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span onclick="action_music('_like', 1, '<?php echo $music->id;?>');"><img style="vertical-align: sub;" src="/public/img/icon_like1.png">&nbsp;&nbsp;ThÃ­ch</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span onclick="action_music('dislike', 1, '<?php echo $music->id;?>');"><img style="vertical-align: sub;" src="/public/img/icon_dislike.png">&nbsp;&nbsp;KhÃ´ng thÃ­ch</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  id="choose_point"><?php
                    for($i=1; $i<=10; ++$i)
                    {
                        if($i%2 == 1)
                        echo '<img class="img_choose" onclick="choose_point('.$i.','.$music->id.');" onmouseout="hidechoose('.$i.');" onmousemove="showchoose('.$i.');" id="_'.$i.'" src="/public/img/left_star_dark.png" width="5px" />';
                        if($i%2 == 0)
                        echo '<img class="img_choose" onclick="choose_point('.$i.','.$music->id.');" onmouseout="hidechoose('.$i.');" onmousemove="showchoose('.$i.');" id="_'.$i.'" src="/public/img/right_star_dark.png" width="5px" />';
                    }
                    echo '<i>&nbsp;&nbsp;BÃ¬nh chá»n</i>';
                    ?></span>
                <span onclick="action_music('download', 1, '<?php echo $music->id;?>');" style="float: right;"><a style="color: #eaedf6;" target="_blank" href="<?php echo 'http://'.$music->url;?>"><img style="vertical-align: sub;" src="/public/img/icon-download.png">&nbsp;&nbsp;Táº£i vá»</a></span>
            </div>

            <div id="box_div_action" class="" rel='1'>

            </div>

            <div style="padding: 10px 0;">
                <h3>ThÃ´ng tin bÃ i hÃ¡t</h3>
                <br />
                <p style="color: #a1a1a1;">
                    <h6>NgÆ°á»i Ä‘Äƒng: <a style="color: #a1a1a1;" href="<?php echo $this->url->get('user').'/'.$this->utils->converToUrl($music->user->username).'_i'.$music->user->id; ?>"><?php echo isset($music->user->username)?$music->user->username:''; ?></a></h6>
                    <br />
                    <div id="box_content" itemprop="description">
                    <?php
                        echo isset($music->description)?$music->description:'';
                    ?>
                    <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </p>
            </div>

            <div class="clear"></div>

            <div onclick="hideshow_content();" id="action_content" rel="1"><img src="/public/img/triangle_bottom.png" />Xem thÃªm</div>
            <br />
            <div class="div_top_music_box">
                <ul class="navbar_ul">
                    <li>Tags: </li>
                    <li>Nonstop</li>
                    <li>remix</li>
                    <li>Nháº¡c sÃ n hay</li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="div_comment_fb">
                <div data-width="608" data-numposts="10" class="fb-comments" data-href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" data-numposts="5" data-colorscheme="dark"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
{{ partial('right_menu_detail') }}
<script>
$("div.box_action .spanaction").click(function(e){
    var rel = $("div#box_div_action").attr('rel');
    if(rel == '1')
    {
        $("div#box_div_action").removeClass('hide_box_action');
        $("div#box_div_action").addClass('show_box_action');
        $("div#box_div_action").attr('rel', '2');
        if(e['currentTarget'].id == 'playlist')
        {
            /*$.ajax({
                type: "POST",
                url: $this->url->get+"index/sendmail",
                data: {  },
                success:function( msg ) {
                }
            });*/
            $("div#box_div_action").html('<span><i>Chá»©c nÄƒng chÆ°a hoÃ n thÃ nh!</i></span>');
        }
        
        if(e['currentTarget'].id == 'share')
        {
            var url = document.URL;
            var c = '<div class="inline-block">';
            c += '<a onclick="return popitup(\'https://www.facebook.com/sharer/sharer.php?app_id=309437425817038&u='+url+'&display=popup&ref=plugin\')" href="https://www.facebook.com/sharer/sharer.php?app_id=309437425817038&u='+url+'&display=popup&ref=plugin">';
            c += '<div class=\'icon_fb\'></div></a>  </div>&nbsp;&nbsp;<div class="inline-block">';
            c += '<a href="https://plus.google.com/share?url='+url+'" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;">';
            c += '<img src="https://www.gstatic.com/images/icons/gplus-32.png" alt="Share on Google+"/></a></div>&nbsp;&nbsp;<div class="inline-block">';
            c += '<a onclick="return popitup(\'https://twitter.com/intent/tweet?original_referer=https%3A%2F%2Fabout.twitter.com%2Fresources%2Fbuttons&text=Twitter%20Buttons%20|%20About&tw_p=tweetbutton&url='+url+')" href="https://twitter.com/intent/tweet?original_referer=https%3A%2F%2Fabout.twitter.com%2Fresources%2Fbuttons&text=Twitter%20Buttons%20|%20About&tw_p=tweetbutton&url='+url+'">';
            c += '<div class=\'icon_tw\'></div></a></div>';
            $("div#box_div_action").html(c);
        }
    }
    if(rel == '2')
    {
        $("div#box_div_action").removeClass('show_box_action');
        $("div#box_div_action").addClass('hide_box_action');
        $("div#box_div_action").attr('rel', '1');
    }

});

$("span#choose_point").hover(function(){
    $("span#choose_point i").hide();
},
function(){
    $("span#choose_point i").show();
}
);
</script>