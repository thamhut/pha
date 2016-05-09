<div role="main"  data-theme="a">
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
    <ul data-role="listview" data-inset="true" data-divider-theme="a">
        <li data-role="list-divider" style="padding-top: 15px; padding-bottom: 15px;">NONSTOP</li>
        <?php
        foreach($data['nonstop'] as $inonstop)
        {
        ?>
        <li>
            <a title="<?php echo $inonstop['title']; ?>" data-ajax='false' href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($inonstop['title']).'_i'.$inonstop['id']).'.html'; ?>"><?php echo $inonstop['title']; ?>
                <p>
                    Đăng bởi: <?php echo $inonstop['username']; ?> <img style="vertical-align: middle; margin: 0px 5px;" src="/public/img/arrow_right.png" /> 
                    <?php echo $inonstop['name']; ?>
                </p>
                <p>
                    <img src="/public/img/icon_headphone.gif" style="vertical-align: sub; opacity: 0.7;" />
                    <span><?php echo $inonstop['play']; ?> lượt</span>
                </p>
            </a>
        </li>
        <?php
        }
        ?>
        <li data-icon="action"><a href="<?php echo $this->url->get('category').'/nonstop_i1.html'?>" class="ui-btn ui-btn-inline continue_view" data-icon="action">Xem tiếp...</a></li>
    </ul>
    
        
    <ul data-role="listview" data-inset="true" data-divider-theme="a">
        <li data-role="list-divider" style="padding-top: 15px; padding-bottom: 15px;">REMIX</li>
        <?php
        foreach($data['remix'] as $inonstop)
        {
        ?>
        <li>
            <a title="<?php echo $inonstop['title']; ?>" data-ajax='false' href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($inonstop['title']).'_i'.$inonstop['id']).'.html'; ?>"><?php echo $inonstop['title']; ?>
                <p>
                    Đăng bởi: <?php echo $inonstop['username']; ?> <img style="vertical-align: middle; margin: 0px 5px;" src="/public/img/arrow_right.png" /> 
                    <?php echo $inonstop['name']; ?>
                </p>
                <p>
                    <img src="/public/img/icon_headphone.gif" style="vertical-align: sub; opacity: 0.7;" />
                    <span><?php echo $inonstop['play']; ?> lượt</span>
                </p>
            </a>
        </li>
        <?php
        }
        ?>
        <li  data-icon="action"><a data-ajax='false' href="<?php echo $this->url->get('category').'/remix_i2.html'?>" class="ui-btn ui-btn-inline continue_view" data-icon="action">Xem tiếp...</a></li>
    </ul>
    
    <ul data-role="listview" data-inset="true" data-divider-theme="a">
        <li data-role="list-divider" style="padding-top: 15px; padding-bottom: 15px;">ELECTRONIC HOUSE</li>
        <?php
        foreach($data['electtronic_house'] as $inonstop)
        {
        ?>
        <li>
            <a title="<?php echo $inonstop['title']; ?>" data-ajax='false' href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($inonstop['title']).'_i'.$inonstop['id']).'.html'; ?>"><?php echo $inonstop['title']; ?>
                <p>
                    Đăng bởi: <?php echo $inonstop['username']; ?> <img style="vertical-align: middle; margin: 0px 5px;" src="/public/img/arrow_right.png" /> 
                    <?php echo $inonstop['name']; ?>
                </p>
                <p>
                    <img src="/public/img/icon_headphone.gif" style="vertical-align: sub; opacity: 0.7;" />
                    <span><?php echo $inonstop['play']; ?> lượt</span>
                </p>
            </a>
        </li>
        <?php
        }
        ?>
        <li data-icon="action"><a data-ajax='false' href="<?php echo $this->url->get('category').'/electronic-house_i3.html'?>" class="ui-btn ui-btn-inline continue_view" data-icon="action">Xem tiếp...</a></li>
    </ul>
    
    <ul data-role="listview" data-inset="true" data-divider-theme="a">
        <li data-role="list-divider" style="padding-top: 15px; padding-bottom: 15px;">PRODUCER VN</li>
        <?php
        foreach($data['producer_vn'] as $inonstop)
        {
        ?>
        <li>
            <a title="<?php echo $inonstop['title']; ?>" data-ajax='false' href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($inonstop['title']).'_i'.$inonstop['id']).'.html'; ?>"><?php echo $inonstop['title']; ?>
                <p>
                    Đăng bởi: <?php echo $inonstop['username']; ?> <img style="vertical-align: middle; margin: 0px 5px;" src="/public/img/arrow_right.png" /> 
                    <?php echo $inonstop['name']; ?>
                </p>
                <p>
                    <img src="/public/img/icon_headphone.gif" style="vertical-align: sub; opacity: 0.7;" />
                    <span><?php echo $inonstop['play']; ?> lượt</span>
                </p>
            </a>
        </li>
        <?php
        }
        ?>
        <li data-icon="action"><a data-ajax='false' href="<?php echo $this->url->get('category').'/producer-vn_i4.html'?>" class="ui-btn ui-btn-inline continue_view" data-icon="action">Xem tiếp...</a></li>
    </ul>
    
    <ul data-role="listview" data-inset="true" data-divider-theme="a">
        <li data-role="list-divider" style="padding-top: 15px; padding-bottom: 15px;">DANCE TRANCE</li>
        <?php
        foreach($data['dance_trance'] as $inonstop)
        {
        ?>
        <li>
            <a title="<?php echo $inonstop['title']; ?>" data-ajax='false' href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($inonstop['title']).'_i'.$inonstop['id']).'.html'; ?>"><?php echo $inonstop['title']; ?>
                <p>
                    Đăng bởi: <?php echo $inonstop['username']; ?> <img style="vertical-align: middle; margin: 0px 5px;" src="/public/img/arrow_right.png" /> 
                    <?php echo $inonstop['name']; ?>
                </p>
                <p>
                    <img src="/public/img/icon_headphone.gif" style="vertical-align: sub; opacity: 0.7;" />
                    <span><?php echo $inonstop['play']; ?> lượt</span>
                </p>
            </a>
        </li>
        <?php
        }
        ?>
        <li data-icon="action"><a data-ajax='false' href="<?php echo $this->url->get('category').'/dance-trance_i5.html'?>" class="ui-btn ui-btn-inline continue_view" data-icon="action">Xem tiếp...</a></li>
    </ul>
    
    <ul data-role="listview" data-inset="true" data-divider-theme="a">
        <li data-role="list-divider" style="padding-top: 15px; padding-bottom: 15px;">VIDEO DJ</li>
        <?php 
        foreach($data['video'] as $inonstop)
        {
        ?>
        <li>
            <a title="<?php echo $inonstop['title']; ?>" data-ajax='false' href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($inonstop['title']).'_i'.$inonstop['id']).'.html'; ?>">
                <img style="top: 5px; height:100%;" alt="<?php echo strip_tags($inonstop['title']); ?>"  src="<?php echo ($inonstop['poster']&&$inonstop['poster']!='')?$inonstop['poster']:'/public/img/video_icon.jpg'; ?>"  />
                <?php echo $inonstop['title']; ?>
                <p>
                    Đăng bởi: <?php echo $inonstop['username']; ?> <img style="vertical-align: middle; margin: 0px 5px;" src="/public/img/arrow_right.png" /> 
                    <?php echo $inonstop['name']; ?>
                </p>
                <p>
                    <img src="/public/img/icon_headphone.gif" style="vertical-align: sub; opacity: 0.7;" />
                    <span><?php echo $inonstop['play']; ?> lượt</span>
                </p>
            </a>
        </li>
        <?php
        }
        ?>
        <li data-icon="action"><a data-ajax='false' href="<?php echo $this->url->get('category').'/video-dj_i6.html'?>" class="ui-btn ui-btn-inline continue_view" data-icon="action">Xem tiếp...</a></li>
    </ul>
    
</div>
