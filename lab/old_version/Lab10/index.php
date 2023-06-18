<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link type="text/css" rel="stylesheet" href="/Mobile_Store/Content/Styles/reset.css"/>
    <link type="text/css" rel="stylesheet" href="/Mobile_Store/Content/Styles/styles.css"/>
    <link href="/Mobile_Store/Content/Styles/jquery.multiSelect.css" rel="stylesheet" type="text/css"/>
    <link href="/Mobile_Store/Content/Styles/slider.css" rel="stylesheet" type="text/css"/>
    <link href="/Mobile_Store/Content/Styles/vMenu.css" rel="stylesheet" type="text/css"/>
    <script src="/Mobile_Store/Content/Scripts/jquery-1.6.1.min.js" type="text/javascript"></script>
    <script src="/Mobile_Store/Content/Scripts/jquery-ui-1.8.12.custom.min.js" type="text/javascript"></script>
    <link href="/Mobile_Store/Content/Styles/jquery-ui-1.8.5.custom-black-gray.css" rel="stylesheet" type="text/css"
          media="screen"/>
    <script src="/Mobile_Store/Content/Scripts/jquery.multiselect.js" type="text/javascript"></script>
    <script src="/Mobile_Store/Content/Scripts/WebScript.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/Mobile_Store/Content/Styles/jquery-ui.css"/>
    <title>Mobile Store</title>
    <!-- Script for slider -->
    <script type="text/javascript">
        $(function () {
            $('#slides').slides({
                preload: true,
                preloadImage: 'Content/Images/slider0/loading.gif',
                play: 5000,
                pause: 2500,
                hoverPause: true,
                effect: 'slide, fade'
            });
        });
    </script>
    <link href="Content/Styles/silder0.css" rel="stylesheet" type="text/css"/>
    <script src="Content/Scripts/slides.min.jquery.js" type="text/javascript"></script>
    <!-- Script for slider -->
</head>
<body>
<div style="display:none">
    <div id="dialog-form"></div>
</div>
<div id="wrapper">
    <script>
        $(function () {
            var fullKeyword = [
                "Apple iPhone 5S",
                "iPhone 3GS 8GB",
                "The new iPad 3G",
                "iPad Mini 16 GB",
                "iPhone 4S 32 GB",
                "iPad 4 3G Wifi",
                "Galaxy Note N7000",
                "Galaxy S3 - I9300",
                "Galaxy Note 8.0",
                "Nokia Lumia 720",
                "Nokia Lumia 920",
                "Nokia 109",
                "Nokia Lumia 820",
                "HTC One - FPT",
                "HTC One X Plus",
                "Nokia Lumia 620 ",
                "Sony Xperia ZL - Full HD ",
                "Galaxy S4 I9500",
                "Xperia Acro S",
                "Lenovo S880",
                "Google Nexus 4 - 8GB",
                "Optimus G - E975",
                "Optimus 4X HD - P880",
                "HTC Butterfly - FPT",
                "Galaxy Grand Duos - I9082",
                "Galaxy Tab 2 7.0",
                "Nokia C3-01 Gold Edition",
                "Mix Walkman WT13i",
                "Lenovo S720 - FPT",
                "Lenovo S890 5 inch",
                "QSmart Miracle Pad",
                "Q-Smart S2",
                "Apple",
                "Samsung",
                "Nokia",
                "HTC",
                "Sony",
                "Lenovo",
                "LG",
                "QMobile",
                "Android",
                "IOS",
                "Symbian",
                "Windows Phone",
                "Hệ điều hành khác",


            ];

            var KeywordForName = [
                "Apple iPhone 5S",
                "iPhone 3GS 8GB",
                "The new iPad 3G",
                "iPad Mini 16 GB",
                "iPhone 4S 32 GB",
                "iPad 4 3G Wifi",
                "Galaxy Note N7000",
                "Galaxy S3 - I9300",
                "Galaxy Note 8.0",
                "Nokia Lumia 720",
                "Nokia Lumia 920",
                "Nokia 109",
                "Nokia Lumia 820",
                "HTC One - FPT",
                "HTC One X Plus",
                "Nokia Lumia 620 ",
                "Sony Xperia ZL - Full HD ",
                "Galaxy S4 I9500",
                "Xperia Acro S",
                "Lenovo S880",
                "Google Nexus 4 - 8GB",
                "Optimus G - E975",
                "Optimus 4X HD - P880",
                "HTC Butterfly - FPT",
                "Galaxy Grand Duos - I9082",
                "Galaxy Tab 2 7.0",
                "Nokia C3-01 Gold Edition",
                "Mix Walkman WT13i",
                "Lenovo S720 - FPT",
                "Lenovo S890 5 inch",
                "QSmart Miracle Pad",
                "Q-Smart S2",

            ];

            $("#top-keyword").autocomplete({
                source: fullKeyword
            });

            $("#Keyword").autocomplete({
                source: KeywordForName
            });

        });
    </script>
    <script language="javascript">
        function imgError(image) {
            image.onerror = "";
            image.src = "Images/logo.gif";
            return true;
        }

        function Search() {
            var kwd = $("#top-keyword").val();
            if (kwd == "Từ khóa tìm kiếm") kwd = "";
            var root = /Mobile_Store/;
            window.location.href = root + 'SearchController?Type=simple&Keyword=' + kwd + "&page=1";
        }
    </script>
    <!-- Start header --->
    <div id="header">
        <div id="head">
            <div id="logo">
                <a href="/Mobile_Store/"><img src="/Mobile_Store/Content/Images/logo.gif" alt="Hoàng Hà Mobile"
                                              onerror='imgError(this);'/></a>
            </div>
            <div id="top-search">
                  <span class="input">
                  <input type="text" name="top-keyword" id="top-keyword" value="Từ khóa tìm kiếm"
                         onfocus="if(this.value=='Từ khóa tìm kiếm') this.value='';"
                         onblur="if(this.value=='') this.value='Từ khóa tìm kiếm'"/>
                  </span>
                <span class="submit">
                  <a href="javascript:Search();">Tìm kiếm</a>
                  </span>
            </div>
        </div>
    </div>
    <!-- Ed header --->
    <!-- Start main menu --->
    <div id="top-menu-c">
        <div id="top-menu">
            <ul>
                <li class="first">
                    <a href=""><span>Trang chủ</span></a>
                </li>
                <li>
                    <a href=""><span>Điện thoại</span></a>
                </li>
                <li>
                    <a href=""><span>Phụ kiện</span></a>
                </li>
                <li>
                    <a href=""><span>Tin tức</span></a>
                </li>
                <li>
                    <a href="FAQ.jsp"><span>Hỏi đ&#225;p</span></a>
                </li>
                <li>
                    <a href=""><span>Hướng dẫn sử dụng</span></a>
                </li>
                <li>
                    <a href=""><span>Giới thiệu</span></a>
                </li>
                <li>
                    <a href=""><span>Li&#234;n hệ</span></a>
                </li>
                <li>
                    <a href="login.php"><span>Th&#224;nh vi&#234;n</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- end main menu --->
    <div id="body">
        <!-- box content -->
        <div id="content">
            <!-- box left -->
            <div class="content-l">
                <div class="header-blue">
                    <span class="title">Hãng điện thoại</span>
                    <ul class="brands">
                        <!-- Danh sách các hãng điện thoại -->
                        <?php
                        require_once "controllers/manufacturer_controller.php";
                        $manufacturers = (new ManufacturerController())->get_all();
                        foreach($manufacturers as $manufacturer) {
                        ?>
                        <li><a href=""><?=$manufacturer->TenHangSX?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <!--  Insert Phone Company -->
            </div>
            <!-- end box left -->
            <!-- box right -->
            <div class="content-r">
                <!-- big banner image -->
                <div id="example">
                    <div id="slides">
                        <div class="slides_container">
                            <?php
                                require_once "controllers/slide_controller.php";
                                $slides = (new SlideController())->get_all();
                                foreach($slides as $slide) {
                            ?>
                            <div class="mobileHot">
                                <a href="detail.php?id=<?=$slide->maDT?>"/><img
                                    src="<?=$slide->picture?>"/></a>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- end slide_contenter -->
                        <!-- Start control button -->
                        <a href="#" class="prev"><img src="Content/Images/pikachoose/prev.png" width="28" height="44"
                                                      alt="Arrow Prev"></a>
                        <a href="#" class="next"><img src="Content/Images/pikachoose/next.png" width="28" height="44"
                                                      alt="Arrow Next"></a>        <!-- End control button -->
                    </div>
                    <!-- end slide -->
                </div>
                <!-- end big banner image -->
                <link href="Content/Styles/slidingboxes.css" rel="stylesheet" type="text/css"/>
                <script src="Content/Scripts/slidingboxes.js" type="text/javascript"></script>
                <!-- start slidingbox -->
                <div class="slidingbox">
                    <?php
                        require_once "controllers/product_controller.php";
                        $hot_products = (new ProductController())->get_hot_products();
                        foreach ($hot_products as $hot_product) { 
                    ?>
                    <div class="box-boxgrid-container">
                        <div class="boxgrid caption">
                            <a href="detail.php?id=<?=$hot_product->MaDT?>"><img
                                    src="<?=$hot_product->OriginalPicture?>" alt="<?=$hot_product->TenDT?>"/></a>
                            <div class="cover boxcaption">
                                <h3><?=$hot_product->TenDT?></h3>
                                <p>
                                    Giá tiền:
                                    <?=$hot_product->GiaSP?> VNĐ
                                    <br/>
                                </p>
                                <p><a href="detail.php?id=<?=$hot_product->MaDT?>">Xem chi tiết</a></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- end slidingbox -->
            </div>
            <!-- End box right -->
        </div>
        <!-- end box content -->
        <!-- The second content -->
        <div class="content-lv2">
            <!-- 2nd Content left - Phone info -->
            <div class="content-l">
                <!--	Ghi chú
                   1 Table tương ứng với 1 danh mục của điện thoại
                   1 tr tương tứng với 1 hàng ngang, thường gồm 3 cái dt kèm thông tin
                   trong 1 tr thường có 3 cặp <td image> và <td info> đại diện cho ảnh
                   và thong tin của điện thoại
                   -->
                <!-- Vòng lặp qua các hãng điện thoại -->
                <?php
                    foreach($manufacturers as $manufacturer) {
                ?>
                <div class="box-brand">
                    <div class="header2">
                        <span class="title"><span><a
                                    href="category.php?manufacturer_id=<?=$manufacturer->MaHangSX?>"><?=$manufacturer->TenHangSX?></a></span></span>
                    </div>
                    <div class="content">
                        <div class="content-c">
                            <table class="list-mobile" width="100%">
                                <!-- Truy vấn danh sách các điện thoại của mỗi hãng -->
                                <!-- Vòng lặp qua từng chiếc điện thoại ứng với mỗi hãng điện thoại -->
                                <?php
                                    require_once "controllers/product_controller.php";
                                    $products = (new ProductController())->get_products_by_manufacturer($manufacturer->MaHangSX);
                                    
                                    $count = 0;
                                    echo "<tr>";
                                    foreach($products as $product) {
                                ?>
                                    <td class="image">
                                        <a class="image-mobile" title="" href="detail.php?id=<?=$product->MaDT?>"
                                           style="background:url('<?=$product->OriginalPicture?>') no-repeat 50% 50%;">
                                        </a>
                                    </td>
                                    <td class="info">
                                        <span class="name"><a title="" href="detail.php?id=<?=$product->MaDT?>"><?=$product->TenDT?></a></span>
                                        <!-- Truy vấn danh sách các phụ kiện tương thích của điện thoại -->
                                        <ul>
                                            <li>Bảo hành: 12 tháng</li>
                                            <li>Đã gồm <b style="color:red;">10 %</b> VAT.</li>
                                            <li><b>Phụ kiện:</b>
                                                <?php
                                                    require_once "controllers/accessories_controller.php";
                                                    $list_accessories = (new AccessoriesController())->get_accessories_by_product($product->MaDT);
                                                    if (count($list_accessories) == 0) {
                                                        echo "Không có";
                                                    } else {
                                                        foreach($list_accessories as $accessories) {
                                                            echo $accessories->TenPhuKien . ".&nbsp;";
                                                        }
                                                    }
                                                ?>
                                            <li>
                                        </ul>
                                        <p><br>
                                            <span class="price">
                                       <span class="price-value">
                                       <?=$product->GiaSP?> VNĐ
                                       </span>
                                       </span>
                                        </p>
                                    </td>
                                    <?php 
                                    $count += 1;
                                    if($count % 3 == 0) {
                                        echo "</tr><tr>";
                                    }
                                } echo "</tr>"; ?>
                            </table>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- Phụ kiện -->
                <div class="box-brand">
                    <div class="header2">
                        <span class="title"><span><a
                                    href="">Phụ kiện điện thoại</a></span></span>
                    </div>
                    <div class="content">
                        <div class="content-c">
                            <ul class="list-mobile">
                                <?php require_once "controllers/accessories_controller.php";
                                $list_accessories = (new AccessoriesController())->get_all();
                                foreach($list_accessories as $accessories) {
                                ?>
                                <li>
                                    <div class="mobile-info">
                                        <div class="mobile-c">
                                            <a class="img" title=""
                                               href="">
                                                <img src="<?=$accessories->OriginalPicture?>" alt=""/>
                                            </a>
                                            <span class="name"><a
                                                    href=""><?=$accessories->TenPhuKien?></a></span>
                                            <span class="price">
                                       <span class="price-label">Giá bán:</span>
                                       <span class="price-value">
                                       <?=$accessories->Gia?> VNĐ
                                       </span>
                                       </span>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Phụ kiện -->
            </div>
            <!-- 2nd Content left - Phone info -->
            <!-- 2nd Content right - Phone info -->
            <div class="content-r">
                <!-- Ho tro yahoo -->
                <script language="javascript">
                    function imgError(image) {
                        image.onerror = "";
                        image.src = "Content/Images/offline.gif";
                        return true;
                    }
                </script>
                <div class="box-other">
                    <div class="title">
                        <span>Hỗ trợ bán hàng trực tuyến</span>
                    </div>
                    <!-- Danh sách yahoo hỗ trợ -->
                    <ul>
                        <li>
                            <div class="mobile-info">
                                <div class="mobile-c">
                                 <span class="name">
                                 <a style="color:#C90A0F" rel="nofollow"
                                    href="ymsgr:sendim?mvmanh&amp;m=Xin chao, toi muon hoi ve san pham  !">
                                 <img align="absmiddle" onerror='imgError(this);' border="0"
                                      src="http://opi.yahoo.com/online?u=abc&amp;m=g&amp;t=1&amp;l=us">
                                 Trần Văn Phú
                                 </a>
                                 </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="mobile-info">
                                <div class="mobile-c">
                                 <span class="name">
                                 <a style="color:#C90A0F" rel="nofollow"
                                    href="ymsgr:sendim?nphminh&amp;m=Xin chao, toi muon hoi ve san pham  !">
                                 <img align="absmiddle" onerror='imgError(this);' border="0"
                                      src="http://opi.yahoo.com/online?u=nphminh&amp;m=g&amp;t=1&amp;l=us">
                                 Hoàng Minh
                                 </a>
                                 </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="mobile-info">
                                <div class="mobile-c">
                                 <span class="name">
                                 <a style="color:#C90A0F" rel="nofollow"
                                    href="ymsgr:sendim?nvtuong&amp;m=Xin chao, toi muon hoi ve san pham  !">
                                 <img align="absmiddle" onerror='imgError(this);' border="0"
                                      src="http://opi.yahoo.com/online?u=nvtuong&amp;m=g&amp;t=1&amp;l=us">
                                 Đại Tướng
                                 </a>
                                 </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="mobile-info">
                                <div class="mobile-c">
                                 <span class="name">
                                 <a style="color:#C90A0F" rel="nofollow"
                                    href="ymsgr:sendim?vhphi&amp;m=Xin chao, toi muon hoi ve san pham  !">
                                 <img align="absmiddle" onerror='imgError(this);' border="0"
                                      src="http://opi.yahoo.com/online?u=vhphi&amp;m=g&amp;t=1&amp;l=us">
                                 Hồng Phi
                                 </a>
                                 </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- End Danh sách yahoo hỗ trợ -->
                </div>
                <!-- end Ho tro yahoo -->
                <style>
                    .row {
                        display: inline-block;
                        clear: both;
                        padding: 0px 10px 5px 10px;
                    }
                    .row .editor-label {
                        padding: 5px 0px 0px 0px;
                    }
                    .row .editor-field {
                        padding: 5px 0px 0px 0px;
                    }
                </style>
                <div class="box-other">
                </div>
                <!-- Quang cao -->
                <div id="AD_Zone_3"></div>
                <!-- end Quang cao -->
                <!-- Danh muc dien thoai -->
                <div class="box-device">
                    <h3><span>Danh mục hệ điều hành</span></h3>
                    <div class="vmenu">
                        <ul class="news-category">
                            <!-- Lay thong tin tu He Dieu hanh -->
                            <?php
                                require_once "controllers/os_controller.php";
                                $list_os = (new OSController())->get_all();
                                foreach($list_os as $os) {
                            ?>
                            <li><a href=""><?=$os->TenHDH?></a>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <!-- End Danh muc dien thoai -->
                <!-- Quang cao 4,5 -->
                <div id="AD_Zone_4"></div>
                <div id="AD_Zone_5"></div>
                <!-- Danh muc phu kien -->
                <div class="box-device">
                    <h3><span>Danh mục phụ kiện</span></h3>
                    <div class="vmenu">
                        <ul class="news-category">
                            <?php
                                require_once "controllers/accessories_type_controller.php";
                                $accessories_types = (new AccessoriesTypeController())->get_all();
                                foreach($accessories_types as $accessories_type) {
                            ?>
                            <li>
                                <a href=""><?=$accessories_type->TenDM?></a>
                            </li>
                                <?php } ?>
                        </ul>
                    </div>
                </div>
                <!-- End Danh muc phu kien -->
                <div id="AD_Zone_6"></div>
                <div id="AD_Zone_7"></div>
                <!-- Dien thoai duoc xem nhieu -->
                <!-- c:set var="mostViewList" value="[entity.DienThoai@7ce8f9f4, entity.DienThoai@6de966e4, entity.DienThoai@1ef9fbff, entity.DienThoai@17322377, entity.DienThoai@2c2e4f3c, entity.DienThoai@a56c21b, entity.DienThoai@5b21e6ad, entity.DienThoai@5d0e5f25, entity.DienThoai@387ac17, entity.DienThoai@3f7de066]"/-->
                <div class="box-other">
                    <div class="title">
                        <span>Điện thoại được xem nhiều</span>
                    </div>
                    <!-- danh sach cac dien thoai duoc xem nhieu-->
                    <ul>
                        <li class="alt1">
                            <div class="mobile-info">
                                <div class="mobile-c">
                                    <a class="image" href="">
                                        <img src="Content/Images/Phones/htc_one_fpt.png" alt="HTC One - FPT"/>
                                    </a>
                                    <div class="info">
                                        <span class="name"><a href="">HTC One - FPT</a></span>
                                        <span class="price">
                                    <span class="price-value">
                                    15,290,000 VNĐ
                                    </span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="alt1">
                            <div class="mobile-info">
                                <div class="mobile-c">
                                    <a class="image" href="">
                                        <img src="Content/Images/Phones/google_nexus-4.jpg" alt="Google Nexus 4 - 8GB"/>
                                    </a>
                                    <div class="info">
                                        <span class="name"><a href="">Google Nexus 4 - 8GB</a></span>
                                        <span class="price">
                                    <span class="price-value">
                                    8,290,000 VNĐ
                                    </span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="alt1">
                            <div class="mobile-info">
                                <div class="mobile-c">
                                    <a class="image" href="">
                                        <img src="Content/Images/Phones/galaxy-Grand-Duos-I9082.png"
                                             alt="Galaxy Grand Duos - I9082"/>
                                    </a>
                                    <div class="info">
                                        <span class="name"><a href="">Galaxy Grand Duos - I9082</a></span>
                                        <span class="price">
                                    <span class="price-value">
                                    7,550,000 VNĐ
                                    </span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="alt1">
                            <div class="mobile-info">
                                <div class="mobile-c">
                                    <a class="image" href="">
                                        <img src="Content/Images/Phones/htc_butterfly.png" alt="HTC Butterfly - FPT"/>
                                    </a>
                                    <div class="info">
                                        <span class="name"><a href="">HTC Butterfly - FPT</a></span>
                                        <span class="price">
                                    <span class="price-value">
                                    13,990,000 VNĐ
                                    </span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="alt1">
                            <div class="mobile-info">
                                <div class="mobile-c">
                                    <a class="image" href="">
                                        <img src="Content/Images/Phones/gl_optimus.jpg" alt="Optimus G - E975"/>
                                    </a>
                                    <div class="info">
                                        <span class="name"><a href="">Optimus G - E975</a></span>
                                        <span class="price">
                                    <span class="price-value">
                                    11,250,000 VNĐ
                                    </span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="alt1">
                            <div class="mobile-info">
                                <div class="mobile-c">
                                    <a class="image" href="">
                                        <img src="Content/Images/Phones/thenwipad.jpg" alt="The new iPad 3G"/>
                                    </a>
                                    <div class="info">
                                        <span class="name"><a href="">The new iPad 3G</a></span>
                                        <span class="price">
                                    <span class="price-value">
                                    12,000,000 VNĐ
                                    </span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="alt1">
                            <div class="mobile-info">
                                <div class="mobile-c">
                                    <a class="image" href="">
                                        <img src="Content/Images/Phones/xperia_v.jpg" alt="Xperia Acro S"/>
                                    </a>
                                    <div class="info">
                                        <span class="name"><a href="">Xperia Acro S</a></span>
                                        <span class="price">
                                    <span class="price-value">
                                    6,390,000 VNĐ
                                    </span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="alt1">
                            <div class="mobile-info">
                                <div class="mobile-c">
                                    <a class="image" href="">
                                        <img src="Content/Images/Phones/ipad_mini_white.png" alt="iPad Mini 16 GB"/>
                                    </a>
                                    <div class="info">
                                        <span class="name"><a href="">iPad Mini 16 GB</a></span>
                                        <span class="price">
                                    <span class="price-value">
                                    12,500,000 VNĐ
                                    </span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="alt1">
                            <div class="mobile-info">
                                <div class="mobile-c">
                                    <a class="image" href="">
                                        <img src="Content/Images/Phones/optimus_hd_4x.png" alt="Optimus 4X HD - P880"/>
                                    </a>
                                    <div class="info">
                                        <span class="name"><a href="">Optimus 4X HD - P880</a></span>
                                        <span class="price">
                                    <span class="price-value">
                                    9,040,000 VNĐ
                                    </span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="alt1">
                            <div class="mobile-info">
                                <div class="mobile-c">
                                    <a class="image" href="">
                                        <img src="Content/Images/Phones/s3.jpg" alt="Galaxy S3 - I9300"/>
                                    </a>
                                    <div class="info">
                                        <span class="name"><a href="">Galaxy S3 - I9300</a></span>
                                        <span class="price">
                                    <span class="price-value">
                                    78,965,000 VNĐ
                                    </span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--
                           <li class="alt1">
                               <div class="mobile-info">
                                   <div class="mobile-c">
                                       <a class="image" href="/dien-thoai/qmobile/qsmart-miracle-pad-1012.aspx">
                                           <img src="http://www.hoanghamobile.com/Uploads/Thumbs/201211191334404836_qmart_pad1.jpg" alt="QSmart Miracle Pad" />
                                       </a>
                                       <div class="info">
                                           <span class="name"><a href="/dien-thoai/qmobile/qsmart-miracle-pad-1012.aspx">QSmart Miracle Pad</a></span>
                                           <span class="price">
                                               <span class="price-value">3,700,000 vnđ</span>
                                           </span>
                                       </div>
                                   </div>
                               </div>
                           </li>

                           <li class="alt2">
                               <div class="mobile-info">
                                   <div class="mobile-c">
                                       <a class="image" href="/dien-thoai/apple---iphone/apple-iphone-5---16gb--may-troi-bao-hanh-moi-active-1010.aspx">
                                           <img src="http://www.hoanghamobile.com/Uploads/Thumbs/201209130941192978_iphone5_hoanghamobile3.jpg" alt="Apple iPhone 5 - 16GB ( máy trôi bảo hành ).mới active" />
                                       </a>
                                       <div class="info">
                                           <span class="name"><a href="/dien-thoai/apple---iphone/apple-iphone-5---16gb--may-troi-bao-hanh-moi-active-1010.aspx">Apple iPhone 5 - 16GB ( m&#225;y tr&#244;i bảo h&#224;nh ).mới active</a></span>
                                           <span class="price">
                                               <span class="price-value">14,200,000 vnđ</span>
                                           </span>
                                       </div>
                                   </div>
                               </div>
                           </li>
                            -->
                    </ul>
                    <!-- end danh sach -->
                </div>
                <!-- End Dien thoai duoc xem nhieu -->
                <!-- Quảng cáo 8 -->
                <div id="AD_Zone_8"></div>
                <!-- End Quảng cáo 8 -->
            </div>
            <!-- End 2nd Content right - Phone info -->
        </div>
        <!-- End The second content -->
        <!-- footer -->
        <div id="footer">
            <div class="footer-c">
                <p class="footer-l">
                    <span><strong>Trụ sở chính:</strong> Siêu thị 194 Lê Duẩn - Hồ Chí Minh. <strong>Điện thoại:</strong> 043.5186033</span>
                    <span><strong>Chi nhánh:</strong> Siêu thị 122 Thái Hà - Hà Nội. <strong>Điện thoại:</strong> 097.379.0122</span>
                    <span><strong>Chi nhánh:</strong> Siêu thị 382 Nguyễn Văn Cừ - Hà Nội. <strong>Điện thoại:</strong> 0125.363.2222</span>
                    <span><strong>Chi nhánh:</strong> Siêu thị 392 cầu giấy - Hà Nội. <strong>Điện thoại:</strong> 0968.32.33.99</span>
                    <span><strong>Website:</strong> <a
                            href="http://www.hoanghamobile.com">http://www.hoanghamobile.com</a> | <a
                            href="http://hoanghamobile.com">http://hoanghamobile.com</a></span>
                    <span><strong>Email:</strong> <a
                            href="mailto:contact@hoanghamobile.com">contact@hoanghamobile.com</a></span>
                </p>
                <p class="footer-r">
                    <a href="mailto:webmaster@dangquang.com.vn">© 2011 QuangGame</a>
                </p>
            </div>
        </div>
        <!-- end footer -->
    </div>
</div>
</body>
</html>