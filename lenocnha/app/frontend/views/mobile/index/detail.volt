<div role="main" class="" data-theme="a">
    <br />
    <div id ="content_music">
        <?php
        if(strrpos($music->url,'zippyshare.com')!=false)
        {
            $link = explode('www', $music->url);
            $link = explode('/file.html', $link[1]);
            $link = explode('.zippyshare.com/v/', $link[0]);
        ?>
        <ul data-role="listview" >
            <li>
                <img  style="margin-left: 10px; top: 10px;" src="/public/img/users.png" />
                <h3><b><?php echo isset($music->title)?(strip_tags($music->title)):''; ?></b></h3>
                <p>ÄÄƒng bá»Ÿi: <?php echo isset($music->username)?$music->username:''; ?></p>
                <p><img style="vertical-align: sub;" src="/public/img/icon-play-button.png" />&nbsp;&nbsp;&nbsp;<?php echo isset($music->play)?$music->play:0; ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="vertical-align: sub;" src="/public/img/icon_like1.png" />&nbsp;&nbsp;&nbsp;<?php echo isset($music->_like)?$music->_like:0; ?>
                </p>
            </li>
        </ul>
        <script type="text/javascript">
            var zippywww="<?php echo $link[0]; ?>";
            var zippyfile="<?php echo $link[1]; ?>";
            var zippytext="#000000";
            var zippyback="#313131";
            var zippyplay="#292726";
            var zippywidth=$(document).width();
            var zippyauto=true;
            var zippyvol=80;
            var zippywave = "#000000";var zippyborder = "#414141";</script>
        <script type="text/javascript" src="//api.zippyshare.com/api/embed_new.js"></script>
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
                'width':$(document).width()
            });
        </script>
	<?php }
			else{ ?>
				<audio controls>
                      		<source src="<?php echo $music->url; ?>">
                    		</audio>
		<?php }
	?>

        <ul data-role="listview" class="ui-content" >
            <li>
                <img  style="margin-left: 10px; top: 10px;" src="/public/img/users.png" />
                <h3><b><?php echo isset($music->title)?(strip_tags($music->title)):''; ?></b></h3>
                <p>ÄÄƒng bá»Ÿi: <?php echo isset($music->username)?$music->username:''; ?></p>
                <p><img style="vertical-align: sub;" src="/public/img/icon-play-button.png" />&nbsp;&nbsp;&nbsp;<?php echo isset($music->play)?$music->play:0; ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="vertical-align: sub;" src="/public/img/icon_like1.png" />&nbsp;&nbsp;&nbsp;<?php echo isset($music->_like)?$music->_like:0; ?>
                </p>
            </li>
        </ul>
        <?php }?>

        <div class="ui-content">
            <div  data-role="navbar">
                <ul>
                    <li><a title="ThÃªm playlist" style="background: #ffffff;" data-ajax='false' data-icon="plus"></a></li>
                    <li class="spanaction" id="share">
                        <a data-ajax='false'  title="Chia sáº»" style="background: #ffffff;" data-icon="action" ></a>
                    </li>
                    <li><a title="ThÃ­ch" style="background: #ffffff;" data-ajax='false' onclick="action_music('_like', 1, '<?php echo $music->id;?>');" data-icon='heart'></a></li>
                    <li><a title="KhÃ´ng thÃ­ch" style="background: #ffffff;" data-ajax='false' onclick="action_music('dislike', 1, '<?php echo $music->id;?>');" data-icon='forbidden'></a></li>
                    <li><a target="_blank" href="<?php echo 'http://'.$music->url;?>" title="Táº£i vá»" style="background: #ffffff;" data-ajax='false' data-icon="arrow-d" onclick="action_music('download', 1, '<?php echo $music->id;?>');"></a></li>
                </ul>
            </div><!-- /navbar -->


            <div id="box_div_action" class="" rel='1' >

            </div>

            <div data-role="collapsible" data-content-theme="c">
               <h3>ThÃ´ng tin bÃ i hÃ¡t</h3>
               <p style="color: #a1a1a1;">
                    <h6>NgÆ°á»i Ä‘Äƒng: <a style="color: #a1a1a1;" href="<?php echo $this->url->get('user').'/'.$this->utils->converToUrl($music->username).'_i'.$music->id_user; ?>"><?php echo isset($music->username)?$music->username:''; ?></a></h6>
                    <br />
                    <div id="box_content">
                    <?php
                        echo isset($music->description)?$music->description:'';
                    ?>
                    <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </p>
            </div>
            <br />
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- quangcao6 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-3431173096387405"
                 data-ad-slot="2631174779"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            <br />
            <div>
                <ul data-role="listview">
                    <li data-role="list-divider" style="padding-top: 15px; padding-bottom: 15px;">BÃ i liÃªn quan</li>
                    <?php
                        foreach($data['add_music'] as $inonstop)
                        {
                        ?>
                        <li><a title="<?php echo strip_tags($inonstop['title']); ?>" data-ajax='false' href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($inonstop['title']).'_i'.$inonstop['id']).'.html'; ?>">
                        <?php echo strip_tags($inonstop['title']); ?>
                        <p>ÄÄƒng bá»Ÿi: <?php echo strip_tags($inonstop['username']); ?> <img style="vertical-align: middle; margin: 0px 5px;" src="/public/img/arrow_right.png" /> <?php echo strip_tags($inonstop['name']); ?></p>
                        <p><img src="/public/img/icon_headphone.gif" style="vertical-align: sub; opacity: 0.7;" />&nbsp;<span><?php echo $inonstop['play']; ?> lÆ°á»£t</span></p>
                        </a></li>
                    <?php }?>
                </ul>
            </div>
        </div>

    </div>
</div>



<script>
    $(".spanaction").click(function(e){
        var rel = $("div#box_div_action").attr('rel');
        if(rel == '1')
        {
            $("div#box_div_action").attr('rel', '2');
            if(e['currentTarget'].id == 'playlist')
            {
                $("div#box_div_action").html('<span><i>Chá»©c nÄƒng chÆ°a hoÃ n thÃ nh!</i></span>');
            }
            
            if(e['currentTarget'].id == 'share')
            {
                var url = document.URL;
                var c = '<br/><div class="inline-block">';
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
            $("div#box_div_action").html('');
            $("div#box_div_action").attr('rel', '1');
        }

    });
</script>