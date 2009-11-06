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

echo $this->getUIControl()->getDefaultContent();

$this->renderPartial('parts/footer');
