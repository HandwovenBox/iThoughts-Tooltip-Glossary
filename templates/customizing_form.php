<form id="customizing-form">
	<table class="form-table stripped0">
		<thead>
			<tr>
				<th>
					<label for="theme_name"><?php _e('Theme name', 'ithoughts-tooltip-glossary' ); ?></label>
				</th>
				<td colspan="3">
					<input type="text" autocomplete="off" name="theme_name" id="theme_name" required minlength="3" pattern="^[a-zA-Z0-9][a-zA-Z0-9\-\_]+[a-zA-Z0-9]" data-pattern-infos="<?php _e('At least 3 letters (lowercase and uppercase), numbers, _ or -, and not starting or ending with symbol', 'ithoughts-tooltip-glossary' ); ?>">
				</td>
			</tr>
			<tr>
				<td></td>
				<th><?php _e('Global', 'ithoughts-tooltip-glossary' ); ?></th>
				<th><?php _e('Title Bar', 'ithoughts-tooltip-glossary' ); ?></th>
				<th><?php _e('Content', 'ithoughts-tooltip-glossary' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th><?php _e('Background', 'ithoughts-tooltip-glossary' ); ?></th>
				<?php
foreach($prefixs as $prefix){
				?>
				<td>
					<!--<label for="<?php echo $prefix; ?>_bt" class="block"><?php _e('Type', 'ithoughts-tooltip-glossary' ); ?>&nbsp;
						<select name="<?php echo $prefix; ?>_bt" value="plain" id="<?php echo $prefix; ?>_bt" class="modeswitcher">
							<option value="plain"><?php _ex('Plain', 'A plain color', 'ithoughts-tooltip-glossary' ); ?></option>
							<option value="gradient"><?php _e('Gradient', 'ithoughts-tooltip-glossary' ); ?></option>
						</select>
					</label>-->
					<div data-switcher-mode="plain">
						<input autocomplete="off" type="text" value="<?php echo $prefix === "g" ? "#fff" : "rgba(255,255,255,0)"; ?>" class="color-field" data-alpha="true" name="<?php echo $prefix; ?>_plain"/>
					</div>

					<!--<div data-switcher-mode="gradient">
						<select name="<?php echo $prefix; ?>_grad_dir" value="t_b" id="<?php echo $prefix; ?>_grad_dir">
							<option value="t_b"><?php _e('Top to bottom', 'ithoughts-tooltip-glossary' ); ?></option>
							<option value="b_t"><?php _e('Bottom to top', 'ithoughts-tooltip-glossary' ); ?></option>
							<option value="l_r"><?php _e('Left to right', 'ithoughts-tooltip-glossary' ); ?></option>
							<option value="r_l"><?php _e('Right to left', 'ithoughts-tooltip-glossary' ); ?></option>
						</select>
						<input type="text" name="<?php echo $prefix; ?>_grad" style="width:100%;" placeholder="rgba(255,255,255,1) 0%, rgba(0,0,0,1) 100%"/>
					</div>-->
				</td>
				<?php
}
				?>
			</tr>
			<tr>
				<th><?php _e('Padding', 'ithoughts-tooltip-glossary' ); ?></th>
				<?php
foreach($prefixs as $prefix){
				?>
				<td><input autocomplete="off" type="text" value="0" name="<?php echo $prefix; ?>_pd" pattern="^(0|(\d*(\.\d+)?(r?em|px|%|ex|pt|(c|m)m|in|pc|v(h|w|min|max)0|) ?){1,4}|initial|inherit)$" data-pattern-infos="<?php _e('Valid padding value: 0, inherit, initial, or 1 to 4 values in rem, em, px, %, ex, pt, cm, mm, in, pc, vh, vw, vmin, or vmax', 'ithoughts-tooltip-glossary' ); ?>"/></td>
				<?php
}
				?>
			</tr>
			<tr>
				<th><?php _e('Shadow', 'ithoughts-tooltip-glossary' ); ?></th>
				<td colspan="3">
					<table style="margin:0px auto;width:100%">
						<tr>
							<td style="padding:0;" rowspan="2">
								<label for="sh-e">
									<?php _e('Enable box-shadow', 'ithoughts-tooltip-glossary' ); ?>:&nbsp;
									<input type="checkbox" value="enabled" checked id="sh-e" name="sh-e" data-child-form-controled="shadow"/>
								</label>
							</td>
							<td style="padding:0;">
								<label for="sh-w">
									<?php _e("Width", 'ithoughts-tooltip-glossary' ); ?>:&nbsp;
									<input autocomplete="off" type="text" value="0" class="input-width" name="sh-w" id="sh-w" pattern="^-?(0|\d+(r?em|px|%|ex|pt|(c|m)m|in|pc|v(h|w|min|max)))$" data-pattern-infos="<?php _e('Valid distance value: 0, inherit, initial, or a value in rem, em, px, %, ex, pt, cm, mm, in, pc, vh, vw, vmin, or vmax. Negatives accepted', 'ithoughts-tooltip-glossary' ); ?>" data-child-form="shadow-true"/>
								</label>
							</td>
							<td style="padding:0;">
							</td>
							<td style="padding:0;" rowspan="2">
								<label for="sh-s">
									<?php _e('Shadow spread', 'ithoughts-tooltip-glossary' ); ?><br />
									<input autocomplete="off" value="0" type="text" class="input-width" id="sh-s" name="sh-s" pattern="^(0|\d+(r?em|px|%|ex|pt|(c|m)m|in|pc|v(h|w|min|max)))$" data-pattern-infos="<?php _e('Valid distance value: 0, inherit, initial, or a value in rem, em, px, %, ex, pt, cm, mm, in, pc, vh, vw, vmin, or vmax. Negatives not accepted', 'ithoughts-tooltip-glossary' ); ?>" data-child-form="shadow-true" />
								</label><br/>
								<label for="sh_c">
									<?php _e('Shadow color', 'ithoughts-tooltip-glossary' ); ?><br />
									<input autocomplete="off" type="text" id="sh-c" value="#000" class="color-field" data-alpha="true" name="sh-c" data-child-form="shadow-true"/>
								</label><br/>
								<label for="sh-i">
									<?php _e("Inset", 'ithoughts-tooltip-glossary' ); ?>:&nbsp;
									<input type="checkbox" value="inset" id="sh-i" name="sh-i"/>
								</label>
							</td>
						</tr>
						<tr>
							<td style="padding:0;">
								<div style="border:1px solid #ddd;width:230px;height: 125px;position:relative;">
									<div style="border:1px solid #ddd;width:130px;height:25px;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);">
									</div>
								</div>
							</td>
							<td style="padding:0;">
								<label for="sh-h">
									<?php _e("Height", 'ithoughts-tooltip-glossary' ); ?><br/>
									<input autocomplete="off" type="text" class="input-width" name="sh-h" id="sh-h" value="0" pattern="^-?(0|\d+(r?em|px|%|ex|pt|(c|m)m|in|pc|v(h|w|min|max)))$" data-pattern-infos="<?php _e('Valid distance value: 0, inherit, initial, or a value in rem, em, px, %, ex, pt, cm, mm, in, pc, vh, vw, vmin, or vmax. Negatives accepted', 'ithoughts-tooltip-glossary' ); ?>" data-child-form="shadow-true" />
								</label>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<th><?php _e('Outline border', 'ithoughts-tooltip-glossary' ); ?></th>
				<td>
					<label for="border-w">
						<?php _e("Border width", 'ithoughts-tooltip-glossary' ); ?>:&nbsp;
						<input autocomplete="off" type="text" class="input-width" name="border-w" id="border-w" value="1px" pattern="^(0|\d+(r?em|px|%|ex|pt|(c|m)m|in|pc|v(h|w|min|max)))$" data-pattern-infos="<?php _e('Valid border-width value: 0, inherit, initial, or a value in rem, em, px, %, ex, pt, cm, mm, in, pc, vh, vw, vmin, or vmax. Negatives not accepted', 'ithoughts-tooltip-glossary' ); ?>"/>
					</label>
				</td>
				<td>
					<label for="border-s">
						<?php _e("Border style", 'ithoughts-tooltip-glossary' ); ?>:&nbsp;
						<select name="border-s" id="border-s" value="solid">
							<option value="solid"><?php _e("Solid", 'ithoughts-tooltip-glossary' ); ?></option>
							<option value="dotted"><?php _e("Dotted", 'ithoughts-tooltip-glossary' ); ?></option>
							<option value="dashed"><?php _e("Dashed", 'ithoughts-tooltip-glossary' ); ?></option>
							<option value="double"><?php _e("Double", 'ithoughts-tooltip-glossary' ); ?></option>
							<option value="groove"><?php _e("Groove", 'ithoughts-tooltip-glossary' ); ?></option>
							<option value="ridge"><?php _e("Ridge", 'ithoughts-tooltip-glossary' ); ?></option>
							<option value="inset"><?php _ex("Inset", "Border property", 'ithoughts-tooltip-glossary' ); ?></option>
							<option value="outset"><?php _e("Outset", 'ithoughts-tooltip-glossary' ); ?></option>
							<option value="none"><?php _e("None", 'ithoughts-tooltip-glossary' ); ?></option>
							<option value="hidden"><?php _e("Hidden", 'ithoughts-tooltip-glossary' ); ?></option>
						</select>
					</label>
				</td>
				<td>
					<label for="border-c">
						<?php _e("Border color", 'ithoughts-tooltip-glossary' ); ?>:&nbsp;
						<input autocomplete="off" type="text" value="#000" class="color-field" data-alpha="true" name="border-c"/>
					</label>
				</td>
			</tr>
			<tr class="new-section">
				<th><?php _e('Text size', 'ithoughts-tooltip-glossary' ); ?></th>
				<?php
foreach($prefixs as $prefix){
				?>
				<td><input autocomplete="off" type="text" value="12px" name="<?php echo $prefix; ?>_ts" pattern="^(medium|xx-small|x-small|small|large|x-large|xx-large|smaller|larger|\d*(\.\d+)?(r?em|px|%|ex|pt|(c|m)m|in|pc|v(h|w|min|max))|initial|inherit|)$" data-pattern-infos="<?php _e('Valid font-size value: xx-small, x-small, smaller, small, medium, large, larger, x-large, xx-large, or a value in rem, em, px, %, ex, pt, cm, mm, in, pc, vh, vw, vmin, or vmax', 'ithoughts-tooltip-glossary' ); ?>"/></td>
				<?php
}
				?>
			</tr>
			<tr>
				<th><?php _e('Line height', 'ithoughts-tooltip-glossary' ); ?></th>
				<?php
foreach($prefixs as $prefix){
				?>
				<td><input autocomplete="off" type="text" value="1.5em" name="<?php echo $prefix; ?>_lh" pattern="^(medium|xx-small|x-small|small|large|x-large|xx-large|smaller|larger|\d*(\.\d+)?(r?em|px|%|ex|pt|(c|m)m|in|pc|v(h|w|min|max))|initial|inherit|)$" data-pattern-infos="<?php _e('Valid line-height value: xx-small, x-small, smaller, small, medium, large, larger, x-large, xx-large, or a value in rem, em, px, %, ex, pt, cm, mm, in, pc, vh, vw, vmin, or vmax', 'ithoughts-tooltip-glossary' ); ?>"/></td>
				<?php
}
				?>
			</tr>
			<tr>
				<th><?php _e('Text color', 'ithoughts-tooltip-glossary' ); ?></th>
				<?php
foreach($prefixs as $prefix){
				?>
				<td><input autocomplete="off" type="text" value="#000" class="color-field" data-alpha="true" name="<?php echo $prefix; ?>_tc"/></td>
				<?php
}
				?>
			</tr>
			<tr>
				<th><?php _e('Text emphasis color', 'ithoughts-tooltip-glossary' ); ?></th>
				<td colspan="2"></td>
				<td><input autocomplete="off" type="text" value="#666" class="color-field" data-alpha="true" name="tce"/></td>
			</tr>
			<tr>
				<th><?php _e('Text align', 'ithoughts-tooltip-glossary' ); ?></th>
				<?php
foreach($prefixs as $prefix){
				?>
				<td>
					<select name="<?php echo $prefix; ?>_ta" value="justify">
						<option value="left"><?php _e('Left', 'ithoughts-tooltip-glossary' ); ?></option>
						<option value="right"><?php _e('Right', 'ithoughts-tooltip-glossary' ); ?></option>
						<option value="center"><?php _e('Center', 'ithoughts-tooltip-glossary' ); ?></option>
						<option value="justify"><?php _e('Justify', 'ithoughts-tooltip-glossary' ); ?></option>
					</select>
				</td>
				<?php
}
				?>
			</tr>
			<tr>
				<th><?php _e('Text font', 'ithoughts-tooltip-glossary' ); ?></th>
				<?php
foreach($prefixs as $prefix){
				?>
				<td>
					<select name="<?php echo $prefix; ?>_tf" required>
						<option value=""><?php _e('Please wait...', 'ithoughts-tooltip-glossary' ); ?></option>
					</select>
				</td>
				<?php
}
				?>
			</tr>
			<tr>
				<th><?php _e('Other custom CSS', 'ithoughts-tooltip-glossary' ); ?> <span class="ithoughts_tooltip_glossary-tooltip" data-tooltip-nosolo="true" data-tooltip-content="<?php echo rawurlencode(__('Following CSS rules will be copied to output compiled CSS, into the appropriated CSS rules. Don\'t specify the selector.', 'ithoughts-tooltip-glossary' )); ?>"><a href="javascript:void(0)">(<?php _e('infos', 'ithoughts-tooltip-glossary' ); ?>)</a></span></th>
				<?php
foreach($prefixs as $prefix){
				?>
				<td>
					<textarea name="<?php echo $prefix; ?>_custom" style="width:100%"></textarea>
				</td>
				<?php
}
				?>
			</tr>
			<tr>
				<th><?php _e('Other CSS rules', 'ithoughts-tooltip-glossary' ); ?> <span class="ithoughts_tooltip_glossary-tooltip" data-tooltip-nosolo="true" data-tooltip-content="<?php echo rawurlencode(__('Will be copied at the end of the CSS', 'ithoughts-tooltip-glossary' )); ?>"><a href="javascript:void(0)">(<?php _e('infos', 'ithoughts-tooltip-glossary' ); ?>)</a></span></th>
				<td colspan="3">
					<textarea name="custom" style="width:100%"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<input autocomplete="off" type="submit" name="compilecss" id="compilecss" class="alignleft button-primary" value="<?php _e("Compile CSS", 'ithoughts-tooltip-glossary' ); ?>" style="width:100%;text-align:center;">
				</td>
			</tr>
			<tr>
				<th>
					<?php _e("Output CSS", 'ithoughts-tooltip-glossary' ); ?><br />
					(<?php _e("Copy the following CSS rules to your <a href=\"https://codex.wordpress.org/Child_Themes\" target=\"_blank\">child theme</a>", 'ithoughts-tooltip-glossary' ); ?>)
				</th>
				<td colspan="3">
					<textarea name="outputcss" id="outputcss" style="width: 100%;height:250px;" readonly="readonly">
					</textarea>
					<button id="copyclip" class="alignleft button-secondary" style="width:100%;text-align:center;" disabled="disabled"><?php _e("Copy to clipboard", 'ithoughts-tooltip-glossary' ); ?></button>
					<div id="copyclipres" data-text-error="<?php _e("Could not copy to clipboard", 'ithoughts-tooltip-glossary' ); ?>" data-text-success="<?php _e("Successfully copied to clipboard", 'ithoughts-tooltip-glossary' ); ?>"></div>
				</td>
			</tr>
		</tbody>
	</table>
</form>