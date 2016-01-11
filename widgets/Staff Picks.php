

<aside class="sidebar-widget">
	<header>
        <h3>Staff Picks</h3>
	</header>
	<?php query_posts( 'showposts='.get_option('NurDos_Staff_Picks')); $i=0; ?>
    <ul>
    <?php while (have_posts()) : the_post(); ?>
			<?php if($i%2==0){?>
        <li class="item odd">
            <a href="<?php the_permalink() ?>" target="_blank">
              <img alt="Icon" src="<?php bloginfo('stylesheet_directory'); ?>/images/icon(23)"></a>
            <a href="<?php the_permalink() ?>" title="Learn more about <?php the_title(); ?> "><?php the_title(); ?></a>
			<?php $i++;?>
        </li>
		<?php  } else { ?>
    <li class="item even">
            <a href="<?php the_permalink() ?>" target="_blank">
              <img alt="Icon" src="<?php bloginfo('stylesheet_directory'); ?>/images/icon(24)"></a>
            <a href="<?php the_permalink() ?>" title="Learn more about <?php the_title(); ?> "><?php the_title(); ?></a>
			<?php $i++;?>
        </li>
          <?php }; endwhile;?>
    
    </ul>
</aside>
