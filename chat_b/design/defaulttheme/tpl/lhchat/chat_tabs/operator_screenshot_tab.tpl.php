<?php include(erLhcoreClassDesign::designtpl('lhchat/chat_tabs/operator_screenshot_tab_pre.tpl.php')); ?>
<?php if ($operator_screenshot_tab_enabled == true && erLhcoreClassUser::instance()->hasAccessTo('lhchat','take_screenshot')) : ?>
<li role="presentation"<?php if ($chatTabsOrderDefault == 'operator_screenshot_tab') print ' class="active"';?>><a href="#main-user-info-screenshot-<?php echo $chat->id?>" aria-controls="main-user-info-screenshot-<?php echo $chat->id?>" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/screenshot','Screenshot')?>" role="tab" data-toggle="tab"><i class="material-icons mr-0">photo_camera</i></a></li>
<?php endif;?>