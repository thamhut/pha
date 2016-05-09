<div role="main" class="ui-content" data-theme="b">
      <h3>Tin đăng của tôi</h3>
    <div hidden=""><input type="text" hidden="" id="idcate" value="<?php echo $id_cate; ?>" /></div>
    <ul data-role="listview" data-filter="true">
        <?php 
        foreach($data['lst_item_content'] as $itemContent)
        {
        ?>
        <li><a data-ajax="false" title="<?php echo $this->utils->enhtml($itemContent['title']); ?>" href="<?php echo $this->url->get('detail/'.$this->utils->converToUrl($itemContent['title']).'_i'.$itemContent['id']).'.html'; ?>">
            <img style="margin-top: 15px;" alt="<?php echo $this->utils->enhtml($itemContent['title']); ?>" src="<?php if(($this->utils->explode_first($itemContent['img'], ',')) && $this->utils->explode_first($itemContent['img'], ',')!='')echo $this->utils->explode_first($itemContent['img'], ','); else echo $this->url->get().'public/img/noimg.png';?>" width="90" height="90" />
            <h3><?php echo $this->utils->enhtml($itemContent['title']); ?></h3>
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