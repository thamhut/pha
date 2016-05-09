<div role="main" class="ui-content" data-theme="b">
      <a href="#popupMenu" data-rel="popup" data-transition="slidedown" data-mini="true" style="padding: 5px; float: right; margin: 0;" class="ui-btn ui-btn-inline">Bộ lọc</a>
      <a href="#danhmucphu" data-rel="popup" data-transition="slidedown" data-mini="true" style="padding: 5px; float: right; margin: 0;" class="ui-btn ui-btn-inline">Danh mục phụ</a>
      <div style="clear: both;"></div>
    <h3><?php
    $name1 = $id_cate = $name2 = '';
    if($data['category_data']['id'] == 0)
    {
         $name1 =  $data['category_data']['name'];
         $id_cate = $data['category_data']['id_level'];
    }
    else
    {
         foreach($category_data as $item)
        {
            if($item->id_level == $data['category_data']['id'])
            {
                $name1 = $item->name;
                $id_cate = $item->id_level;
            }
        }
    }
    if(isset($data['category_data']['name']) && $data['category_data']['name'] != '' && $data['category_data']['id'] != '0')
    {
         $name2 = $data['category_data']['name'];
    }
     echo $name2?$name1.' - '.$name2:'Tin đăng mới'; ?></h3>
    <div hidden=""><input type="text" hidden="" id="idcate" value="<?php echo $id_cate; ?>" /></div>
    <ul data-role="listview" data-filter="true" itemscope itemtype="http://schema.org/BreadcrumbList">
        <?php 
        foreach($data['lst_item_content'] as $itemContent)
        {
        ?>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a itemprop="url" data-ajax="false" title="<?php echo $this->utils->enhtml($itemContent['title']); ?>" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($itemContent['title']).'_i'.$itemContent['id']).'.html'; ?>">
            <img itemprop="image" style="margin-top: 15px;" alt="<?php echo $this->utils->enhtml($itemContent['title']); ?>" src="<?php if(($this->utils->explode_first($itemContent['img'], ',')) && $this->utils->explode_first($itemContent['img'], ',')!='')echo $this->utils->explode_first($itemContent['img'], ','); else echo $this->url->get().'public/img/noimg.png';?>" width="90" height="90" />
            <h3 itemprop="name"><?php echo $this->utils->enhtml($itemContent['title']); ?></h3>
            <h6></h6>
             <h6><s style='vertical-align: middle;background: url("public/img/mdate.png") no-repeat scroll 0 0 transparent;display: inline-block;height: 0;margin-right: 3px;overflow: hidden;padding-top: 13px;width: 16px;'></s><?php
                $subdate = $this->utils->subdate(date("Y-m-d H:i:s"), $itemContent['date']);
                if($subdate['d'] != 0)
                {
                    echo $subdate['d'].' '.$lang->_("prev_d").'.';
                }
                else if($subdate['h'] != 0)
                {
                    echo $subdate['h'].' '.$lang->_("prev_h").'.';
                }
                else if($subdate['i'] != 0)
                {
                    echo $subdate['i'].' '.$lang->_("prev_i").'.';
                }
                else
                {
                    echo date('d-m-Y', strtotime($itemContent['date']));
                }
             ?></h6>
        </a></li>
        
        <?php }?>
    </ul>
</div>

<div data-role="popup" id="popupMenu" class="ui-collapsible-set" data-role="collapsible-set">
    <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
        <h3>Cung cầu</h3>
        <ul data-role="listview">
            <li><a data-ajax='false' href="" onclick="mfillter('cung_cau',0);">Toàn bộ</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('cung_cau',1);">Cung</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('cung_cau',2);">Cầu</a></li>
		</ul>
        <div hidden=""><select id="cung_cau" hidden=""><option <?php echo $data['filter'][0]==0?'selected':''; ?> value="0">Cung cầu</option><option <?php echo $data['filter'][0]==1?'selected':''; ?> value="1">Cung</option><option <?php echo $data['filter'][0]==2?'selected':''; ?> value="2">Cầu</option></select></div>
    </div>
    <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
        <h3>Người đăng</h3>
        <ul data-role="listview">
            <li><a data-ajax='false' href="" onclick="mfillter('nguoi_dang',0);">Loại người đăng</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('nguoi_dang',1);">Cá nhân</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('nguoi_dang',2);">Doanh nghiệp</a></li>
		</ul>
        <div hidden=""><select id="nguoi_dang" hidden=""><option <?php echo $data['filter'][1]==0?'selected':''; ?> value="0">Loại người đăng</option><option <?php echo $data['filter'][1]==1?'selected':''; ?> value="1">Cá nhân</option><option <?php echo $data['filter'][1]==2?'selected':''; ?> value="2">Doanh nghiệp</option></select></div>
    </div>
    
    <?php if($id_cate > 0 && $id_cate <= 12){ ?>
    <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
        <h3>Mức lương</h3>
        <ul data-role="listview">
            <li><a data-ajax='false' href="" onclick="mfillter('muc_luong',0);">Toàn bộ</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('muc_luong',1);">Dưới 3 triệu</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('muc_luong',2);">3 đến 5 triệu</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('muc_luong',3);">5 đến 7 triệu</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('muc_luong',4);">7 đến 10 triệu</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('muc_luong',5);">10 đến 15 triệu</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('muc_luong',6);">15 đến 20 triệu</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('muc_luong',7);">20 đến 30 triệu</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('muc_luong',8);">Trên 30 triệu</a></li>
		</ul>
        <div hidden=""><select id="muc_luong" hidden="">
            <option <?php echo $data['filter'][2]==0?'selected':''; ?> value="0">Mức lương</option>
            <option <?php echo $data['filter'][2]==1?'selected':''; ?> value="1">Dưới 3 triệu</option>
            <option <?php echo $data['filter'][2]==2?'selected':''; ?> value="2">3 đến 5 triệu</option>
            <option <?php echo $data['filter'][2]==3?'selected':''; ?> value="3">5 đến 7 triệu</option>
            <option <?php echo $data['filter'][2]==4?'selected':''; ?> value="4">7 đến 10 triệu</option>
            <option <?php echo $data['filter'][2]==5?'selected':''; ?> value="5">10 đến 15 triệu</option>
            <option <?php echo $data['filter'][2]==6?'selected':''; ?>value="6">15 đến 20 triệu</option>
            <option <?php echo $data['filter'][2]==7?'selected':''; ?>value="7">20 đến 30 triệu</option>
            <option <?php echo $data['filter'][2]==8?'selected':''; ?>value="8">Trên 30 triệu</option>
        </select></div>
    </div>
    <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
        <h3>Kinh nghiệm</h3>
            <ul data-role="listview">
                <li><a data-ajax='false' href="" onclick="mfillter('kinh_nghiem',0);">Toàn bộ</a></li>
                <li><a data-ajax='false' href="" onclick="mfillter('kinh_nghiem',1);">Dưới 1 năm</a></li>
                <li><a data-ajax='false' href="" onclick="mfillter('kinh_nghiem',2);">1 năm</a></li>
                <li><a data-ajax='false' href="" onclick="mfillter('kinh_nghiem',3);">2 năm</a></li>
                <li><a data-ajax='false' href="" onclick="mfillter('kinh_nghiem',4);">3 năm</a></li>
                <li><a data-ajax='false' href="" onclick="mfillter('kinh_nghiem',5);">4 năm</a></li>
                <li><a data-ajax='false' href="" onclick="mfillter('kinh_nghiem',6);">5 năm</a></li>
                <li><a data-ajax='false' href="" onclick="mfillter('kinh_nghiem',7);">Trên 5 năm</a></li>
    		</ul>
        <div hidden=""><select id="kinh_nghiem" hidden="">
            <option <?php echo $data['filter'][3]==0?'selected':''; ?> value="0">Kinh nghiệm</option>
            <option <?php echo $data['filter'][3]==1?'selected':''; ?> value="1">Dưới 1 năm</option>
            <option <?php echo $data['filter'][3]==2?'selected':''; ?> value="2">1 năm</option>
            <option <?php echo $data['filter'][3]==3?'selected':''; ?> value="3">2 năm</option>
            <option <?php echo $data['filter'][3]==4?'selected':''; ?> value="4">3 năm</option>
            <option <?php echo $data['filter'][3]==5?'selected':''; ?> value="5">4 năm</option>
            <option <?php echo $data['filter'][3]==6?'selected':''; ?> value="6">5 năm</option>
            <option <?php echo $data['filter'][3]==7?'selected':''; ?> value="7">Trên 5 năm</option>
        </select></div>
    </div>
    <?php }?>
    
    <?php if($id_cate >= 18 && $id_cate <= 65){ ?>
    
    <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
        <h3>Tình trạng</h3>
        <ul data-role="listview">
            <li><a data-ajax='false' href="" onclick="mfillter('tinh_trang',0);">Toàn bộ</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('tinh_trang',1);">Cũ</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('tinh_trang',2);">Mới</a></li>
		</ul>
        <div hidden=""><select id="tinh_trang" hidden=""><option <?php echo $data['filter'][4]==0?'selected':''; ?> value="0">Tình trạng</option><option <?php echo $data['filter'][4]==1?'selected':''; ?> value="1">Cũ</option><option <?php echo $data['filter'][4]==2?'selected':''; ?> value="2">Mới</option></select></div>
    </div>
    <?php }?>
    
    <?php if($id_cate >= 13 && $id_cate <= 17){ ?>
    <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
        <h3>Diện tích</h3>
        <ul data-role="listview">
            <li><a data-ajax='false' href="" onclick="mfillter('dien_tich',0);">Toàn bộ</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('dien_tich',1);">Dưới 50m2</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('dien_tich',2);">50 đến 70m2</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('dien_tich',3);">70 đến 100m2</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('dien_tich',4);">100 đến 150m2</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('dien_tich',5);">150 đến 200m2</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('dien_tich',6);">200 đến 300m2</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('dien_tich',7);">300 đến 500m2</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('dien_tich',8);">500 đến 1500m2</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('dien_tich',9);">1500 đến 2000m2</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('dien_tich',10);">Trên 2000m2</a></li>
		</ul>
        <div hidden=""><select id="dien_tich" hidden="">
            <option <?php echo $data['filter'][5]==0?'selected':''; ?> value="0">Diện tích</option>
            <option <?php echo $data['filter'][5]==1?'selected':''; ?> value="1">Dưới 50m2</option>
            <option <?php echo $data['filter'][5]==2?'selected':''; ?> value="2">50 đến 70m2</option>
            <option <?php echo $data['filter'][5]==3?'selected':''; ?> value="3">70 đến 100m2</option>
            <option <?php echo $data['filter'][5]==4?'selected':''; ?> value="4">100 đến 150m2</option>
            <option <?php echo $data['filter'][5]==5?'selected':''; ?> value="5">150 đến 200m2</option>
            <option <?php echo $data['filter'][5]==6?'selected':''; ?> value="6">200 đến 300m2</option>
            <option <?php echo $data['filter'][5]==7?'selected':''; ?> value="7">300 đến 500m2</option>
            <option <?php echo $data['filter'][5]==8?'selected':''; ?> value="8">500 đến 1500m2</option>
            <option <?php echo $data['filter'][5]==9?'selected':''; ?> value="9">1500 đến 2000m2</option>
            <option <?php echo $data['filter'][5]==10?'selected':''; ?> value="10">Trên 2000m2</option>
        </select></div>
    </div>
    <?php }?>
    
    <?php if($id_cate >= 18 && $id_cate <= 25){ ?>
    <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
        <h3>Kiểu dáng</h3>
        <ul data-role="listview">
            <li><a data-ajax='false' href="" onclick="mfillter('kieu_dang',0);">Toàn bộ</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('kieu_dang',1);">Kiểu xoay</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('kieu_dang',2);">Kiểu đứng</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('kieu_dang',3);">Nắp gập</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('kieu_dang',4);">Cảm ứng</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('kieu_dang',5);">Nắp trượt</a></li>
		</ul>
        <div hidden=""><select id="kieu_dang" onchange="fillter();">
            <option <?php echo $data['filter'][8]==0?'selected':''; ?> value="0">Kiểu dáng</option>
            <option <?php echo $data['filter'][8]==1?'selected':''; ?> value="1">Kiểu xoay</option>
            <option <?php echo $data['filter'][8]==2?'selected':''; ?> value="2">Kiểu đứng</option>
            <option <?php echo $data['filter'][8]==3?'selected':''; ?> value="3">Nắp gập</option>
            <option <?php echo $data['filter'][8]==4?'selected':''; ?> value="4">Cảm ứng</option>
            <option <?php echo $data['filter'][8]==5?'selected':''; ?> value="5">Nắp trượt</option>
        </select></div>
    </div>
    <?php }?>
    
    <?php if($id_cate >= 52 && $id_cate <= 58){ ?>
    <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
        <h3>Xuất xứ</h3>
        <ul data-role="listview">
            <li><a data-ajax='false' href="" onclick="mfillter('xuat_xu',0);">Toàn bộ</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('xuat_xu',1);">Lắp ráp trong nước</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('xuat_xu',2);">Nhật Bản</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('xuat_xu',3);">Hàn Quốc</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('xuat_xu',4);">Trung Quốc</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('xuat_xu',5);">Mỹ</a></li>
		</ul>
        <div hidden=""><select id="xuat_xu" hidden="">
            <option <?php echo $data['filter'][9]==0?'selected':''; ?> value="0">Xuất xứ</option>
            <option <?php echo $data['filter'][9]==1?'selected':''; ?> value="1">Lắp ráp trong nước</option>
            <option <?php echo $data['filter'][9]==2?'selected':''; ?> value="2">Nhật Bản</option>
            <option <?php echo $data['filter'][9]==3?'selected':''; ?> value="3">Hàn Quốc</option>
            <option <?php echo $data['filter'][9]==4?'selected':''; ?> value="4">Trung Quốc</option>
            <option <?php echo $data['filter'][9]==5?'selected':''; ?> value="5">Mỹ</option>
        </select></div>
    </div>
    <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
        <h3>Hãng sản xuất</h3>
        <ul data-role="listview">
            <li><a data-ajax='false' href="" onclick="mfillter('hang_san_xuat',0);">Toàn bộ</a></li>
            <?php if($id_cate == 52 || $id_cate == 55){ ?>
            <li><a data-ajax='false' href="" onclick="mfillter('hang_san_xuat',2);">Yamaha</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('hang_san_xuat',3);">Piaggio</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('hang_san_xuat',4);">SYM</a></li>
            <?php }?>
            <?php if($id_cate == 52 || $id_cate == 53 || $id_cate == 54){ ?>
            <li><a data-ajax='false' href="" onclick="mfillter('hang_san_xuat',5);">Nissan</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('hang_san_xuat',6);">Toyota</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('hang_san_xuat',7);">Mercedes-Benz</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('hang_san_xuat',8);">Mazda</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('hang_san_xuat',9);">KIA</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('hang_san_xuat',10);">Isuzu</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('hang_san_xuat',11);">Hyundai</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('hang_san_xuat',12);">GM Daewoo</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('hang_san_xuat',13);">Ford</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('hang_san_xuat',14);">FIAT</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('hang_san_xuat',15);">BMW</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('hang_san_xuat',16);">Honda</a></li>
            <li><a data-ajax='false' href="" onclick="mfillter('hang_san_xuat',17);">Suzuki</a></li>
            <?php }?>
            
		</ul>
        <div hidden=""><select id="hang_san_xuat" hidden="">
            <option <?php echo $data['filter'][10]==0?'selected':''; ?> value="0">Hãng sản xuất</option>
            <?php if($id_cate == 52 || $id_cate == 55){ ?>
                <option <?php echo $data['filter'][10]==2?'selected':''; ?> value="2">Yamaha</option>
                <option <?php echo $data['filter'][10]==3?'selected':''; ?> value="3">Piaggio</option>
                <option <?php echo $data['filter'][10]==4?'selected':''; ?> value="4">SYM</option>
            <?php }?>
            <?php if($id_cate == 52 || $id_cate == 53 || $id_cate == 54){ ?>
                <option <?php echo $data['filter'][10]==5?'selected':''; ?> value="5">Nissan</option>
                <option <?php echo $data['filter'][10]==6?'selected':''; ?> value="6">Toyota</option>
                <option <?php echo $data['filter'][10]==7?'selected':''; ?> value="7">Mercedes-Benz</option>
                <option <?php echo $data['filter'][10]==8?'selected':''; ?> value="8">Mazda</option>
                <option <?php echo $data['filter'][10]==9?'selected':''; ?> value="9">KIA</option>
                <option <?php echo $data['filter'][10]==10?'selected':''; ?> value="10">Isuzu</option>
                <option <?php echo $data['filter'][10]==11?'selected':''; ?> value="11">Hyundai</option>
                <option <?php echo $data['filter'][10]==12?'selected':''; ?> value="12">GM Daewoo</option>
                <option <?php echo $data['filter'][10]==13?'selected':''; ?> value="13">Ford</option>
                <option <?php echo $data['filter'][10]==14?'selected':''; ?> value="14">FIAT</option>
                <option <?php echo $data['filter'][10]==15?'selected':''; ?> value="15">BMW</option>
                <option <?php echo $data['filter'][10]==16?'selected':''; ?> value="16">Honda</option>
                <option <?php echo $data['filter'][10]==17?'selected':''; ?>value="17">Suzuki</option>
            <?php }?>
        </select></div>
    </div>
    <?php }?>
    
    <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
        <h3>Giá tiền</h3>
        <div id="money_search" data-role="navbar">
            <input id="gia_tu" <?php echo $data['filter'][6]!=0?'value="'.$data['filter'][6].'"':''; ?> name="gia_tu" data-clear-btn="true" data-mini="true" type="text" placeholder="Tối thiểu" /> - <input name="gia_den" <?php echo $data['filter'][7]!=0?'value="'.$data['filter'][7].'"':''; ?> id="gia_den" data-clear-btn="true" data-mini="true" type="text" placeholder="Tối đa" />
            <a onclick="fillter();" style="padding: 5px; margin: 5px 0 0 0;" href="" data-mini="true" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-search">Tìm</a>
        </div>
    </div>
</div>

<div data-role="popup" id="danhmucphu" class="ui-collapsible-set" data-role="collapsible-set">
    <ul data-role="listview">
        <li><a data-ajax='false' href="<?php echo $this->url->get('category').'/'.$this->utils->converToUrl($name1).'_i'.$id_cate; ?>">Toàn bộ</a></li>
        <?php
        foreach($category_data as $item)
        {
            if($item['id'] == $id_cate)
            {
                echo '<li><a data-ajax="false" href="'.$this->url->get('category').'/'.$this->utils->converToUrl($name1.'-'.$item['name']).'_i'.$item['id_level'].'"  class="';
                echo '">'.$item['name'].'</a></li>';
            }
        }
        ?>
        
	</ul>
</div>

{{ partial('pagination') }} 
<style>
table.martop10 td.page a{
    font-weight: normal;
}
.curr{
    font-weight: bold!important;
}
#money_search div{
    margin: 0;
}
#menu_action div{
    box-shadow: none;
    margin-top: 0;
    margin-bottom: 0;
}

#menu_action .ui-select div, #menu_action button
{
    padding-top:4px;
    padding-bottom:4px;
    padding-left: 4px;
}

#menu_action span, #menu_action button{
    
}
h3 a{
    
}
ul li a{
    
}
h6{
    
    font-weight: normal!important;
}

</style>

<script>
    function mfillter(type,value)
    {
        $("#"+type).val(value);
        fillter_m();
    }
    $("table.martop10 td.page a").addClass('ui-btn');
    $("table.martop10 td.page a").addClass('ui-btn-inline');
    
</script>