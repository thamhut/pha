<a class="btn_admin" href="<?php echo $this->url->get('admin/hot/create'); ?>">New</a>
<br /> <br />
<table style="width: 100%;">
    <tr class="label_tr">
        <td class="tdfirst">ID</td>
        <td>Name</td>
        <td class="tdend"></td>
    </tr>
    <?php 
        foreach($lstHot as $item){
    ?>
    <tr>
        <td class="tdfirst"><?=$item['id'] ?></td>
        <td><?=$item['name'] ?></td>
        <td class="tdend alignCenter"><a href="<?php echo $this->url->get('admin/hot/edit/' . $item['id']); ?>">Edit</a> | <a onclick="if(_active()) return true; else return false; " href="<?php echo $this->url->get('admin/hot/delete/' . $item['id']); ?>">Delete</a></td>
    </tr>
    <?php }?>
</table>

<style>
    .label_tr{background: #E3EDF9;} 
    td{ border-top: 0px!important;}
    td{ padding:10px;}
    td {border-bottom: 2px solid #CECECE;   border-top: 2px solid #CECECE;border-left:2px solid #CECECE}
    .tdfirst{border-left:2px solid #CECECE} .tdend{border-right:2px solid #CECECE;}
    td a{color:#518BCC !important;}
    .btn_admin{    padding: 10px;
    /* margin-bottom: 12px; */
    background-color: #E3EDDD;
    border-radius: 4px;
    color: #444 !important;
    cursor: pointer;
    font-weight: bold;}
</style>