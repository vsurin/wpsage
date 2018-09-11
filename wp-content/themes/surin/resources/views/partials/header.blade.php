<header class="header">
  <div class="container">
    <span>About My</span>
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
  <div class="menu">
      <ul>
          <li>
              <a href="/api-post/" class="active">HOME</a>
          </li>
          <li>
              <a href="#">CATEGORIES</a>
          </li>
          <li>
              <a href="#">STORE</a>
          </li>
          <li>
              <a href="#">OTHERS</a>
          </li>
      </ul>
  </div>
</header>
