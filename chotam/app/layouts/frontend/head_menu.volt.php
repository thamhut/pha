<div id="header">
	<div class="header">
		<a href="">
            <img alt="<?php echo $lang->_('alt_logo') ?>" src='<?php echo $this->url->getStatic('public/img/icon_header.png'); ?>' class="logo"/>
        </a>
		<div id="div_form_find">
            <form action="http://chotam.info/search" id="cse-search-box">
              <div>
                <input type="hidden" name="cx" value="partner-pub-3431173096387405:5439976371" />
                <input type="hidden" name="cof" value="FORID:10" />
                <input type="hidden" name="ie" value="UTF-8" />
                <input class="input_text_search" type="text" name="q" size="55" />
                <input style="border: 1px solid #7e9db9;padding: 1px;" type="submit" name="sa" value="Search" />
              </div>
            </form>
            
            <script type="text/javascript" src="http://www.google.com.vn/coop/cse/brand?form=cse-search-box&amp;lang=vi"></script>
            
        </div>
        <span><?php echo $lang->_('local'); ?></span>
        <div class="choise_city">
            <?php if (isset($user['city']) && $user['city'] != '') { ?>
                <?php echo $user['city']['name_city']; ?>
            <?php } else { ?>
                <?php echo $lang->_('nationwide'); ?>
            <?php } ?> 
        </div>
        <div id="button_dangtin"><a href="/news"><?php echo $lang->_('news_post'); ?></a></div>
        <div id="show_city" class="show_city leftmenu1">
            <div style="font-size: 13px;padding: 15px;text-align: center;"><a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=0'); ?>">---<?php echo $lang->_('nationwide'); ?>---</a></div>
            <ul>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=30'); ?>"><li>Hà Nội</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=11'); ?>"><li>Cao Bằng</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=12'); ?>"><li>Lạng Sơn</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=13'); ?>"><li>Hà Bắc</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=14'); ?>"><li>Quảng Ninh</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=16'); ?>"><li>Hải Phòng</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=17'); ?>"><li>Thái Bình</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=18'); ?>"><li>Nam Định</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=19'); ?>"><li>Phú Thọ</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=20'); ?>"><li>Thái Nguyên</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=21'); ?>"><li>Yên Bái</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=22'); ?>"><li>Tuyên Quang</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=23'); ?>"><li>Hà Giang</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=24'); ?>"><li>Lào Cai</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=25'); ?>"><li>Lai Châu</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=26'); ?>"><li>Sơn La</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=27'); ?>"><li>Điện Biên</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=28'); ?>"><li>Hòa Binh</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=33'); ?>"><li>Hà Tây</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=34'); ?>"><li>Hải Dương</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=35'); ?>"><li>Ninh Bình</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=97'); ?>"><li>Bắc Cạn</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=98'); ?>"><li>Bắc Giang</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=99'); ?>"><li>Bắc Ninh</li></a>
                
            </ul>
            <ul>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=43'); ?>"><li>Đà Nẵng</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=47'); ?>"><li>Đắc Lắc</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=49'); ?>"><li>Lâm Đồng</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=73'); ?>"><li>Quảng Bình</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=74'); ?>"><li>Quảng Trị</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=75'); ?>"><li>Huế</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=76'); ?>"><li>Quảng Ngãi</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=77'); ?>"><li>Bình Định</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=78'); ?>"><li>Phú Yên</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=79'); ?>"><li>Khánh Hòa</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=81'); ?>"><li>Gia Lai</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=82'); ?>"><li>Kon Tum</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=83'); ?>"><li>Sóc Trăng</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=88'); ?>"><li>Vĩnh Phúc</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=89'); ?>"><li>Hưng Yên</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=92'); ?>"><li>Quảng Nam</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=36'); ?>"><li>Thanh Hóa</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=37'); ?>"><li>Nghệ An</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=38'); ?>"><li>Hà Tĩnh</li></a>
            </ul>
            <ul>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=55'); ?>"><li>TP HCM</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=60'); ?>"><li>Đồng Nai</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=61'); ?>"><li>Bình Dương</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=62'); ?>"><li>Long An</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=63'); ?>"><li>Tiền Giang</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=64'); ?>"><li>Vĩnh Long</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=65'); ?>"><li>Cần Thơ</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=66'); ?>"><li>Đồng Tháp</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=67'); ?>"><li>An Giang</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=68'); ?>"><li>Kiên Giang</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=69'); ?>"><li>Cà Mau</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=70'); ?>"><li>Tây Ninh</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=71'); ?>"><li>Bến Tre</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=72'); ?>"><li>Vũng Tàu</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=84'); ?>"><li>Trà Vinh</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=85'); ?>"><li>Ninh Thuận</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=86'); ?>"><li>Bình Thuận</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=93'); ?>"><li>Bình Phước</li></a>
                <a href="<?php echo $this->url->get('index/choise_city?url='.urlencode($this->getCurrentPageURL).'&city=94'); ?>"><li>Bạc Liêu</li></a>
                
            </ul>
        </div>
        
        <div class="login">
			<div class="menuItem">
                <?php if (isset($user['id'])) { ?>
                    <?php echo 'Hi <a id="a_login" title="' . $user['username'] . '">'; ?> <?php echo substr($user['username'], 0, 20); ?> <?php echo '</a> | <a href="' . $this->url->get('logout') . '">' . $lang->_('Logout') . '</a>'; ?>
                <?php } else { ?>
                <a id="a_login" ><?php echo $lang->_('login'); ?></a> | 
                <a href="<?php echo $this->url->getStatic('user/register'); ?>"><?php echo $lang->_('register'); ?></a>
                <?php } ?>
			</div>
            
            <div id="frmlogin" class="register repad reborR">
            <div id="parrow_login">
                
            </div>
            <?php if (isset($user['id'])) { ?>
                <img style="margin: 0 32px;" src="<?php echo $this->url->getStatic('public/img/users.png'); ?>" width="138px" />
                <ul class="">
                    <li><a class="remarL" href="" ><?php echo $lang->_('point'); ?>: <?php echo '<b style="color:red;">'.$user['core'].'</b>'; ?></a></li>
                    <li><a class="remarL" href="<?php echo $this->url->getStatic('user/updateinfo'); ?>" ><?php echo $lang->_('update_profile'); ?></a></li>
                    <li><a class="remarL" href="<?php echo $this->url->getStatic('user/updatepass'); ?>"><?php echo $lang->_('edit_pass'); ?></a></li>
                    <li><a class="remarL" href="<?php echo $this->url->getStatic('news/mynews'); ?>"><?php echo $lang->_('my_post'); ?></a></li>
                    <li><a class="remarL" href="<?php echo $this->url->getStatic('love/partner'); ?>"><?php echo $lang->_('view_profile'); ?></a></li>
                </ul>
            <?php } else { ?>
                <form action="<?php echo $this->url->get('user/login?url=').urlencode($this->utils->getCurrentPageURL()) ?>" method="post">
                    <label><?php echo $lang->_('username'); ?>:</label>
                    <input type="text" name="username" id="username" />
                    <label><?php echo $lang->_('pass'); ?>:</label>
                    <input type="password" name="password" id="password" />
                    <input style="width: 184px;" type="submit" name="submit" id="submit" value="<?php echo $lang->_('login'); ?>" />
                    <a class="alignRight" href="<?php echo $this->url->get('user/forgetpass'); ?>"><?php echo $lang->_('forget_pass'); ?> ?</a>
                </form>
            <?php } ?>
            </div>
            
		</div>
	</div>
	 
</div>