<?php
/**
* 
* フッターの内容が記述されたテンプレートパーツです。
*
*/
?>

<div id="footer">

	<div id="footer-contact"><a href="<?php echo home_url(); ?>/contact/">お問い合わせフォームから</a></div>

	<div id="footer-copyright"><p>copyright <?php bloginfo( 'name' ); ?> All Right Reserved.</p></div>

</div>

<?php wp_footer(); //wp_footerはテーマの</body>タグ直前に必ず挿入します ?>

</body>

</html>