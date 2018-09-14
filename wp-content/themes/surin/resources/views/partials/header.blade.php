<header class="header">
  <div class="container">
    <span>About My</span>

    <div class="socal-icon">
        <a href="#">
            <div class="icon-facebook"></div>
        </a>
        <a href="#">
            <div class="icon-twiter"></div>
        </a>
        <a href="#">
            <div class="icon-bb"></div>
        </a>
        <a href="#">
            <div class="icon-soc1"></div>
        </a>
        <a href="#">
            <div class="icon-p"></div>
        </a>
        <a href="#">
            <div class="icon-inst"></div>
        </a>
    </div>
  </div>
  <hr>
  <div class="container">
      <p><?php bloginfo( 'name' ); ?></p>
      <p>
        <?php
          $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) {
            echo $description;
           }
        ?>
      </p>
  </div>
</header>
<div class="menu">
    <div class="container">
        {{ wp_nav_menu() }}
    </div>
</div>
