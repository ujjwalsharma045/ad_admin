<?php ob_start(); ?>

<?php if(strtolower($_SERVER['SERVER_NAME']) == "homedelivery.nydailynews.com")
{ 

$path = "https://homedelivery.nydailynews.com/";

} 
else
{

$path = "http://homedeliverytest.nydailynews.com/";

}

?>

<style type="text/css">
    .ReadMsgBody { width: 100%;}
    .ExternalClass {width: 100%;}
    div, p, a, li, td, *{-webkit-text-size-adjust:none;}


</style>
</head>
<body>
    <div align="center">
        <table border="0" width="750" cellspacing="0" cellpadding="0">
            <tr>
                <td align="left" style="padding:18px 0;">
                    <table border="0" width="100%" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="350" align="right" valign="middle"><img style="display:block;" border="0" src="<?php echo $path ?>images/Logo.png" width="322" height="74" alt="Daily News  any device. any time. anywhere." title="Daily News  any device. any time. anywhere."></td>
                            <td width="400" align="right" valign="middle">
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="left" width="85"><a href="#link"><img style="display:block;" src="<?php echo $path ?>images/icon1.jpg" width="73" height="71" border="0"></a></td>
                                        <td align="left" width="85"><a href="#link"><img style="display:block;" src="<?php echo $path ?>images/icon2.jpg" width="73" height="71" border="0" alt=""></a></td>
                                        <td align="left" width="85"><a href="#link"><img style="display:block;" src="<?php echo $path ?>images/icon3.jpg" width="73" height="71" border="0"></a></td>
                                        <td align="left" width="85"><a href="#link"><img style="display:block;" src="<?php echo $path ?>images/icon4.jpg" width="73" height="71" border="0"></a></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <table border="0" width="703" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="5" align="left" valign="top"><img style="display:block;" border="0" src="<?php echo $path ?>images/bdr-left.jpg" width="5" height="537"></td>
                            <td align="left" valign="top" width="310">
                                <table border="0" width="100%" cellspacing="0" cellpadding="0"  style="vertical-align: top !important;text-align:center !important">
                                    <tr>
                                        <td height="5"><img style="display:block;" border="0" src="<?php echo $path ?>images/bdr-top.jpg" width="310" height="5"></td>
                                    </tr>
                                    <tr>
                                        <td height="527" align="right" valign="middle">

                                            <table border="0" width="270" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td align="center" height="75" valign="top"><img style="display:block;" border="0" src="<?php echo $path ?>images/20121205_Thank You_2.png" width="247" height="55" alt="Thank You" title="Thank You"></td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="font:normal 12px arial; color:#434446;">

                                                        Thank you for your purchase.
                                                        <br>
                                                        We invite you to please contact customer service should you have any questions <br>
                                                        at: <font style="color:#ea262b;">(800) 692-6397</font>
                                                        <br><br>
                                                        Your subscription expiration date is:  <br>
                                                        {expiration_date}
                                                        <br><br>
                                                        If you purchased any apps and need assistance in installing them, please visit this page for detailed instructions:  <a href="http://www.nydn.com/onlinehelp" style="color:#ea262b; text-decoration:none;">Click Here</a><br>
                                                        If you ordered a home delivery subscription, delivery will begin within 5-7 business days.
                                                        <br><br>
                                                        <b>We look forward to serving you!</b>
                                                    </td>
                                                </tr>
                                            </table>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="5"><img style="display:block;" border="0" src="<?php echo $path ?>images/bdr-btm.jpg" width="310" height="5"></td>
                                    </tr>
                                </table>
                            </td>
                            <td width="388" align="right" valign="top"><img style="display:block;" border="0" src="<?php echo $path ?>images/banner.jpg" width="388" height="542" alt="Daily News" title="Daily News"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" style="font:normal 11px arial; color:#333333; line-height:16px; padding:10px 0;">
                    Daily News, L.P.<br>
                    4 New York Plaza<br>
                    7th Floor<br>
                    New York, NY 10004<br><br>
                    &copy; 2012 Daily News, L.P.
                </td>
            </tr>
        </table>
    </div>
	<?php 
	
	$data = ob_get_contents();
	ob_end_clean();
	
	?>
