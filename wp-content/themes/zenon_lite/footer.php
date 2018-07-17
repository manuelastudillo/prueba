<!--FOOTER SIDEBAR-->
<div id="footer">
    <div class="widgets"><ul><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widgets') ) : ?><?php endif; ?></ul>
            </div>
    </div>


        <!--FOOTER MENU-->    
            <div id="footmenu">
            <?php wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'footer', 'depth' => 0, 'fallback_cb' =>false) ); ?>
            </div>
    </div>


</div>
<?php wp_footer(); ?>
</body>
</html>