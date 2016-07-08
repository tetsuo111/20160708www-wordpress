<?php
/**
 *
 * サイドバーの内容が記述されたテンプレートパーツです。
 * 上部にオリジナルデザインのサイドバーがあります。
 * 下部には管理画面から変更可能なウィジェットエリアを作成します(dynamic_sidebarの行)。
 * ウィジェットエリアに表示する内容は管理画面「外観＞ウィジェット」から管理します。
 *
 */
?>


<div id="sidebar-main">
	
	<div id="sidebar-menu">
		
		<h3 id="sidebar-menu-title">MENU</h3>
		
		<ul id="sidebar-menu-parent">
			<li><a href="<?php echo home_url(); ?>">ホーム</a></li>
			<li><a href="<?php echo home_url(); ?>/service/">事業紹介</a></li>
			<li><a href="<?php echo home_url(); ?>/reform/">施工事例</a>
				<ul id="sidebar-menu-child">
					<li><a href="<?php echo home_url(); ?>/reform/kitchen/">キッチンリフォーム</a></li>
					<li><a href="<?php echo home_url(); ?>/reform/living/">リビングリフォーム</a></li>
					<li><a href="<?php echo home_url(); ?>/reform/bathroom/">洗面所リフォーム</a></li>
					<li><a href="<?php echo home_url(); ?>/reform/toilet/">トイレリフォーム</a></li>
					<li><a href="<?php echo home_url(); ?>/reform/garden/">ガーデンリフォーム</a></li>
				</ul>
			</li>
			<li><a href="<?php echo home_url(); ?>/access/">アクセス</a></li>
			<li><a href="<?php echo home_url(); ?>/blog/">スタッフブログ</a></li>
		</ul>
		
	</div>
	
	<div id="sidebar-contact">
		<p id="sidebar-contact-button"><a href="<?php echo home_url(); ?>/contact/">お問い合わせ</a></p>
		<p id="sidebar-contact-tel"><img src="<?php echo get_template_directory_uri(); ?>/img/sidebar_tel.png" alt="お電話はこちら" width="172" height="67" /></p>
	</div>
	
</div>

<?php dynamic_sidebar( 'サイドバー' );//functions.phpで定義したウィジェットエリア「サイドバー」を表示 ?>