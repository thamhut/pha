<div role="main" class="ui-content" style="padding: 10% 2%;" data-theme="a">
    <div data-role="tabs" id="tabs">
        <div data-role="navbar">
        <ul>
            <li><a onclick="setCookie('u_info','1',1);" href="#one" data-ajax="false">Thông tin</a></li>
            <li><a onclick="setCookie('u_info','0',1);" href="#two" data-ajax="false">Bài đăng</a></li>
        </ul>
        </div>
        <br />
        <div id="one" class="ui-body-d ui-content">
            <ul data-role="listview">
                <li>
                    <div><img src="/public/img/user-icon.png" />&nbsp;&nbsp;Họ và tên: <?php echo isset($data['info']->fullname)?$data['info']->fullname:''; ?></div>
                </li>
                <li>
                    <div><img src="/public/img/icon_email.gif" />&nbsp;&nbsp;Email: <?php echo isset($data['info']->email)?$data['info']->email:''; ?></div>
                </li>
                <li>
                    <div><img src="/public/img/date_icon.png" />&nbsp;&nbsp;Tham gia: <?php echo isset($data['info']->insert_date)?$data['info']->insert_date:''; ?></div>
                </li>
                <li>
                    <div><img src="/public/img/icon_sex.png" />&nbsp;&nbsp;Giới tính: <?php 
                    if($data['info']->sex == '2')
                    {echo 'Không xác định';}
                    elseif($data['info']->sex == '1') 
                    {echo 'Nam';} 
                    else {echo 'Nữ';} ?></div>
                </li>
                <li>
                    <div><img src="/public/img/fb_icon_tiny.gif" />&nbsp;&nbsp;Facebook: <?php echo isset($data['info']->fb)?$data['info']->fb:''; ?></div>
                </li>
                
            </ul>
            <br /><br />
            <a data-ajax="false" href="<?php echo $this->url->get('user').'/update?id='.$data['info']->id ?>" class="ui-btn ui-btn-inline continue_view" data-icon="action">Chỉnh sửa</a>
        </div>
        <div id="two" class="ui-body-d ui-content" >
            <ul data-role="listview">
                <?php
                    foreach($data['lst_item_content'] as $inonstop)
                    {
                    ?>
                    <li>
                        <?php
                            if($inonstop['id_user'] == $data['id'])
                            {
                                echo '<input type="checkbox" id="_'.$inonstop['id'].'" name="select['.$inonstop['id'].']" style="margin-top:30px;"/>';
                            }
                            else
                            {
                                echo '<img src="/public/img/music_icon_title.png" style="margin-top:30px;"/>';
                            }
                        ?>
                    
                        <a style="padding-left: 40px;" title="<?php echo strip_tags($inonstop['title']); ?>" data-ajax='false' href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($inonstop['title']).'_i'.$inonstop['id']).'.html'; ?>">
                        <?php echo strip_tags($inonstop['title']); ?>
                        <p><img src="/public/img/icon_headphone.gif" style="vertical-align: sub; opacity: 0.7;" />&nbsp;<span><?php echo $inonstop['play']; ?> lượt</span></p>
                        </a>
                        <?php
                            if($inonstop['id_user'] == $data['id'])
                            {
                                echo '<a data-ajax="false" data-icon="edit" href="'.$this->url->get('article/edit?id=').$inonstop['id'].'"><img title="Sửa" style="float: left;" src="/public/img/edit_music.png"></a>';
                            }
                        ?>
                    </li>
                <?php }?>
            </ul>
            <br /><br />
            <?php if($data['info']->id == $data['id']){ ?>
            <select id="action_user" onchange="if(_active()) action_user();" >
                <option value="0">Thao tác</option>
                <option value="1">Xóa</option>
            </select>
            <?php } ?>
        </div>
    </div>
</div>
<script>
$(function() {
    
    $(window).scroll(function() {
       if($(window).scrollTop() + $(window).height() == $(document).height() && getCookie('u_info') == '0') {
           window.location = '<?php echo $data['url'].'&page='.($data['page']+1).'#two'; ?>';
       } 
    });
});
</script>