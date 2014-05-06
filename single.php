<?php  
/*
*
This script allows us to use different single post templates for different post categories
*
*/
?>

<?php if( in_category('award-management-faq') ) : ?>
  <?php include('single_faq.php');?>

<?php elseif ( in_category('definition') ) : ?>
  <?php include('single_definition.php');?>
  
<?php elseif ( in_category('acronym') ) : ?>
<?php include('single_acronym.php');?>

<?php elseif ( in_category('how-to') ) : ?>
<?php include('single_howto.php');?>

<?php else : ?>
	<?php include ('single_default.php');?>
<?php endif ?>

