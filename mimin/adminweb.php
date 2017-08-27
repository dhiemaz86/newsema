<?php
include "lib/config.php";     			
include "lib/koneksi.php";
ob_start();
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
} else { 
	$user = $_SESSION['username'];
    $sqlUser = "select * from cera_user where nama_user='".$_SESSION['username']."'";

 	$kuerisqluser= mysqli_query($koneksi,"select * from cera_user where nama_user='".$_SESSION['username']."'");
 
 	$user = $_SESSION['username'];

 	  


	?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Administrator Cera</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.5 -->
		<link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- jvectormap -->
		<link rel="stylesheet" href="asset/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="asset/dist/css/AdminLTE.min.css">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="asset/dist/css/skins/_all-skins.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">

			<header class="main-header">

				<!-- Logo -->
				<a href="index2.html" class="logo"> <!-- mini logo for sidebar mini 50x50 pixels --> <span class="logo-mini"><b>A</b>LT</span> <!-- logo for regular state and mobile devices --> <span class="logo-lg"><b>Admin</b>Sistem</span> </a>

				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a>
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<!-- Messages: style can be found in dropdown.less-->

							<!-- Notifications: style can be found in dropdown.less -->

							<!-- Tasks: style can be found in dropdown.less -->
							<li>
							<a href="#"><i class="fa fa-globe"></i></a>

							</li>
							<!-- User Account: style can be found in dropdown.less -->
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="asset/dist/img/winda.jpg" class="user-image" alt="User Image"> <span class="hidden-xs"><?php 	  echo "<text class='text-uppercase'> $user </text>"; ?></span> </a>
								<ul class="dropdown-menu">
									<!-- User image -->
									<li class="user-header">
										<img src="asset/dist/img/winda.jpg" class="img-circle" alt="User Image">
										<p>
											Alexander Pierce - Web Developer
											<small>Member since Nov. 2012</small>
										</p>
									</li>
									<!-- Menu Body -->
									<li class="user-body">
										<div class="col-xs-4 text-center">
											<a href="#">Followers</a>
										</div>
										<div class="col-xs-4 text-center">
											<a href="#">Sales</a>
										</div>
										<div class="col-xs-4 text-center">
											<a href="#">Friends</a>
										</div>
									</li>
									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-left">
											<a href="#" class="btn btn-default btn-flat">Profile</a>
										</div>
										<div class="pull-right">
											<a href="admin/logout.php" class="btn btn-default btn-flat">Sign out</a>
										</div>
									</li>
								</ul>
							</li>
							<!-- Control Sidebar Toggle Button -->

						</ul>
					</div>

				</nav>
			</header>
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					<!-- Sidebar user panel -->
					<div class="user-panel">
						<div class="pull-left image">
							<img src="asset/dist/img/winda.jpg" class="img-circle" alt="User Image">
						</div>
						<div class="pull-left info">
							<p>
								<?php 	  echo "<text class='text-uppercase'> $user </text>"; ?>
							</p>
							<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
						</div>
					</div>
					<!-- search form -->
					<form action="#" method="get" class="sidebar-form">
						<div class="input-group">
							<input type="text" name="q" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
								<button type="submit" name="search" id="search-btn" class="btn btn-flat">
									<i class="fa fa-search"></i>
								</button> </span>
						</div>
					</form>
					<!-- /.search form -->
					<!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu">
						<li class="header">
							MAIN NAVIGATION
						</li>

						<li>
							<a href="adminweb.php?module=home"> <i class="fa fa-home"></i> <span>Home</span> </a>
						</li>
					
						<li>
							<a href="adminweb.php?module=marketing_sales"> <i class="fa fa-male"></i> <span>Marketing Sales</span> </a>
						</li>

						<li>
							<a href="adminweb.php?module=category"> <i class="fa fa-th"></i> <span>Category</span> </a>
						</li>

						<li>
							<a href="adminweb.php?module=product"> <i class="fa fa-th"></i> <span>Products</span> </a>
						</li>
						<li>
							<a href="adminweb.php?module=sales"> <i class="fa fa-shopping-cart"></i> <span>Sales</span> </a>
						</li>
						
           				 <li>
            				<a href="adminweb.php?module=client"> <i class="fa fa-users"></i> <span>Client</span> </a>
         	 			</li>
						<li>
							<a href="adminweb.php?module=rekap_order"> <i class="fa fa-cog"></i> <span>Rekap Order</span> </a>
						</li>
						<li>
							<a href="logout.php"> <i class="fa fa-power-off"></i> <span>Logout</span> </a>
						</li>



					</ul>
				</section>
				<!-- /.sidebar -->
			</aside>
			<?php

            if ($_GET['module'] == 'home') {
                include "module/home/index.php";

			} elseif ($_GET['module'] == 'marketing_sales') {
                include "module/marketing_sales/list_user.php";
            } elseif ($_GET['module'] == 'tambah_user') {
                include "module/marketing_sales/tambah_user.php";
            } elseif ($_GET['module'] == 'edit_kategori') {
                include "module/marketing_sales/form_edit.php";
            } elseif ($_GET['module'] == 'simpan_user') {
                include "module/marketing_sales/aksi_simpan.php";
            } elseif ($_GET['module'] == 'hapus_user') {
                include "module/marketing_sales/aksi_hapus.php";

            } elseif ($_GET['module'] == 'edit_user') {
                include "module/marketing_sales/edit_user.php";
            } elseif ($_GET['module'] == 'aksi_edit') {
                include "module/marketing_sales/aksi_edit.php";
            } elseif ($_GET['module'] == 'edit_user') {
               include "module/marketing_sales/edit_user.php";
           } elseif ($_GET['module'] == 'print_user') {
               include "module/marketing_sales/print_user.php";


			} elseif ($_GET['module'] == 'category') {
                include "module/kategori/list_kategori.php";
            } elseif ($_GET['module'] == 'tambah_category') {
                include "module/kategori/form_tambah.php";
            } elseif ($_GET['module'] == 'edit_category') {
                include "module/kategori/form_edit.php";
            } elseif ($_GET['module'] == 'aksiedit_category') {
                include "module/kategori/aksi_edit.php";
            } elseif ($_GET['module'] == 'hapus_category') {
                include "module/kategori/aksi_hapus.php";
           } elseif ($_GET['module'] == 'simpan_category') {
                include "module/kategori/aksi_simpan.php";
            } elseif ($_GET['module'] == 'print_category') {
                include "module/kategori/print_category.php";

            } elseif ($_GET['module'] == 'product') {
                include "module/product/list_produk.php";
            } elseif ($_GET['module'] == 'tambah_produk') {
                include "module/product/form_tambah.php";
            } elseif ($_GET['module'] == 'edit_produk') {
                include "module/product/form_edit.php";
            } elseif ($_GET['module'] == 'child_home') {
                include "module/product/home_child.php";
            } elseif ($_GET['module'] == 'print_produk') {
                include "module/product/print_produk.php";

            } elseif ($_GET['module'] == 'quotation') {
                include "module/quotation/list_quotation.php";
            } elseif ($_GET['module'] == 'tambah_quotation') {
                include "module/quotation/form_tambah.php";
            } elseif ($_GET['module'] == 'edit_quotationn') {
                include "module/quotation/form_edit.php";
            } elseif ($_GET['module'] == 'print_detail_quotation') {
                include "module/quotation/print_details.php";    
            }elseif ($_GET['module'] == 'print_quotation') {
                include "module/quotation/print_quotation.php";

            } elseif ($_GET['module'] == 'purchase_order') {
                include "module/purchase_order/list_po.php";
            } elseif ($_GET['module'] == 'tambah_po') {
                include "module/purchase_order/form_tambah.php";
            } elseif ($_GET['module'] == 'edit_jual') {
                include "module/purchase_order/form_edit.php";
           } elseif ($_GET['module'] == 'print_po') {
                include "module/purchase_order/print_po.php";

            } elseif ($_GET['module']=='invoice') {
            	include "module/invoice/list_invoice.php";
           	} elseif ($_GET['module'] == 'tambah_invoice') {
               include "module/invoice/form_tambah.php";
            } elseif ($_GET['module'] == 'edit_invoice') {
               include "module/invoice/form_edit.php";
            } elseif ($_GET['module'] == 'print_invoice') {
                include "module/invoice/print_invoice.php";

            } elseif ($_GET['module']=='kwitansi') {
              include "module/kwitansi/list_kwitansi.php";
            } elseif ($_GET['module'] == 'tambah_kwitansi') {
               include "module/kwitansi/form_tambah.php";
            } elseif ($_GET['module'] == 'edit_admin') {
               include "module/kwitansi/form_edit.php";
            } elseif ($_GET['module'] == 'print_kwitansi') {
                include "module/kwitansi/print_kwitansi.php";

            } elseif ($_GET['module'] == 'client') {
                include "module/client/list_client.php";
            } elseif ($_GET['module'] == 'tambah_client') {
                include "module/client/form_tambah.php";
            } elseif ($_GET['module'] == 'edit_client') {
                include "module/client/form_edit.php";
            } elseif ($_GET['module'] == 'print_client') {
                include "module/client/print_client.php";

            } elseif ($_GET['module'] == 'rekap_order') {
                include "module/rekap_order/list_rekap.php";
            } elseif ($_GET['module'] == 'tambah_rekap') {
                include "module/rekap_order/form_tambah.php";
            } elseif ($_GET['module'] == 'edit_rekap') {
                include "module/rekap_order/form_edit.php";
            } elseif ($_GET['module'] == 'print_rekap') {
                include "module/rekap_order/print_rekap.php";         

			} elseif ($_GET['module'] == 'sales') {
                include "module/sales/sales.php";
            } elseif ($_GET['module'] == 'tambah_rekap') {
                include "module/rekap_order/form_tambah.php";
            } elseif ($_GET['module'] == 'edit_rekap') {
                include "module/rekap_order/form_edit.php";
            } elseif ($_GET['module'] == 'print_rekap') {
                include "module/rekap_order/print_rekap.php";
            }

            else {
            	 include "module/home/index.php";
            }
			?>

			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					<b>Version</b> 2.3.0
				</div>
				<strong>Copyright &copy; 2017 <a href="ceraproduction.com">Cera Production</a>.</strong> All rights reserved.
			</footer>

			<!-- Control Sidebar -->

			<!-- Add the sidebar's background. This div must be placed
			immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>

		</div><!-- ./wrapper -->

		<!-- jQuery 2.1.4 -->
		<script src="asset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
		<!-- Bootstrap 3.3.5 -->
		<script src="asset/bootstrap/js/bootstrap.min.js"></script>
		<!-- FastClick -->
		<script src="asset/plugins/fastclick/fastclick.min.js"></script>
		<!-- AdminLTE App -->
		<script src="asset/dist/js/app.min.js"></script>
		<!-- Sparkline -->
		<script src="asset/plugins/sparkline/jquery.sparkline.min.js"></script>
		<!-- jvectormap -->
		<script src="asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<!-- SlimScroll 1.3.0 -->
		<script src="asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<!-- ChartJS 1.0.1 -->
		<script src="asset/plugins/chartjs/Chart.min.js"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<script src="asset/dist/js/pages/dashboard2.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="asset/dist/js/demo.js"></script>

		<script type="text/javascript">
			
			function editPrice(a,b,c) {
				console.log({ a,b,c });
			}

		</script>

		<script type="text/javascript">

		  $('#newquotation').modal({
		  	backdrop:'static',
		    keyboard: false
		  });
		  $('#newquotation').modal('hide')
		  <?php
		    if(isset($_SESSION['formData'])){
		    	if(array_key_exists('quotationNo', $_SESSION['formData']) || (trim($_SESSION['formData']['quotationNo']) !== '') ){
		      ?>
		      
		      	$('#newquotation').modal('show');

		      <?php
		  		}
		    }
		  ?>

		  /* get price and wty from select */
		  function setPriceQtyQuotation(el,a){
		  	console.log(a);

		  	$.ajax({
		  		url : 'module/sales/aksi_sales.php',
		  		type : 'post',
		  		data : { aksi_getPriceQty : 'adajah', pp_id : a },
		  		success : function(data){
		  			console.log(data);
		  			// set value qty
		  			var td = el.parent();
		  			var tr = td.parent();

		  			tr.find('.qty').val(data.pp_qty);
		  			tr.find('.price').val(data.pp_price);
		  		}

		  	});
		  }
		</script>

	      <script type="text/javascript" src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	      <script type="text/javascript">
	      

	        tinymce.init({
	          selector: '#artikel',
	          height: 500,
	          theme: 'modern',
	          plugins: [
	            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
	            'searchreplace wordcount visualblocks visualchars code fullscreen',
	            'insertdatetime media nonbreaking save table contextmenu directionality',
	            'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
	          ],
	          toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	          toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
	          image_advtab: true
	         });


	      </script>

	</body>
</html>
<?php } ?>
