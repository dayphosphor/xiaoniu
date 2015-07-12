<?php 
	header("Content-type:text/html;charset=utf-8");
	if(trim($_REQUEST['doact'])=="dodelete"){
		$password = "123123123";
		if(trim($_REQUEST['password']) != $password){
			echo "密码错误";die();
		}
		
		if(!defined('ROOT_PATH'))
			define('ROOT_PATH', str_replace('delete.php', '', str_replace('\\', '/', __FILE__)));
	
		require ROOT_PATH.'system/common.php';
		
		$table_arr = array(
			"deal"=>array(
				"deal",
				"deal_city_link",
				"deal_collect",
				"deal_inrepay_repay",
				"deal_load",
				"deal_load_repay",
				"deal_load_transfer",
				"deal_repay",
				"deal_repay_log",
				"generation_repay",
				"generation_repay_submit",
				"auto_cache",
				"baofoo_acct_trans",
				"baofoo_bind_state",
				"baofoo_business",
				"baofoo_business_detail",
				"baofoo_fo_charge",
				"baofoo_log",
				"baofoo_recharge",
				"ips_create_new_acct",
				"ips_do_dp_trade",
				"ips_do_dw_trade",
				"ips_guarantee_unfreeze",
				"ips_log",
				"ips_register_creditor",
				"ips_register_cretansfer",
				"ips_register_guarantor",
				"ips_register_subject",
				"ips_repayment_new_trade",
				"ips_repayment_new_trade_detail",
				"ips_transfer",
				"ips_transfer_detail",
				"message",
				"yeepay_bind_bank_card",
				"yeepay_cp_transaction",
				"yeepay_cp_transaction_detail",
				"yeepay_enterprise_register",
				"yeepay_log",
				"yeepay_recharge",
				"yeepay_register",
				"yeepay_withdraw",
				"gift_record",
				"given_record",
			),
			"user"=>array(
				"user",
				"user_active_log",
				"user_address",
				"user_autobid",
				"user_bank",
				"user_carry",
				"user_company",
				"user_credit_file",
				"user_extend",
				"user_focus",
				"user_frequented",
				"user_lock_money_log",
				"user_log",
				"user_money_log",
				"user_point_log",
				"user_score_log",
				"user_sign_log",
				"user_sta",
				"user_work",
				"user_x_y_point",
				"reportguy",
				"topic",
				"demotion_record",
				"deal_quota_submit",
				"deal_order",
				"deal_order_item",
				"deal_order_log",
				"deal_msg_list",
				"msg_box",
				"gift_record",
				"given_record",
			),
			"goods"=>array(
				"goods",
				"goods_attr",
				"goods_attr_stock",
				"goods_order"
			),
			"site"=>array(
				"site_money_log"
			),
			"payment"=>array(
				"payment_notice",
			),
			"log"=>array(
				"log",
			),
		);
		
		foreach($_REQUEST['module'] as $k=>$v){
			if(isset($table_arr[$v])){
				foreach($table_arr[$v] as $kk=>$vv){
					$sql="DELETE FROM ".DB_PREFIX.$vv;
					$GLOBALS['db']->query($sql);
					echo $sql."<br>";
				}
			}
		}
		echo "删除完毕<br>";
		echo "<a href='delete.php'>点此返回</a><br>";
		die();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除数据</title>
</head>
<body>
	<form action="delete.php" method="POST">
		密码：<input type="password" name="password" value="" />
		<br/><br/>
		选择你要删除的数据:
		<br/><br/>
		<label><input type="checkbox" name="module[]" value="deal"> 贷款数据</label>
		<br/><br/>
		<label><input type="checkbox" name="module[]" value="user"> 用户数据</label>
		<br/><br/>
		<label><input type="checkbox" name="module[]" value="goods"> 积分商城数据</label>
		<br/><br/>
		<label><input type="checkbox" name="module[]" value="site"> 网站收益日志</label>
		<br/><br/>
		<label><input type="checkbox" name="module[]" value="payment"> 充值数据</label>
		<br/><br/>
		<label><input type="checkbox" name="module[]" value="log"> 网站后台日志</label>
		<br/><br/>
		<input type="hidden" name="doact" value="dodelete" />
		<input type="submit" value="确定" />
	</form>
</body>
</html>

