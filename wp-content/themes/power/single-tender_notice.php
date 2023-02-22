<?php
get_header();
?>

<div class="selection-result-single custom-single-page">
    <div class="content_details">
        <section class="breadcrumbs">
            <div class="container">
                <div class="breadcrumbs-content">
                    <span><a href="<?php echo get_site_url()?>"><?php _e('Home', POWER)?></a></span>
                    <span><a href="<?php echo get_site_url() .'/thong-bao-moi-thau'?>"><?php _e("Thông báo mời thầu", POWER)?></a></span>
                    <span class="title desktop"><?php echo paint_if_exist(get_the_title(get_the_ID())); ?></span>
                    <span class="title mobile"><?php _e('Chi tiết', POWER)?></span>
                </div>
            </div>
        </section>
        <section class="banner banner-single" style="background-image: url(<?php echo get_field('tender_notice_detail_banner', 'option')['image']?>)">
            <div class="container">
                <div class="content d-flex justify-content-between">
                    <h3><?php _e('Nối tuyến trung thế Công ty Điện lực Bình Phú năm 2023', POWER)?></h3>
                </div>
            </div>
        </section>
    </div>
</div>

<section class="details_news_page detail_tender_information">	
    <div class="container">
			<div class="content_details_news">
				<div class="table-box tender-infor-table">
					<?php 
						$tender_information = get_field('tender_informaton_group');
					?>
					<div class="tender-infor-title">
						<h5><?php _e('Thông tin mời thầu', POWER)?></h5>
						<?php foreach (get_the_terms( get_the_ID(), 'status') as $key => $value) : ?>
							<span class="status status-info status-<?php echo paint_if_exist($value->slug)?>"><?php echo paint_if_exist($value->name)?></span>
						<?php endforeach; ?>
					</div>
					<table class="table">
						<tbody class="table-body">
							<tr>
								<td><?php _e("Bên mời thầu", POWER)?></td>
								<td><?php echo paint_if_exist(get_field('bid_solicitor', get_the_ID()))?></td>
							</tr>
							<tr>
								<td><?php _e("Tên gói thầu", POWER)?></td>
								<td><?php echo paint_if_exist($tender_information['package_name'])?></td>
							</tr>
							<tr>
								<td><?php _e("Tên dự án", POWER)?></td>
								<td><?php echo paint_if_exist($tender_information['project_name'])?></td>
							</tr>
							<tr>
								<td><?php _e("Nguồn vốn", POWER)?></td>
								<td><?php echo paint_if_exist($tender_information['capital_source_name'])?></td>
							</tr>
							<tr>
								<td><?php _e("Hình thức lựa chọn nhà thầu", POWER)?></td>
								<td><?php echo paint_if_exist($tender_information['contractor_selection_form'])?></td>
							</tr>
							<tr>
								<td><?php _e("Lĩnh vực", POWER)?></td>
								<?php foreach (get_the_terms( get_the_ID(), 'field') as $key => $value) : ?>
									<td><?php echo paint_if_exist($value->name)?></td>
								<?php endforeach; ?>
							</tr>
							<tr>
								<td><?php _e("Thời gian bán HSMT", POWER)?></td>
								<td><?php echo paint_if_exist($tender_information['HSMT_sales_start_time']) . " đến " . paint_if_exist($tender_information['HSMT_sales_close_time'])?></td>
							</tr>
							<tr>
								<td><?php _e("Địa điểm bán HSMT", POWER)?></td>
								<td><?php echo paint_if_exist($tender_information['selling_place'])?></td>
							</tr>
							<tr>
								<td><?php _e("Địa chỉ", POWER)?></td>
								<td><?php echo paint_if_exist($tender_information['address'])?></td>
							</tr>
							<tr>
								<td><?php _e("Điện thoại", POWER)?></td>
								<td><?php echo paint_if_exist($tender_information['phone'])?></td>
							</tr>
							<tr>
								<td><?php _e("Fax", POWER)?></td>
								<td><?php echo paint_if_exist($tender_information['fax'])?></td>
							</tr>
							<tr>
								<td><?php _e("Email", POWER)?></td>
								<td><?php echo paint_if_exist($tender_information['email'])?></td>
							</tr>
							<tr>
								<td><?php _e("Giá bán 1 bộ HSMT", POWER)?></td>
								<td><?php echo paint_if_exist($tender_information['price_of_one_hsmt'])?></td>
							</tr>
							<tr>
								<td><?php _e("Trạng thái", POWER)?></td>
								<?php if ($tender_information['is_bidding'] == true) :?>
									<td>
										<span class="has_been_bid"><?php _e('Đã có kết quả lựa chọn nhà thầu')?></span>
										<a class="detail" href="<?php echo get_permalink($tender_information['status'])?>"><?php _e("Xem chi tiết", POWER)?></a>
								
									</td>
								<?php else : ?>
									<span class="has_not_been_bid"><?php _e('Chưa có kết quả lựa chọn nhà thầu')?></span>
								<?php endif?>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="table-box participating-in-tenders-table">
					<h5><?php _e('Tham dự thầu', POWER)?></h5>
					<table class="table">
						<tbody class="table-body">
							<?php 
								$participating_in_tenders = get_field('participating_in_tenders');
							?>
							<tr>
								<td><?php _e("Địa điểm nhận HSDT", POWER)?></td>
								<td><?php echo paint_if_exist($participating_in_tenders['receiving_place'])?></td>
							</tr>
							<tr>
								<td><?php _e("Địa chỉ", POWER)?></td>
								<td><?php echo paint_if_exist($participating_in_tenders['address'])?></td>
							</tr>
							<tr>
								<td><?php _e("Điện thoại", POWER)?></td>
								<td><?php echo paint_if_exist($participating_in_tenders['phone'])?></td>
							</tr>
							<tr>
								<td><?php _e("Fax", POWER)?></td>
								<td><?php echo paint_if_exist($participating_in_tenders['fax'])?></td>
							</tr>
							<tr>
								<td><?php _e("Thời điểm đóng thầu", POWER)?></td>
								<td><?php echo paint_if_exist($participating_in_tenders['time_of_bid_closing'])?></td>
							</tr>
							<tr>
								<td><?php _e("Email", POWER)?></td>
								<td><?php echo paint_if_exist($participating_in_tenders['email'])?></td>
							</tr>
							<tr>
								<td><?php _e("Bảo đảm dự thầu", POWER)?></td>
								<td><?php echo paint_if_exist($participating_in_tenders['bidding_guarantee'])?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="table-box bid-opening-table">
					<h5><?php _e('Mở thầu', POWER)?></h5>
					<table class="table">
						<tbody class="table-body">
							<?php 
								$bid_opening = get_field('bid_opening');
							?>
							<tr>
								<td><?php _e("Thời điểm mở thầu", POWER)?></td>
								<td><?php echo paint_if_exist($bid_opening['time_of_bid_opening'])?></td>
							</tr>
							<tr>
								<td><?php _e("Địa điểm", POWER)?></td>
								<td><?php echo paint_if_exist($bid_opening['place'])?></td>
							</tr>
							<tr>
								<td><?php _e("Điện thoại", POWER)?></td>
								<td><?php echo paint_if_exist($bid_opening['phone'])?></td>
							</tr>
							<tr>
								<td><?php _e("Fax", POWER)?></td>
								<td><?php echo paint_if_exist($bid_opening['fax'])?></td>
							</tr>
							<tr>
								<td><?php _e("Email", POWER)?></td>
								<td><?php echo paint_if_exist($bid_opening['email'])?></td>
							</tr>
							<tr>
								<td><?php _e("Địa chỉ", POWER)?></td>
								<td><?php echo paint_if_exist($bid_opening['address'])?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="table-box file-table">
					<h5><?php _e('Tài liệu mời thầu', POWER)?></h5>
					<table class="table">
						<tbody class="table-body">
							<?php 
								$file = get_field('bidding_documents');
							?>
							<tr>
								<td class="file-column">
									<a download href="<?php echo $file['file']?>" class="file">
										<div class="file-title d-flex">
											<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M15.2194 9.91364L9.62152 15.5116C8.15706 16.976 5.78269 16.976 4.31822 15.5116V15.5116C2.85375 14.0471 2.85375 11.6727 4.31822 10.2083L11.0947 3.43183C12.071 2.45552 13.6539 2.45552 14.6302 3.43183V3.43183C15.6065 4.40814 15.6065 5.99105 14.6302 6.96736L7.76957 13.828C7.28142 14.3161 6.48996 14.3161 6.00181 13.828V13.828C5.51365 13.3398 5.51365 12.5484 6.00181 12.0602L11.6839 6.37811" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round"/>
											</svg>
											<?php _e("Thông báo mời thầu", POWER)?>
										</div>
										<div class="download-btn d-flex">
											<span>Tải xuống</span>
											<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M7.0647 14.4005L10.0832 17.419C10.4412 17.777 11.0216 17.777 11.3795 17.419L14.398 14.4005M10.7314 17.1505L10.7314 4.31719" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round"/>
											</svg>
										</div>
									</a>
									
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="go-back">
						<a class="go-back-link" href="">
							<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M7.33336 7.32812L4.31487 10.3466C3.95689 10.7046 3.95689 11.285 4.31487 11.643L7.33336 14.6615M4.58336 10.9948L17.4167 10.9948" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round"/>
							</svg>
							<span><?php _e("Quay lại danh sách mời thầu", POWER)?></span>
						</a>
				</div>
			</div>
    </div>
</section>


<?php
    $other_info = get_field('tender_notice_detail_other_information', 'option');
?>
<section class="other-information">
    <div class="other-container ">
        <div class="other-content hover-zoom">
            <?php if ($other_info) : ?>
            <?php foreach ($other_info as $value) : ?>
                <a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo $value['text']; ?></span> </a>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End other information -->
<?php get_footer(); ?>