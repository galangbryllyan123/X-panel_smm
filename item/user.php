<?php
include_once "koneksi.php";


$result = mysql_query("SELECT * FROM user ORDER BY level");
$jumlah = mysql_num_rows($result);
?>
<head>
<link rel="shortcut icon" href="icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Market-Voucher</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />


	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<link rel="stylesheet" href="css/responsive-tables.css">
<link rel="stylesheet" href="prettify/prettify.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/modernizr.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="js/responsive-tables.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.min.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
<script type="text/javascript" src="js/jquery.jgrowl.js"></script>
<script src="js/jquery-1.10.2.min.js"></script> 
<script src="js/jquery.cookies.js"></script> 
<script src="js/jquery.bxSlider.min.js"></script>
<script type="text/javascript">

		(function($){

			$(document).ready(function(){
			
				$.jGrowl.defaults.closer = true;

				$.jGrowl.defaults.animateOpen = {
					//width: 'show',
					opacity: 'show'
				};
				$.jGrowl.defaults.animateClose = {
					//width: 'hide',
					opacity: 'hide'
				};

				var msg2 = "<strong><b><a href='https://www.facebook.com/uhunets' target='_new'>Raka Tanvan Jr.</a></b></strong>";
				$.jGrowl(msg2, { header: 'List Admin :',sticky: true });
			});
		})(jQuery);

		</script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        
        //content slider
        jQuery('#slidercontent').bxSlider({
            prevText: '',
            nextText: ''
        });
        
    });
</script>
</head>
<body>
<text style='font-family: cursive; font-size: 15px;'>
                <h4 class="widgettitle">Jumlah User : <?php echo $jumlah; ?></h4>
            	<table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th class="center">username</th>
                            <th class="center">Saldo</th>
                            <th class="center">Level</th>
                            <th class="center">Uplink</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
<?php
while($row = mysql_fetch_array($result))
  { ?>
<tr>
<td class="center"><?php echo $row['username']; ?></td>
<td class="center"><?php echo $row['saldo']; ?></td>
<td class="center"><?php echo $row['level']; ?></td>
<td class="center"><<?php echo $row['uplink']; ?></td>
<?  }
mysql_close;
?>
                        </tr>
                    </tbody>
                </table>
</font>
</body>