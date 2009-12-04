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

/**
 * @ingroup Phoebius_Mvc_Controllers
 */
class AdminController extends BaseSiteAdminController
{
	function action_login($email = null, $password = null)
	{
		if ($email && $password && $this->tryLogIn($email, $password)) {
			return $this->redirect('index');
		}

		return 'admin/login';
	}

	function action_deleteEntry(Integer $id)
	{
		BlogEntry::dao()->dropEntityById($id->getValue());

		return $this->redirect('index');
	}

	function action_editEntry(Integer $id, array $entryData = null)
	{
		$entry = BlogEntry::dao()->getEntityById($id->getValue());

		if (is_array($entryData)) {
			$this->fillEntry($entryData, $entry);
			$entry->save();

			return $this->redirect('adminEditEntry', array('id' => $entry->getId()));
		}

		$this->getModel()->append(
			array(
				'entry' => $entry
			)
		);

		return 'admin/entry';
	}

	function action_newEntry(array $entryData = null)
	{
		if (is_array($entryData)) {
			$entry = $this->fillEntry($entryData, new BlogEntry);
			$entry->save();

			return $this->redirect('adminNewEntry');
		}

		$this->getModel()->append(
			array(
				'entry' => new BlogEntry
			)
		);

		return 'admin/entry';
	}

	private function fillEntry(array $entryData, BlogEntry $entry)
	{
		$entry
			->setTitle($entryData['title'])
			->setText($entryData['text'])
			->setRestId($entryData['restId'])
			->setPubDate(new Date($entryData['pubDate']))
			->setPubTime(
				Timestamp::create($entryData['pubDate'])
					->spawn(Time::now()->toFormattedString())
				);

		return $entry;
	}

	private function tryLogIn($email, $password)
	{
		if (
				$email ==
					ConfigurationEntry::getEntry(
						new ConfigurationKey(ConfigurationKey::ADMIN_EMAIL)
					)->getValue()
				&& $password ==
					ConfigurationEntry::getEntry(
						new ConfigurationKey(ConfigurationKey::ADMIN_PASSWORD)
					)->getValue()
		) {
			$this->authorizeAsAdmin($email);

			return true;
		}
	}
}

?>