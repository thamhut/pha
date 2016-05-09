var BASE_URL = 'http://'+location.host+'/';
var timer='';

function abc(e)
{
    var id=0;
    var arrType = ["image/gif", "image/jpeg", "image/jpg", "image/png"];
    var file = document.getElementById(e.id);
    if(arrType.indexOf(file.files[0].type)==-1)
    {
        alert("Sai định dạng.");
            return false;
    }
    else if(file.files[0].size>1000000)
    {
        alert("File quá lớn định dạng.");
            return false;
    }
    else if($(".div_choise_img").length<5)
    {
        var arrid = e.id.split("-");
        id = parseInt(arrid[1])+1;
        $("tr#"+e.id+"-tr").after('<tr class="tr_choise_img" id="div_choise_img-'+id+'-tr"><td> <div><input class="div_choise_img" id="div_choise_img-'+id+'" onchange="abc(this);" type="file" name="img[]" id="file" /></div></td></tr>');
    }

    $('#'+e.id+'-tr div').css('background','#FFFFFF');
    $('#'+e.id).css('opacity','1');
}

function selectCate(id)
{
    $(".tr_gia_tien").hide();
    $("#tb_news li").hide();
    $(".li_cung_cau, .nguoi_dang").show();
    if(($("#"+id).val() >= 14 && $("#"+id).val() <= 79) ||  $("#"+id).val() == 98)
    {
        $(".tr_gia_tien").show();
    }
    if($("#"+id).val() >= 2 && $("#"+id).val() <= 12)
    {
        $(".muc_luong, .kinh_nghiem").show();
    }
    if(($("#"+id).val() >= 19 && $("#"+id).val() <= 25) || ($("#"+id).val() >= 27 && $("#"+id).val() <= 36) 
    || ($("#"+id).val() >= 38 && $("#"+id).val() <= 71))
    {
        $(".tinh_trang").show();
    }
    if($("#"+id).val() >= 14 && $("#"+id).val() <= 17 || $("#"+id).val() == 98)
    {
        $(".dien_tich").show();
    }
    if($("#"+id).val() >= 19 && $("#"+id).val() <= 25)
    {
        $(".kieu_dang").show();
    }
    if($("#"+id).val() >= 53 && $("#"+id).val() <= 58)
    {
        $(".xuat_xu").show();
        if($("#"+id).val() != 56)
        {
            $(".hang_san_xuat").show();
        }
    }
}

function fillter_mynews()
{
    var category = $("#danh_muc").val();
    var city = $("#city").val();
    var url = BASE_URL+'news/mynews?category='+category+'&city='+city;
    window.location = url;
}

function changecate()
{
    $("#lst_cate").css('display','inline-block');
    $("#input_data_new, #danhgia").css('display','none');
}

function sendemail()
{
    var emailgui = 'thamhut@gmail.com';
    var faqsend = $("#mail_message").val().trim();
    
    $.ajax({
        type: "POST",
        url: BASE_URL+"home/sendmail",
        data: { email_send: emailgui, mess_send: faqsend },
        success:function( msg ) {
            alert( msg );
        }
    });
    return false;
}

function deleteImg(i)
{
    if($(".div_choise_img").length==6)
    {
        $("tr.tr_choise_img").show();
    }
    $("#div_choise_img-"+i+"-tr").remove();
}

function deleted_news()
{
    return confirm('Bạn có muốn xóa tin đăng này?')
}

function find_news()
{
    window.location = BASE_URL+'news/mynews?keyword='+$(".input_keyword").val();
}

function findnews()
{
    var param = $("input#input_find").val();
    window.location.href = BASE_URL+'home/searchnews?q='+param;
}


function mymousemove(e)
{
    $(e).css('background','#EAF6FF');
}

function mymouseout(e)
{
    $(e).css('background','#FFFFFF');
}

function gotop(id, check, id_user)
{
    if(check == '1')
    {
        $.ajax({
            type: "GET",
            url: BASE_URL+"index/update_rank",
            data: { id: id, id_user: id_user},
            success:function( msg ) {
                alert(msg);
            }
        });
        return false;
    }
    else
    {
        alert("Bạn không đủ quyền");return false;
    }
}

function govip(id, check, id_user)
{
    if(check == '1')
    {
        /*$.ajax({
            type: "GET",
            url: BASE_URL+"home/update_vip",
            data: { id: id, id_user: id_user},
            success:function( msg ) {
                alert(msg);
            }
        });
        return false;*/
    }
    else
    {
        alert("Bạn không đủ quyền");return false;
    }
}

function hide_chat()
{
    $("#show_box_chat").fadeIn('slow');
    $(".div_container_boxchat").animate({
        height:'0px',
        width:'0px'
    });
    $(".div_container_boxchat div").fadeOut('slow');
}

function show_chat()
{
    $(".div_container_boxchat").animate({
        height:'350px',
        width:'300px'
    });
    $("#show_box_chat").fadeOut('slow');
    $(".div_container_boxchat div").fadeIn('slow');
}
function check_name()
{
    var name = $("input#name").val();
    $("#div_container_check_name").css('text-align','center');
    $("#div_container_check_name").html('<img src="/public/img/loading.gif" />');
    $.ajax({
        type: 'POST',
        url: BASE_URL+'home/checkname',
        data: {name : name, url : document.URL}
        })
        .done(function( msg ) {
            if(msg == 1)
            {
                $("#div_container_check_name").remove();
                $("#div_box_check_name").remove();
                $("#input_boxchat").select();
            }
            if(msg == 0)
            {
                $("#div_container_check_name").html('<b style="color:red;">Tên đã tồn tại.</b><input id="name" type="text" name="name" onkeypress=" if(event.keyCode == 13) {check_name(); }; return true;" /><i style="font-size: 10px;">(Chữ không dấu hoặc số viết liền)</i>');
            }
            if(msg == -1)
            {
                $("#div_container_check_name").html('<b style="color:red;">Tên không hợp lệ.</b><input id="name" type="text" name="name" onkeypress=" if(event.keyCode == 13) {check_name(); }; return true;" /><i style="font-size: 10px;">(Chữ không dấu hoặc số viết liền)</i>');
            }
    });
}

function show_box_chat()
{
    $(".div_container_boxchat").css('display','block');
    $(".div_chat_content, .div_parrow_chat").remove();
}

function loadajaxchatbox(action, url, data)
{
    $.ajax({
        type: action,
        url: url,
        data: data
        })
        .done(function( msg ) {
            if(msg!='0')
            {
                var result = JSON.parse(msg);
                if(result['numonline']>1)
                {
                    setInterval(function(){
                    $(".div_chat_content, .div_parrow_chat").fadeToggle(1000);
                    }, 2000);
                }
                if(result['idchat']!=0)
                {
                    //$('<div><strong>'+result['name']+':  </strong><br /><span>'+result['chat']+'</span></div>').insertBefore("#addchat");
                    $("#addchat").after('<div><strong>'+result['name']+':  </strong><br /><span>'+result['chat']+'</span></div>');
                    $("#_idmax").val(result['idchat']);
                    var numchat = $(".div_content_chat strong").length;
                    console.log(numchat);
                    if(numchat > 0)
                    {
                        var addnumchat = '<span>Chat với người đang xem</span><i style="background: none repeat scroll 0% 0% red; border-radius: 1px; padding: 2px; margin-left: 2px; font-weight: bold; color: rgb(255, 255, 255);">'+numchat+'</i>';
                        $(".div_chat_content span").html(addnumchat);
                    }
                    
                }
                else
                {
                    
                }
            }
    });
}


function loadajaxdeleteoldchat(action, url, data)
{
    $.ajax({
        type: action,
        url: url,
        data: data
        })
        .done(function( msg ) {
    });
}

function send_chat()
{
    var url = BASE_URL+'home/add_chat';
    var chat = $("#input_boxchat").val();
    chat = chat.replace(/</gi,'&lt;');
    chat = chat.replace(/>/gi,'&gt;');
    var data = {chat : chat, url : document.URL};
    $.ajax({
        type: 'POST',
        url: url,
        data: data
    })
    .done(function( msg ) {
        var result = JSON.parse(msg);
        if(msg != 0 && msg != -1)
        {
            if(result['idinsert'] != 0)
            {
                //$('<div style="border-bottom: 1px solid #FFFFFF;"><strong>'+result['name']+':  </strong><br /><span>'+chat+'</span></div>').insertBefore("#addchat");
                $("#addchat").after('<div style="border-bottom: 1px solid #FFFFFF;"><strong>'+result['name']+':  </strong><br /><span>'+chat+'</span></div>');
                $("#_idmax").val(result['idinsert']);
                $("#input_boxchat").val('');
            }
        }
        if(msg == -1)
        {
            var c = '<div id="div_box_check_name" class="" onclick="hide_chat();"></div><div id="div_container_check_name" >';
            c += '<table><tr><td><label>Tên:</label></td></tr><tr><td><input id="name" type="text" name="name" onkeypress=" if(event.keyCode == 13) {check_name(); }; return true;" />';
            c += '<i style="font-size: 10px;">(Chữ không dấu hoặc số viết liền)</i></td></tr></table></div>';
            $("#bottom_chat").after(c);
        }
    });
}

function warning_report(id)
{
    var url = BASE_URL+'index/update_warning';
    var data = {id : id};
    $.ajax({
        type: 'POST',
        url: url,
        data: data
    })
    .done(function( msg ) {
        alert(msg);
    });
}

function fillter()
{
    var idcate = $("#idcate").val()?$("#idcate").val():1;
    var fil1 = $("#cung_cau").val()?$("#cung_cau").val():0;
    var fil2 = $("#nguoi_dang").val()?$("#nguoi_dang").val():0;
    var fil3 = $("#muc_luong").val()?$("#muc_luong").val():0;
    var fil4 = $("#kinh_nghiem").val()?$("#kinh_nghiem").val():0;
    var fil5 = $("#tinh_trang").val()?$("#tinh_trang").val():0;
    var fil6 = $("#dien_tich").val()?$("#dien_tich").val():0;
    var fil8 = $("#gia_tu").val()?$("#gia_tu").val():0;
    var fil9 = $("#gia_den").val()?$("#gia_den").val():0;
    var fil10 = $("#kieu_dang").val()?$("#kieu_dang").val():0;
    var fil11 = $("#xuat_xu").val()?$("#xuat_xu").val():0;
    var fil12 = $("#hang_san_xuat").val()?$("#hang_san_xuat").val():0;
    var fillter = fil1+'a'+fil2+'a'+fil3+'a'+fil4+'a'+fil5+'a'+fil6+'a'+fil8+'a'+fil9+'a'+fil10+'a'+fil11+'a'+fil12;
    var idcate_name = $("#idcate").attr('alt');
    var url = BASE_URL+'category/'+idcate_name+'_i'+idcate+'?filter='+fillter; 
    window.location = url ;
}

function fillter_m()
{
    var idcate = $("#idcate").val()?$("#idcate").val():1;
    var fil1 = $("#cung_cau").val()?$("#cung_cau").val():0;
    var fil2 = $("#nguoi_dang").val()?$("#nguoi_dang").val():0;
    var fil3 = $("#muc_luong").val()?$("#muc_luong").val():0;
    var fil4 = $("#kinh_nghiem").val()?$("#kinh_nghiem").val():0;
    var fil5 = $("#tinh_trang").val()?$("#tinh_trang").val():0;
    var fil6 = $("#dien_tich").val()?$("#dien_tich").val():0;
    var fil8 = $("#gia_tu").val()?$("#gia_tu").val():0;
    var fil9 = $("#gia_den").val()?$("#gia_den").val():0;
    var fil10 = $("#kieu_dang").val()?$("#kieu_dang").val():0;
    var fil11 = $("#xuat_xu").val()?$("#xuat_xu").val():0;
    var fil12 = $("#hang_san_xuat").val()?$("#hang_san_xuat").val():0;
    var fillter = fil1+'a'+fil2+'a'+fil3+'a'+fil4+'a'+fil5+'a'+fil6+'a'+fil8+'a'+fil9+'a'+fil10+'a'+fil11+'a'+fil12;
    var url = BASE_URL+'mcategory/'+idcate+'?filter='+fillter;
    window.location = url ;
}

function no_save_edit()
{
    $("input#append_edit, button#append_edit, div#append_edit").remove();
    $("#box_edit").remove();
}

function upload(){
    $("div.dbox").append('<div class="upload_loading"></div>');
    var file = document.getElementById("image_upload");
    var client = new XMLHttpRequest();
    var formData = new FormData();
    /* Add the file */ 
    formData.append("upload", '');
    formData.append("image", file.files[0]);
    client.open("post", BASE_URL+"love/upload", true);
      //client.setRequestHeader("Content-Type", "multipart/form-data");
      client.send(formData);
      client.onreadystatechange = function() 
       {
            if (client.readyState == 4 && client.status == 200) 
            {
                $("div.upload_loading").remove();
                show_thumb(client.responseText);
            }
       }
   return false; 
}

function preview(img, selection) {
    var curimg_width = $("#thumbnail")[0].width?$("#thumbnail")[0].width:0;
    var curimg_height = $("#thumbnail")[0].height?$("#thumbnail")[0].height:0;
	var scaleX = 200 / selection.width; 
	var scaleY = 200 / selection.height;
	$('#crop').css({ 
		width: Math.round(scaleX * curimg_width) + 'px', 
		height: Math.round(scaleY * curimg_height) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	$('#x1').val(selection.x1);
	$('#y1').val(selection.y1);
	$('#x2').val(selection.x2);
	$('#y2').val(selection.y2);
	$('#w').val(selection.width);
	$('#h').val(selection.height);
} 

function default_thumb() {
	$('#x1').val('0');
	$('#y1').val('0');
	$('#x2').val('270');
	$('#y2').val('270');
	$('#w').val('270');
	$('#h').val('270');
}

function show_thumb(text)
{
    var c = '<div style="margin-bottom:20px;"><p style="color: #0088cc;font-size: 14px;padding: 10px;">Click và chọn khung hình trái để chỉnh sửa ảnh.</p><div style="margin-right:10px; border: 1px solid rgb(212, 212, 212); padding: 10px; float:left;">';
    c += '<img src="" style="max-width:500px;max-height:500px" id="thumbnail" alt="Create Thumbnail" />';
    c += '</div><div style="mix-height: 500px; float:right; padding: 10px; border: 1px solid rgb(212, 212, 212); width: 200px;"><div style="position:relative; overflow:hidden;width:200px;height:200px; margin-bottom:20px;"><img src="" id="crop" style="position: relative;" alt="Thumbnail Preview" /></div>';
    c += '<input type="checkbox" checked="" id="type_img" name="type_img" style="float: left;"><b style="float: left; color:#dd4400;">&nbsp;Chọn làm đại diện</b></div><div style="clear:both;"></div></div>';
    c += '<div style="margin-top:30px;border-top:1px solid #d4d4d4; padding-top:10px;"><button class="b_upload" onclick="deleteimg();">Xóa ảnh</button><button onclick="save_img();" class="b_upload">Lưu ảnh</button></div>';
    $("#box_upload").html(c);
    var upload = (JSON.parse(text));
    if(upload.error == '')
    {
        $("#thumbnail").attr('src',upload.src);
        $("#crop").attr('src',upload.src);
        $('#large_image_location').val(upload.src_delete);
        $('#resize_image_location').val(upload.src_resize);
        $('#thumb_image_location').val(upload.thumb_delete);
        default_thumb();
        $('#thumbnail').imgAreaSelect({ aspectRatio: '1:1', onSelectChange: preview }); 
        var dis = upload.dis-10;
        var width = upload.width;var height = upload.height;
        $('.imgareaselect-border2, .imgareaselect-border1, .imgareaselect-selection').css('height',dis);$('.imgareaselect-border2, .imgareaselect-border1, .imgareaselect-selection').css('width',dis);$('.imgareaselect-border2, .imgareaselect-border1, .imgareaselect-selection').css('display','block');
    }
    else
    {
        alert('Có lỗi xảy ra!');
    }
}

function edit_album(id, e)
{
    var txt = $(e).attr('rel');
    show();
    show_thumb(txt);
    var upload = (JSON.parse(txt));
}

function show_album(src)
{
    var d = '';
    d += '<div id="box_upload"><div style="margin-bottom:20px;"><img src="'+src+'" ></div></div>';
    var c = '<div id="background" style="background: none repeat scroll 0 0 #000;height: 100%;opacity: 0.4;position: absolute;z-index:9;top: 0;width: 100%;" id="Dmid" onclick="cDialogimg();"></div>';
    c += '<div id="Dtop" style="top:300px;position: absolute;width: 100%;z-index: 10;text-align:center;"><div class="dbody"><div style="background: url(/public/img/tabbar.jpg) repeat scroll 0 0 rgba(0, 0, 0, 0);height: 30px;" class="dhead" >';
    c += '<span id="close" title="Close" style="background: url(/public/img/close2.png) no-repeat scroll 0 4px rgba(0, 0, 0, 0);float: right;padding: 10px 8px 0 0;cursor: pointer;" onclick="cDialogimg();">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;</div><div class="dbox">'+d+'<div style="clear:both;"></div></div></div></div>';
	$('body').append(c);
    $("#background").css('height',$(document).height()+$("#Dtop").height());
}

function save_img()
{
    var x1 = $('#x1').val();
	var y1 = $('#y1').val();
	var x2 = $('#x2').val();
	var y2 = $('#y2').val();
	var w = $('#w').val();
	var h = $('#h').val();
    var type_img = $("input#type_img").is(':checked') ? 1 : 0;
	if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
		alert("Bạn chưa chọn khung ảnh");
		return false;
	}
    else
    {
        var data = {upload_thumbnail:'upload_thumbnail', 
                src_resize:$('#resize_image_location').val(), 
                src_source:$('#large_image_location').val(), 
                src_thumb:$('#thumb_image_location').val(),
                type_img:type_img,
                x1:x1,
                x2:x2,
                y1:y1,
                y2:y2,
                w:w,
                h:h
            };
        var url = BASE_URL+'love/upload';
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success:function( msg ){
                var upload = (JSON.parse(msg));
                if(upload['error'] == '0')
                {
                    alert('Đã lưu ảnh.');
                    window.location.href = document.URL;
                }
            }
        });
    }
}

function show()
{
    var d = '';
    d += '<div id="box_upload"><div style="margin-bottom:20px;"><table width=100% style="border: 1px solid #dedede;"><tbody><tr> <td class="alignRight pad5 textMid">Chọn ảnh từ máy</td><td class="alignLeft pad5">';
    d += '<div style="" class="choise_image"><form id="photo" name="photo" enctype="multipart/form-data"><input onchange="selected_file();" type="file" id="image_upload" name="image" ></form></div></td></tr>';
    d += '<tr><td class="alignRight pad5">Yêu cầu upload</td><td class="alignLeft pad5"><span>Định dạng png, jpg,</span><br/><span>Dung lượng < 5MB</span></td></tr></tbody></table></div>';
    d += '<button onclick="upload();" class="b_upload">Upload</button><button onclick="cDialogimg();" class="b_upload">Cancel</button></div>';
    var c = '<script type="text/javascript" src="'+BASE_URL+'skin/default/js/jquery-pack.js"></script><script type="text/javascript" src="'+BASE_URL+'skin/default/js/jquery.imgareaselect.min.js"></script><div id="background" style="background: none repeat scroll 0 0 #000;height: 100%;opacity: 0.4;position: absolute;z-index:9;top: 0;width: 100%;" id="Dmid" onclick="cDialogimg();"></div>';
    c += '<div id="Dtop" style="top:300px;position: absolute;width: 100%;z-index: 10;text-align:center;"><div class="dbody"><div style="background: url(/public/img/tabbar.jpg) repeat scroll 0 0 rgba(0, 0, 0, 0);height: 30px;" class="dhead" >';
    c += '<span id="close" title="Close" style="background: url(/public/img/close2.png) no-repeat scroll 0 4px rgba(0, 0, 0, 0);float: right;padding: 10px 8px 0 0;cursor: pointer;" onclick="cDialogimg();">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Đăng ảnh đại diện để tham gia kết bạn</div><div class="dbox">'+d+'<div style="clear:both;"></div></div></div></div>';
	$('body').append(c);
    $("#background").css('height',$(document).height()+$("#Dtop").height());
}


function deleteimg()
{
    var data = {a:'delete', src_resize:$('#resize_image_location').val(), src_source:$('#large_image_location').val(), src_thumb:$('#thumb_image_location').val()};
    var url = BASE_URL+'love/upload';
    $("#box_upload").html('<img  style="margin-top:150px;" src="/public/img/loading.gif" />');
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success:function( msg ){
            alert("Xóa thành công.");
            cDialogimg();
            show();
        }
    })
    ;
}

function selected_file()
{
    $(".choise_image #image_upload").css('opacity',1);
    $(".choise_image").css('background','#FFF');
}

function cDialogimg()
{
    $("#Dmid").remove();
    $("#Dtop").remove();
    $("#background").remove();
    $(".imgareaselect-outer").remove();
    $(".imgareaselect-selection").remove();
    $(".imgareaselect-border1").remove();
    $(".imgareaselect-border2, .imgareaselect-border1, imgareaselect-selection").remove();
}

function search_partner(param, i)
{
    var cpage;
    var sex = $("#sex").val();
    var city = $("#city1").val();
    var fage = $("#fagehd").val();
    var tage = $("#tagehd").val();
    var url = BASE_URL+'love/search?sex='+sex+'&city='+city+'&cpage=1&fage='+fage+'&tage='+tage;
    if(param == 'sex' || param == 'city')
    {
        url = removeParam(param, url);
        if(url.indexOf('?')==-1)
        {
            url += '?'+param+'='+i;
        }
        else
        {
            url += '&'+param+'='+i;
        }
        setCookie(param, i, 1);
        $("#"+param).val(i);
        if($("#sex").val() == '1')
        $("span.gioitinh_select").html('Nam');
        if($("#sex").val() == '2')
        $("span.gioitinh_select").html('Nữ');
        if($("#sex").val() == '-1')
        $("span.gioitinh_select").html('Không xác định');
    }
    
    if(param == 'age')
    {
        if($("#fage").val()!='' && $("#tage").val()!='')
        {
            url = removeParam('fage', url);
            url = removeParam('tage', url);
            if(url.indexOf('?')==-1)
            {
                url += '?fage='+$("#fage").val()+'&tage='+$("#tage").val();
            }
            else
            {
                url += '&fage='+$("#fage").val()+'&tage='+$("#tage").val();
            }
            setCookie('fage', $("#fage").val(), 1);
            setCookie('tage', $("#tage").val(), 1);
            $("#fagehd").val($("#fage").val());
            $("#tagehd").val($("#tage").val());
        }
        else
        {
            alert ('Hãy chọn đủ thông tin.');
        }
    }
    if(param == 'cpage')
    {
        url = removeParam(param, url);
        var page = $("#load_next_page").attr('rel');
        page = page.split('_');
        if(parseInt(page[0]) > parseInt(page[1]))
        {
            cpage = parseInt(page[1]) + 1;
            $("#load_next_page").show();
            $("#load_next_page").attr('rel', page[0]+'_'+cpage);
        }
        else
        {
            cpage = -1;
            $("#load_next_page").hide();
            $("#load_next_page").attr('rel', page[0]+'_'+page[1]);
        }
        if(url.indexOf('?')==-1)
        {
            url += '?'+param+'='+(parseInt(page[1]) + 1);
        }
        else
        {
            url += '&'+param+'='+(parseInt(page[1]) + 1);
        }
        setCookie(param, (parseInt(page[1]) + 1), 1);
    }
    if(param == 'cpage' && cpage != -1){
        $("div#load_page").remove();
        $("#load_partner").load(url+ " #box_search",'',function(){
            $("#append_partner").append($("#load_partner").html());
            var page = $("div#load_page").attr('rel');
            page = page.split('_');
            if(parseInt(page[0]) > parseInt(page[1]))
            {
                $("#load_next_page").attr('rel', page[0]+'_'+(parseInt(page[1])));
                $("#load_next_page").show();
            }
            else
            {
                $("#load_next_page").attr('rel', page[0]+'_'+page[1]);
                $("#load_next_page").hide();
            }
        });
        return false;
    }
    if(param != 'cpage')
    {
        $("#append_partner").load(url+ " #box_search");
        return false;
    }
    /*$.ajax({
        type: 'GET',
        url: url,
        success:function( msg ){
            console.log(msg);
        }
    });*/
}

function removeParam(key, sourceURL) {
    var rtn = sourceURL.split("?")[0],
        param,
        params_arr = [],
        queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
    if (queryString !== "") {
        params_arr = queryString.split("&");
        for (var i = params_arr.length - 1; i >= 0; i -= 1) {
            param = params_arr[i].split("=")[0];
            if (param === key) {
                params_arr.splice(i, 1);
            }
        }
        rtn = rtn + "?" + params_arr.join("&");
    }
    return rtn;
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return '';
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toGMTString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function addtop()
{
    var url = BASE_URL+'love/gotop';
    $.ajax({
        type: 'GET',
        url: url,
        success:function( msg ){
            alert(msg);
        }
    });
}

function load_user_chat(cpage, id_you, img_you, img_me, cpage_u, id_max, type)
{
    //var id_max = $("div.content_chat").attr('rel');
    var id_max = $("input#idmax").val();
    var data = {cpage:cpage, id_you:id_you, img_you:img_you, cpage_u:cpage_u, id_max:id_max, type:type};
    var url = BASE_URL + 'love/menu_right';
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success:function( msg ){
            $("#loadingchat").remove();
            if(msg!='')
            {
                var result = JSON.parse(msg);
                if(result['lstu'] != '')
                {
                    if(cpage)
                    {
                        $("#load_right_chat").append(result['lstu']);
                    }
                    else
                    {$("#load_right_chat").html(result['lstu']);}
                }
                if(result['lstchat'] != '')
                {
                    if(cpage_u){$("div#show_history").after(result['lstchat']);}
                    else{$("div.content_chat").append(result['lstchat']);
                    $('div.content_chat').animate({"scrollTop": $('div.content_chat')[0].scrollHeight});}
                    $("textarea#text_chat").select();
                }
                if(result['id_max'] != '')
                {
                    if(cpage_u){}
                    else{
                            //$("div.content_chat").attr('rel', result['id_max']);
                            $("input#idmax").val(result['id_max']);
                        }
                }
            }
            //timer = setInterval(function(){load_user_chat(cpage, id_you, img_you, img_me, cpage_u, id_max, '')},3000);
            }
        });
}


function join_chat()
{
    var strURL = BASE_URL + 'love/edit';
    $.ajax({
        type: 'POST',
        url: strURL,
        data: {edit:'1'},
        success:function( msg ){
            if(msg=='2')
            window.location = BASE_URL + 'user/login';
            else
            window.location = BASE_URL + 'love/partner';
            //else
            //window.location = BASE_URL + 'user/login';
        }
    });
}
function join_net_chat()
{
    var strURL = BASE_URL + 'love';
    window.location = strURL;
}

function send_msg(id)
{
    clearInterval(timer);
    $("div.box_chat").show();
    var src = $("div.box_avata img").attr('src');
    var name = $("div.box_profile h1").html();
    var address = $("span#address_icon").html();
    var target = $("div.box_profile h5").html();
    var c = '<a href="'+BASE_URL+'love/partner/partner_i'+id+'"><img style="vertical-align: middle; margin-right: 10px; max-height: 80px; max-width: 80px;" src="'+src+'"></a>';
    c += '<div><a href="'+BASE_URL+'love/partner/partner_i'+id+'"><h2>'+name+'</h2></a><h4>'+address+'<br />'+target+'</h4></div>';
    $("textarea#text_chat").attr('rel',id);
    //$("button#sendtxtchat").attr('onclick','sendchatmsg('+id+')');
    $("div#show_history i").attr('onclick','showhistory('+id+', \''+src+'\')');
    load_user_chat('', id, src, '', '', '', '');
    $("div.title_box_chat").html(c);
}

function sendchatmsg()
{
    id = $("textarea#text_chat").attr('rel');
    if(id&&id!=0)
    {
        clearInterval(timer);
        var src = $("div.title_box_chat img").attr('src');
        var data = {id_you:id, text:$("textarea#text_chat").val()};
        if($("textarea#text_chat").val() != '' && $("textarea#text_chat").val().trim() != '')
        {
            $("textarea#text_chat").val('');
            var strURL = BASE_URL + 'love/sendchat';
            var c = '<div id="loadingchat" style="position: absolute; background: none repeat scroll 0% 0% rgb(0, 0, 0); left: 0px; top: 100px; height: 328px; width: 420px; opacity: 0.3; text-align: center;"><img src="/public/img/loading.gif" style="margin-top: 140px;"></div>';
            $('div.box_chat').append(c);
            $.ajax({
                type: 'POST',
                url: strURL,
                data: data,
                success:function( msg ){
                    if(msg != '')
                    {
                        load_user_chat('', id, src, '', '', msg, 1);
                        timer = setInterval(function(){load_user_chat('', id, src, '', '', msg, 1)},8000);
                    }
                }
            });
        }
        else
        {
            alert("Hãy nhập trò chuyện");
        }
    }
    else
    {alert("Có lỗi xảy ra.");}
}

function select_chat(e)
{
    var content = '<input hidden="" id="idmax" />';
    content += '<div id="show_history" style="text-align: center; color: #52b54d; background: none repeat scroll 0 0 #e7e7e7; padding:5px;">';
    content += '<i rel="2" onclick="showhistory(0,\'\');" style="cursor:pointer;">Xem lịch sử trò chuyện</i></div>';
    $("div.content_chat").html(content);
    clearInterval(timer);
    var c = '<div id="loadingchat" style="position: absolute; background: none repeat scroll 0% 0% rgb(0, 0, 0); left: 0px; top: 100px; height: 328px; width: 420px; opacity: 0.3; text-align: center;"><img src="/public/img/loading.gif" style="margin-top: 140px;"></div>';
    //$('div.box_chat').html('');
    $('div.box_chat').append(c);
    var id_you = $(e).attr('rel');
    var img_you = $('#menu_right_img_'+id_you).attr('src');//.attr('src');
    var name = $('#menu_right_li_'+id_you+' span').html();
    var city = $('#menu_right_li_'+id_you+' #city').val();
    var target = $('#menu_right_li_'+id_you+' #target').val();
    var c = '<a href="'+BASE_URL+'love/partner/partner_i'+id_you+'"><img style="vertical-align: middle; margin-right: 10px; max-height: 80px; max-width: 80px;" src="'+img_you+'"></a>';
    c += '<div><a href="'+BASE_URL+'love/partner/partner_i'+id_you+'"><h2>'+name+'</h2></a><h4>Sống tại '+city+'<br />'+target+'</h4></div>';
    $("div.title_box_chat").html(c);
    $("div.box_chat").show();
    $("textarea#text_chat").attr('rel',id_you);
    //$("button#sendtxtchat").attr('onclick','sendchatmsg('+id_you+')');
    $("div#show_history i").attr('onclick','showhistory('+id_you+', \''+img_you+'\')');
    load_user_chat('',id_you,img_you,'','',0, 1);
    timer = setInterval(function(){load_user_chat('',id_you,img_you,'','',0, 1)},8000);
}

function hidechat()
{
    var content = '<input hidden="" id="idmax" />';
    content += '<div id="show_history" style="text-align: center; color: #52b54d; background: none repeat scroll 0 0 #e7e7e7; padding:5px;">';
    content += '<i rel="2" onclick="showhistory(0,\'\');" style="cursor:pointer;">Xem lịch sử trò chuyện</i></div>';
    $("div.content_chat").html(content);
    clearInterval(timer);
    $("div.box_chat").hide();
    timer = setInterval(function(){load_user_chat('', '', '', '', '', '', 1)},8000);
}

function showhistory(id, src)
{
    var cpage = $("div#show_history i").attr('rel');
    load_user_chat('',id,src,'',cpage,0, 1);
    $("div#show_history i").attr('rel', parseInt(cpage)+1);
}

function showuser_chat()
{
    var cpage = $("div#show_user_chat i").attr('rel');
    load_user_chat(cpage,'','','','',0, 1);
    $("div#show_user_chat i").attr('rel', parseInt(cpage)+1);
}

function show_action_join(type)
{
    strURL = BASE_URL+'love/action_join';
    $.ajax({
        type: 'POST',
        url: strURL,
        data: {type:type},
        success:function( msg ){
            if(msg=='3')
            {
                window.location = BASE_URL+'love/partner';
            }
            if(msg == '1')
            {
                
            }
            if(msg == '2')
            {
            }
        }
    });
    if(type != '3')
    {
        show_action_user(type);
    }
}

function show_action_user(type)
{
    var d = '';
    d += '<div id="box_upload"><div id = "load_user_action" style="margin-bottom:20px;"></div>';
    d += '<button onclick="cDialogimg();" class="b_upload">Đóng</button></div>';
    var c = '<div id="background" style="background: none repeat scroll 0 0 #000;height: 100%;opacity: 0.4;position: absolute;z-index:9;top: 0;width: 100%;" id="Dmid" onclick="cDialogimg();"></div>';
    c += '<div id="Dtop" style="top:300px;position: absolute;width: 100%;z-index: 10;text-align:center;"><div class="dbody"><div class="dbox">'+d+'<div style="clear:both;"></div></div></div></div>';
	$('body').append(c);
    $("#background").css('height',$(document).height()+$("#Dtop").height());
}

function likeyou(idyou, type, e)
{
    strURL = BASE_URL+'love/action_join';
    $.ajax({
        type: 'POST',
        url: strURL,
        data: {type:type, idyou:idyou},
        success:function( msg ){
            if(type=='1')
            {
                $(e).html('Bỏ thích');
            }
            else
            {
                $(e).html('Thích');
            }
        }
    });
}

function sendqua(idyou)
{
    var d = '';
    d += '<div id="box_upload"><div style="margin-bottom:20px;"><table width=100% style="border: 1px solid #dedede;"><tbody>';
    for(var i=1; i<40; ++i)
    {
        if(i%2==0)
        {
            var j = i+1;
            d += '<tr> <td class="alignCenter pad5 textMid select_qua poiter"><img class="select_qua" src="'+BASE_URL+'skin/default/img/gift/'+i+'.png" ></td><td class="alignCenter pad5  poiter"><img class="select_qua" src="'+BASE_URL+'/public/img/gift/'+j+'.png" ></td></tr>';
        
        }
        
    }
    d += '</tbody></table></div>';
    d += '<button id="sendqua" onclick="select_qua('+idyou+');" class="b_upload">Chọn</button><button onclick="cDialogimg();" class="b_upload">Đóng</button></div>';
    var c = '<script type="text/javascript" src="'+BASE_URL+'skin/default/js/jquery-pack.js"></script><script type="text/javascript" src="'+BASE_URL+'skin/default/js/jquery.imgareaselect.min.js"></script><div id="background" style="background: none repeat scroll 0 0 #000;height: 100%;opacity: 0.4;position: absolute;z-index:9;top: 0;width: 100%;" id="Dmid" onclick="cDialogimg();"></div>';
    c += '<div id="Dtop" style="top:300px;position: absolute;width: 100%;z-index: 10;text-align:center;"><div class="dbody"><div style="background: url(/public/img/tabbar.jpg) repeat scroll 0 0 rgba(0, 0, 0, 0);height: 30px;" class="dhead" >';
    c += '<span id="close" title="Close" style="background: url(/public/img/close2.png) no-repeat scroll 0 4px rgba(0, 0, 0, 0);float: right;padding: 10px 8px 0 0;cursor: pointer;" onclick="cDialogimg();">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Chọn một món quà</div><div class="dbox">'+d+'<div style="clear:both;"></div></div></div></div>';
	$('body').append(c);
    $("#background").css('height',$(document).height()+$("#Dtop").height());
    
    $("img.select_qua").click(function(){
        $("img.select_qua").css('border','none');
        $(this).css('border','1px solid #ff0047');
        $("button#sendqua").attr('rel',$(this).attr('src')); 
    });
}

function select_qua(idyou)
{
    var href = document.URL;
    var strURL = BASE_URL+'love/action_join';
    var url = $("button#sendqua").attr('rel');
    $.ajax({
        type: 'POST',
        url: strURL,
        data: {url:url, idyou:idyou},
        success:function( msg ){
            alert('Quà của bạn đã được gửi.');
            window.location = href;
        }
    });
}

function redirect()
{
    var lang = $("#select_lang").val();
    var href = document.URL;
    window.location = BASE_URL+'index/select_lang?l='+lang+'&url='+href;
}