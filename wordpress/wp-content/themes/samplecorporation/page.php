<?php
/**
* page.phpは固定ページのデフォルトテンプレートです。
* 本テーマ「Sample Corporation」はカスタム固定ページテンプレート「page-top.php」を含むため、固定ページ編集画面から使用するテンプレートを切り替える機能が有効化されています。
* このテンプレートを使用したい時は「デフォルトテンプレート」を選択します（固定ページを新規作成時は初期値でデフォルトテンプレートが適用されます）。
*/
?>

<?php get_header(); //header.phpを取得 ?>

<div id="main" class="cfx">

	<div id="left-column">
	
	<?php if ( have_posts() ) : // ループ開始　投稿があるなら ?>
		
		<?php while ( have_posts() ) : the_post();//繰り返し処理開始 ?>	
	
			<div <?php post_class(); //CSSカスタム用のクラスを付加（投稿ID、投稿タイプなど） ?>>
			
				<h1 class="page-title"><?php the_title(); //投稿（固定ページ）のタイトルを表示 ?></h1>
				<div class="page-content"><?php the_content(); //投稿（固定ページ）の本文を表示 ?></div>
			
			</div>
				
		<?php endwhile; // 繰り返し終了 ?>
	
	<?php else : //投稿が無い場合は ?>
	
		<h2>投稿がみつかりません。</h2>
		<p><a href="<?php echo home_url(); //サイトURLを取得 ?>">トップページに戻る</a></p>
	
	<?php endif; //ループ終了 ?>
	
	</div>
	
	<div id="right-column">
	
		<?php get_sidebar(); //sidebar.phpを取得 ?>
	
	</div>
	
</div>
	
<?php get_footer(); //footer.phpを取得　PHPで終了するので閉じタグは不要です