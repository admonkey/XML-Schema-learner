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

/**
 * Test class
 */
class slMainCountingSingleOccurenceAutomatonTests extends slMainWeightedSingleOccurenceAutomatonTests
{
    /**
     * Return test suite
     *
     * @return PHPUnit_Framework_TestSuite
     */
	public static function suite()
	{
		return new PHPUnit_Framework_TestSuite( __CLASS__ );
	}

    /**
     * Return automaton implementation to test
     * 
     * @return slSingleOccurenceAutomaton
     */
    protected function getAutomaton()
    {
        return new slCountingSingleOccurenceAutomaton();
    }

    public function testGeneralCounting()
    {
        $automaton = $this->getAutomaton();
        $automaton->learn( array( 'a' ) );

        $this->assertEquals(
            array(
                'min' => 1,
                'max' => 1,
            ),
            $automaton->getGeneralOccurences( array( 'a' ) )
        );
    }

    public function testGeneralCounting2()
    {
        $automaton = $this->getAutomaton();
        $automaton->learn( array( 'a', 'a' ) );

        $this->assertEquals(
            array(
                'min' => 2,
                'max' => 2,
            ),
            $automaton->getGeneralOccurences( array( 'a' ) )
        );
    }

    public function testGeneralCounting3()
    {
        $automaton = $this->getAutomaton();
        $automaton->learn( array( 'a' ) );
        $automaton->learn( array( 'b' ) );

        $this->assertEquals(
            array(
                'min' => 0,
                'max' => 1,
            ),
            $automaton->getGeneralOccurences( array( 'a' ) )
        );
    }

    public function testGeneralCounting4()
    {
        $automaton = $this->getAutomaton();
        $automaton->learn( array( 'a' ) );
        $automaton->learn( array( 'b' ) );

        $this->assertEquals(
            array(
                'min' => 0,
                'max' => 1,
            ),
            $automaton->getGeneralOccurences( array( 'b' ) )
        );
    }

    public function testGeneralCounting5()
    {
        $automaton = $this->getAutomaton();
        $automaton->learn( array( 'a', 'b', 'b' ) );
        $automaton->learn( array( 'a' ) );

        $this->assertEquals(
            array(
                'min' => 0,
                'max' => 2,
            ),
            $automaton->getGeneralOccurences( array( 'a', 'b' ) )
        );
    }

    public function testSumCounting()
    {
        $automaton = $this->getAutomaton();
        $automaton->learn( array( 'a' ) );

        $this->assertEquals(
            array(
                'min' => 1,
                'max' => 1,
            ),
            $automaton->getOccurenceSum( array( 'a' ) )
        );
    }

    public function testSumCounting2()
    {
        $automaton = $this->getAutomaton();
        $automaton->learn( array( 'a', 'a' ) );

        $this->assertEquals(
            array(
                'min' => 2,
                'max' => 2,
            ),
            $automaton->getOccurenceSum( array( 'a' ) )
        );
    }

    public function testSumCounting3()
    {
        $automaton = $this->getAutomaton();
        $automaton->learn( array( 'a' ) );
        $automaton->learn( array( 'b' ) );

        $this->assertEquals(
            array(
                'min' => 1,
                'max' => 1,
            ),
            $automaton->getOccurenceSum( array( 'a', 'b' ) )
        );
    }

    public function testSumCounting4()
    {
        $automaton = $this->getAutomaton();
        $automaton->learn( array( 'a', 'b', 'b' ) );
        $automaton->learn( array( 'a' ) );

        $this->assertEquals(
            array(
                'min' => 1,
                'max' => 3,
            ),
            $automaton->getOccurenceSum( array( 'a', 'b' ) )
        );
    }
}

