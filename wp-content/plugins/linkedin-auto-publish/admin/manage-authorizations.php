<?php if( !defined('ABSPATH') ){ exit();}
global $wpdb;
if(isset($_GET['msg']) && $_GET['msg']=='smap_pack_updated'){
	?>
<div class="system_notice_area_style1" id="system_notice_area">
SMAP Package updated successfully.&nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss">Dismiss</span>
</div>
<?php
}
$free_plugin_source='lnap';
$domain_name=trim(get_option('siteurl'));
$xyzscripts_hash_val=trim(get_option('xyz_lnap_xyzscripts_hash_val'));
$xyzscripts_user_id=trim(get_option('xyz_lnap_xyzscripts_user_id'));
$xyz_smap_licence_key='';
if ($xyzscripts_user_id=='')
{
	echo '<b>Please  authorize smapsolutions app under LinkedIn settings to access this page.</b>';
	return;
}
?>
<style type="text/css">
.widefat {border: 1px solid #eeeeee!important;
margin: 0px !important;
border-bottom: 3px solid #00a0d2 !important;
margin-bottom:5px;}

.widefat th {border:1px solid #ffffff !important; background-color:#00a0d2; color:#ffffff; margin:0px !important;  padding-top: 12px;
padding-bottom: 12px;
text-align: left;}

.widefat td, .widefat th {
	color:#2f2f2f ; 
	padding: 12px 5px;
	margin: 0px;
}

.widefat tr{ border: 1px solid #ddd;}

.widefat tr:nth-child(even){background-color: #dddddd !important;}

.widefat tr:hover {background-color: #cccccc;}


.delete_auth_entry,.delete_inactive_ln_entry {
background-color: #00a0d2;
border: none;
padding: 5px 10px;
color: #fff;
border-radius: 2px;
outline:0;
}

.delete_auth_entry:hover{background-color:#008282;}

.select_box{display: block;
color:#2f2f2f ;
padding: 10px;
background-color: #ddd;
width: 96.8%;
margin-bottom: 1px;}
.xyz_lnap_plan_div{
float:left;
padding-left: 5px;
background-color:#b7b6b6;
border-radius:3px;
padding: 5px;
color: white;
margin-left: 5px;
}
.xyz_lnap_plan_label{
	font-size: 15px;
    color: #ffffff;
    font-weight: 500;
    float: left;
    padding: 5px;
    background-color: #30a0d2;
}
</style>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#auth_entries_div').show();
	jQuery("#show_all").attr('checked', true);
		
	jQuery("#show_all").click(function(){
		jQuery('#lnap_manage_auth_table tr:has(td.diff_domain)').show();
		jQuery('#lnap_manage_auth_table tr:has(td.same_domain)').show();
	});
	jQuery("#show_same_domain").click(function(){
		jQuery('#lnap_manage_auth_table tr:has(td.diff_domain)').hide();
		jQuery('#lnap_manage_auth_table tr:has(td.same_domain)').show();
	});
	jQuery("#show_diff_domain").click(function(){
		jQuery('#lnap_manage_auth_table tr:has(td.diff_domain)').show();
		jQuery('#lnap_manage_auth_table tr:has(td.same_domain)').hide();
	});

	jQuery(".delete_auth_entry").off('click').on('click', function() {
	    var auth_id=jQuery(this).attr("data-id");
	    jQuery("#show-del-icon_"+auth_id).hide();
		jQuery("#ajax-save_"+auth_id).show();
		var xyzscripts_user_hash=jQuery(this).attr("data-xyzscripts_hash");
		var xyzscripts_id=jQuery(this).attr("data-xyzscriptsid");

	  	var xyz_lnap_del_entries_nonce= '<?php echo wp_create_nonce('xyz_lnap_del_entries_nonce');?>';
  		var dataString = {
		action: 'xyz_lnap_del_entries',
		auth_id: auth_id ,
		xyzscripts_id: xyzscripts_id,
		xyzscripts_user_hash: xyzscripts_user_hash,
		dataType: 'json',
		_wpnonce: xyz_lnap_del_entries_nonce
	};
		jQuery.post(ajaxurl, dataString ,function(data) {
			jQuery("#ajax-save_"+auth_id).hide();
			 if(data==1)
			       	alert("You do not have sufficient permissions");
			else{
			
				var data=jQuery.parseJSON(data);
				if(data.status==1){
 					jQuery(".tr_"+auth_id).remove();

 					if(jQuery('#system_notice_area').length==0)
 			  			jQuery('body').append('<div class="system_notice_area_style1" id="system_notice_area"></div>');
 			  			jQuery("#system_notice_area").html('Account details successfully deleted from SMAPSolutions&nbsp;&nbsp;&nbsp; <span id="system_notice_area_dismiss">Dismiss</span>');
 			  			jQuery("#system_notice_area").show();
 			  			jQuery('#system_notice_area_dismiss').click(function() {
 			  				jQuery('#system_notice_area').animate({
 			  					opacity : 'hide',
 			  					height : 'hide'
 			  				}, 500);
 			  			});

				}
				else if(data.status==0 )
				{
					jQuery("#show_err_"+auth_id).append(data.msg);
				}
			}

			 
          });
	  });
	jQuery("input[name='domain_selection']").click(function(){//show_diff_domain
		numOfVisibleLnRows = jQuery('#lnap_manage_auth_table tr:visible').length;
		//if (this.id == 'show_diff_domain') 
		//	{
			if(numOfVisibleLnRows==1)
			{	
				
				jQuery('.xyz_lnap_manage_auth_th').hide();
				jQuery('#xyz_lnap_no_auth_entries_ln').show();
			}
			else{	
				jQuery('.xyz_lnap_manage_auth_th').show();
				jQuery('#xyz_lnap_no_auth_entries_ln').hide();
			}
//		}
			
	});	
//////////////////////////////DELETE INACTIVE LN ACCOUNT///////////
	jQuery(".delete_inactive_ln_entry").off('click').on('click', function() {
	    var ln_userid=jQuery(this).attr("data-lnid");
	    var tr_iterationid=jQuery(this).attr("data-ln_iterationid");
	    jQuery("#show-del-icon-inactive-ln_"+tr_iterationid).hide();
	    jQuery("#ajax-save-inactive-ln_"+tr_iterationid).show();
	    var xyzscripts_user_hash=jQuery(this).attr("data-xyzscripts_hash");
	    var xyzscripts_id=jQuery(this).attr("data-xyzscriptsid");
	    var xyz_lnap_del_lnuser_entries_nonce= '<?php echo wp_create_nonce('xyz_lnap_del_lnuser_entries_nonce');?>';
	    var dataString = {
	    	action: 'xyz_lnap_del_lnuser_entries',
	    	tr_iterationid: tr_iterationid ,
	    	xyzscripts_id: xyzscripts_id,
	    	xyzscripts_user_hash: xyzscripts_user_hash,
	    	ln_userid: ln_userid,
	    	dataType: 'json',
	    	_wpnonce: xyz_lnap_del_lnuser_entries_nonce
	    };
	    jQuery.post(ajaxurl, dataString ,function(data) {
	    	jQuery("#ajax-save-inactive-ln_"+tr_iterationid).hide();
	    	 if(data==1)
			       	alert("You do not have sufficient permissions");
			else{

	    	var data=jQuery.parseJSON(data);
	    	if(data.status==1){
	    		jQuery(".tr_inactive"+tr_iterationid).remove();

	    		if(jQuery('#system_notice_area').length==0)
	    			jQuery('body').append('<div class="system_notice_area_style1" id="system_notice_area"></div>');
	    			jQuery("#system_notice_area").html('In-active LinkedIn account successfully deleted from SMAPSolutions&nbsp;&nbsp;&nbsp; <span id="system_notice_area_dismiss">Dismiss</span>');
	    			jQuery("#system_notice_area").show();
	    			jQuery('#system_notice_area_dismiss').click(function() {
	    				jQuery('#system_notice_area').animate({
	    					opacity : 'hide',
	    					height : 'hide'
	    				}, 500);
	    			});

	    	}
	    	else if(data.status==0 )
	    	{
	    		jQuery("#show_err_inactive_ln_"+tr_iterationid).append(data.msg );
	    	}

	    }
	    });
	  });
///////////////////////////////////////////////////////////////////
	window.addEventListener('message', function(e) {
		ProcessChildMessage_2(e.data);
	} , false);
	//////////////////////////////////////////////////////////////////
		function ProcessChildMessage_2(message) {
				var obj1=jQuery.parseJSON(message);//console.log(message);
			  	if(obj1.smap_api_upgrade && obj1.success_flag){ 
				   var base = '<?php echo admin_url('admin.php?page=linkedin-auto-publish-manage-authorizations&msg=smap_pack_updated');?>';
				  window.location.href = base;
				}
		}
	///////////////////////////////////////////////////////////////////
	
});
function lnap_popup_purchase_plan(auth_secret_key,request_hash)
{
	var account_id=0;
	var xyz_smap_pre_smapsoln_userid=0;
	var childWindow = null;
	var domain_name='<?php echo urlencode($domain_name); ?>';
	var smap_licence_key='<?php echo $xyz_smap_licence_key;?>';
	var smap_solution_url='<?php echo XYZ_SMAP_SOLUTION_AUTH_URL;?>';
	var xyzscripts_user_id='<?php echo $xyzscripts_user_id; ?>';
	var smap_plugin_source='<?php echo $free_plugin_source;?>';
	childWindow=window.open(smap_solution_url+"authorize_linkedIn/linkedin.php?smap_ln_auth_id="+xyz_smap_pre_smapsoln_userid+"&account_id="+account_id+"&domain_name="+domain_name+"&xyzscripts_user_id="+xyzscripts_user_id+"&smap_licence_key="+smap_licence_key+"&auth_secret_key="+auth_secret_key+"&free_plugin_source="+smap_plugin_source+"&smap_api_upgrade=1&request_hash="+request_hash, "SmapSolutions Authorization", "toolbar=yes,scrollbars=yes,resizable=yes,left=500,width=600,height=600");
	return false;
}
</script>
<h3>Manage Authorizations</h3>
<div>
<?php
$manage_auth_parameters=array(
					 'xyzscripts_user_id'=>$xyzscripts_user_id,
				     'free_plugin_source'=>$free_plugin_source,
				   );
$url=XYZ_SMAP_SOLUTION_AUTH_URL.'authorize_linkedIn/manage-ln-authorizations.php';
$content=xyz_lnap_post_to_smap_api($manage_auth_parameters,$url,$xyzscripts_hash_val);
$result=json_decode($content,true);
if(!empty($result) && isset($result['status']))
{
	if($result['status']==0)
	{
		$er_msg=$result['msg'];
		echo '<div style="color:red;font-size:15px;padding:3px;">'.$er_msg.'</div><br/>';
	}
	
	if($result['status']==1 || isset($result['package_details'])){
		$auth_entries=$result['msg'];

	?>
		<div id="auth_entries_div" style="margin-bottom: 5px;">
					<?php if(!empty($result) && isset($result['package_details']))
					{
						?><div class="xyz_lnap_plan_label">Current Plan:</div><?php 
						$ln_package_details=$result['package_details'];?>
						<div class="xyz_lnap_plan_div">Allowed LinkedIn users: <?php echo $ln_package_details['allowed_ln_user_accounts'];?> &nbsp;</div>
						<div  class="xyz_lnap_plan_div"> API limit per account:  <?php echo $ln_package_details['allowed_lnapi_calls'];?> per day&nbsp;</div>
						<div  class="xyz_lnap_plan_div">Package Expiry :  <?php echo date('d/m/Y g:i a', $ln_package_details['ln_expiry_time']);?>  &nbsp;</div>
						<div  class="xyz_lnap_plan_div">Package Status :  <?php echo $ln_package_details['package_status'];?> &nbsp;</div>
						<?php 
// 						if ($ln_package_details['package_status']!='Expired')
						{
							$xyz_smap_plug_accountId=$xyz_fbap_pre_smapsoln_userid=0;$xyz_smap_plug_licence_key='';
							$request_hash=md5($xyzscripts_user_id.$xyzscripts_hash_val);
							$auth_secret_key=md5('smapsolutions'.$domain_name.$xyz_smap_plug_accountId.$xyz_fbap_pre_smapsoln_userid.$xyzscripts_user_id.$request_hash.$xyz_smap_plug_licence_key.$free_plugin_source.'1');
							?>
							<div  class="xyz_lnap_plan_div">
							<a href="javascript:lnap_popup_purchase_plan('<?php echo $auth_secret_key;?>','<?php echo $request_hash;?>');void(0);">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Upgrade/Renew
							</a> 
							</div>
							<?php 
						}
					}
					if (is_array($auth_entries) && !empty($auth_entries))
					{
					?>
		
						<span class="select_box" style="float: left;margin-top: 16px;">
						<input type="radio" name="domain_selection" value="0" id="show_all">Show all entries
						<input type="radio" name="domain_selection" value="1" id="show_same_domain">Show entries from current wp installation 
						<input type="radio" name="domain_selection" value="2" id="show_diff_domain">Show entries from other wp installations
						</span>
						<table cellpadding="0" cellspacing="0" class="widefat" style="width: 99%; margin: 0 auto; border-bottom:none;" id="lnap_manage_auth_table">
						<thead>
						<tr class="xyz_lnap_manage_auth_th">
						
						<th scope="col" width="10%">LinkedIn username</th>
						<th scope="col" width="12%">Selected pages</th>
						<th scope="col" width="12%">WP url</th>
						<th scope="col" width="12%">Plugin</th>
						<th scope="col" width="5%">Account ID (SMAP PREMIUM)</th>
						<th scope="col" width="5%">Action</th>
						</tr>
						</thead> <?php
						$i=0;
						foreach ($auth_entries as $auth_entries_key => $auth_entries_val)
						{
							if (isset($auth_entries_val['auth_id'])){
							?>
							 <tr class="tr_<?php echo $auth_entries_val['auth_id'];?>">
							 	
							 <td><?php  echo $auth_entries_val['ln_username'];?>
							 	</td>
							<?php if(isset($auth_entries_val['pages'])&& !empty($auth_entries_val['pages'])){?>
							 	<td> <?php echo $auth_entries_val['pages'];?> </td>
							 	<?php }else echo "<td> NA </td>";?>
						
							 	<?php 	if($auth_entries_val['domain_name']==$domain_name){?>
							 	<td class='same_domain'> <?php echo $auth_entries_val['domain_name'];?> </td>
							 	<?php }
							 	else{?>
							 	<td class='diff_domain'> <?php echo $auth_entries_val['domain_name'];?> </td>
							 	<?php } ?>
							 	<td> <?php
							 	/*if($auth_entries_val['free_plugin_source']=='fbap')
							 		echo 'WP FACEBOOK AUTO PUBLISH';*/
							 		if ($auth_entries_val['free_plugin_source']=='smap')
							 		echo 'SOCIAL MEDIA AUTO PUBLISH';
							 		elseif ($auth_entries_val['free_plugin_source']=='lnap')
							 		echo 'WP to LINKEDIN AUTO PUBLISH';
							 		else echo 'XYZ-SMAP';
							 		?></td>
							 		<td> <?php if($auth_entries_val['smap_pre_account_id']!=0)echo $auth_entries_val['smap_pre_account_id'];
							 		else echo 'Not Applicable';?> </td>
							 		<td>
							 		<?php if ($domain_name==$auth_entries_val['domain_name'] && $free_plugin_source==$auth_entries_val['free_plugin_source'] ) {
// 							 		$md5_encrypt=md5('smapsolutions'.$xyzscripts_user_id.$xyzscripts_hash_val.$auth_entries_val['auth_id']);
							 		?>
							 		<span id='ajax-save_<?php echo $auth_entries_val['auth_id'];?>' style="display:none;"><img	title="Deleting entry"	src="<?php echo plugins_url("images/ajax-loader.gif",XYZ_LNAP_PLUGIN_FILE);?>" style="width:20px;height:20px; "></span>
							 		<span id='show-del-icon_<?php echo $auth_entries_val['auth_id'];?>'>
							 		<input type="button" class="delete_auth_entry" data-id=<?php echo $auth_entries_val['auth_id'];?> data-xyzscriptsid="<?php echo $xyzscripts_user_id;?>" data-xyzscripts_hash="<?php echo $xyzscripts_hash_val;?>" name='del_entry' value="Delete" >
							 		</span>
							 		<span id='show_err_<?php echo $auth_entries_val['auth_id'];?>' style="color:red;" ></span>
							 		<?php //data-encrypt="<?php echo $md5_encrypt;
							 		?></td>
							 		</tr>
							 		<?php
							 		}
						}
						else if (isset($auth_entries_val['inactive_ln_userid']))
						{
						?>
						 <tr class="tr_inactive<?php echo $i;?>">
						 <td><?php  echo $auth_entries_val['inactive_ln_username'];?><br/>(Inactive)
						 </td>
						 <td>-</td>
						 <td>-</td>
						 <td>-</td>
						 <td>-</td>
						 <td>
						 <span id='ajax-save-inactive-ln_<?php echo $i;?>' style="display:none;"><img	title="Deleting entry"	src="<?php echo plugins_url("images/ajax-loader.gif",XYZ_LNAP_PLUGIN_FILE);?>" style="width:20px;height:20px; "></span>
						 <span id='show-del-icon-inactive-ln_<?php echo $i;?>'>
						 <input type="button" class="delete_inactive_ln_entry" data-ln_iterationid=<?php echo $i;?> data-lnid=<?php echo $auth_entries_val['inactive_ln_userid'];?>  data-xyzscriptsid="<?php echo $xyzscripts_user_id;?>" data-xyzscripts_hash="<?php echo $xyzscripts_hash_val;?>" name='del_entry' value="Delete" >
						 </span>
						 <span id='show_err_inactive_ln_<?php echo $i;?>' style="color:red;" ></span>
						 </td>
						 </tr>
						<?php 
							$i++;
						}
							
						} ///////////////foreach
					?>					
					<tr id="xyz_lnap_no_auth_entries_ln" style="display: none;"><td>No Authorizations</td></tr>
					</table>
				<?php }?>	
					
					</div><?php 
					
}
}
else {
	echo "<div>Unable to connect. Please check your curl and firewall settings</div>";
}
?></div>