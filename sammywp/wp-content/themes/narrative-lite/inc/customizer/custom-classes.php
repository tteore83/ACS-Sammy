<?php
/**
 * Custom Customizer Classes.
 *
 * @package Narrative Lite
**/

if ( class_exists( 'WP_Customize_Control' ) ) {
    
    // Pro Info Class
    class Narrative_Lite_Premium_Notiece extends WP_Customize_Control {

        public $type = 'premiuminfonotice';
    
        public function render_content() {
           
            $name = '_customize-notice-' . $this->id; ?>
            
            <span class="customize-control-title">
                <div class="pro-info-icon">
                    <div class="-pro-notice-wrap">
                        <span class="dashicons dashicons-lightbulb"></span>
                        <span><?php echo esc_html( $this->label ); ?></span>
                    </div>
                </div>
            </span>
            
        <?php }
    }
    
}

if ( class_exists( 'WP_Customize_Control' ) ) {
    
    // Pro Info Class
    class Narrative_Lite_Range_Slider extends WP_Customize_Control {

        public $type = 'wedev-range-slider';
        public $min = 'min';
        public $max = 'max';

        public function render_content() {
           
            if ( isset( $this->default ) ) {
                $default = $this->default;
            } else {
                $default = $this->setting->default;
            }

            $name = '_customize-notice-' . $this->id; ?>
            
            <span class="customize-control-title">
                        
                <span><?php echo esc_html( $this->label ); ?></span>

                <div class="wedevs-range-slider-wrap">

                    <input id="<?php echo esc_attr( $this->id ); ?>" type="range" <?php esc_attr( $this->link() ); ?> class="wedev-range-slide" value="<?php echo esc_attr( $this->value() ); ?>" />
                    <div class="current-value-indicator"><?php echo absint( $this->value() ); ?></div>
                    <div class="range-set-default" min="<?php echo absint( $this->min ); ?>" max="<?php echo absint( $this->max ); ?>" default-val="<?php echo absint( $default ); ?>">
                        <span class="dashicons dashicons-image-rotate"></span>
                    </div>

                </div>

            </span>
            
        <?php }
    }
    
}

/**
 * Custom Customizer Classes.
 *
 * @package Narrative Lite
**/

if ( class_exists( 'WP_Customize_Control' ) ) {
    
    class Narrative_Lite_Plugin_Link extends WP_Customize_Control {

        public $type = 'plugin-link';
    
        public function render_content() {
           
            $name = '_customize-notice-' . $this->id; ?>
            
            <span class="customize-control-title">

                <?php
                $label = isset( $this->label ) ? $this->label : '';

                echo esc_html( $label.' %s');
                ?>

            </span>
            
        <?php }
    }
    
}


/**
 * Upsell customizer section.
 *
 * @since  1.0.0
 * @access public
 */
class Narrative_Lite_Customize_Section_Upsell extends WP_Customize_Section {

    /**
     * The type of customize section being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'upsell';

    /**
     * Custom button text to output.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_text = '';

    /**
     * Custom pro button URL.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_url = '';

    public $notice = '';
    public $nonotice = '';

    /**
     * Add custom parameters to pass to the JS via JSON.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function json() {
        $json = parent::json();

        $json['pro_text'] = $this->pro_text;
        $json['pro_url']  = esc_url( $this->pro_url );
        $json['notice']  = esc_attr( $this->notice );
        $json['nonotice']  = esc_attr( $this->nonotice );

        return $json;
    }

    /**
     * Outputs the Underscore.js template.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    protected function render_template() { ?>

        <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

                <# if ( data.notice ) { #>
                    <h3 class="accordion-section-notice">
                        {{ data.title }}
                    </h3>
                <# } #>

                <# if ( !data.notice ) { #>
                    <h3 class="accordion-section-title">
                        {{ data.title }}

                        <# if ( data.pro_text && data.pro_url ) { #>
                            <a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
                        <# } #>
                    </h3>
                <# } #>
            
        </li>
    <?php }
}


class Narrative_Lite_Social_Icon_Controler extends WP_Customize_Control {
    /**
     * The control type.
     *
     * @access public
     * @var string
    */
    public $type = 'social-icon';

    public $narrative_lite_box_label = '';

    public $narrative_lite_box_add_control = '';

    private $cats = '';

    /**
     * The fields that each container row will contain.
     *
     * @access public
     * @var array
     */
    public $fields = array();

    /**
     * Repeater drag and drop controler
     *
     * @since  1.0.0
     */
    public function __construct( $manager, $id, $args = array(), $fields = array() ) {

        $this->fields = $fields;
        $this->narrative_lite_box_label = $args['narrative_lite_box_label'] ;
        $this->narrative_lite_box_add_control = $args['narrative_lite_box_add_control'];
        $this->cats = get_categories(array( 'hide_empty' => false ));
        parent::__construct( $manager, $id, $args );

    }

    public function render_content() {

        $values = json_decode($this->value()); ?>

        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

        <?php if($this->description){ ?>
            <span class="description customize-control-description">
            <?php echo wp_kses_post($this->description); ?>
            </span>
        <?php } ?>

        <ul class="narrative-lite-repeater-field-control-wrap">
            <?php
            $this->narrative_lite_fields_switch();
            ?>
        </ul>

        <input type="hidden" <?php esc_attr( $this->link() ); ?> class="narrative-lite-repeater-collector" value="<?php echo esc_attr( $this->value() ); ?>" />
        <button type="button" class="button narrative-lite-add-control-field"><?php echo esc_html( $this->narrative_lite_box_add_control ); ?></button>
        <?php
    }

    private function ToObject($Array) { 
      
        // Create new stdClass object 
        $object = new stdClass(); 
          
        // Use loop to convert array into 
        // stdClass object 
        foreach ($Array as $key => $value) { 
            if (is_array($value)) { 
                $value = $this->ToObject($value); 
            } 
            $object->$key = $value; 
        } 
        return $object; 
    } 

    private function narrative_lite_fields_switch(){

        $fields = $this->fields;

        $values = json_decode( $this->value() );

        if( is_array( $values ) ){
            foreach($values as $value){ ?>

                <li class="wedevs-repeater-wrap">

                    <div class="title-rep-wrap">
                        <h3 class="wedevs-header-title"><?php echo esc_html( $this->narrative_lite_box_label ); ?></h3>
                        <span class="dropdown-indicator"><i class="fa fa-sort-desc" aria-hidden="true"></i></span>
                    </div>

                    <div class="narrative-lite-repeater-fields">
                    <?php
                        foreach ($fields as $key => $field) {
                            $class = isset($field['class']) ? $field['class'] : ''; ?>

                            <div class="narrative-lite-fields narrative-lite-type-<?php echo esc_attr($field['type']).' '. esc_attr($class); ?>">
                                <?php 
                                    $label = isset($field['label']) ? $field['label'] : '';
                                    $description = isset($field['description']) ? $field['description'] : '';
                                    if($field['type'] != 'checkbox'){ ?>
                                        <span class="customize-control-title"><?php echo esc_html( $label ); ?></span>
                                        <span class="description customize-control-description"><?php echo esc_html( $description ); ?></span>
                                    <?php 
                                    }

                                    $new_value = isset($value->$key) ? $value->$key : '';
                                    $default = isset($field['default']) ? $field['default'] : '';

                                    switch ($field['type']) {
                                        case 'text':
                                            echo '<input data-default="'.esc_attr($default).'" data-name="'.esc_attr($key).'" type="text" value="'.esc_attr($new_value).'"/>';
                                            break;

                                        case 'icons':

                                            $icons = narrative_lite_icons();
                                            ?>
                                            <div class="icon-main-wrap">
                                            <ul class="icons-lists">
                                                <?php foreach( $icons as $icon ){ ?>
                                                    <li><?php narrative_lite_get_theme_svg( $icon ); ?></li>
                                                <?php } ?>
                                            </ul>
                                            
                                            <span class="svg-preview"><?php echo narrative_lite_svg_escape($new_value); ?></span>
                                            <?php
                                            echo '<input style="display:none" class="icon-value" data-default="'.esc_attr($default).'" data-name="'.esc_attr($key).'" type="hidded" value="'.esc_attr($new_value).'"/>';

                                            echo '</div>';
                                            break;


                                        case 'link':
                                            echo '<input data-default="'.esc_attr($default).'" data-name="'.esc_attr($key).'" type="text" value="'.esc_url($new_value).'"/>';
                                            break;

                                        case 'checkbox':
                                            echo '<label>';
                                            echo '<input data-default="'.esc_attr($default).'" value="'. esc_html($new_value).'" data-name="'.esc_attr($key).'" type="checkbox" '.checked($new_value, 'yes', false).'/>';
                                            echo esc_html( $label );
                                            echo '<span class="description customize-control-description">'.esc_html( $description ).'</span>';
                                            echo '</label>';
                                            break;

                                        default:
                                            break;
                                    }
                                ?>
                            </div>
                            <?php
                        } ?>

                        <div class="clearfix narrative-lite-repeater-footer">
                            <div class="alignright">
                                <a class="narrative-lite-repeater-field-remove" href="#remove"><?php esc_html_e('Delete', 'narrative-lite') ?>|</a>
                                <a class="narrative-lite-repeater-field-close" href="#close"><?php esc_html_e('Close', 'narrative-lite') ?></a>
                            </div>
                        </div>

                    </div>
                </li>
                <?php   
            }
        }
    }

}


if( ! class_exists( 'Narrative_Lite_Sortable_Control' ) ):
    
    /**
     * Sortable control.
    **/
    
    class Narrative_Lite_Sortable_Control extends WP_Customize_Control{
    
        public $type = 'sortable';
        
        public $option_type = 'theme_mod';
        
        public function to_json() {
            parent::to_json();
    
            $this->json['default'] = $this->setting->default;
            if ( isset( $this->default ) ) {
                $this->json['default'] = $this->default;
            }
            
            $this->json['value']   = maybe_unserialize( $this->value() );
            $this->json['choices'] = $this->choices;
            $this->json['link']    = $this->get_link();
            $this->json['id']      = $this->id;
    
            if ( 'user_meta' === $this->option_type ) {
                $this->json['value'] = get_user_meta( get_current_user_id(), $this->id, true );
            }
    
            $this->json['inputAttrs'] = '';
            foreach ( $this->input_attrs as $attr => $value ) {
                $this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
            }
            $this->json['inputAttrs'] = maybe_serialize( $this->input_attrs() );
    
        }
    
        /**
         * An Underscore (JS) template for this control's content (but not its container).
         *
         * Class variables for this control class are available in the `data` JS object;
         * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
         *
         * @see WP_Customize_Control::print_template()
         *
         * @access protected
         */
        protected function content_template() {
            ?>
            <label class='sortable'>
                <span class="customize-control-title">
                    {{{ data.label }}}
                </span>
                <# if ( data.description ) { #>
                    <span class="description customize-control-description">{{{ data.description }}}</span>
                <# } #>
    
                <ul class="wedevs-sortable sortable">
                    <# _.each( data.value, function( choiceID ) { #>
                        <li {{{ data.inputAttrs }}} class='wedevs-sortable-item sortable-item' data-value='{{ choiceID }}'>
                            <i class='dashicons dashicons-menu'></i>
                            {{{ data.choices[ choiceID ] }}}
                        </li>
                    <# }); #>
                    <# _.each( data.choices, function( choiceLabel, choiceID ) { #>
                        <# if ( -1 === data.value.indexOf( choiceID ) ) { #>
                            <li {{{ data.inputAttrs }}} class='wedevs-sortable-item sortable-item invisible' data-value='{{ choiceID }}'>
                                <i class='dashicons dashicons-menu'></i>
                                {{{ data.choices[ choiceID ] }}}
                            </li>
                        <# } #>
                    <# }); #>
                </ul>
            </label>
    
            <?php
        }

    }

endif;


if ( class_exists( 'WP_Customize_Control' ) ) {
    
    // Repeator Info
    class Narrative_Lite_Premium_Notiece_Control extends WP_Customize_Control {

        public $type = 'narrative_lite_notice';
    
        public function render_content() {
           
            $name = '_customize-notice-' . $this->id; ?>
            
            <span class="customize-control-title">
                <div class="theme-info-icon">
                    <div class="icon-notice-wrap">
                        <span class="dashicons dashicons-lightbulb wedev-filter-icon"></span>
                        <span><?php echo esc_html__('More ','narrative-lite'). esc_html( $this->label ). esc_html__(' Available on Premium Version.', 'narrative-lite' ); ?></span>
                    </div>
                </div>
            </span>
            
        <?php }
    }
    
}
