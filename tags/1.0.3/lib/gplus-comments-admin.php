<div class="wrap">
<?php
if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
}

// Processing an option submit form. Set global vars from the form values.
if( isset($_POST['updateoptions'])  && $_POST['updateoptions']==1) {
    update_option( 'GPLUSCOMMENTS-WIDTH', $_POST['width'] );

    if ( ! (is_numeric(get_option('GPLUSCOMMENTS-WIDTH')) && get_option('GPLUSCOMMENTS-WIDTH')> 0)) {
        update_option( 'GPLUSCOMMENTS-WIDTH', 500 );
    }
    
    if( isset($_POST['dynamicwidth'])  && $_POST['dynamicwidth']==1) {
        update_option( 'GPLUSCOMMENTS-DYNAMICWIDTH', 1 );
    } else {
        update_option( 'GPLUSCOMMENTS-DYNAMICWIDTH', 0 );
    }
}
?>
<form method="POST"  action="?page=gpluscomments">
<table>
    <tr>
        <td style="text-align:center;" colspan="2"><h2 style="padding: 10px 0; text-decoration:underline;"><span style="color:#0047f1;">G</span><span style="color:#de0c32;">o</span><span style="color:#bc8000;">o</span><span style="color:#0047f1;">g</span><span style="color:#00b018;">l</span><span style="color:#dd172c;">e</span>+ Comments Options</h2></td>
    </tr>
    <tr>
        <td style="text-align:right;">Width:&nbsp;</td>
        <td style="padding:10px 5px;"><input type="text" name="width"  <?php if(get_option('GPLUSCOMMENTS-DYNAMICWIDTH') == 1){ echo "readonly"; } ?> value="<?php echo get_option('GOOGLEPLUSCOMMENTS-WIDTH')?>" />
    </tr>
    <tr>
        <td style="text-align:right;">Dynamic Width:&nbsp;</td>
        <td style="padding:10px 5px;"><input type="checkbox" name="dynamicwidth" <?php if(get_option('GPLUSCOMMENTS-DYNAMICWIDTH') == 1){echo "checked=\"checked\"";} ?> value="1" /> <i> [Fixes Google+ comment bug for responsive sites]</i></td>
    </tr>
    <tr>
        <td style="text-align:right; padding:20px 0 0 0;">
            <input type="hidden" name="updateoptions" value="1" />
            <input type="submit" name="Submit" value="Submit" />
        </td>
        <td></td>
    </tr>
</table>

</form>
</div>