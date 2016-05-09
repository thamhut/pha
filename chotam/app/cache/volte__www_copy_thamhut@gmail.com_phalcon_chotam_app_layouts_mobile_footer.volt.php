<footer data-role="footer" data-position="fixed" data-theme="b">
    <nav id="navdown" data-role="navbar">
        <ul>
         <li><a data-ajax="false" id="trangchu" href="<?php echo $this->url->get('/'); ?>" 
                   data-icon="home" >Trang chủ</a></li>
         <li><a data-ajax="false" href="<?php echo $this->url->get('news'); ?>"
                   data-icon="arrow-u" >Đăng tin</a></li>
         <li><a data-ajax="false" href="<?php echo $this->url->get(''); ?>"
                   data-icon="arrow-u" >Desktop</a></li> 
      </ul>
   </nav>
</footer>