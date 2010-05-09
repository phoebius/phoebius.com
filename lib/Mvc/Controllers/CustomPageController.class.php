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
 *
 * @ingroup Phoebius_Mvc_Controllers
 */
class CustomPageController extends BasePhoebiusController
{
	const LIMIT_ENTRIES_PER_PAGE = 10;

	function action_index()
	{
		$announcements =
			EntityQuery::create(Announcement::orm())
				->orderBy(OrderBy::desc('date'))
				->setLimit(self::LIMIT_ENTRIES_PER_PAGE)
				->setOffset(0)
				->getList();

		$release =
			PhoebiusRelease::query()
				->orderBy(OrderBy::desc('date'))
				->setLimit(1)
				->getEntity();

		$this->getModel()->append(array(
			'release' => $release,
			'announcements' => $announcements,
			'breadScrumbs' => array(
			)
		));

		return 'index';
	}

	function action_newsList()
	{
		$announcements =
			EntityQuery::create(Announcement::orm())
				->orderBy(OrderBy::desc('date'))
				->setLimit(self::LIMIT_ENTRIES_PER_PAGE)
				->setOffset(0)
				->getList();

		$this->getModel()->append(array(
			'announcements' => $announcements,
			'breadScrumbs' => array(
			)
		));

		return 'news';
	}

	function action_404()
	{
		$this->getTrace()->getWebContext()->getResponse()->setStatus(
			new HttpStatus(HttpStatus::CODE_404)
		);

		return '404';
	}

	function action_search(String $query = null)
	{
		$this->getModel()->append(array(
			'query' => $query ? $query->getValue() : null
		));

		return 'search';
	}

	function action_feedback(
			$do_send = null,
			$name = null,
			$email = null,
			$text = null,
			$message = null,
			$submitted = null
		)
	{
		if ($do_send) {

			if (
				$name && $email && $text
				&& !$message
			) {
				mail(
					ConfigurationEntry::getEntry(
						new ConfigurationKey(ConfigurationKey::ADMIN_EMAIL)
					)->getValue(),
					"phoebius.org feedback from {$_REQUEST['name']}",
					$_REQUEST['text'],
					join("\r\n", array(
						'From: "Phoebius.org feedback" <robot@phoebius.org>',
						'Reply-To: "' .$_REQUEST['name']. '" <' . $_REQUEST['email'] . '>'
					))
				);
			}

			return new RedirectResult(new HttpUrl('/feedback/?submitted=1'));
		}

		$this->getModel()->append(array(
				'submitted' => $submitted,
			)
		);

		return 'feedback';
	}
}

?>