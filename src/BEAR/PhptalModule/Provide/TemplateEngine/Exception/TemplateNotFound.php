<?php
/**
 * This file is part of the BEAR.Sunday package
 *
 * @package BEAR.PhptalModule
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace BEAR\PhptalModule\Provide\TemplateEngine\Exception;

use BEAR\Sunday\Exception\ExceptionInterface;

/**
 * Template Not found exception
 */
class TemplateNotFound extends \LogicException implements ExceptionInterface
{
}
