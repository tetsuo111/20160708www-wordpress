<?php
/**
 * 
 * ヘッダーの内容が記述されたテンプレートパーツです。
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); //文字セットを取得 ?>" />
	<title><?php wp_title('&laquo;', true, 'right'); //記事タイトルを表示 ?> <?php bloginfo('name'); //サイト名を表示 ?></title>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); //使用中テーマのスタイルシートURLを取得 ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); //ピングバックURLを取得 ?>" />
	<?php wp_head(); //wp_headはテーマの</head>タグ直前に必ず挿入します ?>
</head>

<body <?php body_class(); //ページの種類に応じたクラス名を与える ?>>

<div id="header">

	<div id="header-top" class="cfx">
	
		<h2 id="header-banner"><a href="<?php echo home_url(); ?>">株式会社サンプルコーポレーション</a></h2>
		
		<div id="header-nav">
		
			<p id="header-contact"><a href="<?php echo home_url(); ?>/contact/">お問い合わせ</a></p>
						
			<div id="header-menu"><?php wp_nav_menu( array('theme_location' => 'simplenav' , 'container' => false)); //カスタムメニューを表示 ?></div>
		
		</div>
		
	</div>
		
	<div id="header-pic">
		<?php if(is_front_page()): ?>	
			<p><?php bloginfo( 'description' ); //キャッチフレーズを表示 ?></p>
		<?php else: ?>
		<p><?php bloginfo('description');//キャッチフレーズ?></p>
		<?php endif ; ?>

		
	</div>

</div>
