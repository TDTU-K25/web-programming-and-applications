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
    <script src="/Mobile_Store/Content/Scripts/jquery.pikachoose.full.js" type="text/javascript"></script>
    <link href="/Mobile_Store/Content/Styles/pikachoose/bottom.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#pikame").PikaChoose({carousel: true});
        });
    </script>
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
                <!-- Navigation -->
                <div class="nav">
                    <ul class="left">
                        <li><a href="/Mobile_Store/">Trang chủ</a></li>
                        <li><span> » </span></li>
                        <li><a href="">Điện thoại</a></li>
                        <li><span> » </span></li>
                        <li><a class="actived">Samsung</a></li>
                    </ul>
                    <ul class="right">
                        <li>Lượt xem: <b>112</b></li>
                    </ul>
                </div>
                <div class="header-info">
                    <div class="info-left">
                        <div class="pikachoose">
                            <ul id="pikame" class="jcarousel-skin-pika">
                                <li><a ref="lightbox" target="_blank"
                                       href="/Mobile_Store/Content/Images/Phones/Details/Galaxy_S4_I9500_1.jpg"
                                       class="slide"><img
                                            src="/Mobile_Store/Content/Images/Phones/Details/Galaxy_S4_I9500_1.jpg"/></a>
                                </li>
                                <li><a ref="lightbox" target="_blank"
                                       href="/Mobile_Store/Content/Images/Phones/Details/Galaxy_S4_I9500_2.jpg"
                                       class="slide"><img
                                            src="/Mobile_Store/Content/Images/Phones/Details/Galaxy_S4_I9500_2.jpg"/></a>
                                </li>
                                <li><a ref="lightbox" target="_blank"
                                       href="/Mobile_Store/Content/Images/Phones/Details/Galaxy_S4_I9500_3.jpg"
                                       class="slide"><img
                                            src="/Mobile_Store/Content/Images/Phones/Details/Galaxy_S4_I9500_3.jpg"/></a>
                                </li>
                                <li><a ref="lightbox" target="_blank"
                                       href="/Mobile_Store/Content/Images/Phones/Details/Galaxy_S4_I9500_4.jpg"
                                       class="slide"><img
                                            src="/Mobile_Store/Content/Images/Phones/Details/Galaxy_S4_I9500_4.jpg"/></a>
                                </li>
                            </ul>
                        </div>
                        <div style="padding:10px; text-align:center;">
                            <center><a href=""><img
                                        src="/Mobile_Store/Content/Images/dathang_2.gif"/></a> <a target="_blank"
                                                                                                  href=""
                                                                                                  title="Hướng dẫn đặt mua điện thoại"><img
                                        src="/Mobile_Store/Content/Images/huongdan_dathang.gif"/></a></center>
                        </div>
                    </div>
                    <div class="info-right">
                        <div class="left">
                            <h1>Galaxy S4 I9500</h1>
                            <div class="quick-info">
                                <ul>
                                    <li><span>Giá tiền:&nbsp;</span><span class="price">
                                    14,890,000 VNĐ
                                    </span>
                                    </li>
                                    <li><i>Giá trên đã bao gồm <b style="color:red;">10 %</b> VAT.</i></li>
                                    <li><span>Hãng sản xuất:</span> <a
                                            href="">Samsung</a>
                                    </li>
                                    <li><span>Hệ điều hành</span> <a
                                            href="">Android</a>
                                    </li>
                                    <li>
                                        <span>Kho hàng:</span><a>
                                            Còn hàng
                                        </a>
                                    </li>
                                    <li><span>Màu có sẵn:</span>
                                        <span>Đen</span>
                                    </li>
                                    <li>
                                        <span>Có bán tại:</span>
                                        <ul class="clear">
                                            <a>
                                                <li>
                                                    <span>392 cầu giấy - 0968.32.33.99</span>
                                                </li>
                                                <li>
                                                    <span>194 L&#234; Duẩn - 043.518.6033</span>
                                                </li>
                                                <li>
                                                    <span>122 Th&#225;i H&#224;  - 0973.79.0122</span>
                                                </li>
                                                <li>
                                                    <span>382 Nguyễn Văn Cừ - 0125.363.2222</span>
                                                </li>
                                            </a>
                                        </ul>
                                    </li>
                                    <li><span>Bảo hành:</span> Ch&#237;nh h&#227;ng 12 th&#225;ng</li>
                                </ul>
                            </div>
                        </div>
                        <!-- End left -->
                        <div class="right">
                            <div class="title">
                                <span>Sản phẩm cùng hãng</span>
                            </div>
                            <ul>
                                <li>
                                    <div class="info">
                                    <span class="name"><a
                                            href="">Galaxy Grand Duos - I9082</a></span>
                                        <span class="price">
                                    <span class="price-value">
                                    7,550,000 VNĐ
                                    </span>
                                    </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                    <span class="name"><a
                                            href="">Galaxy S3 - I9300</a></span>
                                        <span class="price">
                                    <span class="price-value">
                                    78,965,000 VNĐ
                                    </span>
                                    </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                    <span class="name"><a
                                            href="">Galaxy Note 8.0</a></span>
                                        <span class="price">
                                    <span class="price-value">
                                    12,500,000 VNĐ
                                    </span>
                                    </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                    <span class="name"><a
                                            href="">Galaxy Tab 2 7.0</a></span>
                                        <span class="price">
                                    <span class="price-value">
                                    6,990,000 VNĐ
                                    </span>
                                    </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                    <span class="name"><a
                                            href="">Galaxy Note N7000</a></span>
                                        <span class="price">
                                    <span class="price-value">
                                    8,590,000 VNĐ
                                    </span>
                                    </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End right -->
                        <!-- yahoo -->
                        <div class="box-ym"
                             style="display:inline-block; clear:both; background:#FFFB98; width:100%; padding:5px 0px;">
                            <b style="font-weight:bold;">Hỗ trợ bán hàng:</b>
                            <a style="color:#C90A0F" rel="nofollow" href="ymsgr:sendim?asd&amp;m=">
                                Hoàng Minh
                            </a>
                            |
                            <a style="color:#C90A0F" rel="nofollow" href="ymsgr:sendim?nphminh&amp;m=">
                                Hoàng Minh
                            </a>
                            |
                            <a style="color:#C90A0F" rel="nofollow" href="ymsgr:sendim?nvtuong&amp;m=">
                                Đại Tướng
                            </a>
                            |
                            <a style="color:#C90A0F" rel="nofollow" href="ymsgr:sendim?vhphi&amp;m=">
                                Hồng Phi
                            </a>
                            |
                        </div>
                        <!-- yahoo -->
                    </div>
                </div>
                <!-- end header-info -->
                <ul class="tabs-mobile">
                    <li><a class="active" href="javascript:switchTabs(0);" id="link-0"><span><b>Tính năng</b></span></a>
                    </li>
                    <li><a href="javascript:switchTabs(1);" id="link-1"><span><b>Phụ kiện tương thích</b></span></a>
                    </li>
                    <li><a href="javascript:switchTabs(2);" id="link-2"><span><b>Tin liên quan</b></span></a></li>
                    <li><a href="javascript:switchTabs(3);" id="link-3"><span><b>Địa chỉ bảo hành</b></span></a></li>
                    <li><a href="javascript:switchTabs(4);" id="link-4"><span><b>Hướng dẫn sử dụng</b></span></a></li>
                </ul>
                <!-- Thong tin dien thoai - 5 tab -->
                <div class="tabs-content" id="tab-container">
                    <!-- Tab 1 - Tinh nang -->
                    <div id="tabs-0" class="tabs-details">
                        <table class="mobile-info">
                            <tr>
                                <td class="group">Thông tin cơ bản</td>
                                <td>
                                    <table>
                                        <tr>
                                            <td class="label">Hệ điều h&agrave;nh</td>
                                            <td>Android</td>
                                        </tr>
                                        <tr>
                                            <td class="label">Bộ xử lý</i> </td>
                                            <td>nVidia Tegra 3, Quad-core 1.7 GHz processor</td>
                                        </tr>
                                        <tr>
                                            <td class="label">Bộ nhớ</td>
                                            <td>RAM: 1 GB -&nbsp;Bộ nhớ trong: 64 GB</td>
                                        </tr>
                                        <tr>
                                            <td class="label">Màn hình</td>
                                            <td>Super LCD2, 16 triệu màu, rộng 4.7 inches</td>
                                        </tr>
                                        <tr>
                                            <td class="label">Camera</td>
                                            <td>8.0 MP (3264x2448 pixels)</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table class="mobile-info">
                            <tr>
                                <td class="group">Kích thước & khối lượng</td>
                                <td>
                                    <table>
                                        <tr>
                                            <td class="label">Chiều dài <i>(mm)</i></td>
                                            <td>3.0 (mm)</td>
                                        </tr>
                                        <tr>
                                            <td class="label">Chiều rộng <i>(mm)</i></td>
                                            <td>3.0 (mm)</td>
                                        </tr>
                                        <tr>
                                            <td class="label">Chiều cao <i>(mm)</i></td>
                                            <td>6.0 (mm)</td>
                                        </tr>
                                        <tr>
                                            <td class="label">Cân nặng <i>(g)</i></td>
                                            <td>3.0 (g)</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- End Tab 1 - Tinh nang -->
                    <!-- Tab 2 - Phu kien tuong thích -->
                    <div id="tabs-1" class="tabs-details" style="display:none;">
                        <p class="title">Phụ kiện tương thích</p>
                        <p class="description">Danh sách phụ kiện tương thích với điện thoại: Galaxy S4 I9500</p>
                        <ul style="display:inline-block; clear:both; padding:20px;">
                            <li style="list-style:disc"><a
                                    href=""><b>iPod Shuffle
                                        gen 4 2G</a>
                            </li>
                            <li style="list-style:disc"><a
                                    href=""><b>PPSL-14</a>
                            </li>
                            <li style="list-style:disc"><a
                                    href=""><b>Bộ Pin + Sạc
                                        cốc</a>
                            </li>
                            <li style="list-style:disc"><a
                                    href=""><b>BST 40</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Tab 2 - Phu kien tuong thích -->
                    <!-- Tab 3 - Thong tin lien quan -->
                    <div id="tabs-2" class="tabs-details" style="display:none;">
                        <p class="title">Tin tức liên quan</p>
                        <p class="description">Danh sách tin tức liên quan đến điện thoại: Galaxy S4 I9500</p>
                        <ul class="list-details">
                        </ul>
                    </div>
                    <!-- End Tab 3 - Thong tin lien quan -->
                    <!-- Tab 4 - Dia chi bao hanh -->
                    <div id="tabs-3" class="tabs-details" style="display:none;">
                        <ul class="list-details">
                            <li class="group1"><span><b>H&#224; nội</i></b></span></li>
                            <li class="group2"><span><b>Quận Hai B&#224; Trưng <i>(1)</i></b></span></li>
                            <li class="item">
                                <p><strong>Trung t&#226;m bảo h&#224;nh Samsung - Chi nh&#225;nh C&#244;ng ty Hồng
                                        Quang</strong>
                                </p>
                                <p>Điện thoại: 04-39743988 - 84 1900 555 567</p>
                                <p>Địa chỉ: 184 - 186 Triệu Việt Vương, P.B&#249;i Thị Xu&#226;n, Q.Hai B&#224; Trưnng,
                                    H&#224; Nội
                                </p>
                                <p>Giờ làm việc: Từ 8h - 17h30 (trừ chủ nhật &amp; ng&#224;y lễ)</p>
                            </li>
                        </ul>
                    </div>
                    <!-- End Tab 4 - Dia chi bao hanh -->
                    <!-- tab 5 - Huong dan su dung -->
                    <div id="tabs-4" class="tabs-details" style="display:none;">
                        <p class="title">Hướng dẫn sử dụng</p>
                        <ul class="list-details">
                            <li style="list-style:disc"><a
                                    href=""><b>Hướng dẫn
                                        đặt hàng trực tuyến</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Tab 5 - Huong dan su dung -->
                </div>
                <!-- End Thong tin dien thoai - 5 tab -->
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