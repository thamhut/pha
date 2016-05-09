<div class="top_bar">
    <div class="top_head_menu">
         <div class="hot inline_block">HOT</div>
         <div class="inline_block">
            <ul>
            <?php
                foreach($hot as $item){
            ?>
                <li><a href="<?=$this->url->get('tag/index/'.$this->utils->converToUrl(trim($item['name'])))?>">#<?= $item['name']; ?></a></li>
            <?php
            }
            ?>
            |<li><a title="nhac san" rel="dofollow" target="_blank" href="http://lenocnha.com/">nhac san</a></li>
            </ul>
         </div>
    </div>
</div>
