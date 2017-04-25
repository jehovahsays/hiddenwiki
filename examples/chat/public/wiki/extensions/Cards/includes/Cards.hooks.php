<?php
/**
 * Hooks for Cards extension
 *
 * @file
 * @ingroup Extensions
 */

namespace Cards;

use ResourceLoader;

class Hooks {

	/**
	 * Register QUnit tests.
	 *
	 * @see https://www.mediawiki.org/wiki/Manual:Hooks/ResourceLoaderTestModules
	 * @param array $testModules
	 * @param ResourceLoader $resourceLoader
	 * @return bool
	 */
	public static function onResourceLoaderTestModules(
		array &$testModules, ResourceLoader &$resourceLoader ) {
		$resourceFileModulePaths = array(
			'localBasePath' => __DIR__ . '/../tests/qunit/',
			'remoteExtPath' => 'Cards/tests/qunit',
			'targets' => array( 'mobile' ),
		);

		$testModules['qunit']['ext.cards.tests'] = array(
			'dependencies' => array(
				'ext.cards'
			),
			'scripts' => array(
				'CardModel.js',
				'CardsGateway.js',
				'CardView.js',
			)
		) + $resourceFileModulePaths;

		return true;
	}
}
