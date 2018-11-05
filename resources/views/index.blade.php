<!--
 *_______________#########_______________________
 *______________############_____________________
 *______________#############____________________
 *_____________##__###########___________________
 *____________###__######_#####__________________
 *____________###_#######___####_________________
 *___________###__##########_####________________
 *__________####__###########_####_______________
 *________#####___###########__#####_____________
 *_______######___###_########___#####___________
 *_______#####___###___########___######_________
 *______######___###__###########___######_______
 *_____######___####_##############__######______
 *____#######__#####################_#######_____
 *____#######__##############################____
 *___#######__######_#################_#######___
 *___#######__######_######_#########___######___
 *___#######____##__######___######_____######___
 *___#######________######____#####_____#####____
 *____######________#####_____#####_____####_____
 *_____#####________####______#####_____###______
 *______#####______;###________###______#________
 *________##_______####________####______________
 * 公主殿下 -->
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>萌音云笔记 - 一个高效的在线云笔记、专注技术文档在线创作、阅读、分享和托管</title>
		<meta name="keywords" content="萌音云笔记,在线笔记,笔记文档,云笔记,萌音云" />
		<meta name="description" content="萌音云笔记，一个高效的在线云笔记、专注技术文档在线创作、阅读、分享和托管" />
		<meta name="author" content="阿珏博客">
		<meta name="generator" content="萌音云笔记">
    	<link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.1/css/mdui.min.css">
		<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" />
		<link href="https://lib.baomitu.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
		<script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.1/js/mdui.min.js"></script>
		<link rel="shortcut icon" href="{{asset('favicon.ico')}}">
	</head>
	<body class=" mdui-theme-primary-indigo mdui-theme-accent-pink">
		<div class="mdui-appbar mdui-shadow-0 mdui-appbar-fixed mdui-appbar-scroll-hide mdui-headroom mdui-headroom-pinned-top">
			<div class="mdui-toolbar mdui-color-theme">
				<a href="/" class="mdui-typo-headline">萌音云笔记</a>
				<div class="mdui-toolbar-spacer"></div>
				<a href="https://github.com/178146582/note" class="mdui-btn mdui-btn-icon" mdui-tooltip="{content: 'GitHub', position: 'bottom'}"><i class="mdui-icon ion-social-github"></i></a>
				<a href="https://www.moeins.com" class="mdui-btn mdui-btn-icon"><i class="mdui-icon ion-chatbubbles" mdui-tooltip="{content: '讨论社区', position: 'bottom'}"></i></a>
				<a href="https://note.52ecy.cn" mdui-tooltip="{content: '演示站点', position: 'bottom'}" class="mdui-btn mdui-btn-icon"><i class="mdui-icon ion-erlenmeyer-flask"></i></a>
			</div>
		</div>		<div class="main-section mdui-color-theme">
			<div class="mdui-container">
				<div class="logo-container">
					<i class="mdui-icon material-icons" style="font-size: 200px;">cloud_queue</i>
					<h1>萌音云笔记</h1>
					<h4>一个高效的在线云笔记、专注技术文档在线创作、阅读、分享和托管</h4>
					<div class="download_btn">
						<a mdui-tooltip="{content: '萌音云笔记网页版', position: 'top'}" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent btn-lg" href="{{url('web')}}">开始创作</a>
					</div>
					<div class="link_group">
						
						<span class="link_single">
							<i class="mdui-icon ion-social-github icon"></i> <a href="https://github.com/178146582/note" rel="nofollow" target="_blank" class="main-meta-btn">Github</a>
						</span>
						<span class="link_single">
							<i class="mdui-icon ion-paper-airplane icon"></i> <a href="http://shang.qq.com/wpa/qunwpa?idkey=826e8e5961b8acf3eb7bb4fd8595a59e38deb618deaee70912dd0c4cd9f97457" rel="nofollow" target="_blank" class="main-meta-btn">QQ群</a>
						</span>
						<span class="link_single">
							<i class="mdui-icon ion-android-cart icon"></i> <a href="https://pay.52ecy.cn/?cid=23&pid=22" rel="nofollow" target="_blank" class="main-meta-btn">投喂</a>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="mdui-container feature">
			<div class="mdui-row">
				<div class="mdui-col-md-4">
					<div class="adv-item">
						<i class="  mdui-text-color-theme ion-upload adv-item-icon"></i>
						<div class="adv-item-detail">
							<div class="adv-item-detail-title">云存储</div>
							<div class="adv-item-detail-desc">云端笔记，多端同步，随时查看随时备份，重要资料还可加密保存。 </div>
						</div>
					</div>
				</div>
				<div class="mdui-col-md-4">
					<div class="adv-item">
						<i class="mdui-text-color-theme ion-person-stalker adv-item-icon"></i>
						<div class="adv-item-detail">
							<div class="adv-item-detail-title">多用户</div>
							<div class="adv-item-detail-desc">你可以将萌音云笔记作为私有笔记使用，也可作为公有笔记平台使用。</div>
						</div>
					</div>
				</div>
				<div class="mdui-col-md-4">
					<div class="adv-item">
						<i class="mdui-text-color-theme ion-levels adv-item-icon"></i>
						<div class="adv-item-detail">
							<div class="adv-item-detail-title">离线创作</div>
							<div class="adv-item-detail-desc">支持断网写笔记，没有网络一样创作</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mdui-row mdui-m-t-5">
				<div class="mdui-col-md-4">
					<div class="adv-item">
						<i class="  mdui-text-color-theme ion-eye adv-item-icon"></i>
						<div class="adv-item-detail">
							<div class="adv-item-detail-title">在线预览</div>
							<div class="adv-item-detail-desc">支持图片、视频、音频、Office文档在线预览；文本文件、Markdown文件在线编辑。</div>
						</div>
					</div>
				</div>
				<div class="mdui-col-md-4">
					<div class="adv-item">
						<i class="mdui-text-color-theme ion-android-share-alt adv-item-icon"></i>
						<div class="adv-item-detail">
							<div class="adv-item-detail-title">笔记分享</div>
							<div class="adv-item-detail-desc">用户可以创建私有或公有分享链接，快速分享笔记给好友。</div>
						</div>
					</div>
				</div>
				<div class="mdui-col-md-4">
					<div class="adv-item">
						<i class="mdui-text-color-theme ion-paper-airplane adv-item-icon"></i>
						<div class="adv-item-detail">
							<div class="adv-item-detail-title">多终端支持</div>
							<div class="adv-item-detail-desc">PC/iPhone/Android/web/iPad/Mac/Wap……无惧断网/断电困扰，任何情况下都能轻松查阅。。</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mdui-row mdui-m-t-5">
				<div class="mdui-col-md-4">
					<div class="adv-item">
						<i class="  mdui-text-color-theme ion-iphone adv-item-icon"></i>
						<div class="adv-item-detail">
							<div class="adv-item-detail-title">响应式布局</div>
							<div class="adv-item-detail-desc">全站响应式布局，移动端也能拥有良好的使用体验</div>
						</div>
					</div>
				</div>
				<div class="mdui-col-md-4">
					<div class="adv-item">
						<i class="mdui-text-color-theme ion-upload adv-item-icon"></i>
						<div class="adv-item-detail">
							<div class="adv-item-detail-title">图片上传</div>
							<div class="adv-item-detail-desc">拥有云笔记图床，全球cdn加速，不限外链，不限流量</div>
						</div>
					</div>
				</div>
				<div class="mdui-col-md-4">
					<div class="adv-item">
						<i class="mdui-text-color-theme ion-briefcase adv-item-icon"></i>
						<div class="adv-item-detail">
							<div class="adv-item-detail-title">易于部署</div>
							<div class="adv-item-detail-desc">使用PHP + MySQL架构，简单5分钟即可成功部署您的专属云笔记。</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer>Copyright © 2018<br> <a href="https://note.52ecy.cn" style="color: #dfdfdf; text-decoration:none; ">萌音云笔记</a> All rights reserved.</footer>
	</body>
</html>