<?php
/**
* index.phpは最も優先順位が低く、かつ重要なページテンプレートです。
* 指定のテンプレートが見つからない時に、最終的に全てのページはこのindex.phpを利用します。
* 本学習用テーマ「Sample Corporation」では、全ての投稿アーカイブページで利用しています。
* アーカイブページのデザインを変更したい場合は、index.php複製してcategory.php/archive.phpなどを作成・変更するようにします。
*/
?>


<?php get_header(); //header.phpを取得 ?>

<div id="main" class="cfx">

	<div id="left-column">
	
	<?php if ( have_posts() ) : // ループ開始　投稿があるなら ?>
		
		<?php while ( have_posts() ) : the_post();//繰り返し処理開始 ?>	
		
			<div class="archive-box">
	
				<div <?php post_class(); //CSSカスタム用のクラスを付加（投稿ID、投稿タイプなど） ?>>
				
					<h2 class="page-title"><a href="<?php the_permalink(); //投稿（固定ページ）のリンクを取得 ?>"><?php the_title(); //投稿（固定ページ）のタイトルを表示 ?></a></h2>
					<div class="page-meta">投稿日：<?php the_time('Y.m.j');//投稿日時を表示 パラメータで書式を指定 ?>　｜　カテゴリー：　<?php the_category(','); //投稿の属するカテゴリー名を全て表示 パラメータで区切り文字を指定 ?></div>
					<div class="page-content"><?php the_content(); //投稿（固定ページ）の本文を表示 ?></div>
				
				</div>
				
			</div>
	
		<?php endwhile; // 繰り返し終了 ?>
	
		<div id="post-link" class="cfx">
			<p id="post-link-prev"><?php next_posts_link('もっと見る' ); //次のページへのリンクを表示 ?></p>
			<p id="post-link-next"><?php previous_posts_link('新しい記事一覧へ戻る' ); //前のページへのリンクを表示 ?></p>
		</div>
					
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