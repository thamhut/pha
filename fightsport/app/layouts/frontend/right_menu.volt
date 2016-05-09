<div class="column-right">
    <div class="div_item_right">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- right-menu -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:300px;height:250px"
             data-ad-client="ca-pub-3431173096387405"
             data-ad-slot="9060289978"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <br />
    <br />
    <div class="div_item_right">
        <ul>
            <li class="label">Popular posts by views</li>
            <ul class="ul_item_right">
                <?php
                    foreach($contentview as $item){
                ?>
                 <li>
                     <div style="width: 85px;" class="floatLeft">
                         <a title="<?= ($item['title']) ; ?>" href="<?= $this->url->get('detail/'.$this->utils->converToUrl($item['title']).'_i'.$item['id'].'.html') ; ?>"><img width="84" height="55" src="<?= $item['poster']; ?>" class="" alt="<?= $item['title']; ?>"></a>
                     </div>
                     <div style="width: 205px;" class="floatRight"> 
                        <a title="<?= ($item['title']) ; ?>" href="<?= $this->url->get('detail/'.$this->utils->converToUrl($item['title']).'_i'.$item['id'].'.html') ; ?>"><?= $this->utils->gettitle($item['title']) ; ?></a>
                        <span class="total_view"> - <?= ($item['view'])?$item['view']:0 ; ?>  views</span>
                     </div>
                </li>
                <?php }?>
            </ul>
            
        </ul>
    </div>
    
    <br />
    <div class="div_item_right">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
        <div class="fb-like-box" data-href="https://www.facebook.com/fightsportgrouptham" data-width="300px"  data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
    </div>
    <div style="margin-top: 10px;">
        <script type="text/javascript">
            var var1 = "300";
            var var2 = "250";
            var var3 = "300x250";
            var var4 = "11232";
            var var5 = "c291b01517f3e6797c774c306591cc32";
        </script><script type="text/javascript" src="//cdn.adshexa.com/show_ads.php"></script>
    </div>
</div>