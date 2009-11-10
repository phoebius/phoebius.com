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
			return new RedirectResult(new HttpUrl('/'));
		}

		return 'admin/login';
	}

	function action_deleteEntry(BlogEntry $id)
	{
		BlogEntry::dao()->drop($id);

		return new RedirectResult(new HttpUrl('/'));
	}

	function action_editEntry(BlogEntry $id, array $entryData = null)
	{
		if (is_array($entryData)) {
			$this->fillEntry($entryData, $id);
			BlogEntry::dao()->save($id);

			return new RedirectResult(new HttpUrl('/blog/' . $id->toUrl()));
		}

		$this->getModel()->append(
			array(
				'entry' => $id
			)
		);

		return 'admin/entry';
	}

	function action_newEntry(array $entryData = null)
	{
		if (is_array($entryData)) {
			$entry = $this->fillEntry($entryData, new BlogEntry);
			BlogEntry::dao()->save($entry);

			return new RedirectResult(new HttpUrl('/admin/entry/'));
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
			->setPubTime(Timestamp::create($entryData['pubDate'])->setTime(Time::now()));

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