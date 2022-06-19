<?php 
require_once 'include.php';
$cates=getAllCate();//得到所有商品的分类，数据库目前为空
//print_r($cates);
if(!($cates&is_array($cates))){
    //alertMes("不好意思，网站维护中...", "");
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>电子购物网站</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">

</head>

<body>
<div class="headerBar">
	<div class="topBar">
		<div class="comWidth">
			<div class="rightArea">
				<h2>欢迎来到购物网站！</h2>
				<?php if($_SESSION['loginFlag']):?>
				<span>欢迎您</span><?php echo $_SESSION['username'];?>
				<a href="doAction.php?act=userOut">[退出]</a>
				<?php else:?>
				<a href="login.php"><h2>[用户登录]</h2></a>
				<a href="../admin/login.php"><h2>[管理员登陆]</h2></a>
				<a href="../shopper/login.php"><h2>[商家登录]</h2></a>
				<a href="../provide/login.php"><h2>[供货商登录]</h2></a>
				<a href="reg.php"><h2>[用户注册]</h2></a>

				<?php endif;?>
			</div>
		</div>
	</div>
	<div class="logoBar">
		<div class="comWidth">
			<div class="search_box fl">
				<input type="text" class="search_text fl">
				<input type="button" value="搜 索" class="search_btn fr">
			</div>
			<div class="shopCar fr">
				<span class="shopText fl">购物车</span>
				<span class="shopNum fl">0</span>
			</div>
		</div>
	</div>
	<div class="navBox">
		<div class="comWidth clearfix">
			<div class="shopClass fl">
				<h1>全部商品分类</h1>	
			</div>
			
		</div>
	</div>
</div>

<div class="banner comWidth clearfix">	
</div>

<?php foreach ($cates as $cate):?>
<div class="shopTit comWidth">
	<span class="icon"></span><h3><?php echo $cate['cName']?></h3>
	<a href="#" class="more">更多&gt;&gt;</a>
</div>
<div class="shopList comWidth clearfix">
	
	<div class="rightArea">
		<div class="shopList_top clearfix">
		<?php 
		$pros=getProsByCid($cate['id']);
		if($pros&&is_array($pros)):
		foreach ($pros as $pro):
		$proImg=getProImgById($pro['id']);
		?>
			<div class="shop_item">
				<div class="shop_img">
					<a href="proDetails.php?id=<?php echo $pro['id']?>" target="_blank"><img height="200" width="187" src="image_800/<?php echo $proImg['albumPath'];?>" alt=""></a>
				</div>
				<h6><?php echo $pro['pName'];?></h6>
				<p><?php echo $pro['iPrice'];?></p>
			</div>
			<?php endforeach;?>
			<?php endif;?>
		</div>
		<div class="shopList_sm clearfix">
		<?php 
		$prosSmall=getSmallProsByCid($cate['id']);
		if($pros&&is_array($prosSmall)):
		foreach ($prosSmall as $proSmall):
		$proSmallImg=getProImgById($proSmall['id']);
		?>
			<div class="shopItem_sm">
				<div class="shopItem_smImg">
					<a href="proDetails.php?id=<?php echo $proSmall['id']?>" target="_blank"><img height="95" width="95" src="image_220/<?php echo $proImg['albumPath'];?>" alt=""></a>
				</div>
				<div class="shopItem_text">
				    <p><?php echo $proSmall['pName'];?></p>
					<h3>￥<?php echo $proSmall['iPrice'];?></h3>
				</div>
			</div>
			<?php endforeach;?>
			<?php endif;?>
		</div>
	</div>
</div>
<?php endforeach;?>
</body>
</html>
