<div data-role="header">
        <header data-theme="a" id="homeheader" data-role="header" style="" role="banner" class="ui-header ui-bar-a">
            <div style="top:0px;">
            <div style="float: left; overflow: hidden;margin:10px 0 0 10px;">
                <img src="http://chotam.info//skin/default/img/icon_header.png" />
            </div>
            <div style="float: right; overflow: hidden;">
                <div style="width: 62px; height: 45px; vertical-align: middle; display: table-cell;">
                    <span><a href="#popupMenu2" data-rel="popup" data-transition="slide"><img src="http://chotam.info/skin/default/img/icon_search.png" /></a><a href="#popupMenu1" data-rel="popup" data-transition="slidedown"><img  src="http://chotam.info/skin/default/img/menu_icon.png" /></a></span>
                </div>
            </div>
            <div style="clear: both;"></div>
            </div>
        </header>
    </div>
    <div data-role="popup" id="popupMenu1" class="ui-collapsible-set" data-role="collapsible-set">
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3>
                <?php echo (isset($user['id']) ? 'Thông tin cá nhân' : 'Đăng nhập'); ?>
            </h3>
            <ul data-role="listview">
                <?php if (isset($user['id'])) { ?>
                    
                    <li><a data-ajax='false' href="<?php echo $this->url->getStatic(); ?>user/update" >Cập nhật tài khoản</a></li>
                    <li><a data-ajax='false' href="<?php echo $this->url->getStatic(); ?>user/changepass">Thay đổi mật khẩu</a></li>
                    <li><a data-ajax='false' href="<?php echo $this->url->getStatic(); ?>news/mynews">Xem tin đăng</a></li>
                    
                <?php } else { ?>
                    <li data-mini="true"><a data-mini="true" data-ajax='false' href="<?php echo $this->url->getStatic(); ?>user/login">Đăng nhập</a></li>
                    <li data-mini="true"><a data-mini="true" data-ajax='false' href="<?php echo $this->url->getStatic(); ?>user/register">Đăng ký</a></li>
                    
                <?php } ?>
			</ul>
        </div>
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3>Danh mục tin</h3>
            <ul data-role="listview">
                <li><a data-ajax='false' href="<?php echo $this->url->getStatic('category/viec-lam_i1'); ?>">Việc làm</a></li>
                <li><a data-ajax='false' href="<?php echo $this->url->getStatic('category/bat-dong-san_i13'); ?>">Bất động sản</a></li>
                <li><a data-ajax='false' href="<?php echo $this->url->getStatic('category/dien-thoai_i18'); ?>">Điện thoại</a></li>
                <li><a data-ajax='false' href="<?php echo $this->url->getStatic('category/mua-ban_i26'); ?>">Mua bán</a></li>
                <li><a data-ajax='false' href="<?php echo $this->url->getStatic('category/dien-tu-gia-dung_i37'); ?>">Điện tử gia dụng</a></li>
                <li><a data-ajax='false' href="<?php echo $this->url->getStatic('category/may-tinh_i45'); ?>">Máy tính</a></li>
                <li><a data-ajax='false' href="<?php echo $this->url->getStatic('category/phuong-tien-di-lai_i52'); ?>">Phương tiện đi lại</a></li>
                <li><a data-ajax='false' href="<?php echo $this->url->getStatic('category/thoi-trang-my-pham_i59'); ?>">Thời trang - mỹ phẩm</a></li>
                <li><a data-ajax='false' href="<?php echo $this->url->getStatic('category/me-va-be_i65'); ?>">Mẹ và bé</a></li>
                <li><a data-ajax='false' href="<?php echo $this->url->getStatic('category/sim-the_i72'); ?>">Sim thẻ</a></li>
                <li><a data-ajax='false' href="<?php echo $this->url->getStatic('category/dich-vu_i80'); ?>">Dịch vụ</a></li>
			</ul>
        </div>
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3><?php 
        if(isset($user['city'])){
            $city = $user['city'];
        echo $city['name_city'];}
        else echo "Nơi đăng"; ?></h3>
            <ul data-role="listview" data-filter='true'>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=0'); ?>">Toàn quốc</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=30'); ?>">Hà Nội</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=11'); ?>">Cao Bằng</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=12'); ?>">Lạng Sơn</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=13'); ?>">Hà Bắc</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=14'); ?>">Quảng Ninh</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=16'); ?>">Hải Phòng</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=17'); ?>">Thái Bình</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=18'); ?>">Nam Định</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=19'); ?>">Phú Thọ</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=20'); ?>">Thái Nguyên</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=21'); ?>">Yên Bái</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=22'); ?>">Tuyên Quang</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=23'); ?>">Hà Giang</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=24'); ?>">Lào Cai</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=25'); ?>">Lai Châu</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=26'); ?>">Sơn La</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=27'); ?>">Điện Biên</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=28'); ?>">Hòa Binh</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=33'); ?>">Hà Tây</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=34'); ?>">Hải Dương</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=35'); ?>">Ninh Bình</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=97'); ?>">Bắc Cạn</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=98'); ?>">Bắc Giang</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=99'); ?>">Bắc Ninh</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=43'); ?>">Đà Nẵng</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=47'); ?>">Đắc Lắc</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=49'); ?>">Lâm Đồng</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=73'); ?>">Quảng Bình</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=74'); ?>">Quảng Trị</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=75'); ?>">Huế</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=76'); ?>">Quảng Ngãi</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=77'); ?>">Bình Định</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=78'); ?>">Phú Yên</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=79'); ?>">Khánh Hòa</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=81'); ?>">Gia Lai</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=82'); ?>">Kon Tum</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=83'); ?>">Sóc Trăng</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=88'); ?>">Vĩnh Phúc</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=89'); ?>">Hưng Yên</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=92'); ?>">Quảng Nam</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=36'); ?>">Thanh Hóa</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=37'); ?>">Nghệ An</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=38'); ?>">Hà Tĩnh</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=55'); ?>">TP HCM</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=60'); ?>">Đồng Nai</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=61'); ?>">Bình Dương</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=62'); ?>">Long An</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=63'); ?>">Tiền Giang</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=64'); ?>">Vĩnh Long</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=65'); ?>">Cần Thơ</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=66'); ?>">Đồng Tháp</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=67'); ?>">An Giang</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=68'); ?>">Kiên Giang</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=69'); ?>">Cà Mau</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=70'); ?>">Tây Ninh</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=71'); ?>">Bến Tre</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=72'); ?>">Vũng Tàu</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=84'); ?>">Trà Vinh</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=85'); ?>">Ninh Thuận</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=86'); ?>">Bình Thuận</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=93'); ?>">Bình Phước</a></li>
                <li><a  data-ajax='false'  href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->utils->getCurrentPageURL()).'&city=94'); ?>">Bạc Liêu</a></li>
                
			</ul>
        </div>
    </div>
    
    <div style="float: left;" data-role="popup" id="popupMenu2" class="ui-collapsible-set" data-role="collapsible-set">
        <div style="float: left;width: 150px;">
            <form action="http://chotam.info/search" id="cse-search-box">
                <input width="150" data-mini="true" name="q" id="search-9" value="" type="search">
            </form>
        </div>
            
        <div style="clear: both;"></div>
    </div>
    
    <style>
    #popupMenu1 h3 a{
    }
    #popupMenu1 ul li a{
    }
    </style>