<?php
    require_once "controllers/product_controller.php";
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    $searching_products = (new ProductController())->get_all($page);
    if (isset($_GET['searchBtn'])) {
        $keyword = $_GET['Keyword'];
        $manufacturer_id = $_GET['company'];
        $os_id = $_GET['system'];
        $min_price = $_GET['MinPrice'];
        $max_price = $_GET['MaxPrice'];
        
        $searching_products = (new ProductController())->search($keyword, $manufacturer_id, $os_id, $min_price, $max_price, $page);
    }
?>

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
                    <a href=""><span>Th&#224;nh vi&#234;n</span></a>
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
                <!-- Phone Company -->
                <div class="header-blue">
                    <span class="title">Hãng điện thoại</span>
                    <ul class="brands">
                        <!-- Danh sách các hãng điện thoại -->
                        <li><a href="">Apple</a></li>
                        <li><a href="">Samsung</a></li>
                        <li><a href="">Nokia</a></li>
                        <li><a href="">HTC</a></li>
                        <li><a href="">Sony</a></li>
                        <li><a href="">Lenovo</a></li>
                        <li><a href="">LG</a></li>
                        <li><a href="">QMobile</a></li>
                    </ul>
                </div>
                <!-- End Phone Company -->
                <div id="AD_Zone_2"></div>
                <!-- Danh muc dien thoai -->
                <div class="box-device">
                    <h3><span>Danh mục hệ điều hành</span></h3>
                    <div class="vmenu">
                        <ul class="news-category">
                            <!-- Lay thong tin tu He Dieu hanh -->
                            <li><a href="">Android</a>
                            <li><a href="">IOS</a>
                            <li><a href="">Symbian</a>
                            <li><a href="">Windows Phone</a>
                            <li><a href="">Hệ điều hành khác</a>
                        </ul>
                    </div>
                </div>
                <!-- End Danh muc dien thoai -->
                <div class="box-other">
                </div>
                <!-- Danh muc phu kien -->
                <div class="box-device">
                    <h3><span>Danh mục phụ kiện</span></h3>
                    <div class="vmenu">
                        <ul class="news-category">
                            <li><a href="">Phụ kiện
                                    iPad</a>
                            <li><a href="">Phụ kiện
                                    iPhone</a>
                            <li><a href="">Máy nghe
                                    nhạc</a>
                            <li><a href="">Sạc - Pin</a>
                            <li><a href="">Tai nghe</a>
                            <li><a href="">Thẻ nhớ</a>
                            <li><a href="">Thiết bị kết
                                    nối</a>
                        </ul>
                    </div>
                </div>
                <!-- End Danh muc phu kien -->
            </div>
            <!-- /box left -->
            <!-- box right -->
            <div class="content-r">
                <div class="box-brand">
                    <div class="filter">
                        <form method="get" id="search-simple" name="search-simple">
                            <ul>
                                <li>
                                    <input type="text" name="Keyword" id="Keyword" placeholder="Tên điện thoại"/>
                                </li>
                                <li></li>
                                <li></li>
                                <li>
                                    <select name="company" id="company">
                                        <option value="0">Nhà sản xuất</option>
                                        <?php
                                        require_once "controllers/manufacturer_controller.php";
                                        $manufacturers = (new ManufacturerController())->get_all();
                                        foreach($manufacturers as $manufacturer) {
                                        ?>
                                        <option value="<?=$manufacturer->MaHangSX?>"><?=$manufacturer->TenHangSX?></option>
                                        <?php } ?>                          
                                    </select>
                                </li>
                                <li></li>
                                <li></li>
                                <li>
                                    <select name="system" id="system">
                                        <option value="0">Hệ điều hành</option>
                                        <?php
                                        require_once "controllers/os_controller.php";
                                        $list_os = (new OSController())->get_all();
                                        foreach($list_os as $os) {
                                        ?>
                                        <option value="<?=$os->MaHDH?>"><?=$os->TenHDH?></option>
                                        <?php } ?>        
                                    </select>
                                </li>
                                <li></li>
                                <li></li>
                                <li>
                                    <span>Giá từ</span>
                                </li>
                                <li>
                                    <input class="price" type="text" name="MinPrice" id="MinPrice" value=""/>
                                </li>
                                <li></li>
                                <li></li>
                                <li>
                                    <span>Đến</span>
                                </li>
                                <li>
                                    <input class="price" type="text" name="MaxPrice" id="MaxPrice" value=""/>
                                </li>
                                <li></li>
                                <li></li>
                                <li>
                                    <input type="hidden" name="Type" value="advanced">
                                    <input type="hidden" name="page" value="1">
                                    <button name="searchBtn" style="border: none;"><img
                                                src="/Mobile_Store/Content/Images/icon-timkiem.gif"/></button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
                <script language="javascript">
                    var key = document.getElementById('Keyword');
                    var company = document.getElementById('company');
                    var system = document.getElementById('system');
                    var min = document.getElementById('MinPrice');
                    var max = document.getElementById('MaxPrice');

                </script>
                <div class="box-brand">
                    <div class="header2">
                        <span class="title"><span><a href="">tìm được <?=count($searching_products['products'])?> kết quả</a></span></span>
                    </div>
                    <div class="content">
                        <div class="content-c">
                            <table class="list-mobile" width="100%">
                            <?php
                                    $count = 0;
                                    echo "<tr>";
                                    foreach($searching_products['products'] as $product) {
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
                        <div class="paging">
                            <?php
                                if (isset($_GET['searchBtn'])) {
                                    $number_of_pages = $searching_products['num_pages'];
                                } else {
                                    $number_of_pages = (new ProductController())->get_pages();
                                }
                                for($i = 1; $i <= $number_of_pages; $i++) {
                                   ?>
                                <a href="search.php<?php if(isset($_GET['searchBtn'])) echo "?Keyword=$keyword&company=$manufacturer_id&system=$os_id&MinPrice=$min_price&MaxPrice=$max_price&Type=advanced&page=$i&searchBtn="; else echo "?page=$i";?>" class="<?php if($i == $page) echo "current"; ?>"><?=$i?></a>
                                <?php 
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- box right -->
        </div>
        <!-- box content -->
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