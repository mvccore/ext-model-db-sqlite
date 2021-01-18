<?php

/**
 * MvcCore
 *
 * This source file is subject to the BSD 3 License
 * For the full copyright and license information, please view
 * the LICENSE.md file that are distributed with this source code.
 *
 * @copyright	Copyright (c) 2016 Tom Flidr (https://github.com/mvccore)
 * @license		https://mvccore.github.io/docs/mvccore/5.0.0/LICENSE.md
 */

namespace MvcCore\Ext\Models\Db\Providers\Connections;

class		SQLite 
extends		\MvcCore\Ext\Models\Db\Connection
implements	\MvcCore\Ext\Models\Db\Model\IConstants {

	/**
	 * @inheritDocs
	 * @param string $identifierName
	 * @return string
	 */
	public function QuoteName ($identifierName) {
		return "[{$identifierName}]";
	}

	/**
	 * Set up connection specific properties depends on this driver.
	 * @return void
	 */
	protected function setUpConnectionSpecifics () {
		// @see https://www.sqlite.org/wal.html#activating_and_configuring_wal_mode
		$this->provider->exec("PRAGMA journal_mode=WAL;");
		parent::setUpConnectionSpecifics();
	}
}
