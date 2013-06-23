<?php
require_once('base.php');
require_once('BaseBusiness.php');
require_once('MininatureUtil.php');
require_once('AdminOrderBusiness.php');
require_once('AdminOrderRecordBusiness.php');


$orderbusi = new orderBusiness();
$orderrecord=new OrderRecordBusiness();


if ( $_REQUEST['act'] == 'list' ||empty($_REQUEST['act']))
{
   
	$currpage = $_REQUEST['p'];
	if (empty($currpage))
	{
		$currpage = 1;
	}
	$noticelist = $orderbusi->getAllOrders($currpage,PAGE_NUMBER);//修改为自己的分页查询函数//frm
	$smarty->assign("pagecount",$orderbusi->getTotalPage());
	//----------------分页公共部分---------------------------
	$smarty->assign("infor",$noticelist);
	//---------公共部分，看看是否需要加入---------------------
	$smarty->assign("url_here",$_TITLES['11_order_list']['text']);//url_here不能更改
	//$smarty->assign("action_link",$_TITLES['12_order_add']);//action_link 不能更改，或者为action_link1
	$smarty->display("backstage/admin_order_list.html");//html html得与目录对应
	
}
else if($_REQUEST['act'] == 'add')
{

	$smarty->display('backstage/admin_order_add.html');
	
}
else if($_REQUEST['act'] == 'edit')
{

	$mid = $_REQUEST['id'];
	$data = $orderbusi->getOneOrderByID($mid);
	$smarty->assign("data",$data[0]);
	$smarty->display("backstage/admin_order_add.html");
	
}
else if($_REQUEST['act'] == 'query')
{
    
	$currpage = $_REQUEST['p'];
	if (empty($currpage))
	{
		$currpage = 1;
	}
	
    $currpages = $_REQUEST['g'];
	if (empty($currpages))
	{
		$currpages = 1;
	}
	
    $noticelist = $orderbusi->getAllOrders($currpage,PAGE_NUMBER);
	$smarty->assign("pagecount",$orderbusi->getTotalPage());
	$smarty->assign("infor",$noticelist);//把订单信息罗列在订单列表上
	$mid = $_REQUEST['id'];//$userid = $_SESSION['baseinfo']['ID'];//可以显示当前登录者的ID
	$userid = 12;//假数据
	$order= $orderrecord->getOneOrderRecordByID($mid,$userid,$currpages,PAGE_NUMBER);//echo "<pre>"; print_r($order);
	$smarty->assign("order",$order);
	$smarty->display("backstage/admin_order_list.html");
	
}
else if($_REQUEST['act'] == 'delivery_list')
{
	
    $mid = $_REQUEST['id'];//订单的ID
    //$userid=$_SESSION['baseinfo']['ID'];
	$userid = 12;//假数据
	$orderdetail= $orderrecord->getOneOrderRecordByIDNP($mid,$userid);//一个商家下的商品明细
	$smarty->assign("orderdetail",$orderdetail);
	//echo"<pre>";print_r($orderdetail);
	
	$shop=$orderbusi->getShoper_infors($mid);//调取买家信息
	
	$smarty->assign("shop",$shop);
	
	
	
	$busi=$orderbusi->getUser_infors($userid);//调取商家信息
	
	$smarty->assign("busi",$busi);
	
	//echo "<pre>";print_r($shop);
	//echo "----------------------busi";
	//echo "<pre>";print_r($busi);
	//exit;
	
	$smarty->display("backstage/printOrder.html" );
	
}
else if($_REQUEST['act'] == 'order_query')
{
	
	$mid = $_REQUEST['id'];//订单ID,查询t_order_record可以把对应商品的ID联合t_goods表把对应订单的信息找出来
	$data = $orderbusi->getOneOrderByID($mid);
	$smarty->assign("data",$data[0]);
	$smarty->display("backstage/admin_order_rdonly.html");
	
}

else if ($_REQUEST['act'] == 'del')
{
	$mid = $_REQUEST['id'];//当前ID返回
	$orderbusi->deleteOrders($mid);
	echo "<script language='javascript'>";
	echo "location='order.php';";
	echo "</script>";
	
	
}
else if ($_REQUEST['act'] == 'submit')
{
	

	$id = $_REQUEST['id'];
	$data = $_POST['data'];

	if (empty($id))//新增
	{
		
		$orderbusi->insertOrders($data);
	}
	else //如果ID不空，说明是修改数据
	{
		$orderbusi->updateOrders($data, $id);
	}
	echo "<script language='javascript'>";
	echo "location='order.php';";
	echo "</script>";
	

}

else if($_REQUEST['act']=='save')
{
	//echo "hello";
	$orderid=$_POST['orderid'];//订单ID 为了更改价格
	$currtime = date("Y-m-d H:i:s");//提交当前时间
	$id=$_POST['detailid'];
	$shippingstatus=$_POST['shippingstatus'];
	$orderstatus=$_POST['orderstatus'];
	$singlsum=$_POST['singlsum'];
	$confirmtime=$_POST['confirmtime'];
	$agosum=$_POST['agosum'];
	/*echo "<pre>"; print_r($orderid);
	echo "<pre>"; print_r($id);
	echo "<pre>"; print_r($shippingstatus);
	echo "<pre>"; print_r($singlsum);
	echo "<pre>"; print_r($confirmtime);
	echo "<pre>"; print_r($agosum);
	exit;
	*/
	
	foreach($id as $key => $value)
	{
		$data['shippingstatus']=$shippingstatus[$key];
		$data['orderstatus']=$orderstatus[$key];
		$data['singlsum']=$singlsum[$key];
		$data['confirmtime']=$currtime;
		$subtract=$singlsum[$key]-$agosum[$key];
		//echo "$data";exit;
	    $orderrecord->updateOrderRecord($data, $id[$key]);
	    $orderbusi->updateALLMONEY($subtract, $id[$key]);
	}
	echo "<script language='javascript'>";
	echo "location='order.php';";
	echo "</script>";
	


}
