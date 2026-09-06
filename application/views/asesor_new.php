<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
      <!--begin::Info-->
			<div class="d-flex align-items-center mr-1">
				<!--begin::Page Heading-->
				<div class="d-flex align-items-baseline flex-wrap mr-5">
					<!--begin::Page Title-->
					<h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">List Permohonan Per Tgl Permohonan</h2>
					<!--end::Page Title-->
					<!--begin::Breadcrumb-->

					<!--end::Breadcrumb-->
				</div>
				<!--end::Page Heading-->
			</div>

    </div>
  </div>
  <!--end::Subheader-->
  <!--begin::Entry-->
  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
  
        	<div class="card card-custom bg-gray-100 card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 bg-danger py-5">
												<h3 class="card-title font-weight-bolder text-white">Penilaian Per Sub Klasifikasi</h3>
												<div class="card-toolbar">
													
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body p-0 position-relative overflow-hidden">
												<!--begin::Chart-->
												<div  class="card-rounded-bottom bg-danger" style="height: 200px"></div>
												<!--end::Chart-->
												<!--begin::Stats-->
												<div class="card-spacer mt-n25">
													<!--begin::Row-->
													<div class="row m-0">
                            <?php foreach($klasifikasi as $row_klasifikasi) :?>
                              
                            <div class="col text-center bg-white px-6 py-8 rounded-xl mr-7 mb-7">
                             <a href="<?=base_url("sertifikasi/asesor_skema37/".$id1."/".encrypt_url($row_klasifikasi['id_sub_klasifikasi'])."/".$id3);?>" target="_blank" class="btn btn-light-dark font-weight-bold"><?=$row_klasifikasi['id_sub_klasifikasi'];?></a>
                            </div>
                          <?php endforeach ;?>
                          </div>
                          
													<!--end::Row-->
													<!--begin::Row-->
												
													<!--end::Row-->
												</div>
                        
												<!--end::Stats-->
											</div>
											<!--end::Body-->
										</div>
      </div>

    <!--end::Container-->
  </div>
  <!--end::Entry-->
</div>
