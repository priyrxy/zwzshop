<?php 
require_once '../include.php';
checkLogined();
$rows=getProInfo();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>

<body>

<div class="details">
                    <div class="details_operation clearfix">
                        
                        <div class="fr">
                            <div class="text">
                                
                            </div>
                            <div class="text">
                               
                            </div>
                            
                        </div>
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="10%">编号</th>
                                <th width="20%">商品名称</th>
                                <th  width="80%">商品图片</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input  type="checkbox" id="c<?php echo $row['id'];?>" class="check" value=<?php echo $row['id'];?>><label for="c1" class="label"><?php echo $row['id'];?></label></td>
                                
                                <td><?php echo $row['pName']; ?></td>
								<td>
					                        			<?php 
					                        			$proImgs=getAllImgByProId($row['id']);
					                        			foreach($proImgs as $img):
					                        			?>
					                        			<img width="100" height="100" src="uploads/<?php echo $img['albumPath'];?>" alt=""/> &nbsp;&nbsp;
					                        			<?php endforeach;?>
					             </td>
					                 
					                        		
					                        		
                                
                                
                            </tr>
                           <?php  endforeach;?>
                        </tbody>
                    </table>
                </div>
 <script type="text/javascript">
 		function doImg(id,act){
			window.location="doAdminAction.php?act="+act+"&id="+id;
 	 	}
 </script>
</body>
</html>