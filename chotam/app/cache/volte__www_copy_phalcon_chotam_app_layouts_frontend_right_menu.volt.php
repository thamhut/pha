<div class="div_lst_cate">
    <ul>
        <li class="li_title"><?php echo $lang->_('category'); ?></li>
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
<div class="div_lst_cate">
    <ul>
        <li class="li_title">Thông báo</li>
        <li><a href="<?php echo $this->url->get('thongbao/napvip'); ?>" style="color:blue;">Nạp điểm để sử dụng chức năng hệ thống</a></li>
    </ul>
</div>

<div style="max-width: 260px; overflow: hidden; text-align: center;" class="div_lst_cate">
    <a href="http://chotam.info/detail/kiem-tien-bang-rut-gon-link-voi-adfly-phan-1_i276574.html" title="Kiếm tiền bằng rút gọn link với adf.ly (Phần 1)">
        <h1 style="font-size: 12px; margin: 5px 0px 0px; padding: 5px;">Kiếm tiền bằng rút gọn link với adf.ly (Phần 1)</h1>
        <img width="250" height="250" src="http://chotam.info/uploads/images/2015/09/36b6d4280a531954b87eeefefdfc867d.jpeg" style="vertical-align: top; max-height: 250px; max-width: 250px;" alt="Chung cư Đông Đô 106 hoàng quốc việt – sự lựa chọn tinh tế, giá chỉ 22tr/m2 - Giá : 22,000,000 .">
        
    </a>
</div>
    