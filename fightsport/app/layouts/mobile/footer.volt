<footer data-role="footer" data-position="fixed" data-theme="b">
    <nav id="navdown" data-role="navbar">
        <ul>
         <li><a data-ajax="false" id="trangchu" href="<?php echo $this->url->get('/'); ?>" 
                   data-icon="home" >Trang chủ</a></li>
         <li><a data-ajax="false" href="{{ static_url('article') }}"
                   data-icon="arrow-u" >Đăng nhạc</a></li>
         <li><?php if(isset($user['id'])){ ?><a data-ajax="false" href="<?php echo $this->url->get('user').'/'.$user['username'].'_i'.$user['id'].''; ?>" data-icon="user" >Tài khoản</a><?php }else {?>
         <a data-ajax="false" href="<?php echo $this->url->get('user/login?url=').urlencode($this->utils->getCurrentPageURL()); ?>" data-icon="action" >Đăng nhập</a><?php }?></li> 
      </ul>
   </nav>
</footer>