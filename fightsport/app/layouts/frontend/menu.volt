<div style="padding-bottom: 21px;">
    <div style="padding-bottom: 15px;">
        <div class="logo inline-block floatLeft">
            <a href="{{ static_url('') }}">
                <img src="{{ static_url('public/img/logo.png') }}" alt="{{ lang._('alt_logo') }}">
            </a> 
        </div>
        <div class="inline-block floatRight">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- topsightsport -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:728px;height:90px"
                 data-ad-client="ca-pub-3431173096387405"
                 data-ad-slot="3153357173"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        <div class="clear"></div>
    </div>
    <div class="menucate">
        <ul>
            <?php 
                foreach($category as $item)
                {
                    if($item['id'] == 0){
            ?>
                <li id="bbb" class="hover_menucate">
                    <a style="<?php echo isset($data['id_parent'])&&$item['id_level'] == $data['id_parent']?'font-weight:bold':'';  ?>" href="{{ this.url.get('category/' ~ this.utils.converToUrl(item['name']) ~ '_i' ~ item['id_level']) }}"><?= $item['name'] ?></a>
                    <ul class="menu_level">
                        <?php 
                            foreach($category as $itemlevel)
                            {
                                if($itemlevel['id'] == $item['id_level']){
                        ?>
                        <li><a href="{{ this.url.get('category/' ~ this.utils.converToUrl(itemlevel['name']) ~ '_i' ~ itemlevel['id_level']) }}"><?= $itemlevel['name'] ?></a></li>
                        <?php }}?>
                    </ul>
                </li>
            <?php }}?>
            
        </ul>
    </div>
</div>

<script>
     $('.hover_menucate').hover(
        function(e){
            $(this).children('ul').show();
        },
        function(e){
            $(this).children('ul').hide();
        }
     );
</script>