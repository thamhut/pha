<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta name="title" content="<?php if ((isset($meta_title)) && $meta_title != '') { ?> <?php echo $meta_title; ?> <?php } else { ?> <?php echo 'chotam.info - News classifieds, sale, real estate, daily searches, Real Estate, Rental housing, Fashion cosmetics, Vehicle.'; ?> <?php } ?>" />
    <meta name="keywords" content="<?php if ((isset($meta_title)) && $meta_title != '') { ?> <?php echo $meta_title; ?> <?php } else { ?> <?php echo 'chotam.info - News classifieds, sale, real estate, daily searches, Real Estate, Rental housing, Fashion cosmetics, Vehicle.'; ?> <?php } ?>" />
    <meta name="description" content="<?php echo (((isset($meta_content)) && $meta_content != '') ? $meta_content : 'News classifieds, sale, real estate, daily searches, Real Estate, Rental housing, Fashion cosmetics, Vehicle.'); ?>" />
    <meta property="og:title" content="<?php echo (isset($meta_title)&&$meta_title!='')?$meta_title:'News classifieds, sale, real estate, daily searches, Real Estate, Rental housing, Fashion cosmetics, Vehicle.';?>"/>
    <meta property="og:description" content="<?php echo (isset($meta_content)&&$meta_content!='')?$meta_content:'News classifieds, sale, real estate, daily searches, Real Estate, Rental housing, Fashion cosmetics, Vehicle....';?>"/>
    <meta property="og:type" content="website" />
    <meta name="copyright" content="chotam.info" />
    <meta name="author" content="chotam.info" />
    <meta name="abstract" content="Website for news classifieds, sale, real estate, daily searches, Real Estate, Rental housing, Fashion cosmetics, Vehicle" />
    <meta name="GENERATOR" content="ChoTam"/> 
    <?php echo $this->tag->getTitle(); ?>
    <?php echo $this->assets->outputCss(); ?>
    <?php echo $this->assets->outputJs(); ?>
</head>