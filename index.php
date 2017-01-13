<?php 
session_start();
require_once 'functions.php';
$result = get_product();
$artistTag = get_artist();
$typeTag = get_type();
$sizeTag = get_size();

// Lay gia tri tu GET
if (!empty($_GET)) {
	// Add link
	foreach($vars as $key => $value) { 
		if (!empty($_GET[$value])) { 
			$_GET[$value] = trim($_GET[$value]);


        	//Them vao cau lenh SQL
			$filter[] = $value." = '".$_GET[$value]."'"; 

        	//prepare value
			$binds[':'.$value] = $_GET[$value];

        	//Tao link moi
			if ($i == 0) {
				$href .= "?".$value."= ".$_GET[$value];
			} else {
				$href .= "&".$value."= ".$_GET[$value];
			}
			$i++;
		}
	}
	$result_filter = filter_data($filter, $binds);

}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<style>
		#container{
			width: 80%;
			margin: auto;
		}

		#container a{
			color: #369;
		}

		#container ul li a{
			color: #ff0000;
		}
	</style>
</head>
<body>
	<div id="container">

		<!-- Du lieu ban dau -->
		<ul>
			<?php if (empty($_GET)): ?>
				<?php foreach ($result as $row): ?>
					<li>
						<a href=""><?php echo $row['name'] ?></a>
					</li>
				<?php endforeach ?>

			<?php else: ?>
				<?php foreach ($result_filter as $row): ?>
					<li>
						<a href=""><?php echo $row['name'] ?></a>
					</li>
				<?php endforeach ?>
			<?php endif ?>
			
		</ul>


		<?php if (empty($_GET)): ?>
			<h4>Lọc theo artistTag</h4>
			<?php foreach ($artistTag as $artist): ?>
				<a href="index.php?artistTag=<?php echo $artist['id'] ?>"><?php echo $artist['name'] ?></a><br>
			<?php endforeach ?>

			<h4>Lọc theo typeTag</h4>
			<?php foreach ($typeTag as $type): ?>
				<a href="index.php?typeTag=<?php echo $type['id'] ?>"><?php echo $type['name'] ?></a><br>
			<?php endforeach ?>

			<h4>Lọc theo sizeTag</h4>
			<?php foreach ($sizeTag as $size): ?>
				<a href="index.php?sizeTag=<?php echo $size['id'] ?>"><?php echo $size['name'] ?></a><br>
			<?php endforeach ?>

			<h4>Lọc theo priceTag</h4>

			<!-- End du lieu ban dau -->
		<?php else: ?>


			<?php 
			// Loc theo artist
			$check_artist = array();
			echo "<h4>Lọc theo artistTag</h4>";
			foreach ($result_filter as $key => $value) {
				if (!empty($_GET['artistTag'])) {
					echo "<br>";

					$table = get_table($_GET['artistTag'], 'artisttag');
					foreach ($table as $row) {
						echo $row['name'];
						echo $href.'">(Xóa)</a>';
						echo "<br>";
					}
					break;
				} else{
					$table = get_table($value['artistTag'], 'artisttag');
					foreach ($table as $row) {
						if (!in_array($row['name'], $check_artist)) {
							$check_artist[] = $row['name'];
							echo $href.'&'.'artistTag'.'='.$value['artistTag'].'">'.$row['name'].'</a>';
							echo "<br>";
						}
					}
				}
			}


			// Loc theo type
			$check_type = array();
			echo "<h4>Lọc theo typeTag</h4>";
			foreach ($result_filter as $value) {
				if (!empty($_GET['typeTag'])) {
					$table = get_table($_GET['typeTag'], 'typetag');
					foreach ($table as $row) {
						echo $row['name'];
						echo " <a href=''>(Xóa)</a>";
						echo "<br>";
					}
					break;
				} else{
					$table = get_table($value['typeTag'], 'typetag');
					foreach ($table as $row) {
						if (!in_array($row['name'], $check_type)) {
							$check_type[] = $row['name'];
							echo $href.'&'.'typeTag'.'='.$value['typeTag'].'">'.$row['name'].'</a>';
							echo "<br>";
						}					
					}
				}

			}



			// Loc theo size
			$check_size = array();
			echo "<h4>Lọc theo sizeTag</h4>";
			foreach ($result_filter as $value) {
				if (!empty($_GET['sizeTag'])) {
					$table = get_table($_GET['sizeTag'], 'sizetag');
					foreach ($table as $row) {
						echo $row['name'];
						echo " <a href=''>(Xóa)</a>";
						echo "<br>";
					}
					break;
				} else{
					$table = get_table($value['sizeTag'], 'sizetag');
					foreach ($table as $row) {
						if (!in_array($row['name'], $check_size)) {
							$check_size[] = $row['name'];
							echo $href.'&'.'sizeTag'.'='.$value['sizeTag'].'">'.$row['name'].'</a>';
							echo "<br>";
						}
					}
				}

			}
			?>
		<?php endif ?>


	</div>

</body>
</html>


