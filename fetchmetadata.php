<?php
/**
 * FetchMetadata Plugin
 *
 * @copyright  Copyright (C) 2020 Tobias Zulauf All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */

defined('_JEXEC') or die;

use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Response\JsonResponse;

/**
 * Plugin class for Http Header
 *
 * @since  1.0
 */
class PlgSystemFetchMetadata extends CMSPlugin
{
	/**
	 * Application object.
	 *
	 * @var    CMSApplication
	 * @since  1.0
	 */
	protected $app;

	/**
	 * Listener for the `onAfterInitialise` event
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onAfterInitialise()
	{
		$headers = array_change_key_case(getallheaders(), CASE_LOWER);

		// Allow requests from browsers which don't send Fetch Metadata
		if (!isset($headers['sec-fetch-site']))
		{
			return;
		}

		// Allow same-site and browser initiated requests
		if (in_array($headers['sec-fetch-site'],  ['same-origin', 'same-site', 'none']))
		{
			return;
		}

		// Allow simple top-level navigation from anywhere, <object> and <embed> send navigation requests, which we disallow.
		if ($headers['sec-fetch-mode'] === 'navigate'
			&& $this->app->input->server->get('REQUEST_METHOD', 'unknown', 'cmd') === 'GET'
			&& !in_array($headers['sec-fetch-dest'], ['object', 'embed']))
		{
			return;
		}

		// Block all other requests
		$this->app->enqueueMessage(Text::_('JINVALID_TOKEN'), 'error');
		echo new JsonResponse;
		$this->app->close();
	}
}
