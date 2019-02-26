<?php
/**
 * Theme customizer controls
 *
 * @package Profile Lite
 * @since Profile Lite 1.0
 */

/** Category Dropdown Control */
class Profile_Lite_Category_Dropdown_Control extends WP_Customize_Control {

	/**
	 * Define dropdown categories.
	 *
	 * @var type
	 */
	public $type = 'dropdown-categories';

	/**
	 * Dropdown category arguments.
	 */
	public function render_content() {
		$dropdown = wp_dropdown_categories(
			array(
				'name'              => '_customize-dropdown-categories-' . $this->id,
				'echo'              => 0,
				'show_option_none'  => esc_html__( '&mdash; Select &mdash;', 'profile-lite' ),
				'option_none_value' => '0',
				'selected'          => $this->value(),
			)
		);

		// Hackily add in the data link parameter.
		$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

		printf( '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
			esc_attr( $this->label ),
			esc_attr( $dropdown )
		);
	}
}

/** Multiple Category Select Control */
class Profile_Lite_Multiple_Select_Control extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @var $type multiple-select.
	 */
	public $type = 'multiple-select';

	/**
	 * Displays the multiple select on the customize screen.
	 */
	public function render_content() {

		if ( empty( $this->choices ) ) {
			return;
		}
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
				<?php
				foreach ( $this->choices as $value => $label ) {
					$selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
					echo '<option value="' . esc_attr( $value ) . '"' . esc_attr( $selected ) . '>' . esc_html( $label ) . '</option>';
				}
				?>
			</select>
		</label>
		<?php
	}
}
