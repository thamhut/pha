<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta name="title" content="{% if (meta_title is defined ) and meta_title != '' %} {{ meta_title }} {% else %} {{ 'chotam.info - Tổng hợp các tin tức rao vặt, mua bán, bất động sản, kết bạn bốn phương, kết bạn online, tìm kiếm hàng ngày.' }} {% endif %}" />
    <meta name="keywords" content="{% if (meta_title is defined ) and meta_title != '' %} {{meta_title }} {% else %} {{ 'chotam.info - Tổng hợp, tin tức, rao vặt, mua bán, bất động sản, kết bạn bốn phương, kết bạn online, tìm kiếm.' }} {% endif %}" />
    <meta name="description" content="{{ ((meta_content is defined) and meta_content!='') ? meta_content:'Toàn bộ thông tin về rao bán, kết bạn bốn phương, kết bạn online, rao vặt cho thuê hàng hóa nhà cửa, bất động sản, nhà cửa đều được tổng hợp trên trang web.' }}" />
    <meta property="og:title" content="<?php echo (isset($meta_title)&&$meta_title!='')?$meta_title:'Rao vặt miễn phí, Mua bán online, kết bạn bốn phương, kết bạn online, Bất động sản, Thuê nhà đất, Thời trang mỹ phẩm Phương tiện đi lại';?>"/>
    <meta property="og:description" content="<?php echo (isset($meta_content)&&$meta_content!='')?$meta_content:'Rao vặt miễn phí, Mua bán online, kết bạn bốn phương, kết bạn online, Bất động sản, Thuê nhà đất. Tìm việc làm, Mua bán xe ô tô xe máy cũ mới, Mua bán tổng hợp máy tính laptop điện thoại, Thời trang mỹ phẩm quần áo giày dép, mua bán sim thẻ số đẹp rẻ...';?>"/>
    <meta property="og:type" content="website" />
    <meta name="copyright" content="chotam.info" />
    <meta name="author" content="chotam.info" />
    <meta name="abstract" content="Website rao vặt, kết bạn bốn phương, kết bạn online, mua bán, bất động sản số 1 Việt Nam" />
    <meta name="GENERATOR" content="ChoTam"/> 
    {{ tag.getTitle() }}
    {{ assets.outputCss() }}
    {{ assets.outputJs() }}
</head>