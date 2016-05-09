<div role="main" class="ui-content" data-theme="b">
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3 itemprop="name">Việc làm</h3>
            <ul data-role="listview" itemscope itemtype="http://schema.org/BreadcrumbList">
                <?php
                foreach($category_data as $item)
                {
                    if($item['id']==1)
                    {
                        echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" title="'.$item['name'].'" data-ajax="false" href="'.$this->url->get('category').'/viec-lam-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                    }
                }
                ?>
			</ul>
        </div>
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3 itemprop="name">Bất động sản</h3>
            <ul data-role="listview" itemscope itemtype="http://schema.org/BreadcrumbList">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==13)
                        {
                            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" title="'.$item['name'].'" data-ajax="false" href="'.$this->url->get('category').'/bat-dong-san-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                        }
                    }
                ?>
			</ul>
        </div>
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3 itemprop="name">Điện thoại</h3>
            <ul data-role="listview" itemscope itemtype="http://schema.org/BreadcrumbList">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==18)
                        {
                            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" title="'.$item['name'].'" data-ajax="false" href="'.$this->url->get('category').'/dien-thoai-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                        }
                    }
                ?>
			</ul>
        </div>
        
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3 itemprop="name">Mua bán</h3>
            <ul data-role="listview" itemscope itemtype="http://schema.org/BreadcrumbList">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==26)
                        {
                            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" title="'.$item['name'].'" data-ajax="false" href="'.$this->url->get('category').'/mua-ban-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                        }
                    }
                ?>
			</ul>
        </div>
        
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3 itemprop="name">Điện tử gia dụng</h3>
            <ul data-role="listview" itemscope itemtype="http://schema.org/BreadcrumbList">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==37)
                        {
                            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" title="'.$item['name'].'" data-ajax="false" href="'.$this->url->get('category').'/dien-tu-gia-dung-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                        }
                    }
                ?>
			</ul>
        </div>
        
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3 itemprop="name">Máy tính</h3>
            <ul data-role="listview" itemscope itemtype="http://schema.org/BreadcrumbList">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==45)
                        {
                            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" title="'.$item['name'].'" data-ajax="false" href="'.$this->url->get('category').'/may-tinh-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                        }
                    }
                ?>
			</ul>
        </div>
        
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3 itemprop="name">Phương tiện đi lại</h3>
            <ul data-role="listview" itemscope itemtype="http://schema.org/BreadcrumbList">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==52)
                        {
                            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" title="'.$item['name'].'" data-ajax="false" href="'.$this->url->get('category').'/phuong-tien-di-lai-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                        }
                    }
                ?>
			</ul>
        </div>
        
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3 itemprop="name">Thời trang - mỹ phẩm</h3>
            <ul data-role="listview" itemscope itemtype="http://schema.org/BreadcrumbList">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==59)
                        {
                            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" title="'.$item['name'].'" data-ajax="false" href="'.$this->url->get('category').'/thoi-trang-my-pham-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                        }
                    }
                ?>
			</ul>
        </div>
        
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3 itemprop="name">Mẹ và bé</h3>
            <ul data-role="listview" itemscope itemtype="http://schema.org/BreadcrumbList">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==65)
                        {
                            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" title="'.$item['name'].'" data-ajax="false" href="'.$this->url->get('category').'/me-va-be-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                        }
                    }
                ?>
			</ul>
        </div>
        
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3 itemprop="name">Sim thẻ</h3>
            <ul data-role="listview" itemscope itemtype="http://schema.org/BreadcrumbList">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==72)
                        {
                            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" title="'.$item['name'].'" data-ajax="false" href="'.$this->url->get('category').'/sim-the-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
                        }
                    }
                ?>
			</ul>
        </div>
        
        <div class="ui-collapsible ui-collapsible-inset "  data-role="collapsible">
            <h3 itemprop="name">Dịch vụ</h3>
            <ul data-role="listview" itemscope itemtype="http://schema.org/BreadcrumbList">
                <?php
                    foreach($category_data as $item)
                    {
                        if($item['id']==80)
                        {
                            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" title="'.$item['name'].'" data-ajax="false" href="'.$this->url->get('category').'/dich-vu-'.$this->utils->converToUrl($item['name']).'_i'.$item['id_level'].'">'.$item['name'].'</a></li>';
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