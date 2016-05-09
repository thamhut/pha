<div class="div_lst_cate">
    <ul>
        <li class="li_title">{{ lang._('category') }}</li>
        <?php
        $lstCate = $category_data;
        foreach($lstCate as $icate)
        {
            if($icate['id']==0){
        ?>
        <li onmousemove="mymousemove(this);" onmouseout="mymouseout(this);" id="menu_right_li_<?php echo $icate['id_level']; ?>">
            <a href="<?php echo $this->url->get('category/'.$this->utils->getStringCut($icate['name']).'_i'.$icate['id_level'])?>">
                <s class="arrow_left_gray"></s>
                <?php echo $icate['name']; ?>
            </a>
        </li>
        <?php }}?>
    </ul>
</div>

<div style="max-width: 250px; overflow: hidden;" class="div_lst_cate">
    <script type="text/javascript">
    var var1 = "300";
    var var2 = "250";
    var var3 = "300x250";
    var var4 = "11232";
    var var5 = "c291b01517f3e6797c774c306591cc32";
    </script><script type="text/javascript" src="//cdn.adshexa.com/show_ads.php"></script>
</div>
    