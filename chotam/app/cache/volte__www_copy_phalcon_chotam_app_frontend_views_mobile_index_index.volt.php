<div role="main" class="ui-content" data-theme="b">
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3>Việc làm</h3>
            <ul data-role="listview">
                <?php
                foreach($category_data as $item)
                {
                    if($item['id']==1)
                    {
                        echo '<li><a data-ajax="false" href="'.$this->url->get('category').'/viec-lam-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                    }
                }
                ?>
			</ul>
        </div>
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3>Bất động sản</h3>
            <ul data-role="listview">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==13)
                        {
                            echo '<li><a data-ajax="false" href="'.$this->url->get('category').'/bat-dong-san-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                        }
                    }
                ?>
			</ul>
        </div>
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3>Điện thoại</h3>
            <ul data-role="listview">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==18)
                        {
                            echo '<li><a data-ajax="false" href="'.$this->url->get('category').'/dien-thoai-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                        }
                    }
                ?>
			</ul>
        </div>
        
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3>Mua bán</h3>
            <ul data-role="listview">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==26)
                        {
                            echo '<li><a data-ajax="false" href="'.$this->url->get('category').'/mua-ban-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                        }
                    }
                ?>
			</ul>
        </div>
        
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3>Điện tử gia dụng</h3>
            <ul data-role="listview">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==37)
                        {
                            echo '<li><a data-ajax="false" href="'.$this->url->get('category').'/dien-tu-gia-dung-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                        }
                    }
                ?>
			</ul>
        </div>
        
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3>Máy tính</h3>
            <ul data-role="listview">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==45)
                        {
                            echo '<li><a data-ajax="false" href="'.$this->url->get('category').'/may-tinh-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                        }
                    }
                ?>
			</ul>
        </div>
        
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3>Phương tiện đi lại</h3>
            <ul data-role="listview">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==52)
                        {
                            echo '<li><a data-ajax="false" href="'.$this->url->get('category').'/phuong-tien-di-lai-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                        }
                    }
                ?>
			</ul>
        </div>
        
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3>Thời trang - mỹ phẩm</h3>
            <ul data-role="listview">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==59)
                        {
                            echo '<li><a data-ajax="false" href="'.$this->url->get('category').'/thoi-trang-my-pham-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                        }
                    }
                ?>
			</ul>
        </div>
        
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3>Mẹ và bé</h3>
            <ul data-role="listview">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==65)
                        {
                            echo '<li><a data-ajax="false" href="'.$this->url->get('category').'/me-va-be-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                        }
                    }
                ?>
			</ul>
        </div>
        
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3>Sim thẻ</h3>
            <ul data-role="listview">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==72)
                        {
                            echo '<li><a data-ajax="false" href="'.$this->url->get('category').'/sim-the-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                        }
                    }
                ?>
			</ul>
        </div>
        
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3>Dịch vụ</h3>
            <ul data-role="listview">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==80)
                        {
                            echo '<li><a data-ajax="false" href="'.$this->url->get('category').'/dich-vu-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                        }
                    }
                ?>
			</ul>
        </div>
        
</div>

<style>
#main_home h3 a{
}

#main_home ul li a{
}
</style>