<?php

/**
 * Word mangement dashboard.
 */
function wfp_main()
{
	if (!is_admin()) {
		return;
	}
	global $wpdb;
	$table_name = $wpdb->prefix . "wfp";

	$wfpd = $wpdb->get_results(
		"
        SELECT * 
        FROM $table_name
        "
	);
	?>
    <div class="wrap">
    <h1><?php echo __("Words Management", "word-freshener"); ?></h1>
    <table>
        <tr>
            <th style="width:20%;"><?php echo __("Actual Word", "word-freshener"); ?></th>
            <th><?php echo __('Modified Word', 'word-freshener'); ?></th>
        </tr>
    </table>

	<?php
	foreach ($wfpd as $wfpd) {
		?>
        <form id="wfp_manage" action="" method="post">
            <table>
                <tr>
                    <td><input type="text" name="acw" value="<?php echo $wfpd->word; ?>"></td>
                    <td><input type="text" name="mow" value="<?php echo $wfpd->modified; ?>"></td>
                    <td><input type="hidden" name="wid" value="<?php echo $wfpd->id; ?>"></td>
                    <td><input type="submit" value="<?php echo __("Update Word", "word-freshener"); ?>"
                               name="update_submit"></td>
                    </td>
                    <td><input type="submit" value="<?php echo __("Delete Word", "word-freshener"); ?>"
                               name="delete_submit"></td>
                </tr>
            </table>
        </form>

		<?php
	}
	?>  </div><?php

	/**
	 * Delete entry,
	 */
	if (isset($_POST["delete_submit"])) {
		global $wpdb;
		$table_name = $wpdb->prefix . "wfp";
		$delete_row = $wpdb->delete($table_name, array("id" => $_POST["wid"]));

		if ($delete_row) {
			echo "<meta http-equiv='refresh' content='0'>";
			die;
		} else {
			echo __("Failed to Delete!", "word-freshener");
		}
	}
	// End of delete entry


	/**
	 * Modify entry.
	 */
	if (isset($_POST["update_submit"])) {
		global $wpdb;
		$table_name = $wpdb->prefix . "wfp";

		if (strlen($_POST["acw"]) > 0) {
			$update_row = $wpdb->update(
				$table_name,
				array(
					'word' => sanitize_text_field($_POST["acw"]),
					'modified' => sanitize_text_field($_POST["mow"])
				),
				array('ID' => $_POST["wid"])
			);


			if ($update_row) {
				echo "<meta http-equiv='refresh' content='0'>";
				die;
			}
		} else {
			echo __("Failed to Update!", "word-freshener");
		}
	}
	// End of modify entry
}

// End of Word management


/**
 * Add word dashboard
 */
function wfp_add_words()
{
	if (!is_admin()) {
		return;
	}
	?>
    <div class="wrap">
        <h1>Add Word</h1>
        <form id="wfp_add" action="" method="post">
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="ac_word"><?php echo __("Actual Word", "word-freshener"); ?></label></th>
                    <td><input type="text" name="ac_word"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="mo_word"><?php echo __("Modified Word", "word-freshener"); ?></label>
                    </th>
                    <td><input type="text" name="mo_word"></td>
                </tr>
            </table>
            <p class="submit">
                <input type="submit" value="<?php echo __("Add Word", "word-freshener"); ?>" name="add_submit"
                       class="button button-primary"><br>
            </p>
        </form>
    </div>

	<?php
	if (isset($_POST["add_submit"])) {
		$ac_word = sanitize_text_field($_POST["ac_word"]);
		$mo_word = sanitize_text_field($_POST["mo_word"]);
		wfp_insert($ac_word, $mo_word);
	}
}

// End of add word dashboard


/**
 *Function to insert data
 */
function wfp_insert($ac_word, $mo_word)
{
	global $wpdb;
	$table_name = $wpdb->prefix . "wfp";

	if (strlen($ac_word) > 0) {
		$add_row = $wpdb->insert(
			$table_name,
			array(
				"id" => null,
				"word" => " " . $ac_word,
				"modified" => $mo_word,
			),

			array(
				"%d",
				"%s",
				"%s"
			)

		);

		if ($add_row) {
			echo "<div class='updated notice'>" . __("New word", "word-freshener") . "<strong>: " .
				$ac_word . "</strong> " . __("has been added successfully!", "word-freshener") . "</div>";
		}
	} else {
		echo __("Word addition failed!", "word-freshener");
	}
}

// End of inset data function


/**
 * Function for settings
 */
function wfp_settings()
{
	if (isset($_POST["save_change"])) {
		$wfp_op_settings = [];
		$wfp_op_settings["content"] = isset($_POST["wfp_content"]) ? 1 : 0;
		$wfp_op_settings["title"] = isset($_POST["wfp_title"]) ? 1 : 0;
		$wfp_op_settings["comment"] = isset($_POST["wfp_comment"]) ? 1 : 0;

		update_option("wfp_op_settings", $wfp_op_settings);
	}

	$option = get_option("wfp_op_settings");
	?>
    <div class="wrap">
        <h1><?php echo __("Settings", "word-freshener"); ?></h1>
        <form id="wfp_settings" method="post" action="">
            <h3><?php echo __("Disable Filter For", "word-freshener"); ?></h3>
            <input type="checkbox" name="wfp_content" value="1" <?php checked(1, $option["content"], true); ?> />
			<?php echo __("Page/Post Main Content", "word-freshener"); ?><br>
            <input type="checkbox" name="wfp_title" value="1" <?php checked(1, $option["title"], true); ?> />
			<?php echo __("Titles", "word-freshener"); ?><br>
            <input type="checkbox" name="wfp_comment" value="1" <?php checked(1, $option["comment"], true); ?> />
			<?php echo __("Comments", "word-freshener"); ?>

            <p class="submit">
                <input type="submit" value="<?php echo __("Save Change", "word-freshener"); ?>" name="save_change"
                       class="button button-primary">
            </p>
        </form>
    </div> <?php
}
// End of settings
