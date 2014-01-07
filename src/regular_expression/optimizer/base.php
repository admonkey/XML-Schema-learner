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
 * Regular expression optimizer.
 *
 * @package Core
 * @version $Revision: 1236 $
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPL
 */
abstract class slRegularExpressionOptimizerBase
{
    /**
     * Optimize regular expression
     *
     * Tries to optimize the given regular expression. Returns true if the AST 
     * has been modified, and false otherwise.
     * 
     * @param slRegularExpression $regularExpression 
     * @return bool
     */
    abstract public function optimize( slRegularExpression &$regularExpression );

    /**
     * Recurse through the container stack
     *
     * Recurse through the container stack and call the optimize method for 
     * each child.
     *
     * Returns true, if something has been modified, and false otherwise.
     * 
     * @param slRegularExpression $regularExpression 
     * @return bool
     */
    protected function recurse( slRegularExpression $regularExpression )
    {
        if ( !$regularExpression instanceof slRegularExpressionContainer )
        {
            return false;
        }

        $modified = false;
        $children = $regularExpression->getChildren();
        foreach ( $children as &$child )
        {
            $modified |= $this->optimize( $child );
        }

        if ( $modified )
        {
            $regularExpression->setChildren( $children );
        }

        return (bool) $modified;
    }
}

