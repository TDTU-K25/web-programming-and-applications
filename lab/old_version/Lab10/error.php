<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="/Mobile_Store/Content/Styles/reset.css" />
    <link type="text/css" rel="stylesheet" href="/Mobile_Store/Content/Styles/styles.css" />
    <link href="/Mobile_Store/Content/Styles/jquery.multiSelect.css" rel="stylesheet" type="text/css" />
    <link href="/Mobile_Store/Content/Styles/slider.css" rel="stylesheet" type="text/css" />
    <link href="/Mobile_Store/Content/Styles/vMenu.css" rel="stylesheet" type="text/css" />
    <script src="/Mobile_Store/Content/Scripts/jquery-1.6.1.min.js" type="text/javascript"></script>
    <script src="/Mobile_Store/Content/Scripts/jquery-ui-1.8.12.custom.min.js" type="text/javascript"></script>
    <link href="/Mobile_Store/Content/Styles/jquery-ui-1.8.5.custom-black-gray.css" rel="stylesheet" type="text/css" media="screen" />
    <script src="/Mobile_Store/Content/Scripts/jquery.multiselect.js" type="text/javascript"></script>
    <script src="/Mobile_Store/Content/Scripts/WebScript.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/Mobile_Store/Content/Styles/jquery-ui.css" />
    <title>Mobile Store</title>
    <META http-equiv="refresh" content="4;URL=/Mobile_Store/index.jsp">
</head>
<body>
<div style="display:none">
    <div id="dialog-form"></div>
</div>
<div id="wrapper">
    <script>
        $(function() {
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

            $( "#top-keyword" ).autocomplete({
                source: fullKeyword
            });

            $( "#Keyword" ).autocomplete({
                source: KeywordForName
            });

        });
    </script>
    <script language="javascript">
        function imgError(image){
            image.onerror = "";
            image.src = "Images/logo.gif";
            return true;
        }

        function Search(){
            var kwd = $("#top-keyword").val();
            if (kwd=="Từ khóa tìm kiếm") kwd="";
            var root=/Mobile_Store/;
            window.location.href =root +'SearchController?Type=simple&Keyword=' + kwd +"&page=1";
        }
    </script>
    <!-- Start header --->
    <div id="header">
        <div id="head">
            <div id="logo">
                <a href="/Mobile_Store/"><img src="/Mobile_Store/Content/Images/logo.gif" alt="Hoàng Hà Mobile" onerror='imgError(this);'/></a>
            </div>
            <div id="top-search">
                  <span class="input">
                  <input type="text" name="top-keyword" id="top-keyword" value="Từ khóa tìm kiếm" onfocus="if(this.value=='Từ khóa tìm kiếm') this.value='';" onblur="if(this.value=='') this.value='Từ khóa tìm kiếm'" />
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
                    <a href="/Mobile_Store/index.jsp"><span>Trang chủ</span></a>
                </li>
                <li>
                    <a href="/Mobile_Store/Phone.jsp"><span>Điện thoại</span></a>
                </li>
                <li>
                    <a href="/Mobile_Store/AccessoryController?action=viewAllAccessories&page=1"><span>Phụ kiện</span></a>
                </li>
                <li>
                    <a href="/Mobile_Store/NewsController?action=listNews"><span>Tin tức</span></a>
                </li>
                <li>
                    <a href="FAQ.jsp"><span>Hỏi đ&#225;p</span></a>
                </li>
                <li>
                    <a href="/Mobile_Store/GuideController?action=listGuides"><span>Hướng dẫn sử dụng</span></a>
                </li>
                <li>
                    <a href="/Mobile_Store/Introduction.jsp"><span>Giới thiệu</span></a>
                </li>
                <li>
                    <a href="/Mobile_Store/Contact.jsp"><span>Li&#234;n hệ</span></a>
                </li>
                <li>
                    <a href="/Mobile_Store/Member.jsp"><span>Th&#224;nh vi&#234;n</span></a>
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
                        <li><a href="/Mobile_Store/PhoneController?action=viewCompany&id=1&page=1">Apple</a></li>
                        <li><a href="/Mobile_Store/PhoneController?action=viewCompany&id=2&page=1">Samsung</a></li>
                        <li><a href="/Mobile_Store/PhoneController?action=viewCompany&id=3&page=1">Nokia</a></li>
                        <li><a href="/Mobile_Store/PhoneController?action=viewCompany&id=4&page=1">HTC</a></li>
                        <li><a href="/Mobile_Store/PhoneController?action=viewCompany&id=5&page=1">Sony</a></li>
                        <li><a href="/Mobile_Store/PhoneController?action=viewCompany&id=6&page=1">Lenovo</a></li>
                        <li><a href="/Mobile_Store/PhoneController?action=viewCompany&id=7&page=1">LG</a></li>
                        <li><a href="/Mobile_Store/PhoneController?action=viewCompany&id=8&page=1">QMobile</a></li>
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
                            <li><a href="/Mobile_Store/PhoneController?action=viewOS&id=1&page=1">Android</a>
                            <li><a href="/Mobile_Store/PhoneController?action=viewOS&id=2&page=1">IOS</a>
                            <li><a href="/Mobile_Store/PhoneController?action=viewOS&id=3&page=1">Symbian</a>
                            <li><a href="/Mobile_Store/PhoneController?action=viewOS&id=4&page=1">Windows Phone</a>
                            <li><a href="/Mobile_Store/PhoneController?action=viewOS&id=5&page=1">Hệ điều hành khác</a>
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
                            <li><a href="/Mobile_Store/AccessoryController?action=viewAccessories&id=1">Phụ kiện iPad</a>
                            <li><a href="/Mobile_Store/AccessoryController?action=viewAccessories&id=2">Phụ kiện iPhone</a>
                            <li><a href="/Mobile_Store/AccessoryController?action=viewAccessories&id=3">Máy nghe nhạc</a>
                            <li><a href="/Mobile_Store/AccessoryController?action=viewAccessories&id=4">Sạc - Pin</a>
                            <li><a href="/Mobile_Store/AccessoryController?action=viewAccessories&id=5">Tai nghe</a>
                            <li><a href="/Mobile_Store/AccessoryController?action=viewAccessories&id=6">Thẻ nhớ</a>
                            <li><a href="/Mobile_Store/AccessoryController?action=viewAccessories&id=7">Thiết bị kết nối</a>
                        </ul>
                    </div>
                </div>
                <!-- End Danh muc phu kien -->
            </div>
            <!-- /box left -->
            <!-- box right -->
            <div class="content-r">
                <style>
                    .form-front h2 {padding:5px 0px; font:15pt bold Arial; margin:5px 0px; color:Blue;}
                    .users, .users_2 { background:#ccc;border-collapse: separate; border-spacing:1px;}
                    .users  td {padding:5px; background:#fff; vertical-align:middle;}
                    .users  th {padding:5px; background:#f5f5f5; font-weight:bold;}
                    .users_2 td {padding:5px; background:#F9FFC2; vertical-align:middle;}
                </style>
                <div class="form-front">
                    <fieldset style="background:#FEF8F5;">
                        <legend >Lỗi 404 Not Found</legend>
                        <p align="center">Trang bạn yêu cầu không tồn tại. Hệ thống sẽ tự động chuyển đến trang chủ sau 5 giây</p>
                        <p align="center"><a href="/Mobile_Store/index.jsp">Click vào đây nếu trình duyệt không tự chuyển</a></p>
                        <div>
                        </div>
                    </fieldset>
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
                    <span><strong>Website:</strong> <a href="http://www.hoanghamobile.com">http://www.hoanghamobile.com</a> | <a href="http://hoanghamobile.com">http://hoanghamobile.com</a></span>
                    <span><strong>Email:</strong> <a href="mailto:contact@hoanghamobile.com">contact@hoanghamobile.com</a></span>
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