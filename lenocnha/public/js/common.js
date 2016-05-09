var BASE_URL = 'http://'+location.host+'/';
var timer='';
$(function(){
    $('.ui-shadow').removeClass('ui-shadow');
    $(".ui-overlay-shadow").removeClass('ui-overlay-shadow');
    $(".ui-shadow-inset").removeClass('ui-shadow-inset');
    show_right_box(1,null,'video');
});
function abc(e)
{
    var id=0;
    var arrType = ["image/gif", "image/jpeg", "image/jpg", "image/png"];
    var file = document.getElementById(e.id);
    console.log(file.files);
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


function sendemail()
{
    var emailgui = 'thamhut@gmail.com';
    var faqsend = $("#mail_message").val().trim();
    
    $.ajax({
        type: "POST",
        url: BASE_URL+"index/sendmail",
        data: { email_send: emailgui, mess_send: faqsend },
        success:function( msg ) {
            alert( msg );
        }
    });
    return false;
}


function mymousemove(e)
{
    $(e).css('background','#EAF6FF');
}

function mymouseout(e)
{
    $(e).css('background','#FFFFFF');
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
    var c = '<script type="text/javascript" src="'+BASE_URL+'public/js/jquery-pack.js"></script><script type="text/javascript" src="'+BASE_URL+'public/js/jquery.imgareaselect.min.js"></script><div id="background" style="background: none repeat scroll 0 0 #000;height: 100%;opacity: 0.4;position: absolute;z-index:9;top: 0;width: 100%;" id="Dmid" onclick="cDialogimg();"></div>';
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
    });
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




function popitup(url) {
	newwindow=window.open(url,'name','height=300,width=450');
	if (window.focus) {newwindow.focus()}
	return false;
}

function register()
{
    if($("#fullname").val() == '')
    {
        alert('Bạn chưa nhập Tên.');
        return false;
    }
    if($("#username").val() == '')
    {
        alert('Bạn chưa nhập username.');
        return false;
    }
    if($("#password").val() == '')
    {
        alert('Bạn chưa nhập mật khẩu.');
        return false;
    }
    if($("#repassword").val() == '')
    {
        alert('Bạn chưa nhập lại mật khẩu.');
        return false;
    }
    if($("#email").val() == '')
    {
        alert('Bạn chưa nhập email.');
        return false;
    }
    if($("#code").val() == '')
    {
        alert('Bạn chưa nhập mã xác nhận.');
        return false;
    }
    document.getElementById("frmRegister").submit();
}

function login()
{
    document.getElementById("frmLogin").submit();
}

function postarticle()
{
    if($("#title").val() == '')
    {
        alert('Bạn chưa nhập tiêu đề.');
        return false;
    }
    if($("#link").val() == '')
    {
        alert('Bạn chưa nhập đường dẫn.');
        return false;
    }
    if($("#category").val() == '')
    {
        alert('Bạn chưa chọn danh mục.');
        return false;
    }
    
    if($("#code").val() == '')
    {
        alert('Bạn chưa nhập mã xác nhận.');
        return false;
    }
    document.getElementById("postarticle").submit();
}

function hideshow_content(){
    var rel = $("#action_content").attr('rel');
    if(rel == '1')
    {
        $("#action_content").attr('rel','2');
        $("#box_content").css('height','auto');
        $("#action_content").html('<img src="/public/img/triangle_top.png" /> Thu gọn');
    }
    else
    {
        $("#action_content").attr('rel','1');
        $("#box_content").css('height','100');
        $("#action_content").html('<img src="/public/img/triangle_bottom.png" /> Xem thêm');
    }
}

function fillter(type, url)
{
    window.location = BASE_URL+url+'?'+type+'=1';
}

function show_right_box(num, e, type)
{
    $(".div_top_music_box ul li").removeClass('current');
    $(e).addClass('current');
    $(".box_item_right_menu").hide();
    $('div#'+num+'_box_right').show();
    $('div#'+num+'_box_right').html('<img src="/public/img/loading.gif" style="width: 100px;margin-left: 55px;">');
    var url = '';
    var data = null;
    if(type == 'hot'){
        url = BASE_URL+"ajax/hotdesktop";
    }
    else{
        url = BASE_URL+"ajax/topdesktop";
        if(type == 'video')
            data = {show:1, video:1};
        if(type == 'music')
            data = {show:1, music:1};
    }

    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success:function( msg ){
            $('div#'+num+'_box_right').html(msg);
            $("a#showhot1").css('text-decoration','underline');
            $("a#showvideo1").css('text-decoration','underline');
        }
    });
}

function show_hot(num, e)
{
    $(".fillter_date a").css('text-decoration','none');
    $(e).css('text-decoration','underline');
    $(".box_item_right_menu").hide();
    $(".hot_box").hide();
    url = BASE_URL+"ajax/topdesktop";
    data = {show:num, music:1};
    $('div#3_box_right').show();
    $('div#3_box_right').html('<img src="/public/img/loading.gif" style="width: 100px;margin-left: 55px;">');
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success:function( msg ){
            $('div#3_box_right').html(msg);
            $('div#'+num+'_hot_box').show();
            $("a#showhot"+num).css('text-decoration','underline');
        }
    });
}

function change_img()
{
    $("#add_avata").html('<input id="file" type="file" name="avata[]" placeholder="chọn đường dẫn" />');
}

function action_music(type, value, id)
{
    var data = {type:type, value:value, id:id};
    var url = BASE_URL+'index/action';
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success:function( msg ){
            if(msg == '0')
            {
                alert('Bạn đã thao tác!');
            }else if(msg == '-1')
            {
                alert('Bạn cần đăng nhập!');
            }
            else if(msg == '-2')
            {
                alert('Có lỗi xảy ra!');
            }
            else if(msg == '10')
            {
            }
            else{
                alert('Thanks you!');
            }
        }
    });
}

function showchoose(id)
{
    for(var i = 1; i<=id; ++i)
    {
        if(i % 2 == 1)
        {
            $("#_"+i).attr('src','/public/img/left_star_fight.png');
        }
        if(i % 2 == 0)
        {
            $("#_"+i).attr('src','/public/img/right_star_fight.png');
        }
    }
}

function hidechoose(id)
{
    for(var i = 1; i<=id; ++i)
    {
        if(i % 2 == 1)
        {
            $("#_"+i).attr('src','/public/img/left_star_dark.png');
        }
        if(i % 2 == 0)
        {
            $("#_"+i).attr('src','/public/img/right_star_dark.png');
        }
    }
}

function choose_point(i, id)
{
    var data = {type:'choose_point', value:i, id:id};
    var url = BASE_URL+'index/action';
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success:function( msg ){
            if(msg == '0')
            {
                alert('Bạn đã thao tác!');
            }
            else if(msg == '-2')
            {
                alert('Có lỗi xảy ra!');
            }
            else if(msg == '10')
            {
            }
            else{
                alert('Thanks you!');
            }
        }
    });
}

function show_video(i, e)
{
    $(".fillter_date a").css('text-decoration','none');
    $(e).css('text-decoration','underline');
    $(".video_box").hide();
    $(".box_item_right_menu").hide();
    url = BASE_URL+"ajax/topdesktop";
    data = {show:i, video:1};
    $('div#1_box_right').show();
    $('div#1_box_right').html('<img src="/public/img/loading.gif" style="width: 100px;margin-left: 55px;">');
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success:function( msg ){
            $('div#1_box_right').html(msg);
            $('div#'+i+'_video_box').show();
            $("a#showvideo"+i).css('text-decoration','underline');
        }
    });
}

function action_user()
{
    if($("#action_user").val()=='1')
    {
        document.getElementById("frmAction").submit();
    }
}

function _active()
{
    return confirm('Bạn có chắc chắn thực hiện thao tác này?');
}

function insert_nhacsan()
{
    var nhacdj = $("#text_nhacdj").val();
    var nhacdj_cate = $("#nhacdj_cate").val();
    var text_matxac = $("#text_matxac").val();
    var matxac_cate = $("#matxac_cate").val();
    var url = 'http://lenocnha.com/runlink/insert.php';
    if(nhacdj!='')
    {
        $.ajax({
            type: 'GET',
            url: url,
            data: {url:nhacdj, cate:nhacdj_cate},
            success:function( msg ){
                $("#text_nhacdj").val('');
                $("#nhacdj_cate").val('');
                $("#text_matxac").val('');
                $("#matxac_cate").val('');
            }
        });
    }
    
    if(text_matxac!='')
    {
        $.ajax({
            type: 'GET',
            url: url,
            data: {url:text_matxac, cate:matxac_cate},
            success:function( msg ){
                $("#text_nhacdj").val('');
                $("#nhacdj_cate").val('');
                $("#text_matxac").val('');
                $("#matxac_cate").val('');
            }
        });
    }
}

function hide_support()
{
    $.cookie('support', '1', { expires: 1});
    $('#div_banner_support').animate({bottom:'-130px'});
    $("#banner_support").attr('onclick','show_support();');
}

function show_support()
{
    $.cookie('support', '0', { expires: 1});
    $('#div_banner_support').animate({bottom:'0px'});
    $("#banner_support").attr('onclick','hide_support();');
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