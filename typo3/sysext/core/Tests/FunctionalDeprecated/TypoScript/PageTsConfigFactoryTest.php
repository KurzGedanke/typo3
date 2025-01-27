<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace TYPO3\CMS\Core\Tests\FunctionalDeprecated\TypoScript;

use TYPO3\CMS\Core\Site\Entity\NullSite;
use TYPO3\CMS\Core\TypoScript\PageTsConfigFactory;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

final class PageTsConfigFactoryTest extends FunctionalTestCase
{
    protected array $testExtensionsToLoad = [
        'typo3/sysext/core/Tests/Functional/Fixtures/Extensions/test_typoscript_pagetsconfigfactory',
    ];

    /**
     * @test
     */
    public function pageTsConfigLoadsDefaultsFromGlobals(): void
    {
        $GLOBALS['TYPO3_CONF_VARS']['BE']['defaultPageTSconfig'] = 'loadedFromGlobals = loadedFromGlobals';
        $subject = $this->get(PageTsConfigFactory::class);
        $pageTsConfig = $subject->create([], new NullSite());
        self::assertSame('loadedFromGlobals', $pageTsConfig->getPageTsConfigArray()['loadedFromGlobals']);
    }

    /**
     * @test
     */
    public function pageTsConfigLoadsSingleFileWithOldImportSyntaxFromGlobals(): void
    {
        $GLOBALS['TYPO3_CONF_VARS']['BE']['defaultPageTSconfig'] = '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:test_typoscript_pagetsconfigfactory/Configuration/TsConfig/tsconfig-includes.tsconfig">';
        /** @var PageTsConfigFactory $subject */
        $subject = $this->get(PageTsConfigFactory::class);
        $pageTsConfig = $subject->create([], new NullSite());
        self::assertSame('loadedFromTsconfigIncludesWithTsconfigSuffix', $pageTsConfig->getPageTsConfigArray()['loadedFromTsconfigIncludesWithTsconfigSuffix']);
    }
}
