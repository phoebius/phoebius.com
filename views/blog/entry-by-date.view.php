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

$this->model->set('title', $this->entries[0]->getTitle());

$this->setMaster('content.master');

$this->renderPartial('blog/entry-list');
