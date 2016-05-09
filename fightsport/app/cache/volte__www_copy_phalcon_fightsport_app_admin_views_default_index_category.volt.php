<form id="" action="" method="post">
    <fieldset style="border: 1px solid #ddd;padding: 30px;line-height: 40px;font-weight: bold;margin: 10px;" class="box_upload">
        <legend>Điền thông tin danh mục</legend>
        <table>
            <tbody>
                <tr>
                    <td width=150>Name&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span></td>
                    <td>
                        <?php $err = ($this->utils->getMessageError('name', $error) ? 'error_input' : ''); ?>
                        <?php echo $form->render('name', array('class' => $err)); ?>
                        <?php echo '<span class="error_put">' . $this->utils->getMessageError('name', $error) . '</span>'; ?>
                    </td>
                </tr>
                <tr>
                    <td width=150>Parent category&nbsp;&nbsp;<span style="color: rgb(255, 208, 82);">(*)</span></td>
                    <td>
                        <?php $err = ($this->utils->getMessageError('id_category', $error) ? 'error_input' : ''); ?>
                        <?php echo $form->render('id_category', array('class' => $err)); ?>
                        <?php echo '<span class="error_put">' . $this->utils->getMessageError('id_category', $error) . '</span>'; ?>
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