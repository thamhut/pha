<div id="header">
	<div class="header">
		<div class="" style="display: inline-block; margin-top: 12px;">
    		<a href="<?php echo $this->url->getStatic('sg'); ?>" style="text-decoration: underline;">
                Classifieds
            </a>
          </div>
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
        <div id="button_dangtin"><a href="/news"><?php echo $lang->_('news_post'); ?></a></div>
        
        
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
                    <li><a class="remarL" href="<?php echo $this->url->getStatic('user/update'); ?>" ><?php echo $lang->_('update_profile'); ?></a></li>
                    <li><a class="remarL" href="<?php echo $this->url->getStatic('user/changepass'); ?>"><?php echo $lang->_('edit_pass'); ?></a></li>
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