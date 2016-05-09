<link rel="stylesheet" href="public/css/flexslider.css" type="text/css" media="screen" />

<script type="text/javascript">

$(window).load(function(){
  $('.flexslider').flexslider({
    animation: "slide",
    animationLoop: false,
    itemWidth: 210,
    itemMargin: 5,
    minItems: 1,
    maxItems: 2,
    directionNav:false,
    start: function(slider){
      $('body').removeClass('loading');
      $(".flex-control-nav").remove();
    }
  });
});
</script>
<div class="main">
      <div class="slide_bar">
           <div>
                <h3>BREAKING NEWS</h3>
           </div> 
           <div class="slider">
            <section class="slider">
                <div class="flexslider carousel">
                  <ul class="slides">
                    <?php 
                    foreach($data['lst_item_content']  as $item){
                    ?>
                        <li style="background: #EFF8FB;">
                	       <a title="<?= ($item['title']) ; ?>" href="<?= $this->url->get('detail/'.$this->utils->converToUrl($item['title']).'_i'.$item['id'].'.html') ; ?>">
                               <div style="float: left; width:220px;">
                                   <img width="220" style="height: 150px;" src="<?= $item['poster']; ?>" class="attachment-bigthumb-left wp-post-image" alt="<?= $item['title']; ?>"> 
                               </div>
                               
                               <div style="float: right;width:260px;">
                                   <h2 style="color: #0a1c2e; font-family: 'Gentium Book Basic', serif; font-style: italic;"> <?= $item['title']; ?> </h2>
                               </div>
                               <div class="clear"></div>
                           </a>
                		</li>
                	<?php }?>
                  </ul>
                </div>
            </section>
           </div>
      </div>
      
      <div class="columns">
           <div class="column-left">
                <?php 
                foreach($data['lst_item_content']  as $item){
                ?>
                    <div class="item_post">
                        <div class="title_post">
                            <div class="title">
                                <a title="<?= ($item['title']) ; ?>" href="<?= $this->url->get('detail/'.$this->utils->converToUrl($item['title']).'_i'.$item['id'].'.html') ; ?>"><h2> <?= $item['title']; ?> </h2></a>
                            </div>
                            <div class="info_post">
                                <i>By</i> <u>Admin</u> - <?= date("F j, Y, g:i a", strtotime($item['update_date'])) ?>
                            </div>
                        </div>
                        <div class="subcontent_post">
                            <div class="subcontent">
                                 <?php echo $this->utils->getcontentlst($item['content']); ?>
                                 &nbsp;<a style="color: red; text-decoration: underline;" title="<?= ($item['title']) ; ?>" href="<?= $this->url->get('detail/'.$this->utils->converToUrl($item['title']).'_i'.$item['id'].'.html') ; ?>" rel="bookmark">Continue reading »</a>
                            </div>
                            
                            <div class="poster">
                                <a title="<?= ($item['title']) ; ?>" href="<?= $this->url->get('detail/'.$this->utils->converToUrl($item['title']).'_i'.$item['id'].'.html') ; ?>" rel="bookmark"> <img width="400" height="256" src="<?= $item['poster']; ?>" class="attachment-bigthumb-left wp-post-image" alt="<?= $item['title']; ?>"></a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <br />  <br />
                <?php }?>
           </div> 
           <?php echo $this->partial('right_menu'); ?>
           <div class="clear"></div>
      </div>
</div>