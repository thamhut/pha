<div class="main">
      <div class="columns">
           <div class="column-left">
                <div class="title_category">
                    <h2>Category Archives: 
                        <?php
                        $id = 0; $name = '';
                        foreach($category as $item)
                        {
                            if($item['id_level'] == $data['id_level'])
                            {
                                $id = $item['id'];
                                $name = $item['name'];
                            }
                        }
                        foreach($category as $item)
                        {
                            if($item['id_level'] == $id)
                            {
                                echo $item['name'].' » '.$name; break;
                            }
                            if($item['id'] == 0)
                            {
                                echo $item['name'];    break;
                            }
                        }
                        ?>
                    </h2>
                </div>
                <?php
                foreach($data['lst_item_content'] as $item){ 
                ?>
                <div class="item_post_category">
                     <div class="poster_category floatLeft">
                        <a title="<?= ($item['title']) ; ?>" href="<?= $this->url->get('detail/'.$this->utils->converToUrl($item['title']).'_i'.$item['id'].'.html') ; ?>"><img width="195" height="110" src="<?php echo $item['poster'] ?>" class="" alt="<?= ($item['title']) ; ?>"></a>
                     </div>
                     <div class="subcontent_category floatRight">
                        <a title="<?= ($item['title']) ; ?>" href="<?= $this->url->get('detail/'.$this->utils->converToUrl($item['title']).'_i'.$item['id'].'.html') ; ?>">
                          <div class="title">
                               <h2><?= $item['title']; ?></h2> 
                          </div> 
                        </a>
                      <div class="subcontent_category_2">
                           <?php echo $this->utils->getcontentlst_cate($item['content']); ?>
                           &nbsp;<a style="color: red!important; text-decoration: underline;" title="<?= ($item['title']) ; ?>" href="<?= $this->url->get('detail/'.$this->utils->converToUrl($item['title']).'_i'.$item['id'].'.html') ; ?>" rel="bookmark">Continue reading »</a>
                      </div>
                        
                     </div>
                     <div class="clear"></div>
                </div>
                <?php
                }
                ?>
                <div class="item_post_category"> <?php echo $this->partial('pagination'); ?> </div>
           </div> 
           <?php echo $this->partial('right_menu'); ?>
           <div class="clear"></div>
      </div>
</div>