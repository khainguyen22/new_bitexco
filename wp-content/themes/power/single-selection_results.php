<?php
get_header();
?>

<div class="selection-result-single custom-single-page">
    <div class="content_details">
        <section class="breadcrumbs">
            <div class="container">
                <div class="breadcrumbs-content">
                    <span><a href="https://power.dtts.com.vn"><?php _e('Home', POWER)?></a></span>
                    <span><a href="https://power.dtts.com.vn/danh-sach-tuyen-dung/"><?php _e("Kết quả lựa chọn nhà thầu", POWER)?></a></span>
                    <span class="title desktop"><?php _e('Gói thầu NQ2: Cung cấp, lắp đặt thí nghiệm', POWER)?></span>
                    <span class="title mobile"><?php _e('Chi tiết', POWER)?></span>
                </div>
            </div>
        </section>
        <section class="banner banner-single" style="background-image: url(<?php echo get_field('selection_result_banner', 'option')?>)">
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
						$package_id = get_field('package');
						$tender_information = get_field('tender_informaton_group', $package_id);
					?>
					<div class="tender-infor-title">
						<h5><?php _e('Chi tiết kết quả đấu thầu', POWER)?></h5>
					</div>
					<table class="table">
						<tbody class="table-body">
							<tr>
								<td><?php _e("Bên mời thầu", POWER)?></td>
								<td><?php echo paint_if_exist(get_field('bid_solicitor', $package_id))?></td>
							</tr>
							<tr>
								<td><?php _e("Tên gói", POWER)?></td>
								<td><?php echo paint_if_exist($tender_information['package_name'])?></td>
							</tr>
							<tr>
								<td><?php _e("Hình thức lựa chọn nhà thầu", POWER)?></td>
								<td><?php echo paint_if_exist($tender_information['contractor_selection_form'])?></td>
							</tr>
							<tr>
								<td><?php _e("Lĩnh vực", POWER)?></td>
								<?php foreach (get_the_terms( $package_id, 'field') as $key => $value) : ?>
									<td><?php echo paint_if_exist($value->name)?></td>
								<?php endforeach; ?>
							</tr>
							<tr>
								<td><?php _e("Thời gian bán HSMT", POWER)?></td>
								<td><?php echo paint_if_exist($tender_information['HSMT_sales_start_time']) . " đến " . paint_if_exist($tender_information['HSMT_sales_close_time'])?></td>
							</tr>
							<tr>
								<td><?php _e("Trạng thái", POWER)?></td>
								<?php if ($tender_information['is_bidding'] == true) :?>
									<td>
										<span class="has_been_bid"><?php _e('Đã có kết quả lựa chọn nhà thầu')?></span>
									</td>
								<?php else : ?>
									<span class="has_not_been_bid"><?php _e('Chưa có kết quả lựa chọn nhà thầu')?></span>
								<?php endif?>
							</tr>
						</tbody>
					</table>
				</div>
			
				<div class="table-box bid-opening-table">
					<h5><?php _e('Nhà thầu trúng thầu', POWER)?></h5>
					<table class="table">
						<tbody class="table-body">
							<?php 
								$winner = get_field('winner');
							?>
							<tr>
								<td><?php _e("Tên nhà thầu", POWER)?></td>
								<td><?php echo paint_if_exist($winner['name'])?></td>
							</tr>
							<tr>
								<td><?php _e("Địa điểm", POWER)?></td>
								<td><?php echo paint_if_exist($winner['dkkd_number'])?></td>
							</tr>
							<tr>
								<td><?php _e("Điện thoại", POWER)?></td>
								<td><?php echo paint_if_exist($winner['price'])?></td>
							</tr>
						</tbody>
					</table>
				</div>
			
				<div class="go-back">
						<a class="go-back-link" href="">
							<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M7.33336 7.32812L4.31487 10.3466C3.95689 10.7046 3.95689 11.285 4.31487 11.643L7.33336 14.6615M4.58336 10.9948L17.4167 10.9948" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round"/>
							</svg>
							<span><?php _e("Quay lại danh sách kết quả", POWER)?></span>
						</a>
				</div>
			</div>
    </div>
</section>


<?php
    $other_info = get_field('selection_result_other_information', 'option');
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