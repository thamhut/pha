<div id="like_fanpage" class="hidden">
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <div class="fb-like-box" data-href="https://www.facebook.com/pages/H%E1%BB%99i-Thanh-Ni%C3%AAn-Bay-V%C3%AC-Nh%E1%BA%A1c-S%C3%A0n-Lan-Man-Nh%E1%BA%A1c-Nonstop-Stop-C%C3%B9ng-Nh%E1%BA%A1c-Dj/1405309099768590" data-width="250px" data-colorscheme="dark" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
</div>

<div class="box_footer">
    <div style="border-top: medium none;color: #4194bb;margin: 0 auto; text-align: center;width: 1160px;">
        <div>
            <!-- start SITE_WIDE_FOOTER_CC -->
            <div class="ftr">
                <table cellspacing="0" cellpadding="0" width="100%">
                    <tbody>
                        <tr>
                            <td style="text-align: left; padding: 20px 0px;">
                                <a href=""><span class="footerTitle" style="color: #eaedf6; font-weight: bold;">DANH MỤC</span>
                                <br /><br />
                                <ul>
                                    <?php
                                    foreach($lstcate as $icate){
                                    ?>
                                    <li style="padding: 5px 0px 0px 0px;" >
                                        <a style="color: #4194bb;" href="{{ static_url('category') ~ '/' ~ this.utils.converToUrl(icate['name']) ~ '_i' ~ icate['id'] }}" title="<?php echo $icate['name']; ?>">
                                            <?php echo ucwords($icate['name']); ?>
                                        </a>
                                    </li>
                                    <?php }?>
                                    
                                </ul>
                            </td>
                            <td style="text-align: left; padding: 20px 0px;">
                                <a href="<?php echo $this->url->getBaseURI(); ?>category/viec-lam_i1"><span class="footerTitle" style="color: #eaedf6; font-weight: bold;">Việc làm</span>
                                <br /><br />
                                <ul>
                                    <li style="padding: 5px 0px 0px 0px;" >
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/viec-lam-lao-dong-pho-thong_i2">Lao động phổ thông</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;" >
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/viec-lam-thiet-ke---my-thuat_i3">Thiết kế - mỹ thuật</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;" >
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/viec-lam-quan-ly_i4">Quản lý</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;" >
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/viec-lam-ky-su---kien-truc-su_i5">Kỹ sư - kiến trúc sư</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;" >
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/viec-lam_i1">Xem tiếp...</a>
                                    </li>
                                </ul>
                            </td>
                            
                            <td style="text-align: left; padding: 20px 0px;">
                                <a href="<?php echo $this->url->getBaseURI(); ?>category/mua-ban_i26"><span class="footerTitle" style="color: #eaedf6; font-weight: bold;">Mua bán</span>
                                <br /><br />
                                <ul>
                                    <li style="padding: 5px 0px 0px 0px;">
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/mua-ban-van-phong-pham_i27">Văn phòng phẩm</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;">
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/mua-ban-tro-choi---game_i28">Trò chơi - game</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;">
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/mua-ban-cay-canh---thu-nuoi_i29">Cây cảnh - thú nuôi</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;">
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/mua-ban-thu-cong---my-nghe_i30">Thủ công - mỹ nghệ</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;" >
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/mua-ban_i26">Xem tiếp...</a>
                                    </li>
                                </ul>
                            </td>
                            
                            <td style="text-align: left; padding: 20px 0px;">
                                <a href="<?php echo $this->url->getBaseURI(); ?>category/phuong-tien-di-lai_i52"><span class="footerTitle" style="color: #eaedf6; font-weight: bold;">Phương tiện đi lại</span>
                                <br /><br />
                                <ul>
                                    <li style="padding: 5px 0px 0px 0px;">
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/phuong-tien-di-lai-o-to_i53">Ô tô</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;">
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/phuong-tien-di-lai-xe-tai_i54">Xe tải</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;">
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/phuong-tien-di-lai-xe-may_i55">Xe máy</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;">
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/phuong-tien-di-lai-xe-dap_i56">Xe đạp</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;" >
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/phuong-tien-di-lai_i52">Xem tiếp...</a>
                                    </li>
                                </ul>
                            </td>
                            
                            <td style="text-align: left; padding: 20px 0px;">
                                <a href="<?php echo $this->url->getBaseURI(); ?>category/bat-dong-san_i13"><span class="footerTitle" style="color: #eaedf6; font-weight: bold;">Bất động sản</span>
                                <br /><br />
                                <ul>
                                    <li style="padding: 5px 0px 0px 0px;">
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/bat-dong-san-mua-ban-nha---can-ho_i14">Mua bán nhà - căn hộ</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;">
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/bat-dong-san-mua-ban-dat_i15">Mua bán đất</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;">
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/bat-dong-san-van-phong---nha-xuong_i16">Văn phòng - nhà xưởng</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;">
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/bat-dong-san-thue-nha-dat_i17">Thuê nhà đất</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;" >
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/bat-dong-san_i13">Xem tiếp...</a>
                                    </li>
                                </ul>
                            </td>
                            
                            <td style="text-align: left; padding: 20px 0px;">
                                <a href="<?php echo $this->url->getBaseURI(); ?>category/dien-thoai_i18"><span class="footerTitle" style="color: #eaedf6; font-weight: bold;">Điện thoại</span>
                                <br /><br />
                                <ul>
                                     <li style="padding: 5px 0px 0px 0px;">
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/dien-thoai-iphone_i19">Iphone</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;">
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/dien-thoai-sony_i20">Sony</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;">
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/dien-thoai-nokia_i21">Nokia</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;">
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/dien-thoai-samsung_i22">Samsung</a>
                                    </li>
                                    <li style="padding: 5px 0px 0px 0px;" >
                                        <a style="color: #4194bb;" href="<?php echo $this->url->getBaseURI(); ?>category/dien-thoai_i18">Xem tiếp...</a>
                                    </li>
                                </ul>
                            </td>
                            
                        </tr>
                    </tbody>
                </table>

                <table cellspacing="0" cellpadding="0" width="100%">
                    <tbody>
                        <tr>
                            <td style="padding:0px;">
                                <div style="border-top: 1px solid #cbcbcb; border-bottom: 1px solid #FFFFFF; width:100%; height:0px; max-width:1004px; min-width:930px; margin-left:1px;"></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left; padding: 10px 0px;">
                                <div class="countries-title" style="padding: 5px 0px;color: #333333;">Link quảng cáo:</div>
                                <ul class="countries-list clearfix">
                                    <li style="display: inline; margin-right: 10px;">
                                        <a style="color: #eaedf6;" target="_blank" href="http://codecloud.vn/">Thông tin công nghệ</a>
                                    </li>
                                    |
                                    <li style="display: inline; margin-right: 10px;">
                                        <a style="color: #eaedf6;" target="_blank" href="http://lenocnha.com/">Nhạc sàn hay</a>
                                    </li>
                                    |
                                    <li style="display: inline; margin-right: 10px;">
                                        <a style="color: #eaedf6;" target="_blank" href="http://chotam.info/">Rao vặt</a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:0px;">
                                <div style="border-top: 1px solid #cbcbcb; border-bottom: 1px solid #FFFFFF; width:100%; height:0px; max-width:1004px; min-width:930px; margin-left:1px;"></div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <!-- end SITE_WIDE_FOOTER_CC -->
        </div>
        <div style="padding: 15px;color: #333333;">
            Copyright &copy; 2014 Chợ rao vặt tổng hợp
            <br />
            Liên hệ: thamhut@gmail.com
        </div>
    </div>
    <!-- google_ad_section_end(weight=ignore) -->
</div>
