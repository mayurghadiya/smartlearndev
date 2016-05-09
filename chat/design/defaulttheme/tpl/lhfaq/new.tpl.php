<h1><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('faq/new','New question');?></h1>

<?php if (isset($errors)) : ?>
		<?php include(erLhcoreClassDesign::designtpl('lhkernel/validation_error.tpl.php'));?>
<?php endif; ?>

<form action="<?php echo erLhcoreClassDesign::baseurl('faq/new')?>" method="post">

<?php include(erLhcoreClassDesign::designtpl('lhfaq/form.tpl.php'));?>

<div class="btn-group" role="group" aria-label="...">
     <input type="submit" class="btn btn-default" name="Save" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('system/buttons','Save');?>"/>
     <input type="submit" class="btn btn-default" name="Cancel" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('system/buttons','Cancel');?>"/>
</div>

</form>