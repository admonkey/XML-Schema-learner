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
 * Class represeneting the properties of a node in the schema automaton.
 *
 * @package Core
 * @version $Revision: 1236 $
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPL
 */
class slSchemaAutomatonNode
{
    /**
     * Element name
     * 
     * @var string
     */
    public $name;

    /**
     * Element type
     * 
     * @var string
     */
    public $type;

    /**
     * Construct automaton node from name and type.
     * 
     * @param string $name 
     * @param string $type 
     * @return void
     */
    public function __construct( $name, $type )
    {
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * Return a string representation of the automaton node.
     * 
     * @return string
     */
    public function __toString()
    {
        return "{$this->name}{{$this->type}}";
    }
}

