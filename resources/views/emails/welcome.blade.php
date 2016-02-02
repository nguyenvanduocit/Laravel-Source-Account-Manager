<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>CS4VN Welcome {{ $user->name }}</title>
    <style type="text/css">
        /* /\/\/\/\/\/\/\/\/ CLIENT-SPECIFIC STYLES /\/\/\/\/\/\/\/\/ */
        #outlook a{padding:0;} /* Force Outlook to provide a "view in browser" message */
        .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing */
        body, table, td, p, a, li, blockquote{-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
        table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up */
        img{-ms-interpolation-mode:bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

        /* /\/\/\/\/\/\/\/\/ RESET STYLES /\/\/\/\/\/\/\/\/ */
        body{margin:0; padding:0;}
        img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
        table{border-collapse:collapse !important;}
        body, #bodyTable, #bodyCell{height:100% !important; margin:0; padding:0; width:100% !important;}

        /* /\/\/\/\/\/\/\/\/ TEMPLATE STYLES /\/\/\/\/\/\/\/\/ */

        /* ========== Page Styles ========== */

        #bodyCell{padding:20px;}
        #templateContainer{width:600px;}
        
        body, #bodyTable{
             background-color:#DEE0E2;
        }

        #bodyCell{
             border-top:4px solid #BBBBBB;
        }

        #templateContainer{
             border:1px solid #BBBBBB;
        }

        h1{
             color:#202020 !important;
            display:block;
             font-family:Helvetica;
             font-size:26px;
             font-style:normal;
             font-weight:bold;
             line-height:100%;
             letter-spacing:normal;
            margin-top:0;
            margin-right:0;
            margin-bottom:10px;
            margin-left:0;
             text-align:left;
        }

        h2{
             color:#404040 !important;
            display:block;
             font-family:Helvetica;
             font-size:20px;
             font-style:normal;
             font-weight:bold;
             line-height:100%;
             letter-spacing:normal;
            margin-top:0;
            margin-right:0;
            margin-bottom:10px;
            margin-left:0;
             text-align:left;
        }

        h3{
             color:#606060 !important;
            display:block;
             font-family:Helvetica;
             font-size:16px;
             font-style:italic;
             font-weight:normal;
             line-height:100%;
             letter-spacing:normal;
            margin-top:0;
            margin-right:0;
            margin-bottom:10px;
            margin-left:0;
             text-align:left;
        }

        h4{
             color:#808080 !important;
            display:block;
             font-family:Helvetica;
             font-size:14px;
             font-style:italic;
             font-weight:normal;
             line-height:100%;
             letter-spacing:normal;
            margin-top:0;
            margin-right:0;
            margin-bottom:10px;
            margin-left:0;
             text-align:left;
        }

        /* ========== Header Styles ========== */

        #templatePreheader{
             background-color:#F4F4F4;
             border-bottom:1px solid #CCCCCC;
        }

        .preheaderContent{
             color:#808080;
             font-family:Helvetica;
             font-size:10px;
             line-height:125%;
             text-align:left;
        }
        .preheaderContent a:link, .preheaderContent a:visited, /* Yahoo! Mail Override */ .preheaderContent a .yshortcuts /* Yahoo! Mail Override */{
             color:#606060;
             font-weight:normal;
             text-decoration:underline;
        }


        #templateHeader{
             background-color:#F4F4F4;
             border-top:1px solid #FFFFFF;
             border-bottom:1px solid #CCCCCC;
        }

        .headerContent{
             color:#505050;
             font-family:Helvetica;
             font-size:20px;
             font-weight:bold;
             line-height:100%;
             padding-top:0;
             padding-right:0;
             padding-bottom:0;
             padding-left:0;
             text-align:left;
             vertical-align:middle;
        }

        .headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{
             color:#EB4102;
             font-weight:normal;
             text-decoration:underline;
        }

        #headerImage{
            height:auto;
            max-width:600px;
        }

        /* ========== Body Styles ========== */


        #templateBody{
             background-color:#F4F4F4;
             border-top:1px solid #FFFFFF;
             border-bottom:1px solid #CCCCCC;
        }


        .bodyContent{
             color:#505050;
             font-family:Helvetica;
             font-size:16px;
             line-height:150%;
            padding-top:20px;
            padding-right:20px;
            padding-bottom:20px;
            padding-left:20px;
             text-align:left;
        }


        .bodyContent a:link, .bodyContent a:visited, /* Yahoo! Mail Override */ .bodyContent a .yshortcuts /* Yahoo! Mail Override */{
             color:#EB4102;
             font-weight:normal;
             text-decoration:underline;
        }

        .bodyContent img{
            display:inline;
            height:auto;
            max-width:560px;
        }

        /* ========== Column Styles ========== */

        .templateColumnContainer{width:260px;}

        #templateColumns{
             background-color:#F4F4F4;
             border-top:1px solid #FFFFFF;
             border-bottom:1px solid #CCCCCC;
        }


        .leftColumnContent{
             color:#505050;
             font-family:Helvetica;
             font-size:14px;
             line-height:150%;
            padding-top:0;
            padding-right:20px;
            padding-bottom:20px;
            padding-left:20px;
             text-align:left;
        }


        .leftColumnContent a:link, .leftColumnContent a:visited, /* Yahoo! Mail Override */ .leftColumnContent a .yshortcuts /* Yahoo! Mail Override */{
             color:#EB4102;
             font-weight:normal;
             text-decoration:underline;
        }


        .rightColumnContent{
             color:#505050;
             font-family:Helvetica;
             font-size:14px;
             line-height:150%;
            padding-top:0;
            padding-right:20px;
            padding-bottom:20px;
            padding-left:20px;
             text-align:left;
        }


        .rightColumnContent a:link, .rightColumnContent a:visited, /* Yahoo! Mail Override */ .rightColumnContent a .yshortcuts /* Yahoo! Mail Override */{
             color:#EB4102;
             font-weight:normal;
             text-decoration:underline;
        }

        .leftColumnContent img, .rightColumnContent img{
            display:inline;
            height:auto;
            max-width:260px;
        }

        /* ========== Footer Styles ========== */


        #templateFooter{
             background-color:#F4F4F4;
             border-top:1px solid #FFFFFF;
        }


        .footerContent{
             color:#808080;
             font-family:Helvetica;
             font-size:10px;
             line-height:150%;
            padding-top:20px;
            padding-right:20px;
            padding-bottom:20px;
            padding-left:20px;
             text-align:left;
        }


        .footerContent a:link, .footerContent a:visited, /* Yahoo! Mail Override */ .footerContent a .yshortcuts, .footerContent a span /* Yahoo! Mail Override */{
             color:#606060;
             font-weight:normal;
             text-decoration:underline;
        }

        /* /\/\/\/\/\/\/\/\/ MOBILE STYLES /\/\/\/\/\/\/\/\/ */

        @media only screen and (max-width: 480px){
            /* /\/\/\/\/\/\/ CLIENT-SPECIFIC MOBILE STYLES /\/\/\/\/\/\/ */
            body, table, td, p, a, li, blockquote{-webkit-text-size-adjust:none !important;} /* Prevent Webkit platforms from changing default text sizes */
            body{width:100% !important; min-width:100% !important;} /* Prevent iOS Mail from adding padding to the body */

            /* /\/\/\/\/\/\/ MOBILE RESET STYLES /\/\/\/\/\/\/ */
            #bodyCell{padding:10px !important;}

            /* /\/\/\/\/\/\/ MOBILE TEMPLATE STYLES /\/\/\/\/\/\/ */

            /* ======== Page Styles ======== */


            #templateContainer{
                max-width:600px !important;
                 width:100% !important;
            }

            h1{
                 font-size:24px !important;
                 line-height:100% !important;
            }
            h2{
                 font-size:20px !important;
                 line-height:100% !important;
            }
            h3{
                 font-size:18px !important;
                 line-height:100% !important;
            }

            h4{
                 font-size:16px !important;
                 line-height:100% !important;
            }

            /* ======== Header Styles ======== */

            #templatePreheader{display:none !important;} /* Hide the template preheader to save space */
            #headerImage{
                height:auto !important;
                 max-width:600px !important;
                 width:100% !important;
            }

            .headerContent{
                 font-size:20px !important;
                 line-height:125% !important;
            }

            /* ======== Body Styles ======== */

            .bodyContent{
                 font-size:18px !important;
                 line-height:125% !important;
            }

            /* ======== Column Styles ======== */

            .templateColumnContainer{display:block !important; width:100% !important;}

            .columnImage{
                height:auto !important;
                 max-width:480px !important;
                 width:100% !important;
            }

            .leftColumnContent{
                 font-size:16px !important;
                 line-height:125% !important;
            }

            .rightColumnContent{
                 font-size:16px !important;
                 line-height:125% !important;
            }

            /* ======== Footer Styles ======== */

            .footerContent{
                 font-size:14px !important;
                 line-height:115% !important;
            }

            .footerContent a{display:block !important;} /* Place footer social and utility links on their own lines, for easier access */
        }
    </style>
</head>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
<center>
    <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
        <tr>
            <td align="center" valign="top" id="bodyCell">
                <!-- BEGIN TEMPLATE // -->
                <table border="0" cellpadding="0" cellspacing="0" id="templateContainer">
                    <tr>
                        <td align="center" valign="top">
                            <!-- BEGIN PREHEADER // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templatePreheader">
                                <tr>
                                    <td valign="top" class="preheaderContent" style="padding-top:10px; padding-right:20px; padding-bottom:10px; padding-left:20px;" mc:edit="preheader_content00">
                                        Email chào mừng của công đồng game CS4VN
                                    </td>
                                    <!-- *|IFNOT:ARCHIVE_PAGE|* -->
                                    <td valign="top" width="180" class="preheaderContent" style="padding-top:10px; padding-right:20px; padding-bottom:10px; padding-left:0;" mc:edit="preheader_content01">
                                        Email not displaying correctly?<br /><a href="#" target="_blank">View it in your browser</a>.
                                    </td>
                                    <!-- *|END:IF|* -->
                                </tr>
                            </table>
                            <!-- // END PREHEADER -->
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">
                            <!-- BEGIN HEADER // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateHeader">
                                <tr>
                                    <td valign="top" class="headerContent">
                                        <img src="{{ asset('img/emailheader.png') }}" style="max-width:600px;" id="headerImage" mc:label="header_image" mc:edit="header_image" mc:allowdesigner mc:allowtext />
                                    </td>
                                </tr>
                            </table>
                            <!-- // END HEADER -->
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">
                            <!-- BEGIN BODY // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateBody">
                                <tr>
                                    <td valign="top" class="bodyContent" mc:edit="body_content">
                                        <h1>Bạn vừa tạo account tại CS4VN thành công</h1>
                                        <h3>Chào mừng đến với công đồng CS:GO Việt Nam</h3>
                                        <p>Xin chào {{ $user->name }}, Email này nhằm để thông báo cho bạn biết rằng, bạn vừa tạo account tại CS4VN. Bạn đã có thể bắt đầu tham gia vào các game mà CS4VN cung cấp.</p>
                                        <p>Để đăng nhập, bạn phải sử dụng account facebook mà bạn đã đăng ký ( <a href="https://facebook.com/{{ $user->facebook_id }}">{{ $user->name }}</a> ). Và không được chia sẻ account cho bất kỳ ai.</p>
                                        <h2>Lưu ý</h2>
                                        <p>
                                            <ul>
                                                <li>Hãy chơi game một cách lành mạnh. Đừng đốt quá nhiều thời gian vào nó.</li>
                                                <li>Khi gặp lỗi, bạn hãy thử tự mình tìm cách khắc phục trên google và group. Bạn được khuyến khích thông báo về lỗi, và giải pháp của bạn. Nhưng bạn không có quyền phàn nàn, yêu cầu bất cứ gì.</li>
                                                <li>Và cuối cùng.Bạn sẽ bị ban nick vĩnh viễn nếu bị phát hiện là gian lận. Rất đơn giản.</li>
                                            </ul>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            <!-- // END BODY -->
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">
                            <!-- BEGIN FOOTER // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateFooter">
                                <tr>
                                    <td valign="top" class="footerContent" mc:edit="footer_content00">
                                        <a href="https://twitter.com/6iroart">Follow on Twitter</a>&nbsp;&nbsp;&nbsp;<a href="https://www.facebook.com/groups/familycs4vn">Friend on Facebook</a>&nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" class="footerContent" style="padding-top:0;" mc:edit="footer_content01">
                                        <em>Copyright &copy; 2016 CS4VN, All rights reserved.</em>
                                        <br />
                                        Mọi sự gian lận trong game đều sẽ bị xử lý, Hình thức nghie
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" class="footerContent" style="padding-top:0;" mc:edit="footer_content02">
                                        <a href="http://cs4vn.vn">unsubscribe from this list</a>&nbsp;&nbsp;&nbsp;<a href="*|UPDATE_PROFILE|*">update subscription preferences</a>&nbsp;
                                    </td>
                                </tr>
                            </table>
                            <!-- // END FOOTER -->
                        </td>
                    </tr>
                </table>
                <!-- // END TEMPLATE -->
            </td>
        </tr>
    </table>
</center>
</body>
</html>