<script src="<?php echo $this->url->getStatic('extensions/ckeditor/ckeditor.js'); ?>"></script>
<script src="<?php echo $this->url->getStatic('extensions/ckeditor/adapters/jquery.js'); ?>"></script>
<form id="" action="" method="post" enctype="multipart/form-data">
    <fieldset style="border: 1px solid #ddd;padding: 30px;line-height: 40px;font-weight: bold;margin: 10px;" class="box_upload">
        <legend>Điền thông tin bài viết</legend>
        <table>
            <tbody>
                <tr>
                    <td width=150>Title&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span></td>
                    <td>
                        <?php $err = ($this->utils->getMessageError('title', $error) ? 'error_input' : ''); ?>
                        <?php echo $form->render('title', array('class' => $err . ' wtd')); ?>
                        <?php echo '<span class="error_put">' . $this->utils->getMessageError('title', $error) . '</span>'; ?>
                    </td>
                </tr>
                <tr>
                    <td width=150>Category&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span></td>
                    <td>
                        <?php $err = ($this->utils->getMessageError('id_category', $error) ? 'error_input' : ''); ?>
                        <?php echo $form->render('id_category', array('class' => $err . ' wtd')); ?>
                        <?php echo '<span class="error_put">' . $this->utils->getMessageError('id_category', $error) . '</span>'; ?>
                    </td>
                </tr>
                <tr>
                    <td width=150>Content&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span></td>
                    <td>
                        <?php $err = ($this->utils->getMessageError('content', $error) ? 'error_input' : ''); ?>
                        <?php echo $form->render('content', array('class' => $err)); ?>
                        <?php echo '<span class="error_put">' . $this->utils->getMessageError('content', $error) . '</span>'; ?>
                    </td>
                </tr>
                <tr style="margin-top: 10px;">
                    <td width=150>Poster&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span></td>
                    <td id="add_avata">
                        <img width="240" class="a_change_avata" src="<?php echo isset($content->poster)?$content->poster:''; ?>" /> <a class="a_change_avata" onclick="change_img();">Thay ảnh</a>
                    </td>
                </tr>
                <tr>
                    <td width=150>Tags&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span></td>
                    <td>
                        <?php $err = ($this->utils->getMessageError('tags', $error) ? 'error_input' : ''); ?>
                        <?php echo $form->render('tags', array('class' => $err . ' wtd')); ?>
                        <?php echo '<span class="error_put">' . $this->utils->getMessageError('tags', $error) . '</span>'; ?>
                    </td>
                </tr>
                <tr>
                    <td width=150></td>
                    <td class="alignCenter">
                        <button class="button_div" width="70px" type="submit" >Gửi</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
</form>

<script>
    $( document ).ready( function() {
    	$( 'textarea#content' ).ckeditor();
    } );
</script>
<style>
    .wtd{width:935px!important; border: 1px solid #ccc!important;}
</style>