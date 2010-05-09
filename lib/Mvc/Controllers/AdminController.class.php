<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework
 *
 * **********************************************************************************************
 *
 * Copyright (c) 2009 Scand Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under the terms
 * of the GNU Lesser General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * You should have received a copy of the GNU Lesser General Public License along with
 * this program; if not, see <http://www.gnu.org/licenses/>.
 *
 ************************************************************************************************/

/**
 * @ingroup Phoebius_Mvc_Controllers
 */
class AdminController extends BaseSiteAdminController
{
	protected function checkCredentials(Trace $trace)
	{
		parent::checkCredentials($trace);

		if (!$this->isAdminAuthorized()) {
			$trace[self::PARAMETER_ACTION] = 'login';
		}
	}

	function action_login($email = null, $password = null)
	{
		if ($email && $password && $this->tryLogIn($email, $password)) {
			return $this->redirect('adminNewAnnouncement');
		}

		return 'admin/login';
	}

	function action_editAnnouncement(Integer $id, array $data = null, $action = null)
	{
		$ann = Announcement::dao()->getEntityById($id->getValue());

		if ($action == 'Delete') {
			$ann->drop();

			return $this->redirect('news');
		}
		else if ($action == 'Save' && is_array($data)) {
			$this->fillAnnouncement($data, $ann);
			$ann->save();

			return $this->redirect('adminEditAnnouncement', array('id' => $ann->getId()));
		}

		$this->getModel()->append(
			array(
				'announcement' => $ann
			)
		);

		return 'admin/announcement';
	}

	function action_newAnnouncement(array $data = null)
	{
		if (is_array($data)) {
			$ann = $this->fillAnnouncement($data, new Announcement);
			$ann->save();

			return $this->redirect('news');
		}

		$this->getModel()->append(
			array(
				'announcement' => new Announcement
			)
		);

		return 'admin/announcement';
	}

	function action_editRelease(Integer $id, array $data = null, $action = null)
	{
		$release = PhoebiusRelease::dao()->getEntityById($id->getValue());

		if ($action == 'Delete') {
			$release->drop();

			return $this->redirect('adminReleases');
		}
		else if ($action == 'Save' && is_array($data)) {
			$this->fillRelease($data, $release);
			$release->save();

			return $this->redirect('adminEditRelease', array('id' => $release->getId()));
		}

		$this->getModel()->append(
			array(
				'release' => $release
			)
		);

		return 'admin/release';
	}

	function action_newRelease(array $data = null)
	{
		if (is_array($data)) {
			$release = $this->fillRelease($data, new PhoebiusRelease);
			$release->save();

			return $this->redirect('adminReleases');
		}

		$this->getModel()->append(
			array(
				'release' => new PhoebiusRelease
			)
		);

		return 'admin/release';
	}

	function action_releases()
	{
		$releases = 
			PhoebiusRelease::query()
				->orderBy(OrderBy::desc('date'))
				->getList();

		$this->getModel()->append(
			array(
				'releases' => $releases
			)
		);

		return 'admin/releases';
	}

	private function fillRelease(array $data, PhoebiusRelease $release)
	{
		$release
			->setDate(new Date($data['date']))
			->setVersion($data['version'])
			->setDescription($data['description'])
			->setLink($data['link']);

		return $release;
	}

	private function fillAnnouncement(array $data, Announcement $ann)
	{
		$ann
			->setText($data['text'])
			->setDate(new Date($data['date']));

		return $ann;
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