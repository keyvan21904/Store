<!-- <script type="text/javascript">
	$(document).ready(function($) {
		$.cookie("userme=yyy");
	});
</script> -->

<!-- <?php echo 'امروز  ' . farsiDate(date('Y-m-d H:i:s'), "l d F ماه Y-H:i"); ?>
 --><?php if (@$_SESSION['username']): ?>
	<div>
		Welcome <?php echo $_SESSION['username']." <br> ".$_SESSION['email'] ?>
		<span><a href="index.php?method=logout">Logout</a></span>
	</div>
<?php else: ?>
	<?php header('location:index.php') ?>
<?php endif ?>

<?php 

			
 ?>

<form action="" method="Post" class="tt">
	<div class="tt">
		<!-- <label for="code">کد</label>
		<input type="text" name="code" autofocus required><br> -->
		<label for name> نام محصول</label>
		<input type="text" name="frm[name]" autofocus required><br>
		<label for="price">قیمت</label>
		<input type="text" name="frm[price]" autofocus required><br>
		<label for="discount">تخفیف</label>
		<input type="text" name="frm[discount]" autofocus required><br>
		<label for="date">تاریخ سفارش</label>
		<input type="date" name="frm[dtrequest]" autofocus required><br>
		<button type="submit" name="savepro" class="btn btn-primary">ثبت</button> 
	</div>
	

	  <?php
// print_r($_POST);die;
	if(!empty(@$_POST['frm']))
	{
		$frm = $_POST['frm'];
		
		$sql = "INSERT INTO products (name,price,discount,dtrequest) VALUES ('{$frm['name']}','{$frm['price']}',
		'{$frm['discount']}','{$frm['dtrequest']}')";
		mysqli_query($link,$sql);
		echo 'successed!';

	}
	?>

</form>
<form action="" method="post">
	<div>
	<?php $sql = "SELECT * from products";
		$result = mysqli_query($link, $sql);
	 ?>	
	<table id="t1" style="text-align: center;direction: rtl;">

		
		<th>کد محصول</th>
		<th>نام محصول</th>
		<th>قیمت</th>
		<th>تخفیف</th>
		<th>تاریخ سفارش</th>
		
		<?php while ($row = mysqli_fetch_assoc($result)):?> 
		    
		<tr>
			<td><?php echo $row['code']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['price']; ?></td>
			<td><?php echo $row['discount']; ?></td>
			<td><?php echo $row['dtrequest']; ?></td>
		</tr>
		<?php endwhile ?>

	</table>
</div>
<br>
<br>
	<button type="submit" name="save" class="btn btn-primary"> ثبت </button>

	<select class="province-list">
		<option  value="" >استانها</option>
		<?php 
			$sql="SELECT * from `provinces`";
			$result = mysqli_query($link,$sql);
			while ($row=mysqli_fetch_assoc($result)):?>
			   <?php  echo "<option value='{$row['id']}'>" . $row['title'] . "</option>"  ?> 
			
			<?php endwhile ?>
		
	</select>
	<select style="width: 120px" class="city-list">
		
	</select>


</form>
<?php 
	$sql = "SELECT   * FROM `cities`";
	$result = mysqli_query($link,$sql);
	$cities=[];
	while ($row=mysqli_fetch_assoc($result)) {
	   $cities[$row['province_id']][$row['id']] = $row['title'];
	}
 ?>
<script type="text/javascript">
	var cities = <?php echo json_encode($cities); ?>;

	$('.province-list')
		.off('change')
		.change(function(event) {
			var provinceId = $(this).val();
			 // console.log(provinceId);
			$.each(cities, function(prId, city) {
				if (prId == provinceId ) {
					$('.city-list').empty();
					$.each(city, function(cityId, cityTitle) {
						$('.city-list').append('<option value="' + cityId + '">' + cityTitle + '</option>');
					});
				}
			});
		});
</script>