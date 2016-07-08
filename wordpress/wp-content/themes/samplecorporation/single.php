<?php
/**
* single.phpは投稿ページテンプレートです。
* このテンプレートを利用する全てのページでコメント機能を無効化したい場合は　comments_template();　の行を削除します。
* （投稿ごとのコメント有効/無効化は、投稿編集画面の「ディスカッション」で切り替えます）
*/
?>

<?php get_header(); //header.phpを取得 ?>

<div id="main" class="cfx">

	<div id="left-column">
	
	<?php if ( have_posts() ) : // ループ開始　投稿があるなら ?>
		
		<?php while ( have_posts() ) : the_post();//繰り返し処理開始 ?>	
	
			<div <?php post_class(); //CSSカスタム用のクラスを付加（投稿ID、投稿タイプなど） ?>>
			
				<h1 class="page-title"><?php the_title(); //投稿（固定ページ）のタイトルを表示 ?></h1>
				<div class="page-meta">投稿日：<?php the_time('Y.m.j');//投稿日時を表示 パラメータで書式を指定 ?>　｜　カテゴリー：　<?php the_category(','); //投稿の属するカテゴリー名を全て表示 パラメータで区切り文字を指定 ?></div>
				<div class="page-content"><?php the_content(); //投稿（固定ページ）の本文を表示 ?></div>
			
			</div>
	
			<div id="post-link" class="cfx">
				<p id="post-link-prev"><?php previous_post_link('%link', '前の記事へ' ); //前の記事へのリンクを表示 ?></p>
				<p id="post-link-next"><?php next_post_link('%link', '新しい記事へ' ); //次の記事へのリンクを表示 ?></p>
			</div>
		
			<div id="comment-container"><?php comments_template(); //WordPressデフォルトのコメントテンプレートを表示(このテーマは解説の都合によりcomments.phpがありませんがWordPress Ver3.0からcomments.phpのないテーマは非推奨となりました。) ?></div>
	
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