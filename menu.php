<!DOCTYPE html>




<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aplikasi Lisensi SIKI LPJK</title>
  <?php
  echo link_tag('assets/css/font.css');
  ?>
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/icons/icomoon/styles.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/core.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/components.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/colors.css'); ?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery.min.js'); ?>"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/loaders/pace.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/core/app.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/ui/nicescroll.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/ui/drilldown.js'); ?>"></script>
	<!-- /core JS files -->
	<?php
if (!empty($this->session->flashdata('title'))):
		?>
<script type="text/javascript">
		$(function () {
				new PNotify({
						title: '<?php echo $this->session->flashdata('title'); ?>',
						text: '<?php echo $this->session->flashdata('text'); ?>',
						addclass: '<?php echo $this->session->flashdata('class'); ?>'
				});
		});
</script>
<?php endif; ?>
</head>


<body class="sidebar-opposite-visible">




	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo base_url() ;?>"><img src="<?php echo base_url('assets/images/xz.png') ;?>" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-opposite-toggle"><i class="icon-menu"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">


			</ul>

			<p class="navbar-text"><span class="label bg-success-400">Online</span></p>

			<ul class="nav navbar-nav navbar-right">
				<?php if($this->ion_auth->sekertariat_1() OR $this->ion_auth->sekertariat_2()):?>
					<?php $this->load->model('Bu_model');
						//$notif2=$this->Bu_model->get_notification_tk();
						$notif2=array();

						$count2=0;
					 ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-bubbles4"></i>
						<span class="visible-xs-inline-block position-right">Notification</span>
						<span class="badge bg-warning-400">BU</span>
					</a>

					<div class="dropdown-menu dropdown-content width-350">
						<div class="dropdown-content-heading">
							Notification
							<ul class="icons-list">
								<li><a href="#"><i class="icon-compose"></i></a></li>
							</ul>
						</div>

						<ul class="media-list dropdown-content-body">
							<?php $notif2=$this->Bu_model->get_notification_bu_limit(); ?>
							<?php foreach ($notif2 as $row_notif):?>
								<?php $count2+=1; ;?>
							<li class="media">
								<div class="media-left"><img src="<?php echo base_url().'/assets/images/logo_LPJK.jpg' ;?>" class="img-circle img-sm" alt=""></div>
								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold"><?php echo $row_notif['nama_lsbu'] ;?></span>

										<?php
		                $x = new DateTime($row_notif['Log']);
		                $y = new DateTime();

		                $perbedaan = $x->diff($y);
		                if($perbedaan->y!=0):?>
										<span class="media-annotation pull-right"><?php echo $perbedaan->y.' years ago';?></span>

		                <?php elseif($perbedaan->m!=0):?>
											<span class="media-annotation pull-right"><?php echo $perbedaan->m.' mounth ago';?></span>

		                <?php elseif($perbedaan->d!=0):?>
											<span class="media-annotation pull-right"><?php echo $perbedaan->d.' days ago';?></span>
		                <?php elseif($perbedaan->h!=0):?>
											<span class="media-annotation pull-right"><?php echo $perbedaan->h.' hours ago';?></span>

		                <?php elseif($perbedaan->i!=0):?>
											<span class="media-annotation pull-right"><?php echo $perbedaan->i.' min ago';?></span>

		                <?php elseif($perbedaan->s!=0):?>
												<span class="media-annotation pull-right"><?php echo $perbedaan->s.' sec ago';?></span>


		                <?php endif ?>



									</a>

									<span class="text-muted"><?php echo $row_notif['nama_asosiasi'] ;?> Telah diminta untuk memperbaiki data <?php echo $row_notif['nama_item'] ;?></span>
								</div>
							</li>
							<?php if($count2==5){
								break;
							}?>
						<?php endforeach ;?>
						</ul>

						<div class="dropdown-content-footer">
							<a href="<?php echo base_url('dashboard_sekretariat/detail_notification') ;?>" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li>
			<?php endif ;?>


				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="assets/images/placeholder.jpg" alt="">
						<span><?php echo $this->session->userdata('nama') ;?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?php echo base_url('login/keluar') ;?>"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

  <!-- Second navbar -->
	<div class="navbar navbar-default" id="navbar-second">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second-toggle">
			<ul class="nav navbar-nav">
				<?php if($this->ion_auth->asosiasi()) :?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-office"></i> Asosiasi <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">

						<li class="dropdown-header">Asosiasi</li>
						<li><a href="<?php echo base_url('dashboard_asosiasi') ;?>"><i class="icon-display4 position-left"></i> Dashboard</a></li>
						<li class="dropdown-submenu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-certificate"></i> Administrasi</a>
							<ul class="dropdown-menu">
								<li class="dropdown-header highlight">Administrasi</li>
								<li><a href="<?php echo base_url('administrasi') ;?>">Administrasi</a></li>
								<li><a href="<?php echo base_url('administrasi/ruang_lingkup') ;?>">Ruang Lingkup</a></li>
							</ul>
						</li>
						<li class="dropdown-submenu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-users4"></i> Struktur Organisasi</a>
							<ul class="dropdown-menu">
								<li class="dropdown-header highlight">Struktur Organisasi</li>
								<li><a href="<?php echo base_url('struktur_organisasi/lsbu') ;?>">LSBU</a></li>
								<li><a href="<?php echo base_url('struktur_organisasi/pengarah') ;?>">Pengarah</a></li>
								<li><a href="<?php echo base_url('pelaksana') ;?>">Pelaksana</a></li>

							</ul>
						</li>
						<li><a href="<?php echo base_url('pedoman') ;?>"><i class="icon-book"></i>Pedoman LSBU</a></li>
						<li><a href="<?php echo base_url('asesor') ;?>"><i class=" icon-users4"></i>Asesor</a></li>
						<li class="dropdown-submenu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-certificate"></i> Legalitas</a>
							<ul class="dropdown-menu">
								<li class="dropdown-header highlight">Legalitas</li>
								<li><a href="<?php echo base_url('legalitas') ;?>">Legalitas LSBU</a></li>
								<li><a href="<?php echo base_url('legalitas/akte_pendirian') ;?>">Akte Pendirian</a></li>
								<li><a href="<?php echo base_url('legalitas/akte_perubahan') ;?>">Akte Perubahan</a></li>
							</ul>
						</li>
						<li><a href="<?php echo base_url('sarana_prasarana') ;?>"><i class="icon-user-tie"></i>Sarana & Prasarana</a></li>
						<li><a href="<?php echo base_url('proker') ;?>"><i class=" icon-users4"></i>Program Kerjas</a></li>
						<li><a href="<?php echo base_url('skema') ;?>"><i class="icon-collaboration"></i>Skema Sertifikasi LSBU</a></li>
						<li><a href="<?php echo base_url('submit') ;?>"><i class="icon-pushpin"></i>Final Submit</a></li>
						<li><a href="<?php echo base_url('skema/skema_tambahan') ;?>"><i class="icon-collaboration"></i>Skema Tambahan</a></li>


							</ul>
						</li>
						<?php endif ;?>



				</li>
			</ul>


		</div>
	</div>
	<!-- /second navbar -->

          <?= $contents ?>

<!-- footer -->
  <div class="footer text-muted">
    &copy; 2019 <a href="#">Siki </a> by <a href="" target="_blank">Lembaga Pengembangan Jasa Konstruksi Nasional</a>
  </div>
  <!-- /footer -->

</body>
</html>
