<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('login');
0
|| checktplrefresh('./template/default/member/login.htm', './template/default/common/seccheck.htm', 1329445648, '1', './data/template/3_1_member_login.tpl.php', './template/default', 'member/login')
;?><?php include template('common/header'); ?><?php $loginhash = 'L'.random(4);?><?php if(empty($_G['gp_infloat'])) { ?>
<div id="ct" class="ptm wp w cl">
<div class="nfl" id="main_succeed" style="display: none">
<div class="f_c altw">
<div class="alert_right">
<p id="succeedmessage"></p>
<p id="succeedlocation" class="alert_btnleft"></p>
<p class="alert_btnleft"><a id="succeedmessage_href">如果你的浏览器没有自动跳转，请点击此链接</a></p>
</div>
</div>
</div>
<div class="mn" id="main_message">
<div class="bm">
<div class="bm_h bbs">
<span class="y">
<?php if(!empty($_G['setting']['pluginhooks']['logging_side_top'])) echo $_G['setting']['pluginhooks']['logging_side_top'];?>
<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="xi2">没有帐号？<?php echo $_G['setting']['reglinkname'];?></a>
</span>
<h3 class="xs2">登录</h3>
</div>
<div>
<?php } ?>

<div id="main_messaqge_<?php echo $loginhash;?>"<?php if($auth) { ?> style="width: auto"<?php } ?>>
<div id="layer_login_<?php echo $loginhash;?>">
<h3 class="flb">
<em id="returnmessage_<?php echo $loginhash;?>">
<?php if(!empty($_G['gp_infloat'])) { if(!empty($_G['gp_guestmessage'])) { ?>你需要先登录才能继续本操作<?php } elseif($auth) { ?>请补充下面的登录信息<?php } else { ?>用户登录<?php } } ?>
</em>
<span><?php if(!empty($_G['gp_infloat']) && !isset($_G['gp_frommessage'])) { ?><a href="javascript:;" class="flbc" onclick="hideWindow('<?php echo $_G['gp_handlekey'];?>', 0, 1);" title="关闭">关闭</a><?php } ?></span>
</h3>
<?php if(!empty($_G['setting']['pluginhooks']['logging_top'])) echo $_G['setting']['pluginhooks']['logging_top'];?>
<form method="post" autocomplete="off" name="login" id="loginform_<?php echo $loginhash;?>" class="cl" onsubmit="<?php if($this->setting['pwdsafety']) { ?>pwmd5('password3_<?php echo $loginhash;?>');<?php } ?>pwdclear = 1;ajaxpost('loginform_<?php echo $loginhash;?>', 'returnmessage_<?php echo $loginhash;?>', 'returnmessage_<?php echo $loginhash;?>', 'onerror');return false;" action="member.php?mod=logging&amp;action=login&amp;loginsubmit=yes<?php if(!empty($_G['gp_handlekey'])) { ?>&amp;handlekey=<?php echo $_G['gp_handlekey'];?><?php } if(isset($_G['gp_frommessage'])) { ?>&amp;frommessage<?php } ?>&amp;loginhash=<?php echo $loginhash;?>">
<div class="c cl">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<?php if($auth) { ?>
<input type="hidden" name="auth" value="<?php echo $auth;?>" />
<?php } if($invite) { ?>
<div class="rfm">
<table>
<tr>
<th>推荐人</th>
<td><a href="home.php?mod=space&amp;uid=<?php echo $invite['uid'];?>" target="_blank"><?php echo $invite['username'];?></a></td>
</tr>
</table>
</div>
<?php } if(!$auth) { ?>
<div class="rfm">
<table>
<tr>
<th>
<?php if($this->setting['autoidselect']) { ?><label for="username_<?php echo $loginhash;?>">帐号:</label><?php } else { ?>
<span class="login_slct">
<select name="loginfield" style="float: left;" width="45" id="loginfield_<?php echo $loginhash;?>">
<option value="username">用户名</option>
<option value="uid">UID</option>
<option value="email">Email</option>
</select>
</span>
<?php } ?>
</th>
<td><input type="text" name="username" id="username_<?php echo $loginhash;?>" autocomplete="off" size="30" class="px p_fre" tabindex="1" value="<?php echo $username;?>" /></td>
<td class="tipcol"><a href="member.php?mod=<?php echo $_G['setting']['regname'];?>"><?php echo $_G['setting']['reglinkname'];?></a></td>
</tr>
</table>
</div>
<div class="rfm">
<table>
<tr>
<th><label for="password3_<?php echo $loginhash;?>">密码:</label></th>
<td><input type="password" id="password3_<?php echo $loginhash;?>" name="password" onfocus="clearpwd()" size="30" class="px p_fre" tabindex="1" /></td>
<td class="tipcol"><a href="javascript:;" onclick="display('layer_login_<?php echo $loginhash;?>');display('layer_lostpw_<?php echo $loginhash;?>');" title="找回密码">找回密码</a></td>
</tr>
</table>
</div>
<?php } if(empty($_G['gp_auth']) || $questionexist) { ?>
<div class="rfm">
<table>
<tr>
<th>安全提问:</th>
<td><select id="loginquestionid_<?php echo $loginhash;?>" width="213" name="questionid"<?php if(!$questionexist) { ?> onchange="if($('loginquestionid_<?php echo $loginhash;?>').value > 0) {$('loginanswer_row_<?php echo $loginhash;?>').style.display='';} else {$('loginanswer_row_<?php echo $loginhash;?>').style.display='none';}"<?php } ?>>
<option value="0"><?php if($questionexist) { ?>安全提问<?php } else { ?>安全提问(未设置请忽略)<?php } ?></option>
<option value="1">母亲的名字</option>
<option value="2">爷爷的名字</option>
<option value="3">父亲出生的城市</option>
<option value="4">你其中一位老师的名字</option>
<option value="5">你个人计算机的型号</option>
<option value="6">你最喜欢的餐馆名称</option>
<option value="7">驾驶执照最后四位数字</option>
</select></td>
</tr>
</table>
</div>
<div class="rfm" id="loginanswer_row_<?php echo $loginhash;?>" <?php if(!$questionexist) { ?> style="display:none"<?php } ?>>
<table>
<tr>
<th>答案:</th>
<td><input type="text" name="answer" id="loginanswer_<?php echo $loginhash;?>" autocomplete="off" size="30" class="px p_fre" tabindex="1" /></td>
</tr>
</table>
</div>
<?php } if($secqaacheck || $seccodecheck) { ?><?php
$sectpl = <<<EOF
<div class="rfm"><table><tr><th><sec>: </th><td><sec><br /><sec></td></tr></table></div>
EOF;
?><?php $_G['sechashi'] = !empty($_G['cookie']['sechashi']) ? $_G['sechash'] + 1 : 0;
$sechash = 'S'.($_G['inajax'] ? 'A' : '').$_G['sid'].$_G['sechashi'];
$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');
$sectpldefault = $sectpl;
$sectplqaa = str_replace('<hash>', 'qaa'.$sechash, $sectpldefault);
$sectplcode = str_replace('<hash>', 'code'.$sechash, $sectpldefault);
$secshow = !isset($secshow) ? 1 : $secshow;
$sectabindex = !isset($sectabindex) ? 1 : $sectabindex;?><?php
$__STATICURL = STATICURL;$seccheckhtml = <<<EOF

<input name="sechash" type="hidden" value="{$sechash}" />

EOF;
 if($sectpl) { if($secqaacheck) { 
$seccheckhtml .= <<<EOF

{$sectplqaa['0']}验证问答{$sectplqaa['1']}<input name="secanswer" id="secqaaverify_{$sechash}" type="text" autocomplete="off" style="width:100px" class="txt px vm" onblur="checksec('qaa', '{$sechash}')" tabindex="{$sectabindex}" />
<a href="javascript:;" onclick="updatesecqaa('{$sechash}');doane(event);" class="xi2">换一个</a>
<span id="checksecqaaverify_{$sechash}"><img src="{$__STATICURL}image/common/none.gif" width="16" height="16" class="vm" /></span>
{$sectplqaa['2']}<span id="secqaa_{$sechash}"></span>

EOF;
 if($secshow) { 
$seccheckhtml .= <<<EOF
<script type="text/javascript" reload="1">updatesecqaa('{$sechash}');</script>
EOF;
 } 
$seccheckhtml .= <<<EOF

{$sectplqaa['3']}

EOF;
 } if($seccodecheck) { 
$seccheckhtml .= <<<EOF

{$sectplcode['0']}验证码{$sectplcode['1']}<input name="seccodeverify" id="seccodeverify_{$sechash}" type="text" autocomplete="off" style="
EOF;
 if($_G['setting']['seccodedata']['type'] != 1) { 
$seccheckhtml .= <<<EOF
ime-mode:disabled;
EOF;
 } 
$seccheckhtml .= <<<EOF
width:100px" class="txt px vm" onblur="checksec('code', '{$sechash}')" tabindex="{$sectabindex}" />
<a href="javascript:;" onclick="updateseccode('{$sechash}');doane(event);" class="xi2">换一个</a>
<span id="checkseccodeverify_{$sechash}"><img src="{$__STATICURL}image/common/none.gif" width="16" height="16" class="vm" /></span>
{$sectplcode['2']}<span id="seccode_{$sechash}"></span>

EOF;
 if($secshow) { 
$seccheckhtml .= <<<EOF
<script type="text/javascript" reload="1">updateseccode('{$sechash}');</script>
EOF;
 } 
$seccheckhtml .= <<<EOF

{$sectplcode['3']}

EOF;
 } } 
$seccheckhtml .= <<<EOF


EOF;
?><?php unset($secshow);?><?php if(empty($secreturn)) { ?><?php echo $seccheckhtml;?><?php } } ?>

<?php if(!empty($_G['setting']['pluginhooks']['logging_input'])) echo $_G['setting']['pluginhooks']['logging_input'];?>

<div class="rfm <?php if(!empty($_G['gp_infloat'])) { ?> bw0<?php } ?>">
<table>
<tr>
<th></th>
<td><label for="cookietime_<?php echo $loginhash;?>"><input type="checkbox" class="pc" name="cookietime" id="cookietime_<?php echo $loginhash;?>" tabindex="1" value="2592000" <?php echo $cookietimecheck;?> />自动登录</label></td>
</tr>
</table>
</div>

<div class="rfm mbw bw0">
<table width="100%">
<tr>
<th>&nbsp;</th>
<td>
<button class="pn pnc" type="submit" name="loginsubmit" value="true" tabindex="1"><strong>登录</strong></button>
</td>
<td>
<?php if($this->setting['sitemessage']['login'] && empty($_G['gp_infloat'])) { ?><a href="javascript:;" id="custominfo_login_<?php echo $loginhash;?>" class="y">&nbsp;<img src="<?php echo IMGDIR;?>/info_small.gif" alt="帮助" class="vm" /></a><?php } if(!$this->setting['bbclosed'] && empty($_G['gp_infloat'])) { ?><a href="javascript:;" onclick="ajaxget('member.php?mod=clearcookies&formhash=<?php echo FORMHASH;?>', 'returnmessage_<?php echo $loginhash;?>', 'returnmessage_<?php echo $loginhash;?>');return false;" title="清除痕迹" class="y">清除痕迹</a><?php } ?>
</td>
</tr>
</table>
</div>

<?php if(!empty($_G['setting']['pluginhooks']['logging_method'])) { ?>
<div class="rfm bw0 <?php if(empty($_G['gp_infloat'])) { ?> mbw<?php } ?>">
<hr class="l" />
<table>
<tr>
<th>快捷登录:</th>
<td><?php if(!empty($_G['setting']['pluginhooks']['logging_method'])) echo $_G['setting']['pluginhooks']['logging_method'];?></td>
</tr>
</table>
</div>
<?php } ?>
</div>
</form>
</div>
<div id="layer_lostpw_<?php echo $loginhash;?>" style="display: none;">
<h3 class="flb">
<em id="returnmessage3_<?php echo $loginhash;?>">找回密码</em>
<span><?php if(!empty($_G['gp_infloat']) && !isset($_G['gp_frommessage'])) { ?><a href="javascript:;" class="flbc" onclick="hideWindow('login')" title="关闭">关闭</a><?php } ?></span>
</h3>
<form method="post" autocomplete="off" id="lostpwform_<?php echo $loginhash;?>" class="cl" onsubmit="ajaxpost('lostpwform_<?php echo $loginhash;?>', 'returnmessage3_<?php echo $loginhash;?>', 'returnmessage3_<?php echo $loginhash;?>', 'onerror');return false;" action="member.php?mod=lostpasswd&amp;lostpwsubmit=yes&amp;infloat=yes">
<div class="c cl">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="handlekey" value="lostpwform" />
<div class="rfm">
<table>
<tr>
<th><label for="lostpw_username">用户名:</label></th>
<td><input type="text" name="username" id="lostpw_username" size="30" value=""  tabindex="1" class="px p_fre" /></td>
</tr>
</table>
</div>
<div class="rfm">
<table>
<tr>
<th><label for="lostpw_email">Email:</label></th>
<td><input type="text" name="email" id="lostpw_email" size="30" value=""  tabindex="1" class="px p_fre" /></td>
</tr>
</table>
</div>

<div class="rfm mbw bw0">
<table>
<tr>
<th></th>
<td><button class="pn pnc" type="submit" name="lostpwsubmit" value="true" tabindex="100"><span>提交</span></button></td>
</tr>
</table>
</div>
</div>
</form>
</div>
</div>

<div id="layer_message_<?php echo $loginhash;?>"<?php if(empty($_G['gp_infloat'])) { ?> class="f_c blr nfl"<?php } ?> style="display: none;">
<h3 class="flb" id="layer_header_<?php echo $loginhash;?>">
<?php if(!empty($_G['gp_infloat']) && !isset($_G['gp_frommessage'])) { ?>
<em>用户登录</em>
<span><a href="javascript:;" class="flbc" onclick="hideWindow('login')" title="关闭">关闭</a></span>
<?php } ?>
</h3>
<div class="c"><div class="alert_right">
<div id="messageleft_<?php echo $loginhash;?>"></div>
<p class="alert_btnleft" id="messageright_<?php echo $loginhash;?>"></p>
</div>
</div>

<script src="<?php echo $this->setting['jspath'];?>md5.js?<?php echo VERHASH;?>" type="text/javascript" reload="1"></script>
<script type="text/javascript" reload="1">
<?php if(!isset($_G['gp_viewlostpw'])) { ?>
var pwdclear = 0;
function initinput_login() {
document.body.focus();
<?php if(!$auth) { ?>
if($('loginform_<?php echo $loginhash;?>')) {
$('loginform_<?php echo $loginhash;?>').username.focus();
}
<?php if(!$this->setting['autoidselect']) { ?>
simulateSelect('loginfield_<?php echo $loginhash;?>');
<?php } } ?>
}
initinput_login();
<?php if($this->setting['sitemessage']['login']) { ?>
showPrompt('custominfo_login_<?php echo $loginhash;?>', 'mouseover', '<?php echo trim($this->setting['sitemessage']['login'][array_rand($this->setting['sitemessage']['login'])]); ?>', <?php echo $this->setting['sitemessage']['time'];?>);
<?php } if($this->setting['pwdsafety']) { ?>
var pwmd5log = new Array();
function pwmd5() {
if(!$(pwmd5.arguments[i])) {
return;
}
numargs = pwmd5.arguments.length;
for(var i = 0; i < numargs; i++) {
if(!pwmd5log[pwmd5.arguments[i]] || $(pwmd5.arguments[i]).value.length != 32) {
pwmd5log[pwmd5.arguments[i]] = $(pwmd5.arguments[i]).value = hex_md5($(pwmd5.arguments[i]).value);
}
}
}
<?php } ?>

function clearpwd() {
if(pwdclear) {
$('password3_<?php echo $loginhash;?>').value = '';
}
pwdclear = 0;
}
<?php } else { ?>
display('layer_login_<?php echo $loginhash;?>');
display('layer_lostpw_<?php echo $loginhash;?>');
$('lostpw_username').focus();
<?php } ?>
</script><?php updatesession();?><?php if(empty($_G['gp_infloat'])) { ?>
</div></div></div></div>
</div>
<?php } include template('common/footer'); ?>