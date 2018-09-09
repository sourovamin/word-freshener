<?php


//Word mangement dashboard

function wfp_main(){
    global $wpdb;
    $table_name = $wpdb->prefix .'wfp';
    
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
        &emsp;<input type="text" name="acw" value="<?php echo $wfpd->word; ?>">
        &emsp;&emsp;<input type="text" name="mow" value="<?php echo $wfpd->modified; ?>">
        <input type="hidden" name="wid" value="<?php echo $wfpd->id; ?>">
        &emsp;<input type="submit" value="Update Word" name="update_submit">
        &emsp;<input type="submit" value="Delete Word" name="delete_submit">
        </form>
        
        <?php
		
	}
    
	
    //delete entry
    if (isset($_POST['delete_submit'])){
        global $wpdb;
        $table_name = $wpdb->prefix .'wfp'; 
        $delete_row = $wpdb->delete( $table_name, array( 'id' => $_POST["wid"] ) );
        
        if($delete_row){
            header("Refresh:0");
        }
        else{
            echo "Failed to Delete!";
        }
    }
    //end of delete entry
    
    
    //modify entry
    if (isset($_POST['update_submit'])){
        global $wpdb;
        $table_name = $wpdb->prefix .'wfp';
    
	if(strlen($_POST["acw"]) > 0){ 
    $update_row = $wpdb->update( 
	$table_name, 
	array( 
		'word' => $_POST["acw"],	
		'modified' => $_POST["mow"]	
	), 
	array( 'ID' => $_POST["wid"] )
    );
    
    
        if($update_row){
        header("Refresh:0");
        }
	}
	
    else{
        echo "Failed to Update!";
    }
    
    }
    //end of modify entry

    
}

//End of Word management





//Add word dashboard
function wfp_add_words(){
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
if (isset($_POST['add_submit'])){
  $ac_word=$_POST["ac_word"];
  $mo_word=$_POST["mo_word"];
  wfp_insert($ac_word,$mo_word);
    }
}
//End of add word dashboard



//Function to insert data
function wfp_insert($ac_word,$mo_word){
    global $wpdb;
    $table_name = $wpdb->prefix .'wfp';
    
    if(strlen($ac_word) > 0){
    $add_row = $wpdb->insert( 
	$table_name, 
	array(
		'id' => NULL,
		'word' => $ac_word, 
		'modified' => $mo_word,
	),
	
	array(
		'%d',
		'%s', 
		'%s' 
	)
	 
    );
    
    
    if($add_row){
        echo "New word:". $ac_word ." has been added successfully!";
    }
	
	}
	
    else{
        echo "Word addition failed!";
    }
  
}
//End of inset data function

?>