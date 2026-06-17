(function ($) {
	'use strict';

	function addDuplicateButton($row) {
		if ($row.find('.cmb-duplicate-group-row').length) {
			return;
		}
		$row.find('.cmb-remove-group-row').after(
			'<button type="button" class="button cmb-duplicate-group-row" style="margin-left:38px;min-height:40px;border:none;">Duplicate</button>'
		);
	}

	function collectRowValues($row) {
		var values = {};
		$row.find('input:not([type="button"]), textarea, select').each(function () {
			var name = $(this).attr('name');
			if (!name) return;
			// Extract the sub-field key from names like group_id[0][field_key]
			var match = name.match(/\[([^\[\]]+)\]$/);
			if (match) {
				values[match[1]] = $(this).val();
			}
		});
		return values;
	}

	function populateRow($row, values) {
		$row.find('input:not([type="button"]), textarea, select').each(function () {
			var name = $(this).attr('name');
			if (!name) return;
			var match = name.match(/\[([^\[\]]+)\]$/);
			if (match && values.hasOwnProperty(match[1])) {
				$(this).val(values[match[1]]);
			}
		});
	}

	// Add duplicate button to rows added dynamically by CMB2
	$(document).on('cmb2_add_row', function (e, $row) {
		addDuplicateButton($row);
	});

	// Duplicate on click
	$(document).on('click', '.cmb-duplicate-group-row', function (e) {
		e.preventDefault();
		var $sourceRow = $(this).closest('.cmb-repeatable-grouping');
		var $group     = $sourceRow.closest('.cmb-repeatable-group');
		var values     = collectRowValues($sourceRow);

		// CMB2's add-row is synchronous DOM clone, so populate immediately after
		$group.find('.cmb-add-group-row').trigger('click');

		var $newRow = $group.find('.cmb-repeatable-grouping').last();
		populateRow($newRow, values);
	});

	$(document).ready(function () {
		$('.cmb-repeatable-grouping').each(function () {
			addDuplicateButton($(this));
		});
	});

})(jQuery);
