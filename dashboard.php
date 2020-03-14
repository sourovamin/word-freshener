<?php

/**
 * Word mangement dashboard.
 */
function wfp_main(){
    if ( !is_admin() ){ return; }
    global $wpdb;
    $table_name = $wpdb->prefix ."wfp";
    
    $wfpd = $wpdb->get_results( 
        "
        SELECT * 
        FROM $table_name
        "
    );
?>
    <br>
    <h1>Words Management</h1>
    <br><br>
    &emsp;<b>Actual Word</b>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;
    <b>Modified Word</b>
    <br>
    
<?php
    foreach($wfpd as $wfpd){
?>
        <br>
        <form id="wfp_manage" action="" method="post">
            &emsp;
            <input type="text" name="acw" value="<?php echo $wfpd->word; ?>">
            &emsp;&emsp;
            <input type="text" name="mow" value="<?php echo $wfpd->modified; ?>">
            <input type="hidden" name="wid" value="<?php echo $wfpd->id; ?>">
            &emsp;
            <input type="submit" value="Update Word" name="update_submit">
            &emsp;
            <input type="submit" value="Delete Word" name="delete_submit">
        </form>
        
<?php	
	}
	
    /**
     * Delete entry,
     */
    if (isset( $_POST["delete_submit"]) ){
        global $wpdb;
        $table_name = $wpdb->prefix ."wfp"; 
        $delete_row = $wpdb->delete( $table_name, array( "id" => $_POST["wid"] ) );
        
        if($delete_row){
            echo "<meta http-equiv='refresh' content='0'>";
            die;
        }
        else{
            echo "Failed to Delete!";
        }
    }
    // End of delete entry
    
    
    /**
     * Modify entry.
     */
    if (isset($_POST["update_submit"])){
        global $wpdb;
        $table_name = $wpdb->prefix ."wfp";
    
        if(strlen($_POST["acw"]) > 0){ 
            $update_row = $wpdb->update( 
                $table_name, 
                array( 
                    'word' => sanitize_text_field( $_POST["acw"] ),	
                    'modified' => sanitize_text_field( $_POST["mow"] )	
                ), 
                array( 'ID' => $_POST["wid"] )
            );
    
    
            if($update_row){
                echo "<meta http-equiv='refresh' content='0'>";
                die;
            }
        }
        else{
            echo "Failed to Update!";
        }
    }
    // End of modify entry   
}
// End of Word management


/**
 * Add word dashboard
 */
function wfp_add_words(){
    if ( !is_admin() ){ return; }
?>
    <br>
    <h1>Add Word</h1>
    <br><br>
    <form id="wfp_add" action="" method="post">
        Actual Word:&emsp;&ensp;&nbsp;<input type="text" name="ac_word"><br><br>
        Modified Word: <input type="text" name="mo_word"><br><br>
        <input type="submit" value="Add Word" name="add_submit"><br>
    </form>
  
<?php
    if (isset($_POST["add_submit"])){
        $ac_word = sanitize_text_field( $_POST["ac_word"] );
        $mo_word = sanitize_text_field( $_POST["mo_word"] );
        wfp_insert($ac_word,$mo_word);
    }
}
// End of add word dashboard


/**
 *Function to insert data
 */
function wfp_insert($ac_word,$mo_word){
    global $wpdb;
    $table_name = $wpdb->prefix ."wfp";
    
    if(strlen($ac_word) > 0){
        $add_row = $wpdb->insert( 
            $table_name, 
            array(
                "id" => NULL,
                "word" => " ".$ac_word, 
                "modified" => $mo_word,
            ),
	
            array(
                "%d",
                "%s", 
                "%s" 
            )
	 
        ); 
    
        if($add_row){
            echo "New word: ". $ac_word ." has been added successfully!";
        }	
	}
    else{
        echo "Word addition failed!";
    }  
}
// End of inset data function


/**
 * Function for settings
 */
function wfp_settings(){
    if (isset($_POST["save_change"])){
        $wfp_op_settings = [];
        $wfp_op_settings["content"] = isset($_POST["wfp_content"]) ? 1 : 0;
        $wfp_op_settings["title"] = isset($_POST["wfp_title"]) ? 1 : 0;
        $wfp_op_settings["comment"] = isset($_POST["wfp_comment"]) ? 1 : 0;
        
        update_option("wfp_op_settings", $wfp_op_settings);
    }
    
    $option = get_option("wfp_op_settings");
    ?>
    <div class="wrap">
        <h2>Settings</h2>
        <form id="wfp_settings" method="post" action="">
            <h3>Disable Filter For</h3>
            <input type="checkbox" name="wfp_content" value="1" <?php checked(1, $option["content"], true); ?> />
            Page/Post Main Content<br>
            <input type="checkbox" name="wfp_title" value="1" <?php checked(1, $option["title"], true); ?> />
            Titles<br>
            <input type="checkbox" name="wfp_comment" value="1" <?php checked(1, $option["comment"], true); ?> />
            Comments
            
            <p class="submit">
                <input type="submit" value="Save Change" name="save_change" class="button button-primary">
            </p>
        </form>
    </div> <?php
}
// End of settings
