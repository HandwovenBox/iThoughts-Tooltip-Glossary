<?php
/**
 * This file is processed then sent via AJAX when adding/editing a tooltip
 *
 * @file Template file for TinyMCE "Insert a tooltip" editor
 *
 * @author Gerkin
 * @copyright 2016 GerkinDevelopment
 * @license https://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @package ithoughts-tooltip-glossary
 *
 * @version 2.5.0
 */

use \ithoughts\tooltip_glossary\Backbone as Backbone;

if ( ! defined( 'ABSPATH' ) ) {
	status_header( 403 );
	wp_die( 'Forbidden' );// Exit if accessed directly.
}

?>
<div id="ithoughts_tt_gl-tooltip-form-container">
	<div id="pseudohead">
		<link rel="stylesheet" id="ithoughts_tt_gl-tinymce_form-css" href="<?php echo esc_url( Backbone::get_instance()->get_resource( 'ithoughts_tooltip_glossary-tinymce_form-css' )->get_file_url() ); ?>" type="text/css" media="all">
		<script type="text/javascript" src="<?php echo esc_url( Backbone::get_instance()->get_resource( 'ithoughts-simple-ajax-v5' )->get_file_url() ); ?>" defer></script>
		<script type="text/javascript" src="<?php echo esc_url( Backbone::get_instance()->get_resource( 'ithoughts_tooltip_glossary-tinymce_form' )->get_file_url() ); ?>?v=3.0.1" defer></script>
		<script type="text/javascript" src="<?php echo esc_url( Backbone::get_instance()->get_resource( 'ithoughts_tooltip_glossary-qtip' )->get_file_url() ); ?>" defer></script>
		<script>
			iThoughtsTooltipGlossaryEditor.terms = <?php echo wp_json_encode( $terms ); ?>;
		</script>
	</div>
	<div aria-label="<?php esc_html_e( 'Insert a Tooltip', 'ithoughts-tooltip-glossary' ); ?>" role="dialog" style="border-width: 1px; z-index: 100101;" class="itg-panel itg-floatpanel itg-window itg-in" hidefocus="1" id="ithoughts_tt_gl-tooltip-form">
		<div class="itg-reset" role="application">
			<div class="itg-window-head">
				<div class="itg-title">
					<?php esc_html_e( 'Insert a Tooltip', 'ithoughts-tooltip-glossary' ); ?>
				</div>
				<button aria-hidden="true" class="itg-close ithoughts_tt_gl-tinymce-discard" type="button">×</button>
			</div>


			<div class="itg-window-body">
				<div class="itg-form itg-first itg-last">
					<div class="" style="height: 100%;">







						<form>
							<?php wp_nonce_field( 'ithoughts_tt_gl-get_terms_list' ) ?>
							<div style="padding:10px;flex:0 0 auto;">
								<table>
									<tr>
										<td>
											<label for="itghouts_tt_gl_text">
												<?php esc_html_e( 'Text', 'ithoughts-tooltip-glossary' ); ?>
											</label>
										</td>
										<td>
											<input type="text" autocomplete="off" id="ithoughts_tt_gl_text" name="ithoughts_tt_gl_text" value="<?php echo esc_attr( $data['text'] ); ?>">
										</td>
									</tr>
									<tr>
										<td>
											<label for="itghouts_tt_gl_link">
												<?php esc_html_e( 'Link', 'ithoughts-tooltip-glossary' ); ?>
											</label>
										</td>
										<td>
											<input type="text" autocomplete="off" id="ithoughts_tt_gl_link" name="ithoughts_tt_gl_link" <?php
											if ( in_array( $data['type'], array( 'tooltip', 'mediatip' ), true ) ) { ?> value="<?php echo esc_attr( $data['link'] ); ?>"<?php } ?>>
										</td>
									</tr>
								</table>
							</div>

							<div class="tab-container">
								<ul class="tabs" role="tablist">
									<li class="<?php echo ('glossary' === $data['type']) ? 'active' : ''; ?>" role="tab" tabindex="-1">
										<?php esc_html_e( 'Glossary term', 'ithoughts-tooltip-glossary' ); ?>
									</li>

									<li class="<?php echo ('tooltip' === $data['type']) ? 'active' : ''; ?>" role="tab" tabindex="-1">
										<?php esc_html_e( 'Tooltip', 'ithoughts-tooltip-glossary' ); ?>
									</li>


									<li class="<?php echo ('mediatip' === $data['type']) ? 'active' : ''; ?>" role="tab" tabindex="-1">
										<?php esc_html_e( 'Mediatip', 'ithoughts-tooltip-glossary' ); ?>
									</li>
									<li class="topLiner"></li>
								</ul>



								<div class="tab">
									<table>
										<?php
										if ( function_exists( 'icl_object_id' ) ) {
										?>
										<tr>
											<td colspan="2">
												<b><?php esc_html_e( 'Note:', 'ithoughts-tooltip-glossary' ); ?></b><br/>
												<?php esc_html_e( 'During search, terms appearing with a <span class="foreign-language">yellow background</span> are not available in current language.', 'ithoughts-tooltip-glossary' ); ?>
											</td>
										</tr>
										<?php
										}
										?>
										<tr>
											<td>
												<label for="glossary_term">
													<?php esc_html_e( 'Term', 'ithoughts-tooltip-glossary' ); ?>
												</label>
											</td>
											<td>
												<input autocomplete="off" type="text" id="glossary_term" name="glossary_term" value="<?php echo esc_attr( (isset( $data['term_title'] )) ? $data['term_title'] : $data['term_search'] ); ?>" class="completed"/>
												<div class="glossary_term_completer_container" class="hidden">
													<div id="glossary_term_completer" class="completer">
													</div>
												</div>
												<input type="hidden" name="glossary_term_id" value="<?php echo esc_attr( $data['glossary_id'] ); ?>">
											</td>
										</tr>
										<?php
										if ( function_exists( 'icl_object_id' ) ) {
										?>
										<tr>
											<td>
												<label for="glossary_disable_auto_translation">
													<?php esc_html_e( 'Disable<br/>auto-translation', 'ithoughts-tooltip-glossary' ); ?>
												</label>
											</td>
											<td>
												<input type="checkbox" id="glossary_disable_auto_translation" name="glossary_disable_auto_translation" value="true" <?php echo ((isset( $data['glossary_disable_auto_translation'] ) && $data['glossary_disable_auto_translation']) ? ' checked' : ''); ?>/>
											</td>
										</tr>
										<?php
										}
										?>
									</table>
								</div>



								<div class="tab">
									<table>
										<tr>
											<td colspan="2">
												<label for="ithoughts_tt_gl-tooltip-content">
													<?php esc_html_e( 'Content', 'ithoughts-tooltip-glossary' ); ?>
												</label>
												<div style="margin:0 -11px;">
													<textarea class="tinymce" id="ithoughts_tt_gl-tooltip-content"><?php echo esc_html( $data['tooltip_content'] ); ?></textarea>
												</div>
											</td>
										</tr>
									</table>
								</div>



								<div class="tab">
									<table>
										<tr>
											<td>
												<label for="mediatip_type">
													<?php esc_html_e( 'Mediatip type', 'ithoughts-tooltip-glossary' ); ?>
												</label>
											</td>
											<td>
												<?php
												echo wp_kses($inputs['mediatip_type'], array(
													'select' => array(
														'name' => true,
														'id' => true,
														'autocomplete' => true,
													),
													'option' => array(
														'title' => true,
														'value' => true,
														'selected' => true,
														'disabled' => true,
													),
												)); ?>
											</td>
										</tr>
										<tr data-mediatip_type="mediatip-localimage-type">
											<td colspan="2">
												<div class="image-box" id="image-box">
													<?php
													if ( isset( $data['mediatip_content']['url'] ) && $data['mediatip_content']['url'] ) :
													?>
													<img src="<?php echo esc_attr( esc_url( $data['mediatip_content']['url'] ) ); ?>"/>
													<?php
													endif;
													?>
												</div>
												<input id="image-box-data" type="hidden" value="<?php echo esc_attr( $data['mediatip_content_json'] ); ?>">
												<div class="itg-widget itg-btn itg-last itg-btn-has-text" role="button" style="width: 100%; height: 30px;" tabindex="-1">
													<button role="presentation" style="height: 100%; width: 100%;" tabindex="-1" type="button" id="ithoughts_tt_gl_select_image">
														<?php esc_html_e( 'Select an image', 'ithoughts-tooltip-glossary' ); ?>
													</button>
												</div>
											</td>
										</tr>
										<tr data-mediatip_type="mediatip-webimage-type">
											<td>
												<label for="mediatip_url_image">
													<?php esc_html_e( 'Image url', 'ithoughts-tooltip-glossary' ); ?>
												</label>
											</td>
											<td>
												<input autocomplete="off" type="url" name="mediatip_url_image" id="mediatip_url_image" value="<?php echo esc_attr( ('webimage' === $data['mediatip_type']) ? $data['mediatip_content_json'] : '' ); ?>"/>
											</td>
										</tr>
										<tr data-mediatip_type="mediatip-webimage-type mediatip-localimage-type">
											<td>
												<label for="mediatip_caption">
													<?php esc_html_e( 'Caption', 'ithoughts-tooltip-glossary' ); ?>
												</label>
											</td>
											<td>
												<textarea autocomplete="off" name="mediatip_caption" id="mediatip_caption" style="width:100%;border:1px solid #ccc;"><?php echo esc_html( (in_array( $data['mediatip_type'], array( 'webimage', 'localimage' ), true )) ? $data['mediatip_caption'] : '' ) ?></textarea>
											</td>
										</tr>
										<tr data-mediatip_type="mediatip-webvideo-type">
											<td>
												<label for="mediatip_url_video">
													<?php esc_html_e( 'Video integration code', 'ithoughts-tooltip-glossary' ); ?>
												</label>
											</td>
											<td>
												<input autocomplete="off" type="text" name="mediatip_url_video_link" id="mediatip_url_video_link" value="<?php echo esc_attr( ('webvideo' === $data['mediatip_type']) ? $data['mediatip_link'] : '' ); ?>"/>
												<input autocomplete="off" type="hidden" name="mediatip_url_video_embed" id="mediatip_url_video_embed" value="<?php echo esc_attr( ('webvideo' === $data['mediatip_type']) ? $data['mediatip_content'] : '' ); ?>"/>
												<input autocomplete="off" type="hidden" name="mediatip_url_video_link" id="mediatip_url_video_link" value="<?php echo esc_attr( ('webvideo' === $data['mediatip_type']) ? $data['mediatip_link'] : '' ); ?>"/>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</form>






					</div>
				</div>
			</div>


			<div class="itg-panel itg-foot" tabindex="-1" role="group">
				<div class="">
					<div class="itg-btn itg-first itg-btn-has-text" role="button" tabindex="-1" style="float:left;">
						<button role="presentation" style="height: 100%; width: 100%;" tabindex="-1" type="button" id="ithoughts_tt_gl-tinymce-advanced_options">
							<?php esc_html_e( 'Advanced attributes', 'ithoughts-tooltip-glossary' ); ?>
						</button>
					</div>


					<div class="itg-btn itg-primary itg-btn-has-text" role="button" tabindex="-1">
						<button role="presentation" style="height: 100%; width: 100%;" tabindex="-1" type="button" id="ithoughts_tt_gl-tinymce-validate">
							<?php esc_html_e( 'Ok', 'ithoughts-tooltip-glossary' ); ?>
						</button>
					</div>


					<div class="itg-btn itg-last itg-btn-has-text" role="button" tabindex="-1">
						<button role="presentation" style="height: 100%; width: 100%;" tabindex="-1" type="button" class="ithoughts_tt_gl-tinymce-discard">
							<?php esc_html_e( 'Discard', 'ithoughts-tooltip-glossary' ); ?>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div aria-label="<?php esc_html_e( 'Tooltip options', 'ithoughts-tooltip-glossary' ); ?>" role="dialog" style="border-width: 1px; z-index: 9999999; display:none" class="itg-panel itg-floatpanel itg-window itg-in" hidefocus="1" id="ithoughts_tt_gl-tooltip-form-options">
		<div class="itg-reset" role="application">
			<div class="itg-window-head">
				<div class="itg-title">
					<?php esc_html_e( 'Tooltip options', 'ithoughts-tooltip-glossary' ); ?>
				</div>
				<button aria-hidden="true" class="itg-close ithoughts_tt_gl-tinymce-discard" type="button">×</button>
			</div>
			<div class="itg-window-body">
				<div class="itg-form itg-first itg-last">
					<div class="" style="height: 100%;">
						<form>
							<div style="flex:0 0 auto;">
								<div class="tab-container">
									<ul class="tabs" role="tablist">
										<li role="tab" tabindex="-1" class="active">
											<?php esc_html_e( 'Customize', 'ithoughts-tooltip-glossary' ); ?>
										</li>


										<li role="tab" tabindex="-1">
											<?php esc_html_e( 'Attributes', 'ithoughts-tooltip-glossary' ); ?>
										</li>
										<li class="topLiner"></li>
									</ul>

									<div class="tab active">
										<table>
											<tr>
												<td>
													<label for="qtip-content">
														<?php esc_html_e( 'Tooltip content', 'ithoughts-tooltip-glossary' ); ?>
													</label>
												</td>
												<td>
													<?php
													echo wp_kses($inputs['qtip-content'], array(
														'select' => array(
															'name' => true,
															'id' => true,
															'autocomplete' => true,
														),
														'option' => array(
															'title' => true,
															'value' => true,
															'selected' => true,
															'disabled' => true,
														),
													)); ?>
												</td>
											</tr>
											<tr>
												<td>
													<label for="qtip-keep-open">
														<?php
														$tooltip = apply_filters( 'ithoughts_tt_gl_tooltip', esc_html__( 'Delay tooltip hide', 'ithoughts-tooltip-glossary' ), esc_html__( 'Add a timer of 500ms before hiding the tooltip. This allow the user to click into the tip. This option is enabled by default for video mediatips.', 'ithoughts-tooltip-glossary' ) );
														echo wp_kses(
															$tooltip,
															array(
																'span' => array(
																	'tooltip-nosolo' => true,
																	'class' => true,
																	'data-tooltip-content' => true,
																),
																'a' => array(
																	'href' => true,
																),
															)
														); ?>
													</label>
												</td>
												<td>
													<?php
													echo wp_kses($inputs['qtip-keep-open'], array(
														'input' => array(
															'id' => true,
															'name' => true,
															'type' => true,
															'value' => true,
															'autocomplete' => true,
															'checked' => true,
														),
													)); ?>
												</td>
											</tr>
											<tr>
												<td>
													<label for="qtiptrigger">
														<?php esc_html_e( 'Tooltip trigger', 'ithoughts-tooltip-glossary' ); ?>
													</label>
												</td>
												<td>
													<?php
													echo wp_kses($inputs['qtiptrigger'], array(
														'select' => array(
															'name' => true,
															'id' => true,
															'autocomplete' => true,
														),
														'option' => array(
															'title' => true,
															'value' => true,
															'selected' => true,
															'disabled' => true,
														),
													));
													echo wp_kses( $inputs['qtiptriggerText'], array(
														'input' => array(
															'id' => true,
															'name' => true,
															'type' => true,
															'value' => true,
															'autocomplete' => true,
														),
													) ); ?>
												</td>
											</tr>
											<tr>
												<td>
													<label for="qtipstyle">
														<?php esc_html_e( 'Tooltip style', 'ithoughts-tooltip-glossary' ); ?>
													</label>
												</td>
												<td>
													<?php
													echo wp_kses($inputs['qtipstyle'], array(
														'select' => array(
															'name' => true,
															'id' => true,
															'autocomplete' => true,
														),
														'option' => array(
															'title' => true,
															'value' => true,
															'selected' => true,
															'disabled' => true,
														),
													)); ?>
												</td>
											</tr>
											<tr>
												<td>
													<label for="qtipshadow">
														<?php esc_html_e( 'Tooltip shadow', 'ithoughts-tooltip-glossary' ); ?>
													</label>
												</td>
												<td>
													<?php
													echo wp_kses($inputs['qtipshadow'], array(
														'input' => array(
															'id' => true,
															'name' => true,
															'type' => true,
															'value' => true,
															'autocomplete' => true,
															'checked' => true,
															'data-state' => true,
															'class' => true,
														),
													)); ?>
												</td>
											</tr>
											<tr>
												<td>
													<label for="qtiprounded">
														<?php esc_html_e( 'Rounded corners', 'ithoughts-tooltip-glossary' ); ?>
													</label>
												</td>
												<td>
													<?php
													echo wp_kses($inputs['qtiprounded'], array(
														'input' => array(
															'id' => true,
															'name' => true,
															'type' => true,
															'value' => true,
															'autocomplete' => true,
															'checked' => true,
															'data-state' => true,
															'class' => true,
														),
													)); ?>
												</td>
											</tr>
											<tr>
												<td>
													<label for="position_my">
														<?php
														$tooltip = apply_filters( 'ithoughts_tt_gl_tooltip', esc_html__( 'Position of the tip', 'ithoughts-tooltip-glossary' ), esc_html__( 'Position of the sharp tip around the tooltip. By default, the main axis is vertical', 'ithoughts-tooltip-glossary' ) );
														echo wp_kses(
															$tooltip,
															array(
																'span' => array(
																	'tooltip-nosolo' => true,
																	'class' => true,
																	'data-tooltip-content' => true,
																),
																'a' => array(
																	'href' => true,
																),
															)
														); ?>
													</label>
												</td>
												<td>
													<?php
													echo '<div style="display:inline;">' . wp_kses($inputs['position']['my'][1], array(
														'select' => array(
															'name' => true,
															'id' => true,
															'autocomplete' => true,
														),
														'option' => array(
															'title' => true,
															'value' => true,
															'selected' => true,
															'disabled' => true,
														),
													)) . '</div>';
													echo '<div style="display:inline;">' . wp_kses($inputs['position']['my'][2], array(
														'select' => array(
															'name' => true,
															'id' => true,
															'autocomplete' => true,
														),
														'option' => array(
															'title' => true,
															'value' => true,
															'selected' => true,
															'disabled' => true,
														),
													)) . '</div>';
													?>
													<label for="position_my_invert"><?php
														echo wp_kses($inputs['position']['my']['invert'], array(
															'input' => array(
																'id' => true,
																'name' => true,
																'type' => true,
																'value' => true,
																'autocomplete' => true,
																'checked' => true,
															),
														));
														esc_html_e( 'Invert main axis', 'ithoughts-tooltip-glossary' ); ?></label>
												</td>
											</tr>
											<tr>
												<td>
													<label for="position_at">
														<?php
														$tooltip = apply_filters( 'ithoughts_tt_gl_tooltip', esc_html__( 'Position of the tooltip', 'ithoughts-tooltip-glossary' ), esc_html__( 'Position of the tooltip around the target area', 'ithoughts-tooltip-glossary' ) );
														echo wp_kses(
															$tooltip,
															array(
																'span' => array(
																	'tooltip-nosolo' => true,
																	'class' => true,
																	'data-tooltip-content' => true,
																),
																'a' => array(
																	'href' => true,
																),
															)
														); ?>
													</label>
												</td>
												<td>
													<?php
													echo '<div style="display:inline;">' . wp_kses($inputs['position']['at'][1], array(
														'select' => array(
															'name' => true,
															'id' => true,
															'autocomplete' => true,
														),
														'option' => array(
															'title' => true,
															'value' => true,
															'selected' => true,
															'disabled' => true,
														),
													)) . '</div>';
													echo '<div style="display:inline;">' . wp_kses($inputs['position']['at'][2], array(
														'select' => array(
															'name' => true,
															'id' => true,
															'autocomplete' => true,
														),
														'option' => array(
															'title' => true,
															'value' => true,
															'selected' => true,
															'disabled' => true,
														),
													)) . '</div>';
													?>
												</td>
											</tr>
											<tr>
												<td>
													<label for="in_out">
														<?php esc_html_e( 'Animations', 'ithoughts-tooltip-glossary' ); ?>
													</label>
												</td>
												<td>
													<label for="anim[in]"><?php esc_html_e( 'In', 'ithoughts-tooltip-glossary' ); ?>:&nbsp;<?php
														echo wp_kses($inputs['anim']['in'], array(
															'select' => array(
																'name' => true,
																'id' => true,
																'autocomplete' => true,
															),
															'option' => array(
																'title' => true,
																'value' => true,
																'selected' => true,
																'disabled' => true,
															),
														)); ?></label>&nbsp;&nbsp;
													<label for="anim[out]"><?php esc_html_e( 'Out', 'ithoughts-tooltip-glossary' ); ?>:&nbsp;<?php
														echo wp_kses($inputs['anim']['out'], array(
															'select' => array(
																'name' => true,
																'id' => true,
																'autocomplete' => true,
															),
															'option' => array(
																'title' => true,
																'value' => true,
																'selected' => true,
																'disabled' => true,
															),
														)); ?></label>&nbsp;&nbsp;
													<label for="anim[time]"><?php esc_html_e( 'Duration', 'ithoughts-tooltip-glossary' ); ?>:&nbsp;<?php
														echo wp_kses($inputs['anim']['time'], array(
															'input' => array(
																'id' => true,
																'name' => true,
																'type' => true,
																'value' => true,
																'autocomplete' => true,
																'style' => true,
																'placeholder' => true,
															),
														)); ?>ms</label>
												</td>
											</tr>
											<tr>
												<td>
													<label for="maxwidth">
														<?php
														$tooltip = apply_filters( 'ithoughts_tt_gl_tooltip', esc_html__( 'Max width', 'ithoughts-tooltip-glossary' ), esc_html__( 'Maximum width of the tooltip. The default value of this property is 280px. Be carefull about this option: a too high value may overflow outside small devices.', 'ithoughts-tooltip-glossary' ) );
														echo wp_kses(
															$tooltip,
															array(
																'span' => array(
																	'tooltip-nosolo' => true,
																	'class' => true,
																	'data-tooltip-content' => true,
																),
																'a' => array(
																	'href' => true,
																),
															)
														); ?>
													</label>
												</td>
												<td>
													<?php
													echo wp_kses($inputs['maxwidth'], array(
														'input' => array(
															'id' => true,
															'name' => true,
															'type' => true,
															'value' => true,
															'autocomplete' => true,
														),
													)); ?>
												</td>
											</tr>
										</table>
									</div>
									<div class="tab">
										<table>
											<tr>
												<td colspan="2">
													<datalist id="attributes-list">
														<?php
														foreach ( $attrs as $attr ) {
														?><option value="<?php
															echo esc_attr( $attr );
															?>"/><?php
														}
														?>
													</datalist>
													<div class="ithoughts_tt_gl-attrs-table">
														<h3 style="text-align: center;">
															<b>
																<?php esc_html_e( 'Attributes', 'ithoughts-tooltip-glossary' ); ?>
															</b>
														</h3>
														<div>
															<h4 style="text-align: center;">
																<b>
																	<?php esc_html_e( 'Span attribute', 'ithoughts-tooltip-glossary' ); ?>
																</b>
															</h4>
															<hr/>
															<div>
																<div>
																	<div class="ithoughts-attrs-container" data-attr-family="span">
																		<?php
																		$i = 0;
																		foreach ( $opts['attributes']['span'] as $key => $value ) {
																		?>
																		<div class="attribute-name-val <?php echo ((0 === $i) ? 'ithoughts-prototype' : ''); ?>">
																			<div class="kv-pair">
																				<label for="attributes-span-key-<?php echo absint( $i ); ?>"class="dynamicId dynamicId-key">
																					<?php esc_html_e( 'Key', 'ithoughts-tooltip-glossary' ); ?>
																				</label>
																				<input type="text" <?php echo (0 === $i) ? 'disabled' : ''; ?> class="dynamicId dynamicId-key" value="<?php echo esc_attr( $key ); ?>" autocomplete="off" list="attributes-list" name="attributes-span-key[]" id="attributes-span-key-<?php echo absint( $i ); ?>" />
																			</div>
																			<div class="kv-pair">
																				<label for="attributes-span-value-<?php echo absint( $i ); ?>"class="dynamicId dynamicId-value">
																					<?php esc_html_e( 'Value', 'ithoughts-tooltip-glossary' ); ?>
																				</label>
																				<input type="text" <?php echo (0 === $i) ? 'disabled' : ''; ?> class="dynamicId dynamicId-value" value="<?php echo esc_attr( $value ); ?>" autocomplete="off" name="attributes-span-value[]" id="attributes-span-value-<?php echo absint( $i ); ?>" />
																			</div>
																		</div>
																		<?php
																			$i++;
																		} ?>
																	</div>
																	<div style="clear:both;"></div>
																	<button type="button" class="kv-pair-span-attrs-add" class="button button-primary button-large"><?php esc_html_e( 'Add', 'ithoughts-tooltip-glossary' ); ?></button>
																</div>
															</div>
														</div>
														<div>
															<h4 style="text-align: center;">
																<b>
																	<?php esc_html_e( 'Link attribute', 'ithoughts-tooltip-glossary' ); ?>
																</b>
															</h4>
															<hr/>
															<div>
																<div>
																	<div class="ithoughts-attrs-container" data-attr-family="link">
																		<?php
																		$i = 0;
																		foreach ( $opts['attributes']['link'] as $key => $value ) {
																		?>
																		<div class="attribute-name-val <?php echo (0 === $i) ? 'ithoughts-prototype' : ''; ?>">
																			<div class="kv-pair">
																				<label for="attributes-link-key-<?php echo absint( $i ); ?>" class="dynamicId dynamicId-key">
																					<?php esc_html_e( 'Key', 'ithoughts-tooltip-glossary' ); ?>
																				</label>
																				<input type="text" <?php echo (0 === $i) ? 'disabled' : ''; ?> class="dynamicId dynamicId-key" value="<?php echo esc_attr( $key ); ?>" autocomplete="off" list="attributes-list" name="attributes-link-key[]" id="attributes-link-key-<?php echo absint( $i ); ?>" />
																			</div>
																			<div class="kv-pair">
																				<label for="attributes-link-value-<?php echo absint( $i ); ?>" class="dynamicId dynamicId-value">
																					<?php esc_html_e( 'Value', 'ithoughts-tooltip-glossary' ); ?>
																				</label>
																				<input type="text" <?php echo (0 === $i) ? 'disabled' : ''; ?> class="dynamicId dynamicId-value" value="<?php echo esc_attr( $value ); ?>" autocomplete="off" name="attributes-link-value[]" id="attributes-link-value-<?php echo absint( $i ); ?>" />
																			</div>
																		</div>
																		<?php
																			$i++;
																		} ?>
																	</div>
																	<div style="clear:both;"></div>
																	<button type="button" class="kv-pair-link-attrs-add" class="button button-primary button-large"><?php esc_html_e( 'Add', 'ithoughts-tooltip-glossary' ); ?></button>
																</div>
															</div>
														</div>
													</div>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="itg-panel itg-foot" tabindex="-1" role="group">
				<div class="">
					<div  class="itg-btn itg-primary itg-first itg-btn-has-text" role="button" tabindex="-1">
						<button role="presentation" style="height: 100%; width: 100%;" tabindex="-1" type="button" id="ithoughts_tt_gl-tinymce-validate-attrs">
							<?php esc_html_e( 'Ok', 'ithoughts-tooltip-glossary' ); ?>
						</button>
					</div>
					<div  class="itg-btn itg-last itg-btn-has-text" role="button" tabindex="-1">
						<button role="presentation" style="height: 100%; width: 100%;" tabindex="-1" type="button" id="ithoughts_tt_gl-tinymce-close-attrs">
							<?php esc_html_e( 'Close', 'ithoughts-tooltip-glossary' ); ?>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="z-index: 100100;" class="itg-modal-block" class="itg-reset itg-fade itg-in">
	</div>
</div>
