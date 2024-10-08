<?php
function category_buttons(){
    ob_start(); 
    ?> 
    <div id="sc-btns">
        <a href="#sc-one" class="sc-btn-1">1" Mesh</a>
        <a href="#sc-one-half" class="sc-btn-1">1/2" Mesh</a>
        <a href="#sc-three-eighths" class="sc-btn-1">3/8" Mesh</a>
        <a href="#sc-easyspread" class="sc-btn-1">Easy Spread</a>
    </div>
    <?php 
    return ob_get_clean();
}
add_shortcode('categories', 'category_buttons');
?>