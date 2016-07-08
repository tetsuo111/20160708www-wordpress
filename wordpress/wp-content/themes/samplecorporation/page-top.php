<?php
/**
* Template Name: トップページ用テンプレート
*
* これはカスタム固定ページテンプレートです。
* 固定ページ編集画面から使用するテンプレートを指定できます。
*/
?>

<?php get_header(); //header.phpを取得 ?>

<div id="main">

	<div id="top-mainmenu" class="cfx">
	
		<div id="top-news">
		
			<?php
			//　---------------- 新着情報　WP_query-------------------
			$args = array(
			'category_name' => 'news',// カテゴリー「news」を読み込む
			'posts_per_page' => 4// 表示数　4件
			);
			$the_query = new WP_Query( $args );// 新規WP query を作成　変数args で定義したパラメータを参照
			if ( $the_query->have_posts() ) :
			// ここから表示する内容を記入
			?>

			<h2 id="top-news-title">新着情報</h2>
			
			<ul id="top-news-posts">
					
				<?php while ( $the_query->have_posts() ) : $the_query->the_post();
				// -------- ここから繰り返し---------- ?>

				<li class="top-news-post cfx">
					<a href="<?php the_permalink();//投稿のURLを取得 ?>">
						<?php if(has_post_thumbnail()) { the_post_thumbnail( array(90,90) ); } else { //条件分岐開始。投稿のサムネイルを表示し、サムネイルがない場合は指定の画像を表示 ?>
							<img src="<?php echo get_template_directory_uri(); ?>/img/noimage.png" width="90" height="90" />
						<?php } //条件分岐終了?>
						<span><?php the_time('Y.m.j') //投稿日を表示 ?></span>
						<h3><?php the_title(); //投稿タイトルを表示 ?></h3>
					</a>
				</li>
								
				<?php // -------- 繰り返しここまで-----------
				endwhile; ?>

			</ul>
			
			<p id="top-news-link"><a href="<?php echo home_url(); ?>/category/news/">一覧を見る</a></p>

			<?php
			// -------- 新着情報WP_query終了-----------
			endif;
			wp_reset_postdata();
			?>
		
		</div>
		
		<div id="top-service">
		
			<h2 id="top-service-title">事業紹介</h2>
			
			<ul id="top-service-item" class="cfx">
			
				<li><a href="<?php echo home_url(); ?>/service/#kitchen"><img src="<?php echo get_template_directory_uri(); ?>/img/top_service1.png" width="160" height="210" /></a></li>
				<li><a href="<?php echo home_url(); ?>/service/#living"><img src="<?php echo get_template_directory_uri(); ?>/img/top_service2.png" width="160" height="210" /></a></li>
				<li><a href="<?php echo home_url(); ?>/service/#bathroom"><img src="<?php echo get_template_directory_uri(); ?>/img/top_service3.png" width="160" height="210" /></a></li>
				<li><a href="<?php echo home_url(); ?>/service/#toilet"><img src="<?php echo get_template_directory_uri(); ?>/img/top_service4.png" width="160" height="210" /></a></li>
				<li><a href="<?php echo home_url(); ?>/service/#otherreform"><img src="<?php echo get_template_directory_uri(); ?>/img/top_service5.png" width="160" height="210" /></a></li>
				<li><a href="<?php echo home_url(); ?>/service/#otherworks"><img src="<?php echo get_template_directory_uri(); ?>/img/top_service6.png" width="160" height="210" /></a></li>
			
			</ul>
			
			<p id="top-service-link"><a href="<?php echo home_url(); ?>/service/">事業紹介を見る</a></p>
		
		</div>
	
	</div>
	
	<div id="top-jirei">
	
		<h2 id="top-jirei-title">施工事例</h2>
		
		<ul id="top-jirei-content" class="cfx">
		
			<li><a href="<?php echo home_url(); ?>/reform/kitchen/"><img src="<?php echo get_template_directory_uri(); ?>/img/top_jirei_pic1.jpg" width="180" height="130" /><h3>キッチンリフォーム</h3></a></li>
			<li><a href="<?php echo home_url(); ?>/reform/living/"><img src="<?php echo get_template_directory_uri(); ?>/img/top_jirei_pic2.jpg" width="180" height="130" /><h3>リビングリフォーム</h3></a></li>
			<li><a href="<?php echo home_url(); ?>/reform/bathroom/"><img src="<?php echo get_template_directory_uri(); ?>/img/top_jirei_pic3.jpg" width="180" height="130" /><h3>洗面所リフォーム</h3></a></li>
			<li><a href="<?php echo home_url(); ?>/reform/toilet/"><img src="<?php echo get_template_directory_uri(); ?>/img/top_jirei_pic4.jpg" width="180" height="130" /><h3>トイレリフォーム</h3></a></li>
			<li><a href="<?php echo home_url(); ?>/reform/garden/"><img src="<?php echo get_template_directory_uri(); ?>/img/top_jirei_pic5.jpg" width="180" height="130" /><h3>ガーデンリフォーム</h3></a></li>
		
		</ul>

		<p id="top-jirei-link"><a href="<?php echo home_url(); ?>/reform/">事業紹介を見る</a></p>
	
	</div>
	
</div>

<?php if ( have_posts() ) : // メインループ開始 ?>

<div id="top-maincontent">

	<h1>私たちの想い</h1>
	
	<div id="top-maincontent-box">

	<?php while ( have_posts() ) : the_post();//繰り返し処理開始 ?>
			
		<div id="top-maincontent-text"><?php the_content(); ?></div>
			
	<?php endwhile; // 繰り返し終了 ?>

	</div>
	
</div>

<?php endif; //ループ終了 ?>
	
<?php get_footer(); //footer.phpを取得　PHPで終了するので閉じタグは不要です