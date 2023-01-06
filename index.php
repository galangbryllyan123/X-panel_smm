<?php
// Script by Sebastian Wirajaya

session_start();
if(!isset($_SESSION['username'])) {
header('location:HomePage/'); }
else { $username = $_SESSION['username']; }
require_once("koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);

$user = mysql_query("SELECT * FROM user");
$transaksi = mysql_query("SELECT * FROM historyall");
$totaluser = mysql_num_rows($user);
$totaltransaksi = mysql_num_rows($transaksi);

$nama = $get['nama'];
$level = $get['level'];
$saldo = " " . number_format($get['saldo'],0,',','.');
$uplink = $get['uplink'];
?>

<?php
if ($get['level'] == 'Banned') { 
echo "Maaf Akun Telah Di Banned.";
} else {
?>

<!DOCTYPE html>
<html>
    
<!-- Mirrored from coderthemes.com/ubold_1.5/light_purple/dashboard_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Mar 2016 13:30:45 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="http://www.gv.com/img/press/gv-on-black.png">

        <title> Market - Media - Market Shop Online</title>
        
        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="asset/plugins/morris/morris.css">
        <link href="asset/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

        <link href="asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="asset/css/core.css" rel="stylesheet" type="text/css" />
        <link href="asset/css/components.css" rel="stylesheet" type="text/css" />
        <link href="asset/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="asset/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="asset/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="asset/js/modernizr.min.js"></script>
<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69506598-1', 'auto');
  ga('send', 'pageview');
</script>
        
    </head>
<script type='text/javascript'>
//<![CDATA[
shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","\\":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("Ctrl+U",function(){top.location.href="logout.php"});
//]]>
</script>
<script language=JavaScript>
<!--

//Disable right mouse click Script
//By Maximus (maximus@nsimail.com) w/ mods by DynamicDrive
//For full source code, visit http://www.dynamicdrive.com

var message="Not Found!";

///////////////////////////////////
function clickIE4(){
if (event.button==2){
alert(message);
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("alert(message);return false")

// -->
</script>

    <body class="fixed-left">
        <div id="wrapper">
            <div class="topbar">
                <div class="topbar-left">
                    <div class="text-center">
                              <a href="/index.php" class="logo"><i class="fa fa-tag"></i><span> Market - Media </span></a>
                    </div>
                </div>
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="javascript:;" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                       
    <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">1</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="text-center notifi-title">Notification</li>
                                        <li class="list-group">
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-arrow-circle-up fa-2x text-danger"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">Selamat Datang</div>
                                                    <p class="m-0">
                                                       <small>30 April 2016</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    

                                                    </p>
                                                 </div>
                                              </div>
                                           </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="javascript:;" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-screen-lock-rotation"></i></a>
                                </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                           
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                               
                                                  
                             </div>
                          
                        </div>
                    </div>
                    <div id="sidebar-menu">
                        <ul>
                        	<li class="text-muted menu-title">Content Fiture</li>


                            <li>
					    <a href="/index.php" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
							</li>

                            <li class="has_sub">
                                <a href="javascript:;" class="waves-effect"><i class="fa fa-fire"></i><span>API Document</span><span class="pull-right"><i class="md md-two"></i></span></a>
                                <ul class="list-unstyled">
                                    <a href="javascript:;" onclick="buka('api/api');"></li>Create Api</a></li>
                                </ul>
                            </li>
                            <li>

                                <a href="javascript:;" class="waves-effect"><i class="fa fa-cog"></i><span>Profile </span><span class="pull-right"><i class="md md-two"></i></span></a>
                                <ul class="list-unstyled">
                                    <a href="javascript:;" onclick="buka('panel/cpass');"></li>Change Password</a></li>
                                <a href="/logout.php" class="waves-effect"></i><span>Logout</span></a></li>
                                </ul>
                            </li>
                            <li>

                            <li>
                                <a href="javascript:;" onclick="buka('item2/ini');" class="waves-effect"><i class="fa fa-shopping-cart"></i><span class="label label-inverse pull-right">Ready</span><span> Mulai Order </span></a>
                            <li>
</li> <li class="has_sub"> <a href="#" class="waves-effect"><i class="fa fa-pencil"></i><span class="label label-info pull-right"></span><span>Tukar Point</span> </a> <ul class="list-unstyled"> <li> <a href="javascript:;" onclick="buka('panel/tukarpoint');">Tukar Point Saldo</a></li> </i> </a>
                                </a>
                            </li>
                                </a>
                            </li>
                            <li>
                                </a>
                            </li>
                            <li>
      </li>
                            <li>
                        </ul>
                    </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-rocket"></i> <span>Social Point</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                            <li>
               <a href="javascript:;" onclick="buka('item/dc');">
                                    <i class="fa fa-angle-double-right"></i> 5M Gold
                               </a>
                            </li>

                            <li>
               <a href="javascript:;" onclick="buka('item/dcgems');">
                                    <i class="fa fa-angle-double-right"></i> DC Gems - Test
                               </a>
                            </li>

<li>
               <a href="javascript:;" onclick="buka('item/toxp');">
                                    <i class="fa fa-angle-double-right"></i> 550M EXP
                               </a>
                            </li>
<li>
               <a href="javascript:;" onclick="buka('item/gold1');">
                                    <i class="fa fa-angle-double-right"></i> 90M Gold
                               </a>
                            </li>

<li>
               <a href="javascript:;" onclick="buka('item/dcexp450');">
                                    <i class="fa fa-angle-double-right"></i> 450M EXP
                               </a>
                            </li>

<li>
               <a href="javascript:;" onclick="buka('item/dcexp1');">
                                    <i class="fa fa-angle-double-right"></i> Dc EXP
                               </a>
                            </li>
<li>
               <a href="javascript:;" onclick="buka('item/dcbiggold');">
                                    <i class="fa fa-angle-double-right"></i> Big Gold
                               </a>
                            </li>
<li>
               <a href="javascript:;" onclick="buka('item/dcbigexp');">
                                    <i class="fa fa-angle-double-right"></i> BIG EXP
                               </a>
                            </li>
<li>
               <a href="javascript:;" onclick="buka('item/dcexpn');">
                                    <i class="fa fa-angle-double-right"></i> Dc EXP
                               </a>
                            </li>
<li>
               <a href="javascript:;" onclick="buka('item/dcgfx');">
                                    <i class="fa fa-angle-double-right"></i> DC GFX
                               </a>
                            </li>
<li>
               <a href="javascript:;" onclick="buka('item/dcgold');">
                                    <i class="fa fa-angle-double-right"></i> DC GOLD
                               </a>
                            </li>
<li>
               <a href="javascript:;" onclick="buka('item/se');">
                                    <i class="fa fa-angle-double-right"></i> Social Empires
                               </a>
                            </li>
<li>
               <a href="javascript:;" onclick="buka('item/sw');">
                                    <i class="fa fa-angle-double-right"></i> Social Wars 
                               </a>
                            </li>
<li>
               <a href="javascript:;" onclick="buka('item/swreset');">
                                    <i class="fa fa-angle-double-right"></i> Social Wars Reset
                               </a>
                            </li>


                                    </ul>
                                </li>

                           <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-linux"></i> <span>Hosting</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="javascript:;" onclick="buka('item/cpanel');">cPanel</a></li>
									

                                    </ul>
                                </li>
									
									                           <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-linux"></i> <span>Amazon</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="javascript:;" onclick="buka('item/Amazon');">Akun Amazon</a></li>
                               </a>
                            </li>
								

                                    </ul>
                                </li>	
									 <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-rocket"></i> <span>Keb.Editing</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                            <li>
               <a href="javascript:;" onclick="buka('item/pp');">
                                    <i class="fa fa-angle-double-right"></i> PP Penjoki Keren
                               </a>
                            </li>
							
							<li>
               <a href="javascript:;" onclick="buka('item/cap');">
                                    <i class="fa fa-angle-double-right"></i> Cap Order
                               </a>
                            </li>
							
						
                                    </ul>
                                </li>

                           <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-linux"></i> <span>P.O Web Phising</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="javascript:;" onclick="buka('item/pesing');">P.O Web Phising</a></li>


                                </ul>
                            </li>
							
                           <li class="has_sub">
<a href="javascript:;" onclick="buka('panel/history');" class="waves-effect"><i class="fa fa-dollar"></i><span class="label label-info pull-right"></span><span> History Order </span></a></li>
<li>      
                                <a href="javascript:;" onclick="buka('HomePage/content/zharga');" class="waves-effect"><i class="fa fa-tag"></i><span class="label label-info pull-right"></span><span> Daftar Harga </span></a>
                            </li>
                            </li>
                           </li>

                            <li class="has_sub">
                             <li>
                            </li>
                            <li>

                             <li>
                            </li>
                            <li>                              

                               <li class="has_sub">
                                <a href="javascript:;" class="waves-effect"><i class="fa fa-user"></i><span> User Panel </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                	<?php if($level == 'Admin') { ?>

                            <li>
                                <a href="javascript:;" onclick="buka('panel/tambahuser');">
                                    </i> Tambah User
                                </a>
                            </li>
                            <li>
                            </li>
                            <li>
                                <a href="javascript:;" onclick="buka('panel/gantistatusorder');">
                                    </i> Ganti Status Orderan
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" onclick="buka('panel/cekorder');">
                                    </i> Cek Order
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" onclick="buka('panel/cekuser');">
                                    </i> Cek User
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" onclick="buka('panel/hapususer');">
                                    </i> Hapus User
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" onclick="buka('panel/topupsaldo');">
                                    </i> TopUp Saldo
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" onclick="buka('panel/upgradeagen');">
                                    </i> Member To Agen
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" onclick="buka('panel/upgradetoress');">
                                    </i> Member To Reseller
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" onclick="buka('panel/upgradereseller');">
                                    </i> Agen To Reseller
                                </a>
                            </li>
<? } else if($level == 'Reseller') { ?>
                            <li>
                            </li>
                            <li>

                                <a href="javascript:;" onclick="buka('panel/tambahuser');">
                                    </i> Tambah User
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" onclick="buka('panel/upgradeagen');">
                                    </i> Member To Agen
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" onclick="buka('panel/topupsaldo');">
                                    </i> TopUp Saldo
                                </a>
                            </li>
<? } else if($level == 'Agen') { ?>
                            <li>
                            </li>
                            <li>
                            </li>

                                </a>
                            </li>
                           <li>
                                <a href="javascript:;" onclick="buka('panel/tambahanggota');">
                                    </i> Tambah User
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" onclick="buka('panel/topupsaldo');">
                                    </i> TopUp Saldo
                                </a>
                            </li>
                                <a href="javascript:;">
                                </a>
                            </li>
                            <li>
                                </a>
                            </li>
<? } ?>
                        </ul>
                    </li>
                </ul>
                            </li>
                            <li>
                            </li>
                            </li>
                            <li>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>  



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                            </div> 
                        </div>
                           
                <div class="content">
                    <div class="container">
                        <div class="alert alert-inverse bg-inverse">
                            <marquee direction="left" scrollamount="15" align="center">

<?php
$i=0;

$tampil = mysql_query("SELECT * FROM historyall ORDER BY id DESC");

while($data = mysql_fetch_array($tampil))
 {
 $i++;
 
echo " ~ (<b>".$data[tanggal]."</b>) <i>".$data[pembeli]."</i> telah melakukan pembelian ".$data[barang]." ~";
}
?>
</marquee>
</div>
                        <div class="row text-center">
                            <div class="col-md-6 col-sm-6 col-lg-3 hidden-xs">
                                <div class="panel panel-border panel-inverse widget-s-1">
                                    <div class="panel-heading"> </div>
                                    <div class="panel-body">
                                    <span class="text-muted">Nama</a></span>
                                    <div class="h2 text-inverse"><?php echo $nama ?></div>
                                    <div class="text-right">
                                      <i class="fa fa-tag fa-2x text-inverse"></i>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3 hidden-xs">
                                <div class="panel panel-border panel-inverse widget-s-1">
                                    <div class="panel-heading"> </div>
                                    <div class="panel-body">
                                    <span class="text-muted">Total All Order</a></span>
                                    <div class="h2 text-inverse"><?php echo $totaltransaksi ?></div>
                                    <div class="text-right">
                                      <i class="fa fa-shopping-cart fa-2x text-inverse"></i>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3 hidden-xs">
                                <div class="panel panel-border panel-inverse widget-s-1">
                                    <div class="panel-heading"> </div>
                                    <div class="panel-body">
                                    <span class="text-muted">Level Account</a></span>
                                    <div class="h2 text-inverse"><?php echo $level ?></div>
                                    <div class="text-right">
                                      <i class="fa fa-user fa-2x text-inverse"></i>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="panel panel-border panel-inverse widget-s-1">
                                    <div class="panel-heading"> </div>
                                    <div class="panel-body">
                                    <span class="text-muted">Saldo</a></span>
                                    <div class="h2 text-inverse"><?php echo $saldo ?></div>
                                    <div class="text-right">
                                      <i class="fa fa-money fa-2x text-inverse"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
<div class="col-md-12">
                                <div class="panel panel-color panel-inverse">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Information</h3> 
                                    </div> 
                                    <div class="panel-body" style="height: 200px; overflow-y: auto;">
<div class='alert alert-info'><strong><i class='ion-information-circled'></i> 2016-04-30</strong><br /><span class='label label-inverse'>News</span> Fiture , Dan Nikmatin Fiture Di WebMarket Kami.</div>
<div class='alert alert-danger'><strong><i class='ion-information-circled'></i> 2016-04-30</strong><br /><span class='label label-inverse'>INFO</span> Instan Fiture/Web Berganti menjadi Market-Media</div>	                                  </div> 
                                </div>                                  </div> 
                                </div>
                            </div>
                                </div>                                  
                        <div class="row">

    <div class="col-lg-8">
    <div class="panel panel-color panel-inverse" id="konten">
    <div class="panel-heading">
    <h3 class="panel-title"><i class="fa fa-home"></i> Home</h3>
    </div>
    <div class="panel-body">
<h2>Welcome to Market - Media</h2>
    </div>
    </div>
    </div>

                            <div class="col-md-4">
                                <div class="panel panel-color panel-inverse">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Result</h3>
                                    </div>
                                    <div class="panel-body">
                                        <p>
<div id="result"></div>
</p>
                              <div style="height: 300px; overflow-y: auto;">
                                        <ul class="list-group result">
                                        </ul>
                              </div>

                              <div style="display: none;" class="loading">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                            </div>
                        </div>
                        
<br/> 
              </div>

                <footer class="footer text-right">
                <footer class="footer text-right">2015 © Market - Media. CEO : </i><a href="https://www.facebook.com/100011605112467">Market - Media</a><br /></footer>                

            </div>
            
            
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
                        




            


    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="asset/js/jquery.min.js"></script>
        <script src="asset/js/bootstrap.min.js"></script>
        <script src="asset/js/detect.js"></script>
        <script src="asset/js/fastclick.js"></script>
        <script src="asset/js/jquery.slimscroll.js"></script>
        <script src="asset/js/jquery.blockUI.js"></script>
        <script src="asset/js/waves.js"></script>
        <script src="asset/js/wow.min.js"></script>
        <script src="asset/js/jquery.nicescroll.js"></script>
        <script src="asset/js/jquery.scrollTo.min.js"></script>
        <!-- jQuery  -->
        <script src="asset/plugins/moment/moment.js"></script>


        <script src="asset/plugins/morris/morris.min.js"></script>
        <script src="asset/plugins/raphael/raphael-min.js"></script>

         <script src="asset/plugins/sweetalert/dist/sweetalert.min.js"></script>

        <!-- Todojs  -->
        <script src="asset/pages/jquery.todo.js"></script>

        <!-- chatjs  -->
        <script src="asset/pages/jquery.chat.js"></script>

        <script src="asset/plugins/peity/jquery.peity.min.js"></script>
		
		<script src="asset/js/jquery.core.js"></script>
        <script src="asset/js/jquery.app.js"></script>

		<script src="asset/pages/jquery.dashboard_2.js"></script>
		
        

    </script>
</body>
<script>
// Script by Sebastian Wirajaya

function buka(nama) {
$("#konten").html('<div class="portlet-heading"><div class="portlet-title"><h4></h4></div><div class="clearfix"></div></div><div class="portlet-body"><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width: 100%"></div></div></div>');
	$.ajax({
		url	: nama+'.php',
		type	: 'GET',
		dataType: 'html',
		success	: function(isi){
			$("#konten").html(isi);
		},
	});
}

function post(){
    $('#result').html('<div class="progress progress-striped active"><div class="progress-bar progress-bar-inverse" style="width: 100%"></div></div>');
    $("input").attr("disabled", "disabled");
    $("select").attr("disabled", "disabled");
    $("button").attr("disabled", "disabled");
    $("textarea").attr("disabled", "disabled");
}
function hasil(){
    $("input").removeAttr("disabled");
    $("select").removeAttr("disabled");
    $("button").removeAttr("disabled");
    $("textarea").removeAttr("disabled");
}
</script>
</html>
<?php } ?>