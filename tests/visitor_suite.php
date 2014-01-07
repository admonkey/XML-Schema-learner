<?php
/**
 * Schema learning
 *
 * This file is part of XML-Schema-learner.
 *
 * XML-Schema-learner is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as
 * published by the Free Software Foundation; version 3 of the
 * License.
 *
 * XML-Schema-learner is distributed in the hope that it will be
 * useful, but WITHOUT ANY WARRANTY; without even the implied warranty
 * of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with XML-Schema-learner; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA
 * 02110-1301 USA
 *
 * @package Core
 * @version $Revision: 1236 $
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPL
 */

/*
 * Require environment file
 */
require_once __DIR__ . '/../src/environment.php';

/**
 * Require tests
 */
require 'visitor/regular_expression_string_visitor_tests.php';
require 'visitor/regular_expression_dtd_visitor_tests.php';
require 'visitor/regular_expression_xml_schema_visitor_tests.php';
require 'visitor/regular_expression_bonxai_visitor_tests.php';
require 'visitor/automaton_page_rank_visitor.php';
require 'visitor/automaton_support_visitor.php';
require 'visitor/automaton_dot_visitor.php';
require 'visitor/schema_dtd_visitor.php';
require 'visitor/schema_xsd_visitor.php';
require 'visitor/schema_bonxai_visitor.php';

/**
 * General root test suite
 */
class slVisitorTestSuite extends PHPUnit_Framework_TestSuite
{
    /**
     * Basic constructor for test suite
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName( 'XML-Schema-learner - Visitor tests' );

        $this->addTest( slVisitorRegularExpressionStringTests::suite() );
        $this->addTest( slVisitorRegularExpressionDtdTests::suite() );
        $this->addTest( slVisitorRegularExpressionXmlSchemaTests::suite() );
        $this->addTest( slVisitorRegularExpressionBonxaiTests::suite() );
        $this->addTest( slVisitorAutomatonPageRankTests::suite() );
        $this->addTest( slVisitorAutomatonSupportTests::suite() );
        $this->addTest( slVisitorAutomatonDotTests::suite() );
        $this->addTest( slVisitorSchemaDtdTests::suite() );
        $this->addTest( slVisitorSchemaXmlSchemaTests::suite() );
        $this->addTest( slVisitorSchemaBonxaiTests::suite() );
    }

    /**
     * Return test suite
     * 
     * @return slTestSuite
     */
    public static function suite()
    {
        return new slVisitorTestSuite( __CLASS__ );
    }
}
