<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('report');?><?php include template('common/header'); ?><h3 class="flb">
<em>举报</em>
<span><a href="javascript:;" onclick="hideWindow('<?php echo $_G['gp_handlekey'];?>');" class="flbc" title="关闭">关闭</a></span>
</h3>
<form method="post" autocomplete="off" id="form_<?php echo $_G['gp_handlekey'];?>" name="form_<?php echo $_G['gp_handlekey'];?>" action="misc.php?mod=report" <?php if($_G['inajax']) { ?>onsubmit="ajaxpost(this.id, 'form_<?php echo $_G['gp_handlekey'];?>');"<?php } ?>>
<div class="reason_slct c" id="return_<?php echo $_G['gp_handlekey'];?>">
<p>可选举报理由</p>
<ul id="reportreason" class="reasonselect pt mtn mbn"><?php echo modreasonselect(); ?></ul>
<textarea id="message" name="message" class="reasonarea pt" onkeydown="ctrlEnter(event, 'reportsubmit', 1);" onkeyup="strLenCalc(this, 'checklen');" rows="4"></textarea>
<script type="text/javascript" reload="1">
var reasonSelectOption = $('reportreason').getElementsByTagName('li');
if (reasonSelectOption) {
for (i=0; i<reasonSelectOption.length; i++) {
reasonSelectOption[i].onmouseover = function() { this.className = 'xi2 cur1'; }
reasonSelectOption[i].onmouseout = function() { this.className = ''; }
reasonSelectOption[i].onclick = function() {
$('message').value = this.innerHTML;
}
}
}
</script>
</div>
<p class="o pns">
<span class="z">还可输入 <strong id="checklen">200</strong> 个字符</span>
<button type="submit" value="true" class="pn pnc"><strong>确定</strong></button>
</p>
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="reportsubmit" value="true" />
<input type="hidden" name="rtype" value="<?php echo $_G['gp_rtype'];?>" />
<input type="hidden" name="rid" value="<?php echo $_G['gp_rid'];?>" />
<?php if($_G['gp_fid']) { ?>
<input type="hidden" name="fid" value="<?php echo $_G['gp_fid'];?>" />
<?php } if($_G['gp_uid']) { ?>
<input type="hidden" name="uid" value="<?php echo $_G['gp_uid'];?>" />
<?php } ?>
<input type="hidden" name="url" value="<?php echo $_G['gp_url'];?>" />
<input type="hidden" name="inajax" value="<?php echo $_G['inajax'];?>" />
<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="<?php echo $_G['gp_handlekey'];?>" /><?php } ?>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
</form><?php include template('common/footer'); ?>