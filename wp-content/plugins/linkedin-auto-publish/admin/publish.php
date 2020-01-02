<?php 
if( !defined('ABSPATH') ){ exit();}
/*add_action('publish_post', 'xyz_lnap_link_publish');
add_action('publish_page', 'xyz_lnap_link_publish');
$xyz_lnap_future_to_publish=get_option('xyz_lnap_future_to_publish');

if($xyz_lnap_future_to_publish==1)
	add_action('future_to_publish', 'xyz_link_lnap_future_to_publish');

function xyz_link_lnap_future_to_publish($post){
	$postid =$post->ID;
	xyz_lnap_link_publish($postid);
}*/
add_action(  'transition_post_status',  'xyz_link_lnap_future_to_publish', 10, 3 );

function xyz_link_lnap_future_to_publish($new_status, $old_status, $post){

	if (isset($_GET['_locale']) && empty($_POST))
		return ;
	if(!isset($GLOBALS['lnap_dup_publish']))
		$GLOBALS['lnap_dup_publish']=array();
	
	$postid =$post->ID;
	$get_post_meta=get_post_meta($postid,"xyz_lnap",true);
	$get_post_meta_future_data=get_post_meta($postid,"xyz_lnap_future_to_publish",true);
	$lnpost_permission=get_option('xyz_lnap_lnpost_permission');
	if(isset($_POST['xyz_lnap_lnpost_permission']))
	{
		$lnpost_permission=$_POST['xyz_lnap_lnpost_permission'];
		if ( (isset($_POST['xyz_lnap_lnpost_permission']) && isset($_POST['xyz_lnap_ln_shareprivate'])) )
		{
			$futToPubDataArray=array( 'post_ln_permission'	=>	$lnpost_permission,
					'xyz_lnap_ln_shareprivate'	=>	$_POST['xyz_lnap_ln_shareprivate'],
					'xyz_lnap_lnpost_method'	=>	$_POST['xyz_lnap_lnpost_method'],
					'xyz_lnap_lnmessage'	=>	$_POST['xyz_lnap_lnmessage']);
			update_post_meta($postid, "xyz_lnap_future_to_publish", $futToPubDataArray);
		}
	}
	else
	{
		if ($lnpost_permission == 1) {
			if($new_status == 'publish')
			{
				if ($get_post_meta == 1 ) {
					return;
				}
			}
			else return;
		}
	}
	if($lnpost_permission == 1)
	{
		if($new_status == 'publish')
		{
		if(!in_array($postid,$GLOBALS['lnap_dup_publish'])) {
		    $GLOBALS['lnap_dup_publish'][]=$postid;
		    xyz_lnap_link_publish($postid);
		}
		}
	}

	}

/*$xyz_lnap_include_customposttypes=get_option('xyz_lnap_include_customposttypes');
$carr=explode(',', $xyz_lnap_include_customposttypes);
foreach ($carr  as $cstyps ) {
	add_action('publish_'.$cstyps, 'xyz_lnap_link_publish');

}*/

function xyz_lnap_link_publish($post_ID) {
	
	$_POST_CPY=$_POST;
	$_POST=stripslashes_deep($_POST);
	$xyz_lnap_ln_shareprivate=$xyz_lnap_lnpost_method=$lmessagetopost='';
	$get_post_meta_future_data=get_post_meta($post_ID,"xyz_lnap_future_to_publish",true);
	$lnpost_permission=get_option('xyz_lnap_lnpost_permission');
	if(isset($_POST['xyz_lnap_lnpost_permission']))
		$lnpost_permission=$_POST['xyz_lnap_lnpost_permission'];
	elseif(!empty($get_post_meta_future_data) && get_option('xyz_lnap_default_selection_edit')==2 )///select values from post meta
	{
		$lnpost_permission=$get_post_meta_future_data['post_ln_permission'];
		$xyz_lnap_ln_shareprivate=$get_post_meta_future_data['xyz_lnap_ln_shareprivate'];
		$xyz_lnap_lnpost_method=$get_post_meta_future_data['xyz_lnap_lnpost_method'];
		$lmessagetopost=$get_post_meta_future_data['xyz_lnap_lnmessage'];
	}
	
	if ($lnpost_permission != 1) {
		$_POST=$_POST_CPY;
		return ;
	} else if(( (isset($_POST['_inline_edit'])) || (isset($_REQUEST['bulk_edit'])) ) && (get_option('xyz_lnap_default_selection_edit') == 0))
	{
		$_POST=$_POST_CPY;
		return;
	}
	
	global $current_user;
	wp_get_current_user();
		
	////////////linkedin////////////
	
	$lnappikey=get_option('xyz_lnap_lnapikey');
	$lnapisecret=get_option('xyz_lnap_lnapisecret');
	if ($lmessagetopost=='')
	$lmessagetopost=get_option('xyz_lnap_lnmessage');
	if ($xyz_lnap_lnpost_method=='')
	$xyz_lnap_lnpost_method=get_option('xyz_lnap_lnpost_method');
	if(isset($_POST['xyz_lnap_lnmessage']))
		$lmessagetopost=$_POST['xyz_lnap_lnmessage'];
	if (isset($_POST['xyz_lnap_lnpost_method']))
		$xyz_lnap_lnpost_method=$_POST['xyz_lnap_lnpost_method'];
if ($xyz_lnap_ln_shareprivate=='')
  $xyz_lnap_ln_shareprivate=get_option('xyz_lnap_ln_shareprivate'); 
  if(isset($_POST['xyz_lnap_ln_shareprivate']))
  $xyz_lnap_ln_shareprivate=intval($_POST['xyz_lnap_ln_shareprivate']);
 
  $xyz_lnap_ln_sharingmethod=get_option('xyz_lnap_ln_sharingmethod');
  if(isset($_POST['xyz_lnap_ln_sharingmethod']))
  $xyz_lnap_ln_sharingmethod=intval($_POST['xyz_lnap_ln_sharingmethod']);
  
    $lnaf=get_option('xyz_lnap_lnaf');
	
	////////////////////////
	$postpp= get_post($post_ID);global $wpdb;
	$entries0 = $wpdb->get_results($wpdb->prepare( 'SELECT user_nicename,display_name FROM '.$wpdb->base_prefix.'users WHERE ID=%d',$postpp->post_author));
	foreach( $entries0 as $entry ) {			
		$user_nicename=$entry->user_nicename;
		$user_displayname=$entry->display_name;}
	
	if ($postpp->post_status == 'publish')
	{
		$posttype=$postpp->post_type;
		$ln_publish_status=array();
			
		if ($posttype=="page")
		{

			$xyz_lnap_include_pages=get_option('xyz_lnap_include_pages');
			if($xyz_lnap_include_pages==0)
			{$_POST=$_POST_CPY;return;}
		}
			
		else if($posttype=="post")
		{
			$xyz_lnap_include_posts=get_option('xyz_lnap_include_posts');
			if($xyz_lnap_include_posts==0)
			{
				$_POST=$_POST_CPY;return;
			}
			
			$xyz_lnap_include_categories=get_option('xyz_lnap_include_categories');
			if($xyz_lnap_include_categories!="All")
			{
				$carr1=explode(',',$xyz_lnap_include_categories);
					
				$defaults = array('fields' => 'ids');
				$carr2=wp_get_post_categories( $post_ID, $defaults );
				$retflag=1;
				foreach ($carr2 as $key=>$catg_ids)
				{
					if(in_array($catg_ids, $carr1))
						$retflag=0;
				}
					
					
				if($retflag==1)
				{$_POST=$_POST_CPY;return;}
			}
		}
		/*$xyz_lnap_include_customposttypes=get_option('xyz_lnap_include_customposttypes');
		 $carr=explode(',', $xyz_lnap_include_customposttypes);
		foreach ($carr  as $cstyps ) {
		add_action('publish_'.$cstyps, 'xyz_lnap_link_publish');
		
		}*/
		////
		else
		{
		
			$xyz_lnap_include_customposttypes=get_option('xyz_lnap_include_customposttypes');
			if($xyz_lnap_include_customposttypes!='')
			{
		
				$carr=explode(',', $xyz_lnap_include_customposttypes);
		
				if(!in_array($posttype, $carr))
				{
				$_POST=$_POST_CPY;return;	
				}
		
			}
			else
			{
				$_POST=$_POST_CPY;return;
			}
		
		}
		$get_post_meta=get_post_meta($post_ID,"xyz_lnap",true);
		if($get_post_meta!=1)
			add_post_meta($post_ID, "xyz_lnap", "1");

		include_once ABSPATH.'wp-admin/includes/plugin.php';
		
		$pluginName = 'bitly/bitly.php';
		
		if (is_plugin_active($pluginName)) {
			remove_all_filters('post_link');
		}
		$link = get_permalink($postpp->ID);


		$xyz_lnap_apply_filters=get_option('xyz_lnap_apply_filters');
		$ar2=explode(",",$xyz_lnap_apply_filters);
		$con_flag=$exc_flag=$tit_flag=0;
		if(isset($ar2))
		{
			if(in_array(1, $ar2)) $con_flag=1;
			if(in_array(2, $ar2)) $exc_flag=1;
			if(in_array(3, $ar2)) $tit_flag=1;
		}
		
		$content = $postpp->post_content;
		$breaks = array("<br />","<br>","<br/>");
		$content = str_ireplace($breaks, "\r\n", $content);
		if($con_flag==1)
			$content = apply_filters('the_content', $content);
		$content = html_entity_decode($content, ENT_QUOTES, get_bloginfo('charset'));
		$excerpt = $postpp->post_excerpt;
		if($exc_flag==1)
			$excerpt = apply_filters('the_excerpt', $excerpt);
		$excerpt = html_entity_decode($excerpt, ENT_QUOTES, get_bloginfo('charset'));
		$content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
		$content=  preg_replace("/\\[caption.*?\\].*?\\[.caption\\]/is", '', $content);
		$content = preg_replace('/\[.+?\]/', '', $content);
		$excerpt = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $excerpt);
		
		if($excerpt=="")
		{
			if($content!="")
			{
				$content1=$content;
				$content1=strip_tags($content1);
				$content1=strip_shortcodes($content1);
				
				$excerpt=implode(' ', array_slice(explode(' ', $content1), 0, 50));
			}
		}
		else
		{
			$excerpt=strip_tags($excerpt);
			$excerpt=strip_shortcodes($excerpt);
		}
		$description = $content;
		
		$description_org=$description;
		$attachmenturl=xyz_lnap_getimage($post_ID, $postpp->post_content);
		if($attachmenturl!="")
			$image_found=1;
		else
			$image_found=0;
		
		$name = $postpp->post_title;
		$caption = html_entity_decode(get_bloginfo('title'), ENT_QUOTES, get_bloginfo('charset'));
		
		if($tit_flag==1)
			$name = apply_filters('the_title', $name);
		
		$name = html_entity_decode($name, ENT_QUOTES, get_bloginfo('charset'));
		$name=strip_tags($name);
		$name=strip_shortcodes($name);
		
		$description=strip_tags($description);		
		$description=strip_shortcodes($description);
	   	$description=str_replace("&nbsp;","",$description);
		$excerpt=str_replace("&nbsp;","",$excerpt);
		
		if((($lnappikey!="" && $lnapisecret!=""&& get_option('xyz_lnap_ln_api_permission')!=2)|| get_option('xyz_lnap_ln_api_permission')==2) &&  $lnpost_permission==1 && $lnaf==0 && (( get_option('xyz_lnap_ln_share_post_company')!='')|| get_option('xyz_lnap_lnshare_to_profile')==1))
		{
			$contentln=array();
			
			$description_li=xyz_lnap_string_limit($description, 100);
// 			$caption_li=xyz_lnap_string_limit($caption, 200);
			$name_li=xyz_lnap_string_limit($name, 200);
			$message1=str_replace('{POST_TITLE}', $name, $lmessagetopost);
			$message2=str_replace('{BLOG_TITLE}', $caption,$message1);
			$message3=str_replace('{PERMALINK}', $link, $message2);
			$message4=str_replace('{POST_EXCERPT}', $excerpt, $message3);
			$message5=str_replace('{POST_CONTENT}', $description, $message4);
			$message5=str_replace('{USER_NICENAME}', $user_nicename, $message5);
			$message5=str_replace('{USER_DISPLAY_NAME}', $user_displayname, $message5);
			$publish_time=get_the_time(get_option('date_format'),$post_ID );
			$message5=str_replace('{POST_PUBLISH_DATE}', $publish_time, $message5);
			$message5=str_replace('{POST_ID}', $post_ID, $message5);
			$message5=str_replace("&nbsp;","",$message5);
			$message5=xyz_lnap_string_limit($message5, 1300);
		
		$xyz_lnap_application_lnarray=get_option('xyz_lnap_application_lnarray');
	
		
		$ln_publish_status=array();
		if (get_option('xyz_lnap_ln_api_permission')!=2)
		{
		$ln_acc_tok_arr=json_decode($xyz_lnap_application_lnarray);
		$xyz_lnap_application_lnarray=$ln_acc_tok_arr->access_token;
		
		$ObjLinkedin = new LNAPLinkedInOAuth2($xyz_lnap_application_lnarray);//print_r($ObjLinkedin);die;
		}
		$contentln['author'] ="urn:li:person:".get_option('xyz_lnap_lnappscoped_userid');
		$contentln['lifecycleState'] ="PUBLISHED";
		$ln_text=array('text'=>$message5);
		if ($xyz_lnap_lnpost_method==1) //simple text message
		{
			$shareCommentary=array('shareCommentary'=>$ln_text,'shareMediaCategory'=>'NONE');
			$com_linkedin_ugc_ShareContent=array('com.linkedin.ugc.ShareContent'=>$shareCommentary);
			$contentln['specificContent']=$com_linkedin_ugc_ShareContent;
		}
		elseif ($xyz_lnap_lnpost_method==2) //link share
		{
			update_post_meta($post_ID, "xyz_lnap_insert_og", "1");
			$ln_title=array('text'=>$name_li);
			$media_array=array( 'status'=> 'READY','description'=>array('text'=>$description_li),'originalUrl'=>$link,'title'=>$ln_title);
			$shareCommentary=array('shareCommentary'=>$ln_text,'shareMediaCategory'=>'ARTICLE','media'=>array($media_array));
			$com_linkedin_ugc_ShareContent=array('com.linkedin.ugc.ShareContent'=>$shareCommentary);
			$contentln['specificContent']=$com_linkedin_ugc_ShareContent;
		}
// 		$contentln=xyz_wp_lnap_linkedin_attachment_metas($contentln,$link);
		
		if($xyz_lnap_ln_sharingmethod==0)
		{
			$ln_api_count=0;
			if (get_option('xyz_lnap_lnshare_to_profile')==1){

				if($xyz_lnap_ln_shareprivate==1)
				{
					$contentln['visibility']['com.linkedin.ugc.MemberNetworkVisibility']='CONNECTIONS';
				}
				else
				{
					$contentln['visibility']['com.linkedin.ugc.MemberNetworkVisibility']='PUBLIC';
				}
				$ln_publish_status["new"]='';
				if (get_option('xyz_lnap_ln_api_permission')==2)
				{
					$xyz_lnap_smapsoln_userid=get_option('xyz_lnap_smapsoln_userid');
					////smap api
					$xyz_lnap_xyzscripts_userid=get_option('xyz_lnap_xyzscripts_user_id');
					$post_details=array('xyz_smap_userid'=>$xyz_lnap_smapsoln_userid,
							'xyz_smap_attachment'=>$contentln,
							'xyz_smap_page_id'=>-1,
							'xyz_smap_xyzscripts_userid'=>$xyz_lnap_xyzscripts_userid,
					);
					$xyz_lnap_smapsoln_sec_key=get_option('xyz_lnap_secret_key');
					$url=XYZ_SMAP_SOLUTION_LN_PUBLISH_URL.'api/publish.php';
					$result=xyz_lnap_post_to_smap_api($post_details,$url,$xyz_lnap_smapsoln_sec_key);
					//print_r($result);die;
					$result=json_decode($result);
					if(!empty($result))
					{
						if (isset($result->postid) && !empty($result->postid))
						{
							$postid =$result->postid;
							$linkedin_post="https://www.linkedin.com/feed/update/".$postid;
							$post_link='<br/><span style="color:#21759B;text-decoration:underline;"><a target="_blank" href="'.$linkedin_post.'">View Post</a></span>';
						}
						else
							$err=$result->msg;
							$ln_api_count=$result->ln_api_count;
							if($result->status==0)
								$ln_publish_status["new"].="<span style=\"color:red\">profile: ".$err."</span><br/><span style=\"color:#21759B\">No. of api calls used: ".$ln_api_count."</span><br/>";
								elseif ($result->status==1)
								$ln_publish_status["new"].="<span style=\"color:green\">profile:Success.</span>".$post_link."<br/><span style=\"color:#21759B\">No. of api calls used: ".$ln_api_count."</span><br/>";
					}
				}
				else{
				try{
					$arrResponse = $ObjLinkedin->shareStatus($contentln);
					$post_link='';
						if (isset($arrResponse['updateUrl'])){
							$linkedin_post=$arrResponse["updateUrl"];
						$post_link='<br/><span style="color:#21759B;text-decoration:underline;"><a target="_blank" href="https://'.$linkedin_post.'">View Post</a></span>';
							 
						$ln_publish_status["new"].="<span style=\"color:green\"> profile:Success.</span>".$post_link."<br/>";
						}
					if(isset($arrResponse['id'])){
						$linkedin_post="https://www.linkedin.com/feed/update/".$arrResponse['id'];
						$post_link='<br/><span style="color:#21759B;text-decoration:underline;"><a target="_blank" href="'.$linkedin_post.'">View Post</a></span>';
							$ln_publish_status["new"].="<span style=\"color:green\"> profile:Success.</span>".$post_link."<br/>";
				
					}
					if (( isset($arrResponse['errorCode'])|| isset($arrResponse['serviceErrorCode'])) && isset($arrResponse['message']) && ($arrResponse['message']!='') ) {//as per old api ; need to confirm which is correct
						$ln_publish_status["new"].="<span style=\"color:red\"> profile:".$arrResponse['message'].".</span><br/>";//$arrResponse['message'];
					}
		
				}
				catch(Exception $e)
				{
					$ln_publish_status["new"].=$e->getMessage();
				}
			}
			}
			//////////////////////////////////company////////////////////////////////////////////////////////////////
			$xyz_lnap_ln_company_id1=$ln_publish_status_comp=array();$ln_publish_status_comp["new"]='';
			if(get_option('xyz_lnap_ln_share_post_company')!='')//company
				$xyz_lnap_ln_company_id1=explode(",",get_option('xyz_lnap_ln_share_post_company'));
				if (!empty($xyz_lnap_ln_company_id1)){
					$contentln=array();
					if ($xyz_lnap_lnpost_method==1) //simple text message
					{
						$shareCommentary=array('shareCommentary'=>$ln_text,'shareMediaCategory'=>'NONE');
						$com_linkedin_ugc_ShareContent=array('com.linkedin.ugc.ShareContent'=>$shareCommentary);
						$contentln['specificContent']=$com_linkedin_ugc_ShareContent;
					}
					elseif ($xyz_lnap_lnpost_method==2) //link share
					{
						update_post_meta($post_ID, "xyz_lnap_insert_og", "1");
						$ln_title=array('text'=>$name_li);
						$media_array=array( 'status'=> 'READY','description'=>array('text'=>$description_li),'originalUrl'=>$link,'title'=>$ln_title);
						$shareCommentary=array('shareCommentary'=>$ln_text,'shareMediaCategory'=>'ARTICLE','media'=>array($media_array));
						$com_linkedin_ugc_ShareContent=array('com.linkedin.ugc.ShareContent'=>$shareCommentary);
						$contentln['specificContent']=$com_linkedin_ugc_ShareContent;
					}
					foreach ($xyz_lnap_ln_company_id1 as $xyz_lnap_ln_company_id)
					{
						$contentln['lifecycleState'] ='PUBLISHED';
						$contentln['author'] ='urn:li:organization:'.$xyz_lnap_ln_company_id;
						$contentln['visibility']['com.linkedin.ugc.MemberNetworkVisibility']='PUBLIC';
// 						if($xyz_lnap_ln_company_id!=-1)
						if (get_option('xyz_lnap_ln_api_permission')==2)
						{
							$xyz_lnap_smapsoln_userid=get_option('xyz_lnap_smapsoln_userid');
							////smap api
							$xyz_lnap_xyzscripts_userid=get_option('xyz_lnap_xyzscripts_user_id');
							$post_details=array('xyz_smap_userid'=>$xyz_lnap_smapsoln_userid,
									'xyz_smap_attachment'=>$contentln,
									'xyz_smap_page_id'=>$xyz_lnap_ln_company_id,
									'xyz_smap_xyzscripts_userid'=>$xyz_lnap_xyzscripts_userid,
							);
							$xyz_lnap_smapsoln_sec_key=get_option('xyz_lnap_secret_key');
							$url=XYZ_SMAP_SOLUTION_LN_PUBLISH_URL.'api/publish.php';
							$result=xyz_lnap_post_to_smap_api($post_details,$url,$xyz_lnap_smapsoln_sec_key);
							//	die;
							$result=json_decode($result);
							if(!empty($result))
							{
								if (isset($result->postid) && !empty($result->postid))
								{
									$postid =$result->postid;
									$linkedin_post="https://www.linkedin.com/feed/update/".$postid;
									$post_link='<br/><span style="color:#21759B;text-decoration:underline;"><a target="_blank" href="'.$linkedin_post.'">View Post</a></span>';
								}
								else
									$err=$result->msg;
									$ln_api_count=$result->ln_api_count;
									if($result->status==0)
										$ln_publish_status_comp["new"].="<span style=\"color:red\">".$xyz_lnap_ln_company_id."/".$err."</span><br/><span style=\"color:#21759B\">No. of api calls used: ".$ln_api_count."</span><br/>";
										elseif ($result->status==1)
										$ln_publish_status_comp["new"].="<span style=\"color:green\">".$xyz_lnap_ln_company_id."/Success.</span>".$post_link."<br/><span style=\"color:#21759B\">No. of api calls used: ".$ln_api_count."</span><br/>";
							}
						}
						else{
							try
							{
							//	update_option('contentln',$contentln);
								$response2 = $ObjLinkedin->shareStatus($contentln);
							//	update_option('contentln1',$response2);
								$post_link='';
								if (isset($response2['updateUrl'])&& $response2['updateKey']){
									$updateKey = $response2['updateUrl']-$response2['updateKey'];
									$token_id = strrchr($response2['updateKey'],"-");
									$updateKey = substr($token_id,1,strlen($token_id));
									$post_link='<br/><span style="color:#21759B;text-decoration:underline;"> <a target="_blank" href="https://www.linkedin.com/feed/update/urn:li:activity:'.$updateKey.'">View Post</a></span>';
								}
								if (isset($response2['id']))
									$post_link='<br/><span style="color:#21759B;text-decoration:underline;"> <a target="_blank" href="https://www.linkedin.com/feed/update/'.$response2['id'].'">View Post</a></span>';
									if ( isset($response2['errorCode']) && isset($response2['message']) && ($response2['message']!='') )
									{
										$ln_publish_status_comp["new"].="<span style=\"color:red\"> company/".$xyz_lnap_ln_company_id.":".$response2['message'].".</span><br/>";
									}
									else
									{
										$ln_publish_status_comp["new"].="<span style=\"color:green\"> company/".$xyz_lnap_ln_company_id.":Success.</span> ".$post_link."<br/>";
									}
						}
						catch(Exception $e)
						{
							$ln_publish_status_comp["new"].="<span style=\"color:red\">company/".$xyz_lnap_ln_company_id.":".$e->getMessage().".</span><br/>";
							}
						}
					}
				}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
		}

		$ln_publish_status_insert='';
		if(!empty($ln_publish_status['new']))
			$ln_publish_status_insert.=$ln_publish_status['new'];
		if(isset($ln_publish_status_comp["new"]))
			$ln_publish_status_insert.=$ln_publish_status_comp["new"];

		$ln_publish_status_insert=serialize($ln_publish_status_insert);
		$time=time();
		$post_ln_options=array(
				'postid'	=>	$post_ID,
				'acc_type'	=>	"Linkedin",
				'publishtime'	=>	$time,
				'status'	=>	$ln_publish_status_insert
		);
		
		$update_opt_array=array();
		
		$arr_retrive=(get_option('xyz_lnap_post_logs'));
		
		$update_opt_array[0]=isset($arr_retrive[0]) ? $arr_retrive[0] : '';
		$update_opt_array[1]=isset($arr_retrive[1]) ? $arr_retrive[1] : '';
		$update_opt_array[2]=isset($arr_retrive[2]) ? $arr_retrive[2] : '';
		$update_opt_array[3]=isset($arr_retrive[3]) ? $arr_retrive[3] : '';
		$update_opt_array[4]=isset($arr_retrive[4]) ? $arr_retrive[4] : '';
		$update_opt_array[5]=isset($arr_retrive[5]) ? $arr_retrive[5] : '';
		$update_opt_array[6]=isset($arr_retrive[6]) ? $arr_retrive[6] : '';
		$update_opt_array[7]=isset($arr_retrive[7]) ? $arr_retrive[7] : '';
		$update_opt_array[8]=isset($arr_retrive[8]) ? $arr_retrive[8] : '';
		$update_opt_array[9]=isset($arr_retrive[9]) ? $arr_retrive[9] : '';
		array_shift($update_opt_array);
		array_push($update_opt_array,$post_ln_options);
		update_option('xyz_lnap_post_logs', $update_opt_array);
		
		
		}
	}
	
	$_POST=$_POST_CPY;
}

?>
