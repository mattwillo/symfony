<?php

namespace Symfony\Framework\TwigBundle\Extension;

use Symfony\Components\Templating\Engine;
use Symfony\Framework\TwigBundle\TokenParser\HelperTokenParser;

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    Symfony
 * @subpackage Framework_TwigBundle
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 */
class Helpers extends \Twig_Extension
{
    /**
     * Returns the token parser instance to add to the existing list.
     *
     * @return array An array of Twig_TokenParser instances
     */
    public function getTokenParsers()
    {
        return array(
            // {% javascript 'bundles/blog/js/blog.js' %}
            new HelperTokenParser('stylesheet', '<js> [with <arguments:array>]', 'javascripts', 'add'),

            // {% javascripts %}
            new HelperTokenParser('stylesheets', '', 'stylesheets', 'render'),

            // {% stylesheet 'bundles/blog/css/blog.css' with ['media': 'screen'] %}
            new HelperTokenParser('stylesheet', '<css> [with <arguments:array>]', 'stylesheets', 'add'),

            // {% stylesheets %}
            new HelperTokenParser('stylesheets', '', 'stylesheets', 'render'),

            // {% route 'blog_post' with ['id': post.id] %}
            new HelperTokenParser('route', '<route> [with <arguments:array>]', 'router', 'generate'),

            // {% render 'BlogBundle:Post:list' with ['path': ['limit': 2], 'alt': 'BlogBundle:Post:error'] %}
            new HelperTokenParser('render', '<template> [with <arguments:array>]', 'actions', 'render'),
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'symfony.helpers';
    }
}
