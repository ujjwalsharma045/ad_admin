<?php ob_start(); ?>
<?php if(strtolower($_SERVER['SERVER_NAME']) == "homedelivery.nydailynews.com")
{ 

$path = "https://homedelivery.nydailynews.com/ebill/images/devices";

} 
else
{

$path = "http://homedeliverytest.nydailynews.com/ebill/images/devices";

}

?>

<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
<title>E-Mail Confirmation</title>
<style type="text/css">
.ReadMsgBody {
	width: 100%;
}
.ExternalClass * {
	line-height: 121%;
}
.ExternalClass {
	width: 100%;
}
table {
	border-collapse: collapse;
}
0 table td {
 border-collapse: collapse;
}
.appleLinks a {
	color: #FFFFFF !important;
	text-decoration: none !important;
}
@media screen and (max-width: 680px), screen and (max-device-width: 680px) {
table[class=SwtW96P] {
	width: 96% !important;
}
table[class=setW100P], img[class=setW100P] {
	width: 100% !important;
	height: auto !important;
}
td[class=imgwidth] img {
	width: 100%;
}
td[class=none] {
	display: none !important;
}
td[class=aligncenter] {
	text-align: center !important;
}
}
@media screen and (max-width: 500px), screen and (max-device-width: 500px) {
table[class=setW2], img[class=setW2] {
	width: 100% !important;
	height: auto !important;
}
}
</style>
</head>
<?php 
require_once 'Mobile-Detect/Mobile_Detect.php';
$detect = new Mobile_Detect;
?>
<body>
<div align="center">
  <table border="0" width="700" cellspacing="0" cellpadding="0" class="setW100P">
    <tr>
      <td align="left" bgcolor="#ffffff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center"><table border="0" width="100%" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center" valign="top" class="imgwidth">
				  <img style="display: block; max-width:100%; max-height:100%;" src ="<?php echo $path; ?>/heder-img.jpg" border="0" alt="">
				  </td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td align="left" valign="top" bgcolor="#e20000"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="92%" align="left" valign="top" style="padding:12px 0px; font-size:30px; font-family:Arial, Helvetica, sans-serif; color:#fff; font-weight:bold; text-align:right;" class="aligncenter"> Thank you.</td>
                  <td class="none" width="8%" align="left" valign="top">&nbsp;</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td align="center" bgcolor="#ffffff" style=" mso-table-lspace:0; mso-table-rspace:0;"><table border="0" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0; mso-table-rspace:0;">
                <tr>
                  <td align="left" valign="top" style=" mso-table-lspace:0; mso-table-rspace:0;"><table border="0" width="270" cellspacing="0" cellpadding="0" align="left" class="setW100P">
                      <tr>
                        <td align="center" style=" mso-table-lspace:0; mso-table-rspace:0;"><table border="0" width="100%" cellspacing="0" cellpadding="0" class="setW2">
                            <tr>
                              <td align="center" style=" mso-table-lspace:0; mso-table-rspace:0;"><img style="display: block; max-width:100%; max-height:100%;" src="<?php echo $path; ?>/mobile-img-new.jpg" border="0" alt=""></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <table width="400" border="0" cellspacing="0" cellpadding="0" align="right" class="setW100P" style="mso-table-lspace:0; mso-table-rspace:0;">
                      <tr>
                        <td align="left" valign="top" style=" padding-top:5px;" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td align="center" valign="top" style="padding:30px 0px 20px 0px;"><img style="display: block; max-width:100%; max-height:100%;" src="<?php echo $path; ?>/dn-logo.jpg" border="0" alt=""></td>
                            </tr>
                            <tr>
                              <td align="left" valign="top" width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td align="center" style="font-family:Arial, Helvetica, sans-serif; color:#010101; font-size:30px; font-weight:bold; padding:10px 0px 20px 0px;">Download the Daily News 
                                      Mobile app today&#33;</td>
                                  </tr>
                                  <tr>
                                    <td align="center" style="font-family:arial; color:#010101; font-size:18px; font-weight:normal; padding-bottom:10px;">It combines our award-winning news and sports&#44; restaurant guides&#44; photo galleries and blogs with thousands of local listings that give users complete guides to everything from coffee shops to nightclubs&#44; Wi-Fi hotspots to the latest events and special deals&#46; </td>
                                  </tr>
                                  <?php if ($detect->isMobile() && $detect->isAndroidOS()) { ?>
                                  <tr>
                                    <td align="center" style="padding-top:30px;"><a href="https://play.google.com/store/apps/details?id=com.freerange360.mpp.NYDN"><img style="display: block; max-width:100%; max-height:100%;" src="<?php echo $path; ?>/download-now.jpg" border="0" width="303" height="81" alt=""></a></td>
                                  </tr>
                                  <?php } else if ($detect->isMobile() && $detect->is('iOS')){  ?>
                                  <tr>
                                    <td align="center" style="padding-top:30px;"><a href="https://itunes.apple.com/in/app/daily-news-mobile/id354730788?mt=8"><img style="display: block; max-width:100%; max-height:100%;" src="<?php echo $path; ?>/download-now.jpg" border="0" width="303" height="81" alt=""></a></td>
                                  </tr>
                                  <?php }  else { ?>
                                  <tr>
                                    <td align="center" style="padding-top:30px;"><a href="http://www.nydailynews.com/services/mobile?_src=mobileapp"><img style="display: block; max-width:100%; max-height:100%;" src="<?php echo $path; ?>/download-now.jpg" border="0" width="303" height="81" alt=""></a></td>
                                  </tr>
                                  <?php  }
                                  ?>
                                </table></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td align="center" style="padding-bottom:15px;"><table border="0" width="100%" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="100%" align="center"  style="background-color:#ffffff;font-family: Verdana, Arial, Helvetica, Sans-serif; font-size:12px; padding-top:12px; padding-bottom: 10px; color: #090909;"><center>
                      <a href= "http://www.nydailynews.com/services/terms-services" style="text-decoration:none; color: #010101;"> Terms of Service</a> | <a href= "http://www.nydailynews.com/services/privacy-policy" style="text-decoration:none; color:#010101;">Privacy Policy.</a><br />
                      Daily News, L.P.<br />
                      4 New York Plaza<br />
                      New York, NY 10004
                    </center></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
  </table>
</div>
</body>
</html>
<?php 
    
    $data = ob_get_contents();
    ob_end_clean();
?>
