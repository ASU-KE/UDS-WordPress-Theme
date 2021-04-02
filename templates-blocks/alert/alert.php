<?php
/**
 * UDS Alert Block
 *
 * @package UDS WordPress Theme
 */

    // set up the values used in the different types of alerts.
    $settings = array(
        'warning' => array(
            'class' => 'warning',
            'title' => 'Warning',
            'icon'  => 'fa-bell',
        ),
        'success' => array(
            'class' => 'success',
            'title' => 'Success',
            'icon'  => 'fa-check-circle',
        ),
        'info' => array(
            'class' => 'info',
            'title' => 'Information',
            'icon'  => 'fa-info-circle',
        ),
        'danger' => array(
            'class' => 'danger',
            'title' => 'Error',
            'icon'  => 'fa-exclamation-triangle',
        )
    );

    // get the type of alert the user has selected.
    $style = get_field( 'alert_style' );
    $content = strip_tags( get_field( 'alert_content' ), '<a><em><u><strong>' );

    // see if we have an entry for that. If not, choose information.
    if ( ! array_key_exists( $style, $settings ) ) {
        $style = 'info';
    }
?>

<!-- alert block -->
<div class="alert alert-block alert-<?php echo $settings[$style]['class']; ?>" role="alert">
    <div class="alert-icon">
        <span title="<?php echo $settings[$style]['title']; ?>" class="fa fa-icon <?php echo $settings[$style]['icon']; ?>"></span>
    </div>
    <div class="alert-content">
        <?php echo $content; ?>
    </div>
    <div class="alert-close">
        <button type="button" class="btn btn-circle btn-circle-alt-black close" aria-label="Close" onclick="event.target.parentNode.parentNode.parentNode.style.display='none';"><i class="fas fa-times"></i></button>
    </div>
</div>
