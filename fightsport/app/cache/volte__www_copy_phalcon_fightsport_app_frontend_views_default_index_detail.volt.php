<div class="mains">
    <div class="columns">
        <div class="column-left">
            <div class="title">
                <br />
                <h1><?=$data['content']['title']?></h1>
            </div>
            <div class="info_post_detail">
                Posted on <?= date("F j, Y, g:i a", strtotime($data['content']['update_date'])) ?> by <u>Admin</u>
            </div>
            <div class="label_share">
                <div style="float: left;">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?=$this->url->get('detail/'.$this->utils->converToUrl($data['content']['title']).'_i'.$data['content']['id'].'.html')?>">Tweet</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                </div>
                
                <div style="float: left; margin-left: 5px;">
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                </div>
                
                <div style="float: left; margin-left: 5px;">
                    <!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
                    <script src="https://apis.google.com/js/platform.js" async defer></script>
                    
                    <!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->
                    <div class="g-plusone" data-size="medium" data-href="<?=$this->url->get('detail/'.$this->utils->converToUrl($data['content']['title']).'_i'.$data['content']['id'].'.html')?>" ></div>
                </div>
                <div class="clear"></div>
                
            </div>
            <div class="content">
                <br /><br />
                <article id="post-1579" class="post-1579 post type-post status-publish format-standard hentry category-baseball tag-carlos-marmol tag-chicago-cubs">
                    <div class="entry-content">
                		<?=$data['content']['content']?>
            	    </div><!-- .entry-content -->
             	</article>
                <div>
                <b>TAGS:</b>
                    <ul style="display: inline;">
                    <?php 
                        foreach($data['lstTag'] as $item)
                        {
                    ?>
                         <li style="display: inline-block; padding: 5px; background-color: #eee; border: 1px solid #ddd; margin: 0 5px;"><a href="<?=$this->url->get('tag/index/'.$this->utils->converToUrl(trim($item)).'.html')?>"><?= trim($item); ?></a></li>
                    <?php
                        }
                    ?>
                    </ul>
                </div>
                <br />
                <div>
                    <i style='font-size: 28px; color: #333; font-family: "Sentinel SSm A","Sentinel SSm B",Georgia,serif; font-weight: bold;'>More from FightSport</i>
                    <ul>
                    <?php
                    foreach($data['suggest'] as $item){
                    ?>
                        <li><a href="<?=$this->url->get('detail/'.$this->utils->converToUrl($item['title']).'_i'.$item['id'].'.html')?>" style='font-family: "Gotham SSm A","Gotham SSm B",Arial,sans-serif; color:#444; font-size: 18px;'><?= $item['title'] ?></a></li>
                    <?php }?>
                    </ul>
                </div>
            </div>
        </div>
        <?php echo $this->partial('right_menu'); ?>
       <div class="clear"></div>
    </div>
</div>