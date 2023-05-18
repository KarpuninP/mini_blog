<?php
/*
Template Name: about
*/
// подключаем хедер
get_header();
?>

	<main>
		<?php
		// проверка есть ли посты
		if(have_posts()) :
			while (have_posts()):
		// Функция выводы записи из бд, очень важный параметр, если его не дать то страница выведится в бесконечный цикл
				the_post();
		?>
		<div class="container mtb-10 ">
			<div class="row">
				<div class="col-md-4">
					<!--Вставляем фотку с задаными классами-->
					<?php the_post_thumbnail('medium', ['class' => 'mg-fluid rounded-circle mb-3 img-thumbnail']); ?>

				</div>
				<div class="col-md-8">
					<!-- выводит заголовок -->
					<h1><?php the_title(); ?></h1>
						<!-- вывод контекта	-->
					<?php the_content(); ?>

				</div>
			</div>
		</div>
<!-- закрытие цикла 	-->
		<?php
			endwhile;
		endif;
		?>
	</main>

<?php
// подключаем футер
get_footer();
?>