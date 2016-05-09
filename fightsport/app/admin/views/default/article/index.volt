<a class="btn_admin" href="{{ this.url.get('admin/article/create') }}">New</a>
<br /> <br />
<table style="width: 100%;">
    <tr class="label_tr">
        <td class="tdfirst">ID</td>
        <td>Title</td>
        <td>Modified Date</td>
        <td class="tdend"></td>
    </tr>
    <?php 
        foreach($data['lst_item_content'] as $item){
    ?>
    <tr>
        <td class="tdfirst"><?=$item['id'] ?></td>
        <td><?=$item['title'] ?></td>
        <td><?=$item['update_date'] ?></td>
        <td class="tdend alignCenter"><a href="{{ this.url.get('admin/article/edit/' ~ item['id']) }}">Edit</a> | <a onclick="if(_active()) return true; else return false; " href="{{ this.url.get('admin/article/delete/' ~ item['id']) }}">Delete</a></td>
    </tr>
    <?php }?>
    <tr class="label_tr">
        <td colspan="4" class="tdend">{{ partial('pagination') }}</td>
    </tr>
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