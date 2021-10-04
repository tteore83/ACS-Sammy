<?php
function narrative_lite_featured_cat_ac_4( $control ){

    $enable_header_featured_category_column = $control->manager->get_setting( 'enable_header_featured_category_column' )->value();
    if( $enable_header_featured_category_column == 4 ){

        return true;
        
    }
    
    return false;
}

function narrative_lite_featured_cat_ac_3( $control ){

    $enable_header_featured_category_column = $control->manager->get_setting( 'enable_header_featured_category_column' )->value();
    if( $enable_header_featured_category_column == 4 || $enable_header_featured_category_column == 3 ){

        return true;
        
    }
    
    return false;
}