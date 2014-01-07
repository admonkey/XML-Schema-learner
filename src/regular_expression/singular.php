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
 * Regular expression representation base class
 *
 * @package Core
 * @version $Revision: 1236 $
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPL
 */
class slRegularExpressionSingular extends slRegularExpressionContainer
{
    /**
     * Child of the regular expression
     * 
     * @var slRegularExpression
     */
    protected $child;

    /**
     * Construct regular expression
     *
     * Construct regular expression from its child
     * 
     * @param slRegularExpression $child
     * @return void
     */
    public function __construct( slRegularExpression $child = null )
    {
        $this->child = $child;
    }

    /**
     * Set children
     *
     * Set the single child for the regular expression.
     * 
     * @param slRegularExpression $child 
     * @return void
     */
    public function setChild( slRegularExpression $child )
    {
        $this->child = $child;
    }

    /**
     * Get child
     *
     * Return the single child for the regular expression.
     * 
     * @return slRegularExpression
     */
    public function getChild()
    {
        return $this->child;
    }

    /**
     * Get children
     * 
     * @return array(slRegularExpression)
     */
    public function getChildren()
    {
        return array( $this->child );
    }

    /**
     * Set children
     * 
     * @param array(slRegularExpression) $children
     * @return void
     */
    public function setChildren( array $children )
    {
        $this->child = reset( $children );
    }

    /**
     * Returns the number of children
     *
     * This method is part of the Countable interface to allow the usage of
     * PHP's count() function to check how many childrensets exist.
     *
     * @return int
     */
    public function count()
    {
        return 1;
    }
}

