<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework
 *
 * **********************************************************************************************
 *
 * Copyright (c) 2009 phoebius.org
 *
 * All rights reserved.
 *
 ************************************************************************************************/

$this->renderPartial('parts/header');

?>

<?=$this->getUIControl()->getDefaultContent()?>

<?php

$this->renderPartial('parts/footer');

?>